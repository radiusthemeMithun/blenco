<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package blenco
 */

get_header();

?>

<div id="primary" class="content-area">
	<div class="container">
		<main id="main" class="site-main error-404" role="main">
			<?php
			if ( ! empty( blenco_option( 'rt_error_image' ) ) ) {
				echo wp_get_attachment_image( blenco_option( 'rt_error_image' ), 'full', true );
			} else {
				blenco_get_img( '404.png', true, 'width="1007" height="530"' ) . "' alt='";
			}
			?>

			<div class="error-info">
				<h2 class="error-title"><?php blenco_html( blenco_option( 'rt_error_heading' ), 'allow_title' ); ?></h2>
				<p><?php blenco_html( blenco_option( 'rt_error_text' ), 'allow_title' ); ?></p>
				<div class="rt-button">
					<a class="btn" href="<?php echo esc_url( home_url() ) ?>">
						<span class="btn-icon">
							<i class="icon-rt-right-arrow"></i>
						</span>
						<span class="btn-text">
							<?php blenco_html( blenco_option( 'rt_error_button_text' ), 'allow_title' ); ?>
						</span>
					</a>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- container - -->
</div><!-- #primary -->

<?php
get_footer();
