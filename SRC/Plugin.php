<?php
/**
 * Main plugin class.
 *
 * @package KoombiyoShipping
 */

namespace Koombiyo\Shipping;

defined( 'ABSPATH' ) || exit;


/**
 * Class Plugin
 */
class Plugin {


	/**
	 * Register WordPress hooks.
	 *
	 * @return void
	 */
	public function register_hooks(): void {


		add_action(
			'init',
			array(
				$this,
				'load_textdomain',
			)
		);


	}


	/**
	 * Load translations.
	 *
	 * @return void
	 */
	public function load_textdomain(): void {

		load_plugin_textdomain(
			'koombiyo-shipping',
			false,
			dirname(
				plugin_basename(
					KOOMBIYO_SHIPPING_FILE
				)
			) . '/languages'
		);

	}

}
