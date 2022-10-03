<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class VenusQRCodeWidget extends WP_Widget {
	public $args = array();

	function __construct() {
		parent::__construct( 'venus_qrcode_widget', __( 'Venus QRCode Widget', 'aifanfan' ) );
		add_action( 'widgets_init', function () {
			register_widget( 'VenusQRCodeWidget' );
		} );
	}

	public function widget( $args, $instance ) {
	}

	public function form( $instance ) {
	}

	public function update( $new_instance, $old_instance ) {
	}
}

$venusQRCodeWidget = new VenusQRCodeWidget();
