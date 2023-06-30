<?php

namespace App\Http\Controllers;

use App\Enums\Attribute;
use Illuminate\Http\Request;
use App\Services\Crawls;
use Illuminate\Support\Facades\View;
use Config;

class GameController extends Controller
{
    private $crawls;
    private $attribute;

    public function __construct(Crawls $crawls, Attribute $attribute)
    {
        $this->crawls = $crawls;
        $this->attribute = $attribute;
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

        $attribute = $this->attribute::LIST_ATTRIBUTE[$url];
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

            $pathView = Config::get("view.paths");
            $pathCreateFile = $pathView[0] . "\games/" . $gameName . ".blade.php";
            $html->save($pathCreateFile);
        }
    }
}
