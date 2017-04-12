<?php 
if(!class_exists('WP_Widget_Product_Selling')){
	class WP_Widget_Product_Selling extends WP_Widget {
    	function __construct() {
				$widget_ops = array('description' => esc_html__('This widget show recent post in each category you select.','wdjewelry') );
				parent::__construct('product_sell', esc_html__('WD -Top Sales','wdjewelry'), $widget_ops);
		}
	  
		function widget($args, $instance){
			if(!wdjewelry_checkplugin_woocommerce()){
				return ;
			}
			ob_start();			
			extract($args); // gives us the default settings of widgets
			$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Recent','wdjewelry') : $instance['title']);
			$number = absint($instance['number']) == 0 ? 5 : absint($instance['number']);

			echo wp_kses_post($before_widget); // echos the container for the widget || obtained from $args
			if($title){
				echo wp_kses_post($before_title . $title . $after_title);
			}
			
			$args = array(
				'post_type'				=> 'product'
				,'ignore_sticky_posts'	=> 1
				,'posts_per_page'		=> $number
				,'post_status'			=> 'publish',
				'meta_key'           	 => 'total_sales',
				'order'             	=> 'meta_value_num',
				'oderby'				=>'desc',
				'date_query' 			=> array(array('after' => '1 month ago')),

			);
			
			$product = new WP_Query($args);

			if( $product->have_posts() ){
				echo '<ul class="recent_posts type-'.esc_attr($type).'">';
				while( $product->have_posts() ) {
					$product->the_post();
					?>
					<li class="item">
						<div class="media">
							<div class="post_thumbnail">
								<a class="wd-effect-blog" href="<?php the_permalink(); ?>">
								<?php if(has_post_thumbnail()){ ?>
									<?php the_post_thumbnail(array(163,270),array('title'=>get_the_title()));?>	
								<?php }  ?>
								</a>
							</div>
				
							<div class="detail">
								<div class="entry-title">
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wdjewelry' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
										<?php echo esc_attr(get_the_title()); ?>
									</a>
								</div>
							
								<div class="price">
									<?php
									/**
									 * woocommerce_after_shop_loop_item_title hook.
									 *
									 * 
									 * @hooked woocommerce_template_loop_price - 10
									 */
									do_action( 'woocommerce_template_loop_price' );
									?>
								</div>
								
							</div>
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
			$instance['number'] 				= $new_instance['number'];
			return $instance;
		}

		
		function form($instance) {        
			$instance_default = array(
									'title' 				=> '',
									'number'					=> 4		
								);
			//Defaults
			$instance = wp_parse_args( (array) $instance, $instance_default );
			$title =  $instance['title'];
			$number =  $instance['number'] ;
						?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title','wdjewelry' ); ?> : </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e( 'Number','wdjewelry' ); ?> : </label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
			</p>
		

<?php
		   
		}
	}
}

	register_widget("WP_Widget_Product_Selling" );
?>