<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package temptation
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<!--<aside id="secondary" class="widget-area col-md-4">-->
<div id="secondary" class="widget-area <?php do_action('temptation_secondary-width') ?>" role="complementary">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
