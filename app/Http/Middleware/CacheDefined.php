<?php

namespace App\Http\Middleware;

use App\Enums\ListCacheKey;
use App\Repositories\CategoryRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Cache;

class CacheDefined
{
    private $listCacheKey;
    private $categoryRepository;

    public function __construct(ListCacheKey $listCacheKey, CategoryRepository $categoryRepository)
    {
        $this->listCacheKey = $listCacheKey;
        $this->categoryRepository = $categoryRepository;
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
                Cache::store('redis')->put($key, $value, 6000);
            }
        }

        return $next($request);
    }
}
