<?php 
	/*
	Template Name: Contact
	*/
	
	/**
	 * page_contact.php
	 * The contact page template in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	get_header(); 
	the_post();
	global $liwo;
	
	$response = "";

	//function to generate response
	function my_contact_form_generate_response($type, $message){
		global $response;
		if($type == "success") $response = ' style="display: block;"';
	}

	//user posted variables
	if($_POST){
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$message 	= $_POST['message'];
		$subject 	= $_POST['subject'];


		//php mailer variables
		$to = get_option('admin_email');
		$headers = 'From: '. $email . "\r\n" .'Reply-To: ' . $email . "\r\n";
	    //validate email
	    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	      my_contact_form_generate_response("error", $email_invalid);
	    else //email is valid
	    {
	      //validate presence of name and message
	      if(empty($name) || empty($message)){
	        my_contact_form_generate_response("error", $missing_content);
	      }
	      else //ready to go!
	      {
	        $sent = wp_mail($to, $subject, strip_tags($message), $headers);
	        if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
	        else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
	      }
	    }
		  
	}


?>
	<div class="container">
    <div class="content_fullwidth">
      <div class="one_half">
        <?php echo $liwo['contact_text']; ?>
        <br />
        <?php get_template_part( 'content-parts/contact', 'form' ); ?>
      </div>
      <div class="one_half last">
        <div class="address-info">
          <?php if($liwo['contact_switch_address_info']){ ?>
          	
	          <h3><?php echo __('Address', 'themestudio'); ?> <strong><?php echo __('Info', 'themestudio'); ?></strong></h3>
	          <ul>
	            <li> 
	            	<?php echo $liwo['contact_address_textarea']; ?>
	            	
	            </li>
	          </ul>
          <?php } ?>
        </div>
        <?php if($liwo['contact_switch_map']){ ?>
        	<?php //echo $liwo['contact_map_textarea']; ?>
        	<?php get_template_part('content-parts/contact', 'map'); ?>
        <?php } ?>
    </div>
  </div>
  <!-- end content area -->
  <div class="clearfix mar_top5"></div>
	
<?php	
	
	if( get_post_meta( $post->ID, '_ebor_map_address', true ) ) : 
?>

	<script type="text/javascript">
		/*-----------------------------------------------------------------------------------*/
		/*	MAP
		/*-----------------------------------------------------------------------------------*/
		jQuery(document).ready(function($){
		'use strict';
		
			<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); $url = $url[0]; ?>
			jQuery('.map').goMap({ address: '<?php echo get_post_meta( $post->ID, '_ebor_map_address', true ); ?>',
			  zoom: 14,
			  mapTypeControl: false,
		      draggable: false,
		      scrollwheel: false,
		      streetViewControl: false,
		      maptype: 'ROADMAP',
	    	  markers: [
	    		{ 'address' : '<?php echo get_post_meta( $post->ID, '_ebor_map_address', true ); ?>' }
	    	  ],
			  icon: '<?php echo $url; ?>', 
				  addMarker: false
		});
		
		});
	</script>
		
<?php 
	endif; 
	
	get_footer();