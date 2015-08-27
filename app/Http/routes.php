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

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);


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

Route::get('blog/{slug}', 'Blog\BlogController@showPost');

Route::get('blog/', 'Blog\BlogController@index');

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

Route::group(['middleware' => 'auth'], function () {

    Route::get('account', function () {
        return view('account');
    });

    Route::get('admin/dashboard', function () {
        return view('admin//dashboard');
    });

    Route::get('account/password', 'AccountController@getPassword');
    Route::post('account/password', 'AccountController@postPassword');

    Route::group(['middleware' => 'verified'], function () {

        Route::get('publish', function () {
            return view('publish');
        });

        Route::post('publish', function () {
            return Request::all();
        });

    });

    Route::group(['middleware' => 'type:admin'], function () {

        Route::get('admin/settings', function () {
            return view('admin/settings');
        });


        // Admin Post Routes

        Route::resource("admin/post", "admin\\PostController");


        // Admin Category Routes

        Route::resource("admin/category", "admin\\CategoryController");


        // Admin Tag Routes

        Route::resource("admin/tag", "admin\\TagController");


        // Admin Users Routes

        Route::resource("admin/users", "admin\\UsersController");


    });


    Route::group(['middleware' => 'type:expert'], function () {


        // Admin Post Routes

        Route::resource("admin/post", "admin\\PostController");


        // Admin Category Routes

        Route::resource("admin/category", "admin\\CategoryController");


        // Admin Tag Routes

        Route::resource("admin/tag", "admin\\TagController");

    });


});

Route::resource("admin/users", "admin\\UsersController");

Route::get("pruebas", function () {
    return view("pruebas");
});