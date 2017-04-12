<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_List_Block" );')
);

class Liwo_List_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_List_Block';
    var $module_title = 'List';
    var $module_icon = 'tasks';
    var $module_category = 'Liwo - Elements';
 
 	// Module Options
    function options() { 
    	// The options array
    	$dslc_options = array(
			array(
				'label' => 'List - Content',
				'id' => 'content',
				'std' => 'List item 1
				List item 2
				List item 3',
				'type' => 'textarea',
				'section' => 'styling',
			),
			array(
				'label' => __( 'List style icon', 'dslc_string' ),
				'type' => 'select',
				'id' => 'list_icon',
				'std' => 'fa-chevron-circle-right',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __('fa-chevron-circle-right', 'dslc_string'),
						'value' => 'fa-chevron-circle-right'
					),
					array(
						'label' => __('fa-caret-right', 'dslc_string'),
						'value' => 'fa-caret-right'
					),
					array(
						'label' => __('fa-arrow-circle-right', 'dslc_string'),
						'value' => 'fa-arrow-circle-right'
					),
					array(
						'label' => __('fa-arrow-right', 'dslc_string'),
						'value' => 'fa-arrow-right'
					),
					array(
						'label' => __('fa-angle-double-right', 'dslc_string'),
						'value' => 'fa-angle-double-right'
					),
					array(
						'label' => __('fa-bookmark', 'dslc_string'),
						'value' => 'fa-bookmark'
					),
					array(
						'label' => __('fa-heart', 'dslc_string'),
						'value' => 'fa-heart'
					),
					array(
						'label' => __('fa-check', 'dslc_string'),
						'value' => 'fa-check'
					),
					array(
						'label' => __('fa-camera', 'dslc_string'),
						'value' => 'fa-camera'
					),
					array(
						'label' => __('fa-check-square', 'dslc_string'),
						'value' => 'fa-check-square'
					),
					array(
						'label' => __('fa-anchor', 'dslc_string'),
						'value' => 'fa-anchor'
					),
					array(
						'label' => __('fa-asterisk', 'dslc_string'),
						'value' => 'fa-asterisk'
					),
					array(
						'label' => __('fa-calendar', 'dslc_string'),
						'value' => 'fa-calendar'
					),
					array(
						'label' => __('fa-dashboard', 'dslc_string'),
						'value' => 'fa-dashboard'
					),
					array(
						'label' => __('fa-exclamation', 'dslc_string'),
						'value' => 'fa-exclamation'
					),
					array(
						'label' => __('fa-crop', 'dslc_string'),
						'value' => 'fa-crop'
					),
					array(
						'label' => __('fa-flag', 'dslc_string'),
						'value' => 'fa-flag'
					),
					array(
						'label' => __('fa-female', 'dslc_string'),
						'value' => 'fa-female'
					),
					array(
						'label' => __('fa-cloud-upload', 'dslc_string'),
						'value' => 'fa-cloud-upload'
					),
					array(
						'label' => __('fa-comment', 'dslc_string'),
						'value' => 'fa-comment'
					),
					array(
						'label' => __('fa-glass', 'dslc_string'),
						'value' => 'fa-glass'
					),
					array(
						'label' => __('fa-home', 'dslc_string'),
						'value' => 'fa-home'
					),
					array(
						'label' => __('fa-magnet', 'dslc_string'),
						'value' => 'fa-magnet'
					),
					array(
						'label' => __('fa-picture-o', 'dslc_string'),
						'value' => 'fa-picture-o'
					),
					array(
						'label' => __('fa-puzzle-piece', 'dslc_string'),
						'value' => 'fa-puzzle-piece'
					),
					array(
						'label' => __('fa-star', 'dslc_string'),
						'value' => 'fa-star'
					),
					array(
						'label' => __('fa-volume-up', 'dslc_string'),
						'value' => 'fa-volume-up'
					),
					array(
						'label' => __('fa-clock-o', 'dslc_string'),
						'value' => 'fa-clock-o'
					),
					array(
						'label' => __('fa-truck', 'dslc_string'),
						'value' => 'fa-truck'
					),
					array(
						'label' => __('fa-user', 'dslc_string'),
						'value' => 'fa-user'
					)
				),
			)
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
	?>
		
        <ul class="list1">
          	<?php 
				$content = stripcslashes( $options['content'] );
				$items = preg_split( '/\r\n|\r|\n/', $content );

				$output = '';
				foreach($items as $item){
					$output.= '<li><i class="fa '.$options['list_icon'].'"></i> '.$item.'</li>';
					}

				echo $output;
			?>
        </ul>
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}