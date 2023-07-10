<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryRepository;
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $dataCategory = $this->categoryRepository->listCategory();

        return view('admin.category.list-category', compact('dataCategory'));
    }
}
