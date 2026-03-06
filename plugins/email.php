<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disable the admin notification email for user password changes.
if ( ! function_exists( 'wp_password_change_notification' ) ) {
	function wp_password_change_notification( $user ) {
		// Do nothing — disables admin notification email.
	}
}
