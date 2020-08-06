
  <section class="banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">

          <h2><?php echo esc_html(get_theme_mod('banner_heading', 'Follow Us')); ?></h2>
        </div>
          <div class="col-lg-6">
            <?php 
            if (get_theme_mod('banner_checkbox',1)) {
            get_template_part( '/template-part/social', 'links' ); 
            }
          ?>
              
          </div>
      </div>
    </div>
  </section>

<footer>
  <?php if(is_active_sidebar('footer')) : ?>
    <?php dynamic_sidebar('footer'); ?>
  <?php endif; ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="copyright text-muted small"> <?php esc_html_e('Copyright &copy; twisty 2020. All Rights Reserved','twisty')?>  </p>
        </div>
      </div>
    </div>
</footer>
<?php wp_footer()?>
</body>
</html>