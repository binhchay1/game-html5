<?php

namespace App\Services;

use App\Enums\LinkGame;
use App\Enums\Attribute;
use App\Enums\IgnoreLink;
use App\Enums\Ultity;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;
use Illuminate\Support\Facades\Storage;

class GetLinkGames
{
    private $linkGame;
    private $attribute;
    private $crawls;
    private $gameRepository;
    private $ignoreLink;

    public function __construct(
        LinkGame $linkGame,
        Attribute $attribute,
        Crawls $crawls,
        Ultity $ultity,
        GameRepository $gameRepository,
        CategoryRepository $categoryRepository,
        IgnoreLink $ignoreLink
    ) {
        $this->linkGame = $linkGame;
        $this->attribute = $attribute;
        $this->crawls = $crawls;
        $this->ultity = $ultity;
        $this->gameRepository = $gameRepository;
        $this->categoryRepository = $categoryRepository;
        $this->ignoreLink = $ignoreLink;
    }

    public function getLinkGameItchIo()
    {
        $break = false;
        $attrA = $this->attribute::LIST_ATTRIBUTE[$this->linkGame::GAME_ITCHIO];
        $attrImg = '.lazy_loaded';
        $page = 1;
        $count = 0;
        $breakCount = env('BREAK_COUNT', -1); //change this for break by count game ( default -1 = non break )
        $breakPage = env('BREAK_PAGE', -1); //change this for break by count page ( default -1 = non break )
        $listResultSrcFrame = [];
        $listResultGameDone = [];

        while (!$break) {
            $url = $this->linkGame::GAME_ITCHIO;
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

            if ($content == null || empty($content)) {
                $page++;
                continue;
            }

            $listA = $this->crawls->getListAttribute($content, $attrA, 'file');
            $listImg = $this->crawls->getListAttribute($content, $attrImg, 'file');
            $listNameGame = [];

            foreach ($listA as $item) {
                $link = "";
                if (!empty($item->attr)) {
                    $link = $item->attr["href"];
                    $listLink[]['link'] = $link;
                }
            }

            foreach ($listLink as $key => $link) {
                if (!array_key_exists('link', $link)) {
                    unset($listLink[$key]);
                    continue;
                }
                $path = parse_url($link['link'], PHP_URL_PATH);
                $gameName = substr($path, 1);
                $listLink[$gameName] = $listLink[$key];
                $listNameGame[] = $gameName;
                unset($listLink[$key]);
            }

            foreach ($listImg as $key => $link) {
                $listImg[$listNameGame[$key]] = $listImg[$key];
                unset($listImg[$key]);
            }

            foreach ($listImg as $key => $img) {
                $link = "";
                if (!empty($img->attr)) {
                    $link = $img->attr['data-lazy_src'];
                    $file_name = basename($link);
                    $pathSave = asset('images/games');
                    $path = $pathSave . '/' . $file_name;
                    $listLink[$key]['thumb'] = $path;
                    $listLink[$key]['file_name'] = $file_name;
                }
            }

            $resultGetSrcFrame = $this->processGameWithListLinks($listLink);

            if (!empty($resultGetSrcFrame)) {
                $listResultSrcFrame = array_merge($listResultSrcFrame, $resultGetSrcFrame['listSrcFrame']);
                $listResultGameDone = array_merge($listResultGameDone, $resultGetSrcFrame['listGameDone']);
                foreach ($listImg as $key => $value) {
                    if (in_array($key, $resultGetSrcFrame['listGameDone'])) {
                        if (!empty($value->attr)) {
                            $link = $value->attr['data-lazy_src'];
                            $file_name = basename($link);
                            $this->saveImageThumb($link, $file_name);
                        }
                    }
                }
            }

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
            'listGameDone' => $listResultGameDone,
        ];

        return \response()->json($response);
    }

    public function processGameWithListLinks($listLink)
    {
        if (empty($listLink)) {
            return [];
        }

        foreach ($listLink as $key => $link) {
            if (!array_key_exists('link', $link)) {
                continue;
            }

            if(in_array($link, $this->ignoreLink::LIST_IGNORE)) {
                continue;
            }

            $path = parse_url($link['link'], PHP_URL_PATH);
            $gameName = substr($path, 1);
            $html = $this->crawls->getDom($link['link'], null);

            if ($html == null or empty($html)) {
                continue;
            }

            $data = [
                'name' => $gameName,
                'link' => $link['link'],
                'thumbs' => array_key_exists('thumb', $link) ? $link['thumb']  : 'non-thumb',
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
            $this->gameRepository->create($data);

            if (array_key_exists('general', $data)) {
                $queryCate = $this->categoryRepository->getByColumn($data['general'], 'name');
                if (empty($queryCate)) {
                    $dataCate = [
                        'name' => $data['general']
                    ];
                    $this->categoryRepository->create($dataCate);
                }
            }

            $listGameDone[] = $key;

            $srcFrame = html_entity_decode($getFrame[0]->attr['data-iframe']);
            $parseFrame = $this->crawls->getDom($srcFrame, 'file');
            $getChild = $parseFrame->childNodes();
            $src = $getChild[0]->attr['src'];
            $listSrcFrame[] = $src;

            $returnList['listGameDone'] = $listGameDone;
            $returnList['listSrcFrame'] = $listSrcFrame;
        }

        if (empty($returnList['listSrcFrame'])) {
            return [];
        }

        return $returnList;
    }

    public function saveImageThumb($url, $fileName)
    {
        $content = file_get_contents($url);
        if (!Storage::disk('public-images-game')->has($fileName)) {
            Storage::disk('public-images-game')->put($fileName, $content);
        }
    }
}
