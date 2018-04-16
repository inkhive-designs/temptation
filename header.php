<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package temptation
 */

?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'temptation' ); ?></a>

    <?php get_template_part('modules/header/masthead'); ?>
    <?php
    if(!class_exists('rt_slider'))
    {
        get_template_part('modules/header/header', 'image');
    }
    elseif(is_home()) {
        if (get_theme_mod('rtslider_enable', 'true')) {
            if (class_exists('rt_slider')) {
                rt_slider::render('framework/featured-components/slider', 'swiper');
            }
        } else {
            get_template_part('modules/header/header', 'image');
        }
    }
   elseif (is_single() || is_category() || is_search() || is_archive()){
         if (get_theme_mod('rtslider_enable_posts', 'true')) {
            if (class_exists('rt_slider')) {
                rt_slider::render('framework/featured-components/slider', 'swiper');
            }
        } else {
            get_template_part('modules/header/header', 'image');
        }
   }
    elseif (is_front_page()){
        if (get_theme_mod('rtslider_enable_front', 'true')) {
            if (class_exists('rt_slider')) {
                rt_slider::render('framework/featured-components/slider', 'swiper');
            }
        } else {
            get_template_part('modules/header/header', 'image');
        }
    }

    else {
        if (is_singular()) {
            if (get_theme_mod('rtslider_enable_pages', 'true')) {
                if (class_exists('rt_slider')) {
                    rt_slider::render('framework/featured-components/slider', 'swiper');
                }
            } else {
                get_template_part('modules/header/header', 'image');
            }
        }
    }


    ?>

	<div id="content" class="site-content container">
        <?php get_template_part('framework/featured-components/featured','area1'); ?>
