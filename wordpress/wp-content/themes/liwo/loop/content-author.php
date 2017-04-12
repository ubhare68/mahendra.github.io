<?php global $liwo; ?>
<h4><i><?php echo __('About the Author', 'themestudio'); ?></i></h4>
<div class="about_author"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>  <?php the_author_posts_link(); ?><br />
  <?php the_author_meta('description'); ?>
</div>
<!-- end about author -->