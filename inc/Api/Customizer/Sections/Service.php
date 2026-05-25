<?php
/**
 * Theme Customizer - Service
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RT\Blenco\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Service extends Customizer {

	protected $section_service = 'rt_service_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_service,
			'title'       => __( 'Service Option', 'blenco' ),
			'description' => __( 'Service Section', 'blenco' ),
			'priority'    => 36
		] );

		Customize::add_controls( $this->section_service, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_service_controls', [

			'rt_service_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Service Archive Option', 'blenco' ),
			],

			'rt_service_style' => [
				'type'        => 'select',
				'label'       => __( 'Service Layout', 'blenco' ),
				'description' => __( 'This service 02 layout only icon show', 'blenco' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Service 01', 'blenco' ),
					'2'    => __( 'Service 02', 'blenco' ),
				]
			],

			'rt_service_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Service Archive Item Limit', 'blenco' ),
				'default' => '8',
			],

			'rt_service_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'blenco' ),
				'default' => 0
			],

			'rt_service_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'blenco' ),
				'default' => '15',
				'condition' => [ 'rt_service_ar_excerpt' ]
			],

			'rt_service_read_more' => [
				'type'    => 'switch',
				'label'   => __( 'Read More Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_service_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'blenco' ),
				'default' => __( 'Our Services', 'blenco' ),
			],

			'rt_service_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'blenco' ),
				'default' => 'service',
			],

			'rt_service_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'blenco' ),
				'default' => 'service-category',
			],

			'rt_service_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Service Single Related Option', 'blenco' ),
			],

			'rt_service_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'blenco' ),
				'default' => 0
			],

			'rt_service_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Service Related Title', 'blenco' ),
				'default' => __( 'Related Service', 'blenco' ),
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'blenco' ),
				'default' => 3,
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'blenco' ),
				'description' => __( 'Service Query Type', 'blenco' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'blenco' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'blenco' ),
					'author' => esc_html__( 'Posts by the same Author', 'blenco' ),
				],
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'blenco' ),
				'description' => __( 'Display Service Order', 'blenco' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'blenco' ),
					'rand' => esc_html__( 'Random Posts', 'blenco' ),
					'modified' => esc_html__( 'Last Modified Posts', 'blenco' ),
					'popular' => esc_html__( 'Most Commented posts', 'blenco' ),
					'views' => esc_html__( 'Most Viewed posts', 'blenco' ),
				],
				'condition' => [ 'rt_service_related' ]
			],

		] );
	}


}
