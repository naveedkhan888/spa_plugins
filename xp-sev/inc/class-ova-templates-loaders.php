<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class XPSEV_templates_loader {
	
	/**
	 * The Constructor
	 */
	public function __construct() {
		add_filter( 'template_include', array( $this, 'template_loader' ) );
	}

	public function template_loader( $template ) {

		$post_type = isset($_REQUEST['post_type'] ) ? esc_html( $_REQUEST['post_type'] ) : get_post_type();


		if( is_tax( 'cat_sev' ) ||  get_query_var( 'cat_sev' ) != '' ){

			$paged = get_query_var('paged') ? get_query_var('paged') : '1';
			
			query_posts( '&cat_sev='.get_query_var( 'cat_sev' ).'&paged=' . $paged );
			xpsev_get_template( 'archive-sev.php' );
			return false;
		}


		// Is Team Post Type
		if(  $post_type == 'xp_sev' ){

			if ( is_post_type_archive( 'xp_sev' ) ) { 

				xpsev_get_template( 'archive-sev.php' );
				return false;

			} else if ( is_single() ) {

				xpsev_get_template( 'single-sev.php' );
				return false;

			}
		}


		return $template;
	}
}

new XPSEV_templates_loader();
