<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blenco
 */

$meta_list = blenco_option( 'rt_single_meta', '', true );
$meta      = blenco_option( 'rt_blog_above_meta_visibility' );
$meta      = blenco_option( 'rt_single_above_meta_style' );
if ( blenco_option( 'rt_single_above_meta_visibility' ) ) {
	$category_index = array_search( 'category', $meta_list );
	unset( $meta_list[ $category_index ] );
}
?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( blenco_post_class() ); ?>>
	<div class="single-inner-wrapper">
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
