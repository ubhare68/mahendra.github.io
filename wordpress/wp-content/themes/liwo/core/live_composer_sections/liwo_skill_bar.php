<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Skill_Bar_Section" );')
);

class Liwo_Skill_Bar_Section extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Skill_Bar_Section';
    var $module_title = 'Skill Bar';
    var $module_icon = 'tasks';
    var $module_category = 'Liwo - Elements';
 
 	// Module Options
    function options() { 
    	// The options array
    	$dslc_options = array(
			array(
				'label' => __( 'Skill Bar - Label', 'themestudio' ),
				'id' => 'label',
		 		'std' => 'CLICK TO EDIT',
				'type' => 'textarea',
				'section' => 'functionality',
			),

			array(
				'label' => __( 'Amount', 'themestudio' ),
				'id' => 'amount',
				'std' => '50',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar-loader-inner',
				'affect_on_change_rule' => 'width',
				'ext' => '%',
				'section' => 'functionality',
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
		$process_id = rand(10, 1000);
	?>
		
		<div id="progress_bar<?php echo $process_id; ?>" class="ui-progress-bar ui-container">
        	<div class="ui-progress"> <span class="ui-label"><?php echo $options['label'] ?> <b class="value"><?php echo $options['amount']; ?>%</b></span> </div>
        </div>

        <script type="text/javascript">
        	jQuery(function($) {
			  	// Hide the label at start
			  	$('#progress_bar<?php echo $process_id; ?> .ui-progress .ui-label').hide();
			  	// Set initial value
			  	$('#progress_bar<?php echo $process_id; ?> .ui-progress').css('width', '7%');

			  	// Simulate some progress
			  	$('#progress_bar<?php echo $process_id; ?> .ui-progress').animateProgress(<?php echo $options['amount'] ?>, function() {
			    	$(this).animateProgress(<?php echo $options['amount'] ?>, function() {
			      		setTimeout(function() {
				        	$('#progress_bar<?php echo $process_id; ?> .ui-progress').animateProgress(<?php echo $options['amount'] ?>, function() {
				          		$('#main_content').slideDown();
				          		$('#fork_me').fadeIn();
				        	});
			      		}, 2000);
			    	});
			  	});
			  
			});
        </script>
	
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}