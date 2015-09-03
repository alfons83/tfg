<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\patterns\Pattern;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{

    protected $patterns;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $term = e(Input::get('q'));
        $patterns = null;

        if (! empty ($term)) {
            $patterns = Pattern::paginate($term, 12);
        }

        return view('search.result', compact('patterns', 'term'));
    }

}
