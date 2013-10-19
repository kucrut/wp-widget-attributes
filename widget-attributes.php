<?php

/**
 * Plugin name: Widget Attributes
 * Plugin URI: http://kucrut.org/
 * Description: Assign custom widget attributes (classes and ID)
 * Version: 0.1
 * Author: Dzikri Aziz
 * Author URI: http://kucrut.org/
 * License: GPL v2
 * text-domain: widget-attributes
 */

class Kc_Widget_Attributes {

	const VERSION = '0.1';


	/**
	 * Initialize plugin
	 */
	public static function setup() {
		// Add necessary input on widget configuration form
		add_action( 'in_widget_form', array( __CLASS__, '_input_fields' ), 10, 3 );
	}


	/**
	 * Inject input fields into widget configuration form
	 *
	 * @since 0.1
	 * @wp_hook action in_widget_form
	 *
	 * @param object $widget Widget object
	 *
	 * @return NULL
	 */
	public static function _input_fields( $widget, $return, $instance ) {
		$instance = self::_get_attributes( $instance );
		?>
			<p>
				<?php printf(
					'<label for="%s">%s</label>',
					esc_attr( $widget->get_field_id( 'widget-id' ) ),
					esc_html__( 'HTML ID', 'widget-attributes' )
				) ?>
				<?php printf(
					'<input type="text" class="widefat" id="%s" name="%s" value="" />',
					esc_attr( $widget->get_field_id( 'widget-id' ) ),
					esc_attr( $widget->get_field_name( 'widget-id' ) ),
					esc_attr( $instance['widget-id'] )
				) ?>
			</p>
			<p>
				<?php printf(
					'<label for="%s">%s</label>',
					esc_attr( $widget->get_field_id( 'widget-class' ) ),
					esc_html__( 'HTML Class(es)', 'widget-attributes' )
				) ?>
				<?php printf(
					'<input type="text" class="widefat" id="%s" name="%s" value="" />',
					esc_attr( $widget->get_field_id( 'widget-class' ) ),
					esc_attr( $widget->get_field_name( 'widget-class' ) ),
					esc_attr( $instance['widget-class'] )
				) ?>
			</p>
		<?php
		return null;
	}


	/**
	 * Get default attributes
	 *
	 * @since 0.1
	 *
	 * @param array $instance Widget instance configuration
	 *
	 * @return array
	 */
	private static function _get_attributes( $instance ) {
		$instance = wp_parse_args(
			$instance,
			array(
				'widget-id'    => '',
				'widget-class' => '',
			)
		);

		return $instance;
	}
}

add_action( 'widgets_init', array( 'Kc_Widget_Attributes', 'setup' ) );
