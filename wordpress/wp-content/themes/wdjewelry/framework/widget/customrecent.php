<?php 
if(!class_exists('WP_Widget_Customrecent')){
	class WP_Widget_Customrecent extends WP_Widget {
    	function __construct() {
				$widget_ops = array('description' => esc_html__('This widget show recent post in each category you select.','wdjewelry') );
				parent::__construct('customrecent', esc_html__('WD - Recent Posts','wdjewelry'), $widget_ops);
		}
	  
		function widget($args, $instance){
			global $wpdb, $post; // call global for use in function
			
			ob_start();			
			
			extract($args); // gives us the default settings of widgets
			
			$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Recent','wdjewelry') : $instance['title']);
			$_limit = absint($instance['limit']) == 0 ? 5 : absint($instance['limit']);
			$type = isset($instance['type'])?$instance['type']:1;
			$show_thumbnail = ($instance['show_thumbnail'] == 'on')?1:0;
			$show_title = ($instance['show_title'] == 'on')?1:0;
			$show_date = ($instance['show_date'] == 'on')?1:0;
			$show_author = ($instance['show_author'] == 'on')?1:0;

			
			echo wp_kses_post($before_widget); // echos the container for the widget || obtained from $args
			if($title){
				echo wp_kses_post($before_title . $title . $after_title);
			}
			
			$args = array(
				'post_type'				=> 'post'
				,'ignore_sticky_posts'	=> 1
				,'posts_per_page'		=> $_limit
				,'post_status'			=> 'publish'
			);
			
			$recent_posts = new WP_Query($args);
			$test=1;
			if( $recent_posts->have_posts() ){
				$num_count = $recent_posts->post_count;
				echo '<ul class="recent_posts type-'.esc_attr($type).'">';
				$i = 0;
			
				while( $recent_posts->have_posts() ) {
					$recent_posts->the_post();
					?>
					<li class="item<?php if($i == 0) echo ' first';?><?php if(++$i == $num_count) echo ' last';?>">
						<div class="media">
							<!-- Type 1 -->
							<?php if( $type == 1 ): ?>

								<?php if( $show_thumbnail ){ ?>
								<div class="post_thumbnail">
									<a class="wd-effect-blog" href="<?php the_permalink(); ?>">
									<?php if(has_post_thumbnail()){ ?>
										<?php the_post_thumbnail(array(163,270),array('title'=>get_the_title()));?>	
									<?php } else { ?>	
										<img alt="<?php the_title(); ?>" height="163" width="270" title="<?php the_title();?>" src="<?php echo get_template_directory_uri(); ?>/images/no-image-blog.gif"/>
									<?php } ?>
									</a>
								</div>
								<?php } ?>

								<div class="detail">

									<?php if( $show_title ){ ?>
									<div class="entry-title">
										<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wdjewelry' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
											<?php echo esc_attr(get_the_title()); ?>
										</a>
									</div>
									<?php } ?>

									<?php if($show_author) { ?>
										<span class="author">
											<?php the_author_posts_link(); ?> 
										</span>
									<?php } ?>
								</div>	
							
							<!-- Type 2 -->
							<?php else:
								
								if($test==1){?>

								 
								<div class="post_thumbnail">
									<a class="wd-effect-blog" href="<?php the_permalink(); ?>">
									<?php if(has_post_thumbnail()){ ?>
										
										<?php the_post_thumbnail(array(163,270),array('title'=>get_the_title()));?>	
									<?php } else { ?>
									
										<img alt="<?php the_title(); ?>" height="163" width="270" title="<?php the_title();?>" src="<?php echo get_template_directory_uri(); ?>/images/no-image-blog.gif"/>
									<?php } ?>
									</a>
								</div>
							
								<p> <a href='<?php the_permalink(); ?>'> <?php echo esc_attr(get_the_title( )); ?></a></p>
								<p><?php echo get_the_date( ); ?></p>
								<?php 
								$test=2;
								}else{?>
								<p> <a href='<?php the_permalink(); ?>'> <?php echo esc_attr(get_the_title( )); ?></a></p>
								<p><?php echo get_the_date( ); ?></p>
								<?php }
							 endif; ?> <!-- end if -->

						</div>
					</li>
				<?php }
				echo '</ul>';
			}
			wp_reset_postdata();
			
			echo wp_kses_post($after_widget); // close the container || obtained from $args
			$content = ob_get_clean();

			if ( isset( $args['widget_id'] ) ) $cache[$args['widget_id']] = $content;

			echo wp_kses_post($content);		
			
		}

		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] 					= $new_instance['title'];
			$instance['type'] 					= $new_instance['type'];
			$instance['limit'] 					= $new_instance['limit'];
			$instance['show_thumbnail'] 		= $new_instance['show_thumbnail'];
			$instance['show_title'] 			= $new_instance['show_title'];
			$instance['show_date'] 				= $new_instance['show_date'];
			$instance['show_author'] 			= $new_instance['show_author'];
			return $instance;
		}

		
		function form($instance) {        

			$instance_default = array(
									'title' 				=> 'Recent Posts'
									,'type'					=> 1
									,'limit'				=> 5
									,'show_thumbnail' 		=> 0
									,'show_title' 			=> 1
									,'show_date' 			=> 1
									,'show_author' 			=> 1
								);
			//Defaults
			$instance = wp_parse_args( (array) $instance, $instance_default );
			$title = esc_attr( $instance['title'] );
			$limit = absint( $instance['limit'] );
			$type = $instance['type'];

			?>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title','wdjewelry' ); ?> : </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php esc_html_e( 'Type to show','wdjewelry' ); ?>: </label>
				<select class="widefat" name="<?php echo esc_attr($this->get_field_name('type')); ?>" id="<?php echo esc_attr($this->get_field_id('type')); ?>">
					<option value="1" <?php selected($instance['type'], 1); ?>>1</option>
					<option value="2" <?php selected($instance['type'], 2); ?>>2</option>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php esc_html_e( 'Limit','wdjewelry' ); ?> : </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="text" value="<?php echo esc_attr($limit); ?>" />
			</p>

			<p>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_thumbnail')); ?>" name="<?php echo esc_attr($this->get_field_name('show_thumbnail')); ?>" type="checkbox" <?php echo esc_html(($instance['show_thumbnail'])?'checked':''); ?> />
				<label for="<?php echo esc_attr($this->get_field_id('show_thumbnail')); ?>"><?php esc_html_e( 'Show thumbnail image','wdjewelry' ); ?></label>
			</p>

			<p>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_title')); ?>" name="<?php echo esc_attr($this->get_field_name('show_title')); ?>" type="checkbox" <?php echo esc_html(($instance['show_title'])?'checked':''); ?> />
				<label for="<?php echo esc_attr($this->get_field_id('show_title')); ?>"><?php esc_html_e( 'Show post title','wdjewelry' ); ?></label>
			</p>
			
			<p>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_date')); ?>" name="<?php echo esc_attr($this->get_field_name('show_date')); ?>" type="checkbox" <?php echo esc_html(($instance['show_date'])?'checked':''); ?> />
				<label for="<?php echo esc_attr($this->get_field_id('show_date')); ?>"><?php esc_html_e( 'Show date time','wdjewelry' ); ?></label>
			</p>
			<p>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_author')); ?>" name="<?php echo esc_attr($this->get_field_name('show_author')); ?>" type="checkbox" <?php echo esc_html(($instance['show_author'])?'checked':''); ?> />
				<label for="<?php echo esc_attr($this->get_field_id('show_author')); ?>"><?php esc_html_e( 'Show author','wdjewelry' ); ?></label>
			</p>
<?php
		   
		}
	}
}

	register_widget("WP_Widget_Customrecent" );
?>