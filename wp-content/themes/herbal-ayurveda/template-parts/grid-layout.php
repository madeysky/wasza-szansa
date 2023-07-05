<?php
/**
 * The template part for displaying grid post
 *
 * @package Herbal Ayurveda
 * @subpackage herbal-ayurveda
 * @since herbal-ayurveda 1.0
 */
?>
<?php
    $herbal_ayurveda_archive_year  = get_the_time('Y');
    $herbal_ayurveda_archive_month = get_the_time('m');
    $herbal_ayurveda_archive_day   = get_the_time('d');
?>
<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box p-3 mb-3 wow zoomIn" data-wow-duration="2s">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'herbal_ayurveda_featured_image_hide_show',true) == 1) {
		              the_post_thumbnail();
		            }
	          	?>
	        </div>
	        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <?php if( get_theme_mod( 'herbal_ayurveda_grid_postdate',true) == 1 || get_theme_mod( 'herbal_ayurveda_grid_author',true) == 1 || get_theme_mod( 'herbal_ayurveda_grid_comments',true) == 1) { ?>
		        <div class="post-info">
		            <hr>
		            <?php if(get_theme_mod('herbal_ayurveda_grid_postdate',true)==1){ ?>
		                <i class="<?php echo esc_attr(get_theme_mod('herbal_ayurveda_single_postdate_icon','fas fa-calendar-alt')); ?> me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $herbal_ayurveda_archive_year, $herbal_ayurveda_archive_month, $herbal_ayurveda_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
		            <?php } ?>

		            <?php if(get_theme_mod('herbal_ayurveda_grid_author',true)==1){ ?>
		                <span><?php echo esc_html(get_theme_mod('herbal_ayurveda_single_post_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('herbal_ayurveda_grid_author_icon','fas fa-user')); ?> me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
		            <?php } ?>

		            <?php if(get_theme_mod('herbal_ayurveda_grid_comments',true)==1){ ?>
		                <span><?php echo esc_html(get_theme_mod('herbal_ayurveda_single_post_meta_field_separator', '|'));?></span> <i class="<?php echo esc_attr(get_theme_mod('herbal_ayurveda_grid_comments_icon','fa fa-comments')); ?> me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'herbal-ayurveda'), __('0 Comments', 'herbal-ayurveda'), __('% Comments', 'herbal-ayurveda') ); ?></span>
		            <?php } ?>
		            <hr>
		        </div>
		    <?php } ?>
	        <div class="new-text">
	        	<p>
			        <?php $herbal_ayurveda_excerpt = get_the_excerpt(); echo esc_html( herbal_ayurveda_string_limit_words( $herbal_ayurveda_excerpt, esc_attr(get_theme_mod('herbal_ayurveda_related_posts_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('herbal_ayurveda_excerpt_suffix','') ); ?>
	        	</p>
	        </div>
	        <?php if( get_theme_mod('herbal_ayurveda_button_text','Read More') != ''){ ?>
	          <div class="more-btn mt-4 mb-4">
	            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('herbal_ayurveda_button_text',__('Read More','herbal-ayurveda')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('herbal_ayurveda_button_text',__('Read More','herbal-ayurveda')));?></span></a>
	          </div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>