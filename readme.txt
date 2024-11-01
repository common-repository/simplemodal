=== Plugin Name ===
Contributors: arsdehnel
Donate link: http://arsdehnel.net/plugin/simple-modal/
Tags: links, modal, posts
Requires at least: 3.0.1
Tested up to: 3.9.1
Stable tag: "trunk"
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create custom post type that is then available as a WYSIWYG Editor option for links to be opened in modal window.

== Description ==

Sometimes content doesn't need it's own separate page but it's enough that you don't want to jam it all into one page.  Modals are a great way to handle situations just like that.  This creates a new post type and menu option in the main menu in the admin site.  Add posts here just like you would in Posts or Pages.  Then go into the Post or Page (or other post type you may have) and there is a new option in the editor toolbar.  This allows you to create a link that will open one of those Modal post types into a modal window rather than sending the user to a separate page.

== Installation ==

Installation of the Post Access Controller is pretty standard.

1. Download the zip archive of the plugin
2. Extract the archive
3. Upload that archive to the /wp-content/plugins/simple-modal/ folder
4. Go to the Plugins menu in the admin of your WP site
5. Click Activate in the Simple Modal line
6. Go to the Settings -> Simple Modal page to indicate the height and width of the four built-in sizes supported out of the box.
7. Done! You're ready to start creating modal posts and linking to them from wherever you'd like!

== Frequently Asked Questions ==

= Why is this page empty? =

Because the plugin is brand new and there are no frequently asked questions yet!

== Changelog ==

= 0.3.3 =
* fixed an error in some WP installs that require a nopriv action for users that are not logged in

= 0.3.2 =
* fixed the number of modals that show in the tinymce link window

= 0.3.1 =
* adjusted styles for the various sizes and the reference to the admin/tinymce stylesheet

= 0.3.0 =
* hooked up the default sizes for the modals based on the stylesheet settings

= 0.2.1 =
* Changed javascript to use .html() instead of .text() when rendering the modal content.

= 0.2.0 =
* Fixed up some of the javascript errors so this at least shows the modal as needed.  Will need more work to be properly functional in a production setting.

= 0.1.0 =
* Initial creation