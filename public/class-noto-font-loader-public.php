<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://hitomiseki.com
 * @since      1.0.0
 *
 * @package    Noto_Font_Loader
 * @subpackage Noto_Font_Loader/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Noto_Font_Loader
 * @subpackage Noto_Font_Loader/public
 */
class Noto_Font_Loader_Public {

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
     * A setting option for sans-serif or serif font to use.
     *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $letterform  A setting option for sans-serif or serif font to use.
     */
    private $letterform;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->letterform = get_option('nfl_letterform');

	}

    /**
     * Load Noto Font depending on the locale.
     *
	 * @since    1.0.0
     */
    private function load_noto_font($style) {

        $noto_weight = 400;
        $noto_family = 'Noto+' . $style;
        $noto_subset = 'latin-ext';
        $noto_url = 'https://fonts.googleapis.com/css?family=%s:%s&amp;subset=%s';
        $locale = get_locale();

        wp_enqueue_style( sprintf('noto-%s-en', strtolower($style)), sprintf($noto_url, $noto_family, $noto_weight, $noto_subset) );

        if (get_locale() != 'en') {
            switch (get_locale()) {
                case 'ja':
                    $noto_weight = 300;
                    $noto_family .= '+JP';
                    $noto_subset = 'japanese';
                    break;

                case 'ko_KR':
                    $noto_weight = 300;
                    $noto_family .= '+KR';
                    $noto_subset = 'korean';
                    break;

                case 'zh_CN':
                    $noto_weight = 300;
                    $noto_family .= '+SC';
                    $noto_subset = 'chinese-simplified';
                    break;

                case 'zh_HK':
                case 'zh_TW':
                    $noto_weight = 300;
                    $noto_family .= '+TC';
                    $noto_subset = 'chinese-traditional';
                    break;

                default:
                    return;
            }

            wp_enqueue_style( sprintf('noto-%s-%s', strtolower($style), $locale), sprintf($noto_url, $noto_family, $noto_weight, $noto_subset) );
        }

    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

        switch ($this->letterform) {
            case 'sans':
                $this->load_noto_font('Sans');
                break;

            case 'serif':
                $this->load_noto_font('Serif');
                $css_name = 'serif';
                break;

            case 'header-serif':
            case 'header-sans':
                $this->load_noto_font('Serif');
                $this->load_noto_font('Sans');
                break;
        }

		wp_enqueue_style( $this->plugin_name, sprintf('%scss/noto-font-loader-%s.css', plugin_dir_url( __FILE__ ), $this->letterform), array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/noto-font-loader-public.js', array( 'jquery' ), $this->version, false );

	}

}
