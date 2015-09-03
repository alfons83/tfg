<?php

namespace App\Http\Controllers\admin\patterns;

use App\Models\patterns\Comment;
use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Comment::paginate();

        return view('admin.patterns.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.patterns.comments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Redirector $redirect)
    {
        $comments = Comment::create($request->all());
        return redirect()->route('admin.patterns.comments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $comments = User::findOrFail($id);

        if($comments)
            return view('admin.patterns.comments.view', compact('comments'));
        else
            return redirect()->route('admin.patterns.comments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $comments = Comment::findOrFail($id);
        return view('admin.patterns.comments.edit', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $comments = Comment::findOrFail($id);

        $comments->fill($request->all());
        $comments->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $comments = Comment::findOrFail($id);

        $comments->delete();

        $message = $comments->comment . ' fue eliminado de nuestros registros';

        if ($request->ajax()) {
            return response()->json([
                'id'      => $comments->id,
                'message' => $message
            ]);
        }

        Session::flash('message', $message);
        return redirect()->route('admin.patterns.comments.index');
    }
}
