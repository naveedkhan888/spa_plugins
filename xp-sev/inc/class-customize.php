<?php

if (!defined( 'ABSPATH' )) {
	exit;
}
if (!class_exists( 'Xp_Sev_Customize' )){

	class Xp_Sev_Customize {

		public function __construct() {
			add_action( 'customize_register', array( $this, 'xp_sev_customize_register' ) );
		}

		public function xp_sev_customize_register($wp_customize) {

			$this->xp_sev_init( $wp_customize );

			do_action( 'xp_sev_customize_register', $wp_customize );
		}


		public function xp_sev_init( $wp_customize ){

			$wp_customize->add_panel( 'xp_sev_section' , array(
				'title'      => esc_html__( 'Service', 'xp-sev' ),
				'priority'   => 5,
			) );

			    // Archive
				$wp_customize->add_section( 'xp_sev_archive_section' , array(
				    'title'     => esc_html__( 'Archive', 'xp-sev' ),
				    'priority'  => 1,
				    'panel' 	=> 'xp_sev_section'
				) );


					$wp_customize->add_setting( 'xp_sev_total_record', array(
						  'type' => 'theme_mod', // or 'option'
						  'capability' => 'edit_theme_options',
						  'theme_supports' => '', // Rarely needed.
						  'default' => '6',
						  'transport' => 'refresh', // or postMessage
						  'sanitize_callback' => 'sanitize_text_field' // Get function name 
						  
						) );

					$wp_customize->add_control('xp_sev_total_record', array(
						'label' => esc_html__('Number of posts per page','xp-sev'),
						'section' => 'xp_sev_archive_section',
						'settings' => 'xp_sev_total_record',
						'type' =>'number'
					));

					$wp_customize->add_setting( 'xp_sev_layout', array(
						  'type' => 'theme_mod', // or 'option'
						  'capability' => 'edit_theme_options',
						  'theme_supports' => '', // Rarely needed.
						  'default' => 'three_column',
						  'transport' => 'refresh', // or postMessage
						  'sanitize_callback' => 'sanitize_text_field' // Get function name 
						  
						) );
					
					$wp_customize->add_control('xp_sev_layout', array(
						'label' => esc_html__('Layout','xp-sev'),
						'section' => 'xp_sev_archive_section',
						'settings' => 'xp_sev_layout',
						'type' =>'select',
						'choices' => array(
							'two_column'      => __( '2 column', 'xp-sev' ),
							'three_column' => __( '3 column', 'xp-sev' ),
							'four_column'      => __( '4 column', 'xp-sev' ),
						)
					));

					$wp_customize->add_setting( 'header_archive_sev', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );

					$wp_customize->add_control('header_archive_sev', array(
						'label' => esc_html__('Header Archive','xp-sev'),
						'section' => 'xp_sev_archive_section',
						'settings' => 'header_archive_sev',
						'type' =>'select',
						'choices' => apply_filters('spalisho_list_header', '')
					));

					$wp_customize->add_setting( 'archive_footer_sev', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );

					$wp_customize->add_control('archive_footer_sev', array(
						'label' => esc_html__('Footer Archive','xp-sev'),
						'section' => 'xp_sev_archive_section',
						'settings' => 'archive_footer_sev',
						'type' =>'select',
						'choices' => apply_filters('spalisho_list_footer', '')
					));

				// Single
				$wp_customize->add_section( 'xp_sev_single_section' , array(
				    'title'     => esc_html__( 'Single', 'xp-sev' ),
				    'priority'  => 2,
				    'panel' 	=> 'xp_sev_section',
				) );

					$wp_customize->add_setting( 'header_single_sev', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );

					$wp_customize->add_control('header_single_sev', array(
						'label' => esc_html__('Header Single','xp-sev'),
						'section' => 'xp_sev_single_section',
						'settings' => 'header_single_sev',
						'type' =>'select',
						'choices' => apply_filters('spalisho_list_header', '')
					));


					$wp_customize->add_setting( 'single_footer_sev', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );

					$wp_customize->add_control('single_footer_sev', array(
						'label' => esc_html__('Footer Single','xp-sev'),
						'section' => 'xp_sev_single_section',
						'settings' => 'single_footer_sev',
						'type' =>'select',
						'choices' => apply_filters('spalisho_list_footer', '')
					));

		}

	}

}

new Xp_Sev_Customize();






