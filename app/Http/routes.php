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
    'as'   => 'home'
    ]);



// Authentication routes ...

Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login'
]);

Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout'
]);

Route::get('blog/post/{slug}',[

    'uses' => 'Blog\BlogController@show',
    'as'   => 'post'
]);

Route::get('blog/posts', 'Blog\BlogController@index');

// Registration routes ...

Route::get('register',[
    'uses' => 'Auth\AuthController@getRegister',
    'as'   => 'register'
    ]);

Route::post('register','Auth\AuthController@postRegister');


Route::get('confirmation/{token}', [
    'uses' => 'Auth\AuthController@getConfirmation',
    'as'   => 'confirmation'
]);




//  Password reset ink request routes ...

Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');

// Password reset routes ...

Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function () {

    Route::get('account', function () {
        return view('account');
    });

    Route::get('account/password', 'AccountController@getPassword');
    Route::post('account/password', 'AccountController@postPassword');

    Route::group(['middleware' => 'verified'] , function () {

        Route::get('publish', function () {
            return view('publish');
        });

        Route::post('publish', function () {
            return   Request::all();
        });

    });

    Route::group(['middleware' => 'role:admin'], function () {

        Route::get('admin/settings', function () {
            return view('admin/settings');
        });


        // Admin Post Routes


        Route::get('admin/post', [
            'uses' => 'admin\PostController@index' ,
            'as'   =>  'admin.post.index'
        ]);

        Route::get('admin/post/create', [
            'uses' => 'admin\PostController@create' ,
            'as'   =>  'admin.post.create'
        ]);

        Route::post('admin/post', [
            'uses' => 'admin\PostController@store' ,
            'as'   =>  'admin.post.store'
        ]);

        Route::get('admin/post/{post}', [
            'uses' => 'admin\PostController@show' ,
            'as'   =>  'admin.post.show'
        ]);

        Route::get('admin/post/{post}/edit', [
            'uses' => 'admin\PostController@edit' ,
            'as'   =>  'admin.post.edit'
        ]);

        Route::put('admin/post/{post}', [
            'uses' => 'admin\PostController@update' ,
            'as'   =>  'admin.post.update'
        ]);


        Route::delete('admin/post/{post}', [
            'uses' => 'admin\PostController@destroy' ,
            'as'   =>  'admin.post.destroy'
        ]);


        // Admin Category Routes


        Route::get('admin/category', [
            'uses' => 'admin\CategoryController@index' ,
            'as'   =>  'admin.category.index'
        ]);

        Route::get('admin/category/create', [
            'uses' => 'admin\CategoryController@create' ,
            'as'   =>  'admin.category.create'
        ]);

        Route::post('admin/category', [
            'uses' => 'admin\CategoryController@store' ,
            'as'   =>  'admin.category.store'
        ]);

        Route::get('admin/category/{category}', [
            'uses' => 'admin\CategoryController@show' ,
            'as'   =>  'admin.category.show'
        ]);

        Route::get('admin/category/{category}/edit', [
            'uses' => 'admin\CategoryController@edit' ,
            'as'   =>  'admin.category.edit'
        ]);

        Route::put('admin/category/{category}', [
            'uses' => 'admin\CategoryController@update' ,
            'as'   =>  'admin.category.update'
        ]);


        Route::delete('admin/category/{category}', [
            'uses' => 'admin\CategoryController@destroy' ,
            'as'   =>  'admin.category.destroy'
        ]);

        // Admin Tag Routes


        Route::get('admin/tag', [
            'uses' => 'admin\TagController@index' ,
            'as'   =>  'admin.tag.index'
        ]);

        Route::get('admin/tag/create', [
            'uses' => 'admin\TagController@create' ,
            'as'   =>  'admin.tag.create'
        ]);

        Route::post('admin/tag', [
            'uses' => 'admin\TagController@store' ,
            'as'   =>  'admin.tag.store'
        ]);

        Route::get('admin/tag/{tag}', [
            'uses' => 'admin\TagController@show' ,
            'as'   =>  'admin.tag.show'
        ]);

        Route::get('admin/tag/{tag}/edit', [
            'uses' => 'admin\TagController@edit' ,
            'as'   =>  'admin.tag.edit'
        ]);

        Route::put('admin/tag/{tag}', [
            'uses' => 'admin\TagController@update' ,
            'as'   =>  'admin.tag.update'
        ]);


        Route::delete('admin/tag/{tag}', [
            'uses' => 'admin\TagController@destroy' ,
            'as'   =>  'admin.tag.destroy'
        ]);


        // Admin Users Routes

        Route::get('admin/users', [
            'uses' => 'admin\UsersController@index' ,
            'as'   =>  'admin.users.index'
        ]);

        Route::get('admin/users/create', [
            'uses' => 'admin\UsersController@create' ,
            'as'   =>  'admin.users.create'
        ]);

        Route::post('admin/users', [
            'uses' => 'admin\UsersController@store' ,
            'as'   =>  'admin.users.store'
        ]);

        Route::get('admin/users/{users}', [
            'uses' => 'admin\UsersController@show' ,
            'as'   =>  'admin.users.show'
        ]);

        Route::get('admin/users/{users}/edit', [
            'uses' => 'admin\UsersController@edit' ,
            'as'   =>  'admin.users.edit'
        ]);

        Route::put('admin/users/{users}', [
            'uses' => 'admin\UsersController@update' ,
            'as'   =>  'admin.users.update'
        ]);


        Route::delete('admin/users/{users}', [
            'uses' => 'admin\UsersController@destroy' ,
            'as'   =>  'admin.users.destroy'
        ]);



    });

    Route::group(['middleware' => 'role:editor'], function () {


        Route::get('admin/posts', function () {
            return view('admin/posts');
        });

    });


});
