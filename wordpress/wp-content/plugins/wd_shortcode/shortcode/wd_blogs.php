<?php 
	add_shortcode( "WD_Blogs","tvlgiao_dance_blogs_type");
	function tvlgiao_dance_blogs_type($atts){
		extract(shortcode_atts( array(
			'type' => 'small_image',
			"ignore_sticky_posts" => "top",
			"orderby" => "ID",
			"order" => "ASC"
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

		if ( $ignore_sticky_posts === "normal"){
			$args['ignore_sticky_posts'] = 1;
		}elseif (  $ignore_sticky_posts === "hide") {
			$args['post__not_in'] = get_option( 'sticky_posts' ) ;
		}

		$blogs = new WP_Query($args);	
		ob_start();
		$maxpage = $blogs->max_num_pages;
		if($blogs->have_posts()):?>
			<div class="content_blog">
				<div class="<?php echo esc_attr($type); ?>">
				<?php while ($blogs->have_posts()):?>
					<?php $blogs->the_post(); ?>
					<?php get_template_part( 'template-parts/content','custom' ); ?>
				<?php endwhile; ?>
				<?php 
					 $GLOBALS['wp_query']->max_num_pages = $blogs->max_num_pages;
	                the_posts_pagination( array(
	                   'mid_size' => 1,
	                   'prev_text' => __( 'Back', 'green' ),
	                   'next_text' => __( 'Onward', 'green' ),
	                   'screen_reader_text' => __( 'Posts navigation' )
	                ) ); 
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php endif; /* end if*/ 		
		
		$content=ob_get_contents();
		ob_get_clean();
		return $content;
	}
?>