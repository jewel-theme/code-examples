<?php
/**
 * Customizer: Add Settings
 *
 * This file demonstrates how to add 
 * Settings to the Customizer
 * 
 * @package 	code-examples
 * @copyright	Copyright (c) 2015, WordPress Theme Review Team
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */
 

/**
 * Theme Options Customizer Implementation
 *
 * Implement the Theme Customizer for 
 * Theme Settings.
 * 
 * @param 	object	$wp_customize	Object that holds the customizer data
 * 
 * @link	http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/	Otto
 */
function theme_slug_register_customizer_settings( $wp_customize ){

	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
	/**
	 * Add Menu Position Setting
	 * 
	 * Uses a dropdown select to configure the
	 * position of the primary nav menu, either
	 * above or below the header image.
	 * 
	 * @uses	$wp_customize->add_setting()	https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
	 * @link	$wp_customize->add_panel()	https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
	 * 
	 * @param	string	$id			Setting ID. Passed to $wp_customize->add_control()
	 * @param	array	$args		Arguments passed to the Setting
	 */
	$wp_customize->add_setting(
		// $id
		'menu_position',
		// $args
		array(
			'default'			=> 'above',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'theme_slug_sanitize_select'
		)
	);

}
// Settings API options initilization and validation
add_action( 'customize_register', 'theme_slug_register_customizer_settings' );