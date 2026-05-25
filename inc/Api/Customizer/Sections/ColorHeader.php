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
class ColorHeader extends Customizer {
	protected $section_header_color = 'rt_header_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {

		Customize::add_section( [
			'id'          => $this->section_header_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Header Colors', 'blenco' ),
			'description' => __( 'Header Color Section', 'blenco' ),
			'priority'    => 4
		] );

		Customize::add_controls( $this->section_header_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_header_color_controls', [

			'rt_menu_heading1' => [
				'type'  => 'heading',
				'label' => __( 'Default Menu', 'blenco' ),
			],

			'rt_menu_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Menu Color', 'blenco' ),
			],

			'rt_menu_active_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Menu Hover & Active Color', 'blenco' ),
			],

			'rt_menu_bg_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Menu Background Color', 'blenco' ),
			],

			'rt_sub_menu_bg_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Sub Menu Background Color', 'blenco' ),
			],

			'rt_menu_heading2' => [
				'type'  => 'heading',
				'label' => __( 'Transparent Menu', 'blenco' ),
			],

			'rt_tr_menu_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'TR Menu Color', 'blenco' ),
			],

			'rt_tr_menu_active_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'TR Menu Hover & Active Color', 'blenco' ),
			],

			'rt_menu_heading4' => [
				'type'  => 'heading',
				'label' => __( 'Others Style', 'blenco' ),
			],

			'rt_menu_border_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Menu Border Color', 'blenco' ),
			],


		] );


	}

}
