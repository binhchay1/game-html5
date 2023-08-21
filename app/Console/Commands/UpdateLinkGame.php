<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;

class UpdateLinkGame extends Command
{
    protected $signature = 'test {--depth=0}';
    protected $description = 'Command description';
    private $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
        parent::__construct();
    }

    public function handle()
    {
        $depth = $this->option('depth');

        $finder = new Finder();

        $finder->directories()->depth($depth)->in(public_path('games'));
        $prefixDir = "/games";
        foreach ($finder as $dir)
        {
            $absoluteFilePath = $dir->getRealPath();
            $gameDir = $prefixDir.'/'.$dir->getRelativePathname();

            $fileIndex = $absoluteFilePath."/index.html";
            if(is_file($fileIndex)){
                $tmp = explode(DIRECTORY_SEPARATOR, $dir->getRelativePathname());
                $gameName = $tmp[0];
            }
            $this->gameRepository->updateLinkGame($gameName, $gameDir);
        }

        dump("---------Updated link game on sever---------");
    }
}
