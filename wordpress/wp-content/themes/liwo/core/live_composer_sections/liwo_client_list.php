<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Client_List" );')
);

class Liwo_Client_List extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Client_List';
    var $module_title = 'Client List';
    var $module_icon = 'user';
    var $module_category = 'Liwo - Section';


 	// Module Options
    function options() { 

		// Get post gallery
		// post_type=studio_gallery
		$post_choices = array();
		$posts_array = get_posts( 'post_type=studio_gallery' );
		$post_choices[] = array(
			'label' => '--Select Post Gallery--',
			'value' => '',
		);
		foreach ($posts_array as $post ) :
			$post_choices[] = array(
				'label' => $post->post_title,
				'value' => $post->ID,
			);
		endforeach;
		wp_reset_postdata();

		

    	// The options array
    	$dslc_options = array(
   			
			array(
				'label' => 'Client List - Post Galleries',
				'id' => 'gallery_post',
				'std' => '',
				'type' => 'select',
				'choices' => $post_choices,
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
		
		if($options['gallery_post']):

		?>
			
		<?php
			$slider_id 		= rand(1,1000);
			$post_id 		= $options['gallery_post'];
			$attachments2 	= get_post_meta( $post_id, 'liwo_gallery_slider', true );
		?>

		<div class="clients">
		    	<ul id="mycarousel<?php echo $slider_id; ?>" class="jcarousel-skin-tango">
		    		<?php if($attachments2){ ?>
			    		<?php foreach ( $attachments2 as $attachment2 ){ ?>
				  			<li><img src="<?php echo $attachment2; ?>" alt=""></li>
				  		<?php } ?>
				  	<?php } ?>
		    	</ul>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#mycarousel<?php echo $slider_id; ?>').jcarousel();
			});
		</script>
		
	<?php else: ?>
		<div class="dslc-notification dslc-red"><?php echo __( 'No data has been set yet, edit the module to set one.', 'themestudio' ); ?></div>
	<?php endif; ?>

	<div class="clearfix"></div>

	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}