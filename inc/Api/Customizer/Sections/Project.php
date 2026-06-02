<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
/**
 * Theme Customizer - Project
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Project extends Customizer {

	protected $section_project = 'rt_project_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_project,
			'title'       => __( 'Project Option', 'blenco' ),
			'description' => __( 'Project Section', 'blenco' ),
			'priority'    => 37
		] );

		Customize::add_controls( $this->section_project, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_project_controls', [

			'rt_project_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Archive Option', 'blenco' ),
			],

			'rt_project_style' => [
				'type'        => 'select',
				'label'       => __( 'Project Layout', 'blenco' ),
				'description' => __( 'This option works only for project layout', 'blenco' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Project 01', 'blenco' ),
					'2'    => __( 'Project 02', 'blenco' ),
				]
			],

			'rt_project_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Archive Item Limit', 'blenco' ),
				'default' => '6',
			],

			'rt_project_filter' => [
				'type'        => 'select',
				'label'       => __( 'Image Filter', 'blenco' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default', 'blenco' ),
					'grayscale'    => __( 'Grayscale', 'blenco' ),
				]
			],

			'rt_project_ar_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category Visibility', 'blenco' ),
				'default' => 1
			],
			'rt_project_ar_date' => [
				'type'    => 'switch',
				'label'   => __( 'Date Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_ar_button' => [
				'type'    => 'switch',
				'label'   => __( 'Button Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'blenco' ),
				'default' => 0
			],

			'rt_project_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'blenco' ),
				'default' => '12',
				'condition' => [ 'rt_project_ar_excerpt' ]
			],

			'rt_project_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'blenco' ),
				'default' => __( 'Our Projects', 'blenco' ),
			],

			'rt_project_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'blenco' ),
				'default' => 'project',
			],

			'rt_project_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'blenco' ),
				'default' => 'project-category',
			],

			'rt_project_single_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Single Option', 'blenco' ),
			],

			'rt_project_title' => [
				'type'    => 'switch',
				'label'   => __( 'Info Title Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_text' => [
				'type'    => 'switch',
				'label'   => __( 'Text Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_client' => [
				'type'    => 'switch',
				'label'   => __( 'Client Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_start' => [
				'type'    => 'switch',
				'label'   => __( 'Start Time Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_end' => [
				'type'    => 'switch',
				'label'   => __( 'End Time Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_weblink' => [
				'type'    => 'switch',
				'label'   => __( 'Weblink Visibility', 'blenco' ),
				'default' => 1
			],
			'rt_project_location' => [
				'type'    => 'switch',
				'label'   => __( 'Location Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_project_rating' => [
				'type'    => 'switch',
				'label'   => __( 'Rating Visibility', 'blenco' ),
				'default' => 0
			],

			'rt_project_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Single Related Option', 'blenco' ),
			],

			'rt_project_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'blenco' ),
				'default' => 0
			],

			'rt_project_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Project Related Title', 'blenco' ),
				'default' => __( 'Related Projects', 'blenco' ),
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'blenco' ),
				'default' => 3,
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_title_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Title Limit', 'blenco' ),
				'default' => 5,
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'blenco' ),
				'description' => __( 'Project Query Type', 'blenco' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'blenco' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'blenco' ),
					'author' => esc_html__( 'Posts by the same Author', 'blenco' ),
				],
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'blenco' ),
				'description' => __( 'Display Project Order', 'blenco' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'blenco' ),
					'rand' => esc_html__( 'Random Posts', 'blenco' ),
					'modified' => esc_html__( 'Last Modified Posts', 'blenco' ),
					'popular' => esc_html__( 'Most Commented posts', 'blenco' ),
					'views' => esc_html__( 'Most Viewed posts', 'blenco' ),
				],
				'condition' => [ 'rt_project_related' ]
			],

		] );
	}


}
