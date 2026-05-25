<?php
/**
 * Theme Customizer - Header
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RT\Blenco\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Banner extends Customizer {

	protected $section_breadcrumb = 'rt_breadcrumb_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_breadcrumb,
			'title'       => __( 'Banner - Breadcrumb', 'blenco' ),
			'description' => __( 'Banner Section', 'blenco' ),
			'priority'    => 23
		] );

		Customize::add_controls( $this->section_breadcrumb, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_top_bar_controls', [

			'rt_banner' => [
				'type'    => 'switch',
				'label'   => __( 'Banner Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_banner_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Banner Style', 'blenco' ),
				'default'   => 1,
				'choices'   => Fns::image_placeholder( 'banner', 1 ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Banner Alignment', 'blenco' ),
				'default' => 'align-items-center',
				'choices' => [
					'default'               => __( 'Alignment Default', 'blenco' ),
					'align-items-center'    => __( 'Alignment Center', 'blenco' ),
					'align-items-end'       => __( 'Alignment right', 'blenco' ),
				],
				'condition' => [ 'rt_banner' ]
			],

			'rt_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Background Image', 'blenco' ),
				'description'  => __( 'Upload Banner Image', 'blenco' ),
				'button_label' => __( 'Banner', 'blenco' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_color' => [
				'type'         => 'alfa_color',
				'label'        => __( 'Banner Background Color', 'blenco' ),
				'description'  => __( 'Inter Banner Color', 'blenco' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_image_attr' => [
				'type'      => 'bg_attribute',
				'condition' => [ 'rt_banner' ],
				'default'   => json_encode(
					[
						'position'   => 'center center',
						'attachment' => 'scroll',
						'repeat'     => 'no-repeat',
						'size'       => 'cover',
					]
				)
			],

			'rt_banner_color_opacity' => [
				'type'         => 'number',
				'label'        => __( 'Background Opacity', 'blenco' ),
				'description'  => __( 'Inter Banner Opacity', 'blenco' ),
				'condition'    => [ 'rt_banner' ]
			],

			'rt_banner_padding_top' => [
				'type'        => 'number',
				'label'       => __( 'Banner Padding Top (px)', 'blenco' ),
				'default'     => '',
				'condition'   => [ 'rt_banner' ]
			],

			'rt_banner_padding_bottom' => [
				'type'        => 'number',
				'label'       => __( 'Banner Padding Bottom (px)', 'blenco' ),
				'default'     => '',
				'condition'   => [ 'rt_banner' ]
			],

			'rt_banner_color_mode' => [
				'type'    => 'select',
				'label'   => __( 'Banner Color Mode', 'blenco' ),
				'default' => 'banner-dark',
				'choices' => [
					'banner-dark'    => __( 'Dark Color', 'blenco' ),
					'banner-light'   => __( 'Light Color', 'blenco' ),
				],
				'condition' => [ 'rt_banner' ]
			],

			'rt_banner1' => [
				'type'      => 'heading',
				'label'     => __( 'Breadcrumb Settings', 'blenco' ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_title' => [
				'type'      => 'switch',
				'label'     => __( 'Banner Title', 'blenco' ),
				'default'   => 1,
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb' => [
				'type'      => 'switch',
				'label'     => __( 'Banner Breadcrumb', 'blenco' ),
				'condition' => [ 'rt_banner' ]
			],

			'rt_breadcrumb_border' => [
				'type'      => 'switch',
				'label'     => __( 'Breadcrumb Border', 'blenco' ),
				'default'   => 0,
				'condition' => [ 'rt_banner' ]
			],

		] );

	}

}
