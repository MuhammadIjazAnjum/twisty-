 

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
          <div class="meta">
                Posted on <?php the_time('F j, Y g:i a'); ?> By
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <?php the_author(); ?>
                </a>
                      in
                <?php
                  $categories = get_the_category();
                  $separator = ", ";
                  $output = '';

                  if($categories){
                    foreach($categories as $category){
                      $output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name .'</a>'. $separator;
                      //$output .= $category->cat_name . $separator;

                    }
                  }
                  echo trim($output, $separator);
                ?>
          </div>
                <p class="lead"><?php the_excerpt();?></p>
                <a class="btn btn-primary" href="<?php the_permalink(); ?>">
                    Read More
                </a>
      </div>
            <div class="<?php echo $img_div;?>">
                <?php the_post_thumbnail('full', array('class'=> $class_image));?>
                
            </div>
        </div>
    </div>
</div>
