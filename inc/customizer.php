<?php
/**
 * bloggr Theme Customizer
 *
 * @package bloggr
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shopline2018_customize_register( $wp_customize ) {
	
	
	   
	// Fonts  
    $wp_customize->add_section(
        'shopline2018_typography',
        array(
            'title' => __('Google Fonts'),    
            'priority' => 80,
    ));
	
    $font_choices = 
        array(
			'Rajdhani:400,300,500,600,700' => 'Rajdhani', 
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
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
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'shopline2018_sanitize_fonts', 
    ));
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
            'description' => __('Select your desired font for the headings. Rajdhani is the default Heading font.', 'bloggr'),
            'section' => 'shopline2018_typography',
            'choices' => $font_choices
    ));
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'shopline2018_sanitize_fonts',
    ));
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
            'description' => __( 'Select your desired font for the body. Rajdhani is the default Body font.'), 
            'section' => 'shopline2018_typography',
            'choices' => $font_choices 
    ));
	
	//Animations
	$wp_customize->add_section( 'shopline2018_animations' , array(  
	    'title'       => __( 'Hover Animations'),
	    'priority'    => 22, 
	    'description' => 'How about a nice little blog hover?',
	) );
	
    $wp_customize->add_setting(
        'shopline2018_animate',
        array(
            'sanitize_callback' => 'shopline2018_sanitize_checkbox',
            'default' => 0,
        )       
    );
	
    $wp_customize->add_control( 
        'shopline2018_animate',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box if you want to disable the hover animations.', 'bloggr'),
            'section' => 'shopline2018_animations',  
            'priority' => 1,           
        )
    );

	// Colors
    $wp_customize->add_setting( 'shopline2018_link_color', array( 
        'default'     => '',   
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopline2018_link_color', array(
        'label'	   => 'Link Color', 
        'section'  => 'colors',
        'settings' => 'shopline2018_link_color',
		'priority' => 30 
    )));
	
	$wp_customize->add_setting( 'shopline2018_hover_color', array(
        'default'     => '',   
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopline2018_hover_color', array(
        'label'	   => __( 'Hover Color'),
        'section'  => 'colors',
        'settings' => 'shopline2018_hover_color',
		'priority' => 40
    )));
	
	$wp_customize->add_setting( 'shopline2018_custom_color', array( 
        'default'     => '', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopline2018_custom_color', array(
        'label'	   => __( 'Theme Color'),
        'section'  => 'colors',
        'settings' => 'shopline2018_custom_color', 
		'priority' => 10
    )));
	
	$wp_customize->add_setting( 'shopline2018_custom_color_hover', array( 
        'default'     => '', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopline2018_custom_color_hover', array(
        'label'	   => __( 'Theme Hover Color'),
        'section'  => 'colors',
        'settings' => 'shopline2018_custom_color_hover', 
		'priority' => 20
    )));
	

	
	
	// Home Social Panel
	$wp_customize->add_panel( 'social_panel', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Social Section',
    'description'    => 'Edit your home page social media icons',
	));
	
	// Social Section 
	$wp_customize->add_section( 'shopline2018_settings', array(
            'title'          => 'Social Media Icons',
            'priority'       => 38,
			'panel' => 'social_panel',  
    ) );
	
	// Home Social Section 
	$wp_customize->add_setting('active_social',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 
    'active_social', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Home Social Section',  
        'section' => 'shopline2018_settings', 
		'priority'   => 10
    ));
	
	// Facebook
	$wp_customize->add_setting( 'shopline2018_fb',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_fb', array(
		'label'    => __( 'Facebook URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_fb',
		'priority'   => 20
	))); 
	
	// Twitter
	$wp_customize->add_setting( 'shopline2018_twitter',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_twitter', array(
		'label'    => __( 'Twitter URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_twitter',
		'priority'   => 30
	))); 
	
	// LinkedIn
	$wp_customize->add_setting( 'shopline2018_linked',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_linked', array(
		'label'    => __( 'LinkedIn URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_linked',
		'priority'   => 40
	)));
	
	// Google Plus
	$wp_customize->add_setting( 'shopline2018_google',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_google', array(
		'label'    => __( 'Google Plus URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_google',
		'priority'   => 50
	)));
	
	// Instagram
	$wp_customize->add_setting( 'shopline2018_instagram',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_instagram', array(
		'label'    => __( 'Instagram URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_instagram',
		'priority'   => 60
	)));
	
	// Flickr
	$wp_customize->add_setting( 'shopline2018_flickr',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_flickr', array(
		'label'    => __( 'Flickr URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_flickr',
		'priority'   => 70
	)));
	
	// Pinterest
	$wp_customize->add_setting( 'shopline2018_pinterest',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_pinterest', array(
		'label'    => __( 'Pinterest URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_pinterest',
		'priority'   => 80
	)));
	
	// Youtube
	$wp_customize->add_setting( 'shopline2018_youtube',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_youtube', array(
		'label'    => __( 'YouTube URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_youtube',  
		'priority'   => 90
	)));
	
	// Vimeo
	$wp_customize->add_setting( 'shopline2018_vimeo',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_vimeo', array(
		'label'    => __( 'Vimeo URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_vimeo',
		'priority'   => 100
	)));
	
	// RSS
	$wp_customize->add_setting( 'shopline2018_rss',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_rss', array(
		'label'    => __( 'RSS URL:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_rss',
		'priority'   => 130
	)));
	
	// MAIL
	$wp_customize->add_setting( 'shopline2018_mail',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_mail', array(
		'label'    => __( 'MAIL TO:'),
		'section'  => 'shopline2018_settings', 
		'settings' => 'shopline2018_mail',
		'priority'   => 140
	)));	
	// Home Page Panel
	$wp_customize->add_panel( 'home_panel', array(
    'priority'       => 26, 
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Home Page Section'),
    'description'    => __( 'Edit your home page settings'), 
	));
	
	// Newest Stories Section
	$wp_customize->add_section( 'shopline2018_newest_section', array(
		'title'          => __( 'Newest Stories'),
		'priority'       => 10,
		'description' => __( 'Edit your Newest Stories content. Choose from any of <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">these icons</a>. Example: "fa-arrow-right".'),
		'panel' => 'home_panel', 
	));
	
	// Home Newest Section
	$wp_customize->add_setting('active_newest',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_checkbox',
	    ) 
	); 
	
	$wp_customize->add_control( 
    'active_newest',
    array(
        'type' => 'checkbox',
        'label' => __( 'Hide Newest Stories Section'),  
        'section' => 'shopline2018_newest_section', 
		'priority'   => 10
    ));
	
	// Newest Stories Title
	$wp_customize->add_setting( 'newest_text' ,
	    array(
			'default' => __( 'Newest Stories'), 
	        'sanitize_callback' => 'shopline2018_sanitize_text',
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'newest_text', array(
		'label'    => __( 'Newest Stories Title Text'),
		'section'  => 'shopline2018_newest_section', 
		'settings' => 'newest_text',  
		'priority'   => 20
	)));
	
	// Newest Stories Icon
	$wp_customize->add_setting( 'newest_icon' ,
	    array(
			'default' => 'fa-clock-o', 
	        'sanitize_callback' => 'shopline2018_sanitize_text',
	)); 
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'newest_icon', array(
		'label'    => __( 'Newest Stories Icon'),
		'section'  => 'shopline2018_newest_section', 
		'settings' => 'newest_icon',  
		'priority'   => 30
	)));
	
	// Trending Stories Section
	$wp_customize->add_section( 'shopline2018_trending_section', array(
		'title'          => __( 'Trending Stories'),
		'priority'       => 20,
		'description' => __( 'Edit your Trending Stories content. Choose from any of <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">these icons</a>. Example: "fa-arrow-right".'),
		'panel' => 'home_panel', 
	));
	
	// Home Trending Section 
	$wp_customize->add_setting('active_trending',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_checkbox',
	    ) 
	); 
	
	$wp_customize->add_control( 
    'active_trending',
    array(
        'type' => 'checkbox',
        'label' => __( 'Hide Trending Stories Section'), 
        'section' => 'shopline2018_trending_section', 
		'priority'   => 10
    ));
	
	// Trending Stories Title
	$wp_customize->add_setting( 'trending_text' ,
	    array(
			'default' => __( 'Trending Stories'),
	        'sanitize_callback' => 'shopline2018_sanitize_text',
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trending_text', array(
		'label'    => __( 'Trending Stories Title Text'),
		'section'  => 'shopline2018_trending_section', 
		'settings' => 'trending_text',  
		'priority'   => 20
	)));
	
	// Trending Stories Icon
	$wp_customize->add_setting( 'trending_icon' ,
	    array(
			'default' => 'fa-line-chart', 
	        'sanitize_callback' => 'shopline2018_sanitize_text',
	)); 
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trending_icon', array(
		'label'    => __( 'Trending Stories Icon'),
		'section'  => 'shopline2018_trending_section', 
		'settings' => 'trending_icon',  
		'priority'   => 30
	)));
	
	// Featured Stories Section
	$wp_customize->add_section( 'shopline2018_featured_section', array(
		'title'          => 'Featured Stories',
		'priority'       => 30,
		'description' => 'Edit your Featured Stories content. Choose from any of <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">these icons</a>. Example: "fa-arrow-right".',
		'panel' => 'home_panel', 
	));
	
	// Home Featured Section 
	$wp_customize->add_setting('active_featured',
	    array(
	        'sanitize_callback' => 'shopline2018_sanitize_checkbox',
	    ) 
	); 
	
	$wp_customize->add_control( 
    'active_featured',
    array(
        'type' => 'checkbox',
        'label' => 'Hide Featured Stories Section',   
        'section' => 'shopline2018_featured_section', 
		'priority'   => 10
    ));
	
	// Featured Stories Title
	$wp_customize->add_setting( 'featured_text' ,
	    array(
			'default' => 'Featured Stories', 
	        'sanitize_callback' => 'shopline2018_sanitize_text',
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_text', array(
		'label'    => __( 'Featured Stories Title Text'),
		'section'  => 'shopline2018_featured_section', 
		'settings' => 'featured_text',  
		'priority'   => 20
	)));
	
	// Featured Stories Icon
	$wp_customize->add_setting( 'featured_icon' ,
	    array(
			'default' => 'fa-star', 
	        'sanitize_callback' => 'shopline2018_sanitize_text',
	)); 
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_icon', array(
		'label'    => __( 'Featured Stories Icon'),
		'section'  => 'shopline2018_featured_section',  
		'settings' => 'featured_icon',  
		'priority'   => 30
	)));
	
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array(
    	'title' => __( 'Footer'),
    	'priority' => 35, 
    	'description' => __( 'Customize your footer area.')  
	) );
	
	// Footer Byline Text
	$wp_customize->add_setting( 'shopline2018_footer_copyright' ,array( 
	        'sanitize_callback' => 'shopline2018_sanitize_text',
	)); 
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_footer_copyright', array(
    'label' => __( 'Footer Copyright'),
    'section' => 'footer-custom',
    'settings' => 'shopline2018_footer_copyright', 
	'priority'   => 10
	) ) ); 


	// Footer Text
	$wp_customize->add_setting( 'shopline2018_footer_descr' ,array( 
	        'sanitize_callback' => 'shopline2018_no_sanitize',
	)); 
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_footer_descr', array(
    'label' => __( 'Footer descrtion'),
    'section' => 'footer-custom',
    'settings' => 'shopline2018_footer_descr', 
	'priority'   => 20
	) ) ); 

	// Choose excerpt or full content on blog
    $wp_customize->add_section( 'shopline2018_layout_section' , array( 
	    'title'       => __( 'Layout'),
	    'priority'    => 45, 
	    'description' => 'Change how bloggr displays posts', 
	));

	$wp_customize->add_setting( 'shopline2018_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'shopline2018_sanitize_index_content',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'shopline2018_post_content', array(
		'label'    => __( 'Post content'),
		'section'  => 'shopline2018_layout_section',
		'settings' => 'shopline2018_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'Excerpts',
			'option2' => 'Full content',
			),
	)));
	
	//Excerpt
    $wp_customize->add_setting(
        'exc_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
    ));
	
    $wp_customize->add_control( 'exc_length', array( 
        'type'        => 'number',
        'priority'    => 2, 
        'section'     => 'shopline2018_layout_section',
        'label'       => __('Excerpt length'),
        'description' => __('Choose your excerpt length here. Default: 30 words'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5
        ), 
	));  

	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Move sections up 
	$wp_customize->get_section('static_front_page')->priority = 10; 

	// Enqueue scripts for real-time preview
	wp_enqueue_script( 'shopline2018_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_register', 'shopline2018_customize_register' );

/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.7
 */
function shopline2018_sanitize_hex_color( $color ) {
	if ( '#FF0000' === $color ) 
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null;
}

/**
 * Sanitizes our post content value (either excerpts or full post content).
 *
 * @since 1.7
 */
function shopline2018_sanitize_index_content( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	} 
}

//Checkboxes
function shopline2018_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Integers
function shopline2018_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function shopline2018_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Sanitizes Fonts 
function shopline2018_sanitize_fonts( $input ) {  
    $valid = array(
			'Rajdhani:400,300,500,600,700' => 'Rajdhani',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
            'Oswald:400,700' => 'Oswald',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
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
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return ''; 
    }
}

//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function shopline2018_no_sanitize( $input ) {
	return $input;
} 

/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function shopline2018_add_customizer_css() {
	$color = shopline2018_sanitize_hex_color( get_theme_mod( 'shopline2018_link_color' ) );
	?>
	<!-- bloggr customizer CSS -->
<?php }
add_action( 'wp_head', 'shopline2018_add_customizer_css' ); 