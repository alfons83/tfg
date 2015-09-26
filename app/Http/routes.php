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


 use App\Models\patterns\Category;
 use App\Models\patterns\Subcategory;

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
    'uses' => 'Auth\\AuthController@getLogin',
    'as' => 'login'
]);

Route::post('login', 'Auth\\AuthController@postLogin');


Route::get('logout', [
    'uses' => 'Auth\\AuthController@getLogout',
    'as' => 'logout'
]);


// Registration routes ...

Route::get('register', [
    'uses' => 'Auth\\AuthController@getRegister',
    'as' => 'register'
]);

Route::post('register', 'Auth\\AuthController@postRegister');


Route::get('confirmation/{token}', [
    'uses' => 'Auth\\AuthController@getConfirmation',
    'as' => 'confirmation'
]);


//  Password reset ink request routes ...

Route::get('password/email', 'Auth\\PasswordController@getEmail');
Route::post('password/email', 'Auth\\PasswordController@postEmail');

// Password reset routes ...

Route::get('password/reset/{token}', 'Auth\\PasswordController@getReset');
Route::post('password/reset', 'Auth\\PasswordController@postReset');





Route::group(['middleware' => 'auth'], function () {


    Route::get('admin/dashboard', 'admin\\AdminController@index');


    Route::get('account/password', 'home\\AccountController@getPassword');
    Route::post('account/password', 'home\\AccountController@postPassword');


    Route::group(['middleware' => 'type:admin'], function () {



        // Admin Users Routes

        Route::resource("admin/users", "admin\\UsersController");


        // Admin Patterns Routes

        Route::resource("admin/patterns", "admin\\patterns\\PatternController");
        Route::post("admin/upload-photo-pattern", "admin\\patterns\\PatternController@postUploadPhoto");

        // Admin Patterns Subcategory Routes

        Route::resource("admin/patterns-subcategory","admin\\patterns\\SubcategoryController");


        // Admin PatternsCategory Routes

        Route::resource("admin/patterns-category", "admin\\patterns\\CategoryController");
        Route::get("admin/patterns-category-subcategories", "admin\\patterns\\CategoryController@getSubcategories");

        // Admin Category Routes

        Route::resource("admin/patterns-nielsen", "admin\\patterns\\NielsenController");


        // Admin Comments Routes

        Route::resource("admin/patterns-comments", "admin\\patterns\\CommentController");





    });


    Route::group(['middleware' => 'type:expert'], function () {


        Route::resource("admin/users", "admin\\UsersController");


        // Admin Patterns Routes

        Route::resource("admin/patterns", "admin\\patterns\\PatternController");
        Route::post("admin/upload-photo-pattern", "admin\\patterns\\PatternController@postUploadPhoto");

        // Admin Patterns Subcategory Routes

        Route::resource("admin/patterns-subcategory","admin\\patterns\\SubcategoryController");


        // Admin PatternsCategory Routes

        Route::resource("admin/patterns-category", "admin\\patterns\\CategoryController");
        Route::get("admin/patterns-category-subcategories", "admin\\patterns\\CategoryController@getSubcategories");

        // Admin Category Routes

        Route::resource("admin/patterns-nielsen", "admin\\patterns\\NielsenController");


        // Admin Comments Routes

        Route::resource("admin/patterns-comments", "admin\\patterns\\CommentController");



    });


    Route::group(['middleware' => 'type:user'], function () {


        Route::resource("admin/users", "admin\\UsersController");


        // Admin Patterns Routes

        Route::resource("admin/patterns", "admin\\patterns\\PatternController");
        Route::post("admin/upload-photo-pattern", "admin\\patterns\\PatternController@postUploadPhoto");

        // Admin Patterns Subcategory Routes

        Route::resource("admin/patterns-subcategory","admin\\patterns\\SubcategoryController");


        // Admin PatternsCategory Routes

        Route::resource("admin/patterns-category", "admin\\patterns\\CategoryController");
        Route::get("admin/patterns-category-subcategories", "admin\\patterns\\CategoryController@getSubcategories");

        // Admin Category Routes

        Route::resource("admin/patterns-nielsen", "admin\\patterns\\NielsenController");


        // Admin Comments Routes

        Route::resource("admin/patterns-comments", "admin\\patterns\\CommentController");



    });

});



