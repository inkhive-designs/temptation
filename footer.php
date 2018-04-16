<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package temptation
 */
?>

</div><!-- #content -->

<?php get_sidebar('footer'); ?>
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info container">
        <?php printf( __( 'Powered by %1$s.', 'temptation' ), '<a target="blank" href="'.esc_url("https://inkhive.com/product/temptation/").'" target="blank" rel="nofollow">Temptation Theme</a>' ); ?>
        <span class="sep"></span>
        <?php echo ( esc_html(get_theme_mod('temptation_footer_text')) == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','temptation')) : esc_html( get_theme_mod('temptation_footer_text') ); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->



<?php wp_footer(); ?>

</body>
</html>
