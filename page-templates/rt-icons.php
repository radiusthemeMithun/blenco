<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Template Name: RT Icons
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package blenco
 */

get_header(); ?>
	<div class="container">
		<div class="row pt-50 pb-50 d-flex gap-15">
			<?php
			// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- blenco_get_svg() returns trusted theme-bundled SVG markup.
			echo blenco_get_svg( 'search' );
			echo blenco_get_svg( 'facebook' );
			echo blenco_get_svg( 'twitter' );
			echo blenco_get_svg( 'linkedin' );
			echo blenco_get_svg( 'instagram' );
			echo blenco_get_svg( 'pinterest' );
			echo blenco_get_svg( 'tiktok' );
			echo blenco_get_svg( 'youtube' );
			echo blenco_get_svg( 'snapchat' );
			echo blenco_get_svg( 'whatsapp' );
			echo blenco_get_svg( 'reddit' );
			// phpcs:enable WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	</div>
<?php
get_footer();
