<?php
/**
 * WooCommerce integration.
 *
 * @package KoombiyoShipping
 */

namespace Koombiyo\Shipping\WooCommerce;

defined( 'ABSPATH' ) || exit;


/**
 * Class Integration
 */
class Integration {


	/**
	 * Constructor.
	 */
	public function __construct() {

		add_action(
			'woocommerce_init',
			array(
				$this,
				'init',
			)
		);

	}


	/**
	 * Initialize integration.
	 *
	 * @return void
	 */
	public function init(): void {


		if ( ! class_exists( 'WooCommerce' ) ) {

			return;

		}


	}


}
