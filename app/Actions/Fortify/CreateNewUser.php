<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\SubscribleRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    private $userRepository;
    private $subscribleRepository;

    public function __construct(UserRepository $userRepository, SubscribleRepository $subscribleRepository)
    {
        $this->userRepository = $userRepository;
        $this->subscribleRepository = $subscribleRepository;
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
            'user_id' => $user->id
        ];
        $this->subscribleRepository->create($input);

        return $user;
    }
}
