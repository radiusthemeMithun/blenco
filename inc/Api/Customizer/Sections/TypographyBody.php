<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
/**
 * Theme Customizer - Body Typography
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class TypographyBody extends Customizer {

	protected $section_id = 'rt_body_typo_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_id,
			'title'       => __( 'Body Typography', 'blenco' ),
			'description' => __( 'Body Typography Section', 'blenco' ),
			'panel'       => 'rt_typography_panel',
			'priority'    => 1
		] );

		Customize::add_controls( $this->section_id, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_body_typo_section', [

			'rt_body_typo' => [
				'type'    => 'typography',
				'label'   => __( 'Body Typography', 'blenco' ),
				'default' => json_encode(
					[
						'font'          => 'Plus Jakarta Sans',
						'regularweight' => '500',
						'size'          => '16',
						'lineheight'    => '28',
					]
				)
			],

		] );

	}

}
