<?php

namespace App\Http\Controllers\admin\patterns;

use Illuminate\Http\Request;
use App\Models\patterns;
use App\Models\User;


use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $patterns = patterns\Pattern::paginate();

        return view('admin.patterns.patterns.index', compact('patterns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.patterns.patterns.create');
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
        return redirect()->route('admin.patterns.patterns.index',compact('patterns'));
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
    public function update( Request $request ,$id)
    {
        $patterns = patterns\Pattern::findOrFail($id);

        $patterns->fill($request->all());
        $patterns->save();

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
}