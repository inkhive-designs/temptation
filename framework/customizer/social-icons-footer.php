<?php
//social-icons
function temptation_customize_register_social_footer( $wp_customize ){
    $wp_customize -> add_panel('temptation_header_panel',array(
        'title' => __('Header Settings' , 'temptation'),
        'priority' => 20,
    ));
    $wp_customize -> add_section('temptation_social_section_footer', array(
        'title' => __('Social Icons (Footer)','temptation'),
        'priority' => 30,
        'panel' => 'temptation_header_panel',
        'description' => __('Note: <strong> Footer Sidebar </strong> must contain atleast one <strong> Widget Area </strong> for displaying Footer Social Icons.','temptation')
    ));

    $social_networks_footer = array(
        'none' => __('-' ,'temptation'),
        'facebook-f' => __('Facebook' ,'temptation'),
        'twitter' => __('Twitter' ,'temptation'),
        'google-plus-g' => __('Google Plus' ,'temptation'),
        'instagram' => __('Instagram' ,'temptation'),
        'vine' => __('Vine' ,'temptation'),
        'vimeo-v' => __('Vimeo' ,'temptation'),
        'youtube' => __('Youtube' ,'temptation'),
        'flickr' => __('Flickr' ,'temptation'),
        'pinterest-p' => __('Pinterest' ,'temptation'),
    );
    $social_count_footer = count($social_networks_footer);

    for( $y=1; $y <= ($social_count_footer - 4); $y++):

        $wp_customize -> add_setting('temptation_social_footer_'.$y, array(
            'default' => 'none',
            'sanitize_callback' => 'temptation_sanitize_social_footer',
        ));
        $wp_customize -> add_control('temptation_social_footer_'.$y, array(
            'settings' => 'temptation_social_footer_'.$y,
            'section' => 'temptation_social_section_footer',
            'label'     => __('Icon ', 'temptation').$y,
            'type'      => 'select',
            'choices'    => $social_networks_footer,
        ));

        $wp_customize -> add_setting('temptation_social_url_footer'.$y, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize -> add_control('temptation_social_url_footer'.$y, array(
            'settings' => 'temptation_social_url_footer'.$y,
            'section' => 'temptation_social_section_footer',
            'description' => __('Icon ' , 'temptation').$y.__(' Url', 'temptation'),
            'type'  =>  'url',
            'choices' => $social_networks_footer,
        ));
    endfor;

    //sanitization function
    function temptation_sanitize_social_footer($input){
        $social_networks_footer = array(
            'none' ,
            'facebook-f',
            'twitter',
            'google-plus-g',
            'instagram',
            'vine',
            'vimeo-v',
            'youtube',
            'flickr',
            'pinterest-p');

        if(in_array($input,$social_networks_footer)):
            return $input;
        else:
            return '';
        endif;
    }
}
add_action('customize_register','temptation_customize_register_social_footer');