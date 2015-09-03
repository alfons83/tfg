<?php

namespace App\Http\Controllers\home;

use App\Models\patterns\Pattern;
use App\Models\patterns\Comment;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use App\Repositories\CommentRepository;
use App\Repositories\PatternRepository;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{


    function currentUser()
    {
        return auth()->user();
    }

    public function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    public function findOrFail($id)
    {
        return $this->newQuery()->findOrFail($id);
    }


    public function submit($id, Request $request, Guard $auth)
    {
        $this->validate($request, [
            'comment' => 'required|max:250'

        ]);

        $pattern = $this->findOrFail($id);

        $this->create(
            $pattern,
            currentUser(),
            $request->get('comment')
        );

        session()->flash('success', 'Tu comentario fue guardado exitosamente');
        return redirect()->back();
    }

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
