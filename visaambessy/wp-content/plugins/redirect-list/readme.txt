=== Plugin Name ===
Contributors: sourcefound
Donate link: http://memberfind.me
Tags: 301, 302, forwarding, redirect, url redirect, http redirect, redirection
Requires at least: 3.0.1
Tested up to: 3.8
Stable tag: 1.4
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A really lightweight, clean and simple 301 or 302 HTTP redirect plugin that also supports matching of GET query parameters. 

== Description ==

Lightweight and clean Redirect plugin performs HTTP redirection, and supports matching of GET query parameters without regular expressions (for those pesky ?page=123 or ?_escaped_fragment_=xxx urls).

* No advertising or links.
* Lightweight code (~100 LOC).
* 301 or 302 HTTP redirect.
* Specify from and destination urls in a list manually.
* Does not require creating a custom page.
* Match url regardless of GET parameters.
* Match url only if no GET parameter exists.
* Match url only if GET parameter exists (value does not matter).
* Match url only if GET parameter exists and value matches.
* Does not support Multisite (sorry!).

== Installation ==

1. Install the plugin via the WordPress.org plugin directory or upload it to your plugins directory.
1. Activate the plugin.
1. Under 'Settings' -> 'Redirects', enter the urls to redirect from and to.

== Changelog ==

= 1.0 =
* Initial release

= 1.2 =
* Fixes issue with Microsoft IIS servers

= 1.3 =
* Fixes compatibility with PHP 5.2 and earlier

= 1.4 =
* Adds import and export feature