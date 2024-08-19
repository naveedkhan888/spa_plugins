<?php
/*
Plugin Name: XpertTheme MegaMenu
Plugin URI: https://themeforest.net/user/xperttheme
Description: XpertTheme MegaMenu
Author: Xperttheme
Version: 1.0.0
Author URI: https://themeforest.net/user/xpertpoin8/portfolio
Text Domain: xp-megamenu
*/

if ( !defined( 'ABSPATH' ) ) exit();

/**
 * XP_MEGAMENU Class
 */

if( !class_exists( 'XP_MEGAMENU' ) ){

	final class XP_MEGAMENU{

		private static $_instance = null;
		
		/**
		 * XP_MEGAMENU Constructor
		 */

		public function __construct(){
			$this->define_constants();
			$this->includes();
		}


		/**
		 * Define constants
		 */
		public function define_constants(){
			$this->define( 'XP_MEGAMENU_PLUGIN_FILE', __FILE__ );
			$this->define( 'XP_MEGAMENU_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
			$this->define( 'XP_MEGAMENU_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
		}

		private function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}


		/**
		 * Include files
		 */

		public function includes(){

			require_once( XP_MEGAMENU_PLUGIN_PATH.'/inc/class-assets.php' );
   			require_once( XP_MEGAMENU_PLUGIN_PATH.'/inc/class-process.php' );	
			
		}


		/**
		 * Main Xp Events Manager Instance.
		 */
		public static function instance() {
			if ( !empty( self::$_instance ) ) {
				return self::$_instance;
			}
			return self::$_instance = new self();
		}


	}

}


/**
 * Main instance of Xp Events Manager
 */
function XP_MEGAMENU() {
	return XP_MEGAMENU::instance();
}

$GLOBALS['XP_MEGAMENU'] = XP_MEGAMENU();