<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;

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

    public function showCategory($id)
    {
        $dataCategory = $this->categoryRepository->showCategory($id);
        return view('admin.category.show-category', ['dataCategory' => $dataCategory]);
    }

    public function create()
    {
        return view ('admin.category.create-category');
    }

    public function store(StoreCategoryRequest $request)
    {
        $input = $request->all();
        $dataCat = $this->categoryRepository->store($input);

        return redirect('list-category');
    }

    public function edit($id)
    {
        $dataCategory = $this->categoryRepository->showCategory($id);
        return view('admin.category.edit-category', ['dataCategory' => $dataCategory]);
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $input = $request->except(['_token']);
        $dataCat = $this->categoryRepository->update($input, $id);

        return redirect('list-category');
    }
}
