<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound
namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RTFramework\Customize;
/**
 * Customizer class
 */
class WooArchiveSettings extends Customizer {
	protected $section_wooarchive_settins = 'blenco_woo_archive_settings';
	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_wooarchive_settins,
			'title'       => __( 'Woocommerce Settings', 'blenco' ),
			'description' => __( 'blenco Woocommerce Archive Settings', 'blenco' ),
			'priority'    => 1,
			'panel' => 'woocommerce',
		] );

		Customize::add_controls( $this->section_wooarchive_settins, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'blenco_service_controls', [

			'rt_woo_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Woocommerce Archive Option', 'blenco' ),
			],

			'products_cols_width' => [
				'type'    => 'number',
				'label'   => __( 'Products Per Column', 'blenco' ),
				'description' => __('Use product per col default 4', 'blenco'),
				'default' => '4',
			],

			'products_per_page' => [
				'type'    => 'number',
				'label'   => __( 'Number of items per page', 'blenco' ),
				'description' => __( 'Effect only for Shop custom page template', 'blenco' ),
				'default' => '12',
			],

			'wc_woo_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category', 'blenco' ),
				'default' => 1
			],

			'wc_woo_cart' => [
				'type'    => 'switch',
				'label'   => __( 'Cart', 'blenco' ),
				'default' => 0
			],

			'wc_shop_quickview_icon' => [
				'type'    => 'switch',
				'label'   => __( 'QuickView', 'blenco' ),
				'default' => 0
			],

			'wc_shop_compare_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Compare', 'blenco' ),
				'default' => 0
			],

			'wc_shop_wishlist_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Wishlist', 'blenco' ),
				'default' => 0
			],

			'wc_shop_qcheckout_icon' => [
				'type'    => 'switch',
				'label'   => __( 'Quick Checkout', 'blenco' ),
				'default' => 0
			],

			'wc_shop_rating' => [
				'type'    => 'switch',
				'label'   => __( 'Rating', 'blenco' ),
				'default' => 1
			],

			'rt_woo_variation_attr' => [
				'type'    => 'switch',
				'label'   => __( 'Variation Attribute', 'blenco' ),
				'default' => 0
			],

			'wc_shop_sale_flash' => [
				'type'    => 'switch',
				'label'   => __( 'Sale Flash', 'blenco' ),
				'default' => 1
			],

			'wc_sale_label' => [
				'type'    => 'select',
				'default' => 'text',
				'label'   => __( 'Sale Product Label', 'blenco' ),
				'condition' => [ 'wc_shop_sale_flash' ],
				'choices' => [
					'percentage'       => __( 'Percentage', 'blenco' ),
					'text'       => __( 'Text', 'blenco' ),
				],
			],

			'rt_shop_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Shop Banner Title', 'blenco' ),
				'default' => __( 'Shop Page', 'blenco' ),
			],

		] );
	}
}
