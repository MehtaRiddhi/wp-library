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

// register custom post type
add_action( 'init', 'wpl_custom_post_type_product' );

/**
 * function for ragsiter custom post type with taxonomy
 * 
 * @since 1.0.0
 * 
 * @param array register_post_type
 * @param array register_taxonomy
 */
function wpl_custom_post_type_product() {

	register_post_type( 'product', array(

		'labels'              => array(
			'name'               => __( 'Products' ),
			'singular_name'      => __( 'Products' ),
			'add_new'            => __( 'Add New'),
			'add_new_item'       => __( 'Create New Products'),
			'edit'               => __( 'Edit' ),
			'edit_item'          => __( 'Edit Products'),
			'new_item'           => __( 'New Products'),
			'view'               => __( 'View Products'),
			'view_item'          => __( 'View Products'),
			'search_items'       => __( 'Search Products'),
			'not_found'          => __( 'No Products found'),
			'not_found_in_trash' => __( 'No Products found in trash'),
			'parent'             => __( 'Parent Products'),
		),
		'description'         => __( 'This is custom post type add to your site.'),
		'public'              => true,
		'show_ui'             => true,
		'has_archive'         => true,
		'capability_type'     => 'post',
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'menu_position'       => 5,
		'hierarchical'        => true,
		'query_var'           => true,
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'sticky',
			'page-attributes',
			'menu_order'
		),
	) );

	register_taxonomy( 'product-type', array( 'product' ), array(
		'hierarchical'          => true,
		'labels'                => array(
			'name'              => __( 'Products Type'),
			'singular_name'     => __( 'Products Type'),
			'search_items'      => __( 'Search Products Types'),
			'all_items'         => __( 'All Products Types'),
			'parent_item'       => __( 'Parent Products Type'),
			'parent_item_colon' => __( 'Parent Products Type:'),
			'edit_item'         => __( 'Edit Products Type'),
			'update_item'       => __( 'Update Products Type'),
			'add_new_item'      => __( 'Add New Products Type'),
			'new_item_name'     => __( 'New Blogs Products Name'),

		),
		'show_ui'               => true,
		'query_var'             => true,
		'order'                 => true,
		'update_count_callback' => '_update_post_term_count',
		'rewrite'               => array( 'with_front' => true, 'hierarchical' => true ),
		)
	);

}

if ( is_admin() ) {
	require_once( wpl_plugin_path . '/admin/class-wpl-admin.php' );
	new wpl_admin_class();
}