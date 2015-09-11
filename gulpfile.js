
var elixir = require('laravel-elixir');

var gulp = require('gulp');

/*
 *  Copy any needed files.
 *
 *  Do a 'gulp copyfiles' after bower updates
 */


gulp.task("copyfiles", function () {

    gulp.src("bower_components/jquery/dist/jquery.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("bower_components/bootstrap/less/**")
        .pipe(gulp.dest("resources/assets/less/bootstrap"));

    gulp.src("bower_components/bootstrap/dist/js/bootstrap.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("bower_components/bootstrap/dist/fonts/**")
        .pipe(gulp.dest("public/assets/fonts"));

});


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {

    // Combine scripts

    mix
        .scripts([
            'js/jquery.js',
            'js/bootstrap.js'
        ],
        'public/assets/js/admin.js',
        'resources/assets'
        )
        .copy();

    // Compile Less

   // mix.less('admin.less', 'public/assets/css/admin.css');

    // Compile Sass

  //  mix.sass('app.scss', 'public/assets/css/admin.css');

});
