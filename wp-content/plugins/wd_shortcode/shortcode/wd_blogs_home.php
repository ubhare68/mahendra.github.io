<?php 
	add_shortcode( "WD_Blogs_Home","tvlgiao_dance_blogs_home");
	function tvlgiao_dance_blogs_home($atts,$content = null){
		extract(shortcode_atts( array(
			"ignore_sticky_posts" => "top",
			"orderby" => "date",
			"order" => "ASC",
			'columns' => '2',
			), $atts));
		if(get_query_var('paged')):
			$paged = get_query_var('paged');
		elseif(get_query_var('page')):
			$paged = get_query_var('page');
		else:
			$paged = 1;
		endif;
		$args = array(
			'post_type' 			=> 'post',
			'orderby' => $orderby,
			'order'   => $order,
			'paged' => $paged,
		);	
		$blogs = new WP_Query($args);	
		ob_start();
		$_sub_class = "col-sm-".(24/$columns);
		$first_post = true;
		$show_content = 1;
		if($blogs->have_posts()):?>
			<div class="content_blog row">
					<div class="content_blogs ">
						<?php while ($blogs->have_posts()):?>

							<?php $blogs->the_post(); ?>
							<?php if($first_post): ?>
								<div class="wd_blog_first col-sm-24 wd_item_blog">
								<span><?php echo esc_html__('NEW BLOG','wpdance' ); ?></span>
								<?php get_template_part( 'template-parts/content','custom' ); ?>
								</div>
								<?php $first_post = false; ?>
							<?php endif; ?>

							<div class="<?php echo esc_attr($_sub_class); ?> wd_item_blog">
								<?php get_template_part( 'template-parts/content','custom' ); ?>
							</div>
							<?php if($show_content=4) ?>
								<div class="wd_blog_home_custom col-sm-24 ">
									<?php echo wp_kses_post($content); ?>
								</div>
							<?php endif; ?>	
						<?php endwhile; ?>
					</div>
		</div>
		<?php endif; 
		wp_reset_postdata();
		$content=ob_get_contents();
		ob_end_clean();
		return $content;
	}
?>