<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hide or create new menus and items in the admin bar.
 */
add_action(
	'admin_bar_menu',
	function ( $admin_bar ) {
		$admin_bar->remove_menu( 'wp-logo' );            // Remove the WordPress logo
	},
	999
); // Needs to have low priority
