<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Ultity;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
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
        return view('admin.user.create-user', ['gender' => $gender]);
    }

    public function store(StoreUserRequest $request)
    {
        $input = $request->all();
        if(isset($input['image'])) {
            $img = $this->ultity->saveImage($input);
            if ($img) {
                $fileName = 'images/games/user/' . $img;
                $input['image'] = $fileName;
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
        if(isset($input['image'])) {
            $img = $this->ultity->saveImage($input);
            if ($img) {
                $fileName = 'images/games/user/' . $img;
                $input['image'] = $fileName;
            }
        }

        $this->userRepository->update($input, $id);
        return redirect('list-user');
    }

    public function chartUser()
    {
        return view('admin.statistical-chart.index');
    }

    public function getUserByMonth()
    {
        $users = $this->userRepository->getChartByMonth();
        $labels = [];
        $data = [];
        $colors = ["Red", "Yellow", "Green", "Purple", "Orange"];

        for ($i = 1; $i <= 12; $i++) {

            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;

            foreach ($users as $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }

            array_push($labels, $month);
            array_push($data, $count);
        }

        $dataset = [
            [
                'label' => 'Users',
                'data' => $data,
                'background' => $colors
            ]
        ];
        return view('admin.statistical-chart.get-user-by-month', compact('dataset', 'labels'));
    }

    public function getUserByQuarter()
    {
        $users = $this->userRepository->getChartByQuarter();
        $labels = [];
        $data = [];
        $colors = ["Red", "Yellow", "Green", "Purple", "Orange"];
        for ($i = 1; $i <= 4; $i++) {
            $quarter =  date('n', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($users as $user) {
                if ($user->quarter == $i) {
                    $count = $user->count;
                    break;
                }
            }

            array_push($labels, $quarter);
            array_push($data, $count);
        }

        $dataset = [
            [
                'label' => 'Users',
                'data' => $data,
                'background' => $colors
            ]
        ];

        return view('admin.statistical-chart.get-user-by-quarter', compact('dataset', 'labels'));
    }

    public function getUserByYear()
    {
        $users = $this->userRepository->getChartByYear();
        $labels = [];
        $data = [];
        $colors = ["Red", "Yellow", "Green", "Purple", "Orange"];
        $year = date('Y');
        $count = 0;

        foreach ($users as $user) {
            if ($user->year == $year) {
                $count = $user->count;
                break;
            }
        }

        array_push($labels, $year);
        array_push($data, $count);

        $dataset = [
            [
                'label' => 'Users',
                'data' => $data,
                'background' => $colors
            ]
        ];

        return view('admin.statistical-chart.get-user-by-year', compact('dataset', 'labels'));
    }
}
