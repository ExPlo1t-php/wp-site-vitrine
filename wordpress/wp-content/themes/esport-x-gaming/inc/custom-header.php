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
 * @package esport-x-gaming
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses esport_x_gaming_header_style()
 */
function esport_x_gaming_custom_header_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 155,
		'height'      => 44,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	add_theme_support( 'custom-header', array(
		'default-image'			=> get_theme_file_uri( '/images/bg-image.jpg' ),
		'default-text-color'	=> 'fff',
		'width'					=> 1400,
		'height'				=> 500,
		'flex-width'			=> true,
		'flex-height'			=> true,
		'wp-head-callback'		=> 'esport_x_gaming_header_style',
	) );
	register_default_headers( array(
		'header-bg' => array(
			'url'           => get_theme_file_uri( '/images/bg-image.jpg' ),
			'thumbnail_url' => get_theme_file_uri( '/images/bg-image.jpg' ),
			'description'   => _x( 'Default', 'Default header image', 'esport-x-gaming' )
		),	
	) );

}
add_action( 'after_setup_theme', 'esport_x_gaming_custom_header_setup', 999 );

if ( ! function_exists( 'esport_x_gaming_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see esport_x_gaming_custom_header_setup().
	 */
	function esport_x_gaming_header_style() {
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
