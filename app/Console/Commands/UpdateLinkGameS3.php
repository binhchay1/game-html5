<?php

namespace App\Console\Commands;

use App\Repositories\GameRepository;
use Illuminate\Console\Command;
use Aws\S3\S3Client;

class UpdateLinkGameS3 extends Command
{
    protected $signature = 'app:update-link-game-s3';
    protected $description = 'Get Link Game from S3 and update db';
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
        $this->updateLinkGameS3();
    }

    public function updateLinkGameS3()
    {
        $results = $this->s3Instance->getPaginator('ListObjects', [
            'Bucket' => env('AWS_BUCKET'),
            "Prefix" => "games/"
        ]);

        $this->gameRepository->updateStatusToHide();

        foreach ($results as $result) {
            $content = $result->toArray();
            foreach ($content['Contents'] as $key => $object) {
                if ($key == 0) {
                    continue;
                }

                if (strpos($object['Key'], 'index.html')) {
                    $explode = explode('/', $object['Key']);
                    $gameName = $explode[1];
                    $dataUpdate = [
                        'link' => env('AWS_URL_MAIN') . $object['Key'],
                        'status' => 1
                    ];
                    $this->gameRepository->updateGameWithLinkS3($gameName, $dataUpdate);
                }
            }
        }

        dump("---------Updated link game on s3---------");
    }
}
