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
			'ping_sites'                    => "http://rpc.pingomatic.com \n http://rpc.twingly.com \n http://api.feedster.com/ping \n http://api.moreover.com/RPC2 \n http://api.moreover.com/ping \n http://www.blogdigger.com/RPC2 \n http://www.blogshares.com/rpc.php \n http://www.blogsnow.com/ping \n http://www.blogstreet.com/xrbin/xmlrpc.cgi \n http://bulkfeeds.net/rpc \n http://www.newsisfree.com/xmlrpctest.php \n http://ping.blo.gs/ \n http://ping.feedburner.com \n http://ping.syndic8.com/xmlrpc.php \n http://ping.weblogalot.com/rpc.php \n http://rpc.blogrolling.com/pinger/ \n http://rpc.technorati.com/rpc/ping \n http://rpc.weblogs.com/RPC2 \n http://www.feedsubmitter.com \n http://blo.gs/ping.php \n http://www.pingerati.net \n http://www.pingmyblog.com \n http://geourl.org/ping \n http://ipings.com \n http://www.weblogalot.com/ping",
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
