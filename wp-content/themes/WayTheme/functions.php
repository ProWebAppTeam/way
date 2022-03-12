<?php
/**
 * Way_u_choose functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Way_u_choose
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


require get_template_directory() . '/includes/custom-fields-options/theme-options.php';
require get_template_directory() . '/includes/custom-fields-options/metabox.php';



/*
Theme settings added
*/
require get_template_directory() . '/includes/theme-settings.php';

/*
Theme widget added
*/
require get_template_directory() . '/includes/widget-areas.php';

/*
Theme enqueue scripts and styles added
*/
require get_template_directory() . '/includes/enqueue-script-style.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

require get_template_directory() . '/includes/navigations.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/includes/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
	require get_template_directory() . '/woocommerce/includes/wc_functions_cart.php';
	require get_template_directory() . '/woocommerce/includes/wc_functions_single.php';
	require get_template_directory() . '/woocommerce/includes/wc_functions_archive.php';
	require get_template_directory() . '/woocommerce/includes/wc_functions_archive_loop_product.php';
	require get_template_directory() . '/woocommerce/includes/wc_functions_checkout.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-account.php';
}



add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}