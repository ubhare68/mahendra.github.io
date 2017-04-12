<?php 
	global $liwo;
	global $post; 
	$img_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
?>
<div <?php post_class('blog_post'); ?> id="post-<?php the_ID(); ?>">
    <div class="blog_postcontent">
    	<?php
			if( has_post_thumbnail() ){
				echo '<div class="image_frame"><a href="'. get_permalink() .'">';
				echo '<img src="'.$img_url[0].'" />';
				echo '</a></div>';
			}
			$year  = get_the_time( 'Y' );
			$month = get_the_time( 'm' );
			$day   = get_the_time( 'd' );
		?>
		<?php if ($liwo['blog_metas'] != '') { ?>
      		<?php if (in_array('date', $liwo['blog_metas'])): ?>
		      	<a href="<?php echo get_day_link( $year, $month, $day ); ?>" class="date">
		      		<strong><?php the_time( 'd' ); ?></strong>
		      		<i><?php the_time( 'F' ); ?></i>
		      	</a>
		    <?php endif; ?>
		<?php } ?>

      	<h3><a href="<?php echo get_permalink(); ?>"><?php the_title( ); ?></a></h3>
      	<?php get_template_part('loop/content', 'metapost'); ?>
      	<div class="post_info_content">
        	<?php the_excerpt(); ?>
      	</div>
    </div>
</div>
<!-- /# end post -->
<div class="clearfix divider_line"></div>