<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteGameUnused extends Command
{
    protected $signature = 'app:delete-game-unused';
    protected $description = 'Delete all of game unused with status 0 and empty thumbs';
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
                    if (empty($game['thumbs'])) {
                        if (!empty($game['icon'])) {
                            $pathIcon = public_path() . $game['icon'];
                            if (file_exists($pathIcon)) {
                                unlink($pathIcon);
                            }
                        }

                        if (!empty($game['background'])) {
                            $pathBackground = public_path() . $game['background'];
                            if (file_exists($pathBackground)) {
                                unlink($pathBackground);
                            }
                        }

                        $pathGame = public_path()  . '/source-game//' . $game['name'];
                        File::deleteDirectory($pathGame);
                        $game->delete();

                        if (empty($game['name']) or !isset($game['name'])) {
                            $game['name'] = 'other game';
                        }

                        dump("---------Deleted game : " . $game['name'] . "---------");
                    } else {
                        $pathThumb = public_path() . $game['thumbs'];
                        $parse = parse_url($game['link']);

                        if (!file_exists($pathThumb) or array_key_exists('host', $parse)) {
                            if (!empty($game['icon'])) {
                                $pathIcon = public_path() . $game['icon'];
                                if (file_exists($pathIcon)) {
                                    unlink($pathIcon);
                                }
                            }

                            if (!empty($game['background'])) {
                                $pathBackground = public_path() . $game['background'];
                                if (file_exists($pathBackground)) {
                                    unlink($pathBackground);
                                }
                            }

                            $pathGame = public_path()  . '/source-game//' . $game['name'];
                            File::deleteDirectory($pathGame);
                            $game->delete();

                            if (empty($game['name']) or !isset($game['name'])) {
                                $game['name'] = 'other game';
                            }

                            dump("---------Deleted game : " . $game['name'] . "---------");
                        }
                    }
                    continue;
                }

                $parse = parse_url($game['link']);
                if (!array_key_exists('host', $parse)) {
                    if (!empty($game['thumbs'])) {
                        continue;
                    }
                }

                if (!empty($game['icon'])) {
                    $pathIcon = public_path() . $game['icon'];
                    if (file_exists($pathIcon)) {
                        unlink($pathIcon);
                    }
                }

                if (!empty($game['background'])) {
                    $pathBackground = public_path() . $game['background'];
                    if (file_exists($pathBackground)) {
                        unlink($pathBackground);
                    }
                }

                if (!empty($game['thumbs'])) {
                    $pathThumb = public_path() . $game['thumbs'];
                    if (file_exists($pathThumb)) {
                        unlink($pathThumb);
                    }
                }

                $pathGame = public_path()  . '/source-game//' . $game['name'];
                File::deleteDirectory($pathGame);
                $game->delete();

                if (empty($game['name']) or !isset($game['name'])) {
                    $game['name'] = 'other game';
                }

                dump("---------Deleted game : " + $game['name'] + "---------");
            }

            dump("---------Deleted all game unused on sever---------");
        } catch (Exception $e) {
            dump("---------" . $e . "---------");
        }
    }
}
