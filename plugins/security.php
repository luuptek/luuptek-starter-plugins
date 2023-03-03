<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Disable file edit
 */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Disable XML-RPC methods, that requires authentication
 * https://developer.wordpress.org/reference/hooks/xmlrpc_enabled/
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Do not return any methods from xmlrpc
 * https://developer.wordpress.org/reference/hooks/xmlrpc_methods/
 */
add_filter( 'xmlrpc_methods', '__return_empty_array' );

class luuptek_wp_xmlrpc_server {
	public function __construct() {
	}

	public function serve_request() {
	}
}

/**
 * Return dummy class, which will handle XML-RPC requests
 * https://developer.wordpress.org/reference/hooks/wp_xmlrpc_server_class/
 */
add_filter( 'wp_xmlrpc_server_class', function () {
	return 'luuptek_wp_xmlrpc_server';
} );

/**
 * Disable generator data in source
 */
add_filter( 'the_generator', '__return_false' );

/**
 * Hide WP version strings from scripts
 */
add_filter( 'script_loader_src', function ( $src ) {

	if ( strpos( $src, 'ver=' ) ){

		$url_parts = parse_url( $src );

		parse_str( $url_parts['query'], $url_query );

		// Add hashed version number to src.
		if ( isset( $url_query['ver'] ) ) {
			$ver = $url_query['ver'];
			$src = add_query_arg( 'ver', wp_hash( $ver ), $src );
		}
	}

	return $src;

} );

/**
 * Hide WP version strings from styles
 */
add_filter( 'style_loader_src', function ( $src ) {

	if ( strpos( $src, 'ver=' ) ){

		$url_parts = parse_url( $src );

		parse_str( $url_parts['query'], $url_query );

		// Add hashed version number to src.
		if ( isset( $url_query['ver'] ) ) {
			$ver = $url_query['ver'];
			$src = add_query_arg( 'ver', wp_hash( $ver ), $src );
		}
	}

	return $src;

} );

/**
 * Disable users endpoint in api
 */
add_filter(
	'rest_endpoints',
	function ( $endpoints ) {
		if ( ! current_user_can( 'list_users' ) ) {
			if ( isset( $endpoints['/wp/v2/users'] ) ) {
				unset( $endpoints['/wp/v2/users'] );
			}
			if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
				unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
			}
		}

		return $endpoints;
	}
);
