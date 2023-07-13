<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        exec("php artisan migrate");
        dump('------------Migrate successful------------');

        exec("php artisan db:seed");
        dump('------------DB:Seed successful------------');

        // $total = exec("app:crawls-and-store-information-of-game");
        // dump('------------DB:Seed successful------------');

        // exec("php artisan app:create-vote-for-game");
        // dump('------------Create Vote For Game successful------------');
    }
}
