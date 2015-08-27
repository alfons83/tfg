<?php

namespace App\Http\Controllers\Blog;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\blog\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        /*$posts = Post::all();
        return \View::make('blog/list', compact('posts'));*/


        $posts = Post::where('published_at', '<=', Carbon::now() )
            ->orderBy('published_at','desc')
            ->paginate(config('blog.posts_per_page'));
            return view('blog.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return Response
     */
    public function showPost($slug)
    {

     /*   $post = Post::where('slug','=', $slug)->firstOrFail();
        return \View::make('blog/post', compact('post'));*/



        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.post')->withPost($post);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
/*
<?php

namespace App\Http\Controllers;

    use App\Post;
    use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.post')->withPost($post);
    }
}

*/


}
