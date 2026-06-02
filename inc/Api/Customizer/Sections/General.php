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
class General extends Customizer {
	protected $section_general = 'rt_general_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_general,
			'title'       => __( 'General', 'blenco' ),
			'description' => __( 'General Section', 'blenco' ),
			'priority'    => 20
		] );
		Customize::add_controls( $this->section_general, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_general_controls', [

			'rt_svg_enable' => [
				'type'  => 'switch',
				'label' => __( 'Enable SVG Upload', 'blenco' ),
				'default' => 1,
			],

			'rt_preloader' => [
				'type'  => 'switch',
				'label' => __( 'Preloader', 'blenco' ),
			],

			'rt_preloader_logo' => [
				'type'         => 'image',
				'label'        => __( 'Preloader Logo', 'blenco' ),
				'description'  => __( 'Upload preloader logo for your site.', 'blenco' ),
				'button_label' => __( 'Logo', 'blenco' ),
				'condition' => [ 'rt_preloader' ]
			],

			'preloader_bg_color' => [
				'type'    => 'color',
				'label'   => __( 'Preloader Background Color', 'blenco' ),
				'condition' => [ 'rt_preloader' ]
			],

			'rt_back_to_top' => [
				'type'  => 'switch',
				'label' => __( 'Back to Top', 'blenco' ),
			],

			'rt_remove_admin_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Remove Admin Bar', 'blenco' ),
				'description' => __( 'This option not work for administrator role.', 'blenco' ),
			],

			'container_width' => [
				'type'    => 'select',
				'label'   => __( 'Container Width', 'blenco' ),
				'default' => '1314',
				'choices' => [
					'1554' => esc_html__( '1554px', 'blenco' ),
					'1314' => esc_html__( '1314px', 'blenco' ),
					'1240' => esc_html__( '1240px', 'blenco' ),
					'1200' => esc_html__( '1200px', 'blenco' ),
					'1140' => esc_html__( '1140px', 'blenco' ),
				]
			],

			'rt_blend' => [
				'type'        => 'switch',
				'label'       => __( 'Image Blend', 'blenco' ),
				'default' => 0,
				'description' => __( 'This option for use all image blend mode.', 'blenco' ),
			],

			'rt_google_fonts_enable' => [
				'type'  => 'switch',
				'label' => __( 'Enable Google Fonts', 'blenco' ),
				'default' => 1,
			],

		] );

	}

}
