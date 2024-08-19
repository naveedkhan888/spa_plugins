<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'XPSEV_assets' ) ){
	class XPSEV_assets{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'xpsev_enqueue_scripts' ), 10, 0 );

			/* Add JS for Elementor */
			add_action( 'elementor/frontend/after_register_scripts', array( $this, 'xp_enqueue_scripts_elementor_sev' ) );

		}



		public function xpsev_enqueue_scripts(){

			// Init Css
			wp_enqueue_style( 'service_style', XPSEV_PLUGIN_URI.'assets/css/style.css' );	

		}

		// Add JS for elementor
		public function xp_enqueue_scripts_elementor_sev(){
			wp_enqueue_script( 'script-elementor-sev', XPSEV_PLUGIN_URI. 'assets/js/script.js', [ 'jquery' ], false, true );
		}


	}
	new XPSEV_assets();
}
