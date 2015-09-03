<?php

namespace App\Http\Controllers\admin;


use App\Models\patterns\Pattern;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $users= User::all();
        return view('admin.dashboard',compact('users'));
    }

    public function user_stats()
    {

    }

    public function pattern_stats()
    {

    }

    public function upload_stats()
    {

    }

    public function like_stats()
    {

    }


    public function pattern_latest()
    {
        $patterns = Pattern::where('active', 1)
            ->orderBy('title', 'desc')
            ->take(8)
            ->get();

        return view('admin.dashboard', ['patterns' =>$patterns]);

    }

    /*public function user_latest()
    {
        $users = User::where('type')

            ->orderBy('active', 'desc')
            ->take(8)
            ->get();

        return view('admin.dashboard',['users' =>$users]);

    }*/

    /*public function expert_latest()
    {
        $users = User::where('active', 1)

            ->orderBy('timestamp', 'desc')
            ->take(8)
            ->get();

        return view('admin.dashboard',['users' =>$users]);

    }*/

}