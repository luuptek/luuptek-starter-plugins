<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'admin_init',
	function () {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );
	}
);

add_action(
	'wp_dashboard_setup',
	function () {
		$current_user = wp_get_current_user();

		// Return if user is luuptek_admin
		if ( 'luuptek_admin' === $current_user->user_login || 'yllapito' === $current_user->user_login ) {
			return;
		}

		remove_meta_box( 'dashboard_php_nag', 'dashboard', 'normal' );
	}
);

/**
 * Add Luuptek guide feed to dashboard
 */
add_action(
	'wp_dashboard_setup',
	function () {
		if ( apply_filters( 'luuptek_disable_quide_feed', false ) ) {
			return;
		}

		add_meta_box( 'dashboard_custom_feed', 'Viimeisintä WP-oppasta', 'luuptek_wp_base_feed', 'dashboard', 'side', 'low' );

		/**
		 * Setup post guide feed into dashboard
		 */
		function luuptek_wp_base_feed() {
			$feed_url = 'https://www.luuptek.fi/feed/?post_type=guide';

			echo '<div class="rss-widget">';
			wp_widget_rss_output(
				$feed_url,
				[
					'items'        => 5,
					'show_title'   => 0,
					'show_summary' => 1,
					'show_author'  => 0,
					'show_date'    => 1,
				]
			);
			echo '</div>';
		}
	}
);
