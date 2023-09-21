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
            'name' => 'Sports'
        ];

        $this->categoryRepository->create($data);
    }
}
