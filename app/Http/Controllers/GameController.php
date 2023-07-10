<?php

namespace App\Http\Controllers;

use App\Enums\LinkGame;
use Illuminate\Http\Request;
use App\Services\GetLinkGames;

class GameController extends Controller
{
    private $linkGame;
    private $getLinkGames;

    public function __construct(LinkGame $linkGame, GetLinkGames $getLinkGames)
    {
        $this->linkGame = $linkGame;
        $this->getLinkGames = $getLinkGames;
    }

    public function viewGame($name)
    {
        $pathDir = "games." . $name . '.' . $name;
        return view($pathDir);
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
