<?php get_header(); ?>
  <section class="row title-bar">
    <div class="container">
      <div class="col-md-8">
        <h1>
          <?php esc_html_e( 'Search results for: ', 'twisty' ); ?>
          <span ><?php echo get_search_query(); ?></span>
          
        </h1>
      </div>
      <div class="col-md-4">
            <?php get_search_form(); ?>
        </div>
    </div>
  </section>
  <?php if ( have_posts() ) : ?>
     <?php $i=0;?>
    <?php while(have_posts()):the_post();?>
      <?php 
        $i++;
        if($i % 2 !=0){
          $section='section-a';
          $class_content='col-lg-5 col-sm-6 animated fadeInLeft';
          $img_div='col-lg-5 col-lg-offset-2 col-sm-6';
          $class_image='img-responsive img-circle animated fadeInRight';
          }else{
            $section='section-b';
            $class_content='col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6 animated fadeInRight';
            $img_div='col-lg-5 col-sm-pull-6  col-sm-6';
            $class_image='img-responsive img-circle animated fadeInLeft';
          } 
          set_query_var( 'section',  $section );
          set_query_var( 'class_content' ,$class_content );
          set_query_var( 'img_div' ,$img_div );
          set_query_var( 'class_image' ,$class_image );
            
          get_template_part( '/template-part/content', get_post_format() );
    endwhile;?>
    <section class="row page">
      <div class="container">
        <div class="col-md-12"style="text-align: center; " >
          <hr class="section-heading-spacer">
            <?php
    
    // Previous/next page navigation.
      the_posts_pagination( array(
        'prev_text'          => __( 'Previous page', 'twisty' ),
        'next_text'          => __( 'Next page', 'twisty' ),
        'before_page_number' => '<span class="meta-nav  btn btn-primary">' . __( 'Page', 'twisty' ) . ' </span>',
      ) );

    ?>
        </div>
      </div>
    </section>
    <?php else:?>
      <?php get_template_part( '/template-part/content', 'none' );?>
    <?php endif;?>
 <?php get_footer(); ?>