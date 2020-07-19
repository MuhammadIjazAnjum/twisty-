<?php get_header(); ?>

<section class="row title-bar">
      <div class="container">
        <div class="col-md-12">
          <h1 ><?php single_post_title();?></h1>
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
          set_query_var( 'section',  $section );
          set_query_var( 'class_content' ,$class_content );
          set_query_var( 'img_div' ,$img_div );
          set_query_var( 'class_image' ,$class_image );
            
          get_template_part( '/content', get_post_format() );
    endwhile;?>

    
<?php get_footer(); ?>