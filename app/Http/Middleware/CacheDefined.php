<?php

namespace App\Http\Middleware;

use App\Enums\ListCacheKey;
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

    public function __construct(ListCacheKey $listCacheKey, CategoryRepository $categoryRepository, GameRepository $gameRepository)
    {
        $this->listCacheKey = $listCacheKey;
        $this->categoryRepository = $categoryRepository;
        $this->gameRepository = $gameRepository;
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
                    $value = $this->gameRepository->getRandomTagWithLimit();
                }

                Cache::store('redis')->put($key, $value, 6000);
            }
        }

        return $next($request);
    }
}
