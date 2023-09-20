<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Repositories\PointRepository;
use App\Repositories\UserRepository;
use App\Repositories\SubscribleRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    private $userRepository;
    private $subscribleRepository;
    private $pointRepository;

    public function __construct(UserRepository $userRepository, SubscribleRepository $subscribleRepository, PointRepository $pointRepository)
    {
        $this->userRepository = $userRepository;
        $this->subscribleRepository = $subscribleRepository;
        $this->pointRepository = $pointRepository;
    }

    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $dataUser = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => 'user'
        ];
        $user = $this->userRepository->create($dataUser);

        $dataSub = [
            'email' => $input['email'],
            'status' => 1,
            'user_id' => $user->id,
            'token' => Str::random(30)
        ];

        $this->subscribleRepository->create($dataSub);

        $dataPoint = [
            'user_id' => $user->id,
            'points' => 0
        ];
        $this->pointRepository->create($dataPoint);

        return User::where('id', $user->id)->first();
    }
}
