<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package temptation
 */

get_header(); ?>

    <div id="primary-mono" class="content-area <?php do_action('temptation_primary-width') ?>">
        <main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

         get_template_part( 'modules/content/content', 'single' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
        <?php if(have_posts()): temptation_pagination(); endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
