<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Ultity;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
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
        return view('admin.user.create-user', ['gender' => $gender]);
    }

    public function store(StoreUserRequest $request)
    {
        $input = $request->except(['_token']);
        if (isset($input['image'])) {
            $img = $this->ultity->saveImageUser($input);
            if ($img) {
                $path = 'images/user/avatar/' . $input['image']->getClientOriginalName();
                $input['image'] = $path;
            }
        }

        $input['role'] = \App\Enums\Role::USER;
        $this->userRepository->store($input);

        return redirect('list-user');
    }

    public function editUser($id)
    {
        $dataUser = $this->userRepository->userInfo($id);
        $gender = config('user.sex');
        return view(
            'admin.user.edit-user',
            [
                'gender' => $gender,
                'dataUser' => $dataUser
            ]
        );
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $input = $request->except(['_token']);
        if (isset($input['image'])) {
            $img = $this->ultity->saveImageUser($input);
            if ($img) {
                $path = 'images/user/avatar/' . $input['image']->getClientOriginalName();
                $input['image'] = $path;
            }
        }

        $this->userRepository->update($input, $id);
        return redirect('list-user');
    }
}
