<?php

namespace App\Http\Controllers;

use App\Enums\IconGame;
use App\Enums\Ultity;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;
use App\Repositories\IpUserRepository;
use App\Repositories\SearchRepository;
use App\Repositories\GameCollectionRepository;
use App\Repositories\ReportBugRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Cookie;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Config;
use Session;
use Cache;

class HomeController extends Controller
{
    private $categoryRepository;
    private $gameRepository;
    private $searchRepository;
    private $ultity;
    private $iconGame;
    private $ipUserRepository;
    private $gameCollectionRepository;
    private $guard;
    private $reportBugRepository;

    public function __construct(
        GameRepository $gameRepository,
        CategoryRepository $categoryRepository,
        SearchRepository $searchRepository,
        Ultity $ultity,
        IconGame $iconGame,
        IpUserRepository $ipUserRepository,
        GameCollectionRepository $gameCollectionRepository,
        StatefulGuard $guard,
        ReportBugRepository $reportBugRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->gameRepository = $gameRepository;
        $this->searchRepository = $searchRepository;
        $this->ultity = $ultity;
        $this->iconGame = $iconGame;
        $this->ipUserRepository = $ipUserRepository;
        $this->gameCollectionRepository = $gameCollectionRepository;
        $this->guard = $guard;
        $this->reportBugRepository = $reportBugRepository;
    }

    public function viewCookiePolicy()
    {
        return view('page.cookie-policy');
    }

    public function viewPrivacy()
    {
        return view('page.privacy');
    }

    public function viewVerify()
    {
        return view('auth.verify-email-success');
    }

    public function viewResetPassword()
    {
        return view('auth.send-reset-password-success');
    }

    public function viewResetPasswordSuccess()
    {
        return view('auth.reset-password-done');
    }

    public function viewTest()
    {
        return view('vendor.notifications.email');
    }

    public function viewHome()
    {
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();

        $query = $this->gameRepository->getListGameWithVote();
        $query = $query->shuffle();
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

        $stringTrans = implode(', ', $listTag);
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $listTag = explode(', ', $translate);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.homepage', compact('listCategory', 'games', 'countGame', 'listTag', 'search', 'countGameInCollection'));
        }

