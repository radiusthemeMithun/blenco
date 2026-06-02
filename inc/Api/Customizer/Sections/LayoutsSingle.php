<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound
/**
 * Theme Customizer - Header
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RTFramework\Customize;
use RT\Blenco\Traits\LayoutControlsTraits;

/**
 * Customizer class
 */
class LayoutsSingle extends Customizer {

	use LayoutControlsTraits;
	protected $section_single_layout = 'rt_single_layout_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'    => $this->section_single_layout,
			'title' => __( 'Single Layout', 'blenco' ),
			'panel' => 'rt_layouts_panel',
		] );
		Customize::add_controls( $this->section_single_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'single_post' );
	}

}
