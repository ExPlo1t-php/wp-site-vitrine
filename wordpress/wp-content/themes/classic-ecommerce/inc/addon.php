<?php
/*
 * @package Classic Ecommerce
 */

function classic_ecommerce_admin_enqueue_scripts() {
	wp_enqueue_style( 'classic-ecommerce-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'classic_ecommerce_admin_enqueue_scripts' );

add_action('after_switch_theme', 'classic_ecommerce_options');

function classic_ecommerce_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=classic-ecommerce' ) );
		exit;
	}
}

if ( ! defined( 'CLASSIC_ECOMMERCE_SUPPORT' ) ) {
define('CLASSIC_ECOMMERCE_SUPPORT',__('https://wordpress.org/support/theme/classic-ecommerce','classic-ecommerce'));
}
if ( ! defined( 'CLASSIC_ECOMMERCE_REVIEW' ) ) {
define('CLASSIC_ECOMMERCE_REVIEW',__('https://wordpress.org/support/theme/classic-ecommerce/reviews/#new-post','classic-ecommerce'));
}
if ( ! defined( 'CLASSIC_ECOMMERCE_PRO_DEMO' ) ) {
define('CLASSIC_ECOMMERCE_PRO_DEMO',__('https://www.theclassictemplates.com/demo/classic-ecommerce/','classic-ecommerce'));
}
if ( ! defined( 'CLASSIC_ECOMMERCE_THEME_PAGE' ) ) {
define('CLASSIC_ECOMMERCE_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','classic-ecommerce'));
}
if ( ! defined( 'CLASSIC_ECOMMERCE_PREMIUM_PAGE' ) ) {
define('CLASSIC_ECOMMERCE_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/wordpress-ecommerce-template/','classic-ecommerce'));
}

function classic_ecommerce_theme_info_menu_link() {

	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'classic-ecommerce' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'classic-ecommerce' ),'edit_theme_options','classic-ecommerce','classic_ecommerce_theme_info_page'
	);
}
add_action( 'admin_menu', 'classic_ecommerce_theme_info_menu_link' );

function classic_ecommerce_theme_info_page() {

	$theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'classic-ecommerce' ), esc_html($theme->display( 'Name', 'classic-ecommerce'  )),esc_html($theme->display( 'Version', 'classic-ecommerce' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'classic-ecommerce' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'classic-ecommerce' ); ?>:</strong>
			<a href="<?php echo esc_url( CLASSIC_ECOMMERCE_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'classic-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_ECOMMERCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'classic-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_ECOMMERCE_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'classic-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_ECOMMERCE_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'classic-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( CLASSIC_ECOMMERCE_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'classic-ecommerce' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'classic-ecommerce' ), 
		esc_html($theme->display( 'Name', 'classic-ecommerce' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'classic-ecommerce' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'classic-ecommerce' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'classic-ecommerce' ),esc_html($theme->display( 'Name', 'classic-ecommerce' ))); ?></p>
					<p>
					<a href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'classic-ecommerce' ); ?></a>
					<a href="<?php echo esc_url( CLASSIC_ECOMMERCE_PREMIUM_PAGE ); ?>" target="_blank" class="button button-secondary premium-btn"><?php esc_html_e( 'Checkout Premium', 'classic-ecommerce' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'classic-ecommerce' ),
			esc_html($theme->display( 'Name', 'classic-ecommerce' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'classic-ecommerce' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( CLASSIC_ECOMMERCE_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'classic-ecommerce' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'classic-ecommerce' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
