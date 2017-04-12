<?php 
/*---------------------------------------------------------------------------------*/
/* Flickr widget */
/*---------------------------------------------------------------------------------*/
if(!class_exists('WP_Widget_Flickr')){
	class WP_Widget_Flickr extends WP_Widget {

		function __construct() {
			$widget_ops = array('description' => 'This Flickr widget populates photos from a Flickr ID.' );
			parent::__construct('flickr', esc_html__('WD - Flickr','wdjewelry'), $widget_ops);
		}

		function to_good_name( $input_str ){
			if( is_string($input_str) )
				return str_replace(" ","",$input_str);
			return $input_str;
		}

		function widget($args, $instance) {
			extract( $args );
			$id 			= $instance['id'];
			$number 		= absint($instance['number']);
			$type 			= 'user';
			$sorting 		= esc_attr($instance['sorting']);
			$size 			= esc_attr($instance['size']);
			$column_count 	=  2;
			$wd_flick_column = (int)$column_count;
			$cache_subname 	= implode ( "_", array_map(array($this,"to_good_name"),$instance) );
			
			echo wp_kses_post($before_widget);
			echo wp_kses_post($before_title);
			esc_html_e('Gallery On Flickr','wdjewelry');
			echo wp_kses_post($after_title);
			if($id){
					$cache_file = get_template_directory().'/cache_theme/flickr_'.$cache_subname.'.txt';
					$cachetime = 60*60;
					// Time that the cache was last filled.
					$cache_file_created = ((@file_exists($cache_file))) ? @filemtime($cache_file) : 0;
					// Show file from cache if still valid.
					if (time() - $cachetime < $cache_file_created) {
						include(get_template_directory().'/cache_theme/flickr_'.$cache_subname.'.txt');	
					} else {
						try{
							//$ch = curl_init();
							$url = 'http://www.flickr.com/badge_code_v2.gne?source='.$type.'&'.$type.'='.$id.'&count='.$number.'&display='.$sorting.'&layout=x&size='.$size;
							/*curl_setopt($ch,CURLOPT_URL,$url);
							curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
							curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
							$statuses = curl_exec($ch);
							curl_close($ch);
							*/		
							$args = array(
								'method'      =>    'GET',
								'timeout'     =>    5,
								'redirection' =>    5,
								'httpversion' =>    '1.0',
								'blocking'    =>    true,
								'headers'     =>    array(),
								'body'        =>    null,
								'cookies'     =>    array()
							);
							$statuses = wp_remote_get( $url, $args );
							if( !is_wp_error( $statuses ) ) {
								$statuses =  $statuses['body'];
								
								$math = preg_match_all('/<a.*?href="(.*?)".*?src="(.*?)".*?<\/a>/ism',$statuses,$match);
								$li_class = "";					
								ob_start();
									?>
								<div class="wrap <?php echo esc_attr($class);?>">
									<div class="fix"></div>
									<?php foreach($match[0] as $index => $image){?>
									<?php 
										if( $index % $wd_flick_column == 0){
											$li_class = ' start';
										}else if( $index % $wd_flick_column == ($wd_flick_column-1) ){
											$li_class =  ' end';
										}else{
											$li_class =  '';
										}
									?>
									<div class="flickr_badge_image<?php echo esc_attr($li_class); ?>"><?php  echo wp_kses_post($image);?></div>
									<?php }?>	
									<div class="fix"></div>
								</div>

								<?php 
								//$file = @fopen($cache_file, 'w');
					 
								// Save the contents of output buffer to the file, and flush the buffer. 
								//$file_output = ob_get_contents();
								//@fwrite($file, $file_output); 
								//@fclose($file); 
								ob_end_flush();
							}
						}catch(Excetion $e){
							$result = new StdClass();
							$result->status = array();
							return $result;
						}
					}
				}
		
		   echo wp_kses_post($after_widget);
	   }

	   function update($new_instance, $old_instance) {
			$cache_file = get_template_directory().'/cache_theme/flickr_'.$new_instance['id'].'.txt';
			if(file_exists($cache_file))
				unlink($cache_file);
		   return $new_instance;
	   }

	   function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 
																'id' 			=> '88351014@N05' 
																,'number' 		=> 9 
																,'type' 		=> 'user' 
																,'sorting' 		=> 'latest'
																,'size' 		=> 's'
																,'column_count' => 3 
														) );
			$id = isset($instance['id']) ? esc_attr($instance['id']) : '';
			$number = isset($instance['number']) ? absint($instance['number']) : '';
			$type = isset($instance['type']) ? esc_attr($instance['type']) : '';
			$sorting = isset($instance['sorting']) ? esc_attr($instance['sorting']) : '';
			$size = isset($instance['size']) ? esc_attr($instance['size']) : '';
			$column_count = isset($instance['column_count']) ? absint($instance['column_count']) : '';
			?>
			<p>
				<input type="text" name="<?php echo esc_attr($this->get_field_name('id')); ?>" value="<?php echo esc_attr($id); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number:','wdjewelry'); ?></label>
				<select name="<?php echo esc_attr($this->get_field_name('number')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>">
					<?php for ( $i = 1; $i <= 10; $i += 1) { ?>
					<option value="<?php echo esc_attr($i); ?>" <?php if($number == $i){ echo "selected='selected'";} ?>><?php echo esc_html($i); ?></option>
					<?php } ?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('sorting')); ?>"><?php esc_html_e('Sorting:','wdjewelry'); ?></label>
				<select name="<?php echo esc_attr($this->get_field_name('sorting')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sorting')); ?>">
					<option value="latest" <?php if($sorting == "latest"){ echo "selected='selected'";} ?>><?php esc_html_e('Latest', 'wdjewelry'); ?></option>
					<option value="random" <?php if($sorting == "random"){ echo "selected='selected'";} ?>><?php esc_html_e('Random', 'wdjewelry'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php esc_html_e('Size:','wdjewelry'); ?></label>
				<select name="<?php echo esc_attr($this->get_field_name('size')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('size')); ?>">
					<option value="q" <?php if($size == "q"){ echo "selected='selected'";} ?>><?php esc_html_e('Large Square', 'wdjewelry'); ?></option>
					<option value="z" <?php if($size == "z"){ echo "selected='selected'";} ?>><?php esc_html_e('Medium', 'wdjewelry'); ?></option>
					<option value="t" <?php if($size == "t"){ echo "selected='selected'";} ?>><?php esc_html_e('Thumbnail', 'wdjewelry'); ?></option>
				</select>
			</p>
			<?php
		}
	}
}

register_widget("WP_Widget_Flickr" );
?>