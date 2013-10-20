=== Widget Attributes ===
Contributors: kucrut
Donate link: http://kucrut.org/
Tags: widget
Requires at least: 3.6.1
Tested up to: 3.7-RC1
Stable tag: 0.2
License: GPLv2

Add custom attributes (classes and ID) to your widgets, the easy way!

== Description ==
This plugin is intended to be used by theme authors that need to have custom attributes for the widgets so they can define common classes for similar widgets, etc.

When activated, you'll get two additional input fields in the widget configuration forms, where you can assign a custom ID and classes for the widgets.

Please note that before the attributes are saved, they will be passed through [sanitize_html_class()](http://core.trac.wordpress.org/browser/tags/3.6.1/wp-includes/formatting.php#L1079) so all blacklisted characters will be stripped.

== Installation ==
1. Upload `widget-attributes` to the `/wp-content/plugins/` directory
2. Go to *Plugins* and activate *Widget Attributes*
3. Go to *Appearance* > *Widgets* and add the attributes

== Changelog ==

= 0.2 =
* Cleanup

= 0.1 =
* Initial release

== Frequently Asked Questions ==

= Do I need to add code to my theme's `functions.php` file? =
No, you don't. This plugin just works(TM). However, you will need to add the style for the classes you use for your widgets.

= Is there any known bug? =
In short, maybe. If your theme or one of your plugins is replacing the default widget callback in a weird way, this plugin may not work.

= Do you provide filters? =
YES! You can hook into `widget_attribute_id` and/or `widget_attribute_classes` if you need to validate/sanitize the attributes provided by the user. For example:

`
/**
 * Check for widget classes provided by the user
 *
 * @param string $classes Widget class(es), separated by spaces
 */
function my_widget_classes_filter( $classes ) {
	// do your thing...
	return $classes;
}
add_filter( 'widget_attribute_classes', 'my_widget_classes_filter' );
`

== Screenshots ==
1. Widget configuration form
2. Widget attributes inserted into the markup
