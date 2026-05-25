<?php
/**
 * Theme Customizer - Team
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
class Team extends Customizer {

	protected $section_team = 'rt_team_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_team,
			'title'       => __( 'Team Option', 'blenco' ),
			'description' => __( 'Team Section', 'blenco' ),
			'priority'    => 35
		] );

		Customize::add_controls( $this->section_team, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_team_controls', [

			'rt_team_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Archive Option', 'blenco' ),
			],

			'rt_team_style' => [
				'type'        => 'select',
				'label'       => __( 'Team Layout', 'blenco' ),
				'description' => __( 'This option works only for team layout', 'blenco' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Team 01', 'blenco' ),
					'2'    => __( 'Team 02', 'blenco' ),
				]
			],

			'rt_team_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Team Archive Item Limit', 'blenco' ),
				'default' => '8',
			],

			'rt_team_ar_designation' => [
				'type'    => 'switch',
				'label'   => __( 'Designation Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_team_ar_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_team_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'blenco' ),
				'default' => 0
			],
			'rt_team_shape_svg' => [
				'type'    => 'switch',
				'label'   => __( 'Shape Visibility', 'blenco' ),
				'default' => 1
			],
			'rt_team_shape_image' => [
				'type'         => 'image',
				'label'        => __( 'Line Image', 'blenco' ),
				'description'  => __( 'Upload image', 'blenco' ),
				'default'     => '',
			],

			'rt_team_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'blenco' ),
				'default' => '12',
				'condition' => [ 'rt_team_ar_excerpt' ]
			],

			'rt_team_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'blenco' ),
				'default' => __( 'Our Teams', 'blenco' ),
			],

			'rt_team_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'blenco' ),
				'default' => __( 'team', 'blenco' ),
			],

			'rt_team_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'blenco' ),
				'default' => 'team-category',
			],

			'rt_team_single_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Single Option', 'blenco' ),
			],

			'rt_team_single_author' => [
				'type'        => 'select',
				'label'       => __( 'Team Author Layout', 'blenco' ),
				'default'     => 'team-thumb-square',
				'choices'     => [
					'team-thumb-square'    => __( 'Thumb Square', 'blenco' ),
					'team-thumb-round'    => __( 'Thumb Round', 'blenco' ),
				]
			],

			'rt_team_single_author_order' => [
				'type'        => 'select',
				'label'       => __( 'Team Author Order', 'blenco' ),
				'default'     => 'thumb-left',
				'choices'     => [
					'thumb-left'    => __( 'Thumb Left', 'blenco' ),
					'thumb-right'    => __( 'Thumb Right', 'blenco' ),
				]
			],

			'rt_team_single_info' => [
				'type'    => 'switch',
				'label'   => __( 'Info Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_team_single_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_team_single_skill' => [
				'type'    => 'switch',
				'label'   => __( 'Skill Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_team_single_contact' => [
				'type'    => 'switch',
				'label'   => __( 'Contact Visibility', 'blenco' ),
				'default' => 0
			],

			'rt_team_contact_title' => [
				'type'    => 'text',
				'label'   => __( 'Team Contact Title', 'blenco' ),
				'default' => __( 'Team Contact', 'blenco' ),
				'condition' => [ 'rt_team_single_contact' ]
			],

			'rt_team_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Single Related Option', 'blenco' ),
			],

			'rt_team_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'blenco' ),
				'default' => 0
			],

			'rt_team_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Team Related Title', 'blenco' ),
				'default' => __( 'Related Team', 'blenco' ),
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'blenco' ),
				'default' => 4,
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'blenco' ),
				'description' => __( 'Team Query Type', 'blenco' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'blenco' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'blenco' ),
					'author' => esc_html__( 'Posts by the same Author', 'blenco' ),
				],
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'blenco' ),
				'description' => __( 'Display Team Order', 'blenco' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'blenco' ),
					'rand' => esc_html__( 'Random Posts', 'blenco' ),
					'modified' => esc_html__( 'Last Modified Posts', 'blenco' ),
					'popular' => esc_html__( 'Most Commented posts', 'blenco' ),
					'views' => esc_html__( 'Most Viewed posts', 'blenco' ),
				],
				'condition' => [ 'rt_team_related' ]
			],

		] );
	}


}
