<?php 
	if(!function_exists('wd_features_function')){
		function wd_features_function($atts){
			extract(shortcode_atts(array(
				'number'    => 1,
				'columns'    => 1,
				'order' 			=> 'date',
				'orderby'			=> 'desc',
			),$atts));
			$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
			if ( !in_array( "featured-post/featured-post.php", $_actived ) ) {
				return;
			}
			$args = array(
			'post_type' 			=> 'post',
			'orderby'         => $orderby,
			'order'           => $order,
			'posts_per_page'  => $number,
      
			);
      $_sub_class = "col-sm-" . (24 / $columns);
      ob_start();
			$blogs = new WP_Query($args);
      $first = 1;
      if($blogs->have_posts()):?>
        <div class="wd_blog_feature">
            <?php while ($blogs->have_posts()): $blogs->the_post();?>
              <div class="wd_blog_item">
                <div class='wd_blog_item_header'>
                    <?php if($first==1): ?>
                      <span class='title_feature'><?php echo esc_html__('FEATURED NEW ','wpdance' ); ?>
                      </span>
                    <?php endif; ?>
                    <?php
                    if(has_post_thumbnail()):
                      the_post_thumbnail('full-size');
                    endif;
                    ?>
                </div> <!-- end div conten_itiem_blog -->
                        
                <div class="wd_blog_item_content item_content">
                    <div class="content_title text_center">
                      <h3> <a href="<?php the_permalink(); ?>"><?php echo get_the_title( ); ?></a></h3>
                    </div>
                    <div class="content_author">
                      <span><?php echo get_the_date(); ?></span>
                      <span>post by <?php echo get_the_author( ); ?></span>
                      <span>  <?php comments_number( '0 comment', '1 comment', '% comment' ); ?></span>
                    </div>
                    <div class='content_infor'>
                      <?php echo get_the_excerpt(); ?>
                    </div>
                  </div>
                </div>
            <?php endwhile; ?>
        </div>
      <?php endif;
      wp_reset_postdata();
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
	add_shortcode('wd_feature','wd_features_function');
?>