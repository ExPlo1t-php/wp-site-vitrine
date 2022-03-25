<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package ecocoded
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses ecocoded_header_style()
 */
function ecocoded_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ecocoded_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'flex-height'            => true,
		'wp-head-callback'       => 'ecocoded_header_style',
		) ) );
}
add_action( 'after_setup_theme', 'ecocoded_custom_header_setup' );

if ( ! function_exists( 'ecocoded_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see ecocoded_custom_header_setup().
	 */
function ecocoded_header_style() {
	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) ){
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
		<style type="text/css">
	

	
<?php
if(get_header_image()){ ?>
	
.sheader,
.home .sheader {
	background-image: url(<?php header_image(); ?>) !important;
	background-size:cover;
}
<?php } ?>


	.site-title a,
		.site-description,
		.logofont {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}

	<?php if ( ! display_header_text() ) : ?>
a.logofont, .logofont-site-description {
    opacity: 0;
    height: 0;
    width: 0;
    overflow: hidden;
}
	<?php endif; ?>

		<?php header_image(); ?>"
		<?php
		if ( ! display_header_text() ) :
			?>
a.logofont, .logofont-site-description {
    opacity: 0;
    height: 0;
    width: 0;
    overflow: hidden;
}
		<?php
		else :
			?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		<?php endif; ?>
		</style>
		<?php
	}
	endif;
