<?php
//social-icons
function temptation_customize_register_social( $wp_customize ){
    $wp_customize -> add_panel('temptation_header_panel',array(
            'title' => __('Header Settings' , 'temptation'),
            'priority' => 20,
    ));
    $wp_customize -> add_section('temptation_social_section', array(
            'title' => __('Social Icons (Header)','temptation'),
            'priority' => 20,
            'panel' => 'temptation_header_panel'
    ));

    $social_networks = array(
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
    $social_count = count($social_networks);
    
    for( $x=1; $x <= ($social_count - 4); $x++):
        
        $wp_customize -> add_setting('temptation_social_'.$x, array(
                'default' => 'none',
                'sanitize_callback' => 'temptation_sanitize_social',
        ));
        $wp_customize -> add_control('temptation_social_'.$x, array(
                'settings' => 'temptation_social_'.$x,
                'section' => 'temptation_social_section',
                'label'     => __('Icon ', 'temptation').$x,
                'type'      => 'select',
                'choices'    => $social_networks,
        ));

        $wp_customize -> add_setting('temptation_social_url'.$x, array(
                'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize -> add_control('temptation_social_url'.$x, array(
                'settings' => 'temptation_social_url'.$x,
                'section' => 'temptation_social_section',
                'description' => __('Icon ' , 'temptation').$x.__(' Url', 'temptation'),
                'type'  =>  'url',
                'choices' => $social_networks,
        ));
    endfor;

    //sanitization function
        function temptation_sanitize_social($input){
            $social_networks = array(
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

            if(in_array($input,$social_networks)):
                return $input;
            else:
                return '';
                endif;
        }
}
add_action('customize_register','temptation_customize_register_social');