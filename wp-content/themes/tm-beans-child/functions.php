<?php

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );

/*
 * Remove this action and callback function if you do not whish to use LESS to style your site or overwrite UIkit variables.
 * If you are using LESS, make sure to enable development mode via the Admin->Appearance->Settings option. LESS will then be processed on the fly.
 */
add_action( 'beans_uikit_enqueue_scripts', 'beans_child_enqueue_uikit_assets' );

function beans_child_enqueue_uikit_assets() {

	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/style.less', 'less' );

}

// Remove this action and callback function if you are not adding CSS in the style.css file.
add_action( 'wp_enqueue_scripts', 'beans_child_enqueue_assets' );

function beans_child_enqueue_assets() {

	// Individual CSS for each page, if need be. Add "@import 'style.css'" to them
	if ( is_page( 'home' ) ) {
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/home.css' );
	}
	else wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );

	// https://digitalfellows.commons.gc.cuny.edu/2013/11/18/learn-bootstrap-part-2-adding-bootstrap-to-wordpress/
	wp_register_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.0.1', true );

	wp_register_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.0.1', 'all' );

	wp_enqueue_script( 'bootstrap-js' );

	wp_enqueue_style( 'bootstrap-css' );

}

// "This line will prevent WordPress from automatically inserting HTML line breaks in your posts. If you don’t do this, some of the Bootstrap snippets that we are going to add will probably not display correctly."
remove_filter('the_content', 'wpautop');