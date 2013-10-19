# Widget Attributes

Add custom attributes (classes and ID) to your widgets, the easy way!

## Installation ##
1. Clone this repo into your WordPress content directory
```
cd /srv/localhost/wp-content/
git clone https://github.com/kucrut/wp-widget-attributes.git widget-attributes
```
2. Go to *Plugins* and activate *Widget Attributes*
3. Go to *Appearance* > *Widgets* and add the attributes

## Filters ##
You can hook into `widget_attribute_id` and/or `widget_attribute_classes` if you need to validate/sanitize the attributes provided by the user. For example:

```php
/**
 * Check for widget classes provided by the user
 *
 * @param string $classes Widget class(es), separated by spaces
 */
function my_widget_class_filter( $classes ) {
	// do your thing...
	return $classes;
}
```

## FAQs ##

### Do I need to add code to my theme's `functions.php` file? ###
No, you don't. This plugin just works(TM).

### Is there any known bug? ###
In short, maybe. If your theme or one of your plugins is replacing the default widget callback in a weird way, this plugin may not work.

