<div class="portfolio_area_left">
<?php if ( get_post_meta( $post->ID, "liwo_portfolio_soundcloud", true ) ) : ?>
		<div class="media video">
			<div class="container_video">
				<?php echo apply_filters('the_content', get_post_meta( $post->ID, "liwo_portfolio_soundcloud", true )); ?>
			</div>
		</div>
	<?php endif;?>
	<div class="clearfix mar_top2"></div>
	<?php the_content( ); ?>
</div>