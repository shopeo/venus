<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class VenusDescriptionWidget extends WP_Widget {
	public $args = array();

	function __construct() {
		parent::__construct( 'venus_description_widget', __( 'Venus Description Widget', 'aifanfan' ) );
		add_action( 'widgets_init', function () {
			register_widget( 'VenusDescriptionWidget' );
		} );
	}

	public function widget( $args, $instance ) {
	}

	public function form( $instance ) {
	}

	public function update( $new_instance, $old_instance ) {
	}
}

$venusDescriptionWidget = new VenusDescriptionWidget();
