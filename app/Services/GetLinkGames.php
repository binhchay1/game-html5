<?php

namespace App\Services;

use App\Enums\LinkGame;
use App\Enums\Attribute;
use App\Enums\Ultity;
use Illuminate\Support\Facades\View;

class GetLinkGames
{
    private $linkGame;
    private $attribute;
    private $crawls;
    private $ultity;

    public function __construct(LinkGame $linkGame, Attribute $attribute, Crawls $crawls, Ultity $ultity)
    {
        $this->linkGame = $linkGame;
        $this->attribute = $attribute;
        $this->crawls = $crawls;
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
        // $breakCount = 100;

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

            if (isset($breakCount)) {
                if ($itemCount == $breakCount) {
                    $break = true;
                    continue;
                }
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

            $itemCount += $this->processGameWithListLinks($listLink);

            $page++;
        }

        $response = [
            'page' => $page,
            'itemCount' => $itemCount,
            'error' => $listError
        ];

        return $response;
    }

    public function processGameWithListLinks($listLink)
    {
        $itemCount = 0;

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

            $getA = $html->find('a');
            $listTagGames = [];
            $authorGames = '';
            foreach ($getA as $a) {
                if (array_key_exists('href', $a->attr)) {
                    if (strpos($a->attr['href'], 'https://itch.io/games/genre') !== false) {
                        $explode = explode('-', $a->attr['href']);
                        $data['general'] = $explode[1];
                    }

                    if (strpos($a->attr['href'], 'https://itch.io/games/tag') !== false) {
                        $explode = explode('-', $a->attr['href']);
                        $listTagGames[] = $explode[1];
                    }

                    if (strpos($a->attr['href'], '.itch.io') !== false) {
                        $parse_url = parse_url($link['link'], PHP_URL_HOST);
                        $explode = explode('.', $parse_url);
                        $authorGames = $explode[0];
                    }
                }
            }
            $data['tag'] = json_encode($listTagGames);

            // $createGame = $this->gameRepository->create($data);

            // if (!$createGame instanceof Game) {
            //     $listError[] = $data;
            //     continue;
            // }

            dd($strResult);

            $itemCount++;
        }

        return $itemCount;
    }


    public function readAndWriteFile($pathCreateFile, $data, $strResult)
    {
        $fopen = fopen($pathCreateFile, "r+");
        if ($fopen) {
            while (($line = fgets($fopen)) !== false) {
                $strResult = $this->ultity->replaceHTML($line, $this->linkGame::GAME_ITCHIO, $data, $strResult);
                file_put_contents($pathCreateFile, $strResult);
            }

            fclose($fopen);
        }

        return $strResult;
    }
}
