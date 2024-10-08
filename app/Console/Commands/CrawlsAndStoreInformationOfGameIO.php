<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Enums\LinkGame;
use App\Enums\Ultity;
use App\Repositories\CategoryRepository;
use App\Repositories\GameRepository;
use Illuminate\Support\Facades\Storage;
use App\Services\Crawls;

class CrawlsAndStoreInformationOfGameIO extends Command
{
    protected $signature = 'app:crawls-and-store-information-of-game-itchio';
    protected $description = 'Get information of game with link itch.io';
    private $linkGame;
    private $crawls;
    private $gameRepository;
    private $categoryRepository;

    public function __construct(
        LinkGame $linkGame,
        Crawls $crawls,
        Ultity $ultity,
        GameRepository $gameRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->linkGame = $linkGame;
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
        $attrA = '.thumb_link';
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
            $listLink = [];

            foreach ($listA as $item) {
                if (!empty($item->attr)) {
                    $link = $item->attr["href"];
                    $childNode = $item->childNodes();
                    $linkGame = parse_url($link, PHP_URL_PATH);
                    $gameName = substr($linkGame, 1);
                    $listLink[$gameName]['link'] = $link;

                    if (!empty($childNode)) {
                        if (!empty($childNode[0]->attr)) {
                            if (array_key_exists("data-lazy_src", $childNode[0]->attr)) {
                                $link = $childNode[0]->attr['data-lazy_src'];
                                $file_name = basename($link);
                                $pathSave = asset('images/games/thumb');
                                $file_name = str_replace("%2", "G", $file_name);
                                $path = $pathSave . '/' . $file_name;
                                $listLink[$gameName]['thumb'] = $path;
                                $listLink[$gameName]['file_name'] = $file_name;
                                $listLink[$gameName]['base_thumb'] = $link;
                            }
                        }
                    }
                }
            }

            $resultGetSrcFrame = $this->processGameWithListLinks($listLink);

            if (!empty($resultGetSrcFrame)) {
                $listResultSrcFrame = array_merge($listResultSrcFrame, $resultGetSrcFrame['listSrcFrame']);
                $listResultGameDone = array_merge($listResultGameDone, $resultGetSrcFrame['listGameDone']);
                foreach ($listLink as $key => $value) {
                    if (in_array($key, $resultGetSrcFrame['listGameDone'])) {
                        $file_name = basename($value['base_thumb']);
                        $this->saveImage($value['base_thumb'], $file_name, 'thumb');
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
            if (!array_key_exists('link', $link) or !array_key_exists('thumb', $link)) {
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
            $getFrame = $html->getElementByTagName('iframe');

            if (empty($getFrame)) {
                $getFrame = $html->find('div[class=iframe_placeholder]');

                if (empty($getFrame)) {
                    continue;
                }

                $srcFrame = html_entity_decode($getFrame[0]->attr['data-iframe']);
                $parseFrame = $this->crawls->getDom($srcFrame, 'file');
                $getChild = $parseFrame->childNodes();
                $src = $getChild[0]->attr['src'];
            } else {
                $src = $getFrame->attr['src'];
            }

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
                                $pathSave = asset('images/games/background');
                                $fileNameToSave = basename($background['image']);
                                $file_name = str_replace("%2", "G", $fileNameToSave);
                                $path = $pathSave . '/' . $file_name;
                                $data['background'] = $path;
                                $background['image'] = 'https:' . $background['image'];
                                $this->saveImage($background['image'], $fileNameToSave, 'background');
                            }
                            $data['color'] = $background['color'];
                            break;
                        }
                    }
                }
            }

            foreach ($linkStyle as $link) {
                if (isset($link->attr)) {
                    if (array_key_exists('type', $link->attr)) {
                        if ($link->attr['type'] == 'image/png' or $link->attr['type'] == 'image/gif') {
                            $pathSave = asset('images/games/icon');
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
            "ssl" => array(
                "ignore_errors" => true,
            ),
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
        }

        if (array_key_exists('image', $background)) {
            $stringImage = $background['image'];
            $background['image'] = trim(str_replace(")", "", $stringImage));
        }

        return $background;
    }
}
