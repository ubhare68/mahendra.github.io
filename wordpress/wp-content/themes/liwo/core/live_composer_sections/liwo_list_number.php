<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Choose" );')
);

class Liwo_Choose extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Choose';
    var $module_title = 'List Number';
    var $module_icon = 'tasks';
    var $module_category = 'Liwo - Elements';
 
 	// Module Options
    function options() { 
    	// The options array
    	$dslc_options = array(
			array(
				'label' => __( 'Number', 'themestudio' ),
				'id' => 'number',
		 		'std' => '1',
				'type' => 'text',
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Title', 'themestudio' ),
				'id' => 'title',
		 		'std' => 'Edit Title',
				'type' => 'text',
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Description', 'themestudio' ),
				'id' => 'desc',
		 		'std' => 'Edit description',
				'type' => 'textarea',
				'section' => 'functionality',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-text-module-content',
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
	?>
		
		<ul class="lirt_section">
	        <li class="left"><?php echo $options['number']; ?></li>
	        <li><strong><?php echo $options['title']; ?></strong> 
	        	<i><?php echo $options['desc']; ?></i>
	        </li>
	    </ul>
	    <div class="clearfix mar_top2"></div>
		
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}