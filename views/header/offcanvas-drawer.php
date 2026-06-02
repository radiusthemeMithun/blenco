<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Template part for displaying header offcanvas
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blenco
 */
use RT\Blenco\Options\Opt;
use RT\Blenco\Helpers\Fns;
$logo_h1 = ! is_singular( [ 'post' ] );
$topinfo = ( blenco_option( 'rt_contact_address' ) || blenco_option( 'rt_phone' ) || blenco_option( 'rt_email' ) || blenco_option( 'rt_email' ) ) ? true : false;
?>


<div class="blenco-offcanvas-drawer">
	<div class="offcanvas-logo">
		<?php echo blenco_site_logo( $logo_h1 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- blenco_site_logo() returns markup built from wp_get_attachment_image() and esc_html(). ?>
		<a class="trigger-icon trigger-off-canvas" href="#">×</a>
	</div>
	<?php if( blenco_option( 'rt_about_label' ) || blenco_option( 'rt_about_text' ) ) { ?>
	<div class="offcanvas-about offcanvas-address">
		<?php if( blenco_option( 'rt_about_label' ) ) { ?><label><?php echo esc_html( blenco_option( 'rt_about_label' ) ); ?></label><?php } ?>
		<?php if( blenco_option( 'rt_about_text' ) ) { ?><p><?php blenco_html( blenco_option( 'rt_about_text' ), false ); ?></p><?php } ?>
	</div>
	<?php } ?>
	<nav class="offcanvas-navigation" role="navigation">
		<?php
		if ( has_nav_menu( 'primary' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'walker'         => new RT\Blenco\Core\WalkerNav(),
				)
			);
		endif;
		?>
	</nav><!-- .blenco-navigation -->

	<div class="offcanvas-address">
		<?php if( $topinfo ) { ?>
			<?php if( blenco_option( 'rt_contact_info_label' ) ) { ?><label><?php echo esc_html( blenco_option( 'rt_contact_info_label' ) ); ?></label><?php } ?>
			<ul class="offcanvas-info">
				<?php if( blenco_option( 'rt_contact_address' ) ) { ?>
					<li><i class="icon-rt-location-4"></i><?php blenco_html( blenco_option( 'rt_contact_address' ) , false );?> </li>
				<?php } if( blenco_option( 'rt_phone' ) ) { ?>
					<li><i class="icon-rt-phone-2"></i><a href="tel:<?php echo esc_attr( blenco_option( 'rt_phone' ) );?>"><?php blenco_html( blenco_option( 'rt_phone' ) , false );?></a> </li>
				<?php } if( blenco_option( 'rt_email' ) ) { ?>
					<li><i class="icon-rt-email"></i><a href="mailto:<?php echo esc_attr( blenco_option( 'rt_email' ) );?>"><?php blenco_html( blenco_option( 'rt_email' ) , false );?></a> </li>
				<?php } if( blenco_option( 'rt_website' ) ) { ?>
					<li><i class="icon-rt-development-service"></i><?php blenco_html( blenco_option( 'rt_website' ) , false );?></li>
				<?php } ?>
			</ul>
		<?php } ?>

		<?php if( blenco_option( 'rt_offcanvas_social' ) ) { ?>
			<div class="offcanvas-social-icon">
				<?php blenco_get_social_html( '#555' ); ?>
			</div>
		<?php } ?>
	</div>

</div><!-- .container -->

<div class="blenco-body-overlay"></div>
