<?php 
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage WP Alderaan
 * @since WP Alderaan 1.0
*/
?>

<?php 
	Render::partial('document-head');
	Render::partial('header'); 

	$config = [
		'post_type' => 'post',
		'posts_per_page' => '5'
	];

	$query = new WP_Query($config);

	if ( $query->have_posts() ) :

		while ( $query->have_posts() ) :

			$query->the_post();

			Render::partial('article');

		endwhile;

		wp_reset_postdata();

	endif;

	Render::template('sidebar');

	Render::partial('footer');
?>

