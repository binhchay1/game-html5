<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepository;
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
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
}
