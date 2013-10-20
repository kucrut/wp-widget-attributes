# Widget Attributes

Add custom attributes (classes and ID) to your widgets, the easy way!

## Description ##
This plugin is intended to be used by theme authors that need to have custom attributes for the widgets so they can define common classes for similar widgets, etc.

When activated, you'll get two additional input fields in the widget configuration forms, where you can assign a custom ID and classes for the widgets.

Please note that before the attributes are saved, they will be passed through [sanitize_html_class()](http://core.trac.wordpress.org/browser/tags/3.6.1/wp-includes/formatting.php#L1079) so all blacklisted characters will be stripped.

## Installation ##
1. Clone this repo into your WordPress content directory

   ```bash
   cd /srv/localhost/wp-content/
   git clone https://github.com/kucrut/wp-widget-attributes.git widget-attributes
   ```
2. Go to *Plugins* and activate *Widget Attributes*
3. Go to *Appearance* > *Widgets* and add the attributes

## Frequently Asked Questions ##

### Do I need to add code to my theme's `functions.php` file? ###
No, you don't. This plugin just works(TM). However, you will need to add the style for the classes you use for your widgets.

### Is there any known bug? ###
In short, maybe. If your theme or one of your plugins is replacing the default widget callback in a weird way, this plugin may not work.

### Do you provide filters? ###
YES! You can hook into `widget_attribute_id` and/or `widget_attribute_classes` if you need to validate/sanitize the attributes provided by the user. For example:

```php
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
```
