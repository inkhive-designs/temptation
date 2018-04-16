<?php
function temptation_customize_register_header( $wp_customize ) {
    //Header Sections
    $wp_customize->add_panel(
        'temptation_header_panel',
        array(
            'title'     => __('Header Settings','temptation'),
            'priority'  => 30,
        )
    );

    $wp_customize->get_section('title_tagline')->panel = 'temptation_header_panel';

    $wp_customize->get_section('header_image')->panel = 'temptation_header_panel';

    //Settings For Logo Area

    $wp_customize->add_setting(
        'temptation_hide_title_tagline',
        array( 'sanitize_callback' => 'temptation_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'temptation_hide_title_tagline', array(
            'settings' => 'temptation_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'temptation' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );
    function temptation_title_visible( $control ) {
        $option = $control->manager->get_setting('temptation_hide_title_tagline');
        return $option->value() == false ;
    }
}
add_action('customize_register','temptation_customize_register_header');	