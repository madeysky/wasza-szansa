<?php

	$herbal_ayurveda_custom_css= "";

	/*---------------------------Width Layout -------------------*/

	$herbal_ayurveda_theme_lay = get_theme_mod( 'herbal_ayurveda_width_option','Full Width');
    if($herbal_ayurveda_theme_lay == 'Boxed'){
		$herbal_ayurveda_custom_css .='body{';
			$herbal_ayurveda_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='right: 100px;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.row.outer-logo{';
			$herbal_ayurveda_custom_css .='margin-left: 0px;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_theme_lay == 'Wide Width'){
		$herbal_ayurveda_custom_css .='body{';
			$herbal_ayurveda_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='right: 30px;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.row.outer-logo{';
			$herbal_ayurveda_custom_css .='margin-left: 0px;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_theme_lay == 'Full Width'){
		$herbal_ayurveda_custom_css .='body{';
			$herbal_ayurveda_custom_css .='max-width: 100%;';
		$herbal_ayurveda_custom_css .='}';
	}
 
	/*---------------------------Slider Height ------------*/

	$herbal_ayurveda_slider_height = get_theme_mod('herbal_ayurveda_slider_height');
	if($herbal_ayurveda_slider_height != false){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='height: '.esc_attr($herbal_ayurveda_slider_height).';';
		$herbal_ayurveda_custom_css .='}';
	}

