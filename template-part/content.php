 

<div class="<?php echo $section;?>">
<div class="container">
  <div class="row">
      <div class="<?php echo $class_content;?>">
          <!-- <hr class="section-heading-spacer"> -->
          <div class="clearfix"></div>
          <h2 class="section-heading"> 
            <a  href="<?php the_permalink(); ?>">
              <?php the_title();?>
            </a>
          </h2>
          <div class="meta">
            <!-- User -->
              <br><i class="fa fa-user" aria-hidden="true"> User:</i>
              <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php the_author(); ?>
              </a>
            <!--Categories  -->
              <?php
                $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twisty' ) ); 
                printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                  _x( '<br><i class="fa fa-list-alt" aria-hidden="true"> Categories:</i>', 'Used before category names.', 'twisty' ),
                  $categories_list
                );
                //tags
                  $tags_list = get_the_tag_list( '', _x( ', ', ' a space after the comma.', 'twisty' ) );
                  if ( $tags_list ) {
                    printf( '<span class="tags-links"><span >%1$s </span>%2$s</span>',
                      _x( '<br><i class="fa fa-tag" aria-hidden="true"> Tags: </i>', 'Before tag names.', 'twisty' ),
                      $tags_list
                    );
                  }
              ?>
              <?php
                $time_string = '<time  datetime="%1$s">%2$s</time>';
                if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                  $time_string = '<time  datetime="%1$s">%2$s</time><time  datetime="%3$s">%4$s</time>';
                }
                $time_string = sprintf( $time_string,
                  esc_attr( get_the_date( 'c' ) ),
                  get_the_date(),
                  esc_attr( get_the_modified_date( 'c' ) ),
                  get_the_modified_date()
                );

                printf( '<span ><span >%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
                  _x( '<br>Posted on', 'before publish date.', 'twisty' ),
                  esc_url( get_permalink() ),
                  $time_string
                );  
            
              ?>
          </div>
                <p class="lead"><?php the_excerpt();?></p>
                <a class="btn btn-primary" href="<?php the_permalink(); ?>">
                   <?php  esc_html_e('Read More','twisty'); ?> 
                </a>
      </div>
            <div class="<?php echo $img_div;?>">
                <?php the_post_thumbnail('full', array('class'=> $class_image));?>
                
            </div>
        </div>
    </div>
</div>
