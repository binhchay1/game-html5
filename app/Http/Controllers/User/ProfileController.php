<?php

namespace App\Http\Controllers\User;

use App\Enums\Ultity;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Repositories\GameCollectionRepository;
use App\Repositories\GameRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $userRepository;
    protected $ultity;
    protected $gameCollectionRepository;
    protected $gameRepository;

    public function __construct(
        UserRepository $userRepository,
        Ultity $ultity,
        GameCollectionRepository $gameCollectionRepository,
        GameRepository $gameRepository
    ) {
        $this->userRepository = $userRepository;
        $this->ultity = $ultity;
        $this->gameCollectionRepository = $gameCollectionRepository;
        $this->gameRepository = $gameRepository;
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
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
}
