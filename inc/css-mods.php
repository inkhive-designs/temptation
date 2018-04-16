<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 11/24/2017
 * Time: 3:17 PM
 */
function temptation_custom_css_mods(){
    $custom_css = "";

    //TItle Tagline hidden.
    if ( get_theme_mod('temptation_hide_title_tagline') ) :
        $custom_css .=  "#masthead .top-bar .site-branding h1.site-title, #masthead .top-bar .site-branding p.site-description { display: none; }";
    endif;
    
    if ( get_theme_mod('temptation_title_font','Gugi') ) :
        $custom_css .= ".title-font, h1, h2,h3, .section-title, .woocommerce ul.products li.product h3 { font-family: ".esc_html( get_theme_mod('temptation_title_font','Gugi') )."; }";
    endif;


    if ( get_theme_mod('temptation_body_font','Montserrat') ) :
        $custom_css .= "body, h2.site-description { font-family: ".esc_html( get_theme_mod('temptation_body_font','Montserrat') )."; }";
    endif;


    if ( get_theme_mod('temptation_site_titlecolor','#ededed') ) :
        $custom_css .=  "#masthead .site-branding .site-title a { color:".esc_html( get_theme_mod('temptation_site_titlecolor','#ededed') )." !important;}";
    endif;


    if ( get_theme_mod('temptation_header_desccolor','#ededed') ) :
        $custom_css .= "#masthead .site-branding p.site-description{ color: ".esc_html( get_theme_mod('temptation_header_desccolor','#ededed') )."; }";
    endif;


    if(get_theme_mod('temptation_header_image_style')=='default'):
        $custom_css .= ".header-image{ overflow: hidden !important; max-height:200px !important;}";
        endif;

    if(get_theme_mod('temptation_disable_sidebar')){
        $custom_css .= "#secondary{display:none;} 
                        #primary,#primary-mono{position: relative;}";
    }
    elseif (get_theme_mod('temptation_disable_sidebar_home') && is_home()){
        $custom_css .= ".blog #secondary,.home #secondary{display:none;
                        #primary,#primary-mono{position: relative !important;}";
    }
    elseif (is_front_page() && (get_theme_mod('temptation_disable_sidebar_front'))){
        $custom_css .= ".home #secondary{display:none;
                        #primary,#primary-mono{position: relative !important;}";

    }

    if(get_theme_mod('temptation_disable_overlay',true)):
        $custom_css .= "#content{margin-top:0px;}";
            endif;

            wp_add_inline_style( 'temptation-main-theme-style', strip_tags($custom_css) );

}

add_action('wp_enqueue_scripts', 'temptation_custom_css_mods');