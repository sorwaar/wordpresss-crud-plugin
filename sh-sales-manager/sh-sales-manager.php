<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://sorwaar.github.io/
 * @since             1.0.0
 * @package           Sh_Sales_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       SH Sales Manager
 * Plugin URI:        http://sorwaar.github.io/
 * Description:       Simple sales management plugin
 * Version:           1.0.0
 * Author:            Sorwar Hossain (SH)
 * Author URI:        http://sorwaar.github.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sh-sales-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SH_SALES_MANAGER_VERSION', '1.0.0' );
define( 'SH_SALES_MANAGER_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sh-sales-manager-activator.php
 */
function activate_sh_sales_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sh-sales-manager-activator.php';
	
	$activate = new Sh_Sales_Manager_Activator();
	$activate->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sh-sales-manager-deactivator.php
 */
function deactivate_sh_sales_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sh-sales-manager-deactivator.php';
	Sh_Sales_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sh_sales_manager' );
register_deactivation_hook( __FILE__, 'deactivate_sh_sales_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sh-sales-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sh_sales_manager() {

	$plugin = new Sh_Sales_Manager();
	$plugin->run();

}
run_sh_sales_manager();
