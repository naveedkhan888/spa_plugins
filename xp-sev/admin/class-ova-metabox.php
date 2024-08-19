<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */



add_action( 'cmb2_init', 'xp_sev_metaboxes' );
function xp_sev_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'xp_sev_met_';
    
    /* Sev Settings ***************************************************************************/
    /* ************************************************************************************/
    $sev_settings = new_cmb2_box( array(
        'id'            => 'xpsev_settings',
        'title'         => esc_html__( 'Service Settings', 'xp-sev' ),
        'object_types'  => array( 'xp_sev'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        
    ) );
        
        // icon
        $sev_settings->add_field( array(
            'name' => esc_html__( 'Service Icon', 'xp-sev' ),
            'id'   => $prefix . 'icon',
            'desc' => esc_html__( 'Use in Service Box Element ( Example : flaticon flaticon-massage .You can find here: https://xp-themes.gitbook.io/spalisho/find-icons)', 'xp-sev' ),
            'type' => 'text',
        ) );
        
        // sort order
        $sev_settings->add_field( array(
            'name'    => esc_html__( 'Sort Order', 'xp-sev' ),
            'id'      => $prefix . 'order_sev',
            'desc'    => esc_html__( 'Insert Number', 'xp-sev' ),
            'type'    => 'text',
            'default' =>'1',
        ) );

}

