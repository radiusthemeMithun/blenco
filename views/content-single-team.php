<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound, WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blenco
 */

use RT\Blenco\Options\Opt;
use RT\Blenco\Helpers\Fns;

$id                     = get_the_ID();
$rt_team_info_title  	= get_post_meta( $id, 'rt_team_info_title', true );
$rt_team_designation 	= get_post_meta( $id, 'rt_team_designation', true );
$rt_team_phone       	= get_post_meta( $id, 'rt_team_phone', true );
$rt_team_website     	= get_post_meta( $id, 'rt_team_website', true );
$rt_team_email       	= get_post_meta( $id, 'rt_team_email', true );
$rt_team_address     	= get_post_meta( $id, 'rt_team_address', true );
$rt_team_skill_title 	= get_post_meta( $id, 'rt_team_skill_title', true );
$rt_team_skill_info 	= get_post_meta( $id, 'rt_team_skill_info', true );
$rt_team_skill      	= get_post_meta( $id, 'rt_team_skill', true );

$rt_team_personal_title = get_post_meta( $id, 'rt_team_personal_title', true );
$rt_team_personal_content = get_post_meta( $id, 'rt_team_personal_content', true );
$rt_team_personal_list = get_post_meta( $id, 'rt_team_personal_list', true );

$socials        		= (array) get_post_meta( $id, 'rt_team_socials', true );
$socials_fields 		= Fns::get_team_socials();

$rt_team_contact_form 	= get_post_meta( $id, 'rt_team_contact_form', true );

if ( blenco_option( 'rt_team_single_author_order' ) == 'thumb-right') {
	$order = 'order-1';
} else {
	$order = 'order-2';
}


?>




