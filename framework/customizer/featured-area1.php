<?php
function temptation_customize_register_post_celsius( $wp_customize ) {
    //FEATURED POSTS
    $wp_customize->add_panel('temptation_farea_panel', array(
        'priority' => 35,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Featured Posts Area', 'temptation'),
        'description' => '',
    ));
    $wp_customize->add_section(
        'temptation_featposts1',
        array(
            'title'     => __('Featured Posts 1','temptation'),
            'priority'  => 35,
            'panel'     => 'temptation_farea_panel'
        )
    );

    $wp_customize->add_setting(
        'temptation_celsius_enable',
        array( 'sanitize_callback' => 'temptation_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'temptation_celsius_enable', array(
            'settings' => 'temptation_celsius_enable',
            'label'    => __( 'Enable Featured Area 1', 'temptation' ),
            'section'  => 'temptation_featposts1',
            'type'     => 'checkbox',
        )
    );
    //title
    $wp_customize->add_setting(
        'temptation_celsius_title',
        array('sanitize_callback' => 'sanitize_text_field')
    );

    $wp_customize->add_control(
        'temptation_celsius_title', array(
            'setting' => 'temptation_celsius_title',
            'label' => __('Title for the featured area 1', 'temptation'),
            'section' => 'temptation_featposts1',
            'type' => 'text',
        )
    );


    $wp_customize->add_setting(
        'temptation_celsius_cat',
        array( 'sanitize_callback' => 'temptation_sanitize_category' )
    );


    $wp_customize->add_control(
        new Temptation_WP_Customize_Category_Control(
            $wp_customize,
            'temptation_celsius_cat',
            array(
                'label'    => __('Category For Featured Posts','temptation'),
                'settings' => 'temptation_celsius_cat',
                'section'  => 'temptation_featposts1'
            )
        )
    );
}
add_action( 'customize_register', 'temptation_customize_register_post_celsius' );