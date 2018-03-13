<?php
/**
 * commpart Theme Customizer
 *
 * @package commpart
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function commpart_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'commpart_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'commpart_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'commpart_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function commpart_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function commpart_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function commpart_customize_preview_js() {
	wp_enqueue_script( 'commpart-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'commpart_customize_preview_js' );




//function cp_customize_register( $wp_customize ) {
//
//
//	$wp_customize->add_panel( 'about_panel', array(
//		'priority'       => 30,
//		'capability'     => 'edit_theme_options',
//		'theme_supports' => '',
//		'title'          => __('Org Identity'),
//		'description'    => 'Customize options for theme about page',
//	) );
//
//	$wp_customize->add_section( 'about_section', array(
//		'title' => __( 'Org Identity' ),
//		'description' => __( 'Customize your About page' ),
//		'panel' => 'about_panel', // Not typically needed.
//		'priority' => 30,
//		'capability' => 'edit_theme_options',
//		'theme_supports' => '', // Rarely needed.
//	) );
//
//	// Add a footer/copyright information section.
//	$wp_customize->add_section( 'footer' , array(
//	'title' => __( 'Footer', 'themename' ),
//	'priority' => 105, // Before Widgets.
//	) );
//
//}
//add_action('customize_register','cp_customize_register');