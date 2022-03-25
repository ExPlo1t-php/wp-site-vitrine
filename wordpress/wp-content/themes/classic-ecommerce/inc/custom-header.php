<?php
/**
 * @package Classic Ecommerce
 * Setup the WordPress core custom header feature.
 *
 * @uses classic_ecommerce_header_style()
 */
function classic_ecommerce_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'classic_ecommerce_custom_header_args', array(		
		'default-text-color'     => 'fff',
		'width'                  => 2000,
		'height'                 => 280,
		'wp-head-callback'       => 'classic_ecommerce_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'classic_ecommerce_custom_header_setup' );

if ( ! function_exists( 'classic_ecommerce_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see classic_ecommerce_custom_header_setup().
 */
function classic_ecommerce_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat !important;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif;