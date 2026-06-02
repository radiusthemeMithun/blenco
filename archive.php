<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blenco
 */

use RT\Blenco\Helpers\Fns;
use RT\Blenco\Modules\Pagination;

get_header();
$content_columns = Fns::content_columns();

?>
	<div id="primary" class="content-area">
		<div class="container">
			<div class="row align-stretch">
				<div class="<?php echo esc_attr( $content_columns ); ?>">
					<main id="main" class="site-main" role="main">
						<div class="row <?php echo esc_attr( blenco_option( 'rt_blog_column_gap' ) ); ?> rt-masonry-grid">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									get_template_part( 'views/content', blenco_option( 'rt_blog_style' ) );
								endwhile;
							else :
								get_template_part( 'views/content', 'none' );
							endif;
							?>
						</div>
						<?php Pagination::pagination(); ?>
					</main><!-- #main -->
				</div><!-- .col- -->
				<?php get_sidebar(); ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #primary -->
<?php
get_footer();
