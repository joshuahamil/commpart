<?php
/**
 * commpart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package commpart
 */

define( CP_TEMPLATE_DIR, get_template_directory() );

require CP_TEMPLATE_DIR . '/inc/setup.php';
require CP_TEMPLATE_DIR . '/inc/constants.php';
require CP_TEMPLATE_DIR . '/inc/enqueue.php';
require CP_TEMPLATE_DIR . '/inc/function-admin.php';
require CP_TEMPLATE_DIR . '/inc/function-widgets.php';



/**
 * Implement the Custom Header feature.
 */
require CP_TEMPLATE_DIR . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require CP_TEMPLATE_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require CP_TEMPLATE_DIR . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require CP_TEMPLATE_DIR . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require CP_TEMPLATE_DIR . '/inc/jetpack.php';
}
