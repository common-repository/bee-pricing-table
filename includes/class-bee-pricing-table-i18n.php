<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://beescripts.com
 * @since      1.0.0
 *
 * @package    Bee_Pricing_Table
 * @subpackage Bee_Pricing_Table/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bee_Pricing_Table
 * @subpackage Bee_Pricing_Table/includes
 * @author     aumsrini <seenu.ceo@gmail.com>
 */
class Bee_Pricing_Table_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bee-pricing-table',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
