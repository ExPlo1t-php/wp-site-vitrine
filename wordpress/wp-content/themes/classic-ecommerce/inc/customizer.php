<?php
/**
 * Classic Ecommerce Theme Customizer
 *
 * @package Classic Ecommerce
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_ecommerce_customize_register( $wp_customize ) {

	function classic_ecommerce_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	function classic_ecommerce_sanitize_number_absint( $number, $setting ) {
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint( $number );
		
		// If the input is an absolute integer, return it; otherwise, return the default
		return ( $number ? $number : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_setting('classic_ecommerce_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'classic_ecommerce_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_ecommerce_title_enable', array(
	   'settings' => 'classic_ecommerce_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-ecommerce'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_ecommerce_tagline_enable',array(
		'default' => true,
		'sanitize_callback' => 'classic_ecommerce_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_ecommerce_tagline_enable', array(
	   'settings' => 'classic_ecommerce_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-ecommerce'),
	   'type'      => 'checkbox'
	));

	//Theme Options
	$wp_customize->add_panel( 'classic_ecommerce_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-ecommerce' ),
	) );
	
	//Site Layout Section
	$wp_customize->add_section('classic_ecommerce_site_layoutsec',array(
		'title'	=> __('Site Layout','classic-ecommerce'),
		'priority'	=> 1,
		'panel' => 'classic_ecommerce_panel_area',
	));		
	
	$wp_customize->add_setting('classic_ecommerce_box_layout',array(
		'sanitize_callback' => 'classic_ecommerce_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'classic_ecommerce_box_layout', array(
	   'section'   => 'classic_ecommerce_site_layoutsec',
	   'label'	=> __('Check to Box Layout','classic-ecommerce'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_ecommerce_preloader',array(
		'default' => true,
		'sanitize_callback' => 'classic_ecommerce_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'classic_ecommerce_preloader', array(
	   'section'   => 'classic_ecommerce_site_layoutsec',
	   'label'	=> __('Check to remove preloader','classic-ecommerce'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_ecommerce_top_bar',array(
		'default' => true,
		'sanitize_callback' => 'classic_ecommerce_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'classic_ecommerce_top_bar', array(
	   'section'   => 'classic_ecommerce_site_layoutsec',
	   'label'	=> __('Check to remove top bar','classic-ecommerce'),
	   'type'      => 'checkbox'
 	)); 

 	// Header Section
	$wp_customize->add_section('classic_ecommerce_header_section', array(
        'title' => __('Header Section', 'classic-ecommerce'),
        'priority' => null,
		'panel' => 'classic_ecommerce_panel_area',
 	));

	$wp_customize->add_setting('classic_ecommerce_offer_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_offer_text', array(
	   'settings' => 'classic_ecommerce_offer_text',
	   'section'   => 'classic_ecommerce_header_section',
	   'label' => __('Add Offer Text', 'classic-ecommerce'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_ecommerce_category_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_category_text', array(
	   'settings' => 'classic_ecommerce_category_text',
	   'section'   => 'classic_ecommerce_header_section',
	   'label' => __('Add Category Text', 'classic-ecommerce'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_ecommerce_product_category_number',array(
		'default' => '',
		'sanitize_callback' => 'classic_ecommerce_sanitize_number_absint',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_product_category_number', array(
	   'settings' => 'classic_ecommerce_product_category_number',
	   'section'   => 'classic_ecommerce_header_section',
	   'label' => __('Add Category Limit', 'classic-ecommerce'),
	   'type'      => 'number'
	));

	// Social media Section
	$wp_customize->add_section('classic_ecommerce_social_media_section', array(
        'title' => __('Social media Section', 'classic-ecommerce'),
        'priority' => null,
		'panel' => 'classic_ecommerce_panel_area',
 	));

	$wp_customize->add_setting('classic_ecommerce_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_fb_link', array(
	   'settings' => 'classic_ecommerce_fb_link',
	   'section'   => 'classic_ecommerce_social_media_section',
	   'label' => __('Facebook Link', 'classic-ecommerce'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_ecommerce_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_twitt_link', array(
	   'settings' => 'classic_ecommerce_twitt_link',
	   'section'   => 'classic_ecommerce_social_media_section',
	   'label' => __('Twitter Link', 'classic-ecommerce'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_ecommerce_linked_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_linked_link', array(
	   'settings' => 'classic_ecommerce_linked_link',
	   'section'   => 'classic_ecommerce_social_media_section',
	   'label' => __('Linkdin Link', 'classic-ecommerce'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_ecommerce_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_insta_link', array(
	   'settings' => 'classic_ecommerce_insta_link',
	   'section'   => 'classic_ecommerce_social_media_section',
	   'label' => __('Instagram Link', 'classic-ecommerce'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_ecommerce_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_youtube_link', array(
	   'settings' => 'classic_ecommerce_youtube_link',
	   'section'   => 'classic_ecommerce_social_media_section',
	   'label' => __('Youtube Link', 'classic-ecommerce'),
	   'type'      => 'url'
	));

	// Home Category Dropdown Section
	$wp_customize->add_section('classic_ecommerce_one_cols_section',array(
		'title'	=> __('Manage Slider','classic-ecommerce'),
		'description'	=> __('Select Category from the Dropdowns for slider, Also use the given image dimension (1200 x 450).','classic-ecommerce'),
		'priority'	=> null,
		'panel' => 'classic_ecommerce_panel_area'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'classic_ecommerce_slidersection', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Classic_Ecommerce_Category_Dropdown_Custom_Control( $wp_customize, 'classic_ecommerce_slidersection', array(
		'section' => 'classic_ecommerce_one_cols_section',
		'settings'   => 'classic_ecommerce_slidersection',
	) ) );

	$wp_customize->add_setting('classic_ecommerce_button_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_button_text', array(
	   'settings' => 'classic_ecommerce_button_text',
	   'section'   => 'classic_ecommerce_one_cols_section',
	   'label' => __('Add Button Text', 'classic-ecommerce'),
	   'type'      => 'text'
	));
	
	//Hide Section
	$wp_customize->add_setting('classic_ecommerce_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'classic_ecommerce_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'classic_ecommerce_hide_categorysec', array(
	   'settings' => 'classic_ecommerce_hide_categorysec',
	   'section'   => 'classic_ecommerce_one_cols_section',
	   'label'     => __('Check To Enable This Section','classic-ecommerce'),
	   'type'      => 'checkbox'
	));

	// Product Section
	$wp_customize->add_section('classic_ecommerce_two_cols_section',array(
		'title'	=> __('Manage Recent product','classic-ecommerce'),
		'description'	=> __('Add the below section title, Then use given shortcodes to show products. [products limit="4" columns="2" visibility="featured" ], [products limit="3" columns="3" best_selling="true" ], 
[products limit="8" columns="4" category="hoodies" cat_operator="AND"]','classic-ecommerce'),
		'priority'	=> null,
		'panel' => 'classic_ecommerce_panel_area'
	));
	
	$wp_customize->add_setting('classic_ecommerce_recent_product_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_ecommerce_recent_product_title', array(
	   'settings' => 'classic_ecommerce_recent_product_title',
	   'section'   => 'classic_ecommerce_two_cols_section',
	   'label'     => __('Add Section Title','classic-ecommerce'),
	   'type'      => 'text'
	));

	// Footer Section 
	$wp_customize->add_section('classic_ecommerce_footer', array(
		'title'	=> __('Footer Section','classic-ecommerce'),
		'priority'	=> null,
		'panel' => 'classic_ecommerce_panel_area',
	));

	$wp_customize->add_setting('classic_ecommerce_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'classic_ecommerce_copyright_line', array(
	   'section' 	=> 'classic_ecommerce_footer',
	   'label'	 	=> __('Copyright Line','classic-ecommerce'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	$wp_customize->add_setting('classic_ecommerce_color_scheme_one',array(
		'default' => '#f6e264',
		'sanitize_callback' => 'sanitize_hex_color',
	));
    $wp_customize->add_control( 
	    new WP_Customize_Color_Control( 
	    $wp_customize, 
	    'classic_ecommerce_color_scheme_one', 
	    array(
	        'label'      => __( 'Color Scheme 1', 'classic-ecommerce' ),
	        'section'    => 'colors',
	        'settings'   => 'classic_ecommerce_color_scheme_one',
	    ) ) 
	);

    //Color
	$wp_customize->add_setting('classic_ecommerce_color_scheme_two',array(
		'default' => '#252525',
		'sanitize_callback' => 'sanitize_hex_color',
	));
    $wp_customize->add_control( 
	    new WP_Customize_Color_Control( 
	    $wp_customize, 
	    'classic_ecommerce_color_scheme_two', 
	    array(
	        'label'      => __( 'Color Scheme 2', 'classic-ecommerce' ),
	        'section'    => 'colors',
	        'settings'   => 'classic_ecommerce_color_scheme_two',
	    ) )
	);

    // Google Fonts
    $wp_customize->add_section( 'classic_ecommerce_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'classic-ecommerce' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i:' => 'Montserrat',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'classic_ecommerce_headings_fonts', array(
		'sanitize_callback' => 'classic_ecommerce_sanitize_fonts',
	));
	$wp_customize->add_control( 'classic_ecommerce_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'classic-ecommerce'),
		'section' => 'classic_ecommerce_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'classic_ecommerce_body_fonts', array(
		'sanitize_callback' => 'classic_ecommerce_sanitize_fonts'
	));
	$wp_customize->add_control( 'classic_ecommerce_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'classic-ecommerce' ),
		'section' => 'classic_ecommerce_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting('classic_ecommerce_woocommerce_sidebar_shop',array(
		'sanitize_callback' => 'classic_ecommerce_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_ecommerce_woocommerce_sidebar_shop', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from shop page.','classic-ecommerce'),
	   'label'	=> __('Shop Page Sidebar layout','classic-ecommerce'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_ecommerce_woocommerce_sidebar_product',array(
		'sanitize_callback' => 'classic_ecommerce_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_ecommerce_woocommerce_sidebar_product', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from product page.','classic-ecommerce'),
	   'label'	=> __('Product Page Sidebar layout','classic-ecommerce'),
	   'type'      => 'checkbox'
 	));
}
add_action( 'customize_register', 'classic_ecommerce_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_ecommerce_customize_preview_js() {
	wp_enqueue_script( 'classic_ecommerce_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_ecommerce_customize_preview_js' );