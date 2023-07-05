<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Herbal_Ayurveda_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'herbal-ayurveda-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'herbal-ayurveda' ),
				'family'      => esc_html__( 'Font Family', 'herbal-ayurveda' ),
				'size'        => esc_html__( 'Font Size',   'herbal-ayurveda' ),
				'weight'      => esc_html__( 'Font Weight', 'herbal-ayurveda' ),
				'style'       => esc_html__( 'Font Style',  'herbal-ayurveda' ),
				'line_height' => esc_html__( 'Line Height', 'herbal-ayurveda' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'herbal-ayurveda' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'herbal-ayurveda-ctypo-customize-controls' );
		wp_enqueue_style(  'herbal-ayurveda-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'herbal-ayurveda' ),
        'Abril Fatface' => __( 'Abril Fatface', 'herbal-ayurveda' ),
        'Acme' => __( 'Acme', 'herbal-ayurveda' ),
        'Anton' => __( 'Anton', 'herbal-ayurveda' ),
        'Architects Daughter' => __( 'Architects Daughter', 'herbal-ayurveda' ),
        'Arimo' => __( 'Arimo', 'herbal-ayurveda' ),
        'Arsenal' => __( 'Arsenal', 'herbal-ayurveda' ),
        'Arvo' => __( 'Arvo', 'herbal-ayurveda' ),
        'Alegreya' => __( 'Alegreya', 'herbal-ayurveda' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'herbal-ayurveda' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'herbal-ayurveda' ),
        'Bangers' => __( 'Bangers', 'herbal-ayurveda' ),
        'Boogaloo' => __( 'Boogaloo', 'herbal-ayurveda' ),
        'Bad Script' => __( 'Bad Script', 'herbal-ayurveda' ),
        'Bitter' => __( 'Bitter', 'herbal-ayurveda' ),
        'Bree Serif' => __( 'Bree Serif', 'herbal-ayurveda' ),
        'BenchNine' => __( 'BenchNine', 'herbal-ayurveda' ),
        'Cabin' => __( 'Cabin', 'herbal-ayurveda' ),
        'Cardo' => __( 'Cardo', 'herbal-ayurveda' ),
        'Courgette' => __( 'Courgette', 'herbal-ayurveda' ),
        'Cherry Swash' => __( 'Cherry Swash', 'herbal-ayurveda' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'herbal-ayurveda' ),
        'Crimson Text' => __( 'Crimson Text', 'herbal-ayurveda' ),
        'Cuprum' => __( 'Cuprum', 'herbal-ayurveda' ),
        'Cookie' => __( 'Cookie', 'herbal-ayurveda' ),
        'Chewy' => __( 'Chewy', 'herbal-ayurveda' ),
        'Days One' => __( 'Days One', 'herbal-ayurveda' ),
        'Dosis' => __( 'Dosis', 'herbal-ayurveda' ),
        'Droid Sans' => __( 'Droid Sans', 'herbal-ayurveda' ),
        'Economica' => __( 'Economica', 'herbal-ayurveda' ),
        'Fredoka One' => __( 'Fredoka One', 'herbal-ayurveda' ),
        'Fjalla One' => __( 'Fjalla One', 'herbal-ayurveda' ),
        'Francois One' => __( 'Francois One', 'herbal-ayurveda' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'herbal-ayurveda' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'herbal-ayurveda' ),
        'Great Vibes' => __( 'Great Vibes', 'herbal-ayurveda' ),
        'Handlee' => __( 'Handlee', 'herbal-ayurveda' ),
        'Hammersmith One' => __( 'Hammersmith One', 'herbal-ayurveda' ),
        'Inconsolata' => __( 'Inconsolata', 'herbal-ayurveda' ),
        'Indie Flower' => __( 'Indie Flower', 'herbal-ayurveda' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'herbal-ayurveda' ),
        'Julius Sans One' => __( 'Julius Sans One', 'herbal-ayurveda' ),
        'Josefin Slab' => __( 'Josefin Slab', 'herbal-ayurveda' ),
        'Josefin Sans' => __( 'Josefin Sans', 'herbal-ayurveda' ),
        'Kanit' => __( 'Kanit', 'herbal-ayurveda' ),
        'Lobster' => __( 'Lobster', 'herbal-ayurveda' ),
        'Lato' => __( 'Lato', 'herbal-ayurveda' ),
        'Lora' => __( 'Lora', 'herbal-ayurveda' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'herbal-ayurveda' ),
        'Lobster Two' => __( 'Lobster Two', 'herbal-ayurveda' ),
        'Merriweather' => __( 'Merriweather', 'herbal-ayurveda' ),
        'Monda' => __( 'Monda', 'herbal-ayurveda' ),
        'Montserrat' => __( 'Montserrat', 'herbal-ayurveda' ),
        'Muli' => __( 'Muli', 'herbal-ayurveda' ),
        'Marck Script' => __( 'Marck Script', 'herbal-ayurveda' ),
        'Noto Serif' => __( 'Noto Serif', 'herbal-ayurveda' ),
        'Open Sans' => __( 'Open Sans', 'herbal-ayurveda' ),
        'Overpass' => __( 'Overpass', 'herbal-ayurveda' ),
        'Overpass Mono' => __( 'Overpass Mono', 'herbal-ayurveda' ),
        'Oxygen' => __( 'Oxygen', 'herbal-ayurveda' ),
        'Orbitron' => __( 'Orbitron', 'herbal-ayurveda' ),
        'Patua One' => __( 'Patua One', 'herbal-ayurveda' ),
        'Pacifico' => __( 'Pacifico', 'herbal-ayurveda' ),
        'Padauk' => __( 'Padauk', 'herbal-ayurveda' ),
        'Playball' => __( 'Playball', 'herbal-ayurveda' ),
        'Playfair Display' => __( 'Playfair Display', 'herbal-ayurveda' ),
        'PT Sans' => __( 'PT Sans', 'herbal-ayurveda' ),
        'Philosopher' => __( 'Philosopher', 'herbal-ayurveda' ),
        'Permanent Marker' => __( 'Permanent Marker', 'herbal-ayurveda' ),
        'Poiret One' => __( 'Poiret One', 'herbal-ayurveda' ),
        'Quicksand' => __( 'Quicksand', 'herbal-ayurveda' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'herbal-ayurveda' ),
        'Raleway' => __( 'Raleway', 'herbal-ayurveda' ),
        'Rubik' => __( 'Rubik', 'herbal-ayurveda' ),
        'Rokkitt' => __( 'Rokkitt', 'herbal-ayurveda' ),
        'Russo One' => __( 'Russo One', 'herbal-ayurveda' ),
        'Righteous' => __( 'Righteous', 'herbal-ayurveda' ),
        'Slabo' => __( 'Slabo', 'herbal-ayurveda' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'herbal-ayurveda' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'herbal-ayurveda'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'herbal-ayurveda' ),
        'Sacramento' => __( 'Sacramento', 'herbal-ayurveda' ),
        'Shrikhand' => __( 'Shrikhand', 'herbal-ayurveda' ),
        'Tangerine' => __( 'Tangerine', 'herbal-ayurveda' ),
        'Ubuntu' => __( 'Ubuntu', 'herbal-ayurveda' ),
        'VT323' => __( 'VT323', 'herbal-ayurveda' ),
        'Varela Round' => __( 'Varela Round', 'herbal-ayurveda' ),
        'Vampiro One' => __( 'Vampiro One', 'herbal-ayurveda' ),
        'Vollkorn' => __( 'Vollkorn', 'herbal-ayurveda' ),
        'Volkhov' => __( 'Volkhov', 'herbal-ayurveda' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'herbal-ayurveda' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'herbal-ayurveda' ),
			'100' => esc_html__( 'Thin',       'herbal-ayurveda' ),
			'300' => esc_html__( 'Light',      'herbal-ayurveda' ),
			'400' => esc_html__( 'Normal',     'herbal-ayurveda' ),
			'500' => esc_html__( 'Medium',     'herbal-ayurveda' ),
			'700' => esc_html__( 'Bold',       'herbal-ayurveda' ),
			'900' => esc_html__( 'Ultra Bold', 'herbal-ayurveda' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'herbal-ayurveda' ),
			'normal'  => esc_html__( 'Normal', 'herbal-ayurveda' ),
			'italic'  => esc_html__( 'Italic', 'herbal-ayurveda' ),
			'oblique' => esc_html__( 'Oblique', 'herbal-ayurveda' )
		);
	}
}
