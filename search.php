<?php get_header(); ?>
  <section class="row title-bar">
    <div class="container">
      <div class="col-md-8">
        <h1>
          <?php printf( __( 'Search Results for: %s', 'twisty' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
        </h1>
      </div>
      <div class="col-md-4">
            <?php get_search_form(); ?>
        </div>
    </div>
  </section>
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
     ?>
   
     <?php if(has_post_format($format, $post_id) && get_post_format($post_id) == 'aside') : ?>
          <?php
            // Aside Content
            require get_template_directory() . './content-aside.php';
          ?>
        <?php elseif(has_post_format($format, $post_id) && get_post_format($post_id) == 'gallery') : ?>
          <?php
            // Gallery Content
            require get_template_directory() . './content-gallery.php';
          ?>
        <?php else : ?>
          <?php
            // Standard Content
            require get_template_directory() . './content.php';
          ?>
        <?php endif; ?>
     
    <?php endwhile;?>

    
<?php get_footer(); ?>