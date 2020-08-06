
<div class="<?php echo $section_class; ?>">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="clearfix"></div>
            <h2 class="section-heading text-center">

                <a  href="<?php esc_url(the_permalink()); ?>">
                    <?php the_title();?>
                </a>
            </h2>
            <hr class="section-heading-spacer">
            <div><?php the_content(); ?></div>
            
            
        </div>
    </div>
</div>
</div>