<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteImageUnused extends Command
{
    protected $signature = 'app:delete-image-unused';
    protected $description = 'Delete image of game unused with status 0';
    protected $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
        parent::__construct();
    }

    public function handle()
    {
        $this->deleteImageUnused();
    }

    public function deleteImageUnused()
    {
        $games = $this->gameRepository->get();

        try {
            foreach ($games as $game) {
                if ($game['status'] == 1) {
                    continue;
                }

                if (!empty($game['icon'])) {
                    $pathIcon = public_path() . $game['icon'];
                    unlink($pathIcon);
                }

                if (!empty($game['background'])) {
                    $pathBackground = public_path() . $game['background'];
                    unlink($pathBackground);
                }

                if (!empty($game['thumbs'])) {
                    $pathThumb = public_path() . $game['thumbs'];
                    unlink($pathThumb);
                }
            }

            dump("---------Deleted all images of game on sever---------");
        } catch (Exception $e) {
            dump("---------" . $e . "---------");
        }
    }
}
