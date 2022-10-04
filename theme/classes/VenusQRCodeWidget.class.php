<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class VenusQRCodeWidget extends WP_Widget {
	public $args = array(
			'before_title'  => '<p class="qrcode-title">',
			'after_title'   => '</p>',
			'before_widget' => '<div class="widget-wrap">',
			'after_widget'  => '</div>'
	);

	function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );
		parent::__construct( 'venus_qrcode_widget', __( 'Venus QRCode Widget', 'aifanfan' ) );
		add_action( 'widgets_init', function () {
			register_widget( 'VenusQRCodeWidget' );
		} );
	}

	public function scripts() {
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_media();
		wp_enqueue_script( 'venus-qr-code-widget', get_template_directory_uri() . '/assets/js/qr-code-widget.js', array( 'jquery' ) );
	}

	public function widget( $args, $instance ) {
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		echo $args['before_widget'];
		if ( $image ) {
			echo '<img src="' . esc_url( $image ) . '" alt="' . __( 'QRCode', 'venus' ) . '">';
		}

		if ( $title ) {
			echo $this->args['before_title'] . $title . $this->args['after_title'];
		}
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'title', 'venus' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:', 'venus' ); ?></label>
			<input class="widefat upload_image_button_with_qr_code" type="text"
				   name="<?php echo $this->get_field_name( 'image' ); ?>"
				   id="<?php echo $this->get_field_id( 'image' ); ?>" readonly value="<?php echo esc_url( $image ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'venus' ); ?></label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"
				   id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

$venusQRCodeWidget = new VenusQRCodeWidget();
