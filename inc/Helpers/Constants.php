<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedNamespaceFound
namespace RT\Blenco\Helpers;

class Constants {

	const BLENCO_VERSION = '1.0.0';

	public static function get_version() {
		return WP_DEBUG ? time() : self::BLENCO_VERSION;
	}
}

