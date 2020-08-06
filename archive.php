<?php get_header(); ?>
    <section class="row title-bar">
      <div class="container">
        <div class="col-md-12">
            <h1>
              <?php
                if(is_category()){
                  echo '  <i class="fa fa-list" aria-hidden="true"></i>
 Archived By Category: ';
                   single_cat_title();
                } else if(is_author()){
                  the_post();
                  echo '<i class="fa fa-user" aria-hidden="true"></i> Archived By Author: ' .get_the_author();
                  rewind_posts();
                } else if(is_tag()){
                  echo '  <i class="fa fa-tag" aria-hidden="true"></i> Archived By Tag: ';
                  single_tag_title();
                } else if(is_day()){
                  echo 'Archived By Day: ' .get_the_date();
                } else if(is_month()){
                  echo 'Archived By Month: ' .get_the_date('F Y');
                } else if(is_year()){
                  echo 'Archived By Year: ' .get_the_date('Y');
                } else {
                  echo 'Archives';
                }
            ?>
            </h1>
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
 <?php get_footer(); ?>