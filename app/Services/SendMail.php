<?php

namespace App\Services;

use App\Jobs\SendNewGameEmail;
use App\Repositories\UserRepository;

class SendMail
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function send($mail, $type, array $data = null)
    {
        if ($type == 'new-game') {
            $newGJob = new SendNewGameEmail($mail, $data);
            dispatch($newGJob);
        }
    }
}
