<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */

class Xp_Sev_Register_Elementor {

	function __construct() {
            
		// Register Header Footer Category in Pane
	    add_action( 'elementor/elements/categories_registered', array( $this, 'xpsev_add_category' ) );

	    add_action( 'elementor/frontend/after_register_scripts', array( $this, 'xpsev_enqueue_scripts' ) );
		
		add_action( 'elementor/widgets/register', array( $this, 'xpsev_include_widgets' ) );
	}

	function xpsev_add_category( ) {
	   	\Elementor\Plugin::instance()->elements_manager->add_category(
	        'xpsev',
	        [
	            'title' => esc_html__( 'Service', 'xp-sev' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );
	}

	function xpsev_enqueue_scripts() {
        $files = glob( XPSEV_PLUGIN_PATH . 'assets/js/elementor/*.js' );
      
        foreach ($files as $file) {
            $file_name = wp_basename($file);
            $handle    = str_replace(".js", '', $file_name);
            $src       = XPSEV_PLUGIN_URI . 'assets/js/elementor/' . $file_name;
            if (file_exists($file)) {
                wp_register_script( 'xpsev-elementor-' . $handle, $src, ['jquery'], null, true );
            }
        }
	}

	function xpsev_include_widgets( $widgets_manager ) {
        $files = glob( XPSEV_PLUGIN_PATH . 'elementor/widgets/*.php' );

        foreach ($files as $file) {
            $file = XPSEV_PLUGIN_PATH . 'elementor/widgets/' .wp_basename($file);
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }
}

new Xp_Sev_Register_Elementor();