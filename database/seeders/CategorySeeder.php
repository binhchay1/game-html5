<?php

namespace Database\Seeders;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
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

        $this->categoryRepository->create($data);
    }
}
