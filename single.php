<?php get_header();?>
	<?php  while (have_posts()):the_post();?>
		<section class="row title-bar">
      <div class="container">
        <div class="col-md-12">
            <h1><?php the_title();?></h1>
        </div>
      </div>
    </section>
    <section class="row page">
      <div class="container">
        <div class="col-md-8">
          <div class="post-thumbnail">
            <?php the_post_thumbnail();?>
          </div>
          <div class="meta" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- User -->
              <br><i class="fa fa-user" aria-hidden="true"> User:</i>
              <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
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
          <p><?php the_content();?></p>
          <?php
              wp_link_pages(
                array(
                  'before' => '<div class="page-links">' . __( 'Pages:', 'twisty' ),
                  'after'  => '</div>',
                )
              );
            ?>
          <?php
          if ( comments_open() || get_comments_number() ) {
            comments_template();
          }
        ?>
        </div>
        <div class="col-md-4">
          <?php if(is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
          <?php endif; ?>
        </div>
      </div>
    </section>
	<?php endwhile;?>
<?php get_footer();?>