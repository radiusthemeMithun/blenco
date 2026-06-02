<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Template part for displaying header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blenco
 */

use RT\Blenco\Options\Opt;

if(! Opt::$has_top_bar ) {
	return;
}
$topinfo = ( blenco_option( 'rt_contact_address' ) || blenco_option( 'rt_phone' ) || blenco_option( 'rt_email' ) || blenco_option( 'rt_website' ) ) ? true : false;
$_fullwidth = Opt::$header_width == 'full' ? '-fluid' : '';
?>

<div class="blenco-topbar">
	<div class="topbar-container rt-container<?php echo esc_attr($_fullwidth) ?>">
		<div class="topbar-row d-flex flex-wrap column-gap-30 align-items-center">
			<?php if( $topinfo ) { ?>
			<div class="topbar-left d-flex flex-wrap column-gap-30 align-items-center">
				<?php if( blenco_option( 'rt_topbar_address' ) && blenco_option( 'rt_contact_address' )  ) { ?>
					<span><i class="icon-rt-location-4"></i><?php blenco_html( blenco_option( 'rt_contact_address' ) , false );?></span>
				<?php } if( blenco_option( 'rt_topbar_phone' ) && blenco_option( 'rt_phone' ) ) { ?>
					<span><i class="icon-rt-phone-2"></i><a href="tel:<?php echo esc_attr( blenco_option( 'rt_phone' ) );?>"><?php blenco_html( blenco_option( 'rt_phone' ) , false );?></a></span>
				<?php } if( blenco_option( 'rt_topbar_email' ) && blenco_option( 'rt_email' ) ) { ?>
					<span><i class="icon-rt-email"></i><a href="mailto:<?php echo esc_attr( blenco_option( 'rt_email' ) );?>"><?php blenco_html( blenco_option( 'rt_email' ) , false );?></a></span>
				<?php } if( blenco_option( 'rt_topbar_website' ) && blenco_option( 'rt_website' ) ) { ?>
					<span><i class="icon-rt-development-service"></i><?php blenco_html( blenco_option( 'rt_website' ) , false );?></span>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if( blenco_option( 'rt_topbar_social' ) ) { ?>
			<div class="topbar-right d-flex gap-30 align-items-center">
				<div class="social-icon">
					<?php if( blenco_option( 'rt_follow_us_label' ) ) { ?><label><?php echo esc_html( blenco_option( 'rt_follow_us_label' ) ); ?></label><?php } ?>
					<?php blenco_get_social_html( '#555' ); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
