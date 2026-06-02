<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blenco
 */

?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( blenco_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<?php blenco_single_entry_header(); ?>
		<?php blenco_post_single_thumbnail(); ?>
		<div class="entry-wrapper">
				<div class="entry-content">
					<?php blenco_entry_content() ?>
				</div>
			<?php blenco_post_single_video(); ?>
			<?php blenco_entry_footer(); ?>
			<?php blenco_entry_profile(); ?>
		</div>
	</div>
</article>
