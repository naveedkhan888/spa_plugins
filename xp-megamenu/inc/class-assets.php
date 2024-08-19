<?php 
defined( 'ABSPATH' ) || exit();

if( !class_exists( 'XP_Megamenu_Assets' ) ){
	class XP_Megamenu_Assets{

		public function __construct(){

			add_action( 'wp_enqueue_scripts', array( $this, 'xp_megamenu_enqueue_scripts' ), 11 ,0 );
			add_action( 'admin_enqueue_scripts', array( $this, 'xp_megamenu_enqueue_scripts_admin' ), 11, 0 );

		}

		public function xp_megamenu_enqueue_scripts(){
			
			wp_enqueue_script( 'xp_megamenu_script', XP_MEGAMENU_PLUGIN_URI.'assets/js/script.js', array('jquery'),null,true );
			wp_enqueue_style( 'xp_megamenu_css', XP_MEGAMENU_PLUGIN_URI.'assets/css/frontend/style.css', array(), null  );
			
			
		}

		public function xp_megamenu_enqueue_scripts_admin(){
			wp_enqueue_style( 'xp_megamenu_css_admin', XP_MEGAMENU_PLUGIN_URI.'assets/css/admin/admin_style.css', array(), null );
		}

	}
	new XP_Megamenu_Assets();
}