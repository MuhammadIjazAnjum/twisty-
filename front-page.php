<?php get_header(); ?>
  <section class="row showcase animated fadeIn">
    <div class="container">
      <div class="col-md-12">
        <div class="showcase-content">
          <h1><?php  get_theme_mod('display_heading', esc_html_e('Twisty','twisty')); ?>
          </h1>
          <p class="lead"><?php  get_theme_mod('display_text', esc_html_e('A Wordpress Theme By you','twisty')); ?>
          </p>

          <?php 
            if (get_theme_mod('display_checkbox',1)) {
                get_template_part( '/template-part/social', 'links' ); 
            }
          ?>

          

        </div>
      </div>
    </div>
  </section>
    <?php 
    $posts= new WP_Query(array(
            'posts_per_page'    => '',
            'tax_query' => array(
                array(
                    'taxonomy'  => 'post_format',
                    'field'     => 'slug',
                    'terms'     => array(
                        'post-format-aside',
                        'post-format-gallery',
                    ),
                    'operator'  => 'NOT IN'
                )
            )
        ));
    $i=0;// initilize counter
     $section='section-a';
    if ($posts->have_posts()):while($posts->have_posts()):$posts->the_post();
    ?>
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
    <div class="<?php echo esc_attr( $section);?>">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr( $class_content);?>">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">
                        <a  href="<?php esc_url(the_permalink()); ?>">
                            <?php the_title();?>
                        </a>
                    </h2>
                    <hr class="section-heading-spacer">
                    <p class="lead"><?php the_excerpt();?></p>
                </div>
                <div class="<?php echo esc_attr( $img_div);?>">
                    <?php the_post_thumbnail('full', array('class'=> $class_image));?>
                    
                </div>
            </div>
        </div>
    </div>




    <?php  
    endwhile;
    endif;  
    ?>
<?php get_footer(); ?>