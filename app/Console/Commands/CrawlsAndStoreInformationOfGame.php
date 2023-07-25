<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Enums\LinkGame;
use App\Enums\Attribute;
use App\Enums\Ultity;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;
use Illuminate\Support\Facades\Storage;
use App\Services\Crawls;

class CrawlsAndStoreInformationOfGame extends Command
{
    protected $signature = 'app:crawls-and-store-information-of-game';
    protected $description = 'Get information of game with link itch.io';
    private $linkGame;
    private $attribute;
    private $crawls;
    private $gameRepository;

    public function __construct(
        LinkGame $linkGame,
        Attribute $attribute,
        Crawls $crawls,
        Ultity $ultity,
        GameRepository $gameRepository,
        CategoryRepository $categoryRepository,
    ) {
        $this->linkGame = $linkGame;
        $this->attribute = $attribute;
        $this->crawls = $crawls;
        $this->ultity = $ultity;
        $this->gameRepository = $gameRepository;
        $this->categoryRepository = $categoryRepository;
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
                    $pathSave = storage_path('app/public') . '/images/games/thumb';
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

        foreach ($listResultSrcFrame as $nameOfGame => $linkSrcFrame) {
            $pathProcess = public_path() . '/process/list.txt';
            $fp = fopen($pathProcess, 'a');
            fwrite($fp, $linkSrcFrame . ' - ' . $nameOfGame . PHP_EOL);
            fclose($fp);
        }
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

            $path = parse_url($link['link'], PHP_URL_PATH);
            $gameName = substr($path, 1);
            $html = $this->crawls->getDom($link['link'], null);

            $data = [
                'name' => $gameName,
                'thumbs' => $link['thumb'],
            ];

            $getA = $html->find('a');
            $getFrame = $html->find('div[class=iframe_placeholder]');

            if (empty($getFrame)) {
                continue;
            }

            $srcFrame = html_entity_decode($getFrame[0]->attr['data-iframe']);
            $parseFrame = $this->crawls->getDom($srcFrame, 'file');
            $getChild = $parseFrame->childNodes();
            $src = $getChild[0]->attr['src'];

            $data['link'] = $src;

            $query = $this->gameRepository->getByColumn($data['name'], 'name');
            if (!empty($query)) {
                continue;
            }

            $linkStyle = $html->find('link');
            $styleElement = $html->find('style');

            foreach ($styleElement as $style) {
                if (isset($style->attr)) {
                    if (array_key_exists('type', $style->attr)) {
                        if ($style->attr['id'] == 'game_theme') {
                            $background = $this->breakCSS($style->innertext);
                            if (array_key_exists('image', $background)) {
                                $pathSave = storage_path('app/public') . '/images/games/background';
                                $fileNameToSave = basename($background['image']);
                                $file_name = str_replace("%2", "G", $fileNameToSave);
                                $path = $pathSave . '/' . $file_name;
                                $data['background'] = $path;
                                $background['image'] = 'https:' . $background['image'];
                                $this->saveImage($background['image'], $fileNameToSave, 'background');
                            }
                            $data['color'] = $background['color'];
                            $data['text-color'] = $background['text-color'];
                            break;
                        }
                    }
                }
            }

            foreach ($linkStyle as $link) {
                if (isset($link->attr)) {
                    if (array_key_exists('type', $link->attr)) {
                        if ($link->attr['type'] == 'image/png' or $link->attr['type'] == 'image/gif') {
                            $pathSave = storage_path('app/public') . '/images/games/icon';
                            $fileNameToSave = basename($link->attr['href']);
                            $file_name = str_replace("%2", "G", $fileNameToSave);
                            $path = $pathSave . '/' . $file_name;
                            $data['icon'] = $path;
                            $this->saveImage($link->attr['href'], $fileNameToSave, 'icon');
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
            $listSrcFrame[$key] = $src;

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
        $context = stream_context_create(array(
            'http' => array('ignore_errors' => true),
        ));

        $content = file_get_contents($url, false, $context);
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

            if ($arrClasses[$i] == '.inner_column h1,.inner_column h2,.inner_column h3,.inner_column h4,.inner_column h5,.inner_column h6') {
                $explodeExp = explode(';', $matches[2][$i]);
                foreach ($explodeExp as $attr) {
                    if (strlen(trim($attr)) > 0) {
                        $explodeAttr = explode(':', $attr);
                        if (count($explodeAttr) == 2) {
                            if ($explodeAttr[0] == 'color') {
                                list($name, $value) = $explodeAttr;
                                $background['text-color'] = trim($value);
                            }
                        } elseif (count($explodeAttr) == 3) {
                            if ($explodeAttr[0] == 'color') {
                                list($name, $value, $important) = $explodeAttr;
                                $background['text-color'] = trim($important);
                            }
                        } else {
                            continue;
                        }
                    }
                }
            }
        }

        if (array_key_exists('image', $background)) {
            $stringImage = $background['image'];
            $background['image'] = trim(str_replace(")", "", $stringImage));
        }

        return $background;
    }
}
