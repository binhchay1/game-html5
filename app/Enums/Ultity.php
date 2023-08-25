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

    public function saveImage($input)
    {
        if ($input['image']) {
            $file = $input['image'];

            $typeFile = $file->getClientOriginalExtension();
            if ($typeFile == 'png' || $typeFile == 'jpg' || $typeFile == 'jpeg' ) {
                $fileSize = $file->getSize();
                if ($fileSize <= 1024000) {
                    $fileName = $file->getClientOriginalName();
                    $file->move('images/games/user', $fileName);
                    return $fileName;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        } else {
            return false;
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

    public function storeGameS3($data)
    {
        $path = 'games/' . $data['name'];
        foreach ($data['source'] as $value) {
            $result = Storage::disk('s3')->put($path, $value);
            if ($value->getClientOriginalName() == 'index.html') {
                $path = Storage::disk('s3')->url($result);
            }
        }

        return $path;
    }
}
