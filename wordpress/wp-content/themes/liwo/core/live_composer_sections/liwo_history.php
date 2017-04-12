<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_History_Block" );')
);

class Liwo_History_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_History_Block';
    var $module_title = 'History';
    var $module_icon = 'tasks';
    var $module_category = 'Liwo - Elements';
 
 	// Module Options
    function options() { 
    	// The options array
    	$dslc_options = array(
			array(
				'label' => 'History - Date time || Content',
				'id' => 'content',
				'std' => '2014||There are many variations of passages of lpsum available but the majority have suffered alteration some form by injected humou randomised words.
						2013||Cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections.
						2012||Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.',
				'type' => 'textarea',
				'section' => 'styling',
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
		
		<div class="list_doted02">
	        <ul>
	          	<?php 
					$content = stripcslashes( $options['content'] );
					$items = preg_split( '/\r\n|\r|\n/', $content );

					$output = '';
					$dem    = 1;
					foreach($items as $item){
						$parts = explode("||", $item);
						if (isset($parts[0])) {
							$output .= '<li><h5><i class="fa fa-calendar"></i> &nbsp;'.$parts[0].'</h5>';
						}
						if (isset($parts[1])) {
					   		$output .= htmlspecialchars_decode( $parts[1] ) . '</li>';
						}
					}

					echo $output;
				?>
	        </ul>
	
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}