<?php
function temptation_customize_register_layout( $wp_customize )
{
    $wp_customize->add_panel('temptation_layout_panel', array(
        'title' => __('Design & Layout', 'temptation'),
        'priority' => 30,
    ));
    //Custom Footer Text
    $wp_customize-> add_section(
        'temptation_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','temptation'),
            'description'	=> __('Enter your Own Copyright Text.','temptation'),
            'priority'		=> 30,
            'panel'			=> 'temptation_layout_panel'
        )
    );

    $wp_customize->add_setting(
        'temptation_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'temptation_footer_text',
        array(
            'section' => 'temptation_custom_footer',
            'settings' => 'temptation_footer_text',
            'type' => 'text'
        )
    );

    $wp_customize->add_section(
        'temptation_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','temptation'),
            'priority'  => 0,
            'panel'     => 'temptation_layout_panel'
        )
    );

    $wp_customize->add_setting(
        'temptation_disable_sidebar',
        array( 'sanitize_callback' => 'temptation_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'temptation_disable_sidebar', array(
            'settings' => 'temptation_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','temptation' ),
            'section'  => 'temptation_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'temptation_disable_sidebar_home',
        array( 'sanitize_callback' => 'temptation_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'temptation_disable_sidebar_home', array(
            'settings' => 'temptation_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','temptation' ),
            'section'  => 'temptation_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'temptation_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'temptation_disable_sidebar_front',
        array( 'sanitize_callback' => 'temptation_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'temptation_disable_sidebar_front', array(
            'settings' => 'temptation_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','temptation' ),
            'section'  => 'temptation_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'temptation_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'temptation_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'temptation_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'temptation_sidebar_width', array(
            'settings' => 'temptation_sidebar_width',
            'label'    => __( 'Sidebar Width','temptation' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','temptation'),
            'section'  => 'temptation_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'temptation_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function temptation_show_sidebar_options($control) {

        $option = $control->manager->get_setting('temptation_disable_sidebar');
        return $option->value() == false ;

    }
}
add_action('customize_register','temptation_customize_register_layout');