<?php
/**
 * 
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * 
 * @package commpart
 */

function commpart_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Masthead', 'commpart' ),
		'id'            => 'masthead-area',
		'description'   => esc_html__( 'Add buttons (DONATE) (CONTACT) and links here.', 'commpart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'commpart' ),
		'id'            => 'footer-area',
		'description'   => esc_html__( 'Mainly for Services, Give, Volunteer areas.', 'commpart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home page footer', 'commpart' ),
		'id'            => 'homepage-area',
		'description'   => esc_html__( 'Add widgets that will only be displayed on homepage here.', 'commpart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Calendar', 'commpart' ),
		'id'            => 'calendar-area',
		'description'   => esc_html__( 'Add your calendar widget here.', 'commpart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Left Margin', 'commpart' ),
		'id'            => 'left-margin-area',
		'description'   => esc_html__( 'Add widgets here.', 'commpart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Margin', 'commpart' ),
		'id'            => 'right-margin-area',
		'description'   => esc_html__( 'Add widgets here.', 'commpart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'commpart_widgets_init' );
