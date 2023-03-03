<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove accents from filenames
 */
add_filter(
	'sanitize_file_name',
	function ( $filename ) {
		return remove_accents( $filename );
	},
	10
);

/**
 * Disable scaling of big image sizes,
 * which arrived in WordPress 5.3
 *
 * See https://make.wordpress.org/core/2019/10/09/introducing-handling-of-big-images-in-wordpress-5-3/
 */
add_filter( 'big_image_size_threshold', '__return_false' );
