<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use Illuminate\Console\Command;

class UpdateLinkImage extends Command
{
    protected $signature = 'app:update-link-image';
    protected $description = 'Command description';
    private $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
        parent::__construct();
    }

    public function handle()
    {
        $this->updateLinkImage();
    }

    public function updateLinkImage()
    {
        $games = $this->gameRepository->get();

        foreach ($games as $game) {
            $data = [];
            if ($game['thumbs'] !== null) {
                $url = parse_url($game['thumbs']);
                $data['thumbs'] = $url['path'];
            }

            if ($game['icon'] !== null) {
                $url = parse_url($game['icon']);
                $data['icon'] = $url['path'];
            }

            if ($game['background'] !== null) {
                $url = parse_url($game['background']);
                $data['background'] = $url['path'];
            }

            $this->gameRepository->updateLinkImageById($game['id'], $data);
        }
    }
}
