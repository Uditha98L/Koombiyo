<?php
/**
 * Uninstall Koombiyo Shipping.
 *
 * @package KoombiyoShipping
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;


/*
 * Remove plugin options.
 */

delete_option(
	'koombiyo_shipping_settings'
);


/*
 * Database cleanup is intentionally disabled.
 *
 * Enterprise plugins normally preserve data
 * unless the user explicitly removes it.
 *
 */
