<?php
/**
 * Koombiyo settings page.
 *
 * @package KoombiyoShipping
 */

namespace Koombiyo\Shipping\Admin;

defined( 'ABSPATH' ) || exit;


/**
 * Class SettingsPage
 */
class SettingsPage {


	/**
	 * Settings option name.
	 *
	 * @var string
	 */
	private string $option_name = 'koombiyo_shipping_settings';


	/**
	 * Constructor.
	 */
	public function __construct() {

		add_filter(
			'woocommerce_get_sections_shipping',
			array(
				$this,
				'add_section',
			)
		);


		add_filter(
			'woocommerce_get_settings_shipping',
			array(
				$this,
				'add_settings',
			),
			10,
			2
		);

	}


	/**
	 * Add Koombiyo section.
	 *
	 * @param array $sections Existing sections.
	 *
	 * @return array
	 */
	public function add_section( array $sections ): array {

		$sections['koombiyo'] = __(
			'Koombiyo',
			'koombiyo-shipping'
		);

		return $sections;

	}


	/**
	 * Add settings fields.
	 *
	 * @param array  $settings Settings.
	 * @param string $current_section Current section.
	 *
	 * @return array
	 */
	public function add_settings(
		array $settings,
		string $current_section
	): array {


		if ( 'koombiyo' !== $current_section ) {

			return $settings;

		}


		return array(

			array(
				'title' => __(
					'Koombiyo Shipping Settings',
					'koombiyo-shipping'
				),
				'type'  => 'title',
				'id'    => 'koombiyo_settings',
			),


			array(
				'title'    => __(
					'Environment',
					'koombiyo-shipping'
				),
				'id'       => 'koombiyo_environment',
				'type'     => 'select',
				'default'  => 'sandbox',
				'options'  => array(
					'sandbox'    => 'Sandbox',
					'production' => 'Production',
				),
			),


			array(
				'title' => __(
					'API Key',
					'koombiyo-shipping'
				),
				'id'    => 'koombiyo_api_key',
				'type'  => 'text',
			),


			array(
				'title' => __(
					'API Secret',
					'koombiyo-shipping'
				),
				'id'    => 'koombiyo_api_secret',
				'type'  => 'password',
			),


			array(
				'title'   => __(
					'Enable Tracking',
					'koombiyo-shipping'
				),
				'id'      => 'koombiyo_tracking_enabled',
				'type'    => 'checkbox',
				'default' => 'yes',
			),


			array(
				'title'   => __(
					'Enable Debug Logging',
					'koombiyo-shipping'
				),
				'id'      => 'koombiyo_debug',
				'type'    => 'checkbox',
				'default' => 'yes',
			),


			array(
				'type' => 'sectionend',
				'id'   => 'koombiyo_settings',
			),

		);

	}

}
