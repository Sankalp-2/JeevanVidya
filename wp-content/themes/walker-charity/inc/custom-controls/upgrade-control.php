<?php
/**
 * Custom Customizer Controls.
 *
 * @package Walker-Charity
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Upgrade customizer section.
 *
 * @since  1.0.8
 * @access public
 */
class Walker_Charity_Customize_Section_Ugrade extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.8
	 * @access public
	 * @var    string
	 */
	public $type = 'walker-charity-upgrade';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.8
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.8
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.8
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		$json['description']  = wp_kses_post( $this->description );
		return $json;
	}

	/**
	 *
	 * Render template for upgrade button section
	 * @since  1.0.8
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
				</h3>
				<# if ( data.description) { #>
				{{{data.description}}}
				<# } #>
			
			
			 
		</li>
	<?php }
}