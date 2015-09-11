<?php

namespace App\Http\Controllers\admin\patterns;

use Illuminate\Http\Request;
use App\Models\patterns;
use App\Models\User;

use Input;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patterns = patterns\Pattern::all();

        return view('admin.patterns.patterns.index', compact('patterns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $categories = patterns\Category::all();

        $rules = patterns\RulesNielsen::all();



        return view('admin.patterns.patterns.create', compact('rules','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Redirector $redirect)
    {
        $patterns = patterns\Pattern::create($request->all());

        if (Input::file('image') AND Input::file('image')->isValid()) {
            $destinationPath = 'uploads/patterns/pattern_'.$patterns->id.'/'; // upload path

            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image

            // Metemos la foto en el sistema
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

            // Borramos las fotos del sistema
            $photos = patterns\Photos::where('pattern_id', $patterns->id)->get();

            if($photos)
                File::delete(array_pluck($photos, 'path'));

            // Borramos las fotos de la BD
            patterns\Photos::where('pattern_id', $patterns->id)->delete();

            // Metemos la foto en la BD
            patterns\Photos::create(['path' => $destinationPath.$fileName, 'pattern_id' => $patterns->id]);

            //return redirect('/uploads/'.$fileName);
        }






        return redirect()->route('admin.patterns.index',compact('patterns'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {



        $patterns = patterns\Pattern::findOrFail($id);





        if($patterns)
            return view('admin.patterns.patterns.view', compact('patterns'));
        else
            return redirect()->route('admin.patterns.patterns.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)

    {
        $patterns = patterns\Pattern::findOrFail($id);

        return view('admin.patterns.patterns.edit', compact('patterns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request ,$id)
    {
        $patterns = patterns\Pattern::findOrFail($id);
        $patterns->fill($request->all());
        $patterns->save();

        if (Input::file('image') AND Input::file('image')->isValid()) {
            $destinationPath = 'uploads/patterns/pattern_'.$patterns->id.'/'; // upload path

            $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image

            // Metemos la foto en el sistema
            Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

            // Borramos las fotos del sistema
            $photos = patterns\Photos::where('pattern_id', $patterns->id)->get();

            if($photos)
                File::delete(array_pluck($photos, 'path'));

            // Borramos las fotos de la BD
            patterns\Photos::where('pattern_id', $patterns->id)->delete();

            // Metemos la foto en la BD
            patterns\Photos::create(['path' => $destinationPath.$fileName, 'pattern_id' => $patterns->id]);

            //return redirect('/uploads/'.$fileName);
        }

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
        $patterns = patterns\Pattern::findOrFail($id);

        $patterns->delete();

        $message = $patterns->title . ' fue eliminado de nuestros registros';

        if ($request->ajax()) {
            return response()->json([
                'id'      => $patterns->id,
                'message' => $message
            ]);
        }

        Session::flash('message', $message);
        return redirect()->route('admin.patterns.patterns.index');
    }

    /**
     * Show the favorited tricks page.
     *
     * @return \Response
     */
    public function getFavourites($id)
    {
        $patterns = patterns\Pattern::findOrFail($id);

        return view('admin.patterns.patterns.favorites', compact('patterns'));
    }

    public function getAddFavourites($id)
    {
        $patterns = patterns\Pattern::findOrFail($id);
       Auth::user()->addFavourites($id);
        return Redirect::back();
    }

    public function getRemoveFavourites($id)
    {
        $patterns = patterns\Pattern::findOrFail($id);
        Auth::user()->removeFavourites($id);
        return Redirect::back();
    }





    public function postUploadPhoto() {

    }
}
