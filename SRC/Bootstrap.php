<?php
/**
 * Bootstrap loader.
 *
 * @package KoombiyoShipping
 */

namespace Koombiyo\Shipping;

defined( 'ABSPATH' ) || exit;

use Koombiyo\Shipping\Admin\SettingsPage;
use Koombiyo\Shipping\Logging\Logger;
use Koombiyo\Shipping\WooCommerce\Integration;


/**
 * Class Bootstrap
 */
class Bootstrap {

	/**
	 * Initialize plugin services.
	 *
	 * @return void
	 */
	public static function init(): void {

		$plugin = new Plugin();

		$plugin->register_hooks();

		Logger::init();

		self::load_admin();

		self::load_woocommerce();

	}


	/**
	 * Load admin components.
	 *
	 * @return void
	 */
	private static function load_admin(): void {

		if ( is_admin() && class_exists( SettingsPage::class ) ) {

			new SettingsPage();

		}

	}


	/**
	 * Load WooCommerce components.
	 *
	 * @return void
	 */
	private static function load_woocommerce(): void {

		if ( class_exists( 'WooCommerce' ) && class_exists( Integration::class ) ) {

			new Integration();

		}

	}

}
