<?php

namespace App\Http\Controllers;

use App\Enums\Ultity;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;

class HomeController extends Controller
{

    private $categoryRepository;
    private $gameRepository;
    private $ultity;

    public function __construct(GameRepository $gameRepository, CategoryRepository $categoryRepository, Ultity $ultity)
    {
        $this->categoryRepository = $categoryRepository;
        $this->gameRepository = $gameRepository;
        $this->ultity = $ultity;
    }

    public function viewHome()
    {
        $listCategory = $this->categoryRepository->listCategory();
        $featureGames = $this->gameRepository->getFeatureGames();
        $gamesByCategory = $this->categoryRepository->getAllGameByCategory();

        return view('page.homepage', compact('listCategory', 'featureGames', 'gamesByCategory'));
    }

    public function viewCategory($category)
    {

        $listCategory = $this->categoryRepository->listCategory();
        $games = $this->gameRepository->listGameByCategory($category);
        $query = $this->gameRepository->getGameByCategory($category);
        $path = '/' . $category;
        $gameByCategory = $this->ultity->paginate($query, 10, $path);

        return view('page.category', compact('listCategory', 'games', 'category', 'gameByCategory'));
    }
}
