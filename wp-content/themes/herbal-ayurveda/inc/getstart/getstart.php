<?php
//about theme info
add_action( 'admin_menu', 'herbal_ayurveda_gettingstarted' );
function herbal_ayurveda_gettingstarted() {
	add_theme_page( esc_html__('About Herbal Ayurveda', 'herbal-ayurveda'), esc_html__('About Herbal Ayurveda', 'herbal-ayurveda'), 'edit_theme_options', 'herbal_ayurveda_guide', 'herbal_ayurveda_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function herbal_ayurveda_admin_theme_style() {
	wp_enqueue_style('herbal-ayurveda-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('herbal-ayurveda-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'herbal_ayurveda_admin_theme_style');

//guidline for about theme
function herbal_ayurveda_mostrar_guide() { 
	//custom function about theme customizer
	$herbal_ayurveda_return = add_query_arg( array()) ;
	$herbal_ayurveda_theme = wp_get_theme( 'herbal-ayurveda' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Herbal Ayurveda', 'herbal-ayurveda' ); ?> <span class="version"><?php esc_html_e( 'Version', 'herbal-ayurveda' ); ?>: <?php echo esc_html($herbal_ayurveda_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','herbal-ayurveda'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Herbal Ayurveda at 20% Discount','herbal-ayurveda'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','herbal-ayurveda'); ?> ( <span><?php esc_html_e('vwpro20','herbal-ayurveda'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( HERBAL_AYURVEDA_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'herbal-ayurveda' ); ?></a>
			</div>
		</div>
   	</div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="herbal_ayurveda_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'herbal-ayurveda' ); ?></button>
			<button class="tablinks" onclick="herbal_ayurveda_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'herbal-ayurveda' ); ?></button>
			<button class="tablinks" onclick="herbal_ayurveda_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'herbal-ayurveda' ); ?></button>
			<button class="tablinks" onclick="herbal_ayurveda_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'herbal-ayurveda' ); ?></button>
			<button class="tablinks" onclick="herbal_ayurveda_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'herbal-ayurveda' ); ?></button>
		  	<button class="tablinks" onclick="herbal_ayurveda_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'herbal-ayurveda' ); ?></button>
		</div>

		<?php
			$herbal_ayurveda_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$herbal_ayurveda_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Herbal_Ayurveda_Plugin_Activation_Settings::get_instance();
				$herbal_ayurveda_actions = $plugin_ins->recommended_actions;
				?>
				<div class="herbal-ayurveda-recommended-plugins">
				    <div class="herbal-ayurveda-action-list">
				        <?php if ($herbal_ayurveda_actions): foreach ($herbal_ayurveda_actions as $key => $herbal_ayurveda_actionValue): ?>
				                <div class="herbal-ayurveda-action" id="<?php echo esc_attr($herbal_ayurveda_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($herbal_ayurveda_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($herbal_ayurveda_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($herbal_ayurveda_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','herbal-ayurveda'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($herbal_ayurveda_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'herbal-ayurveda' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Herbal Ayurveda is a theme for campaign, candidate, democrat, election, government, Ayurveda, Herbal Ayurveda, Ayurveda candidate, Ayurveda donation, Ayurveda event, Ayurveda party, Ayurveda, politician, politics, republican websites. This theme is perfectly made by our expert team for the users who want to establish their ayurvedic business online. It is amazing with its to notch features and compatibility with different plugins. Anyone can kick start their business in few clicks with the help of this theme. Also, it has color changing option so if the users who want to change the color of this theme according to their taste and brand can easily change it. With that users can also personalize fonts, sections, image, header, footer, etc. Herbal Ayurveda is best for all the users. This multipurpose theme has everything one needs to build the site. It has fantastic testimonial section and beautiful layouts. This responsive theme is best because of its SEO friendly nature and Compatibility with woo commerce. It makes the site rank higher on search engine result pages effortlessly. In few clicks your niche specific website will get ready without any hassle and stress. Now social movements, NGO’s, crowd-funding campaigns can kick start their website.','herbal-ayurveda'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'herbal-ayurveda' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'herbal-ayurveda' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( HERBAL_AYURVEDA_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'herbal-ayurveda' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'herbal-ayurveda'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'herbal-ayurveda'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'herbal-ayurveda'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'herbal-ayurveda'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'herbal-ayurveda'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( HERBAL_AYURVEDA_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'herbal-ayurveda'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'herbal-ayurveda'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'herbal-ayurveda'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( HERBAL_AYURVEDA_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'herbal-ayurveda'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'herbal-ayurveda' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','herbal-ayurveda'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_about_us_section') ); ?>" target="_blank"><?php esc_html_e('About Section','herbal-ayurveda'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','herbal-ayurveda'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','herbal-ayurveda'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','herbal-ayurveda'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','herbal-ayurveda'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','herbal-ayurveda'); ?></span><?php esc_html_e(' Go to ','herbal-ayurveda'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','herbal-ayurveda'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','herbal-ayurveda'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','herbal-ayurveda'); ?></span><?php esc_html_e(' Go to ','herbal-ayurveda'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','herbal-ayurveda'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','herbal-ayurveda'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','herbal-ayurveda'); ?> <a class="doc-links" href="<?php echo esc_url( HERBAL_AYURVEDA_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','herbal-ayurveda'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){
			$plugin_ins = herbal_ayurveda_Plugin_Activation_Settings::get_instance();
			$herbal_ayurveda_actions = $plugin_ins->recommended_actions;
			?>
			<div class="herbal-ayurveda-recommended-plugins">
			    <div class="herbal-ayurveda-action-list">
			        <?php if ($herbal_ayurveda_actions): foreach ($herbal_ayurveda_actions as $key => $herbal_ayurveda_actionValue): ?>
			                <div class="herbal-ayurveda-action" id="<?php echo esc_attr($herbal_ayurveda_actionValue['id']);?>">
		                        <div class="action-inner">
		                            <h3 class="action-title"><?php echo esc_html($herbal_ayurveda_actionValue['title']); ?></h3>
		                            <div class="action-desc"><?php echo esc_html($herbal_ayurveda_actionValue['desc']); ?></div>
		                            <?php echo wp_kses_post($herbal_ayurveda_actionValue['link']); ?>
		                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','herbal-ayurveda'); ?></a>
		                        </div>
			                </div>
			            <?php endforeach;
			        endif; ?>
			    </div>
			</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($herbal_ayurveda_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'herbal-ayurveda' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','herbal-ayurveda'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','herbal-ayurveda'); ?></span></b></p>
	              	<div class="herbal-ayurveda-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','herbal-ayurveda'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'herbal-ayurveda' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','herbal-ayurveda'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','herbal-ayurveda'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','herbal-ayurveda'); ?></a>
							</div>

							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','herbal-ayurveda'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','herbal-ayurveda'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','herbal-ayurveda'); ?></a>
							</div>
						</div>
					</div>
				</div>
	     	</div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Herbal_Ayurveda_Plugin_Activation_Settings::get_instance();
			$herbal_ayurveda_actions = $plugin_ins->recommended_actions;
			?>
				<div class="herbal-ayurveda-recommended-plugins">
				    <div class="herbal-ayurveda-action-list">
				        <?php if ($herbal_ayurveda_actions): foreach ($herbal_ayurveda_actions as $key => $herbal_ayurveda_actionValue): ?>
				                <div class="herbal-ayurveda-action" id="<?php echo esc_attr($herbal_ayurveda_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($herbal_ayurveda_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($herbal_ayurveda_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($herbal_ayurveda_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'herbal-ayurveda' ); ?></h3>
				<hr class="h3hr">
				<div class="herbal-ayurveda-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','herbal-ayurveda'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'herbal-ayurveda' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','herbal-ayurveda'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','herbal-ayurveda'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','herbal-ayurveda'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','herbal-ayurveda'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=herbal_ayurveda_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','herbal-ayurveda'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','herbal-ayurveda'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
				<?php if(!class_exists('IEPA_Loader')){
					$plugin_ins = herbal_ayurveda_Plugin_Activation_Woo_Products::get_instance();
					$herbal_ayurveda_actions = $plugin_ins->recommended_actions;
					?>
					<div class="herbal-ayurveda-recommended-plugins">
						    <div class="herbal-ayurveda-action-list">
						        <?php if ($herbal_ayurveda_actions): foreach ($herbal_ayurveda_actions as $key => $herbal_ayurveda_actionValue): ?>
						                <div class="herbal-ayurveda-action" id="<?php echo esc_attr($herbal_ayurveda_actionValue['id']);?>">
					                        <div class="action-inner plugin-activation-redirect">
					                            <h3 class="action-title"><?php echo esc_html($herbal_ayurveda_actionValue['title']); ?></h3>
					                            <div class="action-desc"><?php echo esc_html($herbal_ayurveda_actionValue['desc']); ?></div>
					                            <?php echo wp_kses_post($herbal_ayurveda_actionValue['link']); ?>
					                        </div>
						                </div>
						            <?php endforeach;
						        endif; ?>
						    </div>
					</div>
				<?php }else{ ?>
					<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'herbal-ayurveda' ); ?></h3>
					<hr class="h3hr">
					<div class="herbal-ayurveda-pattern-page">
						<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','herbal-ayurveda'); ?></p>
						<p><b><?php esc_html_e('1. First you need to activate these plugins','herbal-ayurveda'); ?></b></p>
							<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','herbal-ayurveda'); ?></p>
							<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','herbal-ayurveda'); ?></p>
							<p><?php esc_html_e('3. Woocommerce','herbal-ayurveda'); ?></p>

						<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','herbal-ayurveda'); ?></span></b></p>
		              	<div class="herbal-ayurveda-pattern-page">
				    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','herbal-ayurveda'); ?></a>
				    	</div>
		              	<p><?php esc_html_e('You can create a template as you like.','herbal-ayurveda'); ?></span></p>
				    </div>
				<?php } ?>
			</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'herbal-ayurveda' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This Premium Ayurveda WordPress Theme is a beautifully crafted theme with an attractive slider that draws visitor’s attention towards itself. It has indicators to slide to another image and has carousel dots that indicate the number of slides. It aggravates the visitor’s interest to know more about your business and services. Its header has space for your brand’s logo, contact info, mail ID, and social icons. This theme is also available in WordPress Theme Bundle. The simple menu doesn’t make things complicated and makes you see things at a glance. You can share information about your company in an innovative way as the section is a bit unconventional yet interestingly designed for conveying the proper info. This WP Ayurveda WordPress Theme has a well-built services and products section for displaying all your ayurvedic and herbal products. The color scheme is absolutely spot on that perfectly complements a website that is related to promoting ayurvedic stores, herbal products or even ayurvedic clinics as well.','herbal-ayurveda'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( HERBAL_AYURVEDA_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'herbal-ayurveda'); ?></a>
					<a href="<?php echo esc_url( HERBAL_AYURVEDA_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'herbal-ayurveda'); ?></a>
					<a href="<?php echo esc_url( HERBAL_AYURVEDA_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'herbal-ayurveda'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'herbal-ayurveda' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'herbal-ayurveda'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'herbal-ayurveda'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'herbal-ayurveda'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'herbal-ayurveda'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'herbal-ayurveda'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'herbal-ayurveda'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'herbal-ayurveda'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'herbal-ayurveda'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'herbal-ayurveda'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'herbal-ayurveda'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'herbal-ayurveda'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'herbal-ayurveda'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'herbal-ayurveda'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( HERBAL_AYURVEDA_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'herbal-ayurveda'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'herbal-ayurveda'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'herbal-ayurveda'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( HERBAL_AYURVEDA_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'herbal-ayurveda'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'herbal-ayurveda'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'herbal-ayurveda'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( HERBAL_AYURVEDA_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'herbal-ayurveda'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'herbal-ayurveda'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'herbal-ayurveda'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( HERBAL_AYURVEDA_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'herbal-ayurveda'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'herbal-ayurveda'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'herbal-ayurveda'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( HERBAL_AYURVEDA_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','herbal-ayurveda'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'herbal-ayurveda'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'herbal-ayurveda'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( HERBAL_AYURVEDA_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'herbal-ayurveda'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>

<?php } ?>