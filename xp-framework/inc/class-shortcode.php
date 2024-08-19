<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Spalisho_Shortcode') ){
    
    class Spalisho_Shortcode {

        public function __construct() {

            add_shortcode( 'spalisho-elementor-template', array( $this, 'spalisho_elementor_template' ) );
            
        }

        public function spalisho_elementor_template( $atts ){

            $atts = extract( shortcode_atts(
            array(
                'id'  => '',
            ), $atts) );

            $args = array(
                'id' => $id
                
            );

            if( did_action( 'elementor/loaded' ) ){
                return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );    
            }
            return;

            
        }

        

    }
}



return new Spalisho_Shortcode();

