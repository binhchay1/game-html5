<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => env('ROOT_STORAGE', storage_path('app')),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'public-images-game-icon' => [
            'driver' => 'local',
            'root' => public_path() . '/images/games/icon',
            'url' => env('APP_URL') . '/images/games/icon',
            'visibility' => 'public',
            'throw' => false,
        ],

        'public-images-game-thumb' => [
            'driver' => 'local',
            'root' => public_path() . '/images/games/thumb',
            'url' => env('APP_URL') . '/images/games/thumb',
            'visibility' => 'public',
            'throw' => false,
        ],

        'public-images-game-background' => [
            'driver' => 'local',
            'root' => public_path() . '/images/games/background',
            'url' => env('APP_URL') . '/images/games/background',
            'visibility' => 'public',
            'throw' => false,
        ],

        'public-source-game' => [
            'driver' => 'local',
            'root' => public_path() . '/source-game',
            'url' => env('APP_URL') . '/source-game',
            'visibility' => 'public',
            'throw' => false,
        ],

        'public-user-avatar' => [
            'driver' => 'local',
            'root' => public_path() . '/images/users/avatar',
            'url' => env('APP_URL') . '/images/users/avatar',
            'visibility' => 'public',
            'throw' => false,
        ],

        'public-icon-achievement' => [
            'driver' => 'local',
            'root' => public_path() . '/images/achievement/icon',
            'url' => env('APP_URL') . '/images/achievement/icon',
            'visibility' => 'public',
            'throw' => false,
        ],

        'public-post' => [
            'driver' => 'local',
            'root' => public_path() . '/images/posts/',
            'url' => env('APP_URL') . '/images/posts/',
            'visibility' => 'public',
            'throw' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
