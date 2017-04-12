<?php
class Custom_Portfolio extends WP_Widget {
	function Custom_Portfolio() {
		$widget_ops = array('classname' => 'Custom_Portfolio', 'description' => 'The portfolio posts with thumbnails' );
		$this->WP_Widget('Custom_Portfolio', THEMESTUDIO_THEME_NAME.' Portfolio', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$items = empty($instance['items']) ? '3' : apply_filters('widget_number', $instance['items']);
		
		if(!is_numeric($items))
		{
			$items = 3;
		}
		
		if($title){ 
			echo $before_title.$title.$after_title; 
		}
		
		?>
		<?php
  			cubewidgets();
  			$posts_array = get_posts( 'posts_per_page='.$items.'&post_type=dslc_projects' );
  			foreach ($posts_array as $portfolio ) : 
  				$url = wp_get_attachment_url( get_post_thumbnail_id($portfolio->ID) );
  		?>
            <div id="grid-container" class="cbp-l-grid-masonry">
                <ul>
                    <li class="cbp-item identity cbp-l-grid-masonry-height1">
                        <a class="cbp-caption cbp-lightbox" data-title="<?php echo $portfolio->post_title.'<br>'.wpautop(wp_trim_words($portfolio->post_excerpt, 10, '')); ?>" href="<?php echo $url; ?>">
                            <div class="cbp-caption-defaultWrap">
                                <?php echo get_the_post_thumbnail( $portfolio->ID, array(280,280) ); ?>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">
                                        	<?php echo $portfolio->post_title; ?> 
                                        </div>
                                        <div class="cbp-l-caption-desc">
                                        	<?php
							              		if($portfolio->post_excerpt){
							              			echo wpautop(wp_trim_words($portfolio->post_excerpt, 10, ''));
							              		} else {
							              			echo wpautop(wp_trim_words($portfolio->post_content, 10, ''));
							              		}
							              	?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

        <?php
        	endforeach;
			wp_reset_postdata();
        ?>
			
		<?php

		
		echo $after_widget;
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['items'] = strip_tags($new_instance['items']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title'=>'Portfolio Posts', 'items' => '') );
		$title = strip_tags($instance['title']);
		$items = strip_tags($instance['items']);

?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Widget title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('items'); ?>">Items (default 3): <input class="widefat" id="<?php echo $this->get_field_id('items'); ?>" name="<?php echo $this->get_field_name('items'); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('Custom_Portfolio');
?>