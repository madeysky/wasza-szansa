<?php
/**
 * Herbal Ayurveda Theme Customizer
 *
 * @package Herbal Ayurveda
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function herbal_ayurveda_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'herbal_ayurveda_custom_controls' );

function Herbal_Ayurveda_Customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'Herbal_Ayurveda_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'herbal_ayurveda_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'herbal-ayurveda' ),
		'priority' => 10,
	));

	//Topbar
	$wp_customize->add_section( 'herbal_ayurveda_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_panel_id'
	) );

   	// Header Background color

	$wp_customize->add_setting('herbal_ayurveda_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_header_background_color', array(
		'label'    => __('Header Background Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_topbar_section',
	)));

    $wp_customize->add_setting('herbal_ayurveda_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('herbal_ayurveda_email_address',array(
		'label'	=> __('Add Email Address','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'support@example.com', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_topbar_section',
		'type'=> 'text'
	));

    $wp_customize->add_setting('herbal_ayurveda_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'herbal_ayurveda_sanitize_phone_number'
	));
	$wp_customize->add_control('herbal_ayurveda_phone_number',array(
		'label'	=> __('Add Phone number','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_topbar_section',
		'type'=> 'text'
	));

	//Menus Settings
	$wp_customize->add_section( 'herbal_ayurveda_menu_section' , array(
    	'title' => __( 'Menus Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_panel_id'
	) );

	$wp_customize->add_setting('herbal_ayurveda_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_navigation_menu_font_weight',array(
        'default' => 500,
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_menu_section',
        'choices' => array(
        	'100' => __('100','herbal-ayurveda'),
            '200' => __('200','herbal-ayurveda'),
            '300' => __('300','herbal-ayurveda'),
            '400' => __('400','herbal-ayurveda'),
            '500' => __('500','herbal-ayurveda'),
            '600' => __('600','herbal-ayurveda'),
            '700' => __('700','herbal-ayurveda'),
            '800' => __('800','herbal-ayurveda'),
            '900' => __('900','herbal-ayurveda'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('herbal_ayurveda_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','herbal-ayurveda'),
		'choices' => array(
            'Uppercase' => __('Uppercase','herbal-ayurveda'),
            'Capitalize' => __('Capitalize','herbal-ayurveda'),
            'Lowercase' => __('Lowercase','herbal-ayurveda'),
        ),
		'section'=> 'herbal_ayurveda_menu_section',
	));

	$wp_customize->add_setting('herbal_ayurveda_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_menus_item_style',array(
        'type' => 'select',
        'section' => 'herbal_ayurveda_menu_section',
		'label' => __('Menu Item Hover Style','herbal-ayurveda'),
		'choices' => array(
            'None' => __('None','herbal-ayurveda'),
            'Zoom In' => __('Zoom In','herbal-ayurveda'),
        ),
	) );

	$wp_customize->add_setting('herbal_ayurveda_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_header_menus_color', array(
		'label'    => __('Menus Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_menu_section',
	)));

	$wp_customize->add_setting('herbal_ayurveda_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_menu_section',
	)));

	$wp_customize->add_setting('herbal_ayurveda_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_menu_section',
	)));

	$wp_customize->add_setting('herbal_ayurveda_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_menu_section',
	)));

	//Slider
	$wp_customize->add_section( 'herbal_ayurveda_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'herbal-ayurveda' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/ayurveda-wordpress-theme/">GO PRO</a>','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_panel_id'
	) );

	$wp_customize->add_setting( 'herbal_ayurveda_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','herbal-ayurveda' ),
      'section' => 'herbal_ayurveda_slidersettings'
    )));

  	$wp_customize->add_setting('herbal_ayurveda_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	) );
	$wp_customize->add_control('herbal_ayurveda_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','herbal-ayurveda'),
            'Advance slider' => __('Advance slider','herbal-ayurveda'),
        ),
	));

	$wp_customize->add_setting('herbal_ayurveda_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_slidersettings',
		'type'=> 'text',
		'active_callback' => 'herbal_ayurveda_advance_slider'
	));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('herbal_ayurveda_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_herbal_ayurveda_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'herbal_ayurveda_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'herbal_ayurveda_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'herbal_ayurveda_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'herbal-ayurveda' ),
			'description' => __('Slider image size (1400 x 550)','herbal-ayurveda'),
			'section'  => 'herbal_ayurveda_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'herbal_ayurveda_default_slider'
		) );
	}

	$wp_customize->add_setting('herbal_ayurveda_slider_button_text',array(
		'default'=> 'Discover More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'Discover More', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_slidersettings',
		'type'=> 'text',
		'active_callback' => 'herbal_ayurveda_default_slider'
	));

    //Slider content padding
    $wp_customize->add_setting('herbal_ayurveda_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','herbal-ayurveda'),
		'description'	=> __('Enter a value in %. Example:20%','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_slidersettings',
		'type'=> 'text',
		'active_callback' => 'herbal_ayurveda_default_slider'
	));

	$wp_customize->add_setting('herbal_ayurveda_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','herbal-ayurveda'),
		'description'	=> __('Enter a value in %. Example:20%','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_slidersettings',
		'type'=> 'text',
		'active_callback' => 'herbal_ayurveda_default_slider'
	));

	//content layout
	$wp_customize->add_setting('herbal_ayurveda_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control(new herbal_ayurveda_Image_Radio_Control($wp_customize, 'herbal_ayurveda_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
    	'active_callback' => 'herbal_ayurveda_default_slider'
	)));

    //Slider excerpt
	$wp_customize->add_setting( 'herbal_ayurveda_slider_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_slidersettings',
		'type'        => 'range',
		'settings'    => 'herbal_ayurveda_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'herbal_ayurveda_default_slider'
	) );

	$wp_customize->add_setting( 'herbal_ayurveda_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','herbal-ayurveda'),
		'section' => 'herbal_ayurveda_slidersettings',
		'type'  => 'text',
		'active_callback' => 'herbal_ayurveda_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('herbal_ayurveda_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_slider_height',array(
		'label'	=> __('Slider Height','herbal-ayurveda'),
		'description'	=> __('Specify the slider height (px).','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_slidersettings',
		'type'=> 'text',
		'active_callback' => 'herbal_ayurveda_default_slider'
	));

	//Opacity
	$wp_customize->add_setting('herbal_ayurveda_slider_opacity_color',array(
      'default'              => 0.8,
      'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control( 'herbal_ayurveda_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_slidersettings',
		'type'        => 'select',
		'settings'    => 'herbal_ayurveda_slider_opacity_color',
		'choices' => array(
			'0' =>  esc_attr('0','herbal-ayurveda'),
			'0.1' =>  esc_attr('0.1','herbal-ayurveda'),
			'0.2' =>  esc_attr('0.2','herbal-ayurveda'),
			'0.3' =>  esc_attr('0.3','herbal-ayurveda'),
			'0.4' =>  esc_attr('0.4','herbal-ayurveda'),
			'0.5' =>  esc_attr('0.5','herbal-ayurveda'),
			'0.6' =>  esc_attr('0.6','herbal-ayurveda'),
			'0.7' =>  esc_attr('0.7','herbal-ayurveda'),
			'0.8' =>  esc_attr('0.8','herbal-ayurveda'),
			'0.9' =>  esc_attr('0.9','herbal-ayurveda')
	),'active_callback' => 'herbal_ayurveda_default_slider'
	));

	$wp_customize->add_setting( 'herbal_ayurveda_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
  ));
  $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_slider_image_overlay',array(
    	'label' => esc_html__( 'Slider Image Overlay','herbal-ayurveda' ),
    	'section' => 'herbal_ayurveda_slidersettings',
    	'active_callback' => 'herbal_ayurveda_default_slider'
  )));

  $wp_customize->add_setting('herbal_ayurveda_slider_image_overlay_color', array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_slidersettings',
		'active_callback' => 'herbal_ayurveda_default_slider'
	)));

	//About Us Section
	$wp_customize->add_section('herbal_ayurveda_about_us_section',array(
		'title'	=> __('About Us Section','herbal-ayurveda'),
		'description' => __('For more options of about us section</br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/ayurveda-wordpress-theme/">GO PRO</a>','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_about_us_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'herbal_ayurveda_about_us_background_image',array(
        'label' => __('About Background Image','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_about_us_section'
	)));

	$wp_customize->add_setting( 'herbal_ayurveda_compaign_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_compaign_small_title', array(
		'label'    => __( 'Add Section Small Title', 'herbal-ayurveda' ),
		'input_attrs' => array(
            'placeholder' => __( 'ABOUT AYURVEDA', 'herbal-ayurveda' ),
        ),
		'section'  => 'herbal_ayurveda_about_us_section',
		'type'     => 'text'
	) );

	$args =  array('numberposts' => -1);
		$post_list = get_posts($args);
		$i = 0;
		$psts[]='Select';
		foreach($post_list as $post){
			$psts[$post->post_title] = $post->post_title;
		}

	$wp_customize->add_setting('herbal_ayurveda_about_post',array(
		'default'	=> 'select',
		'sanitize_callback' => 'herbal_ayurveda_sanitize_choices',
	));
	$wp_customize->add_control('herbal_ayurveda_about_post',array(
		'type'    => 'select',
		'choices' => $psts,
		'label' => __('Select About Post','herbal-ayurveda'),
		'section' => 'herbal_ayurveda_about_us_section',
	));

	$wp_customize->add_setting('herbal_ayurveda_about_features_head',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_about_features_head',array(
		'label'	=> esc_html__('Add Features','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '100% Orgaic and Toxic Free', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_about_us_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_about_features_head_two',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_about_features_head_two',array(
		'label'	=> esc_html__('Add Features','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Always Fresh & Hygienic Products', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_about_us_section',
		'type'=> 'text'
	));

	//services Section
	$wp_customize->add_section('herbal_ayurveda_services_section', array(
		'title'       => __('Services Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_services_text',array(
		'description' => __('<p>1. More options for services section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for services section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_services_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_services_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_services_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_services_section',
		'type'=> 'hidden'
	));

	//our records Section
	$wp_customize->add_section('herbal_ayurveda_our_records_section', array(
		'title'       => __('Our Records Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_our_records_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_our_records_text',array(
		'description' => __('<p>1. More options for our records section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our records section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_our_records_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_our_records_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_our_records_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_our_records_section',
		'type'=> 'hidden'
	));

	//video Section
	$wp_customize->add_section('herbal_ayurveda_video_section', array(
		'title'       => __('Video Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_video_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_video_text',array(
		'description' => __('<p>1. More options for video section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for video section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_video_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_video_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_video_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_video_section',
		'type'=> 'hidden'
	));

	//products Section
	$wp_customize->add_section('herbal_ayurveda_products_section', array(
		'title'       => __('Products Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_products_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_products_text',array(
		'description' => __('<p>1. More options for products section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for products section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_products_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_products_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_products_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_products_section',
		'type'=> 'hidden'
	));

	//project Section
	$wp_customize->add_section('herbal_ayurveda_project_section', array(
		'title'       => __('Project Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_project_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_project_text',array(
		'description' => __('<p>1. More options for project section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for project section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_project_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_project_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_project_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_project_section',
		'type'=> 'hidden'
	));

	//benifits Section
	$wp_customize->add_section('herbal_ayurveda_benifits_section', array(
		'title'       => __('Benifits Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_benifits_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_benifits_text',array(
		'description' => __('<p>1. More options for benifits section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for benifits section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_benifits_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_benifits_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_benifits_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_benifits_section',
		'type'=> 'hidden'
	));

	//team Section
	$wp_customize->add_section('herbal_ayurveda_team_section', array(
		'title'       => __('Team Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_team_text',array(
		'description' => __('<p>1. More options for team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for team section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_team_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_team_section',
		'type'=> 'hidden'
	));

	//clients Section
	$wp_customize->add_section('herbal_ayurveda_clients_section', array(
		'title'       => __('Clients Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_clients_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_clients_text',array(
		'description' => __('<p>1. More options for clients section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for clients section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_clients_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_clients_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_clients_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_clients_section',
		'type'=> 'hidden'
	));

	//blogs Section
	$wp_customize->add_section('herbal_ayurveda_blogs_section', array(
		'title'       => __('Blogs Section', 'herbal-ayurveda'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','herbal-ayurveda'),
		'priority'    => null,
		'panel'       => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_blogs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_blogs_text',array(
		'description' => __('<p>1. More options for blogs section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blogs section.</p>','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_blogs_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('herbal_ayurveda_blogs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_blogs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=herbal_ayurveda_guide') ." '>More Info</a>",
		'section'=> 'herbal_ayurveda_blogs_section',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('herbal_ayurveda_footer',array(
		'title'	=> esc_html__('Footer Settings','herbal-ayurveda'),
		'description' => __('For more options of Footer section</br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/ayurveda-wordpress-theme/">GO PRO</a>','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting( 'herbal_ayurveda_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','herbal-ayurveda' ),
      'section' => 'herbal_ayurveda_footer'
    )));

	$wp_customize->add_setting('herbal_ayurveda_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_footer_background_color', array(
		'label'    => __('Footer Background Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_footer',
	)));

	$wp_customize->add_setting('herbal_ayurveda_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'herbal_ayurveda_footer_background_image',array(
        'label' => __('Footer Background Image','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_footer'
	)));

	// Footer
	$wp_customize->add_setting('herbal_ayurveda_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','herbal-ayurveda'),
		'choices' => array(
            'fixed' => __('fixed','herbal-ayurveda'),
            'scroll' => __('scroll','herbal-ayurveda'),
        ),
		'section'=> 'herbal_ayurveda_footer',
	));

	$wp_customize->add_setting('herbal_ayurveda_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_footer',
        'choices' => array(
        	'Left' => __('Left','herbal-ayurveda'),
            'Center' => __('Center','herbal-ayurveda'),
            'Right' => __('Right','herbal-ayurveda')
        ),
	) );

	$wp_customize->add_setting('herbal_ayurveda_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_footer',
        'choices' => array(
        	'Left' => __('Left','herbal-ayurveda'),
            'Center' => __('Center','herbal-ayurveda'),
            'Right' => __('Right','herbal-ayurveda')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('herbal_ayurveda_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'herbal-ayurveda' ),
    ),
		'section'=> 'herbal_ayurveda_footer',
		'type'=> 'text'
	));

	// footer social icon
	$wp_customize->add_setting( 'herbal_ayurveda_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
  	) );
	$wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_footer_icon',array(
		'label' => esc_html__( 'Footer Social Icon','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_footer'
  	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_herbal_ayurveda_footer_text',
	));

	$wp_customize->add_setting( 'herbal_ayurveda_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','herbal-ayurveda' ),
      'section' => 'herbal_ayurveda_footer'
    )));

	$wp_customize->add_setting('herbal_ayurveda_copyright_background_color', array(
		'default'           => '#ffdb61',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_footer',
	)));

	$wp_customize->add_setting('herbal_ayurveda_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_footer_text',array(
		'label'	=> esc_html__('Copyright Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Image_Radio_Control($wp_customize, 'herbal_ayurveda_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_footer',
        'settings' => 'herbal_ayurveda_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'herbal_ayurveda_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','herbal-ayurveda' ),
      	'section' => 'herbal_ayurveda_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_herbal_ayurveda_scroll_to_top_icon',
	));

    $wp_customize->add_setting('herbal_ayurveda_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_footer',
		'setting'	=> 'herbal_ayurveda_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('herbal_ayurveda_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_scroll_to_top_width',array(
		'label'	=> __('Icon Width','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_scroll_to_top_height',array(
		'label'	=> __('Icon Height','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'herbal_ayurveda_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('herbal_ayurveda_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Image_Radio_Control($wp_customize, 'herbal_ayurveda_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_footer',
        'settings' => 'herbal_ayurveda_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( 'herbal_ayurveda_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'herbal_ayurveda_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_blog_post_parent_panel',
	));

	//Blog layout
	$wp_customize->add_setting('herbal_ayurveda_blog_layout_option',array(
	  'default' => 'Default',
	  'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Image_Radio_Control($wp_customize, 'herbal_ayurveda_blog_layout_option', array(
	  'type' => 'select',
	  'label' => __('Blog Post Layouts','herbal-ayurveda'),
	  'section' => 'herbal_ayurveda_post_settings',
	  'choices' => array(
	      'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
	      'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
	      'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
	))));

	$wp_customize->add_setting('herbal_ayurveda_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','herbal-ayurveda'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','herbal-ayurveda'),
            'Right Sidebar' => esc_html__('Right Sidebar','herbal-ayurveda'),
            'One Column' => esc_html__('One Column','herbal-ayurveda'),
            'Grid Layout' => esc_html__('Grid Layout','herbal-ayurveda')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_herbal_ayurveda_toggle_postdate',
	));

	$wp_customize->add_setting('herbal_ayurveda_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_post_settings',
		'setting'	=> 'herbal_ayurveda_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'herbal_ayurveda_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','herbal-ayurveda' ),
        'section' => 'herbal_ayurveda_post_settings'
    )));

     $wp_customize->add_setting('herbal_ayurveda_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_post_settings',
		'setting'	=> 'herbal_ayurveda_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'herbal_ayurveda_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_author',array(
		'label' => esc_html__( 'Author','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

  	$wp_customize->add_setting('herbal_ayurveda_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_post_settings',
		'setting'	=> 'herbal_ayurveda_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'herbal_ayurveda_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_comments',array(
		'label' => esc_html__( 'Comments','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

	$wp_customize->add_setting('herbal_ayurveda_toggle_time_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_post_settings',
		'setting'	=> 'herbal_ayurveda_toggle_time_icon',
		'type'		=> 'icon'
	)));


    $wp_customize->add_setting( 'herbal_ayurveda_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_time',array(
		'label' => esc_html__( 'Time','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
	));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

    //Featured Image
	$wp_customize->add_setting( 'herbal_ayurveda_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'herbal_ayurveda_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('herbal_ayurveda_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'herbal_ayurveda_sanitize_choices'
	));
  	$wp_customize->add_control('herbal_ayurveda_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','herbal-ayurveda'),
		'section'	=> 'herbal_ayurveda_post_settings',
		'choices' => array(
		'default' => __('Default','herbal-ayurveda'),
		'custom' => __('Custom Image Size','herbal-ayurveda'),
      ),
  	));

	$wp_customize->add_setting('herbal_ayurveda_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('herbal_ayurveda_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'herbal-ayurveda' ),),
		'section'=> 'herbal_ayurveda_post_settings',
		'type'=> 'text',
		'active_callback' => 'herbal_ayurveda_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('herbal_ayurveda_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'herbal-ayurveda' ),),
		'section'=> 'herbal_ayurveda_post_settings',
		'type'=> 'text',
		'active_callback' => 'herbal_ayurveda_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'herbal_ayurveda_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
	));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_tags', array(
		'label' => esc_html__( 'Tags','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'herbal_ayurveda_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_post_settings',
		'type'        => 'range',
		'settings'    => 'herbal_ayurveda_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('herbal_ayurveda_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','herbal-ayurveda'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('herbal_ayurveda_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','herbal-ayurveda'),
            'Excerpt' => esc_html__('Excerpt','herbal-ayurveda'),
            'No Content' => esc_html__('No Content','herbal-ayurveda')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'herbal_ayurveda_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_herbal_ayurveda_button_text',
	));

    $wp_customize->add_setting('herbal_ayurveda_button_text',array(
		'default'=> esc_html__('Read More','herbal-ayurveda'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_button_text',array(
		'label'	=> esc_html__('Add Button Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('herbal_ayurveda_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_button_font_size',array(
		'label'	=> __('Button Font Size','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'herbal-ayurveda' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'herbal_ayurveda_button_settings',
	));

	$wp_customize->add_setting( 'herbal_ayurveda_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'herbal_ayurveda_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('herbal_ayurveda_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','herbal-ayurveda'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'herbal-ayurveda' ),
        ),
		'section' => 'herbal_ayurveda_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','herbal-ayurveda'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'herbal-ayurveda' ),
        ),
		'section' => 'herbal_ayurveda_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'herbal-ayurveda' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'herbal_ayurveda_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('herbal_ayurveda_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','herbal-ayurveda'),
		'choices' => array(
            'Uppercase' => __('Uppercase','herbal-ayurveda'),
            'Capitalize' => __('Capitalize','herbal-ayurveda'),
            'Lowercase' => __('Lowercase','herbal-ayurveda'),
        ),
		'section'=> 'herbal_ayurveda_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'herbal_ayurveda_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_herbal_ayurveda_related_post_title',
	));

    $wp_customize->add_setting( 'herbal_ayurveda_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_related_post',array(
		'label' => esc_html__( 'Related Post','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_related_posts_settings'
    )));

    $wp_customize->add_setting('herbal_ayurveda_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('herbal_ayurveda_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'herbal_ayurveda_sanitize_number_absint'
	));
	$wp_customize->add_control('herbal_ayurveda_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'herbal_ayurveda_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'herbal_ayurveda_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

   	// single post Settings
	$wp_customize->add_section( 'herbal_ayurveda_single_post_settings', array(
		'title' => esc_html__( 'Single Post Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('herbal_ayurveda_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_single_post_settings',
		'setting'	=> 'herbal_ayurveda_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'herbal_ayurveda_single_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_single_postdate',array(
        'label' => esc_html__( 'Post Date','herbal-ayurveda' ),
        'section' => 'herbal_ayurveda_single_post_settings'
    )));

   	$wp_customize->add_setting('herbal_ayurveda_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_single_author_icon',array(
		'label'	=> __('Add Author Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_single_post_settings',
		'setting'	=> 'herbal_ayurveda_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'herbal_ayurveda_single_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_single_author',array(
		'label' => esc_html__( 'Author','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_single_post_settings'
    )));

   	$wp_customize->add_setting('herbal_ayurveda_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_single_post_settings',
		'setting'	=> 'herbal_ayurveda_single_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'herbal_ayurveda_single_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_single_comments',array(
		'label' => esc_html__( 'Comments','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_single_post_settings'
    )));

  	$wp_customize->add_setting('herbal_ayurveda_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_single_time_icon',array(
		'label'	=> __('Add Time Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_single_post_settings',
		'setting'	=> 'herbal_ayurveda_single_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'herbal_ayurveda_single_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_single_time',array(
		'label' => esc_html__( 'Time','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_single_post_settings'
    )));

   	$wp_customize->add_setting( 'herbal_ayurveda_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
   	$wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_single_post_settings'
    )));

    // Single Posts Category
	$wp_customize->add_setting( 'herbal_ayurveda_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
	) );
	$wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_single_post_settings'
	)));

	$wp_customize->add_setting( 'herbal_ayurveda_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
	));
	$wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_tags', array(
		'label' => esc_html__( 'Tags','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_single_post_settings'
	)));

	$wp_customize->add_setting( 'herbal_ayurveda_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
	));
	$wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_single_blog_post_navigation_show_hide', array(
	  'label' => esc_html__( 'Post Navigation','herbal-ayurveda' ),
	  'section' => 'herbal_ayurveda_single_post_settings'
	)));

	$wp_customize->add_setting('herbal_ayurveda_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_meta_field_separator',array(
		'label' => __('Add Meta Separator','herbal-ayurveda'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_single_post_settings',
		'type'=> 'text'
	));

	//navigation text
	$wp_customize->add_setting('herbal_ayurveda_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_single_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_single_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('herbal_ayurveda_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','herbal-ayurveda'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'herbal-ayurveda' ),
    	),
		'section'=> 'herbal_ayurveda_single_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('herbal_ayurveda_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_single_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','herbal-ayurveda'),
		'description'	=> __('Enter a value in %. Example:50%','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_single_post_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'herbal_ayurveda_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('herbal_ayurveda_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_grid_layout_settings',
		'setting'	=> 'herbal_ayurveda_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'herbal_ayurveda_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_grid_postdate',array(
        'label' => esc_html__( 'Post Date','herbal-ayurveda' ),
        'section' => 'herbal_ayurveda_grid_layout_settings'
    )));

	$wp_customize->add_setting('herbal_ayurveda_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_grid_author_icon',array(
		'label'	=> __('Add Author Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_grid_layout_settings',
		'setting'	=> 'herbal_ayurveda_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'herbal_ayurveda_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_grid_author',array(
		'label' => esc_html__( 'Author','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_grid_layout_settings'
    )));

    $wp_customize->add_setting('herbal_ayurveda_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Fontawesome_Icon_Chooser(
        $wp_customize,'herbal_ayurveda_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','herbal-ayurveda'),
		'transport' => 'refresh',
		'section'	=> 'herbal_ayurveda_grid_layout_settings',
		'setting'	=> 'herbal_ayurveda_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'herbal_ayurveda_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_grid_comments',array(
		'label' => esc_html__( 'Comments','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_grid_layout_settings'
    )));

	//Other Setting
	$wp_customize->add_panel( 'herbal_ayurveda_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'herbal_ayurveda_left_right', array(
    	'title' => esc_html__('General Settings', 'herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_other_parent_panel'
	) );

	$wp_customize->add_setting('herbal_ayurveda_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Image_Radio_Control($wp_customize, 'herbal_ayurveda_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','herbal-ayurveda'),
        'description' => esc_html__('Here you can change the width layout of Website.','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('herbal_ayurveda_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','herbal-ayurveda'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','herbal-ayurveda'),
            'Right_Sidebar' => esc_html__('Right Sidebar','herbal-ayurveda'),
            'One_Column' => esc_html__('One Column','herbal-ayurveda')
        ),
	) );

	$wp_customize->add_setting( 'herbal_ayurveda_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
	  ) );
	$wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_left_right'
	)));

    //Wow Animation
	$wp_customize->add_setting( 'herbal_ayurveda_animation',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
  	));
  	$wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_animation',array(
      'label' => esc_html__( 'Animations','herbal-ayurveda' ),
      'description' => __('Here you can disable overall site animation effect','herbal-ayurveda'),
	    'section' => 'herbal_ayurveda_left_right'
  	)));

    // Pre-Loader
	$wp_customize->add_setting( 'herbal_ayurveda_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','herbal-ayurveda' ),
        'section' => 'herbal_ayurveda_left_right'
    )));

	$wp_customize->add_setting('herbal_ayurveda_preloader_bg_color', array(
		'default'           => '#5b8c51',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_left_right',
	)));

	$wp_customize->add_setting('herbal_ayurveda_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_left_right',
	)));

	$wp_customize->add_setting('herbal_ayurveda_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'herbal_ayurveda_preloader_bg_img',array(
        'label' => __('Preloader Background Image','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('herbal_ayurveda_404_page',array(
		'title'	=> __('404 Page Settings','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_other_parent_panel',
	));	

	$wp_customize->add_setting('herbal_ayurveda_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('herbal_ayurveda_404_page_title',array(
		'label'	=> __('Add Title','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('herbal_ayurveda_404_page_content',array(
		'label'	=> __('Add Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_404_page_button_text',array(
		'label'	=> __('Add Button Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_404_page',
		'type'=> 'text'
	));
	
	//No Result Page Setting
	$wp_customize->add_section('herbal_ayurveda_no_results_page',array(
		'title'	=> __('No Results Page Settings','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_other_parent_panel',
	));	

	$wp_customize->add_setting('herbal_ayurveda_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('herbal_ayurveda_no_results_page_title',array(
		'label'	=> __('Add Title','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('herbal_ayurveda_no_results_page_content',array(
		'label'	=> __('Add Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_no_results_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('herbal_ayurveda_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_other_parent_panel',
	));

    $wp_customize->add_setting('herbal_ayurveda_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_responsive_media',
	)));

    $wp_customize->add_setting( 'herbal_ayurveda_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','herbal-ayurveda' ),
      	'section' => 'herbal_ayurveda_responsive_media'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','herbal-ayurveda' ),
      	'section' => 'herbal_ayurveda_responsive_media'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','herbal-ayurveda' ),
      	'section' => 'herbal_ayurveda_responsive_media'
    )));

     //Woocommerce settings
	$wp_customize->add_section('herbal_ayurveda_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'herbal-ayurveda'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Shop Page Featured Image
	$wp_customize->add_setting( 'herbal_ayurveda_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'herbal_ayurveda_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'herbal_ayurveda_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_herbal_ayurveda_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'herbal_ayurveda_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_woocommerce_section'
    )));

    $wp_customize->add_setting('herbal_ayurveda_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','herbal-ayurveda'),
            'Right Sidebar' => __('Right Sidebar','herbal-ayurveda'),
        ),
	) );

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'herbal_ayurveda_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'Herbal_Ayurveda_Customize_partial_herbal_ayurveda_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'herbal_ayurveda_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_woocommerce_section'
    )));

   	$wp_customize->add_setting('herbal_ayurveda_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','herbal-ayurveda'),
            'Right Sidebar' => __('Right Sidebar','herbal-ayurveda'),
        ),
	) );

	//Products padding
	$wp_customize->add_setting('herbal_ayurveda_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'herbal_ayurveda_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'herbal_ayurveda_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('herbal_ayurveda_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'herbal_ayurveda_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('herbal_ayurveda_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_woocommerce_section',
        'choices' => array(
            'left' => __('Left','herbal-ayurveda'),
            'right' => __('Right','herbal-ayurveda'),
        ),
	) );

	$wp_customize->add_setting('herbal_ayurveda_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','herbal-ayurveda'),
		'description'	=> __('Enter a value in pixels. Example:20px','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'herbal_ayurveda_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Related Product
    $wp_customize->add_setting( 'herbal_ayurveda_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','herbal-ayurveda' ),
        'section' => 'herbal_ayurveda_woocommerce_section'
    )));

}

add_action( 'customize_register', 'Herbal_Ayurveda_Customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Herbal_Ayurveda_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Herbal_Ayurveda_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Herbal_Ayurveda_Customize_Section_Pro( $manager,'herbal_ayurveda_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'AYURVEDA PRO', 'herbal-ayurveda' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'herbal-ayurveda' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/herbal-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Herbal_Ayurveda_Customize_Section_Pro($manager,'herbal_ayurveda_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'herbal-ayurveda' ),
			'pro_text' => esc_html__( 'DOCS', 'herbal-ayurveda' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-herbal-ayurveda/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'herbal-ayurveda-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'herbal-ayurveda-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Herbal_Ayurveda_Customize::get_instance();
