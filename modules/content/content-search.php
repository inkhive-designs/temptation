<?php
/**
 * @package hanne
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <footer class="entry-footer">
        <?php temptation_entry_modified_footer(); ?>
    </footer><!-- .entry-footer -->
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title title-font">', '</h1>' ); ?>
        <div class="entry-meta">
            <?php temptation_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div id="featured-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('temptation-pop-thumb'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo esc_url(get_template_directory_uri()."/assets/images/placeholder2.jpg"); ?>"></a>
        <?php endif; ?>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'temptation' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->


</article><!-- #post-## -->
