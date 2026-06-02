<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
/**
 * Theme Customizer - Menu Typography
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class TypographyMenu extends Customizer {

	protected $section_id = 'rt_menu_typo_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_id,
			'title'       => __( 'Menu Typography', 'blenco' ),
			'description' => __( 'Menu Typography Section', 'blenco' ),
			'panel'       => 'rt_typography_panel',
			'priority'    => 3
		] );

		Customize::add_controls( $this->section_id, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_menu_typo_section', [

			'rt_menu_typo' => [
				'type'    => 'typography',
				'label'   => __( 'Menu Typography', 'blenco' ),
				'default' => json_encode(
					[
						'font'          => 'Plus Jakarta Sans',
						'regularweight' => '600',
						'size'          => '16',
						'lineheight'    => '22',
					]
				)
			],

		] );

	}

}
