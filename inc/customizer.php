<?php
	function twisty_customize_register($wp_customize){
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
     $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

  if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'render_callback' =>function() {
            bloginfo( 'name' );},
		) );
	}
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description a',
			'render_callback' =>function() {
            bloginfo( 'description' );},
		) );
	}

     


		// display Section
  		$wp_customize->add_section('display', array(
			'title'          => __('Display', 'twisty'),
			'description'    => sprintf( __('Options for display area', 'twisty')
			),
			'priority'       => 130,
		));

		// Image Setting
		  $wp_customize->add_setting('display_image', array(
		    'default' => get_template_directory_uri() . '/img/display.jpg',
		    'type'    => 'theme_mod'

		 ));

		 // Image Control
		 $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'display_image', array(
		     'label'    => __('Display background image', 'twisty'),
		     'section'  => 'display',
		     'settings' => 'display_image',
		     'priority' => 1,
		 )));

		 // Height Setting
		$wp_customize->add_setting( 'display_height', array(
			'default'              => _x(650, 'twisty'),
			'type'                 => 'theme_mod'
		));

		// Height Control
		$wp_customize->add_control( 'display_height', array(
			'label'    => __('Display height', 'twisty'),
			'section'  => 'display',
			'priority' => 2,
		));

		// Heading Setting
		$wp_customize->add_setting( 'display_heading', array(
			'default'              => _x('twisty Theme', 'twisty'),
			'type'                 => 'theme_mod'
		));

		// Heading Control
		$wp_customize->add_control( 'display_heading', array(
			'label'    => __('Display heading', 'twisty'),
			'section'  => 'display',
			'priority' => 3,
		));

		// Text Setting
		$wp_customize->add_setting( 'display_text', array(
			'default'              => _x('Custom Wordpress Theme By You', 'twisty'),
			'type'                 => 'theme_mod'
		));

		// Text Control
		$wp_customize->add_control( 'display_text', array(
			'label'    => __('Display text', 'twisty'),
			'section'  => 'display',
			'priority' => 4,
		));


		// Social Section
		 $wp_customize->add_section('social', array(
		     'title'          => __('Social', 'twisty'),
		     'description'    => sprintf( __('Social media urls', 'twisty')
		     ),
		     'priority'       =>140,
		 ));

		 // Facebook URL Setting
		 $wp_customize->add_setting('facebook_url', array(
		   'default'              => _x('http://www.facebook.com', 'twisty'),
		   'type'                 => 'theme_mod'
		 ));

		 // Facebook URL Control
		 $wp_customize->add_control( 'facebook_url', array(
		   'label'    => __('Facebook URL', 'twisty'),
		   'section'  => 'social',
		   'priority' => 1,
		 ));

		 // Twitter URL Setting
		$wp_customize->add_setting('twitter_url', array(
		'default'              => _x('http://www.twitter.com', 'twisty'),
		'type'                 => 'theme_mod'
		));

		// Twitter URL Control
		$wp_customize->add_control( 'twitter_url', array(
		'label'    => __('Twitter URL', 'twisty'),
		'section'  => 'social',
		'priority' =>2,
		));

		// Linkedin URL Setting
		 $wp_customize->add_setting('linkedin_url', array(
		   'default'              => _x('http://www.linkedin.com', 'twisty'),
		   'type'                 => 'theme_mod'
		 ));

		 // Linkedin URL Control
		 $wp_customize->add_control( 'linkedin_url', array(
		   'label'    => __('LinkedIn URL', 'twisty'),
		   'section'  => 'social',
		   'priority' =>2,
		 ));


		 // Bottom Banner Section
		$wp_customize->add_section('banner', array(
		    'title'          => __('Bottom Banner', 'twisty'),
		    'description'    => sprintf( __('Options for bottom banner area', 'twisty')
		    ),
		    'priority'       => 160,
		));

		// Image Setting
		$wp_customize->add_setting('banner_image', array(
		'default' => get_template_directory_uri() . '/img/banner.jpg',
		'type'    => 'theme_mod'

		));

		// Image Control
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'banner_image', array(
		'label'    => __('Background Image', 'twisty'),
		'section'  => 'banner',
		'settings' => 'banner_image',
		'priority' => 1,
		)));

		// Heading Setting
		$wp_customize->add_setting( 'banner_heading', array(
		  'default'              => _x('Follow Us On Social Media', 'twisty'),
		  'type'                 => 'theme_mod'
		));

		// Heading Control
		$wp_customize->add_control( 'banner_heading', array(
		  'label'    => __('Heading', 'twisty'),
		  'section'  => 'banner',
		  'priority' => 3,
		));

		// Animation  Options Section
		
		$wp_customize->add_section('animation', array(
			'title'          =>  __('Animation  Options', 'twisty'),
			'description'    => sprintf( __('Animation option for post', 'twisty')
			),
			'priority'       => 150,
		));

		
		
		 // Animation  Setting
		$wp_customize->add_setting( 'animation', array(
	    'default'    => '1'
			
		));

		// Animation checkbox  Control
		$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'animation',
	        array(
	            'label'     => __('Enable Post Animation', 'twisty'),
	            'section'   => 'animation',
	            'settings'  => 'animation',
	            'type'      => 'checkbox',
	        )
	    )
	);


	}

	add_action('customize_register','twisty_customize_register');

function twisty_customize_preview() 
{

wp_enqueue_script( 'twisty-customize-preview', get_template_directory_uri(). '/js/customize-preview.js' ,array( 'customize-preview' ), '0.1', true  );
}
 add_action( 'customize_preview_init', 'twisty_customize_preview' );