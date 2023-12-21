<?php

namespace App\Console\Commands;

use App\Enums\IconGame;
use App\Repositories\TagRepository;
use Illuminate\Console\Command;

class AddTagsToTable extends Command
{
    protected $signature = 'app:add-tags-to-table';
    protected $description = 'Add tags to table';
    private $iconGame;
    private $tagRepository;

    public function __construct(IconGame $iconGame, TagRepository $tagRepository)
    {
        $this->iconGame = $iconGame;
        $this->tagRepository = $tagRepository;
        parent::__construct();
    }

    public function handle()
    {
        $getTag = $this->iconGame::LIST_ICON;

        foreach ($getTag as $key => $icon) {
            $tag = [
                'name' => $key,
                'icon' => $icon,
                'status' => 0
            ];

            $this->tagRepository->create($tag);
        }

        dump('------------------ Created all tags ------------------');
    }
}
