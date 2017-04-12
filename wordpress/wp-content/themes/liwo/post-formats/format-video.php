<?php if ( get_post_meta( $post->ID, "liwo_post_video_embed", true ) ) : ?>
	<div class="media video">
		<div class="container_video">
			<?php echo apply_filters('the_content', get_post_meta( $post->ID, "liwo_post_video_embed", true )); ?>
	    </div>
	</div>
	<div class="clearfix mar_top2"></div>
<?php endif;?>
