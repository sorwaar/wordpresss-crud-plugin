<?php

/**
 * Fired during plugin activation
 *
 * @link       http://sorwaar.github.io/
 * @since      1.0.0
 *
 * @package    Sh_Sales_Manager
 * @subpackage Sh_Sales_Manager/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sh_Sales_Manager
 * @subpackage Sh_Sales_Manager/includes
 * @author     Sorwar Hossain (SH) <sorwar.hossain@outlook.com>
 */
class Sh_Sales_Manager_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		require_once plugin_dir_path( __FILE__ ) . 'class-sh-sales-manager-installer.php';
		$installer = new Sh_Sales_Manager_Installer();
		$installer->run();


	}

}
