<?php 

if( !defined( 'ABSPATH' ) ) exit();

if( !class_exists( 'XPSEV_custom_post_type' ) ) {

	class XPSEV_custom_post_type{

		public function __construct(){
			add_action( 'init', array( $this, 'XPSEV_register_post_type_xp_sev' ) );
			add_action( 'init', array( $this, 'XPSEV_register_taxonomy_xp_sev' ) );
		}

		
		function XPSEV_register_post_type_xp_sev() {

			$taxonomies = array( 'cat_sev');

			$labels = array(
				'name'                  => _x( 'Service', 'Post Type General Name', 'xp-sev' ),
				'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'xp-sev' ),
				'menu_name'             => __( 'Service', 'xp-sev' ),
				'name_admin_bar'        => __( 'Service', 'xp-sev' ),
				'archives'              => __( 'Item Archives', 'xp-sev' ),
				'attributes'            => __( 'Item Attributes', 'xp-sev' ),
				'parent_item_colon'     => __( 'Parent Item:', 'xp-sev' ),
				'all_items'             => __( 'All Service', 'xp-sev' ),
				'add_new_item'          => __( 'Add New', 'xp-sev' ),
				'add_new'               => __( 'Add New', 'xp-sev' ),
				'new_item'              => __( 'New Item', 'xp-sev' ),
				'edit_item'             => __( 'Edit Service', 'xp-sev' ),
				'view_item'             => __( 'View Item', 'xp-sev' ),
				'view_items'            => __( 'View Items', 'xp-sev' ),
				'search_items'          => __( 'Search Item', 'xp-sev' ),
				'not_found'             => __( 'Not found', 'xp-sev' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'xp-sev' ),
			);
			$args = array(
				'description'         => __( 'Post Type Description', 'xp-sev' ),
				'labels'              => $labels,
				'supports'            => array( 'title','excerpt', 'editor', 'comments', 'thumbnail' ),
				'taxonomies'         => $taxonomies,
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'menu_position'       => 5,
				'query_var'           => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'rewrite'             => array( 'slug' => _x( 'service', 'URL slug', 'xp-sev' ), 
												'with_front' => false ),
				'capability_type'     => 'post',
				'show_in_rest'        => true,
				'menu_icon'           => 'dashicons-admin-tools',
			);
			register_post_type( 'xp_sev', $args );
		}

		function XPSEV_register_taxonomy_xp_sev(){
			

			$labels = array(
				'name'                       => _x( 'Category Service', 'Post Type General Name', 'xp-sev' ),
				'singular_name'              => _x( 'Category', 'Post Type Singular Name', 'xp-sev' ),
				'menu_name'                  => __( 'Categories', 'xp-sev' ),
				'all_items'                  => __( 'All Category Service', 'xp-sev' ),
				'parent_item'                => __( 'Parent Item', 'xp-sev' ),
				'parent_item_colon'          => __( 'Parent Item:', 'xp-sev' ),
				'new_item_name'              => __( 'New Item Name', 'xp-sev' ),
				'add_new_item'               => __( 'Add New Category', 'xp-sev' ),
				'add_new'                    => __( 'Add New Category', 'xp-sev' ),
				'edit_item'                  => __( 'Edit Category', 'xp-sev' ),
				'view_item'                  => __( 'View Item', 'xp-sev' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'xp-sev' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'xp-sev' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'xp-sev' ),
				'popular_items'              => __( 'Popular Items', 'xp-sev' ),
				'search_items'               => __( 'Search Items', 'xp-sev' ),
				'not_found'                  => __( 'Not Found', 'xp-sev' ),
				'no_terms'                   => __( 'No items', 'xp-sev' ),
				'items_list'                 => __( 'Items list', 'xp-sev' ),
				'items_list_navigation'      => __( 'Items list navigation', 'xp-sev' ),

			);
			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'publicly_queryable' => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => false,
				'show_in_rest'        => true,
				'rewrite'            => array(
					'slug'       => _x( 'cat_sev', 'Service Slug', 'xp-sev' ),
					'with_front' => false,
					'feeds'      => true,
				),
			);
			register_taxonomy( 'cat_sev', array( 'xp_sev' ), $args );
		}
	}

	new XPSEV_custom_post_type();
}