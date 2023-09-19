<?php

namespace App\Services;

use App\Repositories\AchievedRepository;

class Achieved
{
    protected $achievedRepository;

    public function __construct(AchievedRepository $achievedRepository)
    {
        $this->achievedRepository = $achievedRepository;
    }

    public function achieved($slug, $user_id)
    {
        $query = $this->achievedRepository->getBySlug($slug);
        if(empty($query)) {
            $data = [
                'user_id' => $user_id,
                'achievement_id' => $achievement_id
            ];

            $this->achievedRepository->create($data);
        } else {

        }
    }

    public function savePoints($points) {

    }
}