/*------------------ Slider Opacity -------------------*/

	$herbal_ayurveda_theme_lay = get_theme_mod( 'herbal_ayurveda_slider_opacity_color','0.8');
	if($herbal_ayurveda_theme_lay == '0'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.1'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.1';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.2'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.2';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.3'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.3';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.4'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.4';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.5'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.5';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.6'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.6';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.7'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.7';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.8'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.8';
		$herbal_ayurveda_custom_css .='}';
		}else if($herbal_ayurveda_theme_lay == '0.9'){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:0.9';
		$herbal_ayurveda_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$herbal_ayurveda_slider_image_overlay = get_theme_mod('herbal_ayurveda_slider_image_overlay', true);
	if($herbal_ayurveda_slider_image_overlay == false){
		$herbal_ayurveda_custom_css .='#slider img{';
			$herbal_ayurveda_custom_css .='opacity:1;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_slider_image_overlay_color = get_theme_mod('herbal_ayurveda_slider_image_overlay_color', true);
	if($herbal_ayurveda_slider_image_overlay_color != false){
		$herbal_ayurveda_custom_css .='#slider{';
			$herbal_ayurveda_custom_css .='background-color: '.esc_attr($herbal_ayurveda_slider_image_overlay_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_theme_lay = get_theme_mod( 'herbal_ayurveda_slider_content_option','Left');
    if($herbal_ayurveda_theme_lay == 'Left'){
		$herbal_ayurveda_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$herbal_ayurveda_custom_css .='text-align:left; left:10%; right:40%;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_theme_lay == 'Center'){
		$herbal_ayurveda_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$herbal_ayurveda_custom_css .='text-align:center; left:20%; right:20%;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_theme_lay == 'Right'){
		$herbal_ayurveda_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$herbal_ayurveda_custom_css .='text-align:right; left:40%; right:10%;';
		$herbal_ayurveda_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$herbal_ayurveda_slider_content_padding_top_bottom = get_theme_mod('herbal_ayurveda_slider_content_padding_top_bottom');
	$herbal_ayurveda_slider_content_padding_left_right = get_theme_mod('herbal_ayurveda_slider_content_padding_left_right');
	if($herbal_ayurveda_slider_content_padding_top_bottom != false || $herbal_ayurveda_slider_content_padding_left_right != false){
		$herbal_ayurveda_custom_css .='#slider .carousel-caption{';
			$herbal_ayurveda_custom_css .='top: '.esc_attr($herbal_ayurveda_slider_content_padding_top_bottom).'; bottom: '.esc_attr($herbal_ayurveda_slider_content_padding_top_bottom).';left: '.esc_attr($herbal_ayurveda_slider_content_padding_left_right).';right: '.esc_attr($herbal_ayurveda_slider_content_padding_left_right).';';
		$herbal_ayurveda_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$herbal_ayurveda_resp_menu_toggle_btn_bg_color = get_theme_mod('herbal_ayurveda_resp_menu_toggle_btn_bg_color');
	if($herbal_ayurveda_resp_menu_toggle_btn_bg_color != false){
		$herbal_ayurveda_custom_css .='.toggle-nav i{';
			$herbal_ayurveda_custom_css .='background: '.esc_attr($herbal_ayurveda_resp_menu_toggle_btn_bg_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_resp_slider = get_theme_mod( 'herbal_ayurveda_resp_slider_hide_show',false);
	if($herbal_ayurveda_resp_slider == true && get_theme_mod( 'herbal_ayurveda_slider_hide_show', false) == false){
    	$herbal_ayurveda_custom_css .='#slider{';
			$herbal_ayurveda_custom_css .='display:none;';
		$herbal_ayurveda_custom_css .='} ';
	}
    if($herbal_ayurveda_resp_slider == true){
    	$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='#slider{';
			$herbal_ayurveda_custom_css .='display:block;';
		$herbal_ayurveda_custom_css .='} }';
	}else if($herbal_ayurveda_resp_slider == false){
		$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='#slider{';
			$herbal_ayurveda_custom_css .='display:none;';
		$herbal_ayurveda_custom_css .='} }';
		$herbal_ayurveda_custom_css .='@media screen and (max-width:575px){';
		$herbal_ayurveda_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$herbal_ayurveda_custom_css .='margin-top: 45px;';
		$herbal_ayurveda_custom_css .='} }';
	}

	$herbal_ayurveda_resp_sidebar = get_theme_mod( 'herbal_ayurveda_sidebar_hide_show',true);
    if($herbal_ayurveda_resp_sidebar == true){
    	$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='#sidebar{';
			$herbal_ayurveda_custom_css .='display:block;';
		$herbal_ayurveda_custom_css .='} }';
	}else if($herbal_ayurveda_resp_sidebar == false){
		$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='#sidebar{';
			$herbal_ayurveda_custom_css .='display:none;';
		$herbal_ayurveda_custom_css .='} }';
	}

	$herbal_ayurveda_resp_scroll_top = get_theme_mod( 'herbal_ayurveda_resp_scroll_top_hide_show',true);
	if($herbal_ayurveda_resp_scroll_top == true && get_theme_mod( 'herbal_ayurveda_hide_show_scroll',true) == false){
    	$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='visibility:hidden !important;';
		$herbal_ayurveda_custom_css .='} ';
	}
    if($herbal_ayurveda_resp_scroll_top == true){
    	$herbal_ayurveda_custom_css .='@media screen and (max-width:575px) {';
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='visibility:visible !important;';
		$herbal_ayurveda_custom_css .='} }';
	}else if($herbal_ayurveda_resp_scroll_top == false){
		$herbal_ayurveda_custom_css .='@media screen and (max-width:575px){';
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='visibility:hidden !important;';
		$herbal_ayurveda_custom_css .='} }';
	}

	/*-------------- Copyright Alignment ----------------*/

	$herbal_ayurveda_copyright_alingment = get_theme_mod('herbal_ayurveda_copyright_alingment');
	if($herbal_ayurveda_copyright_alingment != false){
		$herbal_ayurveda_custom_css .='.copyright p{';
			$herbal_ayurveda_custom_css .='text-align: '.esc_attr($herbal_ayurveda_copyright_alingment).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_footer_widgets_heading = get_theme_mod( 'herbal_ayurveda_footer_widgets_heading','Left');
    if($herbal_ayurveda_footer_widgets_heading == 'Left'){
		$herbal_ayurveda_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$herbal_ayurveda_custom_css .='text-align: left;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_footer_widgets_heading == 'Center'){
		$herbal_ayurveda_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$herbal_ayurveda_custom_css .='text-align: center;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_footer_widgets_heading == 'Right'){
		$herbal_ayurveda_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$herbal_ayurveda_custom_css .='text-align: right;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_footer_widgets_content = get_theme_mod( 'herbal_ayurveda_footer_widgets_content','Left');
    if($herbal_ayurveda_footer_widgets_content == 'Left'){
		$herbal_ayurveda_custom_css .='#footer .widget{';
		$herbal_ayurveda_custom_css .='text-align: left;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_footer_widgets_content == 'Center'){
		$herbal_ayurveda_custom_css .='#footer .widget {';
			$herbal_ayurveda_custom_css .='text-align: center;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_footer_widgets_content == 'Right'){
		$herbal_ayurveda_custom_css .='#footer .widget{';
			$herbal_ayurveda_custom_css .='text-align: right;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_footer_padding = get_theme_mod('herbal_ayurveda_footer_padding');
	if($herbal_ayurveda_footer_padding != false){
		$herbal_ayurveda_custom_css .='#footer{';
			$herbal_ayurveda_custom_css .='padding: '.esc_attr($herbal_ayurveda_footer_padding).' 0;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_footer_background_image = get_theme_mod('herbal_ayurveda_footer_background_image');
	if($herbal_ayurveda_footer_background_image != false){
		$herbal_ayurveda_custom_css .='#footer{';
			$herbal_ayurveda_custom_css .='background: url('.esc_attr($herbal_ayurveda_footer_background_image).');';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_theme_lay = get_theme_mod( 'herbal_ayurveda_img_footer','scroll');
	if($herbal_ayurveda_theme_lay == 'fixed'){
		$herbal_ayurveda_custom_css .='#footer{';
			$herbal_ayurveda_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$herbal_ayurveda_custom_css .='}';
	}elseif ($herbal_ayurveda_theme_lay == 'scroll'){
		$herbal_ayurveda_custom_css .='#footer{';
			$herbal_ayurveda_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_footer_background_color = get_theme_mod('herbal_ayurveda_footer_background_color');
	if($herbal_ayurveda_footer_background_color != false){
		$herbal_ayurveda_custom_css .='#footer{';
			$herbal_ayurveda_custom_css .='background-color: '.esc_attr($herbal_ayurveda_footer_background_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_copyright_background_color = get_theme_mod('herbal_ayurveda_copyright_background_color');
	if($herbal_ayurveda_copyright_background_color != false){
		$herbal_ayurveda_custom_css .='#footer-2{';
			$herbal_ayurveda_custom_css .='background-color: '.esc_attr($herbal_ayurveda_copyright_background_color).';';
		$herbal_ayurveda_custom_css .='}';
	} 

	$herbal_ayurveda_footer_icon = get_theme_mod('herbal_ayurveda_footer_icon');
	if($herbal_ayurveda_footer_icon == false){
		$herbal_ayurveda_custom_css .='.copyright p{';
			$herbal_ayurveda_custom_css .='width:100%; text-align:center; float:none;';
		$herbal_ayurveda_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$herbal_ayurveda_site_title_font_size = get_theme_mod('herbal_ayurveda_site_title_font_size');
	if($herbal_ayurveda_site_title_font_size != false){
		$herbal_ayurveda_custom_css .='.logo h1, .logo p.site-title{';
			$herbal_ayurveda_custom_css .='font-size: '.esc_attr($herbal_ayurveda_site_title_font_size).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_site_tagline_font_size = get_theme_mod('herbal_ayurveda_site_tagline_font_size');
	if($herbal_ayurveda_site_tagline_font_size != false){
		$herbal_ayurveda_custom_css .='.logo p.site-description{';
			$herbal_ayurveda_custom_css .='font-size: '.esc_attr($herbal_ayurveda_site_tagline_font_size).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_logo_padding = get_theme_mod('herbal_ayurveda_logo_padding');
	if($herbal_ayurveda_logo_padding != false){
		$herbal_ayurveda_custom_css .='.logo{';
			$herbal_ayurveda_custom_css .='padding: '.esc_attr($herbal_ayurveda_logo_padding).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_logo_margin = get_theme_mod('herbal_ayurveda_logo_margin');
	if($herbal_ayurveda_logo_margin != false){
		$herbal_ayurveda_custom_css .='.logo{';
			$herbal_ayurveda_custom_css .='margin: '.esc_attr($herbal_ayurveda_logo_margin).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_site_title_color = get_theme_mod('herbal_ayurveda_site_title_color');
	if($herbal_ayurveda_site_title_color != false){
		$herbal_ayurveda_custom_css .='p.site-title a{';
			$herbal_ayurveda_custom_css .='color: '.esc_attr($herbal_ayurveda_site_title_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_site_tagline_color = get_theme_mod('herbal_ayurveda_site_tagline_color');
	if($herbal_ayurveda_site_tagline_color != false){
		$herbal_ayurveda_custom_css .='.logo p.site-description{';
			$herbal_ayurveda_custom_css .='color: '.esc_attr($herbal_ayurveda_site_tagline_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_logo_width = get_theme_mod('herbal_ayurveda_logo_width');
	if($herbal_ayurveda_logo_width != false){
		$herbal_ayurveda_custom_css .='.logo img{';
			$herbal_ayurveda_custom_css .='width: '.esc_attr($herbal_ayurveda_logo_width).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_logo_height = get_theme_mod('herbal_ayurveda_logo_height');
	if($herbal_ayurveda_logo_height != false){
		$herbal_ayurveda_custom_css .='.logo img{';
			$herbal_ayurveda_custom_css .='height: '.esc_attr($herbal_ayurveda_logo_height).';';
		$herbal_ayurveda_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$herbal_ayurveda_preloader_bg_color = get_theme_mod('herbal_ayurveda_preloader_bg_color');
	if($herbal_ayurveda_preloader_bg_color != false){
		$herbal_ayurveda_custom_css .='#preloader{';
			$herbal_ayurveda_custom_css .='background-color: '.esc_attr($herbal_ayurveda_preloader_bg_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_preloader_border_color = get_theme_mod('herbal_ayurveda_preloader_border_color');
	if($herbal_ayurveda_preloader_border_color != false){
		$herbal_ayurveda_custom_css .='.loader-line{';
			$herbal_ayurveda_custom_css .='border-color: '.esc_attr($herbal_ayurveda_preloader_border_color).'!important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_preloader_bg_img = get_theme_mod('herbal_ayurveda_preloader_bg_img');
	if($herbal_ayurveda_preloader_bg_img != false){
		$herbal_ayurveda_custom_css .='#preloader{';
			$herbal_ayurveda_custom_css .='background: url('.esc_attr($herbal_ayurveda_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$herbal_ayurveda_custom_css .='}';
	}

	// Header Background Color

	$herbal_ayurveda_header_background_color = get_theme_mod('herbal_ayurveda_header_background_color');
	if($herbal_ayurveda_header_background_color != false){
		$herbal_ayurveda_custom_css .='#topbar{';
			$herbal_ayurveda_custom_css .='background-color: '.esc_attr($herbal_ayurveda_header_background_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$herbal_ayurveda_theme_lay = get_theme_mod( 'herbal_ayurveda_blog_layout_option','Default');
    if($herbal_ayurveda_theme_lay == 'Default'){
		$herbal_ayurveda_custom_css .='.post-main-box{';
			$herbal_ayurveda_custom_css .='';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_theme_lay == 'Center'){
		$herbal_ayurveda_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$herbal_ayurveda_custom_css .='text-align:center;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.post-info{';
			$herbal_ayurveda_custom_css .='margin-top:10px;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.post-info hr{';
			$herbal_ayurveda_custom_css .='margin:15px auto;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_theme_lay == 'Left'){
		$herbal_ayurveda_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$herbal_ayurveda_custom_css .='text-align:Left;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.post-info hr{';
			$herbal_ayurveda_custom_css .='margin-bottom:10px;';
		$herbal_ayurveda_custom_css .='}';
		$herbal_ayurveda_custom_css .='.post-main-box h2{';
			$herbal_ayurveda_custom_css .='margin-top:10px;';
		$herbal_ayurveda_custom_css .='}';
	}

	// featured image dimention
	$herbal_ayurveda_blog_post_featured_image_dimension = get_theme_mod('herbal_ayurveda_blog_post_featured_image_dimension', 'default');
	$herbal_ayurveda_blog_post_featured_image_custom_width = get_theme_mod('herbal_ayurveda_blog_post_featured_image_custom_width',250);
	$herbal_ayurveda_blog_post_featured_image_custom_height = get_theme_mod('herbal_ayurveda_blog_post_featured_image_custom_height',250);
	if($herbal_ayurveda_blog_post_featured_image_dimension == 'custom'){
		$herbal_ayurveda_custom_css .='.post-main-box img{';
			$herbal_ayurveda_custom_css .='width: '.esc_attr($herbal_ayurveda_blog_post_featured_image_custom_width).'; height: '.esc_attr($herbal_ayurveda_blog_post_featured_image_custom_height).';';
		$herbal_ayurveda_custom_css .='}';
	}

	/*---------------- Post Settings ------------------*/

	$herbal_ayurveda_featured_image_border_radius = get_theme_mod('herbal_ayurveda_featured_image_border_radius', 0);
	if($herbal_ayurveda_featured_image_border_radius != false){
		$herbal_ayurveda_custom_css .='.box-image img, .feature-box img{';
			$herbal_ayurveda_custom_css .='border-radius: '.esc_attr($herbal_ayurveda_featured_image_border_radius).'px;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_featured_image_box_shadow = get_theme_mod('herbal_ayurveda_featured_image_box_shadow',0);
	if($herbal_ayurveda_featured_image_box_shadow != false){
		$herbal_ayurveda_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$herbal_ayurveda_custom_css .='box-shadow: '.esc_attr($herbal_ayurveda_featured_image_box_shadow).'px '.esc_attr($herbal_ayurveda_featured_image_box_shadow).'px '.esc_attr($herbal_ayurveda_featured_image_box_shadow).'px #cccccc;';
		$herbal_ayurveda_custom_css .='}';
	}

	// Woocommerce img

	$herbal_ayurveda_shop_featured_image_border_radius = get_theme_mod('herbal_ayurveda_shop_featured_image_border_radius', 0);
	if($herbal_ayurveda_shop_featured_image_border_radius != false){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product a img{';
			$herbal_ayurveda_custom_css .='border-radius: '.esc_attr($herbal_ayurveda_shop_featured_image_border_radius).'px;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_shop_featured_image_box_shadow = get_theme_mod('herbal_ayurveda_shop_featured_image_box_shadow',0);
	if($herbal_ayurveda_shop_featured_image_box_shadow != false){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product a img{';
			$herbal_ayurveda_custom_css .='box-shadow: '.esc_attr($herbal_ayurveda_shop_featured_image_box_shadow).'px '.esc_attr($herbal_ayurveda_shop_featured_image_box_shadow).'px '.esc_attr($herbal_ayurveda_shop_featured_image_box_shadow).'px #cccccc;';
		$herbal_ayurveda_custom_css .='}';
	}

	/*------------------ Menus -------------------*/

	$herbal_ayurveda_header_menus_color = get_theme_mod('herbal_ayurveda_header_menus_color');
	if($herbal_ayurveda_header_menus_color != false){
		$herbal_ayurveda_custom_css .='.main-navigation a{';
			$herbal_ayurveda_custom_css .='color: '.esc_attr($herbal_ayurveda_header_menus_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_header_menus_hover_color = get_theme_mod('herbal_ayurveda_header_menus_hover_color');
	if($herbal_ayurveda_header_menus_hover_color != false){
		$herbal_ayurveda_custom_css .='.main-navigation a:hover{';
			$herbal_ayurveda_custom_css .='color: '.esc_attr($herbal_ayurveda_header_menus_hover_color).'!important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_header_submenus_color = get_theme_mod('herbal_ayurveda_header_submenus_color');
	if($herbal_ayurveda_header_submenus_color != false){
		$herbal_ayurveda_custom_css .='.main-navigation ul ul a{';
			$herbal_ayurveda_custom_css .='color: '.esc_attr($herbal_ayurveda_header_submenus_color).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_header_submenus_hover_color = get_theme_mod('herbal_ayurveda_header_submenus_hover_color');
	if($herbal_ayurveda_header_submenus_hover_color != false){
		$herbal_ayurveda_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$herbal_ayurveda_custom_css .='color: '.esc_attr($herbal_ayurveda_header_submenus_hover_color).'!important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_menus_item = get_theme_mod( 'herbal_ayurveda_menus_item_style','None');
    if($herbal_ayurveda_menus_item == 'None'){
		$herbal_ayurveda_custom_css .='.main-navigation a{';
			$herbal_ayurveda_custom_css .='';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_menus_item == 'Zoom In'){
		$herbal_ayurveda_custom_css .='.main-navigation a:hover{';
			$herbal_ayurveda_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color:#000;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_navigation_menu_font_weight = get_theme_mod('herbal_ayurveda_navigation_menu_font_weight','500');
	if($herbal_ayurveda_navigation_menu_font_weight != false){
		$herbal_ayurveda_custom_css .='.main-navigation a{';
			$herbal_ayurveda_custom_css .='font-weight: '.esc_attr($herbal_ayurveda_navigation_menu_font_weight).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_theme_lay = get_theme_mod( 'herbal_ayurveda_menu_text_transform','Capitalize');
	if($herbal_ayurveda_theme_lay == 'Capitalize'){
		$herbal_ayurveda_custom_css .='.main-navigation a{';
			$herbal_ayurveda_custom_css .='text-transform:Capitalize;';
		$herbal_ayurveda_custom_css .='}';
	}
	if($herbal_ayurveda_theme_lay == 'Lowercase'){
		$herbal_ayurveda_custom_css .='.main-navigation a{';
			$herbal_ayurveda_custom_css .='text-transform:Lowercase;';
		$herbal_ayurveda_custom_css .='}';
	}
	if($herbal_ayurveda_theme_lay == 'Uppercase'){
		$herbal_ayurveda_custom_css .='.main-navigation a{';
			$herbal_ayurveda_custom_css .='text-transform:Uppercase;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_navigation_menu_font_size = get_theme_mod('herbal_ayurveda_navigation_menu_font_size');
	if($herbal_ayurveda_navigation_menu_font_size != false){
		$herbal_ayurveda_custom_css .='.main-navigation a{';
			$herbal_ayurveda_custom_css .='font-size: '.esc_attr($herbal_ayurveda_navigation_menu_font_size).';';
		$herbal_ayurveda_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$herbal_ayurveda_single_blog_comment_title = get_theme_mod('herbal_ayurveda_single_blog_comment_title', 'Leave a Reply');
	if($herbal_ayurveda_single_blog_comment_title == ''){
		$herbal_ayurveda_custom_css .='#comments h2#reply-title {';
			$herbal_ayurveda_custom_css .='display: none;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_single_blog_comment_button_text = get_theme_mod('herbal_ayurveda_single_blog_comment_button_text', 'Post Comment');
	if($herbal_ayurveda_single_blog_comment_button_text == ''){
		$herbal_ayurveda_custom_css .='#comments p.form-submit {';
			$herbal_ayurveda_custom_css .='display: none;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_comment_width = get_theme_mod('herbal_ayurveda_single_blog_comment_width');
	if($herbal_ayurveda_comment_width != false){
		$herbal_ayurveda_custom_css .='#comments textarea{';
			$herbal_ayurveda_custom_css .='width: '.esc_attr($herbal_ayurveda_comment_width).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_single_blog_post_navigation_show_hide = get_theme_mod('herbal_ayurveda_single_blog_post_navigation_show_hide',true);
	if($herbal_ayurveda_single_blog_post_navigation_show_hide != true){
		$herbal_ayurveda_custom_css .='.post-navigation{';
			$herbal_ayurveda_custom_css .='display: none;';
		$herbal_ayurveda_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$herbal_ayurveda_button_padding_top_bottom = get_theme_mod('herbal_ayurveda_button_padding_top_bottom');
	$herbal_ayurveda_button_padding_left_right = get_theme_mod('herbal_ayurveda_button_padding_left_right');
	if($herbal_ayurveda_button_padding_top_bottom != false || $herbal_ayurveda_button_padding_left_right != false){
		$herbal_ayurveda_custom_css .='.post-main-box .more-btn a{';
			$herbal_ayurveda_custom_css .='padding-top: '.esc_attr($herbal_ayurveda_button_padding_top_bottom).'!important; padding-bottom: '.esc_attr($herbal_ayurveda_button_padding_top_bottom).'!important;padding-left: '.esc_attr($herbal_ayurveda_button_padding_left_right).'!important;padding-right: '.esc_attr($herbal_ayurveda_button_padding_left_right).'!important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_button_border_radius = get_theme_mod('herbal_ayurveda_button_border_radius');
	if($herbal_ayurveda_button_border_radius != false){
		$herbal_ayurveda_custom_css .='.post-main-box .more-btn a{';
			$herbal_ayurveda_custom_css .='border-radius: '.esc_attr($herbal_ayurveda_button_border_radius).'px !important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_button_font_size = get_theme_mod('herbal_ayurveda_button_font_size',14);
	$herbal_ayurveda_custom_css .='.post-main-box .more-btn a{';
		$herbal_ayurveda_custom_css .='font-size: '.esc_attr($herbal_ayurveda_button_font_size).';';
	$herbal_ayurveda_custom_css .='}';

	$herbal_ayurveda_theme_lay = get_theme_mod( 'herbal_ayurveda_button_text_transform','Uppercase');
	if($herbal_ayurveda_theme_lay == 'Capitalize'){
		$herbal_ayurveda_custom_css .='.post-main-box .more-btn a{';
			$herbal_ayurveda_custom_css .='text-transform:Capitalize;';
		$herbal_ayurveda_custom_css .='}';
	}
	if($herbal_ayurveda_theme_lay == 'Lowercase'){
		$herbal_ayurveda_custom_css .='.post-main-box .more-btn a{';
			$herbal_ayurveda_custom_css .='text-transform:Lowercase;';
		$herbal_ayurveda_custom_css .='}';
	}
	if($herbal_ayurveda_theme_lay == 'Uppercase'){
		$herbal_ayurveda_custom_css .='.post-main-box .more-btn a{';
			$herbal_ayurveda_custom_css .='text-transform:Uppercase;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_button_letter_spacing = get_theme_mod('herbal_ayurveda_button_letter_spacing',14);
	$herbal_ayurveda_custom_css .='.post-main-box .more-btn a{';
		$herbal_ayurveda_custom_css .='letter-spacing: '.esc_attr($herbal_ayurveda_button_letter_spacing).';';
	$herbal_ayurveda_custom_css .='}';

	// Wocommerce
	$herbal_ayurveda_related_product_show_hide = get_theme_mod('herbal_ayurveda_related_product_show_hide',true);
	if($herbal_ayurveda_related_product_show_hide != true){
		$herbal_ayurveda_custom_css .='.related.products{';
			$herbal_ayurveda_custom_css .='display: none;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_products_padding_top_bottom = get_theme_mod('herbal_ayurveda_products_padding_top_bottom');
	if($herbal_ayurveda_products_padding_top_bottom != false){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$herbal_ayurveda_custom_css .='padding-top: '.esc_attr($herbal_ayurveda_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($herbal_ayurveda_products_padding_top_bottom).'!important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_products_padding_left_right = get_theme_mod('herbal_ayurveda_products_padding_left_right');
	if($herbal_ayurveda_products_padding_left_right != false){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$herbal_ayurveda_custom_css .='padding-left: '.esc_attr($herbal_ayurveda_products_padding_left_right).'!important; padding-right: '.esc_attr($herbal_ayurveda_products_padding_left_right).'!important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_products_box_shadow = get_theme_mod('herbal_ayurveda_products_box_shadow');
	if($herbal_ayurveda_products_box_shadow != false){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$herbal_ayurveda_custom_css .='box-shadow: '.esc_attr($herbal_ayurveda_products_box_shadow).'px '.esc_attr($herbal_ayurveda_products_box_shadow).'px '.esc_attr($herbal_ayurveda_products_box_shadow).'px #ddd;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_products_border_radius = get_theme_mod('herbal_ayurveda_products_border_radius', 0);
	if($herbal_ayurveda_products_border_radius != false){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$herbal_ayurveda_custom_css .='border-radius: '.esc_attr($herbal_ayurveda_products_border_radius).'px;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_products_btn_padding_top_bottom = get_theme_mod('herbal_ayurveda_products_btn_padding_top_bottom');
	if($herbal_ayurveda_products_btn_padding_top_bottom != false){
		$herbal_ayurveda_custom_css .='.woocommerce a.button{';
			$herbal_ayurveda_custom_css .='padding-top: '.esc_attr($herbal_ayurveda_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($herbal_ayurveda_products_btn_padding_top_bottom).' !important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_products_btn_padding_left_right = get_theme_mod('herbal_ayurveda_products_btn_padding_left_right');
	if($herbal_ayurveda_products_btn_padding_left_right != false){
		$herbal_ayurveda_custom_css .='.woocommerce a.button{';
			$herbal_ayurveda_custom_css .='padding-left: '.esc_attr($herbal_ayurveda_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($herbal_ayurveda_products_btn_padding_left_right).' !important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_products_button_border_radius = get_theme_mod('herbal_ayurveda_products_button_border_radius', 0);
	if($herbal_ayurveda_products_button_border_radius != false){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$herbal_ayurveda_custom_css .='border-radius: '.esc_attr($herbal_ayurveda_products_button_border_radius).'px;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_woocommerce_sale_position = get_theme_mod( 'herbal_ayurveda_woocommerce_sale_position','right');
    if($herbal_ayurveda_woocommerce_sale_position == 'left'){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product .onsale{';
			$herbal_ayurveda_custom_css .='left: 10px !important; right: auto !important;';
		$herbal_ayurveda_custom_css .='}';
	}else if($herbal_ayurveda_woocommerce_sale_position == 'right'){
		$herbal_ayurveda_custom_css .='.woocommerce ul.products li.product .onsale{';
			$herbal_ayurveda_custom_css .='left: auto !important; right: 10px !important;';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_woocommerce_sale_font_size = get_theme_mod('herbal_ayurveda_woocommerce_sale_font_size');
	if($herbal_ayurveda_woocommerce_sale_font_size != false){
		$herbal_ayurveda_custom_css .='.woocommerce span.onsale{';
			$herbal_ayurveda_custom_css .='font-size: '.esc_attr($herbal_ayurveda_woocommerce_sale_font_size).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_woocommerce_sale_border_radius = get_theme_mod('herbal_ayurveda_woocommerce_sale_border_radius', 0);
	if($herbal_ayurveda_woocommerce_sale_border_radius != false){
		$herbal_ayurveda_custom_css .='.woocommerce span.onsale{';
			$herbal_ayurveda_custom_css .='border-radius: '.esc_attr($herbal_ayurveda_woocommerce_sale_border_radius).'px;';
		$herbal_ayurveda_custom_css .='}';
	}


	/*----------------Sroll to top Settings ------------------*/

	$herbal_ayurveda_scroll_to_top_font_size = get_theme_mod('herbal_ayurveda_scroll_to_top_font_size');
	if($herbal_ayurveda_scroll_to_top_font_size != false){
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='font-size: '.esc_attr($herbal_ayurveda_scroll_to_top_font_size).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_scroll_to_top_padding = get_theme_mod('herbal_ayurveda_scroll_to_top_padding');
	$herbal_ayurveda_scroll_to_top_padding = get_theme_mod('herbal_ayurveda_scroll_to_top_padding');
	if($herbal_ayurveda_scroll_to_top_padding != false){
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='padding-top: '.esc_attr($herbal_ayurveda_scroll_to_top_padding).';padding-bottom: '.esc_attr($herbal_ayurveda_scroll_to_top_padding).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_scroll_to_top_width = get_theme_mod('herbal_ayurveda_scroll_to_top_width');
	if($herbal_ayurveda_scroll_to_top_width != false){
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='width: '.esc_attr($herbal_ayurveda_scroll_to_top_width).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_scroll_to_top_height = get_theme_mod('herbal_ayurveda_scroll_to_top_height');
	if($herbal_ayurveda_scroll_to_top_height != false){
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='height: '.esc_attr($herbal_ayurveda_scroll_to_top_height).';';
		$herbal_ayurveda_custom_css .='}';
	}

	$herbal_ayurveda_scroll_to_top_border_radius = get_theme_mod('herbal_ayurveda_scroll_to_top_border_radius');
	if($herbal_ayurveda_scroll_to_top_border_radius != false){
		$herbal_ayurveda_custom_css .='.scrollup i{';
			$herbal_ayurveda_custom_css .='border-radius: '.esc_attr($herbal_ayurveda_scroll_to_top_border_radius).'px;';
		$herbal_ayurveda_custom_css .='}';
	}
