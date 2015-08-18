<?php

namespace App\Http\Controllers\admin;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {

        $users = User::paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Redirector $redirect)
    {
        $user = User::create(Request::all());
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        dd(User::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)

    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update( Request $request ,$id)
    {
        $user = User::findOrFail($id);

        $user->fill($request->all());
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id, Request $request)

    {
        $user = User::findOrFail($id);
        
        $user->delete();

        $message = $user->name . ' fue eliminado de nuestros registros';

        if ($request->ajax()) {
            return response()->json([
                'id'      => $user->id,
                'message' => $message
            ]);
        }

        Session::flash('message', $message);
        return redirect()->route('admin.users.index');
    }
}