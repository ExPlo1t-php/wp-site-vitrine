<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Ecommerce
 */

get_header(); ?>

<div id="content">
  <?php
    $hidcatslide = get_theme_mod('classic_ecommerce_hide_categorysec', true);
    if( $hidcatslide != ''){
  ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('classic_ecommerce_slidersection',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('classic_ecommerce_slidersection',true)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php the_post_thumbnail( 'full' ); ?>
                <div class="slider-box">
                  <h3><?php the_title(); ?></h3>
                  <?php
                    $trimexcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 20 );
                    echo '<p>' . esc_html( $shortexcerpt ) . '</p>'; 
                  ?>
                  <?php if ( get_theme_mod('classic_ecommerce_button_text') != "") { ?>
                    <div class="shop-now">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('classic_ecommerce_button_text','SHOP NOW','classic-ecommerce')); ?></a>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <section id="content-creation">
    <div class="container">
      <div id="recent-product">
        <?php if ( get_theme_mod('classic_ecommerce_recent_product_title') != "") { ?>
          <h3><?php echo esc_html(get_theme_mod('classic_ecommerce_recent_product_title','')); ?></h3>
        <?php } ?>
      </div>

      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>