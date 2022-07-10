<?php

if ( class_exists( 'WP_Customize_Control' ) ) {
	if ( ! class_exists( 'VenusSeparatorControl' ) ) {
		class VenusSeparatorControl extends WP_Customize_Control {
			public function render_content() {
				echo '<hr/>';
			}
		}
	}
}
