<?php

namespace App\Http\Controllers;

use App\Enums\IconGame;
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
    private $iconGame;

    public function __construct(GameRepository $gameRepository, CategoryRepository $categoryRepository, SearchRepository $searchRepository, Ultity $ultity, IconGame $iconGame)
    {
        $this->categoryRepository = $categoryRepository;
        $this->gameRepository = $gameRepository;
        $this->searchRepository = $searchRepository;
        $this->ultity = $ultity;
        $this->iconGame = $iconGame;
    }

    public function viewCookiePolicy()
    {
        return view('page.cookie-policy');
    }

    public function viewPrivacy()
    {
        return view('page.privacy');
    }

    public function viewHome()
    {
        $listCategory = $this->categoryRepository->listCategoryWithCount();
        $query = $this->gameRepository->getListGameWithVote();
        $games = $this->ultity->paginate($query, 30);
        $countGame = count($query);
        $search = $this->searchRepository->listOrderByCount();
        $listTag = [];

        foreach ($games as $game) {
            $game['name'] = ucwords(str_replace('-', ' ', $game['name']));

            if (($game->votes['like'] + $game->votes['un_like']) == 0) {
                $game['rating'] = 100;
            } else {
                $game['rating'] = ($game->votes['like'] / ($game->votes['like'] + $game->votes['un_like'])) * 100;
            }

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

    public function viewCategory($category, Request $request)
    {
        $sort = null;
        if ($request->get('sort') != null) {
            $sort = $request->get('sort');
        }

        $getGames = $this->gameRepository->listGameByCategory($category, $sort);
        $games = $this->ultity->paginate($getGames, 30);
        $category = $this->categoryRepository->getByColumn($category, 'name');
        $listTag = [];


        foreach ($games as $game) {
            $game['name'] = ucwords(str_replace('-', ' ', $game['name']));
            if (($game->votes['like'] + $game->votes['un_like']) == 0) {
                $game['rating'] = 100;
            } else {
                $game['rating'] = ($game->votes['like'] / ($game->votes['like'] + $game->votes['un_like'])) * 100;
            }

            $listTagDecode = json_decode($game['tag']);
            foreach ($listTagDecode as $decode) {
                if (!in_array($decode, $listTag)) {
                    $listTag[] = $decode;
                }
            }
        }

        return view('page.category', compact('games', 'category', 'listTag'));
    }

    public function viewSearch(Request $request)
    {
        $filter = [];
        if ($request->get('q') != null) {
            $filter['q'] = $request->get('q');
            if (preg_match("/[^\w]/", $request->get('q')) == 0) {
                $querySearch = $this->searchRepository->getByColumn($filter['q'], 'keyword');
                if (empty($querySearch)) {
                    $dataSearch = [
                        'keyword' => $filter['q'],
                        'count' => 0
                    ];
                    $this->searchRepository->create($dataSearch);
                } else {
                    $dataSearch = [
                        'count' => $querySearch['count'] + 1
                    ];

                    $this->searchRepository->update($dataSearch);
                }
            }
        }

        if ($request->get('tag') != null) {
            $filter['tag'] = $request->get('tag');
        }

        if ($request->get('category') != null) {
            $filter['category'] = $request->get('category');
        }

        $listCategory = $this->categoryRepository->get();
        $getTags = $this->gameRepository->getTags();
        $listGame = $this->gameRepository->getListBySearch($filter);

        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $listTag)) {
                    $listTag[] = $tag;
                }
            }
        }

        $games = $this->ultity->renameAndCalculateVote($listGame);

        return view('page.search', compact('listCategory', 'games', 'listTag'));
    }

    public function viewTags($tag)
    {
        $query = $this->gameRepository->listGameByTag($tag);
        $listGame = $this->ultity->paginate($query, 10);
        $games = $this->ultity->renameAndCalculateVote($listGame);

        return view('page.tags', compact('games', 'tag'));
    }

    public function viewListTags()
    {
        $getTags = $this->gameRepository->getTags();
        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $listTag)) {
                    $countGame = $this->gameRepository->countGameByTag($tag);
                    $listTag[$tag] = [
                        'count' => $countGame,
                        'numberIcon' => array_key_exists($tag, $this->iconGame::LIST_ICON) ? $this->iconGame::LIST_ICON[$tag] : 1200
                    ];
                }
            }
        }

        return view('page.list-tag', compact('listTag'));
    }

    public function viewNewGames()
    {
        $getGame = $this->gameRepository->getNewestGame();
        $listGame = $this->ultity->paginate($getGame, 30);
        $games = $this->ultity->renameAndCalculateVote($listGame);
        $getTags = $this->gameRepository->getTags();
        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                $listTag[] = $tag;
            }
        }

        $count = count($listTag);

        return view('page.best-game', compact('games', 'count'));
    }

    public function viewBestGame()
    {
        $getGame = $this->gameRepository->getBestGame();
        $listGame = $this->ultity->paginate($getGame, 30);
        $games = $this->ultity->renameAndCalculateVote($listGame);
        $getTags = $this->gameRepository->getTags();
        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                $listTag[] = $tag;
            }
        }

        $count = count($listTag);

        return view('page.best-game', compact('games', 'count'));
    }

    public function viewGame($game)
    {
        $getGame = $this->gameRepository->getByColumn($game, 'name')->first();
        dd($getGame);

        return view('page.games');
    }
}
