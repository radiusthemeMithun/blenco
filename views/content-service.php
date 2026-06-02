<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Template part for displaying service
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package blenco
 */

$id = get_the_ID();
$rt_service_icon= get_post_meta( $id, 'rt_service_icon', true );
$icon_class 			= '' ;
if ( !empty( $rt_service_icon ) ) {
	$icon_class 		= 'service-item-icon';
} else {
	$icon_class 		= 'service-item-image';
}

$service_icon_bg    = get_post_meta( $id, 'rt_service_color', true );
$service_bg = "";
if( !empty( $service_icon_bg ) ) {
	$service_bg = 'style="color: ' . $service_icon_bg . '"';
}

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), blenco_option( 'rt_service_excerpt_limit' ), '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="service-item <?php echo esc_attr( $icon_class ); ?>">
		<div class="service-thumbs">
			<?php blenco_post_thumbnail('medium'); ?>
		</div>
		<div class="service-content">
			<div class="service-info">
				<div class="content">
						<?php if (!empty( $rt_service_icon )  ) { ?>
						<div class="service-icon">
							<i <?php echo wp_specialchars_decode( esc_attr( $service_bg ), ENT_COMPAT ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is passed through esc_attr() first; decode restores quotes that terminate the inline attribute. ?> class="<?php blenco_html( $rt_service_icon , false );?>"></i>
						</div>
					<?php } else  {
						blenco_post_thumbnail('full');
					} ?>
					<h2 class="service-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				</div>
				<?php if ( blenco_option( 'rt_service_ar_excerpt' ) ) { ?>
					<p><?php blenco_html( $content , false ); ?></p>
				<?php } if ( blenco_option( 'rt_service_read_more' ) ) { ?>
					<div class="rt-button">
						<a class="btn" href="<?php the_permalink();?>">
							<span class="btn-icon">
								<i class="icon-rt-arrow-right-1"></i>
							</span>
							<span class="btn-text">
								<?php esc_html_e('Read More' , 'blenco' ); ?>
							</span>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</article>
