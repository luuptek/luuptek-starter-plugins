<?php
/**
 * Add "Lohkomallit" (Block Patterns) top-level menu item
 * Only for specific users in wp-admin.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_menu', function (): void {
	$user = wp_get_current_user();
	if ( ! $user || 0 === (int) $user->ID ) {
		return;
	}

	$current_user_slug = $user->user_login;

	/**
	 * Filter: allowed user slugs who can see the menu.
	 *
	 * Return either a string (single slug) or an array of slugs.
	 * Default: 'luuptek_admin'.
	 *
	 * Example usage in theme/plugin:
	 * add_filter( 'luuptek_allowed_block_menu_user', fn() => [ 'mattinasa' ] );
	 */
	$allowed = apply_filters( 'luuptek_allowed_block_menu_user', 'luuptek_admin' );

	// Normalize into an array and sanitize values.
	$allowed_slugs     = is_array( $allowed ) ? $allowed : [ (string) $allowed ];
	$allowed_slugs     = array_map( static fn( $s ) => sanitize_key( (string) $s ), $allowed_slugs );
	$current_user_slug = sanitize_key( (string) $current_user_slug );

	// If the current user is not in the allowed list, do nothing.
	if ( ! in_array( $current_user_slug, $allowed_slugs, true ) ) {
		return;
	}

	// Add top-level menu item pointing to the wp_block post type list.
	add_menu_page(
		esc_html__( 'Lohkomallit', 'luuptek-starter-plugins' ), // Page title (browser/tab)
		esc_html__( 'Lohkomallit', 'luuptek-starter-plugins' ), // Menu title (visible in admin menu)
		'edit_posts',                                          // Capability required
		'edit.php?post_type=wp_block',                         // Menu slug → direct link
		'',                                                    // Callback not needed
		'dashicons-admin-page',                                // Icon (same as "Pages")
		3                                                      // Position in admin menu
	);
} );
