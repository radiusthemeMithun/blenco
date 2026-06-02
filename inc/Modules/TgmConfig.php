<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.1.0
 */

namespace RT\Blenco\Modules;
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
use RT\Blenco\Traits\SingletonTraits;

require_once get_template_directory() . '/inc/Lib/class-tgm-plugin-activation.php';
class TgmConfig {

	use SingletonTraits;

	public $base;
	public $path;

	public function __construct() {
		$this->base = 'blenco';
		$this->path = get_template_directory() . '/plugin-bundle/';

		add_action( 'tgmpa_register', [ $this, 'register_required_plugins' ] );
	}

	public function register_required_plugins() {
		$plugins = [
			// Bundled
			[
				'name'     => 'Blenco Core',
				'slug'     => 'blenco-core',
				'source'   => 'blenco-core.zip',
				'required' => true,
				'version'  => '1.0.2'
			],
			[
				'name'     => 'RT Framework',
				'slug'     => 'rt-framework',
				'source'   => 'rt-framework.zip',
				'required' => true,
				'version'  => '3.0.4'
			],
			// [
			// 	'name'         => 'ShopBuilder Pro',
			// 	'slug'         => 'shopbuilder-pro',
			// 	'source'       => 'shopbuilder-pro.zip',
			// 	'required'     => true,
			// 	'version'      => '1.11.0'
			// ],

			//Repository
			[
				'name'     => esc_html__('WooCommerce','blenco'),
				'slug'     => 'woocommerce',
				'required' => false,
			],
			[
				'name'     => esc_html__('Breadcrumb NavXT','blenco'),
				'slug'     => 'breadcrumb-navxt',
				'required' => false,
			],
			[
				'name'     => esc_html__('Elementor Page Builder','blenco'),
				'slug'     => 'elementor',
				'required' => false,
			],
			[
				'name'     => esc_html__('WP Fluent Forms','blenco'),
				'slug'     => 'fluentform',
				'required' => false,
			],
			[
				'name'     => esc_html__('Easy Demo Importer','blenco'),
				'slug'     => 'easy-demo-importer',
				'required' => false,
			],
			[
				'name'     => esc_html__('ShopBuilder - Elementor WooCommerce Builder Addons','blenco'),
				'slug'     => 'shopbuilder',
				'required' => false,
			],
		];

		$config = [
			'id'           => $this->base,
			'default_path' => $this->path,
			'menu'         => $this->base . '-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		];

		tgmpa( $plugins, $config );
	}
}
