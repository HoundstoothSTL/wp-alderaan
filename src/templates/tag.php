<?php
/**
 * The template for displaying the tag feed.
 *
 * @package WordPress
 * @subpackage WP Alderaan
 * @since WP Alderaan 1.0
 */

	Render::partial('document-head');
	Render::partial('header');
?>

<div class="tag-archives">
				
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<article></article>
		
		<?php endwhile; ?>
		
	<?php else: ?>
		
		<header>
			<h1>No posts to display in <?= single_tag_title( '', false ); ?></h1>
		</header>	
		
	<?php endif; ?>
	
	<?php if(function_exists('wp_paginate')) { wp_paginate(); } //WP Paginate is pre-bundled ?>
				
</div>

<?php Render::partial('footer'); ?>
