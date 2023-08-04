<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Don't allow post type registration in ACF
add_filter( 'acf/settings/enable_post_types', '__return_false' );
