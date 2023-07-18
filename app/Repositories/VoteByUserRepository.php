<?php

namespace App\Repositories;

use App\Models\Vote;

class VoteByUserRepository extends BaseRepository
{
    public function model()
    {
        return VoteByUserRepository::class;
    }
}
