<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_App
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin App
 * Plugin URI:        http://www.gauravpanwar.com/
 * Description:       A custom plugin made by gaurav panwar
 * Version:           1.0.0
 * Author:            Gartndev Web Studios
 * Author URI:        http://www.gartndev.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-app
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-app-activator.php
 */
function activate_plugin_app() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-app-activator.php';
	Plugin_App_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-app-deactivator.php
 */
function deactivate_plugin_app() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-app-deactivator.php';
	Plugin_App_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_app' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_app' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-app.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_app() {

	$plugin = new Plugin_App();
	$plugin->run();

}
run_plugin_app();
