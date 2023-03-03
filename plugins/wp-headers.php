<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove X-Pingback header
 */
add_filter( 'wp_headers', function ( $headers ) {
	unset( $headers['X-Pingback'] );

	return $headers;
} );
