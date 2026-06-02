<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Template part for displaying footer
 *
 * @package blenco
 */

$footer_width      = 'container' . blenco_option( 'rt_footer_width' );
$copyright_center  = blenco_option( 'rt_social_footer' ) ? 'justify-content-between' : 'justify-content-center';
?>

<?php if ( is_active_sidebar( 'rt-footer-sidebar' ) ) : ?>
	<div class="footer-widgets-wrapper">
		<div class="footer-container <?php echo esc_attr( $footer_width ); ?>">
			<div class="footer-widgets row">
				<?php dynamic_sidebar( 'rt-footer-sidebar' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if ( ! empty( blenco_option( 'rt_footer_copyright' ) ) ) : ?>
	<div class="footer-copyright-wrapper text-center">
		<div class="footer-container <?php echo esc_attr( $footer_width ); ?>">
			<div class="rt-footer-copyright <?php echo esc_attr( $copyright_center ); ?>">

				<?php
				$enable_links = get_theme_mod( 'rt_footer_links_enable', false );
				$links        = get_theme_mod( 'rt_footer_links', '' );

				if ( $enable_links && ! empty( $links ) ) :
					$link_lines = preg_split( "/\r\n|\n|\r/", $links );
					?>
					<ul class="rt-copyright-links">
						<?php
						foreach ( $link_lines as $line ) :
							$line = trim( $line );
							if ( empty( $line ) ) {
								continue;
							}

							if ( strpos( $line, '|' ) !== false ) {
								list( $label, $url ) = explode( '|', $line, 2 );
								$label = trim( $label );
								$url   = trim( $url );
							} else {
								$label = $line;
								$url   = '#';
							}

							printf(
								'<li><a href="%1$s" target="_blank" rel="noopener">%2$s</a></li>',
								esc_url( $url ),
								esc_html( $label )
							);
						endforeach;
						?>
					</ul>
				<?php endif; ?>

				<div class="copyright-text">
					<?php
					$copy_text = blenco_option( 'rt_footer_copyright' );
					$copy_text = str_replace( '[y]', gmdate( 'Y' ), $copy_text );
					blenco_html( wp_kses_post( $copy_text ) );
					?>
				</div>

				<?php if ( blenco_option( 'rt_social_footer' ) ) : ?>
					<div class="social-icon d-flex gap-20 align-items-center">
						<div class="social-icon d-flex column-gap-20">
							<?php if ( blenco_option( 'rt_follow_us_label' ) ) : ?>
								<label><?php echo esc_html( blenco_option( 'rt_follow_us_label' ) ); ?></label>
							<?php endif; ?>

							<?php blenco_get_social_html( '#555' ); ?>
						</div>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php endif; ?>
