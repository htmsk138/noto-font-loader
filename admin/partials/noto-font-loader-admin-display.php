<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://hitomiseki.com
 * @since      1.0.0
 *
 * @package    Noto_Font_Loader
 * @subpackage Noto_Font_Loader/admin/partials
 */
?>

<div class="wrap">
    <h1><?php esc_html_e('Noto Font Settings', 'noto-font-loader'); ?></h1>

    <?php settings_errors(); ?>

    <form method="post" action="options.php">
    <?php
        settings_fields('noto-font-loader-settings');
        do_settings_sections('noto-font-loader-settings');
        $letterform = get_option('nfl_letterform');
    ?>

    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th scope="row"><?php esc_html_e('Font style', 'noto-font-loader'); ?></th>
                <td>
                    <p>
                        <label for="nfl_letterform_sans">
                            <input type="radio" name="nfl_letterform" id="nfl_letterform_sans" value="sans" <?php if ('sans' == $letterform) { ?> checked <?php } ?>><?php esc_html_e('Sans', 'noto-font-loader'); ?>
                        </label>
                    </p>
                    <p>
                        <label for="nfl_letterform_serif">
                            <input type="radio" name="nfl_letterform" id="nfl_letterform_serif" value="serif" <?php if ('serif' == $letterform) { ?> checked <?php } ?>><?php esc_html_e('Serif', 'noto-font-loader'); ?>
                        </label>
                    </p>
                    <p>
                        <label for="nfl_letterform_header_serif">
                            <input type="radio" name="nfl_letterform" id="nfl_letterform_header_serif" value="header-serif" <?php if ('header-serif' == $letterform) { ?> checked <?php } ?>><?php esc_html_e('Headers: Serif / Body: Sans', 'noto-font-loader');?>
                        </label><br/>
                    </p>
                    <p>
                        <label for="nfl_letterform_header_sans">
                            <input type="radio" name="nfl_letterform" id="nfl_letterform_header_sans" value="header-sans" <?php if ('header-sans' == $letterform) { ?> checked <?php } ?>><?php esc_html_e('Headers: Sans / Body: Serif', 'noto-font-loader'); ?>
                        </label>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <?php submit_button(); ?>
    </form>
</div><!-- .wrap -->
