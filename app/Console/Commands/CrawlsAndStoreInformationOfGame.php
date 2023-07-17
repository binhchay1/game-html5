<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Enums\LinkGame;
use App\Enums\Attribute;
use App\Enums\ListLink;
use App\Enums\Ultity;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;
use Illuminate\Support\Facades\Storage;
use App\Services\Crawls;

class CrawlsAndStoreInformationOfGame extends Command
{
    protected $signature = 'app:crawls-and-store-information-of-game';
    protected $description = 'Command description';
    private $linkGame;
    private $attribute;
    private $crawls;
    private $gameRepository;
    private $ListLink;

    public function __construct(
        LinkGame $linkGame,
        Attribute $attribute,
        Crawls $crawls,
        Ultity $ultity,
        GameRepository $gameRepository,
        CategoryRepository $categoryRepository,
        ListLink $ListLink
    ) {
        $this->linkGame = $linkGame;
        $this->attribute = $attribute;
        $this->crawls = $crawls;
        $this->ultity = $ultity;
        $this->gameRepository = $gameRepository;
        $this->categoryRepository = $categoryRepository;
        $this->ListLink = $ListLink;
        parent::__construct();
    }

    public function handle()
    {
        $this->getLinkGameItchIo();
    }

    public function getLinkGameItchIo()
    {
        $break = false;
        $attrA = $this->attribute::LIST_ATTRIBUTE[$this->linkGame::GAME_ITCHIO];
        $attrImg = '.lazy_loaded';
        $page = env('PAGE_GET_GAME', 1);
        $count = 0;
        $breakCount = env('BREAK_COUNT', -1); //change this for break by count game ( default -1 = non break )
        $breakPage = env('BREAK_PAGE', -1); //change this for break by count page ( default -1 = non break )
        $listResultSrcFrame = [];
        $listResultGameDone = [];

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

            dump('------------------ Start Page ' . $page . ' ------------------');
            $url = $this->linkGame::GAME_ITCHIO;
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
            $listLink = [];

            foreach ($listA as $item) {
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
                if (!empty($img->attr)) {
                    $link = $img->attr['data-lazy_src'];
                    $file_name = basename($link);
                    $pathSave = asset('images/games/thumb');
                    $file_name = str_replace("%2", "G", $file_name);
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
                            $this->saveImage($link, $file_name, 'thumb');
                        }
                    }
                }

