var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass('app.scss')
	
		.styles([
			'libs/blog-post.css',
			'libs/bootstrap.css',
			'libs/font-awesome.css',
			'libs/styles.css'					
				
		], './public/css/libs.css')
		
		.scripts([
//			'libs/bootstrap.js',
//			'libs/jquery.js',
//			'libs/scripts.js',		
			'libs/libs.js'		
		], './public/js/libs.js');
});
