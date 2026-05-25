<?php

namespace RT\Blenco\Custom;

use RT\Blenco\Helpers\Fns;
use RT\Blenco\Traits\SingletonTraits;
use RT\Blenco\Options\Opt;

/**
 * Extras.
 */
class Hooks {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'meta_css' ] );
		add_action( 'blenco_before_single_content', [ __CLASS__, 'before_single_content' ] );
		add_action( 'wp_head', [ __CLASS__, 'wp_footer_hook' ] );

		add_action('bcn_after_fill', [ __CLASS__, 'blenco_hseparator_breadcrumb_trail' ] );

	}

	public static function wp_footer_hook() {
		?>
		<style>
			.blenco-header-footer .site-header {
				opacity: 1;
			}
		</style>

		<?php
	}

	/**
	 * Single post meta visibility
	 *
	 * @param $screen
	 *
	 * @return void
	 */
	public static function meta_css( $screen ) {
		if ( 'post.php' !== $screen ) {
			return;
		}
		global $typenow;
		$display = 'post' === $typenow ? 'table-row' : 'none';
		?>
		<style>
			.single_post_style {
				display: <?php echo esc_attr($display) ?>;
			}
		</style>
		<?php
	}

	public static function before_single_content() {
		$style = Opt::$single_style;

		if ( in_array( $style, [ '2', '3', '4' ] ) ) {
			$classes = Fns::class_list( [
				'content-top-area',
				( $style == '2' ) ? 'container' : 'rt-container-fluid'
			] );
			?>

			<div class="<?php echo esc_attr( $classes ) ?>">

				<?php blenco_post_single_thumbnail(); ?>

				<?php if ( $style == '3' ) : ?>
					<div class='single-top-header <?php echo esc_attr( blenco_post_class( null ) ) ?>'>
						<div class='container'>
							<div class="row">
								<div class="<?php echo esc_attr( Fns::content_columns() ); ?>">
									<?php blenco_single_entry_header(); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>

			</div>
			<?php
		}

	}
	// Update Breadcrumb Separator

	public static function blenco_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr">
				<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.24746 13.5021L7.33649 9.44139L8.42552 13.5021C8.73846 14.6712 10.2005 15.0618 11.0567 14.2081L14.2086 11.0537C15.0648 10.1975 14.6718 8.7354 13.5026 8.42246L9.44194 7.33343L13.5026 6.2444C14.6718 5.93397 15.0648 4.47192 14.2086 3.61572L11.0542 0.461291C10.198 -0.394911 8.73595 -0.00185919 8.42301 1.16728L7.33399 5.22798L6.24496 1.16728C5.93452 -0.00185932 4.47247 -0.394911 3.61627 0.46129L0.461843 3.61572C-0.394358 4.47192 -0.00130679 5.93397 1.16783 6.24691L5.22853 7.33594L1.16783 8.42496C-0.00130692 8.7379 -0.391855 10.2 0.461843 11.0562L3.61627 14.2106C4.47247 15.0668 5.93452 14.6737 6.24746 13.5046L6.24746 13.5021Z" fill="#D9D9D9"/>
				</svg>
		</span>';
		return $object;
	}

}
