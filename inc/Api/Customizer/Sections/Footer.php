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
class Footer extends Customizer {
	protected $section_footer = 'rt_footer_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_footer,
			'title'       => __( 'Footer', 'blenco' ),
			'description' => __( 'Footer Section', 'blenco' ),
			'priority'    => 38
		] );

		Customize::add_controls( $this->section_footer, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_footer_controls', [

			'rt_footer_display' => [
				'type'        => 'switch',
				'label'       => __( 'Footer Display', 'blenco' ),
				'description' => __( 'Show footer display', 'blenco' ),
				'default' => 1,
			],

			'rt_footer_style' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'blenco' ),
				'default' => '1',
				'choices' => Fns::image_placeholder( 'footer', 1 )
			],

			'rt_footer_width' => [
				'type'    => 'select',
				'label'   => __( 'Footer Width', 'blenco' ),
				'default' => '',
				'choices' => [
					''       => __( 'Box Width', 'blenco' ),
					'-fluid' => __( 'Full Width', 'blenco' ),
				]
			],

			'rt_footer_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Footer Max Width (PX)', 'blenco' ),
				'description' => __( 'Enter a number greater than 992.', 'blenco' ),
				'condition'   => [ 'rt_footer_width', '==', '-fluid' ]
			],

			'rt_sticky_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Footer', 'blenco' ),
				'description' => __( 'Show footer at the top when scrolling down', 'blenco' ),
			],

			'rt_footer_links_enable' => [
				'type'        => 'switch',
				'label'       => __( 'Enable Footer Links', 'blenco' ),
				'description' => __( 'Show footer links below copyright text', 'blenco' ),
				'default'     => false,
			],

			'rt_footer_links' => [
				'type'            => 'textarea',
				'label'           => __( 'Footer Links', 'blenco' ),
				'default'         => '',
				'active_callback' => function() {
					return get_theme_mod( 'rt_footer_links_enable', false );
				},
			],
			'rt_social_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Social Icon', 'blenco' ),
				'description' => __( 'Show footer at the social icon, This options available for only Footer layout.', 'blenco' ),
			],

			'rt_footer_copyright' => [
				'type'        => 'tinymce',
				'label'       => __( 'Footer Copyright Text', 'blenco' ),
				'default'     => __( 'Copyright© [y] Blenco by RadiusTheme', 'blenco' ),
				'description' => __( 'Add [y] flag anywhere for dynamic year.', 'blenco' ),
			],

		] );

	}

}
