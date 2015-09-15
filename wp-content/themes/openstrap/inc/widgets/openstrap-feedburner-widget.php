<?php
/**
 * Feedburner Widget
 *
 * File : openstrap-feedburner-widget.php
 * 
 * @package Openstrap
 * @since Openstrap 1.0
 */
?>
<?php

class openstrap_feedburner_subscription_widget extends WP_Widget {

         public function __construct() {

			/* Widget settings. */
			$widget_ops = array( 'classname' => 'feedburner', 'description' => __('Enable Feedburner form on Your Website.', 'feedburner') );

			/* Widget control settings. */
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'widget-feedburner' );

			/* Create the widget. */
			$this->WP_Widget( 'widget-feedburner', __('(Openstrap) Feedburner Subscription','openstrap'), $widget_ops, $control_ops );					
        }

        public function form( $instance ) {
		
			$instance = wp_parse_args( (array) $instance, array( 'feedburner_unique_id' => '', 'feedburner_button_text' => '',  'feedburner_title_text' => '', 'feedburner_sub_text' => ''));
			
			if ( isset( $instance[ 'feedburner_unique_id' ] ) ) {
				$feedburner_unique_id = $instance[ 'feedburner_unique_id' ];
			}
			
			if ( isset( $instance[ 'feedburner_button_text' ] ) ) {
				$feedburner_button_text = $instance[ 'feedburner_button_text' ];
			}	
			
			if ( isset( $instance[ 'feedburner_title_text' ] ) ) {
				$feedburner_title_text = $instance[ 'feedburner_title_text' ];
			}	

			if ( isset( $instance[ 'feedburner_sub_text' ] ) ) {
				$feedburner_sub_text = $instance[ 'feedburner_sub_text' ];
			}				
			
			$styles = array("style_1"=> "Style 1", "style_2" => "Style 2");	
						
			?>			
		<p>  
			<label for="<?php echo $this->get_field_id( 'feedburner_unique_id' ); ?>"><?php _e('Feedburner Id:', 'openstrap'); ?></label>  
			<input id="<?php echo $this->get_field_id( 'feedburner_unique_id' ); ?>" name="<?php echo $this->get_field_name( 'feedburner_unique_id' ); ?>" value="<?php echo $instance['feedburner_unique_id']; ?>" style="width:90%;" />  (e.g: opencodez)	
		</p>  	
		
		<p>  
			<label for="<?php echo $this->get_field_id( 'feedburner_title_text' ); ?>"><?php _e('Title Text:', 'openstrap'); ?></label>  
			<input id="<?php echo $this->get_field_id( 'feedburner_title_text' ); ?>" name="<?php echo $this->get_field_name( 'feedburner_title_text' ); ?>" value="<?php echo $instance['feedburner_title_text']; ?>" style="width:90%;" />  (e.g: Subscribe Via Email)	
		</p> 		
		
		<p>  
			<label for="<?php echo $this->get_field_id( 'feedburner_sub_text' ); ?>"><?php _e('Sub Text:', 'openstrap'); ?></label>  
			<input id="<?php echo $this->get_field_id( 'feedburner_sub_text' ); ?>" name="<?php echo $this->get_field_name( 'feedburner_sub_text' ); ?>" value="<?php echo $instance['feedburner_sub_text']; ?>" style="width:90%;" />  (e.g: Subscribe to our newsletter to get all the latest updates to your inbox..!)	
		</p> 			
		
		<p>
			<label for="<?php echo $this->get_field_id('feedburner_button_text'); ?>"><?php _e('Submit Button Text:', 'openstrap'); ?></label>
			<input id="<?php echo $this->get_field_id( 'feedburner_button_text' ); ?>" name="<?php echo $this->get_field_name( 'feedburner_button_text' ); ?>" value="<?php echo $instance['feedburner_button_text']; ?>" style="width:90%;" />  (e.g: Subscribe)	
		</p>
		
			<?php
			   
        }

        public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['feedburner_unique_id'] = $new_instance['feedburner_unique_id'];
			$instance['feedburner_button_text'] = $new_instance['feedburner_button_text'];
			$instance['feedburner_title_text'] = $new_instance['feedburner_title_text'];
			$instance['feedburner_sub_text'] = $new_instance['feedburner_sub_text'];

			return $instance;
        }

        public function widget( $args, $instance ) {
			extract( $args );			
			$feedburner_unique_id = $instance['feedburner_unique_id'];		
			$feedburner_button_text = $instance['feedburner_button_text'];
			$feedburner_title_text = $instance['feedburner_title_text'];	
			$feedburner_sub_text = $instance['feedburner_sub_text'];
			echo $before_widget;	
			?>			
			<form class="form" role="form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedburner_unique_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">    
		    <input type="hidden" value="<?php echo $feedburner_unique_id; ?>" name="uri"/>
		    <input type="hidden" name="loc" value="en_US"/>			
			<div class="panel panel-default feedburner-form">
			<div class="panel-heading text-center"><h4 class="text-danger"><?php echo $feedburner_title_text; ?></h4></div>
			<div class="panel-body">				
				<p><?php echo $feedburner_sub_text; ?></p>
				<div class="form-group">
					<input type="text" name="email"  class="form-control email" placeholder="Enter your email address"/>
				</div>
				<div class="text-center">
				<button type="submit" class="btn btn-primary btn-subscribe"><?php echo $feedburner_button_text; ?></button>
				</div>
			</div>
			<div class="panel-footer"><i class="icon-lock"></i><small class="text-muted no-spam">We will never spam you.</small></div>
			</div>
			</form>	
			<?php  
			echo $after_widget;	
        }

}
?>