<?php
/**
 * Database installer.
 *
 * @package KoombiyoShipping
 */

namespace Koombiyo\Shipping\Database;

defined( 'ABSPATH' ) || exit;


/**
 * Class Installer
 */
class Installer {


	/**
	 * Install database tables.
	 *
	 * @return void
	 */
	public static function install(): void {

		global $wpdb;


		$charset_collate = $wpdb->get_charset_collate();


		$shipments_table =
			$wpdb->prefix . 'koombiyo_shipments';


		$tracking_table =
			$wpdb->prefix . 'koombiyo_tracking_history';


		require_once ABSPATH . 'wp-admin/includes/upgrade.php';


		$sql_shipments = "
		CREATE TABLE {$shipments_table} (

			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,

			order_id bigint(20) unsigned NOT NULL,

			tracking_number varchar(100) DEFAULT NULL,

			shipment_status varchar(50) DEFAULT 'created',

			cod_amount decimal(10,2) DEFAULT 0,

			created_at datetime NOT NULL,

			updated_at datetime NOT NULL,

			PRIMARY KEY (id),

			KEY order_id (order_id),

			KEY tracking_number (tracking_number)

		) {$charset_collate};
		";


		$sql_tracking = "
		CREATE TABLE {$tracking_table} (

			id bigint(20) unsigned NOT NULL AUTO_INCREMENT,

			shipment_id bigint(20) unsigned NOT NULL,

			status varchar(100) NOT NULL,

			location varchar(255) DEFAULT NULL,

			event_time datetime DEFAULT NULL,

			created_at datetime NOT NULL,

			PRIMARY KEY (id),

			KEY shipment_id (shipment_id)

		) {$charset_collate};
		";


		dbDelta( $sql_shipments );

		dbDelta( $sql_tracking );


		update_option(
			'koombiyo_shipping_db_version',
			KOOMBIYO_SHIPPING_VERSION
		);

	}

}
