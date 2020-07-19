<?php get_header(); ?>
  <section class="row showcase animated fadeIn">
    <div class="container">
      <div class="col-md-12">
        <div class="showcase-content">
          <h1><?php echo get_theme_mod('display_heading', 'twisty'); ?>
          </h1>
          <p class="lead"><?php echo get_theme_mod('display_text', 'A Wordpress Theme By you'); ?>
          </p>

          <?php
           if(get_theme_mod('facebook_url', 'http://facebook.com') != '') : 
          ?>
            <a class="btn btn-default btn-lg" href="<?php echo get_theme_mod('facebook_url','http://facebook.com'); ?>" target="_blank">
              <i class="fa fa-facebook fa-fw">
              </i> Facebook
            </a>
            <?php endif; ?>
            
            <?php if(get_theme_mod('twitter_url', 'http://twitter.com') != '') : ?>
            <a class="btn btn-default btn-lg" href="<?php echo get_theme_mod('twitter_url','http://twitter.com'); ?>" target="_blank"><i class="fa fa-twitter fa-fw"></i> Twitter</a>
            <?php endif; ?>

            <?php if(get_theme_mod('linkedin_url', 'http://linkedin.com') != '') : ?>
            <a class="btn btn-default btn-lg" href="<?php echo get_theme_mod('facebook_url','http://linkedin.com'); ?>" target="_blank"><i class="fa fa-linkedin fa-fw"></i> Linkedin</a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
    <?php 
    $posts= new WP_Query(array(
            'posts_per_page'    => 3,
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
    <div class="<?php echo $section;?>">
        <div class="container">
            <div class="row">
                <div class="<?php echo $class_content;?>">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">
                        <a  href="<?php the_permalink(); ?>">
                            <?php the_title();?>
                        </a>
                    </h2>
                    <p class="lead"><?php the_excerpt();?></p>
                </div>
                <div class="<?php echo $img_div;?>">
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