        return view('page.homepage', compact('listCategory', 'games', 'countGame', 'listTag', 'search'));
    }

    public function viewCategory($category, Request $request)
    {
        $sort = null;
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();

        if ($request->get('sort') != null) {
            $sort = $request->get('sort');
        }

        $getGames = $this->gameRepository->listGameByCategory($category, $sort);
        $getGames = $getGames->shuffle();

        if ($sort == 'rating') {
            $getGames = $getGames->sortBy([
                ['rating', 'desc'],
            ]);
        }

        $games = $this->ultity->paginate($getGames, 30);
        $category = $this->categoryRepository->getByColumn($category, 'name');

        if (empty($category)) {
            abort(404);
        }

        $listTag = [];

        foreach ($games as $game) {
            $game['name'] = ucwords(str_replace('-', ' ', $game['name']));
            if (($game['like'] + $game['un_like']) == 0) {
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

        $stringTrans = implode(', ', $listTag);
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $listTag = explode(', ', $translate);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.category', compact('games', 'category', 'listTag', 'listCategory', 'countGameInCollection'));
        }

        return view('page.category', compact('games', 'category', 'listTag', 'listCategory'));
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

        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->get();
        $listGame = $this->gameRepository->getListBySearch($filter);
        $listName = [];
        foreach ($listGame as $game) {
            $listName[] = $game['name'];
        }

        $getTags = $this->gameRepository->getTagsByListGame($listName);
        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $listTag)) {
                    $listTag[] = $tag;
                }
            }
        }

        $stringTrans = implode(', ', $listTag);
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $listTag = explode(', ', $translate);

        $getGames = $listGame->shuffle();
        $games = $this->ultity->paginate($getGames, 30);
        $games = $this->ultity->renameAndCalculateVote($games);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.search', compact('listCategory', 'games', 'listTag', 'countGameInCollection'));
        }

        return view('page.search', compact('listCategory', 'games', 'listTag'));
    }

    public function viewTags($tag)
    {
        $query = $this->gameRepository->listGameByTag($tag);
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();
        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                $listTag[] = $tag;
            }
        }

        if (empty($query)) {
            abort(404);
        }

        $listGame = $this->ultity->paginate($query, 10);
        $games = $this->ultity->renameAndCalculateVote($listGame);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.tags', compact('games', 'tag', 'listCategory', 'listTag', 'countGameInCollection'));
        }

        return view('page.tags', compact('games', 'tag', 'listCategory', 'listTag'));
    }

    public function viewListTags(Request $request)
    {
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();
        $page = $request->get('page');
        if (empty($page)) {
            $page = 1;
        } else {
            if (is_numeric($page)) {
                $page = intval($page);
            } else {
                abort(404);
            }
        }

        $getTags = $this->gameRepository->getTags()->toArray();
        $listTag = [];
        $listIgnore = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record['tag']);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $listTag) and !in_array($tag, $listIgnore)) {
                    $countGame = $this->gameRepository->countGameByTag($tag);
                    if ($countGame <= 5) {
                        $listIgnore[] = $tag;
                        continue;
                    }
                    $listTag[$tag] = [
                        'count' => $countGame,
                        'numberIcon' => array_key_exists($tag, $this->iconGame::LIST_ICON) ? $this->iconGame::LIST_ICON[$tag] : 1200
                    ];
                }
            }
        }

        $perPage = 198;
        $path = '/tags';
        $pageName = 'page';
        $listResult = $this->ultity->paginate($listTag, $perPage, $path, $pageName, $page);
        $arrData = $listResult->toArray();
        $stringTrans = implode(', ', array_keys($arrData['data']));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $listTagNew = explode(', ', $translate);
        $count = 0;

        foreach ($listResult as $tag => $value) {
            $arrData['data'][$tag][] = ['trans' => $listTagNew[$count]];
            $count++;
        }

        $totalTags = count($listTag);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.list-tag', compact('arrData', 'totalTags', 'listCategory', 'listTag', ' countGameInCollection'));
        }

        return view('page.list-tag', compact('arrData', 'totalTags', 'listCategory', 'listTag'));
    }

    public function viewNewGames()
    {
        $getGame = $this->gameRepository->getNewestGame();
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();

        if (empty($getGame)) {
            abort(404);
        }

        $listGame = $this->ultity->paginate($getGame, 30);
        $games = $this->ultity->renameAndCalculateVote($listGame);
        $listGameName = [];
        foreach ($games as $game) {
            $listGameName[] = $game['name'];
        }

        $getTags = $this->gameRepository->getTagsByListGame($listGameName);
        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                $listTag[] = $tag;
            }
        }

        $count = count($listTag);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.list-tag', compact('arrData', 'totalTags', 'listCategory', 'listTag', ' countGameInCollection'));
        }

        return view('page.best-game', compact('games', 'count', 'listCategory', 'listTag'));
    }

    public function viewBestGame()
    {
        $getGame = $this->gameRepository->getBestGame();
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();

        if (empty($getGame)) {
            abort(404);
        }

        $listGame = $this->ultity->paginate($getGame, 30);
        $games = $this->ultity->renameAndCalculateVote($listGame);
        $listGameName = [];
        foreach ($games as $game) {
            $listGameName[] = $game['name'];
        }

        $getTags = $this->gameRepository->getTagsByListGame($listGameName);
        $listTag = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                $listTag[] = $tag;
            }
        }

        $count = count($listTag);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.best-game', compact('games', 'count', 'listTag', 'listCategory', 'countGameInCollection'));
        }

        return view('page.best-game', compact('games', 'count', 'listTag', 'listCategory'));
    }

    public function viewGame($game)
    {
        $getGame = $this->gameRepository->getGameByName($game);

        if (empty($getGame)) {
            abort(404);
        }

        $getGame['title-game'] = ucwords(str_replace('-', ' ', $game));
        $status = null;

        if (Auth::check()) {
            $query = $this->gameCollectionRepository->getByGameNameAndUserId($game, Auth::user()->id);
            if (empty($query)) {
                $status = false;
            } else {
                $status = true;
            }
        }

        return view('page.games', compact('getGame', 'status'));
    }

    public function countPlay(Request $request)
    {
        $ip = $request->get('ip');
        $gameName = $request->get('gameName');

        $queryIP = $this->ipUserRepository->getIpByUser($ip, $gameName);

        if (empty($queryIP)) {
            $dataIpUser = [
                'ip_address' => $ip,
                'game_name' => $gameName
            ];
            $this->ipUserRepository->create($dataIpUser);
            $getCount = $this->gameRepository->getCountByGame($gameName);
            $count = (int) ($getCount['count_play']) + 1;

            $this->gameRepository->updateCountPlay($gameName, $count);
        }

        return 'success';
    }

    public function changeLocate($locale)
    {
        if (in_array($locale, Config::get('app.locales'))) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }

    public function registerRetry(Request $request)
    {
        $this->guard->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget(strtolower(str_replace(' ', '_', config('app.name'))) . '_session'));

        return redirect('/');
    }

    public function reportBug(Request $request)
    {
        $userName = $request->get('name');
        $gameName = $request->get('gameName');
        $userEmail = $request->get('email');
        $note = $request->get('note');

        if (empty($userName) or empty($gameName) or empty($userEmail)) {
            abort(404);
        }

        $data = [
            'user_name' => $userName,
            'user_email' => $userEmail,
            'note' => $note,
            'game_name' => $gameName
        ];

        $query = $this->reportBugRepository->getReportBugByEmailAndGame($userEmail, $gameName);
        $explode = explode('@', $userEmail);
        $result['pre-email'] = $explode[0];
        $result['last-email'] = $explode[1];
        if (empty($query)) {
            $this->reportBugRepository->create($data);
            $result['text'] = 'success';
        } else {
            $result['text'] = 'fail';
        }

        return $result;
    }
}
