<?php
/**
 * Plugin Name: FSE Customizer
 * Description: A plugin to add a customizer menu item to admin menu for Full Site Editing (FSE) themes.
 * Version: 1.0.0
 * Author: Mikko Mörö
 * Author URI: https://sivuseppa.fi
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add a custom menu item under Appearance in the admin menu
 * to easily access the old customizer url: https://example.com/wp-admin/customize.php
 */
function fse_customizer_menu() {
	add_submenu_page(
		'themes.php',
		__( 'Customize' ),
		__( 'Customize' ),
		'customize', // Capability.
		'customize.php',
		function () {
			wp_safe_redirect( admin_url( 'customize.php' ) );
			exit;
		}
	);
}
add_action( 'admin_menu', 'fse_customizer_menu' );
