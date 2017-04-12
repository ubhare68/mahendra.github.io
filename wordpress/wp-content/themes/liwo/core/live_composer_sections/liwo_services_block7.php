<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Services_Section7" );')
);

class Liwo_Services_Section7 extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Services_Section7';
    var $module_title = 'Service 7';
    var $module_icon = 'cogs';
    var $module_category = 'Liwo - Block';


 	// Module Options
    function options() { 
    	
		$post_choices = array();
		$post_choices[] = array(
			'label' => '-- Select service --',
			'value' => '',
		);
		$myposts = get_posts( 'post_type=service&posts_per_page=50' );
		foreach ( $myposts as $post ) :
			$post_choices[] = array(
				'label' => $post->post_title,
				'value' => $post->ID
			);
		endforeach; 
		wp_reset_postdata();
		

    	// The options array
    	$dslc_options = array(
			array(
				'label' => 'Service 7 - Services Post',
				'id' => 'services-post',
				'std' => '',
				'type' => 'select',
				'choices' => $post_choices,
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.liwo_services_block7',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
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
		 * Create column class for services
		*/
		
		?>

		<?php 
		if ($options['services-post']) {
			$services = get_post($options['services-post']);
		?>	
		    <div class="liwo_services_block7">
		        <div class="one_full">
		          <div class="liwo_services_block7_list">
		          	<div class="services_block7">
		          		<div class="left">
			            	<i class="fa <?php echo get_post_meta( $services->ID, "liwo_service_select_icon", true ); ?> fa-2x"></i>
			            </div>
		          	</div>
		            <div class="right">
		              <h5><?php echo $services->post_title; ?></h5>
		              <p><?php echo $services->post_excerpt; ?></p>
		            </div>
		          </div>
		        </div>
		    </div>
	    	<?php wp_reset_postdata(); ?>
	    <?php } else { ?>
			<div class="dslc-notification dslc-red"><?php echo __( 'No data has been set yet, edit the module to set one.', 'themestudio' ); ?></div>
	    <?php } ?>
	    <div class="clearfix"></div>
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}