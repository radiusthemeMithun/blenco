<?php
/**
 * Build Gutenberg Blocks
 *
 * @package blenco
 */

namespace RT\Blenco\Api;

use RT\Blenco\Traits\SingletonTraits;

/**
 * Customizer class
 */
class Gutenberg {
	use SingletonTraits;

	/**
	 * Register default hooks and actions for WordPress
	 *
	 * @return WordPress add_action()
	 */
	public function __construct() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		add_action( 'init', [ $this, 'gutenberg_init' ] );

	}

	/**
	 * Custom Gutenberg settings
	 * @return
	 */
	public function gutenberg_init() {
		add_theme_support( 'gutenberg', [
			// Theme supports responsive video embeds
			'responsive-embeds' => true,
			// Theme supports wide images, galleries and videos.
			'wide-images'       => true,
		] );

		add_theme_support( 'editor-color-palette', [
			[
				'name' => esc_html__( 'Primary Color', 'blenco' ),
				'slug' => 'blenco-primary',
				'color' => '#006D5B',
			],
			[
				'name' => esc_html__( 'Secondary Color', 'blenco' ),
				'slug' => 'blenco-secondary',
				'color' => '#00473b',
			],
			[
				'name' => esc_html__( 'Yellow Color', 'blenco' ),
				'slug' => 'blenco-yellow',
				'color' => '#ffb000',
			],
			[
				'name' => esc_html__( 'Dark gray', 'blenco' ),
				'slug' => 'blenco-dark-gray',
				'color' => '#edf5f4',
			],
			[
				'name' => esc_html__( 'light gray', 'blenco' ),
				'slug' => 'blenco-light-gray',
				'color' => '#f1f1f1',
			],
			[
				'name' => esc_html__( 'white', 'blenco' ),
				'slug' => 'blenco-white',
				'color' => '#ffffff',
			],
		] );

		add_theme_support( 'editor-font-sizes', [
			[
				'name' => esc_html__( 'Small', 'blenco' ),
				'size' => 16,
				'slug' => 'small'
			],
			[
				'name' => esc_html__( 'Normal', 'blenco' ),
				'size' => 24,
				'slug' => 'normal'
			],
			[
				'name' => esc_html__( 'Large', 'blenco' ),
				'size' => 36,
				'slug' => 'large'
			],
			[
				'name' => esc_html__( 'Huge', 'blenco' ),
				'size' => 44,
				'slug' => 'huge'
			]
		] );
	}
}
