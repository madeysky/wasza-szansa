<?php
/**
 * The template part for header
 *
 * @package Herbal Ayurveda 
 * @subpackage herbal-ayurveda
 * @since herbal-ayurveda 1.0
 */
?>

<div id="header">
  <?php if(has_nav_menu('primary')){ ?>
    <div class="toggle-nav mobile-menu text-lg-end text-md-center text-center">
      <button role="tab" onclick="herbal_ayurveda_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','herbal-ayurveda'); ?></span></button>
    </div>
  <?php } ?>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'herbal-ayurveda' ); ?>">
      <?php if(has_nav_menu('primary')){
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu clearfix' ,
          'menu_class' => 'clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
      } ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="herbal_ayurveda_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','herbal-ayurveda'); ?></span></a>
    </nav>
  </div>
</div>