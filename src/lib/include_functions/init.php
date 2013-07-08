<?php

//*** Let's set up some theme basics upon activation

function alderaan_setup() {
	//*** ADD SIDEBARS
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'alderaan' ),
		'id' => 'primary_sidebar',
		'description' => __( 'Primary Sidebar', 'alderaan' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	//*** This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	//*** Excerpts on Pages
	add_post_type_support('page', 'excerpt');

	//*** Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	//*** This theme uses wp_nav_menu() in 2 locations
	register_nav_menus( 
		array(
			'primary' => __( 'Primary Navigation', 'alderaan' ),
			'secondary' => __( 'Footer Navigation', 'alderaan' )
		) 
	);
}

add_action('after_setup_theme', 'alderaan_setup');

// Backwards compatibility for older than PHP 5.3.0 : Taken from Roots Theme
if (!defined('__DIR__')) { 
	define('__DIR__', dirname(__FILE__)); 
}