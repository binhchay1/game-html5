<?php

namespace App\Repositories;

use App\Models\Vote;

class VoteRepository extends BaseRepository
{
    public function model()
    {
        return Vote::class;
    }
}
