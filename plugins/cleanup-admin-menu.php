<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_menu', function () {
	// Remove site health
	if ( apply_filters( 'luuptek_disable_site_health', true ) ) {
		remove_submenu_page( 'tools.php', 'site-health.php' );
	}

	// Remove comments
	if ( apply_filters( 'luuptek_disable_comments', true ) ) {
		remove_menu_page( 'edit-comments.php' );
	}
} );
