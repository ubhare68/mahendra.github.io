<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Parallax" );')
);

class Liwo_Parallax extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Parallax';
    var $module_title = 'Custom Parallax';
    var $module_icon = 'font';
    var $module_category = 'Liwo - Misc';
 
 	// Module Options
    function options() { 		
    	// The options array
    	$dslc_options = array(
			array(
				'label' => __('Custom Parallax - Title Left', 'themestudio'),
				'id' => 'text_left',
				'std' => 'Build an <b>Amazing</b> Website with <strong>liwo</strong>',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => __('Title Riht', 'themestudio'),
				'id' => 'text_right',
				'std' => '<b>Printer took a galley of and scrambled it to make a</b> specimen book has <strong>survived not only five centuries</strong>',
				'type' => 'textarea',
				'section' => 'functionality'
			),
			array(
				'label' => __( 'HTML/Shortcode', 'dslc_string' ),
				'id' => 'content',
				'std' => '<div class="buttons"> <a class="two" href="#"><i class="fa fa-shopping-cart"></i> Buy Now!</a> <a class="one" href="#"><i class="fa fa-info-circle"></i> View More</a> </div>',
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
		
		<div id="parallax_01">
		    <div class="container">
		      	<div class="left">
		      		<?php echo $options['text_left']; ?>
		      	</div>
		      	<div class="right"> 
		      		<?php echo $options['text_right']; ?>
		        	<?php
		        		$output_content = stripslashes( $options['content'] );
						$output_content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $output_content);
						$output_content = wpautop(do_shortcode( htmlspecialchars_decode($output_content) ));
						echo $output_content;
		        	?>
		      </div>
		    </div>
		</div>
	
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}