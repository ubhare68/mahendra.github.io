<?php 
	add_shortcode( "WD_Blog_single","tvlgiao_dance_blogs_single");
	function tvlgiao_dance_blogs_single($atts){
		extract(shortcode_atts( array(
			'post_slug' => '',
			), $atts));
		$args = array(
			'name' 			=> $post_slug,
		);
		$blogs = new WP_Query($args);	
		ob_start();
		if($blogs->have_posts()):?>
			<div class="wd_blog_single">
				<div class="<?php echo esc_attr($type); ?>">
				<?php while ($blogs->have_posts()): $blogs->the_post();?>
					<div class="wd_blog_item">
						<div class='wd_blog_item_header'>
							<?php
							if(has_post_thumbnail()):
								the_post_thumbnail('full-size');
							endif;
							?>
						</div> <!-- end div conten_itiem_blog -->		
						<div class="wd_blog_item_content">
							<div class="content_title text_center">
								<h3> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
							</div>
							<div class="content_author">
								<span><?php echo get_the_date(); ?></span>
								<span>post by <?php echo get_the_author( ); ?></span>
								<span> <?php comments_number( '0 comment', '1 comment', '% comment' ); ?></span>
							</div>
						</div>

					</div>
				<?php endwhile; ?>
				</div>
			</div>
		<?php endif; /* end if*/ 		
		wp_reset_postdata();
		$content=ob_get_contents();
		ob_get_clean();
		return $content;
	}
?>