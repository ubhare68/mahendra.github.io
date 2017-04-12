<h4><i><?php echo __('Popular Posts', 'themestudio'); ?></i></h4>
<ul class="recent_posts_list">
<?php 
	global $post;
	$args = array('numberposts'=>3, 'orderby'=>'comment_count');
	$popular_posts = get_posts($args);
	foreach($popular_posts as $post) : 
		setup_postdata($post);
		$post_ID = $post->ID;
?>
		<li> 
			<span>
				<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail($post_ID) ) {
					  		the_post_thumbnail(array(50,50));
						} else {
					?>
						<img src="<?php echo THEMESTUDIO_ASSETS; ?>/images/blog/small_thumb.png" alt="" />
					<?php } ?>
				</a>
			</span>
			<a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a> 
			<i><?php the_time( 'F d, Y' ); ?></i> 
		</li>
<?php 
	endforeach; 
	wp_reset_postdata();
	wp_reset_query();
?>
</ul>