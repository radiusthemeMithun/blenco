<?php
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
class LayoutsPage extends Customizer {

	use LayoutControlsTraits;

	protected $section_page_layout = 'rt_page_layout_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'    => $this->section_page_layout,
			'title' => __( 'Page Layout', 'blenco' ),
			'panel' => 'rt_layouts_panel',
		] );

		Customize::add_controls( $this->section_page_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'page' );
	}

}
