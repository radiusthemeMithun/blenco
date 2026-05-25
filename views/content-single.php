<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blenco
 */

use RT\Blenco\Options\Opt;

?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( blenco_post_class() ); ?>>
	<div class="single-inner-wrapper">
		<?php if ( ! in_array( Opt::$single_style, [ '2', '3', '4', '5' ] ) ) : ?>
			<?php blenco_post_single_thumbnail(); ?>
		<?php endif; ?>
		<div class="entry-wrapper">
			<?php blenco_single_entry_header(); ?>
				<div class="entry-content">
					<?php blenco_entry_content() ?>
				</div>
			<?php blenco_post_single_video(); ?>
			<?php blenco_entry_footer(); ?>
			<?php blenco_entry_profile(); ?>
		</div>
	</div>
</article>
