<?php
/**
 * Theme Customizer - Header
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Error extends Customizer {
	protected $section_labels = 'rt_error_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Error Page', 'blenco' ),
			'description' => __( 'Error section.', 'blenco' ),
			'priority'    => 39
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_labels_controls', [

			'rt_error_image' => [
				'type'         => 'image',
				'label'        => __( 'Error Image', 'blenco' ),
				'description'  => __( 'Upload error image for your site.', 'blenco' ),
				'button_label' => __( 'Error image', 'blenco' ),
			],

			'rt_error_heading' => [
				'type'        => 'text',
				'label'       => __( 'Error Heading', 'blenco' ),
				'default'     => __( 'Oops, something went wrong.', 'blenco' ),
			],

			'rt_error_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Text', 'blenco' ),
				'default'     => __( 'Sorry! This Page Is Not Available!', 'blenco' ),
			],

			'rt_error_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Button Text', 'blenco' ),
				'default'     => __( 'Back To Home Page', 'blenco' ),
			],

		] );
	}


}
