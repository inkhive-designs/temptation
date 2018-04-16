<?php
function temptation_customize_register_fonts( $wp_customize ) {
    //Fonts
    $wp_customize->add_section(
        'temptation_typo_options',
        array(
            'title'     => __('Google Web Fonts','temptation'),
            'priority'  => 40,
            'panel'     => 'temptation_layout_panel',
        )
    );

    $font_array = array('Gugi','Montserrat','Arvo','Source Sans Pro','Open Sans','Droid Sans','Droid Serif','Roboto','Arimo','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'temptation_title_font',
        array(
            'default'=> 'Gugi',
            'sanitize_callback' => 'temptation_sanitize_gfont'
        )
    );

    function temptation_sanitize_gfont( $input ) {
        if ( in_array($input, array('Gugi','Montserrat','Arvo','Source Sans Pro','Open Sans','Droid Sans','Arimo','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora',) ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'temptation_title_font',array(
            'label' => __('Title','temptation'),
            'settings' => 'temptation_title_font',
            'section'  => 'temptation_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'temptation_body_font',
        array(	'default'=> 'Montserrat',
            'sanitize_callback' => 'temptation_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'temptation_body_font',array(
            'label' => __('Body','temptation'),
            'settings' => 'temptation_body_font',
            'section'  => 'temptation_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'temptation_customize_register_fonts');