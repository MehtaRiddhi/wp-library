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


if ( is_admin() ) {
	//require_once( wp_survey_form_path . '/admin/class-wp-survey-form-admin.php' );
	//new wp_survey_form_admin();
}
