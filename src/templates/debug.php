<?php
/**
 * Template Name: Debug
 *
 * @package WordPress
 * @subpackage WP Alderaan
 * @since WP Alderaan 1.0
 *
 * Use this template to test out different queries and stuff from the codex
 * and see how the built in wordpress functions work like get_stylesheet_directory_uri()
 */
 
	Render::partial('document-head');
	Render::partial('header'); 
?>

	<div class="container">
		<div class="hero-unit">
			<header>
				<h1>Debugger Template</h1>
				<h2>Output the Constants <small>for example</small></h2>
				<p><strong>Scripts Directory= </strong><?= SCRIPTS_DIR; ?></p>
				<p><strong>Styles Directory= </strong><?= STYLESHEET_DIR; ?></p>
			</header>
		</div>
	</div>

<? Render::partial('footer'); ?>