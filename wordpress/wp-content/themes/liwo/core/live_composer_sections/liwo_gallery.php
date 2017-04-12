<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Gallery" );')
);

class Liwo_Gallery extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Gallery';
    var $module_title = 'Slideshow';
    var $module_icon = 'picture';
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
				'label' => 'Post Galleries',
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

			/**
			 * Create column class for services
			*/
			$slider_id 		= rand(1,1000);
			$post_id 		= $options['gallery_post'];
			$attachments 	= get_post_meta( $post_id, 'liwo_gallery_slider', true );	
		?>

		<div class="liwo">
			<div class="right">
				<ul class="rslides" id="slider<?php echo $slider_id; ?>">
					<?php if($attachments){ ?>
						<?php foreach ( $attachments as $attachment ){ ?>
				  			<li><a href="#"><img src="<?php echo $attachment; ?>" alt="" style="width: 100%;"></a></li>
				  		<?php } ?>
			  		<?php } ?>
		        </ul>
		    </div>
	    </div>
	    <script type="text/javascript">
		    jQuery(function () {
		      	// Slideshow 2
		      	jQuery("#slider<?php echo $slider_id; ?>").responsiveSlides({
		        	auto: true,
		        	pager: true,
		        	speed: 300,
		        	maxwidth: 570
		      	});

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