<?php

namespace App\Enums;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

final class Ultity
{
    public function paginate($items, $perPage = 15, $path = null, $pageName = 'page', $page = null, $options = [])
    {
        $page = $page ?: Paginator::resolveCurrentPage($pageName);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $options = ['path' => $path];

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function saveImageGame($path, $content, $type)
    {
        if ($path and $content and $type) {
            $disk = 'public-images-game-' . $type;
            $status = Storage::disk($disk)->put($path, $content);

            return $status;
        }
    }

    public function saveImageUser($input)
    {
        if ($input) {
            $status = Storage::disk('public-user-avatar')->put($input['image']->getClientOriginalName(), $input['image']->get());

            return $status;
        }
    }

    public function saveImagePost($input)
    {
        if ($input) {
            $nameStore = $input['thumb']->getClientOriginalName() . '_' . strtotime(date('Y-m-d H:i:s'));
            $status = Storage::disk('public-post')->put($nameStore, $input['thumb']->get());

            return $status;
        }
    }

    public function saveImageIconAchievement($input)
    {
        if ($input) {
            $status = Storage::disk('public-icon-achievement')->put($input['icon']->getClientOriginalName(), $input['icon']->get());

            return $status;
        }
    }

    public function downloadFile($url, $filename)
    {
        Storage::disk('local')->put($filename, file_get_contents($url));
        $url = Storage::path($filename);

        return response()->download($url);
    }

    public function renameAndCalculateVote($games)
    {
        foreach ($games as $game) {
            $game['name'] = ucwords(str_replace('-', ' ', $game['name']));

            if (($game->votes['like'] + $game->votes['un_like']) == 0) {
                $game['rating'] = 100;
            } else {
                $game['rating'] = ($game->votes['like'] / ($game->votes['like'] + $game->votes['un_like'])) * 100;
            }
        }

        return $games;
    }

    public function rndRGBColorCode()
    {
        return 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')';
    }

    public function storeGame($data)
    {
        foreach ($data['source'] as $path => $file) {
            $result = Storage::disk('public-source-game')->put($path, $file->get());
            $return = [];
            $preFix = '/source-game//';
            if ($result) {
                $return['status'] = true;
                if ($file->getClientOriginalName() == 'index.html') {
                    $index = $preFix . $path;
                }
            } else {
                $return['status'] = false;
            }
        }

        if (isset($index)) {
            $return['index'] = $index;
        }

        return $return;
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
