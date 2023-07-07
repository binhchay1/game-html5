<?php

namespace App\Http\Controllers;

use App\Enums\LinkGame;
use Illuminate\Http\Request;
use App\Services\GetLinkGames;
use App\Services\ProcessPython;

class GameController extends Controller
{
    private $linkGame;
    private $getLinkGames;
    private $processPython;

    public function __construct(LinkGame $linkGame, GetLinkGames $getLinkGames, ProcessPython $processPython)
    {
        $this->linkGame = $linkGame;
        $this->getLinkGames = $getLinkGames;
        $this->processPython = $processPython;
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
                $this->getLinkGames->getLinkGameItchIo();
                break;
        }
    }

    public function test(Request $request) {
        $path = public_path() . '/process/process.py';
        $data = $this->processPython->process($path);

        dd($data);
    }
}
