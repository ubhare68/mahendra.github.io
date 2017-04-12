<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Testimonials" );')
);

class Liwo_Testimonials extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Testimonials';
    var $module_title = 'Testimonials Slider';
    var $module_icon = 'quote-left';
    var $module_category = 'Liwo - Section';


 	// Module Options
    function options() { 
    	// The options array
    	$dslc_options = array(
   			array(
				'label' => 'Testimonials Slider - Number Testimonials',
				'id' => 'number_testimonials',
				'std' => '',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => '2 Testimonials',
						'value' => '2'
					),
					array(
						'label' => '6 Testimonials',
						'value' => '6'
					),
					array(
						'label' => '4 Testimonials',
						'value' => '4'
					),
				)
			),
			
    		array(
			    'id'       	=> 'testimonials_title',
			    'type'     	=> 'text',
			    'label'    	=> 'Testimonials Title',
			    'std'  		=> 'what people say',
			),
		);

		$dslc_options = array_merge( $dslc_options, $this->animation_options );
		
    	// Return the array
    	return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

    }
 
 	// Module Output
    function output( $options ) {

    	global $dslc_active;
    	
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;
		
		//REQUIRED
		$this->module_start( $options );
		
		$services_active = '';
		if ( $dslc_active )
			$services_active .= 'helight';
		
		
		/**
		 * Create column class
		*/
		$slider_id = rand(1,1000);
		
		$number_testimonials  = $options['number_testimonials'];
		$kiemtra			  = 1;
		
		?>
		<div class="liwo bottom_section">
			<div class="one_half">
		        <div class="testimonials">
		          	<div class="people_says_main">
			            <h2><?php echo $options['testimonials_title']; ?></h2>
			            <div class="people_says">
			              	<ul id="mycarousel<?php echo $slider_id; ?>" class="jcarousel-skin-tango">
			              		<?php
			              			$posts_array = get_posts( 'posts_per_page='.$number_testimonials.'&post_type=dslc_testimonials' );
			              			foreach ($posts_array as $testimonial ) : 
			              		?>
					                <li>
					                  	<div class="picture">
					                  		<?php 
					                  			if(get_the_author_meta( '_cmb_avatar', $testimonial->post_author )){
					                  				echo get_the_author_meta( '_cmb_avatar', $testimonial->post_author );
					                  			} else {
					                  				echo get_avatar( $testimonial->post_author, 140 );
					                  			}
					                  		?>
					                  	</div>
					                  	<?php
					                  		if($testimonial->post_excerpt){
					                  			echo wpautop(wp_trim_words($testimonial->post_excerpt, 30, ''));
					                  		} else {
					                  			echo wpautop(wp_trim_words($testimonial->post_content, 30, ''));
					                  		}
					                  	?>
					                  	<strong><?php echo get_the_author_meta( 'display_name', $testimonial->post_author ); ?> &nbsp;<i>- <?php echo get_post_meta($testimonial->ID, 'dslc_testimonial_author_pos', true); ?></i></strong>
					                </li>
					            <?php
					            	endforeach;
									wp_reset_postdata();
					            ?>
			             	</ul>
			            </div>
		          	</div>
		        </div>
		    </div>
		</div>
		
		<script type="text/javascript">

			jQuery(document).ready(function() {
				jQuery('#mycarousel<?php echo $slider_id; ?>').jcarousel();
			});
			
		</script>

		<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}