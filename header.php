<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head >
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php wp_title();?>
	  <style>
      .showcase{
        height: <?php  echo esc_attr(get_theme_mod('display_height', esc_attr('650','twisty'))); ?>px;
        background:url(<?php echo esc_url( get_theme_mod('display_image', get_template_directory_uri().'/img/display.jpg')); ?>);*/
      }
      
      .banner {
        background: url(<?php echo esc_url(get_theme_mod('banner_image',get_template_directory_uri().'/img/banner.jpg')); ?>) no-repeat center center;
      }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
   
<nav class="navbar navbar-default navbar-fixed-top" style="padding-top: 30px; ">
    <div class="container">
      <div class="navbar-header">
        <!-- Site title  -->
          <div class="site-title ">
            <a  class="navbar-header" href="<?php echo esc_url( home_url( '/' ) );   ?>" rel="home"> <?php echo esc_html(get_bloginfo( 'name' )); ?>
            </a>
          </div>            
        <!-- site description -->
          <div class="site-description ">
            <a class="navbar-header" href="<?php echo esc_url( home_url( '/' ) ); ?> " rel="home"> <?php bloginfo( 'description' ); ?>
            </a>
          </div>
          <!-- end site description -->
        </div> 
        <!-- end navbar-header  -->
              
        <div id="navbar" class="collapse navbar-collapse navbar-ex1-collapse">
          <?php
                  wp_nav_menu(
                      array(
                          'theme_location' => 'primary',
                          
                          'container'      => false,
                          'menu_class'     => 'nav navbar-nav navbar-right',
                          'fallback_cb'    =>false,

                         
                      )
                  );
              ?>
        
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
   