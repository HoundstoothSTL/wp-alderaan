<?php 

//*** Enqueue Site Javascripts

function alderaan_load_js() {

	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery, we'll load this one in the header
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, '1.9.1');
		wp_enqueue_script('jquery');
	}
  
  //*** Load Project scripts.min.js last | versioned using Gruntfile.js
  wp_register_script('alderaan_scripts', get_template_directory_uri() . '/assets/js/app.min.js', false, 'bab60351f64ff1ea2ba1429e95cfd2fd', true);
  wp_enqueue_script( 'alderaan_scripts' );
}

add_action( 'wp_enqueue_scripts', 'alderaan_load_js' );

//*** End JavaScripts

//*** Enqueue Site CSS | versioned using Gruntfile.js
wp_enqueue_style('alderaan_css', get_template_directory_uri() . '/assets/css/main.min.css', false, 'a8aa0944811ab44fbd2d166a16e78864');
add_action( 'wp_enqueue_style', 'alderaan_load_css' );

//*** End CSS