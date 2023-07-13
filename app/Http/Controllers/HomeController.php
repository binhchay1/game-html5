<?php

namespace App\Http\Controllers;

use App\Enums\Ultity;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;
use App\Repositories\SearchRepository;
use Illuminate\Database\Eloquent\Casts\Json;

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
        $gameByCategory = $this->ultity->paginate($query, 10);

        return view('page.category', compact('listCategory', 'games', 'category', 'gameByCategory'));
    }

    public function viewCookiePolicy()
    {
        return view('page.cookie-policy');
    }

    public function viewSearch(Request $request)
    {
        $filter = [];
        if ($request->get('q') != null) {
            $filter['q'] = $request->get('q');
        }

        if ($request->get('tags') != null) {
            $filter['tags'] = $request->get('tags');
        }

        if ($request->get('category') != null) {
            $filter['category'] = $request->get('category');
        }

        $listCategory = $this->categoryRepository->get();
        $getTags = $this->gameRepository->getTags();
        $games = $this->gameRepository->getListBySearch($filter);
        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $listTag)) {
                    $listTag[] = $tag;
                }
            }
        }

        $bodyStatus = 'search';

        return view('page.search', compact('listCategory', 'bodyStatus', 'games', 'listTag'));
    }

    public function viewTags($tag)
    {
        $listCategory = $this->categoryRepository->listCategory();
        $games = $this->gameRepository->listGameByTag($tag);
        $query = $this->gameRepository->getGameByCategory($category);
        $gameByCategory = $this->ultity->paginate($query, 10);

        return view('page.category', compact('listCategory', 'games', 'category', 'gameByCategory'));
    }

    public function viewListTags()
    {
    }

    public function viewListCategory()
    {
    }

    public function viewNewGames()
    {
    }

    public function viewBestGame()
    {
    }
}
