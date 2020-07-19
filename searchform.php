<?php
/**
 * Search form Template for twisty *
 * 
 */
?>


<!-- <span class="menu_btn fa fa-align-justify"></span> -->
<form method="get" class="search_form" action="<?php echo esc_url(get_home_url('/')); ?>">
	<div class="closebtn fa fa-search">
    <input height=40px name="s" id="s" type="search" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twisty' ); ?>" value="<?php  echo get_search_query(); ?>">
  </div>
           <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentysixteen' ); ?></span></button>
</form>