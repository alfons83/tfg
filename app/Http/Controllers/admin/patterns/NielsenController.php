<?php

namespace App\Http\Controllers\admin\patterns;

use App\Models\patterns\RulesNielsen;
use App\Models\patterns\Pattern;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class NielsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $nielsen = RulesNielsen::paginate();

        return view('admin.patterns.nielsen.index', compact('nielsen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.patterns.nielsen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Redirector $redirect)
    {
        $nielsen = RulesNielsen::create($request->all());
        return redirect()->route('admin.patterns-nielsen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $nielsen = RulesNielsen::findOrFail($id);

        if($nielsen)
            return view('admin.patterns.nielsen.view', compact('nielsen'));
        else
            return redirect()->route('admin.patterns-nielsen.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $nielsen = RulesNielsen::findOrFail($id);

        return view('admin.patterns.nielsen.edit', compact('nielsen'));
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
        $nielsen = RulesNielsen::findorFail($id);

        $nielsen->fill($request->all());
        $nielsen->save();



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
        $nielsen = RulesNielsen::findOrFail($id);

        $nielsen->delete();

        $message = $nielsen->name . ' fue eliminada de nuestros registros';

        if ($request->ajax()) {
            return response()->json([
                'id'      => $nielsen->id,
                'message' => $message
            ]);
        }

        Session::flash('message', $message);
        return redirect()->route('admin.patterns-nielsen.index');
    }
}
