<?php 
	add_shortcode( "WD_Blogs_Owl","tvlgiao_dance_blogs_owl");
	function tvlgiao_dance_blogs_owl($atts){
		extract(shortcode_atts( array(
			"ignore_sticky_posts" => "top",
			"orderby"	 => "ID",
			"order" 	 => "ASC",
			'per_posts'   => 4,
			), $atts));
		
		$args = array(
			'post_type' 			=> 'post',
			'orderby' => $orderby,
			'order'   => $order,
			'posts_per_page' => $per_posts,
		);	

		if ( $ignore_sticky_posts === "normal"){
			$args['ignore_sticky_posts'] = 1;
		}elseif (  $ignore_sticky_posts === "hide") {
			$args['post__not_in'] = get_option( 'sticky_posts' ) ;
		}
		$blogs = new WP_Query($args);	
		ob_start();
		if($blogs->have_posts()):?>
			<div class="content_blog">
				<div id='blog_owl' class="owl-carousel owl-theme">
					<?php while ($blogs->have_posts()):?>
						<?php $blogs->the_post(); ?>
						<div class="item">
								<div class='item_thumbnail'>
									<?php
									if(has_post_thumbnail()):
										the_post_thumbnail('full');
									endif;
									?>
								</div> <!-- end div conten_itiem_blog -->
												
								<div class="item_content">
									<div class="content_author">
										<span><?php echo get_the_date(); ?></span>
									</div>
									<div class="content_title text_center">
										<h3> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
									</div>
									<div class="clear"></div>
									<div class="content_infor">
										<div class="cotent_blog_owl"><?php echo get_the_excerpt( ); ?></div>
										<a href="<?php the_permalink(); ?>" class='wd_read_more'><?php echo esc_html__('Read More','wdfuniture'); ?></a>
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