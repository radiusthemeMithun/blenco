<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
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
class Blog extends Customizer {

	protected $section_blog = 'rt_blog_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog,
			'title'       => __( 'Blog Archive', 'blenco' ),
			'description' => __( 'Blog Section', 'blenco' ),
			'priority'    => 25
		] );

		Customize::add_controls( $this->section_blog, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_blog_controls', [

			'rt_blog_style' => [
				'type'        => 'select',
				'label'       => __( 'Blog Style', 'blenco' ),
				'description' => __( 'This option works only for blog layout', 'blenco' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default From Theme', 'blenco' ),
					'list'    => __( 'List', 'blenco' ),
					'list-2'    => __( 'List 2', 'blenco' ),
					'grid-2'    => __( 'Grid 2', 'blenco' ),
					'grid-3'    => __( 'Grid 3', 'blenco' ),
					'grid-4'    => __( 'Grid 4', 'blenco' ),
				]
			],

			'rt_blog_column' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column', 'blenco' ),
				'description' => __( 'This option works only for large device', 'blenco' ),
				'default'     => 'default',
				'choices'     => [
					'default'   => __( 'Default From Theme', 'blenco' ),
					'col-lg-12' => __( '1 Column', 'blenco' ),
					'col-lg-6'  => __( '2 Column', 'blenco' ),
					'col-lg-4'  => __( '3 Column', 'blenco' ),
					'col-lg-3'  => __( '4 Column', 'blenco' ),
				]
			],

			'rt_blog_column_gap' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column Gap', 'blenco' ),
				'description' => __( 'This option works only for blog grid gap', 'blenco' ),
				'default'     => 'g-4',
				'choices'     => [
					'g-1'  => __( 'Gap 1', 'blenco' ),
					'g-2'  => __( 'Gap 2', 'blenco' ),
					'g-3'  => __( 'Gap 3', 'blenco' ),
					'g-4'  => __( 'Gap 4', 'blenco' ),
					'g-5'  => __( 'Gap 5', 'blenco' ),
				]
			],

			'rt_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'blenco' ),
				'default' => '25',
			],

			'rt_blog_btn_style' => [
				'type'        => 'select',
				'label'       => __( 'Button Style', 'blenco' ),
				'description' => __( 'This option works only for blog button style', 'blenco' ),
				'default'     => 'button-3',
				'choices'     => [
					'button-1'  => __( 'Default', 'blenco' ),
					'button-2'  => __( 'Button 2', 'blenco' ),
					'button-3'  => __( 'Button 3', 'blenco' ),
					'button-4'  => __( 'Button 4', 'blenco' ),
					'button-5'  => __( 'Button 5', 'blenco' ),
				]
			],

			'rt_blog_btn_radius' => [
				'type'    => 'number',
				'label'   => __( 'Button Radius', 'blenco' ),
				'default' => 6,
			],

			'rt_blog_pagination_style' => [
				'type'        => 'select',
				'label'       => __( 'Pagination Style', 'blenco' ),
				'description' => __( 'This option works only for blog pagination style', 'blenco' ),
				'default'     => 'pagination-area',
				'choices'     => [
					'pagination-area'  => __( 'Default', 'blenco' ),
					'pagination-area-2'  => __( 'Style 2', 'blenco' ),
				]
			],

			'rt_meta_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'blenco' ),
			],

			'rt_blog_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'blenco' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_single_above_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Title Above Meta Style', 'blenco' ),
				'default' => 'meta-style-dash',
				'choices' => Fns::meta_style( [ 'meta-style-dash-bg', 'meta-style-pipe' ] )
			],

			'rt_blog_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Meta', 'blenco' ),
				'description' => __( 'You can sort meta by drag and drop', 'blenco' ),
				'placeholder' => __( 'Choose Meta', 'blenco' ),
				'multiselect' => true,
				'default'     => 'author,date,category',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_visibility' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'blenco' ),
			],

			'rt_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_blog_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Title Above Meta Visibility', 'blenco' ),
			],

			'rt_blog_content_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Content Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_video_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Video Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_blog_footer_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Footer Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_animation_heading' => [
				'type'  => 'heading',
				'label' => __( 'Animation', 'blenco' ),
			],

			'rt_animation' => [
				'type'      => 'switch',
				'label'       => __( 'Animation', 'blenco' ),
				'default'     => 0,
			],

			'rt_animation_effect' => [
				'type'        => 'select',
				'label' => __( 'Entrance Animation', 'blenco' ),
				'description' => __( 'This option works only for blog animation effect', 'blenco' ),
				'default'     => 'fadeInUp',
				'choices'     => [
					'bounce' => esc_html__( 'bounce', 'blenco' ),
					'flash' => esc_html__( 'flash', 'blenco' ),
					'pulse' => esc_html__( 'pulse', 'blenco' ),
					'rubberBand' => esc_html__( 'rubberBand', 'blenco' ),
					'shakeX' => esc_html__( 'shakeX', 'blenco' ),
					'shakeY' => esc_html__( 'shakeY', 'blenco' ),
					'headShake' => esc_html__( 'headShake', 'blenco' ),
					'swing' => esc_html__( 'swing', 'blenco' ),
					'fadeIn' => esc_html__( 'fadeIn', 'blenco' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'blenco' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'blenco' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'blenco' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'blenco' ),
					'bounceIn' => esc_html__( 'bounceIn', 'blenco' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'blenco' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'blenco' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'blenco' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'blenco' ),
					'slideInUp' => esc_html__( 'slideInUp', 'blenco' ),
					'slideInDown' => esc_html__( 'slideInDown', 'blenco' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'blenco' ),
					'slideInRight' => esc_html__( 'slideInRight', 'blenco' ),
				],
				'condition' => [ 'rt_animation' ],
			],

			'delay' => [
				'type'  => 'text',
				'label' => __( 'Delay', 'blenco' ),
				'default' => '200',
				'condition' => [ 'rt_animation' ],
			],

			'duration' => [
				'type'  => 'text',
				'label' => __( 'Duration', 'blenco' ),
				'default' => '1200',
				'condition' => [ 'rt_animation' ],
			],

		] );
	}


}
