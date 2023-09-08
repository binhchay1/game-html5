<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use Illuminate\Console\Command;

class DeleteTags extends Command
{
    protected $signature = 'app:delete-tags';
    protected $description = 'Delete tags from the database';
    protected $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
        parent::__construct();
    }

    public function handle()
    {
        $this->deleteTags();
    }

    public function deleteTags()
    {
        try {
            $games = $this->gameRepository->get();
            $listTagsWithIcon = \App\Enums\IconGame::LIST_ICON;
            $listDelete = [];

            foreach ($games as $game) {
                $tagDecode = json_decode($game['tag']);
                foreach ($tagDecode as $tag) {
                    if (!array_key_exists($tag, $listTagsWithIcon)) {
                        $listDelete[] = $tag;
                    }
                }
            }

            foreach ($games as $game) {
                $tagDecode = json_decode($game['tag']);
                $newListTag = [];
                foreach ($tagDecode as $tag) {
                    if (!in_array($tag, $listDelete)) {
                        $newListTag[] = $tag;
                    }
                }

                $data = [
                    'tag' => json_encode($newListTag)
                ];
                $this->gameRepository->updateById($game->id, $data);
            }

            dump("---------Deleted tag of game unused on sever---------");
        } catch (Exception $e) {
            dump("---------" . $e . "---------");
        }
    }
}
