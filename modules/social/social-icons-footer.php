<?php
for( $i=1; $i < 7; $i++):
    $social_footer = esc_attr(get_theme_mod('temptation_social_footer_'.$i));
    if ( ($social_footer != 'none') && ($social_footer != '') ) : ?>
        <a class="common" href="<?php echo esc_url( get_theme_mod('temptation_social_url_footer'.$i) ); ?>"><i class="fab fa-<?php echo $social_footer; ?>"></i></a>
    <?php
    endif;
endfor;