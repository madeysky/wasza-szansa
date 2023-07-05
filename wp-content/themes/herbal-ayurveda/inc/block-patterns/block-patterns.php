<?php
/**
 *  Herbal Ayurveda: Block Patterns
 *
 * @package  Herbal Ayurveda
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'herbal-ayurveda',
		array( 'label' => __( 'Herbal Ayurveda', 'herbal-ayurveda' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'herbal-ayurveda/banner-section',
		array(
			'title'      => __( 'Banner Section', 'herbal-ayurveda' ),
			'categories' => array( 'herbal-ayurveda' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider.png\",\"id\":2844,\"dimRatio\":0,\"overlayColor\":\"black\",\"minHeight\":600,\"align\":\"full\",\"className\":\"herbal-ayurveda-banner-section\"} -->\n<div class=\"wp-block-cover alignfull herbal-ayurveda-banner-section\" style=\"min-height:600px\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-black-background-color has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-2844\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"slider-column\"} -->\n<div class=\"wp-block-columns slider-column\"><!-- wp:column {\"width\":\"50%\",\"className\":\"slider-content  \"} -->\n<div class=\"wp-block-column slider-content\" style=\"flex-basis:50%\"><!-- wp:heading {\"level\":1,\"textColor\":\"white\"} -->\n<h1 class=\"has-white-color has-text-color\" id=\"herbal-ayurveda-slider-heading\">WELCOME TO AYURVEDA</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"textColor\":\"white\",\"className\":\"herbal-ayurveda-slider-para\"} -->\n<p class=\"herbal-ayurveda-slider-para has-white-color has-text-color\">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"className\":\"slider-btn\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"left\"}} -->\n<div class=\"wp-block-buttons slider-btn\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#404a3d\",\"background\":\"#ffdb61\"},\"border\":{\"radius\":\"5px\"}},\"className\":\"herbal-ayurveda-slider-button\"} -->\n<div class=\"wp-block-button herbal-ayurveda-slider-button\"><a class=\"wp-block-button__link has-text-color has-background wp-element-button\" style=\"border-radius:5px;color:#404a3d;background-color:#ffdb61\">Discover More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"50%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:50%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'herbal-ayurveda/about-us-section',
		array(
			'title'      => __( 'About Us Section', 'herbal-ayurveda' ),
			'categories' => array( 'herbal-ayurveda' ),
			'content'    => "<!-- wp:group {\"className\":\"about-us-section\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group about-us-section\"><!-- wp:columns {\"className\":\"about-us-row\"} -->\n<div class=\"wp-block-columns about-us-row\"><!-- wp:column {\"width\":\"50%\",\"className\":\"image-left\"} -->\n<div class=\"wp-block-column image-left\" style=\"flex-basis:50%\"><!-- wp:columns {\"className\":\"about-left-section\"} -->\n<div class=\"wp-block-columns about-left-section\"><!-- wp:column {\"width\":\"70%\",\"className\":\"man-section\"} -->\n<div class=\"wp-block-column man-section\" style=\"flex-basis:70%\"><!-- wp:image {\"id\":2895,\"width\":376,\"height\":362,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"abt-main-image\"} -->\n<figure class=\"wp-block-image size-full is-resized abt-main-image\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/abt-img.png\" alt=\"\" class=\"wp-image-2895\" width=\"376\" height=\"362\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"30%\",\"className\":\"icon-section\"} -->\n<div class=\"wp-block-column icon-section\" style=\"flex-basis:30%\"><!-- wp:image {\"id\":2897,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"abt-icon-img\"} -->\n<figure class=\"wp-block-image size-full abt-icon-img\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/abt-symbol-circle.png\" alt=\"\" class=\"wp-image-2897\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"50%\",\"className\":\"about-content\"} -->\n<div class=\"wp-block-column about-content\" style=\"flex-basis:50%\"><!-- wp:image {\"id\":2904,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"about-icon\"} -->\n<figure class=\"wp-block-image size-full about-icon\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/Icon1.png\" alt=\"\" class=\"wp-image-2904\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"className\":\"about-heading\"} -->\n<p class=\"about-heading\">ABOUT AYURVEDA</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":\"45px\"}}} -->\n<h2 style=\"font-size:45px\">WE’RE LEADER IN AYURVEDIC PRODUCTS &amp; MARKET!</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"about-para\"} -->\n<p class=\"about-para\">Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"two-column-section\"} -->\n<div class=\"wp-block-columns two-column-section\"><!-- wp:column {\"className\":\"leaf-section\"} -->\n<div class=\"wp-block-column leaf-section\"><!-- wp:columns {\"className\":\"leaf-main\"} -->\n<div class=\"wp-block-columns leaf-main\"><!-- wp:column {\"width\":\"20%\",\"className\":\"leaf-img-section\"} -->\n<div class=\"wp-block-column leaf-img-section\" style=\"flex-basis:20%\"><!-- wp:image {\"id\":2912,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"leaf-img\"} -->\n<figure class=\"wp-block-image size-full leaf-img\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/Icon2.png\" alt=\"\" class=\"wp-image-2912\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"80%\",\"className\":\"leaf-para-section\"} -->\n<div class=\"wp-block-column leaf-para-section\" style=\"flex-basis:80%\"><!-- wp:paragraph {\"className\":\"leaf-para\"} -->\n<p class=\"leaf-para\">100% Organic and Toxic Free</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bowl-section\"} -->\n<div class=\"wp-block-column bowl-section\"><!-- wp:columns {\"className\":\"bowl-main\"} -->\n<div class=\"wp-block-columns bowl-main\"><!-- wp:column {\"width\":\"20%\",\"className\":\"bowl-img-section\"} -->\n<div class=\"wp-block-column bowl-img-section\" style=\"flex-basis:20%\"><!-- wp:image {\"id\":2916,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"bowl-img\"} -->\n<figure class=\"wp-block-image size-full bowl-img\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/Icon3.png\" alt=\"\" class=\"wp-image-2916\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"80%\",\"className\":\"bowl-para-section\"} -->\n<div class=\"wp-block-column bowl-para-section\" style=\"flex-basis:80%\"><!-- wp:paragraph {\"className\":\"bowl-para\"} -->\n<p class=\"bowl-para\">Always Fresh &amp; Hygienic Products</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:buttons {\"className\":\"about-btn\"} -->\n<div class=\"wp-block-buttons about-btn\"><!-- wp:button {\"className\":\"learn-more-btn\"} -->\n<div class=\"wp-block-button learn-more-btn\"><a class=\"wp-block-button__link wp-element-button\">Learn More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}