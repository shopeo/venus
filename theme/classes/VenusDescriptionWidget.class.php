<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class VenusDescriptionWidget extends WP_Widget {
	public $args = array(
			'before_description' => '<p class="description">',
			'after_description'  => '</p>',
			'before_widget'      => '<div class="widget-wrap">',
			'after_widget'       => '</div>'
	);

	function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ) );
		parent::__construct( 'venus_description_widget', __( 'Venus Description Widget', 'aifanfan' ) );
		add_action( 'widgets_init', function () {
			register_widget( 'VenusDescriptionWidget' );
		} );
	}

	public function scripts() {
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_media();
		wp_enqueue_script( 'venus-description-widget', get_template_directory_uri() . '/assets/js/description-widget.js', array( 'jquery' ) );
	}

	public function widget( $args, $instance ) {
		$image       = ! empty( $instance['image'] ) ? $instance['image'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';
		echo $args['before_widget'];
		if ( $image ) {
			echo '<img src="' . esc_url( $image ) . '" alt="' . get_bloginfo( 'name' ) . '">';
		}

		if ( $description ) {
			echo $this->args['before_description'] . $description . $this->args['after_description'];
		}
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$image       = ! empty( $instance['image'] ) ? $instance['image'] : '';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : __( 'description', 'venus' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:', 'venus' ); ?></label>
			<input class="widefat upload_image_button_with_description" type="text"
				   name="<?php echo $this->get_field_name( 'image' ); ?>"
				   id="<?php echo $this->get_field_id( 'image' ); ?>" readonly value="<?php echo esc_url( $image ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'venus' ); ?></label>
			<input class="widefat" type="text" name="<?php echo $this->get_field_name( 'description' ); ?>"
				   id="<?php echo $this->get_field_id( 'description' ); ?>"
				   value="<?php echo esc_attr( $description ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance                = array();
		$instance['image']       = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

		return $instance;
	}
}

$venusDescriptionWidget = new VenusDescriptionWidget();
