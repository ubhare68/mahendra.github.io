<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Parallax1" );')
);

class Liwo_Parallax1 extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Parallax1';
    var $module_title = 'Custom Parallax 1';
    var $module_icon = 'font';
    var $module_category = 'Liwo - Misc';
 
 	// Module Options
    function options() { 		
    	// The options array
    	$dslc_options = array(
			array(
				'label' => __('Title Parallax', 'themestudio'),
				'id' => 'text_title',
				'std' => 'We Build <strong>Smarter</strong> Stuff!',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => __('Description', 'themestudio'),
				'id' => 'text_desc',
				'std' => 'Find the Benefits of Using liwo.',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => __('Button Text', 'themestudio'),
				'id' => 'text_button',
				'std' => 'Buy Theme now!',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => __('Button Link', 'themestudio'),
				'id' => 'text_button_link',
				'std' => '',
				'type' => 'textarea',
				'section' => 'functionality'
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

      	<div id="parallax_01" class="bg_parralax" data-type="background" data-speed="10">
	        <div class="container">
	          <div class="parallax_sec1">
	            <div class="parallax_sec1_text">
	              <h1><?php echo $options['text_title']; ?></h1>
	              <h2><?php echo $options['text_desc'] ?></h2>
	              <div class="clearfix mar_top3"></div>
	              <a href="<?php echo $options['text_button_link']; ?>" class="but_transp"><?php echo $options['text_button']; ?></a> </div>
	          </div>
	        </div>
      	</div>
    	<div class="clearfix"></div>
	
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}