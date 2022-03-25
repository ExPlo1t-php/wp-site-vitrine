<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Ecommerce
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('classic_ecommerce_preloader', true) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php } ?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-ecommerce' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'classic_ecommerce_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

<?php if ( get_theme_mod('classic_ecommerce_top_bar', true) != "") { ?>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-7">
          <p><?php echo esc_html(get_theme_mod ('classic_ecommerce_offer_text','')); ?></p>
        </div>
        <div class="col-lg-5 col-md-5">
          <div class="social-icons">
            <?php if ( get_theme_mod('classic_ecommerce_fb_link') != "") { ?>
              <a title="<?php esc_attr('facebook', 'classic-ecommerce'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_ecommerce_fb_link')); ?>"><i class="fab fa-facebook-f"></i></a> 
            <?php } ?>
            <?php if ( get_theme_mod('classic_ecommerce_twitt_link') != "") { ?>
              <a title="<?php esc_attr('twitter', 'classic-ecommerce'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_ecommerce_twitt_link')); ?>"><i class="fab fa-twitter"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('classic_ecommerce_linked_link') != "") { ?> 
              <a title="<?php esc_attr('linkedin', 'classic-ecommerce'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_ecommerce_linked_link')); ?>"><i class="fab fa-linkedin-in"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('classic_ecommerce_insta_link') != "") { ?> 
              <a title="<?php esc_attr('instagram', 'classic-ecommerce'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_ecommerce_insta_link')); ?>"><i class="fab fa-instagram"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('classic_ecommerce_youtube_link') != "") { ?> 
              <a title="<?php esc_attr('youtube', 'classic-ecommerce'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_ecommerce_youtube_link')); ?>"><i class="fab fa-youtube"></i></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-8 col-8 align-self-center">
        <div class="logo">
          <?php classic_ecommerce_the_custom_logo(); ?>
          <div class="site-branding-text">
            <?php if ( get_theme_mod('classic_ecommerce_title_enable',true) != "") { ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } ?>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
              <?php if ( get_theme_mod('classic_ecommerce_tagline_enable',true) != "") { ?>
              <span class="site-description"><?php echo esc_html( $description ); ?></span>
              <?php } ?>
            <?php endif; ?> 
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-4 col-4 align-self-center">
        <div class="toggle-nav">
          <?php if(has_nav_menu('primary')){ ?>
            <button role="tab"><?php esc_html_e('MENU','classic-ecommerce'); ?></button>
          <?php }?>
        </div>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','classic-ecommerce' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) ); 
            } ?>
            <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','classic-ecommerce'); ?></a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if(class_exists('woocommerce')){ ?>  
  <div class="category-meta">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <button class="category-btn"><i class="fa fa-bars" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('classic_ecommerce_category_text','CATEGORIES','classic-ecommerce')); ?></button>
          <div class="category-dropdown">
            <?php
              $args = array(
                'number'     => get_theme_mod('classic_ecommerce_product_category_number'),
                'orderby'    => 'title',
                'order'      => 'ASC',
                'hide_empty' => 0,
                'parent'  => 0
              );
              $product_categories = get_terms( 'product_cat', $args );
              $count = count($product_categories);
              if ( $count > 0 ){
                foreach ( $product_categories as $product_category ) {
                  $classic_ecommerce_cat_id   = $product_category->term_id;
                  $cat_link = get_category_link( $classic_ecommerce_cat_id );
                  if ($product_category->category_parent == 0) { ?>
                <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                <?php
              }
                echo esc_html( $product_category->name ); ?></a></li>
                <?php
                }
              }
            ?>
          </div>
        </div>
        <div class="col-lg-7 col-md-7">
          <div class="product-search">
            <?php get_product_search_form(); ?>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-6">
          <div class="product-account">
            <?php if ( is_user_logged_in() ) { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','classic-ecommerce'); ?>"><i class="fas fa-sign-in-alt"></i></a>
            <?php } 
            else { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','classic-ecommerce'); ?>"><i class="fas fa-user"></i></a>
            <?php } ?>
          </div>  
        </div>
        <div class="col-lg-1 col-md-1 col-6">
          <div class="product-cart">
            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','classic-ecommerce' ); ?>"><i class="fas fa-shopping-cart"></i></a>
            <span class="item-count"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }?>