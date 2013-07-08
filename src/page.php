<?php
/**
 * Single Page Template.
 *
 * @package WordPress
 * @subpackage WP Alderaan
 * @since WP Alderaan 1.0
 */
?>

<?php get_template_part('templates/head'); ?>
<?php get_template_part('templates/header'); ?>

<div class="single-page">
	<div class="container">

		<header>
			<h1><?php the_title(); ?></h1>
		</header>
		
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="span7">
					<?php the_content(); ?>
				</div>
				<div class="span5">
				</div>
			</div>
			
		<?php endwhile; endif; ?>
	</div>
			
</div>
<!-- page : single-page -->

<?php get_template_part('templates/footer'); ?>