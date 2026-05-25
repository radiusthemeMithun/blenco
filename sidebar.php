<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blenco
 */


use RT\Blenco\Helpers\Fns;

if ( is_singular() && is_active_sidebar( Fns::default_sidebar('single') ) ) {
	blenco_sidebar( Fns::default_sidebar('single')  );
} else {
	blenco_sidebar( Fns::default_sidebar('main') );
}