<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-single-item">
		<div class="row g-5 team-single-wrap">
			<div class="col-lg-8 col-12 <?php echo esc_attr( $order ); ?>">
				<div class="team-single-content-wrap">
					<div class="team-single-content">
						<div class="team-single-intro-layout align-items-center">
							<div class="team-single-image <?php blenco_html( blenco_option( 'rt_team_single_author' ), 'allow_title'); ?> ">
								<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' ); } ?>
							</div>
							<div class="content">
								<div class="team-heading">
									<?php if( ! Opt::$breadcrumb_title == 1 ) { ?>
										<h1 class="entry-title"><?php the_title(); ?></h1>
									<?php } ?>
									<span class="designation"><?php echo esc_html( $rt_team_designation ); ?></span>
									<span class="team-shape">
										<?php echo wp_get_attachment_image( blenco_option( 'rt_team_shape_image' ), 'full', true ); ?>
									</span>
								</div>
								<?php the_content(); ?>
								<?php if( blenco_option( 'rt_team_single_info' ) ) { ?>
								<div class="team-info">
									<?php if( $rt_team_info_title ) { ?><h3><?php echo esc_html( $rt_team_info_title ); ?></h3><?php } ?>
									<ul>
										<?php if ( ! empty( $rt_team_phone ) ) { ?>
											<li><i class="icon-rt-phone-2"></i><span class="team-label"><?php esc_html_e( 'Call', 'blenco' ); ?> : </span>
												<a href="tel:<?php echo esc_html( $rt_team_phone ); ?>"><?php echo esc_html( $rt_team_phone ); ?></a>
											</li>
										<?php }
										if ( ! empty( $rt_team_email ) ) { ?>
											<li><i class="icon-rt-email"></i><span class="team-label"><?php esc_html_e( 'E-mail', 'blenco' ); ?> : </span>
												<?php echo esc_html( $rt_team_email ); ?>
											</li>
										<?php }
										if ( ! empty( $rt_team_website ) ) { ?>
											<li><i class="icon-rt-search"></i><span class="team-label"><?php esc_html_e( 'Website', 'blenco' ); ?> : </span>
												<?php echo esc_html( $rt_team_website ); ?>
											</li>
										<?php }
										if ( ! empty( $rt_team_address ) ) { ?>
											<li><i class="icon-rt-location-4"></i><span class="team-label"><?php esc_html_e( 'Location', 'blenco' ); ?> : </span>
												<?php echo esc_html( $rt_team_address ); ?>
											</li>
										<?php } ?>
									</ul>
								</div>
								<?php } ?>
								<?php if ( blenco_option( 'rt_team_single_social' ) && ! empty( $socials ) ) { ?>
									<ul class="team-social-social">
										<?php foreach ( $socials as $key => $value ):
											if(! $value){
												continue;
											}
											?>
											<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="<?php echo esc_attr( $socials_fields[ $key ]['icon'] ); ?>"></i></a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php } ?>
							</div>
						</div>

						<!-- Team info -->

						<div class="team-personal-info-box">
							

							<?php if( $rt_team_personal_title ) { ?><h3><?php echo esc_html( $rt_team_personal_title ); ?></h3><?php } ?>
							<p><?php echo esc_html( $rt_team_personal_content ); ?></p>
							<?php if ( ! empty( $rt_team_personal_list ) && is_array( $rt_team_personal_list ) ) : ?>
								<ul class="info-box-list">
									<?php foreach ( $rt_team_personal_list as $item ) : ?>
										
										<?php if ( ! empty( $item['info_text'] ) ) : ?>
											<li><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M19.9428 7.33556C20.2803 8.59518 19.0204 9.94926 18.8596 11.1655C18.6928 12.4268 19.54 14.0595 18.9147 15.1464C18.2894 16.2334 16.4484 16.3141 15.4396 17.0893C14.4672 17.8391 13.9233 19.6055 12.6643 19.9429C11.4054 20.2802 10.051 19.0196 8.83403 18.8591C7.57279 18.6923 5.94002 19.5394 4.85305 18.9141C3.76609 18.2888 3.68532 16.4479 2.91085 15.4389C2.16092 14.4667 0.394673 13.9234 0.0571579 12.6638C-0.28037 11.4042 0.980371 10.0505 1.14109 8.83424C1.30729 7.5732 0.460077 5.94048 1.08543 4.85354C1.71078 3.7666 3.55172 3.68584 4.56057 2.91073C5.53348 2.16065 6.0768 0.394446 7.33579 0.057115C8.59479 -0.280228 9.94981 0.980128 11.1661 1.14084C12.4274 1.30769 14.0601 0.4605 15.1471 1.08584C16.2341 1.71117 16.3148 3.55206 17.0899 4.56089C17.8364 5.53056 19.6046 6.07334 19.9428 7.33556Z" fill="#B8E900"/>
												<path d="M12.8518 8.18213L8.30635 12.7276L6.24023 10.6615" fill="#B8E900"/>
												<path d="M12.8518 8.18213L8.30635 12.7276L6.24023 10.6615" stroke="#111111" stroke-width="1.36364" stroke-linecap="round" stroke-linejoin="round"/>
												</svg> <?php echo esc_html( $item['info_text'] ); ?></li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
							
						</div>
						
						<?php if ( blenco_option( 'rt_team_single_skill' ) && ! empty( $rt_team_skill ) ) { ?>
							<div class="rt-skill-wrap progress-appear">
								<div class="rt-skills">
									<?php if( $rt_team_skill_title ) { ?><h3><?php echo esc_html( $rt_team_skill_title ); ?></h3><?php } ?>
									<?php echo esc_html( $rt_team_skill_info ); ?>
									<?php foreach ( $rt_team_skill as $skill ): ?>
										<?php
										if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
											continue;
										}
										$skill_value = (int) $skill['skill_value'];
										$skill_style = "";

										if ( ! empty( $skill['skill_color'] ) ) {
											$skill_style .= " background:{$skill['skill_color']};";
										}
										?>
										<div class="rt-skill-each">
											<div class="rt-name"><?php echo esc_html( $skill['skill_name'] ); ?></div>
											<div class="progress">
												<div class="progress-bar skill-per"
													data-per="<?php echo esc_attr( $skill_value ); ?>" style="<?php echo esc_attr( $skill_style ); ?>"></div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12 sidebar-sticky">
				<?php if ( blenco_option( 'rt_team_single_contact' ) ) { ?>
					<div class="team-contact-form">
						<?php if( blenco_option( 'rt_team_contact_title' ) ) { ?><h3><?php blenco_html( blenco_option( 'rt_team_contact_title' ) , 'allow_title' );?></h3><?php } ?>
						<?php echo do_shortcode( $rt_team_contact_form );?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
