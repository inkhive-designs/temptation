<?php
/*
** WooCommerce Compatibility File for Temptation Theme
** Created by Rohit Tripathi, Rohitink.com (c) 2015
** @package Temptation
*/

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'temptation_dequeue_woocommerce_styles' );
function temptation_dequeue_woocommerce_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	//unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	//unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

/**
 * Set Default Thumbnail Sizes for Woo Commerce Product Pages, on Theme Activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) 			
	add_action( 'init', 'temptation_woocommerce_image_dimensions', 1 );
/**
 * Define image sizes
 */
function temptation_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);	 
	$thumbnail = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 0 		// false
	);	 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

//Custom Hooking for Product Loop Page Items.
function temptation_before_wc_title() {
	echo "<div class='product-desc'>";
}
add_action('woocommerce_before_shop_loop_item_title', 'temptation_before_wc_title', 15);

function temptation_after_wc_title() {
	echo "</div>";
}
add_action('woocommerce_after_shop_loop_item_title', 'temptation_after_wc_title');

/**
 * Remove the "shop" title on the main shop page
*/
function temptation_woo_hide_page_title() {
	return false;
}
add_filter( 'woocommerce_show_page_title' , 'temptation_woo_hide_page_title' );

/**
 * Change the Breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'temptation_change_breadcrumb_delimiter' );
function temptation_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>>'
	$defaults['delimiter'] = ' <i class="fa fa-angle-right"></i> ';
	return $defaults;
}

/*
 * WooCommerce Output Wrappers for for Single Product(single-product.php) and Product Archives(archive-product.php)
 */
add_action('woocommerce_before_main_content', 'temptation_single_custom_header', 1 );

function temptation_single_custom_header() {
    if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <div class="header-title col-md-12">
            <span><?php woocommerce_page_title(); ?></span>
        </div>
    <?php endif; ?>

    <div id="primary-mono" class="content-area <?php do_action('temptation_primary-width') ?>">
        <main id="main" class="site-main" role="main">
    <?php
}

add_action( 'woocommerce_after_main_content', 'temptation_single_custom_footer', 50 );

function temptation_single_custom_footer() {
    echo "</main></div>";
}


/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
add_filter( 'woocommerce_output_related_products_args', 'temptation_change_related_products_count' );

function temptation_change_related_products_count( $args ) {
     $args['posts_per_page'] = 3;
     $args['columns'] = 3;

     return $args;
}

//Product Gallery Size 
function temptation_gallery_four_columns(  ){
    return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'temptation_gallery_four_columns');

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		$i = get_theme_mod('temptation_woo_layout',3);
		return $i; // 3 products per row
	}
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.get_theme_mod("temptation_woo_qty", 12).';' ), 20 );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'temptation_header_add_to_cart_fragment' );

function temptation_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
			<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'temptation'); ?>">
						<div class="count"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'temptation'), WC()->cart->cart_contents_count);?></div>
						
					</a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}
