<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Testimonials_Single" );')
);

class Liwo_Testimonials_Single extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Testimonials_Single';
    var $module_title = 'Testimonial';
    var $module_icon = 'quote-left';
    var $module_category = 'Liwo - Block';


 	// Module Options
    function options() { 
    	// Get dslc_testimonials
		$testimonials = get_posts('post_type=dslc_testimonials');
		$testimonial_choices = array();
		$testimonial_choices[] = array(
			'label' => 'Testimonial - Select Testimonial',
			'value' => 'none'
		);

		// Generate usable array of dslc_testimonials
		foreach ( $testimonials as $testimonial ) {
			$testimonial_choices[] = array(
				'label' => $testimonial->post_title,
				'value' => $testimonial->ID
			);
		}

		wp_reset_query();
		wp_reset_postdata();

    	// The options array
    	$dslc_options = array(
   			array(
				'label' => 'Testimonials Styles',
				'id' => 'style',
				'std' => '1',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => 'Style 1',
						'value' => '1'
					),
					array(
						'label' => 'Style 2',
						'value' => '2'
					),
					array(
						'label' => 'Style 3',
						'value' => '3'
					),
				)
			),
			array(
    			'label' => 'Select testimonial',
    			'id' => 'testimonial',
    			'std' => 'none',
    			'type' => 'select',
    			'choices' => $testimonial_choices
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
		if($options['testimonial']!='none'):

		switch ($options['style']) {
			case '2':
				$testimonial = get_post($options['testimonial']);
		?>
					<div class="testimonials-4">
			          	<div class="content">
				          	<span class="image_left1" >
				          		<?php 
				          			if(get_the_author_meta( '_cmb_avatar', $testimonial->post_author )){
				          				echo get_the_author_meta( '_cmb_avatar', $testimonial->post_author );
				          			} else {
				          				echo get_avatar( $testimonial->post_author, 50 );
				          			}
				          		?>
				          	</span>
				          	<?php
			              		if($testimonial->post_excerpt){
			              			echo wpautop(wp_trim_words($testimonial->post_excerpt, 30, ''));
			              		} else {
			              			echo wpautop(wp_trim_words($testimonial->post_content, 30, ''));
			              		}
			              	?>
				          	<br /><br />
				            <strong>- <?php echo get_the_author_meta( 'display_name', $testimonial->post_author ); ?></strong>
			            </div>
			        </div>
		<?php
			break;
		
			case '3':
			$testimonial = get_post($options['testimonial']);
		?>
				<div class="testimonials-2">
		          	<span><i class="fa fa-quote-left fa-2x"></i>&nbsp; 
			          	<?php
		              		if($testimonial->post_excerpt){
		              			echo wpautop(wp_trim_words($testimonial->post_excerpt, 30, ''));
		              		} else {
		              			echo wpautop(wp_trim_words($testimonial->post_content, 30, ''));
		              		}
		              	?> 
			        	<br /><br />
		          		<strong>- <?php echo get_the_author_meta( 'display_name', $testimonial->post_author ); ?></strong>
		          	</span> 
		        </div>
		<?php
			break;
			
			default:
			$testimonial = get_post($options['testimonial']);
		?>
				<div class="testimonials-5">
			        <span>
			        	<i class="fa fa-quote-left fa-2x"></i>&nbsp;  
			        		<?php
			              		if($testimonial->post_excerpt){
			              			echo wpautop(wp_trim_words($testimonial->post_excerpt, 30, ''));
			              		} else {
			              			echo wpautop(wp_trim_words($testimonial->post_content, 30, ''));
			              		}
			              	?>
			        	<br />
			       		<strong>- <?php echo get_the_author_meta( 'display_name', $testimonial->post_author ); ?></strong>
			        </span> 
			    </div>
		<?php
			break;
		}

		else :
		?>
			<div class="dslc-notification dslc-red"><?php echo __( 'No data has been set yet, edit the module to set one.', 'themestudio' ); ?></div>
		<?php
		endif;
		wp_reset_postdata();
		?>

		<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}