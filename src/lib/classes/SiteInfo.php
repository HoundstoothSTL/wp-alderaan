<?php 

	abstract class Siteinfo {

		public static function get() {
			return (object) [
			  //'blog_title' => self::getBlogTitle(),
			  'name' => get_bloginfo('name'),
			  'description' => get_bloginfo('description'),
			  'admin_email' => get_bloginfo('admin_email'),

			  'url' => get_bloginfo('url'),
			  'wpurl' => get_bloginfo('wpurl'),

			  'theme_dir' => get_bloginfo('stylesheet_directory'),
			  'theme_url' => get_bloginfo('stylesheet_url'),
			  'template_directory' => get_bloginfo('template_directory'),
			  'template_url' => get_bloginfo('template_url'),

			  'atom_url' => get_bloginfo('atom_url'),
			  'rss2_url' => get_bloginfo('rss2_url'),
			  'rss_url' => get_bloginfo('rss_url'),
			  'pingback_url' => get_bloginfo('pingback_url'),
			  'rdf_url' => get_bloginfo('rdf_url'),

			  'comments_atom_url' => get_bloginfo('comments_atom_url'),
			  'comments_rss2_url' => get_bloginfo('comments_rss2_url'),

			  'charset' => get_bloginfo('charset'),
			  'html_type' => get_bloginfo('html_type'),
			  'language' => get_bloginfo('language'),
			  'text_direction' => get_bloginfo('text_direction'),
			  'version' => get_bloginfo('version'),
			];
		}
	}

?>