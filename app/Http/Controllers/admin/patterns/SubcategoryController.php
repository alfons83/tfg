<?php

namespace App\Http\Controllers\admin\patterns;

use App\Models\patterns\Category;
use App\Models\patterns\SubCategory;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subcategory = SubCategory::paginate(15);
        return view('admin.patterns.subcategory.index', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()


    {

        $categories = Category::all();

        return view('admin.patterns.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Redirector $redirect)
    {
        $subcategory = SubCategory::create($request->all());
        return redirect()->route('admin.patterns-subcategory.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $subcategory = SubCategory::findOrFail($id);

        if($subcategory)
            return view('admin.patterns.subcategory.view', compact('subcategory'));
        else
            return redirect()->route('admin.patterns-subcategory.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.patterns.subcategory.edit', compact('subcategory', 'categories'));

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
        $subcategory = SubCategory::findOrFail($id);

        $subcategory->fill($request->all());
        $subcategory->save();

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
        $subcategory = SubCategory::findOrFail($id);

        $subcategory->delete();

        $message = $subcategory->name . ' fue eliminado de nuestros registros';

        if ($request->ajax()) {
            return response()->json([
                'id'      => $subcategory->id,
                'message' => $message
            ]);
        }

        Session::flash('message', $message);
        return redirect()->route('admin.patterns-subcategory.index');
    }
}
