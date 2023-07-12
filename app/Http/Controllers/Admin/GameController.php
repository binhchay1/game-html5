<?php

namespace App\Http\Controllers\Admin;

use App\Enums\LinkGame;
use Illuminate\Http\Request;
use App\Services\GetLinkGames;
use App\Http\Controllers\Controller;
use App\Repositories\GameRepository;

class GameController extends Controller
{
    private $linkGame;
    private $getLinkGames;
    protected $gameRepository;

    public function __construct(LinkGame $linkGame, GetLinkGames $getLinkGames, GameRepository $gameRepository)
    {
        $this->linkGame = $linkGame;
        $this->getLinkGames = $getLinkGames;
        $this->gameRepository = $gameRepository;
    }

    public function index()
    {
        $dataGame = $this->gameRepository->listGame();
        return view('admin.game.list-game', ['dataGame' => $dataGame]);
    }

    public function viewGame($game)
    {
        $name = strtolower(str_replace(' ', '-', $game));
        $getGame = $this->gameRepository->getByColumn($name, 'name')->first();

        $url = $getGame['link'];

        return redirect($url);
    }

    public function getLinksGame(Request $request)
    {
        $url = $request->get("url");
        if ($url == null) {
            return null;
        }

        switch ($url) {
            case $this->linkGame::GAME_ITCHIO:
                $response = $this->getLinkGames->getLinkGameItchIo();

                return \response()->json($response);
                break;
        }
    }
}
