<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage WP Alderaan
 * @since WP Alderaan 1.0
 */
?>

<?php get_template_part('templates/head'); ?>
<?php get_template_part('templates/header'); ?>	
    
    <?php get_template_part( 'templates/loop', 'index' ); ?>
    		
<?php get_template_part('templates/footer'); ?>
