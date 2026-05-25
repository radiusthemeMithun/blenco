<?php
/**
 * Theme Customizer - Header
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
class BlogSingle extends Customizer {
	protected $section_blog_single = 'rt_blog_single_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog_single,
			'title'       => __( 'Blog Single', 'blenco' ),
			'description' => __( 'Blog Single Section', 'blenco' ),
			'priority'    => 26
		] );

		Customize::add_controls( $this->section_blog_single, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_single_controls', [

			'rt_single_post_style' => [
				'type'    => 'select',
				'label'   => __( 'Post View Style', 'blenco' ),
				'default' => '1',
				'choices' => Fns::single_post_style()
			],

			'rt_single_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Single Meta', 'blenco' ),
				'description' => __( 'You can sort meta by drag and drop', 'blenco' ),
				'placeholder' => __( 'Choose Meta', 'blenco' ),
				'multiselect' => true,
				'default'     => 'author,date,category,comment',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_single_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'blenco' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_single_visibility_heading' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'blenco' ),
			],

			'rt_single_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'blenco' ),
				'default' => 1
			],

			'rt_single_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Above Meta Visibility', 'blenco' ),
			],
			'rt_single_tag_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Tag Visibility', 'blenco' ),
			],
			'rt_single_share_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Share Visibility', 'blenco' ),
			],
			'rt_single_profile_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Author Profile Visibility', 'blenco' ),
			],
			'rt_single_caption_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Caption Visibility', 'blenco' ),
			],
			'rt_single_navigation_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Navigation Visibility', 'blenco' ),
			],
			'rt_post_share' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Share Media', 'blenco' ),
				'description' => __( 'You can sort meta by drag and drop', 'blenco' ),
				'placeholder' => __( 'Choose Media', 'blenco' ),
				'multiselect' => true,
				'default'     => 'facebook,twitter,linkedin',
				'choices'     => Fns::post_share_list(),
				'condition' => [ 'rt_single_share_visibility' ]
			],

			'rt_post_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Single Related Option', 'blenco' ),
			],

			'rt_post_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'blenco' ),
				'default' => 0
			],

			'rt_post_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Post Related Title', 'blenco' ),
				'default' => __( 'Related Post', 'blenco' ),
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'blenco' ),
				'default' => 4,
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'blenco' ),
				'description' => __( 'Post Query Type', 'blenco' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'blenco' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'blenco' ),
					'author' => esc_html__( 'Posts by the same Author', 'blenco' ),
				],
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'blenco' ),
				'description' => __( 'Display Post Order', 'blenco' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'blenco' ),
					'rand' => esc_html__( 'Random Posts', 'blenco' ),
					'modified' => esc_html__( 'Last Modified Posts', 'blenco' ),
					'popular' => esc_html__( 'Most Commented posts', 'blenco' ),
					'views' => esc_html__( 'Most Viewed posts', 'blenco' ),
				],
				'condition' => [ 'rt_post_related' ]
			],

		] );
	}


}
