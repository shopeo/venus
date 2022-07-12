<?php
$venus_unique_id  = venus_unique_id( 'search-form-' );
$venus_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
if ( empty( $venus_aria_label ) && ! empty( $args['label'] ) ) {
	$venus_aria_label = 'aria-label="' . esc_attr( $args['label'] ) . '"';
}
?>
<form role="search" <?php echo $venus_aria_label; ?> method="get" class="search-form"
	  action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<label class="relative" for="<?php echo esc_attr( $venus_unique_id ); ?>">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'venus' ); ?></span>
		<i class="absolute fas fa-search mt-2 ml-4 text-neutral-400"></i>
		<input type="text" id="<?php echo esc_attr( $venus_unique_id ); ?>"
			   class="search-field h-8 rounded-full pl-10 bg-neutral-50 placeholder-neutral-400 border-2 border-neutral-50 focus:border-primary-500 focus:ring-0"
			   placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'venus' ); ?>"
			   value="<?php echo get_search_query(); ?>" name="s"/>
	</label>
</form>