                $count = $count + count($resultGetSrcFrame['listGameDone']);
            }
            dump('------------------ Total Game : ' . $count . ' ------------------');
            dump('------------------ End Page ' . $page . ' ------------------');

            $page++;
        }

        // foreach ($listResultSrcFrame as $linkSrcFrame) {
        //     $pathProcess = public_path() . '/process/list.txt';
        //     $fp = fopen($pathProcess, 'a');
        //     fwrite($fp, $linkSrcFrame . PHP_EOL);
        //     fclose($fp);
        // }
    }

    public function processGameWithListLinks($listLink)
    {
        if (empty($listLink)) {
            return [];
        }

        foreach ($listLink as $key => $link) {
            if (!array_key_exists('link', $link) or !array_key_exists('link', $link)) {
                continue;
            }

            if (in_array($link['link'], $this->ListLink::LIST_IGNORE)) {
                continue;
            }

            $path = parse_url($link['link'], PHP_URL_PATH);
            $gameName = substr($path, 1);
            $html = $this->crawls->getDom($link['link'], null);

            $data = [
                'name' => $gameName,
                'link' => $link['link'],
                'thumbs' => $link['thumb'],
            ];

            $getA = $html->find('a');
            $getFrame = $html->find('div[class=iframe_placeholder]');

            if (empty($getFrame)) {
                continue;
            }

            // $query = $this->gameRepository->getByColumn($data['name'], 'name');
            // if (!empty($query)) {
            //     continue;
            // }

            $linkStyle = $html->find('link');
            $styleElement = $html->find('style');

            foreach ($styleElement as $style) {
                if (isset($style->attr)) {
                    if (array_key_exists('type', $style->attr)) {
                        if ($style->attr['id'] == 'game_theme') {
                            $background = $this->breakCSS($style->innertext);
                            $pathSave = asset('images/games/background');
                            $file_name = str_replace("%2", "G", $background['image']);
                            $path = $pathSave . '/' . $file_name;
                            $data['background'] = $path;
                            $fileNameToSave = basename($background['image']);
                            $this->saveImage($background['image'], $fileNameToSave, 'background');
                            break;
                        }
                    }
                }
            }

            foreach ($linkStyle as $link) {
                if (isset($link->attr)) {
                    if (array_key_exists('type', $link->attr)) {
                        if ($link->attr['type'] == 'image/png') {
                            $pathSave = asset('images/games/icon');
                            $file_name = str_replace("%2", "G", $link->attr['href']);
                            $path = $pathSave . '/' . $file_name;
                            $data['icon'] = $path;
                            $fileNameToSave = basename($background['image']);
                            $this->saveImage($link->attr['href'], $fileNameToSave, 'background');
                            break;
                        }
                    }
                }
            }


            $listTagGames = [];
            foreach ($getA as $a) {
                if (array_key_exists('href', $a->attr)) {
                    if (strpos($a->attr['href'], 'https://itch.io/games/genre') !== false) {
                        $explode = explode('-', $a->attr['href']);
                        $data['category'] = $explode[1];
                    }

                    if (strpos($a->attr['href'], 'https://itch.io/games/tag') !== false) {
                        $explode = explode('-', $a->attr['href']);
                        $listTagGames[] = $explode[1];
                    }
                }
            }
            $data['tag'] = json_encode($listTagGames);
            $this->gameRepository->create($data);

            if (array_key_exists('category', $data)) {
                $queryCate = $this->categoryRepository->getByColumn($data['category'], 'name');
                if (empty($queryCate)) {
                    $dataCate = [
                        'name' => $data['category']
                    ];
                    $this->categoryRepository->create($dataCate);
                }
            } else {
                $queryCate = $this->categoryRepository->getByColumn('other', 'name');
                if (empty($queryCate)) {
                    $dataCate = [
                        'name' => 'other'
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

            $returnList = [
                'listGameDone' => $listGameDone,
                'listSrcFrame' => $listSrcFrame
            ];
        }

        if (empty($returnList['listSrcFrame']) and empty($returnList['listGameDone'])) {
            return [];
        }

        return $returnList;
    }

    public function saveImage($url, $fileName, $type)
    {
        $content = file_get_contents($url);
        $path = 'public-images-game-' . $type;
        $fileName = str_replace("%2", "G", $fileName);
        if (!Storage::disk($path)->has($fileName)) {
            Storage::disk($path)->put($fileName, $content);
        }
    }

    function breakCSS($css)
    {
        $background = array();
        preg_match_all('/(.+?)\s?\{\s?(.+?)\s?\}/', $css, $matches);
        $arrClasses = $matches[1];
        foreach ($matches[0] as $i => $original) {
            if ($arrClasses[$i] == '.wrapper') {
                $explodeExp = explode(';', $matches[2][$i]);
                foreach ($explodeExp as $attr) {
                    if (strlen(trim($attr)) > 0) {
                        $explodeAttr = explode(':', $attr);
                        if (count($explodeAttr) == 2) {
                            list($name, $value) = $explodeAttr;
                            if (trim($name) == 'background-color') {
                                $background['color'] = trim($value);
                            }
                            if (strpos(trim($name), 'background-image')) {
                                $background['image'] = trim($value);
                            }
                        } elseif (count($explodeAttr) == 3) {
                            list($name, $value, $important) = $explodeAttr;
                            if (trim($name) == 'background-color') {
                                $background['color'] = trim($value);
                            }
                            if (strpos(trim($name), 'background-image')) {
                                $background['image'] = trim($important);
                            }
                        } else {
                            continue;
                        }
                    }
                }

                continue;
            }
        }

        if (array_key_exists('image', $background)) {
            $stringImage = $background['image'];
            $background['image'] = trim(str_replace(")", "", $stringImage));
        }

        return $background;
    }
}
