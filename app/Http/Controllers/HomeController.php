<?php

namespace App\Http\Controllers;

use App\Enums\IconGame;
use App\Enums\Ultity;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\GameRepository;
use App\Repositories\IpUserRepository;
use App\Repositories\SearchRepository;
use App\Repositories\GameCollectionRepository;
use App\Repositories\SubscribleRepository;
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
    private $commentRepository;
    private $subscribleRepository;

    public function __construct(
        GameRepository $gameRepository,
        CategoryRepository $categoryRepository,
        SearchRepository $searchRepository,
        Ultity $ultity,
        IconGame $iconGame,
        IpUserRepository $ipUserRepository,
        GameCollectionRepository $gameCollectionRepository,
        StatefulGuard $guard,
        ReportBugRepository $reportBugRepository,
        CommentRepository $commentRepository,
        SubscribleRepository $subscribleRepository
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
        $this->commentRepository = $commentRepository;
        $this->subscribleRepository = $subscribleRepository;
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
        $getListGame = $this->gameRepository->getListGameWithVote();
        $query = $getListGame->shuffle();
        $games = $this->ultity->paginate($query, 30);
        $countGame = count($query);
        $locale = Session::get('locale');
        $search = $this->searchRepository->listOrderWithLimitByLocale($locale);
        $listTag = Cache::get('listTag') ? Cache::get('listTag') : [];

        foreach ($games as $game) {
            $game['name'] = ucwords(str_replace('-', ' ', $game['name']));

            if (($game->votes['like'] + $game->votes['un_like']) == 0) {
                $game['rating'] = 100;
            } else {
                $game['rating'] = ($game->votes['like'] / ($game->votes['like'] + $game->votes['un_like'])) * 100;
            }
        }

        $stringTrans = implode(', ', array_keys($listTag));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $arrTrans = explode(', ', $translate);
        $count = 0;
        foreach ($listTag as $tag => $val) {
            $listTag[$tag]['trans'] = $arrTrans[$count];
            $count++;
        }

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
        $listTag = Cache::get('listTag') ? Cache::get('listTag') : [];

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

        foreach ($games as $game) {
            $game['name'] = ucwords(str_replace('-', ' ', $game['name']));
            if (($game['like'] + $game['un_like']) == 0) {
                $game['rating'] = 100;
            } else {
                $game['rating'] = ($game->votes['like'] / ($game->votes['like'] + $game->votes['un_like'])) * 100;
            }
        }

        $stringTrans = implode(', ', array_keys($listTag));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $arrTrans = explode(', ', $translate);
        $count = 0;
        foreach ($listTag as $tag => $val) {
            $listTag[$tag]['trans'] = $arrTrans[$count];
            $count++;
        }

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
            $filter['q'] = str_replace(' ', '-', $request->get('q'));
            $locale = env('ENABLE_LOCALE', 'en');
            if (preg_match("/[^\w]/", $request->get('q')) == 0) {
                $querySearch = $this->searchRepository->getSearchByKeyWordAndLocale($filter['q'], $locale);
                if (empty($querySearch)) {
                    $dataSearch = [
                        'keyword' => $filter['q'],
                        'count' => 0,
                        'locale' => $locale,
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
        $query = $listGame->shuffle();
        $listGame = $this->ultity->paginate($query, 100);
        $getTagForSelection = $this->gameRepository->getTags()->toArray();
        $listName = [];
        foreach ($listGame as $game) {
            $listName[] = $game['name'];
        }

        $getTags = $this->gameRepository->getTagsByListGame($listName);
        $listTag = [];
        $arrSelectionTags = [];

        foreach ($getTags as $record) {
            $arrTags = json_decode($record->tag);
            foreach ($arrTags as $tag) {
                if (count($listTag) >= 10) {
                    break 2;
                }
                if (!in_array($tag, $listTag)) {
                    $listTag[] = $tag;
                }
            }
        }

        foreach ($getTagForSelection as $record) {
            $arrTags = json_decode($record['tag']);
            foreach ($arrTags as $tag) {
                if (!in_array($tag, $arrSelectionTags)) {
                    $arrSelectionTags[] = $tag;
                }
            }
        }

        if (empty($listTag)) {
            $listTag = Cache::get('listTag');
            $stringTrans = implode(', ', array_keys($listTag));
            $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
            $arrTrans = explode(', ', $translate);
            $count = 0;
            foreach ($listTag as $tag => $val) {
                $listTag[$tag]['trans'] = $arrTrans[$count];
                $count++;
            }
        } else {
            $tempTag = $listTag;
            $stringTrans = implode(', ', $listTag);
            $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
            $arrTrans = explode(', ', $translate);
            $listTag = [];
            $count = 0;

            foreach ($tempTag as $tag) {
                $listTag[$tag]['trans'] = $arrTrans[$count];
                $listTag[$tag]['tag'] = $tag;
                $listTag[$tag]['color'] = $this->ultity->rndRGBColorCode();
                $listTag[$tag]['count'] = 0;
                $count++;
            }

            foreach ($getTagForSelection as $record) {
                $arrTags = json_decode($record['tag']);
                foreach ($arrTags as $tags) {
                    if (!array_key_exists($tags, $listTag)) {
                        continue;
                    } else {
                        $listTag[$tags]['count'] += 1;
                    }
                }
            }
        }

        $stringTrans = implode(', ', $arrSelectionTags);
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $arrSelectionTags = explode(', ', $translate);

        $getGames = $listGame->shuffle();
        $paginate = $this->ultity->paginate($getGames, 30);
        $games = $this->ultity->renameAndCalculateVote($paginate);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.search', compact('listCategory', 'games', 'listTag', 'countGameInCollection', 'arrSelectionTags'));
        }

        return view('page.search', compact('listCategory', 'games', 'listTag', 'arrSelectionTags'));
    }

    public function viewTags($tag)
    {
        $query = $this->gameRepository->listGameByTag($tag);
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();
        $listTag = Cache::get('listTag') ? Cache::get('listTag') : [];

        if (empty($query)) {
            abort(404);
        }

        $listGame = $this->ultity->paginate($query, 30);
        $totalGame = count($query);
        $games = $this->ultity->renameAndCalculateVote($listGame);

        $stringTrans = implode(', ', array_keys($listTag));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $translateOnlyTag = GoogleTranslate::trans($tag, Session::get('locale'));
        $arrTrans = explode(', ', $translate);
        $count = 0;
        foreach ($listTag as $tag => $val) {
            $listTag[$tag]['trans'] = $arrTrans[$count];
            $count++;
        }

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.tags', compact('games', 'tag', 'listCategory', 'listTag', 'countGameInCollection', 'totalGame', 'translateOnlyTag'));
        }

        return view('page.tags', compact('games', 'tag', 'listCategory', 'listTag', 'totalGame', 'translateOnlyTag'));
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

        foreach ($getTags as $record) {
            $arrTags = json_decode($record['tag']);
            foreach ($arrTags as $tag) {
                if (array_key_exists($tag, $listTag)) {
                    $listTag[$tag]['count'] += 1;
                } else {
                    $listTag[$tag] = [
                        'count' => 0,
                        'numberIcon' => array_key_exists($tag, $this->iconGame::LIST_ICON) ? $this->iconGame::LIST_ICON[$tag] : 1200,
                        'color' => $this->ultity->rndRGBColorCode(),
                    ];
                }
            }
        }

        $totalTags = count($listTag);
        $stringTrans = implode(', ', array_keys($listTag));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $arrTrans = explode(', ', $translate);
        $count = 0;

        foreach ($listTag as $tag => $val) {
            $listTag[$tag]['trans'] = $arrTrans[$count];
            $count++;
        }

        $perPage = 120;
        $path = '/tags';
        $pageName = 'page';
        $listResult = $this->ultity->paginate($listTag, $perPage, $path, $pageName, $page);
        $arrData = $listResult->toArray();

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.list-tag', compact('arrData', 'totalTags', 'listCategory', 'listTag', 'countGameInCollection'));
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

        $getTagsByGame = $this->gameRepository->getTagsByListGame($listGameName);
        $getTags = $this->gameRepository->getTags()->toArray();
        $listTag = [];
        foreach ($getTagsByGame as $game) {
            if (count($listTag) >= 10) {
                break;
            }
            $arrTags = json_decode($game->tag);
            foreach ($arrTags as $tag) {
                if (!array_key_exists($tag, $listTag)) {
                    $listTag[$tag]['tag'] = $tag;
                    $listTag[$tag]['count'] = 0;
                    $listTag[$tag]['color'] = $this->ultity->rndRGBColorCode();
                }
            }
        }

        foreach ($getTags as $record) {
            $arrTags = json_decode($record['tag']);
            foreach ($arrTags as $tags) {
                if (!array_key_exists($tags, $listTag)) {
                    continue;
                } else {
                    $listTag[$tags]['count'] += 1;
                }
            }
        }

        $stringTrans = implode(', ', array_keys($listTag));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $arrTrans = explode(', ', $translate);
        $count = 0;
        foreach ($listTag as $tag => $val) {
            $listTag[$tag]['trans'] = $arrTrans[$count];
            $count++;
        }

        $count = count($listTag);

        if (Auth::check()) {
            $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);

            return view('page.best-game', compact('games', 'count', 'listCategory', 'listTag', 'countGameInCollection'));
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

        $getTagsByGame = $this->gameRepository->getTagsByListGame($listGameName);
        $getTags = $this->gameRepository->getTags()->toArray();
        $listTag = [];
        foreach ($getTagsByGame as $game) {
            if (count($listTag) >= 10) {
                break;
            }
            $arrTags = json_decode($game->tag);
            foreach ($arrTags as $tag) {
                if (!array_key_exists($tag, $listTag)) {
                    $listTag[$tag]['tag'] = $tag;
                    $listTag[$tag]['count'] = 0;
                    $listTag[$tag]['color'] = $this->ultity->rndRGBColorCode();
                }
            }
        }

        foreach ($getTags as $record) {
            $arrTags = json_decode($record['tag']);
            foreach ($arrTags as $tags) {
                if (!array_key_exists($tags, $listTag)) {
                    continue;
                } else {
                    $listTag[$tags]['count'] += 1;
                }
            }
        }

        $stringTrans = implode(', ', array_keys($listTag));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $arrTrans = explode(', ', $translate);
        $count = 0;
        foreach ($listTag as $tag => $val) {
            $listTag[$tag]['trans'] = $arrTrans[$count];
            $count++;
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
        $locale = Session::get('locale');
        $getGame = $this->gameRepository->getGameByName($game);
        $comments = $this->commentRepository->getCommentByGameAndLocale($game, $locale);
        $statusComment = 0;

        if (empty($getGame)) {
            abort(404);
        }

        $getGame['title-game'] = ucwords(str_replace('-', ' ', $game));
        $status = null;

        if (Auth::check()) {
            $user = Auth::user()->id;
            $getComment = $this->commentRepository->getCommentByUserAndGame($game, $user);
            $query = $this->gameCollectionRepository->getByGameNameAndUserId($game, Auth::user()->id);

            if (!empty($getComment)) {
                $statusComment = 1;
            }

            if (empty($query)) {
                $status = false;
            } else {
                $status = true;
            }
        }

        return view('page.games', compact('getGame', 'status', 'comments', 'statusComment'));
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

        return redirect()->route('home');
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

    public function storePlayer(Request $request)
    {
        $ip = $request->get('ip');
        $gameName = $request->get('gameName');
        $queryIP = $this->ipUserRepository->getIpByUser($ip, $gameName);

        if (empty($gameName)) {
            abort(404);
        }

        if (empty($queryIP)) {
            $dataIpUser = [
                'ip_address' => $ip,
                'game_name' => $gameName
            ];

            if (Auth::check()) {
                $dataIpUser['user_id'] = Auth::user()->id;
            }

            $this->ipUserRepository->create($dataIpUser);
        }

        return 'success';
    }

    public function storeComments(Request $request)
    {
        $content = $request->get('content');
        $locale = Session::get('locale');
        $gameName = $request->get('gameName');

        if (empty($gameName) or empty($locale) or empty($content)) {
            abort(404);
        }

        $result = [
            'status' => false
        ];

        if (empty($content) or $content != strip_tags($content)) {
            return $result;
        }

        $data = [
            'user_id' => Auth::user()->id,
            'game_name' => $gameName,
            'locale' => $locale,
            'content' => $content,
            'status' => 0
        ];

        $query = $this->commentRepository->create($data);

        if (!$query) {
            return $result;
        }

        $result['status'] = true;
        $result['content'] = __('Cám ơn các bạn đã bình luận. Chúng tôi sẽ thông báo sớm đến bạn qua hòm thư sau khi được kiểm duyệt!');

        return $result;
    }

    public function countPlay(Request $request)
    {
        $gameName = $request->get('gameName');
        $getGame = $this->gameRepository->getGameByName($gameName);
        if (empty($gameName) or empty($getGame)) {
            abort(404);
        }

        $data = [
            'count_play' => $getGame->count_play++
        ];
        $this->gameRepository->update($data, $getGame->id);

        return 'success';
    }

    public function unsubscribe(Request $request)
    {
        $email = $request->get('e');
        $token = $request->get('t');

        if (empty($email) or empty($token)) {
            abort(404);
        }

        $subscrible = $this->subscribleRepository->getSubscribleByEmailAndToken($email, $token);

        if (empty($subscrible)) {
            return '-1';
        }

        $data = [
            'status' => 0
        ];

        $this->subscribleRepository->updateById($subscrible, $data);

        return view('page.unsubscribe');
    }
}
