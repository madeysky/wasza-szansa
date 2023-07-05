<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'herbal_ayurveda_before_slider' ); ?>

  <?php if( get_theme_mod( 'herbal_ayurveda_slider_hide_show', false) == 1 || get_theme_mod( 'herbal_ayurveda_resp_slider_hide_show', false) == 1) { ?>
    <section id="slider">
      <?php if(get_theme_mod('herbal_ayurveda_slider_type', 'Default slider') == 'Default slider' ){ ?>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'herbal_ayurveda_slider_speed',4000)) ?>">
          <?php $herbal_ayurveda_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'herbal_ayurveda_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $herbal_ayurveda_pages[] = $mod;
              }
            }
            if( !empty($herbal_ayurveda_pages) ) : 
              $args = array(
                'post_type' => 'page',
                'post__in' => $herbal_ayurveda_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/slider.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <p class="wow slideInRight delay-1000" data-wow-duration="2s"><?php $herbal_ayurveda_excerpt = get_the_excerpt(); echo esc_html( herbal_ayurveda_string_limit_words( $herbal_ayurveda_excerpt, esc_attr(get_theme_mod('herbal_ayurveda_slider_excerpt_number','20')))); ?></p>
                    <div class="slider-btn wow slideInRight delay-1000" data-wow-duration="2s">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('herbal_ayurveda_slider_button_text',__('Discover More','herbal-ayurveda')));?><span class="screen-reader-text"><?php echo esc_html('Discover More','herbal-ayurveda');?></span></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile;
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <a class="carousel-control-prev" data-bs-target="#carouselExampleInterval" data-bs-slide="prev" role="button">
            <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-angle-left"></i>PREV</span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','herbal-ayurveda' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleInterval" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true">NEXT<i class="fas fa-angle-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','herbal-ayurveda' );?></span>
          </a>
        </div>
      <?php } else if(get_theme_mod('herbal_ayurveda_slider_type', 'Advance slider') == 'Advance slider'){?>
        <?php echo do_shortcode(get_theme_mod('herbal_ayurveda_advance_slider_shortcode')); ?>
      <?php } ?>
    </section>
  <?php }?>

  <?php do_action( 'herbal_ayurveda_after_slider' ); ?>

  <section id="about-us-section" class="py-5 wow bounceInDown delay-1000" data-wow-duration="3s">
    <div class="container">
      <?php
      $herbal_ayurveda_about_post =  get_theme_mod('herbal_ayurveda_about_post');
      if($herbal_ayurveda_about_post){
        $args = array( 'name' => esc_html($herbal_ayurveda_about_post ,'herbal-ayurveda'));
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $count = 0;
          while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12 image-left mb-lg-0 mb-md-0 mb-4">
              <div class="abt-main-image">
                <?php the_post_thumbnail(); ?>
                <div class="abt-icon-img">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/abt-symbol-circle.png" alt="img-icons" />
                </div>
              </div>
              <div class="abt-second-img">
                <img src="<?php echo esc_url(get_theme_mod('herbal_ayurveda_about_us_background_image'));?>">
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12 about-content">
              <div class="compaign-content text-start ps-2">
                <?php if( get_theme_mod('herbal_ayurveda_compaign_small_title') != '' ){ ?>
                  <strong class="small-head mb-1"><?php echo esc_html(get_theme_mod('herbal_ayurveda_compaign_small_title',''));?></strong>
                <?php }?>
                <h2 class="mb-2"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                <p class="mb-4"><?php $excerpt = get_the_excerpt(); echo esc_html( herbal_ayurveda_string_limit_words( $excerpt, 30)); ?></p>

                <?php if( get_theme_mod('herbal_ayurveda_about_features_head') != '' || get_theme_mod('herbal_ayurveda_about_features_head_two') != '' ){ ?>
                  <div class="row abt-featured">
                    <?php if( get_theme_mod('herbal_ayurveda_about_features_head') != '' ){ ?>
                      <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-4 align-self-center">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 col-3 align-self-center">
                            <i class="fas fa-leaf"></i>
                          </div>
                          <div class="col-lg-9 col-md-8 col-9 align-self-center">
                            <span class="abt-feature"><?php echo esc_html(get_theme_mod('herbal_ayurveda_about_features_head'));?></span>
                          </div>
                        </div>
                      </div>
                    <?php }?>
                    <?php if( get_theme_mod('herbal_ayurveda_about_features_head_two') != '' ){ ?>
                      <div class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-4 align-self-center">
                        <div class="row">
                          <div class="col-lg-3 col-md-4 col-3 align-self-center">
                            <i class="fas fa-tree"></i>
                          </div>
                          <div class="col-lg-9 col-md-8 col-9 align-self-center">
                            <span class="abt-feature"><?php echo esc_html(get_theme_mod('herbal_ayurveda_about_features_head_two'));?></span>
                          </div>
                        </div>
                      </div>
                    <?php }?>
                  </div>
                <?php }?>
                <div class="learn-btn mt-md-4 mt-2">
                  <a target="_blank" href="<?php the_permalink(); ?>"><?php echo esc_html('Learn More', 'herbal-ayurveda'); ?><span class="screen-reader-text"><?php echo esc_html('Learn More', 'herbal-ayurveda'); ?></span></a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile;
          wp_reset_postdata();?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      }?>
    </div>
  </section>

  <?php do_action( 'herbal_ayurveda_after_campaign_principle_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
