<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Dropcaps" );')
);

class Liwo_Dropcaps extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Dropcaps';
    var $module_title = 'Dropcaps';
    var $module_icon = 'font';
    var $module_category = 'Liwo - Elements';
 
 	// Module Options
    function options() {
    	// The options array
    	$dslc_options = array(
			array(
                'label' => __( 'Dropcaps - Content', 'dslc_string' ),
                'id' => 'content',
                'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'type' => 'textarea',
                'visibility' => 'hidden',
                'section' => 'styling'
            ),
            array(
                'label' => 'Dropcaps style',
                'id' => 'style',
                'std' => 'dropcap1',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'Style 1',
                        'value' => 'dropcap1'
                    ),
                    array(
                        'label' => 'Style 2',
                        'value' => 'dropcap2 gray'
                    ),
                    array(
                        'label' => 'Style 3',
                        'value' => 'dropcap3 gray'
                    )
                )
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
        <?php if ( $dslc_active ) { ?>
            <div class="dslca-editable-content" data-id="content">
        <?php } ?>
            <?php 
                $output_content = strip_tags( $options['content'] );
                $str = trim($output_content);
            ?>
                <p><span class="<?php echo $options['style']; ?>"><?php echo strtoupper(substr($str,0,1)); ?></span><?php echo substr($str,1); ?></p>
        <?php if ( $dslc_active ) { ?>
            </div>
            <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook">Edit Content</span></div>
        <?php } ?>
<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}