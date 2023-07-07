<?php

namespace App\Services;

use App\Enums\LinkGame;
use App\Enums\Attribute;
use App\Enums\Ultity;
use App\Repositories\GameRepository;

class GetLinkGames
{
    private $linkGame;
    private $attribute;
    private $crawls;
    private $ultity;
    private $gameRepository;

    public function __construct(LinkGame $linkGame, Attribute $attribute, Crawls $crawls, Ultity $ultity, GameRepository $gameRepository)
    {
        $this->linkGame = $linkGame;
        $this->attribute = $attribute;
        $this->crawls = $crawls;
        $this->ultity = $ultity;
        $this->gameRepository = $gameRepository;
    }

    public function getLinkGameItchIo()
    {
        $url = $this->linkGame::GAME_ITCHIO;
        $break = false;
        $attrA = $this->attribute::LIST_ATTRIBUTE[$url];
        $attrImg = '.lazy_loaded';
        $page = 1;
        $count = 0;
        $breakCount = -1;
        $breakPage = -1;
        $listResultSrcFrame = [];

        while (!$break) {
            if (isset($breakCount)) {
                if ($count == $breakCount and $breakCount > 0) {
                    $break = true;
                    continue;
                }
            }

            if (isset($breakPage)) {
                if ($page == $breakPage and $breakPage > 0) {
                    $break = true;
                    continue;
                }
            }

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
                    $listLink[$countListImg]['file_name'] = $file_name;
                }

                $countListImg++;
            }

            $listResultSrcFrame = array_merge($listResultSrcFrame, $this->processGameWithListLinks($listLink));
            $page++;
            $count++;
        }

        foreach ($listResultSrcFrame as $linkSrcFrame) {
            $pathProcess = public_path() . '/process/process.txt';
            $fp = fopen($pathProcess, 'a');
            fwrite($fp, $linkSrcFrame . PHP_EOL);
            fclose($fp);
        }

        $response = [
            'page' => $page,
            'count' => $count,
            'error' => $listError
        ];

        return $response;
    }

    public function processGameWithListLinks($listLink)
    {
        foreach ($listLink as $link) {
            $path = parse_url($link['link'], PHP_URL_PATH);
            $gameName = substr($path, 1);

            $html = $this->crawls->getDom($link['link'], null);

            if ($html == null or empty($html)) {
                continue;
            }

            $data = [
                'name' => $gameName,
                'link' => $link['link'],
                'thumbs' => $link['thumb']
            ];

            $getA = $html->find('a');
            $getFrame = $html->find('div[class=iframe_placeholder]');

            if (empty($getFrame)) {
                continue;
            }

            $query = $this->gameRepository->getByColumn($data['name'], 'name');
            if (!empty($query)) {
                continue;
            }

            $listTagGames = [];
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
                }
            }
            $data['tag'] = json_encode($listTagGames);
            $createGame = $this->gameRepository->create($data);

            if (!$createGame instanceof Game) {
                $listError[] = $data;
                continue;
            }

            if (!file_exists($link['thumb'])) {
                $this->ultity->downloadFile($link, $link['file_name'], $link['thumb']);
            }

            $srcFrame = html_entity_decode($getFrame[0]->attr['data-iframe']);
            $parseFrame = $this->crawls->getDom($srcFrame, 'file');
            $getChild = $parseFrame->childNodes();
            $src = $getChild[0]->attr['src'];
            $listSrcFrame[] = $src;
        }

        return $listSrcFrame;
    }
}
