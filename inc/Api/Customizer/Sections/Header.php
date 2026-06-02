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
class Header extends Customizer {
	protected $section_header = 'rt_header_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_header,
			'panel'       => 'rt_header_panel',
			'title'       => __( 'Header Menu', 'blenco' ),
			'description' => __( 'Header Section', 'blenco' ),
			'priority'    => 2,
			'edit-point'  => ''
		] );
		Customize::add_controls( $this->section_header, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_header_controls', [

			'rt_header_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Choose Layout', 'blenco' ),
				'default'   => '1',
				'edit-link' => '.site-branding',
				'choices'   => Fns::image_placeholder( 'header', 1 )
			],

			'rt_menu_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Menu Alignment', 'blenco' ),
				'default' => 'justify-content-center',
				'choices' => [
					''                       => __( 'Menu Alignment', 'blenco' ),
					'justify-content-start'  => __( 'Left Alignment', 'blenco' ),
					'justify-content-center' => __( 'Center Alignment', 'blenco' ),
					'justify-content-end'    => __( 'Right Alignment', 'blenco' ),
				]
			],

			'rt_header_width' => [
				'type'    => 'select',
				'label'   => __( 'Header Width', 'blenco' ),
				'default' => 'box',
				'choices' => [
					'box'       => __( 'Box Width', 'blenco' ),
					'full' => __( 'Full Width', 'blenco' ),
				]
			],

			'rt_header_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Header Max Width (PX)', 'blenco' ),
				'description' => __( 'Enter a number greater than 1440. Remove value for 100%', 'blenco' ),
				'condition'   => [ 'rt_header_width', '==', 'full' ]
			],

			'rt_sticy_header' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Header', 'blenco' ),
				'description' => __( 'Show header at the top when scrolling down', 'blenco' ),
			],

			'rt_tr_header' => [
				'type'  => 'switch',
				'label' => __( 'Transparent Header', 'blenco' ),
			],

			'rt_tr_header_color' => [
				'type'    => 'select',
				'label'   => __( 'Transparent color', 'blenco' ),
				'default' => 'tr-header-dark',
				'choices' => [
					'tr-header-light'   => __( 'Light Color', 'blenco' ),
					'tr-header-dark'    => __( 'Dark Color', 'blenco' ),
				],
				'condition' => [ 'rt_tr_header' ]
			],

			'rt_tr_header_shadow' => [
				'type'  => 'switch',
				'label' => __( 'Header Dark Shadow', 'blenco' ),
				'condition' => [ 'rt_tr_header' ]
			],

			'rt_header_border' => [
				'type'    => 'switch',
				'label'   => __( 'Header Border', 'blenco' ),
				'default' => 0
			],
			'rt_header_sep1'   => [
				'type' => 'separator',
				'edit-link' => '.menu-icon-wrapper',
			],

			'rt_header_add_to_cart' => [
				'type'    => 'switch',
				'label'   => __( 'Cart Icon ?', 'blenco' ),
				'default' => 0,
			],

			'rt_header_wishlist' => [
				'type'    => 'switch',
				'label'   => __( 'Wishlist Icon ?', 'blenco' ),
				'default' => 0,
			],

			'rt_header_compare' => [
				'type'    => 'switch',
				'label'   => __( 'Compare Icon ?', 'blenco' ),
				'default' => 0,
			],

			'rt_header_login_link' => [
				'type'    => 'switch',
				'label'   => __( 'User Login ?', 'blenco' ),
				'default' => 0,
			],

			'rt_header_search' => [
				'type'    => 'switch',
				'label'   => __( 'Search Icon ?', 'blenco' ),
				'default' => 1,
			],

			'rt_header_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Hamburger Menu', 'blenco' ),
				'description' => __( 'It will be hide only for desktop.', 'blenco' ),
				'default'     => 0,
			],

			'rt_header_separator' => [
				'type'    => 'switch',
				'label'   => __( 'Icon Separator', 'blenco' ),
				'default' => 0,
			],

			'rt_offcanvas_social' => [
				'type'    => 'switch',
				'label'   => __( 'Offcanvas Social', 'blenco' ),
				'default' => 0,
			],

			'rt_header_sep2' => [
				'type' => 'separator',
			],

			'rt_get_started_button' => [
				'type'    => 'switch',
				'label'   => __( 'Get Started Button ?', 'blenco' ),
				'default' => 0
			],

			'rt_get_started_button_url' => [
				'type'    => 'text',
				'label'   => __( 'Button Link', 'blenco' ),
				'condition' => [ 'rt_get_started_button' ],
			],

		] );

	}
}
