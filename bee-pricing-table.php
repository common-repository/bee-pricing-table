<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://beescripts.com
 * @since             1.0.0
 * @package           Bee_Pricing_Table
 *
 * @wordpress-plugin
 * Plugin Name:       Bee Pricing Table
 * Plugin URI:        http://beescripts.com
 * Description:       Responsive pricing table builder very easy to use.
 * Version:           1.0.0
 * Author:            aumsrini
 * Author URI:        http://beescripts.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bee-pricing-table
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bee-pricing-table-activator.php
 */
function activate_bee_pricing_table() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bee-pricing-table-activator.php';
	Bee_Pricing_Table_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bee-pricing-table-deactivator.php
 */
function deactivate_bee_pricing_table() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bee-pricing-table-deactivator.php';
	Bee_Pricing_Table_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bee_pricing_table' );
register_deactivation_hook( __FILE__, 'deactivate_bee_pricing_table' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bee-pricing-table.php';

require plugin_dir_path( __FILE__ ) . 'includes/bee-pricing-table-functions.php';

require plugin_dir_path( __FILE__ ) . 'includes/bee-pricing-table-front-view.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bee_pricing_table() {

	$plugin = new Bee_Pricing_Table();
	$plugin->run();

}
run_bee_pricing_table();
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'ABSPATH' ) ) exit; 
require_once plugin_dir_path( __FILE__ ) .'includes/framework/bee_pricing_config.php';


if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php"); 
}


