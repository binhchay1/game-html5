<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;

class HomeController extends Controller
{

    private $categoryRepository;
    private $gameRepository;

    public function __construct(GameRepository $gameRepository, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->gameRepository = $gameRepository;
    }

    public function viewHome()
    {
        $listCategory = $this->categoryRepository->listCategory();

        return view('page.homepage', compact('listCategory'));
    }

    public function viewCategory($category) {

        $listCategory = $this->categoryRepository->listCategory();
        $games = $this->gameRepository->listGameByCategory($category);

        return view('page.category', compact('listCategory', 'games', 'category'));
    }
}
