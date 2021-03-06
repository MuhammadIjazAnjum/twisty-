<?php get_header(); ?>
	<?php while(have_posts()) : the_post(); ?>
		<section class="row title-bar" >
	    <div class="container" >
	    	<div class="col-md-12">
	      	<h1  ><?php the_title(); ?></h1>
	      </div>
	    </div>
		</section>

		<section class="row page">
      <div class="container">
        <div class="col-md-8">
          <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
          </div>
          <?php the_content(); ?>
          <?php
              wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twisty' ),
				'after'  => '</div>',
			)
		);
            ?>
        </div>
        
        <div class="col-md-4">
      		<?php if(is_active_sidebar('sidebar')) : ?>
        		<?php dynamic_sidebar('sidebar'); ?>
      		<?php endif; ?>
        </div>
	    </div>
	  </section>
	<?php endwhile; ?>

<?php get_footer(); ?>