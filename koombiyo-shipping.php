<?php
/**
 * Plugin Name: Koombiyo Shipping for WooCommerce
 * Plugin URI: https://github.com/Uditha98L/Koombiyo
 * Description: Official-style WooCommerce integration for Koombiyo courier services.
 * Version: 0.1.0-alpha
 * Author: Open Source Contributors
 * License: GPLv2 or later
 * Text Domain: koombiyo-shipping
 * Domain Path: /languages
 *
 * @package KoombiyoShipping
 */

defined( 'ABSPATH' ) || exit;

define( 'KOOMBIYO_SHIPPING_VERSION', '0.1.0-alpha' );
define( 'KOOMBIYO_SHIPPING_FILE', __FILE__ );
define( 'KOOMBIYO_SHIPPING_PATH', plugin_dir_path( __FILE__ ) );
define( 'KOOMBIYO_SHIPPING_URL', plugin_dir_url( __FILE__ ) );


/**
 * Load Composer dependencies.
 */
if ( file_exists( KOOMBIYO_SHIPPING_PATH . 'vendor/autoload.php' ) ) {
	require_once KOOMBIYO_SHIPPING_PATH . 'vendor/autoload.php';
}


/**
 * Bootstrap plugin.
 */
add_action(
	'plugins_loaded',
	function () {

		if ( class_exists( '\Koombiyo\Shipping\Bootstrap' ) ) {

			\Koombiyo\Shipping\Bootstrap::init();

		}

	}
);


/**
 * Activation hook.
 */
register_activation_hook(
	__FILE__,
	function () {

		if ( class_exists( '\Koombiyo\Shipping\Database\Installer' ) ) {

			\Koombiyo\Shipping\Database\Installer::install();

		}

	}
);
