<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disable password changed email to admin
if ( ! function_exists( 'wp_password_change_notification' ) ) {
	function wp_password_change_notification( $user ) {
		// Do nothing — disables admin notification email.
	}
}
