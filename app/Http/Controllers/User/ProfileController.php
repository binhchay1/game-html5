<?php

namespace App\Http\Controllers\User;

use App\Enums\Ultity;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\GameCollectionRepository;
use App\Repositories\GameRepository;
use App\Repositories\IpUserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Session;

class ProfileController extends Controller
{
    protected $userRepository;
    protected $ultity;
    protected $gameCollectionRepository;
    protected $gameRepository;
    protected $ipUserRepository;
    protected $categoryRepository;

    public function __construct(
        UserRepository $userRepository,
        Ultity $ultity,
        GameCollectionRepository $gameCollectionRepository,
        GameRepository $gameRepository,
        IpUserRepository $ipUserRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->userRepository = $userRepository;
        $this->ultity = $ultity;
        $this->gameCollectionRepository = $gameCollectionRepository;
        $this->gameRepository = $gameRepository;
        $this->ipUserRepository = $ipUserRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show()
    {
        $this->userRepository->showUser(Auth::user()->id);
    }

    public function edit()
    {
        $gender = config('user.sex');
        $dataUser = $this->userRepository->showUser(Auth::user()->id);
        return view('page.user.profile', [
            'dataUser' => $dataUser,
            'gender' => $gender
        ]);
    }

    public function update(UserRequest $request)
    {
        $input = $request->except(['_token']);
        if (array_key_exists('image', $input)) {
            $idFolder = Hash::make('acwbe' . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['image']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['image']));
            $input['image'] = $url;
        }

        $getOldImage = $this->userRepository->getById(Auth::user()->id);
        if (Storage::disk('s3')->exists($getOldImage->image)) {
            Storage::disk('s3')->delete($getOldImage->image);
        }
        $this->userRepository->update($input, Auth::user()->id);

        return back()->with('success', 'Updated successfully.');
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
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function setting()
    {
        $listGameName = $this->gameCollectionRepository->getCollectionByUser(Auth::user()->id);
        $listGame = [];
        foreach ($listGameName as $game) {
            $getGame = $this->gameRepository->getGameByName($game['game_name']);
            $listGame[] = $getGame;
        }

        $listGame = $this->ultity->paginate($listGame, 30);

        $games = $this->ultity->renameAndCalculateVote($listGame);

        return view('page.setting', compact('games'));
    }

    public function gamePlayed()
    {
        $idUser = Auth::user()->id;
        $listCategory = Cache::get('listCategory') ? Cache::get('listCategory') : $this->categoryRepository->listCategoryWithCount();
        $query = $this->ipUserRepository->getGamePlayed($idUser);

        foreach($query as $record) {
            dd($record);
        }
        // $listGame = $this->ultity->paginate($getGame, 30);
        // $games = $this->ultity->renameAndCalculateVote($listGame);

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

        return view('page.game-played', compact('games', 'listCategory', 'listTag'));
    }
}
