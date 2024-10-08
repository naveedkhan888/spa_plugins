<?php
/**
Plugin Name: XpertTheme Framework
Plugin URI: https://themeforest.net/user/xpertpoin8/portfolio
Description: A plugin to create custom Post Type, Shortcode, Elementor
Version:  1.0.2
Author: Xperttheme
Author URI: https://themeforest.net/user/xperttheme
License:  GPL2
Text Domain: xp-framework
Domain Path: /languages 
*/

if (!function_exists('XpFramework')) {

    class XpFramework {

    	
        function __construct() {

            if (!defined('XP_PLUGIN_PATH')) {
                define( 'XP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );   
            }
            if (!defined('XP_PLUGIN_URI')) {
                define( 'XP_PLUGIN_URI', plugin_dir_url( __FILE__ ) ); 
            }

            load_plugin_textdomain( 'xp-framework', false, basename( dirname( __FILE__ ) ) .'/languages' );
            

            /* Custom Post Type */
            include XP_PLUGIN_PATH.'inc/class-hf-builder.php';

            // Metabox
            include XP_PLUGIN_PATH.'inc/class-metaboxes.php';
        

            add_action( 'admin_enqueue_scripts', array( $this, 'xp_admin_scripts' ) );

            // Share Social in Single Post
            add_filter( 'xp_share_social', array( $this, 'spalisho_content_social' ), 2, 10 );

            add_filter( 'upload_mimes', array( $this, 'xp_upload_mimes' ), 1, 10);

            add_filter( 'widget_text', 'do_shortcode' );

            // Shortcode
            include XP_PLUGIN_PATH.'inc/class-shortcode.php';
            
        }
        
        function xp_admin_scripts() {

            wp_enqueue_script( 'script', XP_PLUGIN_URI. 'assets/js/admin/script.js', array('jquery'), null, true );
            wp_enqueue_style( 'style', XP_PLUGIN_URI. 'assets/css/admin/style.css', array(), null );
            
             
        }


        public function spalisho_content_social( $link, $title ) {
            $html = '<ul class="share-social-icons clearfix">
                
                        <li><a class="share-ico ico-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u='.$link.'"><i class="fa fa-facebook"></i></a></li>
                        
                        <li><a class="share-ico ico-twitter" target="_blank" href="https://twitter.com/share?url='.$link.'&amp;text='.urlencode($title).'&amp;hashtags=simplesharebuttons"><i class="fab fa-twitter"></i></a></li>
                        
                        <li><a class="share-ico ico-tumblr" target="_blank" href="http://www.tumblr.com/share/link?url='.$link.'&amp;title='.$title.'"><i class="fab fa-tumblr"></i></a></li>                                 
                        
                        
                    </ul>';
            return $html;
        }

        public function xp_upload_mimes($mimes){
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }
      

    }
}

return new XpFramework();