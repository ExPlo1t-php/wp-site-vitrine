<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecocoded
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#content"> <?php _e( 'Skip to content', 'ecocoded' ); ?></a>
	<div id="page" class="site <?php if ( get_theme_mod( 'hide_sidebar' ) == '1' ) : ?>hide-sidebar<?php endif; ?>">

		<header id="masthead" class="sheader site-header clearfix">
			<nav id="primary-site-navigation" class="primary-menu main-navigation clearfix">

				<a href="#" id="pull" class="smenu-hide toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'ecocoded' ); ?></a>
				<div class="top-nav-wrapper">
					<div class="content-wrap">
						<div class="logo-container"> 

							<?php if ( has_custom_logo() ) : ?>
								<?php the_custom_logo(); ?>
								<?php else : ?>
									<a class="logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
								<?php endif; ?>
							</div>
							<div class="center-main-menu"> 
								<?php
								wp_nav_menu( array(
									'theme_location'	=> 'menu-1',
									'menu_id'			=> 'primary-menu',
									'menu_class'		=> 'pmenu'
								) );
								?>
							</div>
						</div>
					</div>
				</nav>

				<div class="super-menu clearfix">
					<div class="super-menu-inner">
						

						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
							<?php else : ?>
								<a class="logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							<?php endif; ?>
							<a href="#" id="pull" class="toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false"></a>
						</div>
					</div>
					<div id="mobile-menu-overlay"></div>

					<!-- Header bg start-->
					<?php if ( is_front_page() ) : ?>
						<!-- Header img -->
						<?php if (get_theme_mod('header_img_text') || get_theme_mod('header_img_text_tagline') ) : ?>
						<div class="header-content-wrap-outer">
							<div class="header-content-wrap">
								<?php if (get_theme_mod('header_img_text') ) : ?>
									<div class="bottom-header-title"><?php echo wp_kses_post(get_theme_mod('header_img_text')) ?></div>
								<?php endif; ?>
								<?php if (get_theme_mod('header_img_text_tagline') ) : ?>
									<div class="bottom-header-paragraph"><?php echo wp_kses_post(get_theme_mod('header_img_text_tagline')) ?></div>
								<?php endif; ?>
								<!-- Button-->
								<?php if ( get_theme_mod( 'header_button_text') ) : ?>
									<div class="buttons-wrapper">
										<?php if (get_theme_mod('header_button_text') ) : ?>
											<a href="<?php echo esc_url(get_theme_mod('header_button_link')) ?>" class="header-button-solid"><?php echo wp_kses_post(get_theme_mod('header_button_text')) ?></a>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<!--Buttons -->
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				<!-- Header bg start-->
			</header>


			<!-- Top widgets start -->
			<div class="content-wrap">
				<!-- Upper widgets -->
				<div class="header-widgets-wrapper">
					<?php if ( is_active_sidebar( 'headerwidget-1' ) ) : ?>
						<div class="header-widgets-three header-widgets-left">
							<?php dynamic_sidebar( 'headerwidget-1' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'headerwidget-2' ) ) : ?>
						<div class="header-widgets-three header-widgets-middle">
							<?php dynamic_sidebar( 'headerwidget-2' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'headerwidget-3' ) ) : ?>
						<div class="header-widgets-three header-widgets-right">
							<?php dynamic_sidebar( 'headerwidget-3' ); ?>				
						</div>
					<?php endif; ?>
				</div>
			</div>


			<div id="content" class="site-content clearfix">
				<div class="content-wrap">