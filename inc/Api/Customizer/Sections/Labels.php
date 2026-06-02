<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
/**
 * Theme Customizer - Header
 *
 * @package blenco
 */

namespace RT\Blenco\Api\Customizer\Sections;

use RT\Blenco\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Labels extends Customizer {
	protected $section_labels = 'rt_labels_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Modify Static Text', 'blenco' ),
			'description' => __( 'You can change all static text of the theme.', 'blenco' ),
			'priority'    => 999
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_labels_controls', [

			'rt_header_labels' => [
				'type'  => 'heading',
				'label' => __( 'Header Labels', 'blenco' ),
			],

			'rt_get_menu_label' => [
				'type'        => 'text',
				'label'       => __( 'Menu Text', 'blenco' ),
				'description' => __( 'Content: Menu Button', 'blenco' ),
			],

			'rt_get_login_label' => [
				'type'        => 'text',
				'label'       => __( 'Log In', 'blenco' ),
				'default'     => __( 'Log In', 'blenco' ),
				'description' => __( 'Content: SignIn Button', 'blenco' ),
			],

			'rt_get_started_label' => [
				'type'        => 'text',
				'label'       => __( 'Get Started', 'blenco' ),
				'default'     => __( 'Get Started', 'blenco' ),
				'description' => __( 'Content: Get Started', 'blenco' ),
				'condition' => [ 'rt_get_started_button' ],
			],

			'rt_contact_info_label' => [
				'type'        => 'text',
				'label'       => __( 'Contact Info', 'blenco' ),
				'default'     => __( 'Contact Info', 'blenco' ),
				'description' => __( 'Content: Contact Info', 'blenco' ),
			],

			'rt_follow_us_label' => [
				'type'        => 'text',
				'label'       => __( 'Follow Us On', 'blenco' ),
				'default'     => __( 'Follow Us On', 'blenco' ),
				'description' => __( 'Content: Follow Us On', 'blenco' ),
			],

			'rt_about_label' => [
				'type'        => 'text',
				'label'       => __( 'About Us', 'blenco' ),
				'description' => __( 'Content: About Us', 'blenco' ),
			],

			'rt_about_text' => [
				'type'        => 'textarea',
				'label'       => __( 'About Text', 'blenco' ),
				'description' => __( 'Enter about text here.', 'blenco' ),
			],

			'rt_footer_labels' => [
				'type'  => 'heading',
				'label' => __( 'Footer Labels', 'blenco' ),
			],

			'rt_ready_label' => [
				'type'        => 'text',
				'label'       => __( 'Are You Ready', 'blenco' ),
				'default'     => __( 'ARE YOU READY TO GET STARTED?', 'blenco' ),
				'description' => __( 'Content: Footer Are You Ready', 'blenco' ),
			],

			'rt_contact_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Contact Us', 'blenco' ),
				'default'     => __( 'Contact Us', 'blenco' ),
				'description' => __( 'Content: Footer contact button', 'blenco' ),
			],

			'rt_blog_labels' => [
				'type'  => 'heading',
				'label' => __( 'Blog Labels', 'blenco' ),
			],
			'rt_author_prefix' => [
				'type'        => 'text',
				'label'       => __( 'By', 'blenco' ),
				'default'     => 'by',
				'description' => __( 'Content: Meta Author Prefix', 'blenco' ),
			],
			'rt_tags'         => [
				'type'        => 'text',
				'label'       => __( 'Tags:', 'blenco' ),
				'default'     => __( 'Tags:', 'blenco' ),
				'description' => __( 'Content: Single blog footer tags label', 'blenco' ),
			],
			'rt_social' => [
				'type'        => 'text',
				'label'       => __( 'Socials:', 'blenco' ),
				'default'     => __( 'Socials:', 'blenco' ),
				'description' => __( 'Content: Single blog footer Socials label', 'blenco' ),
			],
			'rt_blog_read_more' => [
				'type'        => 'text',
				'label'       => __( 'Blog Read More:', 'blenco' ),
				'default'     => __( 'Continue Reading', 'blenco' ),
				'description' => __( 'Content: Single blog footer read more text', 'blenco' ),
			],

		] );
	}


}
