<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package temptation
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('temptation');?>>
    <div class="temptation-wrapper">
    <div class="col-md-6 col-sm-6">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('temptation-pop-thumb',array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img alt="<?php the_title() ?>" src="<?php echo esc_url(get_template_directory_uri()."/assets/images/placeholder2.jpg"); ?>" alt="<?php echo the_title() ?>"></a>
        <?php endif; ?>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="out-thumb">
            <a class="post-ttl" href="<?php the_permalink() ?>"><h3 class="entry-title"> <?php the_title() ?></h3></a>
            <p class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,150).(get_the_excerpt() ? "..." : "" ); ?></p>

            <?php
            $categories = get_the_category();
            //            if ( ! empty( $categories ) ) {?>
            <div class="cat">
                <?php
                if ( 'post' === get_post_type() ) {
                    /* translators: used between list items, there is a space after the comma */
                    $categories_list = get_the_category_list( esc_html__( ' ', 'temptation' ) );
                    if ( $categories_list ) {
                        /* translators: 1: list of categories. */
                        printf( '<span class="cat-links">' . esc_html__( '%1$s', 'temptation' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                    }
                }//                }
                ?>
            </div>

        </div>
    </div>
    </div>
</article>


