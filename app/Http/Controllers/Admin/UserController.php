<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Ultity;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $userRepository;
    protected $ultity;

    public function __construct(
        UserRepository $userRepository,
                Ultity $ultity

    ) {
        $this->userRepository = $userRepository;
        $this->ultity = $ultity;

    }

    public function index()
    {
        $dataUser = $this->userRepository->listUser();

        return view('admin.user.list-user', ['dataUser' => $dataUser]);
    }

    public function showUser($userId)
    {
        $dataUser = $this->userRepository->userInfo($userId);
        return view('admin.user.show-user', ['dataUser' => $dataUser]);
    }

    public function create()
    {
        $gender = config('user.sex');
        return view ('admin.user.create-user', ['gender' => $gender]);
    }

    public function store(StoreUserRequest $request)
    {
        $input = $request->all();
        if (array_key_exists('image', $input)) {
            $idFolder = Hash::make('acwbe' . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['image']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['image']));
            $input['image'] = $url;
        }

        $input['role'] = \App\Enums\Role::USER;
        $dataUser = $this->userRepository->store($input);

        return redirect('list-user');
    }

    public function editUser($id)
    {
        $dataUser = $this->userRepository->userInfo($id);
        $gender = config('user.sex');
        return view ('admin.user.edit-user',
            [
                'gender' => $gender,
                'dataUser' => $dataUser
            ]);
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $input = $request->except(['_token']);

        if (array_key_exists('image', $input)) {
            $idFolder = Hash::make(Auth::user()->name . Auth::user()->id);
            $path = 'images/user/' . $idFolder . '/' . $input['image']->getClientOriginalName();
            $url = $this->ultity->saveImage($path, file_get_contents($input['image']));
            $input['image'] = $url;
        }

        $dataUser = $this->userRepository->update($input , $id);
        return redirect('list-user');
    }
}
