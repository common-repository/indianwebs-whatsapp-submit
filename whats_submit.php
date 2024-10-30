<?php

/**
 * @link              https://indianwebs.com
 * @since             1.0.0
 * @package           IndianWebs WhatSubmit
 *
 * @wordpress-plugin
 * Plugin Name:       IndianWebs WhatSubmit
 * Plugin URI:        http://indianwebs.com/plugins
 * Description:       Facilita a los usuarios un contacto más directo desde WhatsApp.
 * Version:           1.0.0
 * Author:            Joan Medrano
 * Author URI:        http://lawebdelpoble.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       indianwebs-whats-submit
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
define( 'WHATSAPP_SUBMIT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-whats_submit-activator.php
 */
function activate_whats_submit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-whats_submit-activator.php';
	Whats_submit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-whats_submit-deactivator.php
 */
function deactivate_whats_submit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-whats_submit-deactivator.php';
	Whats_submit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_whats_submit' );
register_deactivation_hook( __FILE__, 'deactivate_whats_submit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-whats_submit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_whats_submit() {

	$plugin = new Whats_submit();
	$plugin->run();

}
run_whats_submit();
