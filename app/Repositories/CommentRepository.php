<?php

namespace App\Repositories;

use App\Models\patterns\Pattern;
use App\Models\patterns\Comment;
use App\Models\User;


class CommentRepository extends BaseRepository {

   public function getModel()
   {
       return Comment();
   }
    public function create(Pattern $pattern,User $user, $comment)
    {
        $comment = new Comment(compact('comment'));
        $comment->user_id = $user->id;
        $pattern->comments()->save($comment);
    }
}