<?php 

$classic_ecommerce_color_scheme_one = get_theme_mod('classic_ecommerce_color_scheme_one');

$classic_ecommerce_color_scheme_css = "";

if($classic_ecommerce_color_scheme_one != false){

  $classic_ecommerce_color_scheme_css .='.header-top,
  .category-btn,
  .product-search button[type="submit"],
  span.item-count,
  .pagemore:hover,
  .shop-now a:hover,
  #commentform input#submit:hover,
  #sidebar input.search-submit, 
  form.woocommerce-product-search button,
  .woocommerce ul.products li.product .button:hover,
  .woocommerce #respond input#submit.alt:hover,
  .woocommerce a.button.alt:hover,
  .woocommerce button.button.alt:hover,
  .woocommerce input.button.alt:hover,
  .woocommerce a.button:hover,
  .woocommerce button.button:hover,
  nav.woocommerce-MyAccount-navigation ul li:hover,
  .catwrapslider .owl-prev:hover,
  .catwrapslider .owl-next:hover{';

  $classic_ecommerce_color_scheme_css .='background: '.esc_attr($classic_ecommerce_color_scheme_one).' !important;';

  $classic_ecommerce_color_scheme_css .='}';

  $classic_ecommerce_color_scheme_css .='.product-search form.woocommerce-product-search,
  .shop-now a:hover{';

  $classic_ecommerce_color_scheme_css .='border-color: '.esc_attr($classic_ecommerce_color_scheme_one).' !important;';

  $classic_ecommerce_color_scheme_css .='}';

  $classic_ecommerce_color_scheme_css .='.main-nav a:hover,
  #sidebar ul li a:hover,
  .category-dropdown li a:hover,
  .listarticle h2 a:hover,
  .ftr-4-box h5 span{';

  $classic_ecommerce_color_scheme_css .='color: '.esc_attr($classic_ecommerce_color_scheme_one).' !important;';

  $classic_ecommerce_color_scheme_css .='}';
}

$classic_ecommerce_color_scheme_two = get_theme_mod('classic_ecommerce_color_scheme_two');

if($classic_ecommerce_color_scheme_two != false){

  $classic_ecommerce_color_scheme_css .='.header,
  .copywrap,
  .category-dropdown,
  #commentform input#submit{';

  $classic_ecommerce_color_scheme_css .='background: '.esc_attr($classic_ecommerce_color_scheme_two).' !important;';

  $classic_ecommerce_color_scheme_css .='}';

  $classic_ecommerce_color_scheme_css .='#sidebar input[type="text"], 
  #sidebar input[type="search"],
  .pagemore,
  #sidebar select,
  .shop-now a,
  .owl-prev, 
  .owl-next,
  nav.woocommerce-MyAccount-navigation ul li,
  select.orderby,
  .woocommerce ul.products li.product .button, 
  .woocommerce #respond input#submit.alt, 
  .woocommerce a.button.alt, 
  .woocommerce button.button.alt, 
  .woocommerce input.button.alt, 
  .woocommerce a.button, 
  .woocommerce button.button,
  .woocommerce .quantity .qty{';

  $classic_ecommerce_color_scheme_css .='border-color: '.esc_attr($classic_ecommerce_color_scheme_two).' !important;';

  $classic_ecommerce_color_scheme_css .='}';

  $classic_ecommerce_color_scheme_css .='h3.widget-title,
  .category-btn,
  .header-top p,
  .social-icons i,
  h1, h2, h3, h4, h5, h6,
  .product-search button[type="submit"],
  .listarticle h2 a,
  .pagemore,
  .slider-box h3, 
  #recent-product h3,
  button.owl-prev span, 
  button.owl-next span,
  .shop-now a,
  .woocommerce ul.products li.product .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.button, .woocommerce button.button,
  span.onsale,
  nav.woocommerce-MyAccount-navigation ul li a{';

  $classic_ecommerce_color_scheme_css .='color: '.esc_attr($classic_ecommerce_color_scheme_two).' !important;';

  $classic_ecommerce_color_scheme_css .='}';
}