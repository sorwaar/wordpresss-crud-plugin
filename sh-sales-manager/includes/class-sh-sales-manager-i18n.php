<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://sorwaar.github.io/
 * @since      1.0.0
 *
 * @package    Sh_Sales_Manager
 * @subpackage Sh_Sales_Manager/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sh_Sales_Manager
 * @subpackage Sh_Sales_Manager/includes
 * @author     Sorwar Hossain (SH) <sorwar.hossain@outlook.com>
 */
class Sh_Sales_Manager_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sh-sales-manager',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
