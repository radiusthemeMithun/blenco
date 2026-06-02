<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
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
class SiteIdentity extends Customizer {

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_controls( 'title_tagline', $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_title_tagline_controls', [

			'rt_logo' => [
				'type'         => 'image',
				'label'        => __( 'Main Logo', 'blenco' ),
				'description'  => __( 'Upload main logo for your site.', 'blenco' ),
				'button_label' => __( 'Logo', 'blenco' ),
			],

			'rt_logo_light' => [
				'type'         => 'image',
				'label'        => __( 'Light Logo', 'blenco' ),
				'description'  => __( 'Upload light logo for transparent header. It should a white logo', 'blenco' ),
				'button_label' => __( 'Light Logo', 'blenco' ),
			],

			'rt_logo_mobile' => [
				'type'         => 'image',
				'label'        => __( 'Mobile Logo', 'blenco' ),
				'description'  => __( 'Upload, if you need a different logo for mobile device..', 'blenco' ),
				'button_label' => __( 'Mobile Logo', 'blenco' ),
			],

			'rt_logo_width_height' => [
				'type'      => 'text',
				'label'     => __( 'Main Logo Dimension', 'blenco' ),
				'description'     => __( 'Enter the width and height value separate by comma (,). Eg. 120px,45px', 'blenco' ),
				'transport' => '',
			],

			'rt_mobile_logo_width_height' => [
				'type'      => 'text',
				'label'     => __( 'Mobile Logo Dimension', 'blenco' ),
				'description'     => __( 'Enter the width and height value separate by comma (,). Eg. 120px,45px', 'blenco' ),
				'transport' => '',
			],

		] );

	}

}
