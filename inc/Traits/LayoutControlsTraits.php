<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound
/**
 * LayoutControls
 */

namespace RT\Blenco\Traits;

// Do not allow directly accessing this file.
use RT\Blenco\Helpers\Fns;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

trait LayoutControlsTraits {
	public function get_layout_controls( $prefix = '' ) {

		$_left_text  = __( 'Left Sidebar', 'blenco' );
		$_right_text = __( 'Right Sidebar', 'blenco' );
		$left_text   = $_left_text;
		$right_text  = $_right_text;
		$image_left  = 'sidebar-left.png';
		$image_right = 'sidebar-right.png';

		if ( is_rtl() ) {
			$left_text   = $_right_text;
			$right_text  = $_left_text;
			$image_left  = 'sidebar-right.png';
			$image_right = 'sidebar-left.png';
		}

		return apply_filters( "blenco_{$prefix}_layout_controls", [

			$prefix . '_layout' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'blenco' ),
				'default' => 'right-sidebar',
				'choices' => [
					'left-sidebar'  => [
						'image' => blenco_get_img( $image_left ),
						'name'  => $left_text,
					],
					'full-width'    => [
						'image' => blenco_get_img( 'sidebar-full.png' ),
						'name'  => __( 'Full Width', 'blenco' ),
					],
					'right-sidebar' => [
						'image' => blenco_get_img( $image_right ),
						'name'  => $right_text,
					],
				]
			],

			$prefix . '_sidebar' => [
				'type'    => 'select',
				'label'   => __( 'Choose a Sidebar', 'blenco' ),
				'default' => 'default',
				'choices' => Fns::sidebar_lists()
			],

			$prefix . '_page_bg_image' => [
				'type'         => 'image',
				'label'        => __( 'Page Background Image', 'blenco' ),
				'description'  => __( 'Upload Background Image', 'blenco' ),
				'button_label' => __( 'Background Image', 'blenco' ),
			],

			$prefix . '_page_bg_color' => [
				'type'         => 'color',
				'label'        => __( 'Page Background Color', 'blenco' ),
				'description'  => __( 'Inter Background Color', 'blenco' ),
			],

			$prefix . '_header_heading' => [
				'type'  => 'heading',
				'label' => __( 'Header Settings', 'blenco' ),
			],

			$prefix . '_header_style' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Header Layout', 'blenco' ),
				'choices' => [
					'default' => __( '--Default--', 'blenco' ),
					'1'       => __( 'Layout 1', 'blenco' ),
					'2'       => __( 'Layout 2', 'blenco' ),
				],
			],

			$prefix . '_top_bar' => [
				'type'    => 'select',
				'label'   => __( 'Top Bar', 'blenco' ),
				'default' => 'default',
				'choices' => [
					'default' => __( '--Default--', 'blenco' ),
					'on'      => __( 'On', 'blenco' ),
					'off'     => __( 'Off', 'blenco' ),
				]
			],

			$prefix . '_banner_heading' => [
				'type'  => 'heading',
				'label' => __( 'Banner Settings', 'blenco' ),
			],

			$prefix . '_banner' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Visibility', 'blenco' ),
				'choices' => [
					'default' => __( '--Default--', 'blenco' ),
					'on'      => __( 'On', 'blenco' ),
					'off'     => __( 'Off', 'blenco' ),
				],
			],

			$prefix . '_breadcrumb_title' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Title', 'blenco' ),
				'choices' => [
					'default' => __( '--Default--', 'blenco' ),
					'on'      => __( 'On', 'blenco' ),
					'off'     => __( 'Off', 'blenco' ),
				],
			],

			$prefix . '_breadcrumb' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Breadcrumb', 'blenco' ),
				'choices' => [
					'default' => __( '--Default--', 'blenco' ),
					'on'      => __( 'On', 'blenco' ),
					'off'     => __( 'Off', 'blenco' ),
				],
			],

			$prefix . '_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Image', 'blenco' ),
				'description'  => __( 'Upload Banner Image', 'blenco' ),
				'button_label' => __( 'Banner Image', 'blenco' ),
			],

			$prefix . '_banner_color' => [
				'type'         => 'color',
				'label'        => __( 'Banner Background Color', 'blenco' ),
				'description'  => __( 'Inter Background Color', 'blenco' ),
			],

			$prefix . '_footer_heading' => [
				'type'  => 'heading',
				'label' => __( 'Footer Settings', 'blenco' ),
			],

			$prefix . '_footer_style'  => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Footer Layout', 'blenco' ),
				'choices' => [
					'default' => __( '--Default--', 'blenco' ),
					'1'       => __( 'Layout 1', 'blenco' ),
					'2'       => __( 'Layout 2', 'blenco' ),
				],
			],

		] );


	}


}
