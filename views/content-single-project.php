<?php
/**
 * The template for displaying all single project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blenco
 */

use RT\Blenco\Options\Opt;

global $post;
$id = get_the_ID();
$rt_project_title 		= get_post_meta( $id, 'rt_project_title', true );
$rt_project_text 		= get_post_meta( $id, 'rt_project_text', true );
$rt_project_client 		= get_post_meta( $id, 'rt_project_client', true );
$rt_project_start 		= get_post_meta( $id, 'rt_project_start', true );
$rt_project_end 		= get_post_meta( $id, 'rt_project_end', true );
$rt_project_weblink 	= get_post_meta( $id, 'rt_project_weblink', true );
$rt_project_location 	= get_post_meta( $id, 'rt_project_location', true );

$project_contact_title 	= get_post_meta( $id, 'project_contact_title', true );
$project_contact_address 	= get_post_meta( $id, 'project_contact_address', true );
$project_contact_phone 	= get_post_meta( $id, 'project_contact_phone', true );
$project_contact_email 	= get_post_meta( $id, 'project_contact_email', true );



$ratting	 	= get_post_meta( $id, 'rt_project_rating', true );
$rt_project_rating = 5- intval( $ratting );

?>
<div id="post-<?php the_ID();?>" <?php post_class( 'project-single' );?>>
	<div class="project-single-item">
		<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-thumbnail-wrap single-post-thumbnail">
					<figure class="post-thumbnail">
						<?php the_post_thumbnail( 'full' ); ?>
					</figure><!-- .post-thumbnail -->
				</div>
			<?php } ?>
		<div class="project-item-wrap">
			
			<div class="project-item-content">
				<div class="project-content">
					<?php if( ! Opt::$breadcrumb_title == 1 ) { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>
					<?php the_content();?>
				</div>
			</div>
			<div class="project-content-info sidebar-sticky">
				<div class="project-information">
					<?php if ( !empty( $rt_project_title ) && blenco_option( 'rt_project_title' )) { ?>
						<div class="rt-section-title style3 has-animation">
							<h2 class="info-title"><?php echo esc_html( $rt_project_title );?><span class="line"></span></h2>
						</div>
					<?php } if ( !empty( $rt_project_text ) && blenco_option( 'rt_project_text' ) ) { ?>
						<p><?php echo esc_html( $rt_project_text );?></p>
					<?php } ?>
					<ul class="info-list">
						<?php if ( blenco_option( 'rt_project_cat' ) ) { ?>
							<li><label><?php esc_html_e( 'Category', 'blenco' );?>: </label>
								<span class="project-cat"><?php
									$i = 1;
									$term_lists = get_the_terms( get_the_ID(), 'rt-project-category' );
									if( $term_lists ) { foreach ( $term_lists as $term_list ){
											$link = get_term_link( $term_list->term_id, 'rt-project-category' ); ?>
											
											<?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } } ?></span>
							</li>
						<?php } ?>
						<?php if ( !empty( $rt_project_client ) && blenco_option( 'rt_project_client' ) ) { ?>
							<li><label><?php esc_html_e( 'Client', 'blenco' );?>: </label><?php echo esc_html( $rt_project_client );?></li>
						<?php } if ( !empty( $rt_project_start ) && blenco_option( 'rt_project_start' ) ) { ?>
							<li><label><?php esc_html_e( 'Start Date​', 'blenco' );?>: </label><?php echo esc_html( $rt_project_start );?></li>
						<?php } if ( !empty( $rt_project_end ) && blenco_option( 'rt_project_end' ) ) { ?>
							<li><label><?php esc_html_e( 'Ends Date', 'blenco' );?>: </label><?php echo esc_html( $rt_project_end );?></li>
						<?php } if ( !empty( $rt_project_location ) && blenco_option( 'rt_project_location' ) ) { ?>
							<li><label><?php esc_html_e( 'Location', 'blenco' );?>: </label><?php echo esc_html( $rt_project_location );?></li><?php }
						 if ( !empty( $rt_project_weblink ) && blenco_option( 'rt_project_weblink' ) ) { ?>
							<li><label><?php esc_html_e( 'Web Link', 'blenco' );?>: </label><?php echo esc_html( $rt_project_weblink );?></li>
						<?php } ?>

						<?php if( blenco_option( 'rt_project_rating' ) ) { ?>
							<?php if( $ratting != -1) { ?>
								<li><label><?php esc_html_e( 'Rating', 'blenco' );?>: </label>
									<ul class="rating">
										<?php for ($i=0; $i < $ratting; $i++) { ?>
											<li class="star-rate"><i class="icon-rt-star" aria-hidden="true"></i></li>
										<?php } ?>
										<?php for ($i=0; $i < $rt_project_rating; $i++) { ?>
											<li><i class="icon-rt-star" aria-hidden="true"></i></li>
										<?php } ?>
									</ul>
								</li>
							<?php } } ?>
					</ul>
				</div>
				<div class="project-contact-box">
					<?php if ( ! empty( $project_contact_title ) ) : ?>
						<h3 class="project-title"><?php echo esc_html( $project_contact_title ); ?></h3>
					<?php endif; ?>

					<?php if ( ! empty( $project_contact_address ) ) : ?>
						<div class="project-contact-item">
							<span class="contact-text"><?php echo esc_html( $project_contact_address ); ?></span>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $project_contact_phone ) ) : ?>
						<div class="project-contact-item">
							<a href="tel:<?php echo esc_attr( preg_replace('/\s+/', '', $project_contact_phone ) ); ?>" class="contact-text phone">
								<?php echo esc_html( $project_contact_phone ); ?>
							</a>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $project_contact_email ) ) : ?>
						<div class="project-contact-item">
							<a href="mailto:<?php echo antispambot( $project_contact_email ); ?>" class="contact-text mail">
								<?php echo antispambot( $project_contact_email ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
