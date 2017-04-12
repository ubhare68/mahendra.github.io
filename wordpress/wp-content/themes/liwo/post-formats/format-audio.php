<?php if ( get_post_meta( $post->ID, "liwo_post_audio_embed", true ) ) : ?>
	<div class="media video embed_status">
		<div class="container_video">
			<?php echo apply_filters('the_content', get_post_meta( $post->ID, "liwo_post_audio_embed", true )); ?>
	    </div>
	</div>
	<div class="clearfix mar_top2"></div>
<?php endif;?>