<?php

namespace App\Services;

use App\Enums\LinkGame;
use App\Enums\Attribute;
use App\Enums\Ultity;
use App\Models\Game;
use Illuminate\Support\Facades\View;
use App\Repositories\GameRepository;
use Config;
use File;

class GetLinkGames
{
    private $linkGame;
    private $attribute;
    private $crawls;
    private $gameRepository;
    private $ultity;

    public function __construct(LinkGame $linkGame, Attribute $attribute, Crawls $crawls, GameRepository $gameRepository, Ultity $ultity)
    {
        $this->linkGame = $linkGame;
        $this->attribute = $attribute;
        $this->crawls = $crawls;
        $this->gameRepository = $gameRepository;
        $this->ultity = $ultity;
    }

    public function getLinkGameItchIo()
    {
        $url = $this->linkGame::GAME_ITCHIO;
        $break = false;
        $attrA = $this->attribute::LIST_ATTRIBUTE[$url];
        $attrImg = '.lazy_loaded';
        $page = 1;
        $itemCount = 0;

        while (!$break) {
            $url = $url . "?page=" . $page . "&format=json";
            $html = $this->crawls->getDom($url, 'text');
            $decode = json_decode($html);
            $content = $decode->content;
            $countListImg = 0;

            if ($content == null || empty($content)) {
                $break = true;
                continue;
            }

            $listA = $this->crawls->getListAttribute($content, $attrA, 'file');
            $listImg = $this->crawls->getListAttribute($content, $attrImg, 'file');

            foreach ($listA as $item) {
                $link = "";
                if (!empty($item->attr)) {
                    $link = $item->attr["href"];
                    $listLink[]['link'] = $link;
                }
            }

            foreach ($listImg as $img) {
                $link = "";
                if (!empty($img->attr)) {
                    $link = $img->attr['data-lazy_src'];
                    $file_name = basename($link);
                    $path = asset('images/games') . '/' . $file_name;
                    $listLink[$countListImg]['thumb'] = $path;
                    // $this->ultity->downloadFile($link, $file_name, $path);
                }

                $countListImg++;
            }

            foreach ($listLink as $link) {
                $path = parse_url($link['link'], PHP_URL_PATH);
                $gameName = substr($path, 1);
                $viewGame = "games." . $gameName;
                if (View::exists($viewGame)) {
                    continue;
                }

                $html = $this->crawls->getDom($link['link'], null);

                $data = [
                    'name' => $gameName,
                    'link' => $link['link'],
                    'thumbs' => $link['thumb']
                ];
                // $createGame = $this->gameRepository->create($data);

                // if (!$createGame instanceof Game) {
                //     $listError[] = $data;
                //     continue;
                // }

                $dom = new \DOMDocument();
                $dom->preserveWhiteSpace = false;
                @$dom->loadHTML($html->__toString());
                $dom->formatOutput = true;
                $htmlDecode = $dom->saveHTML();

                $pathView = Config::get("view.paths");
                $pathCreateFile = $pathView[0] . "\games/" . $gameName . ".blade.php";
                $html->save($pathCreateFile);
                $str = file_get_contents($pathCreateFile);
                $strResult = str_replace($html->__toString(), $htmlDecode, $str);
                file_put_contents($pathCreateFile, $strResult);

                $fopen = fopen($pathCreateFile, "r+");
                $contentResult = $html->__toString();
                if ($fopen) {
                    while (($line = fgets($fopen)) !== false) {
                        $contentResult = $this->ultity->replaceHTML($line, $this->linkGame::GAME_ITCHIO, $data, $contentResult);
                        file_put_contents($pathCreateFile, $contentResult);
                    }

                    fclose($fopen);
                }
                dd(1);

                $itemCount++;
            }

            $page++;
        }

        $response = [
            'page' => $page,
            'itemCount' => $itemCount,
            'error' => $listError
        ];

        return $response;
    }
}
