<?php
/**
 * WP con clase functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package WP con clase
 * @since 0.1.0
 */
 
 // Useful global constants
define( 'WPCC_VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function wpcc_setup() {
	/**
	 * Makes WP con clase available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on WP con clase, use a find and replace
	 * to change 'wpcc' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'wpcc', get_stylesheet_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'wpcc_setup' );
 
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function wpcc_scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'wpcc', get_stylesheet_directory_uri() . "/assets/js/wp_con_clase{$postfix}.js", array(), WPCC_VERSION, true );
		
	wp_enqueue_style( 'wpcc', get_stylesheet_directory_uri() . "/assets/css/wp_con_clase{$postfix}.css", array(), WPCC_VERSION );
	wp_enqueue_style( 'wpcc', get_stylesheet_directory_uri() . "/assets/css/font-awesome{$postfix}.css", array(), WPCC_VERSION );

 }
 add_action( 'wp_enqueue_scripts', 'wpcc_scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function wpcc_header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'wpcc_humans', $humans );
 }
 add_action( 'wp_head', 'wpcc_header_meta' );

 /**
  * Remove bootstrap.css from parent theme
  */
 function dmbs_dequeue_enqueue_scripts() {

    wp_dequeue_style( 'bootstrap.css' );

}
add_action( 'wp_enqueue_scripts', 'dmbs_dequeue_enqueue_scripts', 100 );