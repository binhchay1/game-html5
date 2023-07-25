<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupLaravelForServer extends Command
{
    protected $signature = 'app:create-server';
    protected $description = 'All commands for create laravel in server';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Artisan::call("migrate");
        dump('------------Migrate successful------------');

        Artisan::call("db:seed");
        dump('------------DB:Seed successful------------');

        Artisan::call("app:crawls-and-store-information-of-game");
        dump('------------Get Information successful------------');

        Artisan::call("app:create-vote-for-game");
        dump('------------Create Vote For Game successful------------');
    }
}
