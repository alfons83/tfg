<?php

namespace App\Http\Controllers\admin;

use App\Models\patterns\Pattern;
use App\Models\User;


use App\Models\UserProfile;
use Illuminate\Http\Request;
use Input;
use File;
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

        $users = User::paginate(10);

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
        $user = User::create($request->all());

        if (Input::file('image') AND Input::file('image')->isValid()) {
            $destinationPath = 'uploads/users/user_'.$user->id.'/'; // upload path

            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image

            // Metemos la foto en el sistema
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

            // Borramos las fotos del sistema
            $photos = UserProfile::where('user_id', $user->id)->get();

            if($photos)
                File::delete(array_pluck($photos, 'path'));

            // Borramos las fotos de la BD
            UserProfile::where('user_id', $user->id)->delete();

            // Metemos la foto en la BD
            UserProfile::create(['path' => $destinationPath.$fileName, 'user_id' => $user->id]);

            //return redirect('/uploads/'.$fileName);
        }


        return redirect()->route('admin.users.index', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        if($user)
            return view('admin.users.view', compact('user'));
        else
            return redirect()->route('admin.users.index');

        /*$user = User::findOrFail($id);
        return view ('admin.users.view' , compact('user'));*/
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

        if (Input::file('image') AND Input::file('image')->isValid()) {
            $destinationPath = 'uploads/users/user_'.$user->id.'/'; // upload path

            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image

            // Metemos la foto en el sistema
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

            // Borramos las fotos del sistema
            $photos = UserProfile::where('user_id', $user->id)->get();

            if($photos)
                File::delete(array_pluck($photos, 'path'));

            // Borramos las fotos de la BD
            UserProfile::where('user_id', $user->id)->delete();

            // Metemos la foto en la BD
            UserProfile::create(['path' => $destinationPath.$fileName, 'user_id' => $user->id]);

            //return redirect('/uploads/'.$fileName);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
   public function destroy($id)

    {
        $user = User::findOrFail($id);

        $user->delete();

        $message = $user->first_name . ' fue eliminado de nuestros registros';

        Session::flash('message', $message);
        return redirect()->route('admin.users.index');
    }

/*    public function active($id)

    {
        $user = User::findOrFail($id);

        $user = User::where('active',1);

        return redirect()->route('admin.users.index');
    }

    public function deactive($id)

    {
        $user = User::findOrFail($id);

        $user = User::where('active',0);

        return redirect()->route('admin.users.index');

    }*/

   /* public function getFavorites($user_id)
    {
        $pattern = Pattern::findAllFavorites($user_id);

        return view('admin.users.favorites', compact('pattern'));
    }*/



}
