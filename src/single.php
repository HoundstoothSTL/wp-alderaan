<?php
/**
 * The template for displaying a single post.
 *
 * @package WordPress
 * @subpackage WP Alderaan
 * @since WP Alderaan 1.0
 */

	Render::partial('document-head');
	Render::partial('header');

?>

<div class="container">
	<div class="row banner-image">
		<div class="col col-12">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col col-8">

			<?php if( have_posts() ): while ( have_posts() ): the_post(); ?>
				<article class="<?php post_class(); ?>">
				
					<header class="post-header">
						<h1><?php the_title(); ?></h1>
						<div class="post-meta">
							<time datetime="<?php the_time( 'm-d-Y' ); ?>" pubdate><?php the_date(); ?></time>
							<span class="post-category">in <?php the_category(',') ?> by <?php the_author(); ?></span>
						</div>
					</header>
					
					<?php the_content(); ?>

					<footer>
						<section class="post-tags">
							<?php 
								$posttags = get_the_tags();
								if ($posttags) : ?>
								<i class="icon-tags"></i> Tags:	
							<?php foreach ($posttags as $tag) : ?>
							<a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
							<?php endforeach; endif; ?>
						</section>
						<nav class="split">
							<span class="pull-left"><?php previous_post_link( '%link', '' . _x( '', 'Previous post link', 'bolt' ) . '&larr; Previous Post' ); ?></span>
							<span class="pull-right"><?php next_post_link( '%link', 'Next Post &rarr;' . _x( '', 'Next post link', 'bolt' ) . '' ); ?></span>
						</nav>
					</footer>
					
				</article>
				
			<?php endwhile; endif; ?>

		</div>
		
		<div class="col col-4">
			
			<?php Render::partial('blog-sidebar'); ?>
				
		</div>
	</div>
	
</div>

<?php Render::partial('footer'); ?>