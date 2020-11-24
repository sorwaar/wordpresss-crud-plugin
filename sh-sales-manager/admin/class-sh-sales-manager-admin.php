<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sorwaar.github.io/
 * @since      1.0.0
 *
 * @package    Sh_Sales_Manager
 * @subpackage Sh_Sales_Manager/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sh_Sales_Manager
 * @subpackage Sh_Sales_Manager/admin
 * @author     Sorwar Hossain (SH) <sorwar.hossain@outlook.com>
 */
class Sh_Sales_Manager_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sh_Sales_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sh_Sales_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sh-sales-manager-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sh_Sales_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sh_Sales_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sh-sales-manager-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function sales_manager_menu() {
				/**
		 * This function is provided for add menu on admin panel.
		 */

		add_menu_page( "Sales Manager","Sales Manager","manage_options", "sh-sales-manager", array($this,"sales_manager_dashboard"),"dashicons-money-alt", null );

			add_submenu_page( "sh-sales-manager", "Dashboard", "Dashboard", "manage_options", "sh-sales-manager", array($this,"sales_manager_dashboard"));

			add_submenu_page( "sh-sales-manager", "Orders", "Orders", "manage_options", "sh-sales-manager-orders", array($this,"sales_manager_orders"));

			add_submenu_page( "sh-sales-manager", "Sales Team", "Sales Team", "manage_options", "sh-sales-manager-sales-team", array($this,"sales_manager_team"));

			add_submenu_page( "sh-sales-manager", "Products", "Products", "manage_options", "sh-sales-manager-products", array($this,"sales_manager_products"));

			add_submenu_page( "sh-sales-manager", "Settings", "Settings", "manage_options", "sh-sales-manager-settings", array($this,"sales_manager_settings"));
	}

	public function sales_manager_dashboard()
	{
		echo "<h2>Welcome to Sales Manager Dashboard</h2>";
	}

	public function sales_manager_orders()
	{
		echo "<h2>Welcome to Sales Manager Orders</h2>";
	}

	public function sales_manager_team()
	{
		include_once(SH_SALES_MANAGER_PLUGIN_PATH.'admin/partials/sh-sales-manager-admin-teams.php');
		$teams = new Sh_Sales_Manager_Admin_Teams();
		$teams->sh_teams_page_handler();
		//$teams->sh_teams_form_page_handler();
	}

	public function sales_manager_products()
	{
		echo "<h2>Welcome to Sales Manager Products</h2>";
	}

	public function sales_manager_settings()
	{
		echo "<h2>Welcome to Sales Manager Settings</h2>";
		global $wpdb;
	}
}
