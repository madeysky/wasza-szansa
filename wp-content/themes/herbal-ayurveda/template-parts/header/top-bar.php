<?php
/**
 * The template part for Middle Header
 *
 * @package Herbal Ayurveda
 * @subpackage herbal-ayurveda
 * @since herbal-ayurveda 1.0
 */
?>

  <div id="topbar">
    <div class="container box-topbar">
      <div class="row">
        <div class="col-lg-5 col-md-12 col-12 align-self-center mb-2 mb-md-2 mb-lg-0">
          <div class="row inner-topbar">
            <div class="col-lg-7 col-md-7 col-sm-7 col-12 text-lg-start text-md-start text-center email-box align-self-center">
              <?php if(get_theme_mod('herbal_ayurveda_email_address') != ''){ ?>
                <span class="adress"><i class="fas fa-envelope"></i> <a href="mailto:<?php echo esc_attr(get_theme_mod('herbal_ayurveda_email_address',''));?>"><?php echo esc_html(get_theme_mod('herbal_ayurveda_email_address',''));?></a></span>
            <?php }?>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-12 text-lg-start text-md-start text-center call-box align-self-center">
              <?php if(get_theme_mod('herbal_ayurveda_phone_number') != ''){ ?>
                <span class="phone-number"><i class="fas fa-phone"></i> <a href="tel:<?php echo esc_attr( get_theme_mod('herbal_ayurveda_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('herbal_ayurveda_phone_number',''));?></a></span>
              <?php }?>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-5 col-12 text-lg-center text-md-start text-center align-self-center">
          <div class="logo mb-lg-0 mb-md-0 mb-4">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('herbal_ayurveda_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('herbal_ayurveda_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('herbal_ayurveda_tagline_hide_show',false) == 1){ ?>
                <p class="site-description mb-0">
                  <?php echo esc_html($description); ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-lg-5 col-md-7 col-12 social-box text-lg-end text-md-end text-center align-self-center">
          <?php dynamic_sidebar('social-widget'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="header-menu text-center">
    <div class="container">
      <?php get_template_part('template-parts/header/navigation'); ?>
    </div>
  </div>