<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound
/**
 * Theme Customizer Pannels
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer;
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use RT\Blenco\Traits\SingletonTraits;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Pannels {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'add_panels' ] );
	}

	/**
	 * Add Panels
	 * @return void
	 */
	public function add_panels() {
		Customize::add_panels(
			[
				[
					'id'          => 'rt_header_panel',
					'title'       => esc_html__( 'Header - Topbar - Menu', 'blenco' ),
					'description' => esc_html__( 'Blenco Header', 'blenco' ),
					'priority'    => 22,
				],
				[
					'id'          => 'rt_typography_panel',
					'title'       => esc_html__( 'Typography', 'blenco' ),
					'description' => esc_html__( 'Blenco Typography', 'blenco' ),
					'priority'    => 24,
				],
				[
					'id'          => 'rt_color_panel',
					'title'       => esc_html__( 'Colors', 'blenco' ),
					'description' => esc_html__( 'Blenco Color Settings', 'blenco' ),
					'priority'    => 28,
				],
				[
					'id'          => 'rt_layouts_panel',
					'title'       => esc_html__( 'Layout Settings', 'blenco' ),
					'description' => esc_html__( 'Blenco Layout Settings', 'blenco' ),
					'priority'    => 34,
				],
				[
					'id'          => 'rt_contact_social_panel',
					'title'       => esc_html__( 'Contact & Socials', 'blenco' ),
					'description' => esc_html__( 'Blenco Contact & Socials', 'blenco' ),
					'priority'    => 24,
				],

			]
		);
	}

}
