<?php
//CONTSTANT 
if ( ! defined( 'TWISTY_DIR_URI' ) ) {
	define( 'TWISTY_DIR_URI', get_template_directory_uri()  );
}

// Twisty Theme Support
function twisty_theme_setup(){
	//Text domain
	load_theme_textdomain('twisty', get_template_directory() . '/lang');
	// Set the default content width.
	if ( ! isset( $content_width ) ) {
		$GLOBALS['content_width'] = 900;
	}
	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'automatic-feed-links' );
	// Enable support for Customer Header.
	$args = array(
		'default-text-color' => 'fff',
		'flex-width'         => false,
		'flex-height'        => false,
		'header-text'        => true,
		'uploads'            => false,
		'wp-head-callback'      => 'twisty_header_cb',
	);
	 add_theme_support( 'custom-header', $args );
	 // Enable support for Customer background.
	 $defaults = array(
		'default-color'          => 'ffffff',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
		);
	add_theme_support( 'custom-background', $defaults );
	// form support
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
	) );
	add_theme_support( 'title-tag' );
	// Post Thumbs
	add_theme_support('post-thumbnails');
	// Post Format Support
	add_theme_support('post-formats', array('aside', 'gallery'));
	// Nav Menus
	register_nav_menus(array(
		'primary'	=> __('Primary Menu','twisty'),
		'footer'	=> __('Footer Menu','twisty')
	));
	// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

}add_action('after_setup_theme', 'twisty_theme_setup');

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
	register_sidebar(array(
		'name'	=> 'Footer',
		'id'	=> 'footer',
		'before_widget'	=> '<div class="section-a animated fadeInUp"><div class="container">',
		'after_widget'	=> '</div></div>',
		'before_title'	=> '<div class="hide">',
		'after_title'	=> '</div>'
	));
}add_action('widgets_init', 'init_widgets');

//Custom Header Text
	function twisty_header_cb(){
    //Header Text color
	  $twisty_header_textcolor=get_header_textcolor();
	  echo '<style type="text/css">';
	    if (!display_header_text()) {
	    	echo '.site-title,.site-title a,.site-description,.site-description a{position:absolute; clip:rect(1px 1px 1px 1px)}';
	    }else{
	    	echo '.site-title,.site-title a,.site-description,.site-description a {color:#'. esc_attr($twisty_header_textcolor).'}';
	    }
	   echo '</style>';
   }
  add_action('wp-head','twisty_header_cb');

// enqueue styles and scripts
function twisty_styles_scripts() {
	wp_enqueue_style( 'twisty-style', get_stylesheet_uri(), false, '4.0.7' );
	wp_enqueue_style( 'twisty-bootstrap', TWISTY_DIR_URI . '/css/bootstrap.css',false,'1.1','all');
	if (get_theme_mod('animation',1)) {
		wp_enqueue_style( 'twisty-animation', TWISTY_DIR_URI. '/css/animate.css',false,'1.1','all');
	}
		
	wp_enqueue_style( 'twisty-afont', TWISTY_DIR_URI . '/css/font-awesome.css',false,'1.1','all');
	wp_enqueue_style( 'twisty-afontm', TWISTY_DIR_URI . '/css/font-awesome.min.css',false,'1.1','all');
	wp_enqueue_script( 'twisty-script-min-js', TWISTY_DIR_URI . '/js/jquery-1.12.4.min.js', array('jquery'), 'all' );
	wp_enqueue_script( 'twisty-script-js', TWISTY_DIR_URI . '/js/jquery-1.12.4.js', array('jquery'), 'all' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}	add_action( 'wp_enqueue_scripts', 'twisty_styles_scripts' );

// Add Customizer Functionality
require get_template_directory(). '/inc/customizer.php';
	