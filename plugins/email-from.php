<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Possibly disable this feature
if ( apply_filters( 'disable_luuptek_starter_email_from', false ) ) {
	return;
}

/**
 * Change mail_from_name to current site name.
 */
add_filter(
	'wp_mail_from_name',
	function ( $name ) {
		// If set elsewhere to anything else than default fallback "WordPress".
		if ( 'WordPress' !== $name ) {
			return $name;
		}

		return get_bloginfo( 'name' );
	}
);
