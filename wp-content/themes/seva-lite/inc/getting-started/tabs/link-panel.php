<?php
/**
 * Right Buttons Panel.
 *
 * @package Seva_Lite
 */
?>
<div class="panel-right">
	<div class="panel-aside">
		<h4><?php esc_html_e( 'Upgrade To Pro', 'seva-lite' ); ?></h4>
		<p><?php esc_html_e( 'With the Pro version, you can change the look and feel of your website in seconds. In just a few clicks, you can change the color and typography of your website. The premium version lets you have better control over the theme as it comes with more customization options. Not just that, the theme also has more sections and layout options as compared to the free version. The Pro version is multi-language compatible as well.', 'seva-lite' ); ?></p>
		<p><?php esc_html_e( 'You will also get more frequent updates and quicker support with the Pro version.', 'seva-lite' ); ?></p>
		<a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/wordpress-themes/seva/' ); ?>" title="<?php esc_attr_e( 'View Premium Version', 'seva-lite' ); ?>" target="_blank">
            <?php esc_html_e( 'Read More About the Pro Theme', 'seva-lite' ); ?>
        </a>
	</div><!-- .panel-aside Theme Support -->
	<!-- Knowledge base -->
	<div class="panel-aside">
		<h4><?php esc_html_e( 'Visit the Knowledge Base', 'seva-lite' ); ?></h4>
		<p><?php esc_html_e( 'Need help with using the WordPress as quickly as possible? Visit our well-organized Knowledge Base!', 'seva-lite' ); ?></p>
		<p><?php esc_html_e( 'Our Knowledge Base has step-by-step video and text tutorials, from installing the WordPress to working with themes and more.', 'seva-lite' ); ?></p>

		<a class="button button-primary" href="<?php echo esc_url( 'https://docs.blossomthemes.com/' . SEVA_LITE_THEME_TEXTDOMAIN . '/' ); ?>" title="<?php esc_attr_e( 'Visit the knowledge base', 'seva-lite' ); ?>" target="_blank"><?php esc_html_e( 'Visit the Knowledge Base', 'seva-lite' ); ?></a>
	</div><!-- .panel-aside knowledge base -->

	<div class="panel-aside">
		<h4><?php _e( 'Submit your site for social share', 'seva-lite' ); ?></h4>
		<p><?php _e( 'We regularly share and feature websites made using our themes on our social media accounts( Facebook, Instagram, Twitter and Pinterest ).', 'seva-lite' ); ?></p>
		<p><?php _e( 'If you would like to get your website shared and featured, please submit your website by clicking the link below.', 'seva-lite' ); ?></p>

		<a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/submit-your-site-for-social-share/' ); ?>" title="<?php esc_attr_e( 'Submit your site for social share', 'seva-lite' ); ?>" target="_blank"><?php _e( 'Submit Here', 'seva-lite' ); ?></a>
	</div><!-- .panel-aside knowledge base -->
</div><!-- .panel-right -->