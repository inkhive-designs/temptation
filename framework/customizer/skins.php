<?php
function temptation_customize_register_skins($wp_customize){
    $wp_customize->get_section('colors')->title = __('Theme Skins & Colors','temptation');
    $wp_customize->get_section('colors')->panel = 'temptation_layout_panel';
    $wp_customize->get_control('background_color')->default = '#171717';

    $wp_customize->add_setting('temptation_site_titlecolor', array(
        'default'     => '#ededed',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'temptation_site_titlecolor', array(
            'label' => __('Site Title Color','temptation'),
            'section' => 'colors',
            'settings' => 'temptation_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('temptation_header_desccolor', array(
        'default'     => '#ededed',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'temptation_header_desccolor', array(
            'label' => __('Site Tagline Color','temptation'),
            'section' => 'colors',
            'settings' => 'temptation_header_desccolor',
            'type' => 'color'
        ) )
    );

    //Temptation Skins

    $wp_customize -> add_setting('temptation_skin',array(
            'default' => 'default',
            'sanitize_callback' => 'temptation_sanitize_skin',
    ));

    $skins = array(
            'default' => __('Default(Temptation)','temptation'),
            'red' => __('Red','temptation'),
    );

    $wp_customize -> add_control('temptation_skin',array(
            'settings' => 'temptation_skin',
            'section' => 'colors',
            'label' => __('Choose Skins','temptation'),
            'type' => 'select',
            'choices' => $skins,
    ));

    function temptation_sanitize_skin($input){
        if( in_array($input, array('default','red') )):
            return $input;
        else:
            return '';
            endif;
    }
}
add_action('customize_register','temptation_customize_register_skins');