<?php

namespace App\Console\Commands;

use Aws\CommandPool;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class StoreS3 extends Command
{
    protected $s3Instance;
    protected $signature = 'app:store-s3';
    protected $description = 'Store thumb of game to s3 storage';

    public function __construct()
    {
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
                        'Key' => $key,
                        'Body' => $value,
                    ]);
                });

            CommandPool::batch($this->s3Instance, $commands);
        } catch (AwsException $ex) {
            error_log($ex->getMessage());
        }

        echo 'Total execution batch multi upload: ';
    }

    public function getLocalFiles()
    {
        $data = collect(Storage::disk('public-images-game')->allFiles())
            ->mapWithKeys(function ($fileName) {
                return [$fileName => Storage::disk('public-images-game')->get($fileName)];
            });

        return $data;
    }
}
