<?php

namespace App\Http\Controllers;

use App\Enums\Ultity;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;
use App\Repositories\SearchRepository;

class HomeController extends Controller
{

    private $categoryRepository;
    private $gameRepository;
    private $searchRepository;
    private $ultity;

    public function __construct(GameRepository $gameRepository, CategoryRepository $categoryRepository, SearchRepository $searchRepository, Ultity $ultity)
    {
        $this->categoryRepository = $categoryRepository;
        $this->gameRepository = $gameRepository;
        $this->searchRepository = $searchRepository;
        $this->ultity = $ultity;
    }

    public function viewHome()
    {
        $listCategory = $this->categoryRepository->listCategoryWithCount();
        $query = $this->gameRepository->get();
        $games = $this->ultity->paginate($query, 30);
        $countGame = count($query);
        $search = $this->searchRepository->listOrderByCount();
        $listTag = [];

        foreach ($games as $game) {
            $game['name'] = ucwords(str_replace('-', ' ', $game['name']));
            $listTagDecode = json_decode($game['tag']);
            foreach ($listTagDecode as $decode) {
                if (count($listTag) >= 13) {
                    break;
                }

                if (!in_array($decode, $listTag)) {
                    $listTag[] = $decode;
                }
            }
        }

        return view('page.homepage', compact('listCategory', 'games', 'countGame', 'listTag', 'search'));
    }

    public function viewCategory($category)
    {
        $listCategory = $this->categoryRepository->listCategory();
        $games = $this->gameRepository->listGameByCategory($category);
        $query = $this->gameRepository->getGameByCategory($category);
        $path = '/' . $category;
        $gameByCategory = $this->ultity->paginate($query, 10, $path);

        return view('page.category', compact('listCategory', 'games', 'category', 'gameByCategory'));
    }

    public function viewCookiePolicy()
    {
        return view('page.cookie-policy');
    }

    public function viewSearch()
    {
        $listCategory = $this->categoryRepository->get();

        return view('page.search', compact('listCategory'));
    }
}
