<?php
/**
 * Elo Theme Customizer
 *
 * @package Elo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'elo_cover_section', array(
        'title'          => 'Cover Image',
        'priority'       => 30,
    ) );

	$wp_customize->add_setting( 'elo_cover', array(
        'default'        => '/wp-content/themes/elo/images/cover.jpg',
        'sanitize_callback' => 'elo_sanitize_cover'
    ) );

     $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'elo_cover', array(
        'label'   => 'Cover Image',
        'section' => 'elo_cover_section',
        'settings'   => 'elo_cover',
        'priority' => 1
    ) ) ); 
}
add_action( 'customize_register', 'elo_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elo_customize_preview_js() {
	wp_enqueue_script( 'elo_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'elo_customize_preview_js' );

if ( ! function_exists( 'elo_sanitize_cover' ) ) :
function elo_sanitize_cover( $value ) {
    return $value;
}
endif; // elo_sanitize_cover
