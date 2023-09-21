<?php

namespace Tests\Unit;

use App\Models\Achievement;
use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\Game;
use App\Models\IpUser;
use App\Models\Point;
use App\Models\PointLog;
use App\Models\Search;
use App\Models\User;
use App\Models\Vote;
use App\Models\VoteByUser;
use Tests\TestCase;

class ModelTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_create_user(): void
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
        $this->assertSoftDeleted($user);
        $user->delete();
        $this->assertModelMissing($user);
    }

    public function test_create_achievement(): void
    {
        $achievement = Achievement::factory()->create();
        $this->assertModelExists($achievement);
        $this->assertNoSoftDeleted($achievement);
        $achievement->delete();
        $this->assertModelMissing($achievement);
    }

    public function test_create_game(): void
    {
        $game = Game::factory()->create();
        $this->assertModelExists($game);
        $this->assertNoSoftDeleted($game);
        $game->delete();
        $this->assertModelMissing($game);
    }

    public function test_create_vote(): void
    {
        $vote = Vote::factory()->create();
        $this->assertModelExists($vote);
        $this->assertNoSoftDeleted($vote);
        $vote->delete();
        $this->assertModelMissing($vote);
    }

    public function test_create_point(): void
    {
        $point = Point::factory()->create();
        $this->assertModelExists($point);
        $this->assertNoSoftDeleted($point);
        $point->delete();
        $this->assertModelMissing($point);
    }

    public function test_create_search(): void
    {
        $search = Search::factory()->create();
        $this->assertModelExists($search);
        $this->assertNoSoftDeleted($search);
        $search->delete();
        $this->assertModelMissing($search);
    }

    public function test_create_subscrible(): void
    {
        $subscrible = Game::factory()->create();
        $this->assertModelExists($subscrible);
        $this->assertNoSoftDeleted($subscrible);
        $subscrible->delete();
        $this->assertModelMissing($subscrible);
    }

    public function test_create_friend(): void
    {
        $friend = Friend::factory()->create();
        $this->assertModelExists($friend);
        $this->assertNoSoftDeleted($friend);
        $friend->delete();
        $this->assertModelMissing($friend);
    }

    public function test_create_points_log(): void
    {
        $pointLog = PointLog::factory()->create();
        $this->assertModelExists($pointLog);
        $this->assertNoSoftDeleted($pointLog);
        $pointLog->delete();
        $this->assertModelMissing($pointLog);
    }

    public function test_create_friend_request(): void
    {
        $friendRequest = FriendRequest::factory()->create();
        $this->assertModelExists($friendRequest);
        $this->assertNoSoftDeleted($friendRequest);
        $friendRequest->delete();
        $this->assertModelMissing($friendRequest);
    }

    public function test_create_vote_by_user(): void
    {
        $voteByUser = VoteByUser::factory()->create();
        $this->assertModelExists($voteByUser);
        $this->assertNoSoftDeleted($voteByUser);
        $voteByUser->delete();
        $this->assertModelMissing($voteByUser);
    }

    public function test_create_ip_user(): void
    {
        $ipUser = IpUser::factory()->create();
        $this->assertModelExists($ipUser);
        $this->assertSoftDeleted($ipUser);
        $ipUser->delete();
        $this->assertModelMissing($ipUser);
    }
}
