<?php 

	abstract class Render {

		public static function partial( $name = null ) {
			get_template_part('templates/partials/'.$name);
		}

		public static function template( $name = null ) {
			get_template_part('templates/'.$name);
		}

		public static function module( $name = null ) {
			get_template_part('templates/modules/module-'.$name);
		}

	}

?>