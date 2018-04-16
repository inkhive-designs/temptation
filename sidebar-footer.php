<?php
/*
 * The Footer Widget Area
 * @package temptation
 */
?>
    </div><!--.mega-container-->
<?php if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') ) : ?>
    <div id="footer-sidebar" class="widget-area">
        <div class="container">
            <?php get_template_part('modules/footer/bottom','bar'); ?>
            <?php
            if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div class="footer-column col-md-4 col-sm-4">
                    <?php dynamic_sidebar( 'footer-1'); ?>
                </div>
            <?php endif;

            if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div class="footer-column col-md-4 col-sm-4">
                    <?php dynamic_sidebar( 'footer-2'); ?>
                </div>
            <?php endif;

            if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div class="footer-column col-md-4 col-sm-4"> <?php
                    dynamic_sidebar( 'footer-3'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>	<!--#footer-sidebar-->
<?php endif; ?>