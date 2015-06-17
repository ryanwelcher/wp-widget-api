<?php
/**
 * Plugin Name: WP Widget API
 * Plugin URI:  http://wordpress.org/extend/plugins/health-check/
 * Description: A new API for widgets
 * Version:     0.0.1
 */

require_once( __DIR__ . '/wp-widget-api/class-wp-widget-base.php' );
require_once( __DIR__ . '/wp-widget-api/class-test-widget.php' );


add_action( 'widgets_init', function(){
	register_widget( 'API_Test_Widget' );
});




/**
 *
 * @param string $widget The name of the widget class
 *
 * @return int | WP_Error
 */
function get_next_widget_instance_number( $widget ) {
	global $wp_widget_factory;

	if ( isset( $wp_widget_factory->widgets[ $widget ] ) ) {
		return $wp_widget_factory->widgets[ $widget ]->number;
	} else {
		return new WP_Error( 'WP_Widget_Factory', $widget . ' is not a registered widget' );
	}
}

