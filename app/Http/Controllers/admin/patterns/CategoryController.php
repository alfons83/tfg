<?php

namespace App\Http\Controllers\admin\patterns;

use App\Models\patterns\Category;
use App\Models\patterns\subcategory;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.patterns.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.patterns.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Redirector $redirect)
    {
        $category = Category::create($request->all());
        return redirect()->route('admin.patterns-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        if($category)
            return view('admin.patterns.category.view', compact('category'));
        else
            return redirect()->route('admin.patterns-category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.patterns.category.edit', compact('category'));
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
        $category = Category::findorFail($id);

        $category->fill($request->all());
        $category->save();

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
        $category = Category::findOrFail($id);

        $category->delete();

        $message = $category->name . ' fue eliminada de nuestros registros';

        if ($request->ajax()) {
            return response()->json([
                'id'      => $category->id,
                'message' => $message
            ]);
        }

        Session::flash('message', $message);
        return redirect()->route('admin.patterns-category.index');
    }



    public function getSubcategories(Request $request) {
        //if($request->ajax()) {
            $subcategories = Category::find($request['category_id'])->subcategories;

            return $subcategories;
        //}

        //return false;
    }
}
