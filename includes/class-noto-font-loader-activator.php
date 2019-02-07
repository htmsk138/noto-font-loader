<?php

/**
 * Fired during plugin activation
 *
 * @link       https://hitomiseki.com
 * @since      1.0.0
 *
 * @package    Noto_Font_Loader
 * @subpackage Noto_Font_Loader/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Noto_Font_Loader
 * @subpackage Noto_Font_Loader/includes
 */
class Noto_Font_Loader_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        update_option('nfl_letterform', 'sans');
	}

}
