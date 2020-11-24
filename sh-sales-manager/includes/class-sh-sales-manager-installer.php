<?php
/**
 * 
 */
class Sh_Sales_Manager_Installer
{
	
	public function run()
	{
		$this->create_table();
	}


	public function create_table()
	{
		global $wpdb;

		$charset_collate  = $wpdb->get_charset_collate();

		if (!function_exists('dbDelta')) {
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		}

		// Create Table for Teams.
		$teams ="CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sh_sm_teams` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NULL , `created_by` BIGINT(20) UNSIGNED NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) $charset_collate";

		dbDelta($teams);

		// Create Table for Team Members.
		$team_members = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sh_sm_team_members` ( `id` INT NOT NULL AUTO_INCREMENT , `team_id` INT(11) UNSIGNED NOT NULL , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NULL , `created_by` BIGINT(20) UNSIGNED NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) $charset_collate";

		dbDelta($team_members);

		// Create Table for Products.
		$products = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sh_sm_products` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `price` FLOAT(11,2) NULL, `sales_unit` VARCHAR(100) NULL , `created_by` BIGINT(20) UNSIGNED NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) $charset_collate";
		dbDelta($products);

		// Create Table for buyers_info.
		$buyers_info = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sh_sm_buyers_info` ( `id` INT NOT NULL AUTO_INCREMENT , `member_id` INT(11) UNSIGNED NOT NULL , `name` VARCHAR(100) NOT NULL, `address` VARCHAR(255) NOT NULL, `payment_status` VARCHAR(100) NOT NULL, `payment_method` VARCHAR(50) NOT NULL, `cheque_number` VARCHAR(100) NOT NULL, `total` FLOAT(11,2) NULL, `created_by` BIGINT(20) UNSIGNED NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) $charset_collate";

		dbDelta($buyers_info);

		// Create Table for Orders.
		$orders = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}sh_sm_orders` ( `id` INT NOT NULL AUTO_INCREMENT , `buyer_id` INT(11) UNSIGNED NOT NULL , `product_id` INT(11) UNSIGNED NOT NULL , `quantity` FLOAT(11,2) NOT NULL, `quantity_price_total` FLOAT(11,2) NOT NULL, `created_by` BIGINT(20) UNSIGNED NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) $charset_collate";

		dbDelta($orders);
	}


}