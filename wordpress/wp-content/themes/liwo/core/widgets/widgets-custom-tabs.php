<?php
/*
 * A widget that display popular posts, recent posts, recent comments and tags
*/

/*
 * Widget class.
 */
class widgets_custom_tabs extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */

	function widgets_custom_tabs() {

		/* Widget settings */
		$widget_ops = array( 'classname' => 'widgets_custom_tabs', 'description' => __('A tabbed widget that display popular posts, recent posts and tags.', 'themestudio') );

		/* Widget control settings */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'widgets_custom_tabs' );

		/* Create the widget */
		$this->WP_Widget( 'widgets_custom_tabs', THEMESTUDIO_THEME_NAME.' Tabs', $widget_ops, $control_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */

	function widget( $args, $instance ) {
		global $wpdb;
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$tab1 = $instance['tab1'];
		$tab2 = $instance['tab2'];
		$tab3 = $instance['tab3'];
		// $tab4 = $instance['tab4'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		//Randomize tab order in a new array
		$tab = array();

		?>

		<div id="tabs">
          <ul class="tabs">
            <li class="active"><a href="#tab1"><?php echo $tab1; ?></a></li>
            <li><a href="#tab2"><?php echo $tab2; ?></a></li>
            <li class="last"><a href="#tab3"><?php echo $tab3; ?></a></li>
          </ul>
          <!-- /# end tab links -->
          <div class="tab_container">
            <div id="tab1" class="tab_content">
              	<ul class="recent_posts_list">
              	<?php
              		$dem_popular = 1;
					$popPosts = new WP_Query();
					$popPosts->query('ignore_sticky_posts=1&showposts=3&orderby=comment_count');
					while ($popPosts->have_posts()) : $popPosts->the_post(); 
				?>
	                <li <?php if($dem_popular==3){ echo ' class="last"'; } ?>> 
	                	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */ ?>
	                		<span>
	                			<a href="<?php the_permalink(); ?>">
		                			<?php the_post_thumbnail(array('50', '50')); ?>
		                		</a>
	                		</span>
	                	<?php endif; ?>
	                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <i><?php the_time( get_option('date_format') ); ?></i> 
	                </li>
	                <?php $dem_popular++; ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
              	</ul>
            </div>
            
            <!-- end popular posts -->
            <div id="tab2" class="tab_content">
              	<ul class="recent_posts_list">
              		<?php
						$dem_recent  = 1;
						$recentPosts = new WP_Query();
						$recentPosts->query('ignore_sticky_posts=1&showposts=3');
						while ($recentPosts->have_posts()) : $recentPosts->the_post(); 
					?>
	                <li <?php if($dem_popular==3){ echo ' class="last"'; } ?>> 
	                	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */ ?>
		                	<span>
		                		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array('50', '50')); ?></a>
		                	</span> 
		                <?php endif; ?>
	                	<a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a> <i><?php the_time( get_option('date_format') ); ?></i> 
	                </li>
	                <?php $dem_recent++; ?>
	            	<?php endwhile;?>
                    <?php wp_reset_query(); ?>
              	</ul>
            </div>
            
            <!-- end popular articles -->
            <div id="tab3" class="tab_content">
              <ul class="tags">
                
                <?php $tag_cloud=wp_tag_cloud('smallest=12&largest=12&number=25&unit=px&format=array');
					if($tag_cloud){
						foreach($tag_cloud as $tags) :
							$kt_tags = rand(1, 2);
							if($kt_tags==1){
								echo '<li>'.$tags.'</li>';
							} else {
								echo '<li><b>'.$tags.'</b></li>';
							}
						endforeach;
					} else {
						echo '<li></li>';
					}
				?>
                <?php wp_reset_query(); ?>
                <div class="clear"></div>
              </ul>
            </div>
          </div>
        </div>

        <script type="text/javascript">
        	jQuery(document).ready(function($) {
				//When page loads...
				$(".tab_content").hide(); //Hide all content
				$("ul.tabs li:first").addClass("active").show(); //Activate first tab
				$(".tab_content:first").show(); //Show first tab content

				//On Click Event
				$("ul.tabs li").click(function() {

					$("ul.tabs li").removeClass("active"); //Remove any "active" class
					$(this).addClass("active"); //Add "active" class to selected tab
					$(".tab_content").hide(); //Hide all tab content

					var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
					$(activeTab).fadeIn(); //Fade in the active ID content
					return false;
				});

			});
        </script>

		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags */
		$instance['tab1'] = $new_instance['tab1'];
		$instance['tab2'] = $new_instance['tab2'];
		$instance['tab3'] = $new_instance['tab3'];
		// $instance['tab4'] = $new_instance['tab4'];

		return $instance;
	}

	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'tab1' => 'Popular',
		'tab2' => 'Recent',
		'tab3' => 'Tags',
		// 'tab4' => 'Comments',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themestudio') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- tab 1 title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab1' ); ?>"><?php _e('Tab 1 Title:', 'themestudio') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab1' ); ?>" name="<?php echo $this->get_field_name( 'tab1' ); ?>" value="<?php echo $instance['tab1']; ?>" />
		</p>

		<!-- tab 2 title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e('Tab 2 Title:', 'themestudio') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab2' ); ?>" name="<?php echo $this->get_field_name( 'tab2' ); ?>" value="<?php echo $instance['tab2']; ?>" />
		</p>

		<!-- tab 4 title: Text Input -->
		<!-- <p>
			<label for="<?php echo $this->get_field_id( 'tab2' ); ?>"><?php _e('Tab 3 Title:', 'themestudio') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab3' ); ?>" name="<?php echo $this->get_field_name( 'tab3' ); ?>" value="<?php echo $instance['tab3']; ?>" />
		</p> -->

		<!-- tab 3 title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e('Tab 3 Title:', 'themestudio') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab3' ); ?>" name="<?php echo $this->get_field_name( 'tab3' ); ?>" value="<?php echo $instance['tab3']; ?>" />
		</p>

	<?php
	}
}


register_widget( 'widgets_custom_tabs' );
?>