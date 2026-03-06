<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'after_switch_theme',
	function () {
		$default_options = [
			'show_avatars'                  => '',
			'blogdescription'               => '',
			'require_name_email'            => '',
			'comments_notify'               => '',
			'default_comment_status'        => 'closed',
			'default_ping_status'           => 'closed',
			'default_pingback_flag'         => '',
			'comment_moderation'            => '1',
			'moderation_notify'             => '',
			'comment_registration'          => '1',
			'thread_comments'               => '1',
			'thread_comments_depth'         => '2',
			'page_comments'                 => '0',
			'comments_per_page'             => '10',
			'default_comments_page'         => 'newest',
			'use_trackback'                 => '0',
			'uploads_use_yearmonth_folders' => '1',
			'date_format'                   => 'd.m.Y',
			'default_post_edit_rows'        => 40,
			'permalink_structure'           => '/%postname%/',
		];

		// Update options to wpdp
		foreach ( $default_options as $name => $value ) {
			update_option( $name, $value );
		}

		// Delete default post & comment
		wp_delete_post( 1, true );
		wp_delete_comment( 1 );
	}
);
