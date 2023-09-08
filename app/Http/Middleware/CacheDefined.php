<?php

namespace App\Http\Middleware;

use App\Enums\ListCacheKey;
use App\Enums\Ultity;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Cache;

class CacheDefined
{
    private $listCacheKey;
    private $categoryRepository;
    private $gameRepository;
    private $ultity;

    public function __construct(ListCacheKey $listCacheKey, CategoryRepository $categoryRepository, GameRepository $gameRepository, Ultity $ultity)
    {
        $this->listCacheKey = $listCacheKey;
        $this->categoryRepository = $categoryRepository;
        $this->gameRepository = $gameRepository;
        $this->ultity = $ultity;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        foreach ($this->listCacheKey::LIST_CACHE_KEY as $key) {
            if (!Cache::has($key)) {
                if ($key == 'listCategory') {
                    $value = $this->categoryRepository->listCategoryWithCount();
                }

                if ($key == 'listTag') {
                    $listGame = $this->gameRepository->getRandomTagWithLimit();
                    $getTags = $this->gameRepository->getTags()->toArray();
                    $value = [];
                    foreach ($listGame as $game) {
                        $arrTags = json_decode($game->tag);
                        foreach ($arrTags as $tag) {
                            if (!array_key_exists($tag, $value)) {
                                $value[$tag]['tag'] = $tag;
                                $value[$tag]['count'] = 0;
                                $value[$tag]['color'] = $this->ultity->rndRGBColorCode();
                            }
                        }
                    }

                    foreach ($getTags as $record) {
                        $arrTags = json_decode($record['tag']);
                        foreach ($arrTags as $tags) {
                            if (!array_key_exists($tags, $value)) {
                                continue;
                            } else {
                                $value[$tags]['count'] += 1;
                            }
                        }
                    }
                }

                Cache::store('redis')->put($key, $value, 6000);
            }
        }

        return $next($request);
    }
}
