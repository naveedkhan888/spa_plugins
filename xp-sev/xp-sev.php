<?php
/*
Plugin Name: Xperttheme Service
Plugin URI: https://themeforest.net/user/xperttheme
Description: Service
Author: Xperttheme
Version: 1.0.7
Author URI: https://themeforest.net/user/xpertpoin8/portfolio
Text Domain: xp-sev
Domain Path: /languages/
*/

if ( !defined( 'ABSPATH' ) ) exit();


if (!class_exists('XpSev')) {
	
	class XpSev {

		function __construct(){

			if (!defined('XPSEV_PLUGIN_FILE')) {
                define( 'XPSEV_PLUGIN_FILE', __FILE__ );   
            }

            if (!defined('XPSEV_PLUGIN_URI')) {
                define( 'XPSEV_PLUGIN_URI', plugin_dir_url( __FILE__ ) );   
            }

            if (!defined('XPSEV_PLUGIN_PATH')) {
                define( 'XPSEV_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );   
            }
			

			load_plugin_textdomain( 'xp-sev', false, basename( dirname( __FILE__ ) ) .'/languages' );

			$this -> includes();
			$this -> supports();
		}	

		
		function includes() {

			// inc
			require_once( XPSEV_PLUGIN_PATH.'inc/class-xp-custom-post-type.php' );

			require_once( XPSEV_PLUGIN_PATH.'inc/class-xp-get-data.php' );

			require_once( XPSEV_PLUGIN_PATH.'inc/xp-core-functions.php' );
			
			require_once( XPSEV_PLUGIN_PATH.'inc/class-xp-templates-loaders.php' );

			require_once( XPSEV_PLUGIN_PATH.'inc/class-xp-assets.php' );


			// admin
			require_once( XPSEV_PLUGIN_PATH.'admin/class-xp-metabox.php' );


			/* Customize */
			require_once XPSEV_PLUGIN_PATH.'/inc/class-customize.php';
			

		}


		function supports() {

			/* Make Elementors */
			if ( did_action( 'elementor/loaded' ) ) {
				include XPSEV_PLUGIN_PATH.'elementor/class-xp-register-elementor.php';
			}

		}

	}
}


return new XpSev();