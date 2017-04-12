<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Alert_Block" );')
);

class Liwo_Alert_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Alert_Block';
    var $module_title = 'Alert Bar';
    var $module_icon = 'exclamation-sign';
    var $module_category = 'Liwo - Elements';
 
 	// Module Options
    function options() { 
		
		// Get categories
		$cats = array(
			array(
				'label' => 'Alert Bar - Standard Alert',
				'value' => 'standard'
			),
			array(
				'label' => 'Alert with Dismiss',
				'value' => 'dismiss'
			),
		);

		$types = array(
			array(
				'label' => 'Notice',
				'value' => 'notice'
			),
			array(
				'label' => 'Error',
				'value' => 'error'
			),
			array(
				'label' => 'Success',
				'value' => 'success'
			),
			array(
				'label' => 'Info',
				'value' => 'info'
			),
		);
	
    	// The options array
    	$dslc_options = array(
			array(
				'label' => 'Content',
				'id' => 'content',
				'std' => 'This is an <strong>Information Message!</strong> - Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
				'type' => 'textarea',
				'visibility' => 'hidden',
				'section' => 'styling'
			),
			array(
				'label' => 'Alert Type',
				'id' => 'type',
				'std' => 'standard',
				'type' => 'select',
				'choices' => $cats
			),
			array(
				'label' => 'Alert Appearance',
				'id' => 'appearance',
				'std' => 'info',
				'type' => 'select',
				'choices' => $types
			),
		);
		
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

			<div class="<?php echo $options['appearance']; ?>">
			<div class="message-box-wrap">

				<?php if( $options['type'] == 'dismiss' ) : ?>
					<!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
					<button id="colosebut1" class="close-but">close</button>
				<?php endif; ?>

				<?php 

					if ( $dslc_active ) {
						?>
						<span class="dslca-editable-content" data-id="content">
						<?php
					}

						$output_content = stripslashes(  $options['content']  );

						$output_content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $output_content);
						echo $output_content;
	
					if ( $dslc_active ) {
						?></span><!-- .dslca-editable-content -->
						<div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook">Edit Content</span></div>
						<?php
					}
	
				?>
			</div>
			</div>
	
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}