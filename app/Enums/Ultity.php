<?php

namespace App\Enums;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use App\Enums\ElementReplace;
use Illuminate\Support\Str;

final class Ultity
{
    private $linkGame;
    private $elementReplace;

    public function __construct(LinkGame $linkGame, ElementReplace $elementReplace)
    {
        $this->linkGame = $linkGame;
        $this->elementReplace = $elementReplace;
    }

    public function paginate($items, $perPage = 15, $path = null, $pageName = 'page', $page = null, $options = [])
    {
        $page = $page ?: Paginator::resolveCurrentPage($pageName);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $options = ['path' => $path];

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function storeImage($image, $path)
    {
        $image_name = $image->getClientOriginalName();
        $image_add = time() . '_' . $image_name;
        $image->move(public_path($path), $image_add);

        $pathFull = "$path/$image_add";

        return $pathFull;
    }

    public function downloadFile($url, $filename)
    {
        Storage::disk('local')->put($filename, file_get_contents($url));
        $url = Storage::path($filename);

        return response()->download($url);
    }

    public function replaceHTML($line, $url, $data, $contentResult)
    {
        switch ($url) {
            case $this->linkGame::GAME_ITCHIO:
                $listReplace = $this->elementReplace::LIST_ITCHIO;

                dd($contentResult);
                if (strpos($line, '<meta charset="UTF-8">') !== false) {
                    // $replace = "@include('includes.header-meta')\n";
                    // $result = str_replace($line, $replace, $contentResult);

                    return $result;
                }

                if (strpos($line, "</script><style type=") !== false) {
                    $replace = "";
                    dd($contentResult);
                    $result = str_replace("}</script>", $replace, $contentResult);

                    return $result;
                }

                foreach ($listReplace as $str) {
                    if (strpos($line, $str) !== false) {
                        $replace = "";
                        dd($contentResult);
                        $result = str_replace($line, $replace, $contentResult);

                        return $result;
                    }
                }

                break;
        }
    }
}
