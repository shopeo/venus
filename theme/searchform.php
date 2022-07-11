<?php
$venus_unique_id  = venus_unique_id( 'search-form-' );
$venus_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
if ( empty( $venus_aria_label ) && ! empty( $args['label'] ) ) {
	$venus_aria_label = 'aria-label="' . esc_attr( $args['label'] ) . '"';
}
?>
<form role="search" <?php echo $venus_aria_label; ?> method="get" class="search-form"
	  action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<label for="<?php echo esc_attr( $venus_unique_id ); ?>">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'venus' ); ?></span>
		<input type="search" id="" class="search-field"
			   placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'venus' ); ?>"
			   value="<?php echo get_search_query(); ?>" name="s"/>
	</label>
	<button type="submit" class="search-submit"><?php echo esc_attr_x( 'Search', 'submit button', 'venus' ); ?></button>
</form>
