<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $dataCategory = $this->categoryRepository->listCategory();

        return view('admin.category.list-category', compact('dataCategory'));
    }

    public function showCategory($id)
    {
        $dataCategory = $this->categoryRepository->showCategory($id);

        return view('admin.category.show-category', compact('dataCategory'));
    }

    public function create()
    {
        return view('admin.category.create-category');
    }

    public function store(StoreCategoryRequest $request)
    {
        $input = $request->all();
        $result = $this->categoryRepository->store($input);

        if ($result) {
            $alert = 'Successfully to store!';
        } else {
            $alert = 'Failed to edit!';
        }

        return redirect('list-category')->with('alert', $alert);
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $input = $request->except(['_token']);
        $result = $this->categoryRepository->update($input, $id);

        if ($result) {
            $alert = 'Successfully to update!';
        } else {
            $alert = 'Failed to update!';
        }

        return redirect('list-category')->with('alert', $alert);
    }
}
