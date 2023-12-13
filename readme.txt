=== Link Verification for Mastodon ===
Author URI: https://over-engineer.com/
Plugin URI: https://over-engineer.com/projects/link-verification-for-mastodon
Contributors: overengineer
Tags: mastodon, fediverse, social
Requires at least: 4.4
Tested up to: 6.4
Requires PHP: 5.6.20
Stable Tag: 1.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An unofficial WordPress plugin to quickly verify a link on your Mastodon profile.

== Description ==

This WordPress plugin is super simple. It just adds something like this `<link rel="me" href="https://your.mastodon.instance/@yourusername" />` to your website’s `<head>`.

== Installation ==

= Automatic installation =

Automatic installation is the easiest option — WordPress will handle the file transfer, and you won’t need to leave your web browser.

1. Log in to your WordPress dashboard
2. Navigate to the “Plugins” menu
3. Search for “Link Verification for Mastodon”
4. Click “Install Now” and WordPress will take it from there
5. Activate the plugin through the “Plugins” menu in WordPress

= Manual installation =

1. Upload the entire `link-verification-for-mastodon` folder to the `wp-content/plugins/` directory
2. Activate the plugin through the “Plugins” menu in WordPress

= After activation =

1. In your WordPress dashboard, under “Settings”, you will find the “Mastodon Verification” menu
2. Copy-paste your Mastodon username (formatted as `@yourusername@your.mastodon.instance`)
3. Click “Save Changes”
4. Your link should show up as verified on your profile in a few minutes

== Frequently Asked Questions ==

= What’s my Mastodon username? =

A Mastodon account is formed like an email account: `@name@some.mastodon.instance`. You need to enter the whole thing (including your instance) in the plugin’s settings.

= Can I use this plugin to verify multiple Mastodon accounts? =

Yes, you can. Just enter all usernames separated by a comma.

= Where can I report any bugs and/or request additional features? =

If you have spotted any bugs, or would like to request additional features from the plugin, please [file an issue](https://github.com/over-engineer/link-verification-for-mastodon/issues).

= How can I support the developer of this plugin? =

Supporting me is 100% optional. The plugin is free and will always be free. However, if you’d like to support me, it would mean the world to me and help me to keep creating useful plugins. If you’d like to contribute, please consider [buying me a coffee](https://ko-fi.com/overengineer)! ❤️

== Screenshots ==

1. Plugin settings

== Changelog ==

= 1.1.2: December 13, 2023 =

* Set default values to avoid PHP warnings when the plugin is activated for the first time (thanks to @jeherve)
* Escape Mastodon usernames in the plugin’s settings page (thanks to @jeherve)

= 1.1.1: April 15, 2023 =

* Add donation link to readme.txt and the plugin’s settings page

= 1.1.0: February 26, 2023 =

* Add support for multiple Mastodon usernames

= 1.0.3: November 22, 2022 =

* Sanitize text fields to automatically trim any leading and/or trailing whitespace

= 1.0.2: November 19, 2022 =

* Bump version number

= 1.0.1: November 19, 2022 =

* Update readme.txt
* Update screenshot

= 1.0: November 19, 2022 =

* Initial version.
