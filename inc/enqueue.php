<?php
/**
 * 
 * Enqueue scripts and styles.
 * 
 * @package commpart
 */

function commpart_load_admin_scripts( $hook ) {

    wp_enqueue_media();

    wp_register_script( 'commpart-admin-script', get_template_directory_uri() . '/js/commpart.admin.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'commpart-admin-script' );
    //if( 'toplevel_page_cp_admin' != $hook ){ return; }
	wp_enqueue_style( 'commpart-admin-style', get_template_directory_uri() . '/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'commpart_load_admin_scripts' );

function commpart_scripts() {
	wp_enqueue_style( 'commpart-style', get_stylesheet_uri() );

	wp_enqueue_script( 'commpart-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'commpart-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'GSAP', "https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js");

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'commpart_scripts' );
