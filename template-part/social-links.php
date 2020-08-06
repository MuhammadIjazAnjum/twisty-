<?php

// Template for social links

?>
<?php
           if(get_theme_mod('facebook_url', 'http://facebook.com') != '') : 
          ?>
            <a class="btn btn-default btn-lg" href="<?php echo esc_url(get_theme_mod('facebook_url','http://facebook.com')); ?>" target="_blank">
              <i class="fa fa-facebook fa-fw">
              </i> <?php  esc_html_e('Facebook','twisty'); ?>
            </a>
            <?php endif; ?>
            
            <?php if(get_theme_mod('twitter_url', 'http://twitter.com') != '') : ?>
            <a class="btn btn-default btn-lg" href="<?php echo esc_url(get_theme_mod('twitter_url','http://twitter.com')); ?>" target="_blank"><i class="fa fa-twitter fa-fw"></i> <?php  esc_html_e('Twitter','twisty'); ?></a>
            <?php endif; ?>

            <?php if(get_theme_mod('linkedin_url', 'http://linkedin.com') != '') : ?>
            <a class="btn btn-default btn-lg" href="<?php echo esc_url(get_theme_mod('linkedin_url','http://linkedin.com')); ?>" target="_blank"><i class="fa fa-linkedin fa-fw"></i> <?php  esc_html_e('Linkedin','twisty'); ?> </a>
            <?php endif; ?>