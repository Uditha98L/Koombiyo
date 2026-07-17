<?php
/**
 * Admin assets.
 *
 * @package KoombiyoShipping
 */

namespace Koombiyo\Shipping\Admin;

defined( 'ABSPATH' ) || exit;


/**
 * Class Assets
 */
class Assets {


	/**
	 * Constructor.
	 */
	public function __construct() {

		add_action(
			'admin_enqueue_scripts',
			array(
				$this,
				'load',
			)
		);

	}


	/**
	 * Load assets.
	 *
	 * @return void
	 */
	public function load(): void {


		wp_enqueue_style(
			'koombiyo-admin',
			KOOMBIYO_SHIPPING_URL . 'assets/css/admin.css',
			array(),
			KOOMBIYO_SHIPPING_VERSION
		);

	}

}
