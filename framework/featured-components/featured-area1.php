<?php if(get_theme_mod('temptation_celsius_enable') && is_front_page()):?>
    <div id="celsius_container" class="featured-section-area">
        <div class="container">
            <?php
            if(get_theme_mod('temptation_celsius_title')):?>
                <div class="section-title">
                    <?php
                    echo esc_html(get_theme_mod('temptation_celsius_title'));
                    ?>
                </div>
                <div class="bottom-bar"></div>
            <?php endif;?>
            <div id="celsius_outer" class="col-md-12 col-sm-12 celsius-outer">

                <?php /* Start the Loop */ $count=0; ?>
                <?php
                $args = array( 'posts_per_page' => 4, 'category' => esc_html(get_theme_mod('temptation_celsius_cat')) );
                $lastposts = get_posts( $args );
                foreach ( $lastposts as $post ) :
                    setup_postdata( $post ); ?>
                    <div class="celsius-wrapper-outer"></div>
                    <div class="celsius-wrapper col-md-3 col-sm-6">
                        <div class="celsius-inner">
                        <a href="<?php the_permalink() ?>">
                            <div class="celsius-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('celsius-thumb',array('alt' => trim(strip_tags( $post->post_title )))); ?></div>
                                <?php else : ?>
                                    <div title="<?php the_title_attribute() ?>"><img alt="<?php the_title() ?>" src="<?php echo esc_html(get_template_directory_uri()."/assets/images/placeholder2.jpg"); ?>"></div>
                                <?php endif; ?>
                            </div>

                            <div class="celsius-title">
                                <h3><?php the_title(); ?></h3>
                            </div>
                        </a>
                        </div>
                    </div>


                    <?php $count++;
                    if ($count == 4) break;
                endforeach; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif;?>