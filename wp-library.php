<?php
/*
Plugin Name: WP Library
Description: 
Author: MehtaRiddhi
Author URI: https://github.com/MehtaRiddhi
Text Domain: wp-library
Version: 1.0.1
*/
if ( ! defined( 'wpl_plugin_path' ) ) {
	define( 'wpl_plugin_path', plugin_dir_path( __FILE__ ) );
}

register_activation_hook( __FILE__, 'wpl_activation_fun' );
function wpl_activation_fun() {
}

register_deactivation_hook( __FILE__, 'wpl_deactivation_fun' );
function wpl_deactivation_fun() {
}


if ( is_admin() ) {
	require_once( wpl_plugin_path . '/admin/class-wpl-admin.php' );
	new wpl_admin_class();
}
