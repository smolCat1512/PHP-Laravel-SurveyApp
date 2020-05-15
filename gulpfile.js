var elixir = require('laravel-elixir');

elixir(function (mix) {

    // Compile CSS
    mix.sass(
        'app.scss', // Source file
        'public/css', // Destination folder
        'resources/sass', // Path to source
        {
            includePaths: ['vendor/bower_components/foundation/scss']
        }
    );

    // Compile JavaScript
    mix.scripts(
        ['vendor/modernizr.js', 'vendor/jquery.js', 'foundation.min.js'], // Source files
        'public/js/app.js', // Destination file
        'vendor/bower_components/foundation/js/' // Source files base directory
    );

});
