<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', [
    'uses' => 'home\\HomeController@index',
    'as' => 'home'
]);*/







/*Route::get('patterns',[
    'uses' => 'PatternController@latest',
    'as' => 'patterns'
]);*/


Route::get('/', [
    'as'   => 'patterns.latest',
    'uses' => 'home\\PatternController@latest'
]);
Route::get('/populares', [
    'as'   => 'patterns.popular',
    'uses' => 'home\\PatternController@popular'
]);
Route::get('/pendientes', [
    'as'   => 'patterns.open',
    'uses' => 'home\\PatternController@open'
]);
Route::get('/pending', [
    'as'   => 'patterns.pending',
    'uses' => 'home\\PatternController@pending'
]);
Route::get('/tutoriales', [
    'as'   => 'patterns.closed',
    'uses' => 'home\\PatternController@closed'
]);
Route::get('/solicitud/{id}', [
    'as'   => 'patterns.details',
    'uses' => 'home\\PatternController@details'
]);















// Authentication Social routes ...

Route::get('{provider}/authorize', function($provider){
    return OAuth::authorize($provider);
});


Route::get('{provider}/login', function($provider){
    OAuth::login($provider, function ($user , $userDetails) {

        $user->username = $userDetails->nickname;

        $user->email = $userDetails->email;

        $user->save();
    });
    return view('admin/dashboard');
});


// Authentication routes ...

Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'login'
]);

Route::post('login', 'Auth\AuthController@postLogin');


Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout'
]);


// Registration routes ...

Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
    'as' => 'register'
]);

Route::post('register', 'Auth\AuthController@postRegister');


Route::get('confirmation/{token}', [
    'uses' => 'Auth\AuthController@getConfirmation',
    'as' => 'confirmation'
]);


//  Password reset ink request routes ...

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes ...

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Retail


Route::get('blog/{slug}', 'Blog\BlogController@showPost');

Route::get('blog/', 'Blog\BlogController@index');

# Search routes

Route::get('search', 'SearchController@index');

//Route::get('dropzone', 'DropzoneController@index');

//Route::post('dropzone/uploadFiles', 'DropzoneController@uploadFiles');



Route::group(['middleware' => 'auth'], function () {





   /* Route::get('profile', function () {
        return view('profile');
    });*/

    Route::get('admin/dashboard', 'admin\\AdminController@index');
    Route::get('admin/dashboard', 'admin\\AdminController@pattern_latest');
   // Route::get('admin/dashboard', 'admin\\AdminController@user_latest');
    //Route::get('admin/dashboard', 'admin\\AdminController@expert_latest');

    Route::get('account/password', 'AccountController@getPassword');
    Route::post('account/password', 'AccountController@postPassword');


/*   Route::group(['middleware' => 'verified'], function () {

        Route::get('publish', function () {
            return view('publish');
        });

        Route::post('publish', function () {
            return Request::all();
        });

    });*/

    Route::group(['middleware' => 'type:admin'], function () {


        // Admin Blog Post Routes

        Route::resource("admin/blog/post", "admin\\blog\\PostController");


        // Admin Blog Category Routes

        Route::resource("admin/blog/category", "admin\\blog\\CategoryController");


        // Admin Blog Tag Routes

        Route::resource("admin/blog/tag", "admin\\blog\\TagController");

        // Admin Blog Comments Routes

        Route::resource("admin/blog/comments", "admin\\blog\\CommentController");


        // Admin Users Routes

        Route::resource("admin/users", "admin\\UsersController");

        // Admin Patterns Routes

        Route::resource("admin/patterns", "admin\\patterns\\PatternController");

        // Admin Patterns Tag Routes

        Route::resource("admin/patterns/tag","admin\\patterns\\TagController");


        // Admin Blog Category Routes

        Route::resource("admin/patterns/category", "admin\\patterns\\CategoryController");


        // Admin Blog Comments Routes

        Route::resource("admin/patterns/comments", "admin\\patterns\\CommentController");


        Route::get('admin/profile', 'admin\\UsersController@profile');


    });


    Route::group(['middleware' => 'type:expert'], function () {


        // Admin Blog Post Routes

        Route::resource("admin/blog/post", "admin\\blog\\PostController");


        // Admin Blog Category Routes

        Route::resource("admin/blog/category", "admin\\blog\\CategoryController");


        // Admin Blog Tag Routes

        Route::resource("admin/blog/tag", "admin\\blog\\TagController");

        // Admin Blog Comments Routes

        Route::resource("admin/blog/comments", "admin\\blog\\CommentController");


        // Admin Patterns Routes

        Route::resource("admin/patterns", "admin\\patterns\\PatternController");

        // Admin Patterns Tag Routes

        Route::resource("admin/patterns/tag","admin\\patterns\\TagController");


        // Admin Blog Category Routes

        Route::resource("admin/patterns/category", "admin\\patterns\\CategoryController");


        // Admin Blog Comments Routes

        Route::resource("admin/patterns/comments", "admin\\patterns\\CommentController");



    });

});


Route::get("pruebas", function () {
    return view("pruebas");
});


