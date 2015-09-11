<?php

namespace App\Http\Controllers\admin;


use App\Models\patterns\Category;
use App\Models\patterns\Comment;
use App\Models\patterns\Pattern;
use App\Models\patterns\RulesNielsen;
use App\Models\patterns\Subcategory;
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
        $users = User::all();

       // $date = $users->timestamp;

        $patterns = Pattern::all();

        $category = Category::all();
        $subcategory = Subcategory::all();
        $nielsen = RulesNielsen::all();
        $comments = Comment::all();

        return view('admin.dashboard', [
            'patternsCount' => $patterns->count(),
            'patterns' => Pattern::where('active', 1)->orderBy('title', 'desc')->take(8)->get(),
            'users' => $users,
            'nielsen' => $nielsen,
            'category' => $category,
            'subcategory' => $subcategory,
            'comments' =>$comments ,
            'commentsCount' =>$comments->count(),
            'usersTime' => Carbon::now()->subDays(1)->diffForHumans(),
            'usersCount' => $users->count(),

            'usersNormals' => User::where('type', 'user')->orderBy('active', 'desc')->take(8)->get(),
            'usersExperts' => User::where('type', 'expert')->orderBy('active', 'desc')->take(8)->get()
        ]);
    }

}