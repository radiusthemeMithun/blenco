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
class LayoutsBlogs extends Customizer {

	use LayoutControlsTraits;

	protected $section_blog_layout = 'rt_blog_layout_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'    => $this->section_blog_layout,
			'title' => __( 'Blog Layout', 'blenco' ),
			'panel' => 'rt_layouts_panel',
		] );
		Customize::add_controls( $this->section_blog_layout, $this->get_controls() );
	}

	public function get_controls() {
		return $this->get_layout_controls( 'blog' );
	}

}
