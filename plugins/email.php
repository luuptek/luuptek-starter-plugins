<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disable password changed notification email scam
add_filter( 'send_password_change_email', '__return_false' );
