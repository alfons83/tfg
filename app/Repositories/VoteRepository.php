<?php
 namespace App\Repositories;


 use App\Models\patterns\Pattern;
 use App\Models\User;


class VoteRepository {

    public function vote(User $user, Pattern $pattern)
    {
        if ($user->hasVoted($pattern)) return false;
        $user->voted()->attach($pattern);
        return true;
    }

    public function unvote(User $user, Pattern $pattern)
    {
        if (! $user->hasVoted($pattern)) return false;
        $user->voted()->detach($pattern);
        return true;
    }
}