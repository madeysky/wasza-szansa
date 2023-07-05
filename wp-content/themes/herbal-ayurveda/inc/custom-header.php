<?php
/**
 * @package Herbal Ayurveda
 * Setup the WordPress core custom header feature.
 *
 * @uses herbal_ayurveda_header_style()
*/
function herbal_ayurveda_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'herbal_ayurveda_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 70,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'herbal_ayurveda_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'herbal_ayurveda_custom_header_setup' );

if ( ! function_exists( 'herbal_ayurveda_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see herbal_ayurveda_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'herbal_ayurveda_header_style' );

function herbal_ayurveda_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        #topbar{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'herbal-ayurveda-basic-style', $custom_css );
	endif;
}
endif;