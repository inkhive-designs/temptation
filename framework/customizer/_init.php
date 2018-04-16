<?php
/**
 * temptation Theme Customizer
 *
 * @package temptation
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function temptation_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'title_tagline')->title = __( 'Title, Tagline & Logo', 'temptation' );
    $wp_customize->get_section( 'title_tagline')->priority = 10;
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_control('header_textcolor');

    if (class_exists('rt_slider')) {
        for($i=1; $i<=10; $i++):
        $wp_customize->remove_control('rtslider_slide_desc'.$i);
        $wp_customize->remove_control('rtslider_slide_cta_button'.$i);
        endfor;

        $wp_customize->add_setting(
            'temptation_disable_overlay',
            array( 'sanitize_callback' => 'temptation_sanitize_checkbox' )
        );
        $wp_customize->add_control(
            'temptation_disable_overlay', array(
                'settings' => 'temptation_disable_overlay',
                'label'    => __( 'Disable overlay Content.','temptation' ),
                'section'  => 'rtslider_sec_slider_options',
                'type'     => 'checkbox',
                'default'  => false,
                'priority' => 1
            )
        );

    }


    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'temptation_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'temptation_customize_partial_blogdescription',
        ) );
    }
}
add_action( 'customize_register', 'temptation_customize_register' );

require_once get_template_directory().'/framework/customizer/customizer_controls.php';
require_once get_template_directory().'/framework/customizer/_sanitizations.php';
require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/_googlefonts.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/featured-area1.php';
require_once get_template_directory().'/framework/customizer/social-icons-footer.php';
require_once get_template_directory().'/framework/customizer/layouts.php';
require_once get_template_directory().'/framework/customizer/skins.php';

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function temptation_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function temptation_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function temptation_customize_preview_js() {
    wp_enqueue_script( 'temptation-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'temptation_customize_preview_js' );
