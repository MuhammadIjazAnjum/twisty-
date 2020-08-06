<div class="<?php echo $section_class; ?>">
    
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr class="section-heading-spacer">
            <div class="clearfix"></div>
            <h2 class="section-heading">
                <a  href="<?php esc_url(the_permalink()); ?>">
                    <?php the_title();?> 
                </a>
            </h2>
            <div class="excerpt"><?php the_content(); ?></div>
        </div>
    </div>
  </div>
</div>
