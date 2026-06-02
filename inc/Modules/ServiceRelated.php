<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
/**
 * Template part for single service related
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blenco
 */

namespace RT\Blenco\Modules;

class ServiceRelated {
	public static function rt_service_related() {
		$post_id = get_the_id();
		$current_post = array( $post_id );
		$related_item_number = blenco_option( 'rt_service_related_limit' );

		$icon_class 			= '' ;
		if ( !empty( $rt_service_icon ) ) {
			$icon_class 		= 'service-item-icon';
		} else {
			$icon_class 		= 'service-item-image';
		}

		# Making ready to the Query ...
		$query_type = blenco_option( 'rt_service_related_query' );

		$args = array(
			'post_type'				 => 'rt-service',
			// phpcs:ignore WordPressVIPMinimum.Performance.WPQueryParams.PostNotIn_post__not_in -- Required to exclude the current service from related items; bounded to a single ID.
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_item_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( blenco_option( 'rt_service_related_sort' ) ){

			$post_order = blenco_option( 'rt_service_related_sort' );

			if( $post_order == 'rand' ){
				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){
				$args['orderby']  = 'meta_value_num';
			}
			elseif( $post_order == 'popular' ){
				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){
				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){
				$args['orderby'] = '';
				$args['order']   = '';
			}
		}

		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}
				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else {
			$terms = get_the_terms( $post_id, 'rt-service-category' );
			if ( $terms && ! is_wp_error( $terms ) ) {
				$port_cat_links = array();
				foreach ( $terms as $term ) {
					$port_cat_links[] = $term->term_id;
				}
				// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Required to filter related services by shared category.
				$args['tax_query'] = array (
					array (
						'taxonomy' => 'rt-service-category',
						'field'    => 'ID',
						'terms'    => $port_cat_links,
					)
				);
			}
		}

		# Get the posts ----------
		$related_query = new \WP_Query( $args );
		if( $related_query->have_posts() && blenco_option( 'rt_service_related' ) ) { ?>
			<div class="rt-service-default rt-service-multi-layout-1 rt-related-service">
				<div class="container">
					<h2 class="related-title"><?php blenco_html( blenco_option( 'rt_service_related_title' ) , 'allow_title' );?></h2>
					<div class="row g-4 rt-masonry-grid">
						<?php while ( $related_query->have_posts() ) {
						$related_query->the_post();

						$content = get_the_content();
						$content = apply_filters( 'the_content', $content );
						$content = wp_trim_words( get_the_excerpt(), blenco_option( 'rt_service_excerpt_limit' ), '' );

						$id = get_the_ID();
						$rt_service_icon= get_post_meta( $id, 'rt_service_icon', true );

						$service_icon_bg    = get_post_meta( $id, 'rt_service_color', true );
						$service_bg = "";
						if( !empty( $service_icon_bg ) ) {
							$service_bg = 'style="color: ' . $service_icon_bg . '"';
						}

						?>
						<div class="col-sm-6 rt-grid-item">
							<article id="post-<?php the_ID(); ?>">
								<div class="service-item <?php echo esc_attr( $icon_class ); ?>">
									<div class="service-thumbs">
										<?php blenco_post_thumbnail('medium'); ?>
									</div>
									<div class="service-thumbs">
										<?php if (!empty( $rt_service_icon )  ) { ?>
											<div class="service-icon">
												<i <?php echo wp_specialchars_decode( esc_attr( $service_bg ), ENT_COMPAT ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Value is passed through esc_attr() first; decode restores quotes that terminate the inline attribute. ?> class="<?php blenco_html( $rt_service_icon , false );?>"></i>
											</div>
										<?php } else  {
											blenco_post_thumbnail('full');
										} ?>
									</div>
									<div class="service-content">
										<div class="service-info">
											<h2 class="service-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
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
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		<?php }
		wp_reset_postdata();
	}
}
?>
