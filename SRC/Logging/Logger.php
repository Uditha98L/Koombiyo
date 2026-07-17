<?php
/**
 * Logger service.
 *
 * @package KoombiyoShipping
 */

namespace Koombiyo\Shipping\Logging;

defined( 'ABSPATH' ) || exit;


/**
 * Class Logger
 */
class Logger {


	/**
	 * WooCommerce logger.
	 *
	 * @var object|null
	 */
	private static $logger = null;


	/**
	 * Initialize logger.
	 *
	 * @return void
	 */
	public static function init(): void {


		if ( function_exists( 'wc_get_logger' ) ) {

			self::$logger = wc_get_logger();

		}

	}


	/**
	 * Write information log.
	 *
	 * @param string $message Message.
	 * @return void
	 */
	public static function info( string $message ): void {

		self::write(
			$message,
			'info'
		);

	}


	/**
	 * Write error log.
	 *
	 * @param string $message Message.
	 * @return void
	 */
	public static function error( string $message ): void {

		self::write(
			$message,
			'error'
		);

	}


	/**
	 * Write log.
	 *
	 * @param string $message Message.
	 * @param string $level Log level.
	 * @return void
	 */
	private static function write(
		string $message,
		string $level
	): void {


		if ( null === self::$logger ) {

			return;

		}


		self::$logger->{$level}(
			$message,
			array(
				'source' => 'koombiyo-shipping',
			)
		);

	}

}
