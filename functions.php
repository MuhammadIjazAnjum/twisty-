<?php
//CONTSTANT 

if ( ! defined( 'TWISTY_DIR_URI' ) ) {
	define( 'TWISTY_DIR_URI', get_template_directory_uri()  );
}
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


// Theme Support
function againzigzag_theme_support(){
	// Indicate widget sidebars can use selective refresh in the Customizer.
	// add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		
	) );
	// Post Thumbs
	add_theme_support('post-thumbnails');
	// Post Format Support
	add_theme_support('post-formats', array('aside', 'gallery'));
	// Nav Menus
	register_nav_menus(array(
		'primary'	=> __('Primary Menu'),
		'footer'	=> __('Footer Menu')
	));
}

add_action('after_setup_theme', 'againzigzag_theme_support');

// Widget Locations
function init_widgets($id){
	register_sidebar(array(
		'name'	=> 'Sidebar',
		'id'	=> 'sidebar',
		'before_widget'	=> '<div class="well animated fadeInRight sidebar-widget">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>'
	));

	// register_sidebar(array(
	// 	'name'	=> 'sidebar',
	// 	'id'	=> 'subnav',
	// 	'before_widget'	=> '<div class="sub-nav">',
	// 	'after_widget'	=> '</div>',
	// 	'before_title'	=> '<div class="hide">',
	// 	'after_title'	=> '</div>'
	// ));

	register_sidebar(array(
		'name'	=> 'Bottom',
		'id'	=> 'bottom',
		'before_widget'	=> '<div class="section-a animated fadeInUp"><div class="container">',
		'after_widget'	=> '</div></div>',
		'before_title'	=> '<div class="hide">',
		'after_title'	=> '</div>'
	));
	register_sidebar(array(
		'name'	=> 'Footer',
		'id'	=> 'footer',
		'before_widget'	=> '<div class="section-a animated fadeInUp"><div class="container">',
		'after_widget'	=> '</div></div>',
		'before_title'	=> '<div class="hide">',
		'after_title'	=> '</div>'
	));
}

add_action('widgets_init', 'init_widgets');







function twisty_styles_scripts() {
		//twisty stylesheet
		wp_enqueue_style( 'twisty-style', get_stylesheet_uri(), false, '4.0.7' );
		wp_enqueue_style( 'twisty-bootstrap', TWISTY_DIR_URI . '/css/bootstrap.css',false,'1.1','all');
		if (get_theme_mod('animation',1)) {
			wp_enqueue_style( 'twisty-animation', TWISTY_DIR_URI. '/css/animate.css',false,'1.1','all');
		}
		
		wp_enqueue_style( 'twisty-afont', TWISTY_DIR_URI . '/css/font-awesome.css',false,'1.1','all');
		
		wp_enqueue_style( 'twisty-afontm', TWISTY_DIR_URI . '/css/font-awesome.min1.css',false,'1.1','all');

		// wp_enqueue_style( 'twisty-google-font', 'https://fonts.googleapis.com/css?family=Lato:400,700|Playfair+Display:400,700,900', false );
		// wp_enqueue_style( 'google-font-oswald', 'https://fonts.googleapis.com/css?family=Oswald', false );
		// wp_enqueue_style( 'google-font-lora', 'https://fonts.googleapis.com/css?family=Lora', false );
		// wp_enqueue_style( 'twisty-style-css', twisty_DIR_URI .'css/twisty-style.css' ,array(), '1.0') ;
		// wp_enqueue_style( 'twisty-color-style', twisty_DIR_URI .'css/colors.css' ,array(), '1.0') ;
		// wp_enqueue_style( 'font-awesome', TWISTY_DIR_URI . 'css/font-awesome.min.css', false, '4.7.0' );
		// //twisty color scheeme
		// wp_enqueue_script( 'twisty-script-js', twisty_DIR_URI . 'js/main.js', array('jquery'), '1.1.7' );
	}
	add_action( 'wp_enqueue_scripts', 'twisty_styles_scripts' );


	// Add Customizer Functionality
	require get_template_directory(). '/inc/customizer.php';
	