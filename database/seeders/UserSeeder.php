<?php

namespace Database\Seeders;

use App\Repositories\UserRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@gamekafe.com',
            'password' => Hash::make('admin@123'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'role' => 'admin',
            'image' => 'sdadsadsadsad',
        ];

        $this->userRepository->create($data);
    }
}
