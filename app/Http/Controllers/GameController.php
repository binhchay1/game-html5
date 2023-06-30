<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Crawls;
use Illuminate\Support\Facades\View;
use Config;

class GameController extends Controller
{
    private $crawls;

    public function __construct(Crawls $crawls)
    {
        $this->crawls = $crawls;
    }

    public function viewGame($name)
    {
        $pathDir = "games." . $name;
        return view($pathDir);
    }

    public function getLinksGame(Request $request)
    {
        $url = $request->get("url");
        if ($url == null) {
            return null;
        }
        $attribute = ".thumb_link";
        $list = $this->crawls->getListAttribute($url, $attribute);

        foreach ($list as $item) {
            $link = "";
            if (!empty($item->attr)) {
                $link = $item->attr["href"];
                $listLink[] = $link;
            }
        }

        foreach ($listLink as $link) {
            $path = parse_url($link, PHP_URL_PATH);
            $gameName = substr($path, 1);
            $viewGame = "games." . $gameName;
            if (View::exists($viewGame)) {
                continue;
            }

            $html = $this->crawls->getDom($link, null);
            dd($html->dump());
            $pathView = Config::get("view.paths");
            $pathCreateFile = $pathView[0] . "\games/" . $gameName . ".blade.php";
            $html->save($pathCreateFile);
        }
    }
}
