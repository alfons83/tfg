<?php

namespace App\Http\Controllers\home;

use App\Models\User;
use App\Models\patterns\Pattern;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function latest()

    {
        $patterns = Pattern::orderBy('created_at', 'DESC')->paginate(20);

        return view('home.list',compact('patterns'));
    }

    public function popular()
    {
        return view('home/list');

    }

    public function open()
    {
        $patterns = Pattern::where('status', 'Open')->orderBy('created_at', 'DESC')->paginate(20);
        return view('home/list', compact('patterns'));
    }

    public function pending()
    {
        $patterns = Pattern::where('status','Pending')->orderBy('created_at', 'DESC')->paginate(20);
        return view('home/list', compact('patterns'));
    }
    public function closed()
    {
        $patterns = Pattern::where('status', 'Closed')->orderBy('created_at', 'DESC')->paginate(20);
        return view('home/list', compact('patterns'));
    }
    public function details($id)
    {
        $pattern = Pattern::findOrFail($id);
        return view('home/details', compact('pattern'));
    }


}