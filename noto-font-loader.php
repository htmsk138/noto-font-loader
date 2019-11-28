<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://hitomiseki.com
 * @since             1.0.0
 * @package           Noto_Font_Loader
 *
 * @wordpress-plugin
 * Plugin Name:       Noto Font Loader
 * Plugin URI:        
 * Description:       Noto Font Loader loads the correct Noto font file from Google Fonts depending on the site’s locale and overrides theme's font settings.
 * Version:           1.0.3
 * Author:            Hitomi Seki
 * Author URI:        https://hitomiseki.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       noto-font-loader
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'NOTO_FONT_LOADER_VERSION', '1.0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-noto-font-loader-activator.php
 */
function activate_noto_font_loader() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-noto-font-loader-activator.php';
	Noto_Font_Loader_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-noto-font-loader-deactivator.php
 */
function deactivate_noto_font_loader() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-noto-font-loader-deactivator.php';
	Noto_Font_Loader_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_noto_font_loader' );
register_deactivation_hook( __FILE__, 'deactivate_noto_font_loader' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-noto-font-loader.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_noto_font_loader() {

	$plugin = new Noto_Font_Loader();
	$plugin->run();

}
run_noto_font_loader();
