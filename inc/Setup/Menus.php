<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound
namespace RT\Blenco\Setup;
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use RT\Blenco\Traits\SingletonTraits;

/**
 * Menus
 */
class Menus {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'menus' ] );
	}

	public function menus() {
		/*
			Register all your menus here
		*/
		register_nav_menus( [
			'primary' => esc_html__( 'Primary', 'blenco' ),
		] );
	}
}
