<?php 

//*** Enqueue Site Javascripts

function alderaan_load_js() {

	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery, we'll load this one in the header
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
		wp_enqueue_script('jquery');
	}
	
	wp_register_script('threejs', get_template_directory_uri() . '/assets/js/vendor/three.min.js', false, '1.0', true);
	wp_register_script('module_helpers', get_template_directory_uri() . '/assets/js/modules/Helpers.js', false, '1.0', true);
	wp_register_script('module_nav', get_template_directory_uri() . '/assets/js/modules/Nav.js', false, '1.0', true);
	wp_register_script('module_display', get_template_directory_uri() . '/assets/js/modules/Display.js', false, '1.0', true);
	wp_register_script('module_embed', get_template_directory_uri() . '/assets/js/modules/Embed.js', false, '1.0', true);
	wp_register_script('module_particles', get_template_directory_uri() . '/assets/js/modules/Particles.js', false, '1.0', true);
	wp_register_script('alderaan_app', get_template_directory_uri() . '/assets/js/app.js', false, 'bab60351f64ff1ea2ba1429e95cfd2fd', true);

	wp_enqueue_script( 'threejs' );
	wp_enqueue_script( 'module_helpers' );
	wp_enqueue_script( 'module_nav' );
	wp_enqueue_script( 'module_display' );
	wp_enqueue_script( 'module_embed' );
	wp_enqueue_script( 'module_particles' );
	wp_enqueue_script( 'alderaan_app' );
}

add_action( 'wp_enqueue_scripts', 'alderaan_load_js' );

//*** End JavaScripts

//*** Enqueue Site CSS | versioned using Gruntfile.js
//wp_enqueue_style('alderaan_css', get_template_directory_uri() . '/assets/css/main.min.css', false, 'a8aa0944811ab44fbd2d166a16e78864');
//add_action( 'wp_enqueue_style', 'alderaan_load_css' );

//*** End CSS