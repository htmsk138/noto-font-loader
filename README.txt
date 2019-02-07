=== Noto Font Loader ===

Contributors: htmsk138
Tags: font
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Noto Font Loader is a WordPress plugin that loads the correct Noto font file from Google Fonts depending on the site's locale and overrides theme's font settings.

== Description ==

= The Goal =

Most of WordPress themes are designed to display western languages. When I try to use them on Japanese sites, it looks awkward due to lack of proper font settings (these languages need to use a font other than default in order to look cool). So when I met Noto font, I liked the font's concept to cover every unicode letters.

But the font files are separated for each language's character set. I thought it might be handy if the site could automatically choose which Noto font to use based on the site's locale.

= When To Use =

This plugin might be for you if you are in either of below situations:

* Your site is translated into Chinese, Japanese and/or Korean
* You just want to use Noto font

= Covered Languages =

The plugin currently handles the language-font combinations listed below:

* Japanese - Noto Sans/Serif JP
* Korean - Noto Sans/Serif KR
* Simlified Chinese - Noto Sans/Serif SC
* Traditional Chinese - Noto Sans/Serif TC

These are the languages graduated from early access directory and officially listed in Google Fonts. I intend to update the plugin whe the more languages are added in the future.

For all other locales, it uses standard latin subset (Noto Sans/Serif).

= Settings =

From admin panel, you can choose what style to use from these 4 options:

* Sans-serif
* Serif
* Headers: Serif / Body: Sans-serif
* Headers: Sans-serif / Body: Serif

== Changelog ==

= 1.0 =
* Initial release.