<?php
/*
** Function to Get Theme Layout
*/
/*
 ** Determine Sidebar and Primary Width
 */
//pagination
/*
 * Pagination Function. Implements core paginate_links function.
 */
function temptation_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array'
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div><ul>';
        echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
        foreach ( $page_format as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></div></div>';
    }
}


/*
** Function to check if Sidebar is enabled on Current Page 
*/

function temptation_load_sidebar() {
    $load_sidebar = true;
    if ( get_theme_mod('temptation_disable_sidebar') ) :
        $load_sidebar = false;
    elseif( get_theme_mod('temptation_disable_sidebar_home') && is_home() )	:
        $load_sidebar = false;
    elseif( get_theme_mod('temptation_disable_sidebar_front') && is_front_page() ) :
        $load_sidebar = false;
    endif;

    return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function temptation_primary_class() {
    $sw = esc_html(get_theme_mod('temptation_sidebar_width',4));
    $class = "col-md-".(12-$sw);

    if ( !temptation_load_sidebar() )
        $class = "col-md-12";

    echo esc_attr($class);
}
add_action('temptation_primary-width', 'temptation_primary_class');

function temptation_secondary_class() {
    $sw = esc_html(get_theme_mod('temptation_sidebar_width',4));
    $class = "col-md-".$sw;

    echo esc_attr($class);
}
add_action('temptation_secondary-width', 'temptation_secondary_class');


/*
** Load WooCommerce Compatibility FIle
*/
if ( class_exists('woocommerce') ) :
    require get_template_directory() . '/framework/woocommerce.php';
endif;