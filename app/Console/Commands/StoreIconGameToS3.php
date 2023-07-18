<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use Illuminate\Console\Command;
use Aws\CommandPool;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use Illuminate\Support\Facades\Storage;

class StoreIconGameToS3 extends Command
{
    protected $signature = 'app:store-icon-game-to-s3';
    protected $description = 'Store icon of game to s3 storage';
    private $gameRepository;
    protected $s3Instance;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->s3Instance = new S3Client([
            'version' => 'latest',
            'region'  => env('AWS_DEFAULT_REGION', 'us-west-2')
        ]);
        parent::__construct();
    }

    public function handle()
    {
        $this->uploadFileToS3();
    }

    public function uploadFileToS3()
    {
        try {
            $commands = $this->getLocalFiles()
                ->map(function ($value, $key) {
                    return $this->s3Instance->getCommand('PutObject', [
                        'Bucket' => env('AWS_BUCKET'),
                        'Key' => 'images/games/icon' . $key,
                        'Body' => $value,
                    ]);
                });

            $result = CommandPool::batch($this->s3Instance, $commands);

            foreach ($result as $record) {
                $data = $record->toArray();
                $url = $data['ObjectURL'];

                $parse = parse_url($url);
                $explode = explode('/', $parse['path']);
                $fileName = end($explode);
                $this->gameRepository->updateGameNameByThumbs($fileName, $url);
            }
        } catch (AwsException $ex) {
            error_log($ex->getMessage());
        }
    }

    public function getLocalFiles()
    {
        $data = collect(Storage::disk('public-images-game-icon')->allFiles())
            ->mapWithKeys(function ($fileName) {
                return [$fileName => Storage::disk('public-images-game-icon')->get($fileName)];
            });

        return $data;
    }
}
