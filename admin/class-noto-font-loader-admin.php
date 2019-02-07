<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://hitomiseki.com
 * @since      1.0.0
 *
 * @package    Noto_Font_Loader
 * @subpackage Noto_Font_Loader/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Noto_Font_Loader
 * @subpackage Noto_Font_Loader/admin
 */
class Noto_Font_Loader_Admin {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/noto-font-loader-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/noto-font-loader-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Display the option settings page.
     *
	 * @since    1.0.0
     */
    public function display_settings() {

        add_theme_page(
            __('Noto Font Settings', 'noto-font-loader'),
            __('Noto Font', 'noto-font-loader'),
            'manage_options',
            'noto-font-loader',
            function () {
                require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/noto-font-loader-admin-display.php';
            }
        );

    }

    /**
     * Register settings.
     *
     * @since   1.0.0
     */
    public function register_settings() {

        register_setting('noto-font-loader-settings', 'nfl_letterform');

    }
}
