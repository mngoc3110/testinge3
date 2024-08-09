<?php
/*
Plugin Name: Florence Core
Plugin URI: http://solopine.com
Description: Florence Core Plugin
Author: Solo Pine
Version: 1.1
Author URI: http://solopine.com
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(!function_exists('florence_core_init')) {
	function florence_core_init() {
		// load language files
		load_plugin_textdomain( 'florence-core', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

	}
}
add_action( 'init', 'florence_core_init' );

// Widgets
add_action( 'plugins_loaded', 'florence_core_load_widgets' );
if(!function_exists('florence_core_load_widgets')) {
	function florence_core_load_widgets() {
		include( plugin_dir_path( __FILE__ ) . 'inc/widgets/about_widget.php');
		include( plugin_dir_path( __FILE__ ) . 'inc/widgets/facebook_widget.php');
		include( plugin_dir_path( __FILE__ ) . 'inc/widgets/post_widget.php');
		include( plugin_dir_path( __FILE__ ) . 'inc/widgets/promo_widget.php');
		include( plugin_dir_path( __FILE__ ) . 'inc/widgets/social_widget.php');
	}
}

// Social Share
include( plugin_dir_path( __FILE__ ) . 'inc/social_share.php');

// Social Follow
include( plugin_dir_path( __FILE__ ) . 'inc/social_follow.php');