<?php
/*
  Plugin Name: Luuptek Starter Plugins
  Plugin URI: https://www.luuptek.fi/
  Version: 1.0
  Author: Luuptek
  Author URI: https://www.luuptek.fi/
  License: GPLv2 or later
 */


if ( ! defined( 'ABSPATH' ) ) {
	die();
}

$luuptek_starter_plugins = glob( WP_PLUGIN_DIR . '/luuptek-starter-plugins/plugins/*.php' );

foreach ( $luuptek_starter_plugins as $single_plugin ) {
	require_once( $single_plugin );
}
