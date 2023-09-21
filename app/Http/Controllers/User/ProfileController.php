<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AchievedRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\GameCollectionRepository;
use App\Repositories\GameRepository;
use App\Repositories\IpUserRepository;
use App\Repositories\SearchRepository;
use App\Repositories\CommentRepository;
use App\Repositories\FriendRepository;
use App\Repositories\PointRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Enums\Ultity;
use App\Models\User;

use Session;

class ProfileController extends Controller
{
    protected $userRepository;
    protected $ultity;
    protected $gameCollectionRepository;
    protected $gameRepository;
    protected $ipUserRepository;
    protected $categoryRepository;
    protected $searchRepository;
    protected $commentRepository;
    protected $achievedRepository;
    protected $friendRepository;
    protected $pointRepository;

    public function __construct(
        UserRepository $userRepository,
        Ultity $ultity,
        GameCollectionRepository $gameCollectionRepository,
        GameRepository $gameRepository,
        IpUserRepository $ipUserRepository,
        CategoryRepository $categoryRepository,
        SearchRepository $searchRepository,
        CommentRepository $commentRepository,
        AchievedRepository $achievedRepository,
        FriendRepository $friendRepository,
        PointRepository $pointRepository
    ) {
        $this->userRepository = $userRepository;
        $this->ultity = $ultity;
        $this->gameCollectionRepository = $gameCollectionRepository;
        $this->gameRepository = $gameRepository;
        $this->ipUserRepository = $ipUserRepository;
        $this->categoryRepository = $categoryRepository;
        $this->searchRepository = $searchRepository;
        $this->commentRepository = $commentRepository;
        $this->achievedRepository = $achievedRepository;
        $this->friendRepository = $friendRepository;
        $this->pointRepository = $pointRepository;
    }

    public function show($nick_name)
    {
        if (!isset($nick_name) or empty($nick_name)) {
            abort(404);
        }

        $idUser = Auth::user()->id;
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();
        $countGameInCollection = $this->gameCollectionRepository->countGameInCollection($idUser);
        $query = $this->gameRepository->getListGameWithVote();
        $query = $query->shuffle();
        $games = $this->ultity->paginate($query, 30);
        $countGame = count($query);
        $locale = Session::get('locale');
        $search = $this->searchRepository->listOrderWithLimitByLocale($locale);
        $listTag = Cache::get('listTag') ? Cache::get('listTag') : [];
        $comments = $this->commentRepository->getCommentByUser($idUser);
        $achieved = $this->achievedRepository->getAchievedByUser($idUser);
        $getFriend = $this->friendRepository->getFriendListByUser($idUser);
        $points = $this->pointRepository->getPointsByUser($idUser);
        $listIdFriend = [];

        foreach ($getFriend as $friend) {
            if ($friend['user_id'] == $idUser) {
                $listIdFriend[] = $friend['pair_id'];
            } else {
                $listIdFriend[] = $friend['user_id'];
            }
        }

        $friends = $this->userRepository->getListUserWithPointById($listIdFriend);

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

        $dataUser = $this->userRepository->showUserByNickName($nick_name);
        return view('page.user.profile', compact('dataUser',  'listCategory', 'countGameInCollection', 'listTag', 'comments', 'achieved', 'friends', 'points'));
    }

    public function edit()
    {
        $gender = config('user.sex');
        $country = config('user.country');
        $idUser = Auth::user()->id;
        $dataUser = $this->userRepository->showUser($idUser);
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();
        $countGameInCollection = $this->gameCollectionRepository->countGameInCollection($idUser);
        $query = $this->gameRepository->getListGameWithVote();
        $query = $query->shuffle();
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

        return view('page.user.change-profile', compact('dataUser', 'gender', 'listCategory', 'countGameInCollection', 'listTag', 'country'));
    }

    public function update(UserRequest $request, $userIdHash)
    {
        if (empty($userIdHash)) {
            abort(404);
        }

        $input = $request->except(['_token']);
        if (isset($input['image'])) {
            $img = $this->ultity->saveImageUser($input);
            if ($img) {
                $path = 'images/users/avatar/' . $input['image']->getClientOriginalName();
                $input['image'] = $path;
            }
        }

        $this->userRepository->update($input, $userIdHash);
        return back()->with('success', __('Thông tin đã được cập nhật thành công!'));
    }

    public function changePassword()
    {
        return view('page.user.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", __("Mật khẩu cũ không trùng khớp!"));
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", __("Mật khẩu thay đổi thành công!"));
    }

    public function favoriteGame()
    {
        $idUser = Auth::user()->id;
        $listGameName = $this->gameCollectionRepository->getCollectionByUser($idUser);
        $countGameInCollection = $this->gameCollectionRepository->countGameInCollection($idUser);
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->get();
        $listGame = [];
        $listTag = Cache::get('listTag') ? Cache::get('listTag') : [];

        foreach ($listGameName as $game) {
            $getGame = $this->gameRepository->getGameByName($game['game_name']);
            $listGame[] = $getGame;
            $listName[] = $game['game_name'];
        }

        $stringTrans = implode(', ', array_keys($listTag));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $arrTrans = explode(', ', $translate);
        $count = 0;
        foreach ($listTag as $tag => $val) {
            $listTag[$tag]['trans'] = $arrTrans[$count];
            $count++;
        }

        $listGame = $this->ultity->paginate($listGame, 30);
        $games = $this->ultity->renameAndCalculateVote($listGame);

        return view('page.setting', compact('games', 'listTag', 'countGameInCollection', 'listCategory'));
    }

    public function gamePlayed()
    {
        $idUser = Auth::user()->id;
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();
        $countGameInCollection = $this->gameCollectionRepository->countGameInCollection(Auth::user()->id);
        $queryIpUser = $this->ipUserRepository->getGamePlayed($idUser)->toArray();
        $listTag = Cache::get('listTag') ? Cache::get('listTag') : [];

        $queryGame = $this->gameRepository->getGameByListName($queryIpUser);
        $games = $this->ultity->paginate($queryGame, 30);

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

        $stringTrans = implode(', ', array_keys($listTag));
        $translate = GoogleTranslate::trans($stringTrans, Session::get('locale'));
        $arrTrans = explode(', ', $translate);
        $count = 0;
        foreach ($listTag as $tag => $val) {
            $listTag[$tag]['trans'] = $arrTrans[$count];
            $count++;
        }

        return view('page.game-played', compact('games', 'listCategory', 'listTag', 'countGameInCollection'));
    }
}
