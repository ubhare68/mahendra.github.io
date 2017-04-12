<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Services_Section8" );')
);

class Liwo_Services_Section8 extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Services_Section8';
    var $module_title = 'Service 8';
    var $module_icon = 'cogs';
    var $module_category = 'Liwo - Block';


 	// Module Options
    function options() { 
    	global $ts_icon_hover;
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
				'label' => 'Service 8 - Services Post',
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
				'affect_on_change_el' => '.liwo_services_block8',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			
			/*
			 * Icon hover effects
			*/
			array(
				'label' => __( 'Icon Hover Style', 'dslc_string' ),
				'id' => 'css_icon_hover_class',
				'std' => '1',
				'type' => 'select',
				'choices' => $ts_icon_hover,
				'section' => 'styling',
				'tab' => 'Icon Hover',
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
		    <div class="one_full liwo_services_block8">
		        <ul class="block_style_8_box2">
		            <li>
						<div class="hi-icon-wrap hi-icon-effect-<?php echo $options['css_icon_hover_class']; ?> hi-icon-effect-<?php echo $options['css_icon_hover_class']; ?>a">
		            	<i class="fa <?php echo get_post_meta( $services->ID, "liwo_service_select_icon", true ); ?> fa-3x"></i>
		            	</div>
		            </li>
		            <li>
		              <h3><?php echo $services->post_title; ?></h3>
		            </li>
		            <li><?php echo $services->post_excerpt; ?></li>
		        </ul>
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