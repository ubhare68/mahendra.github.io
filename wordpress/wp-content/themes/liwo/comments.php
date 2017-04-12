<?php 
	/**
	 * comments.php
	 * The comments template used in Liwo
	 * @author Vu Ngoc Linh
	 * @package Liwo
	 * @since 1.0.0
	 */
	$custom_comment_form = array( 
		'title_reply'       => __( '<i>Leave a Comment</i>', 'themestudio' ),
		'fields' => apply_filters( 
			'comment_form_default_fields', 
			array(
	    
			    'author' => '<input type="text" name="yourname" id="name" class="comment_input_bg" />
							<label for="name">Name*</label>',
			    'email'  => '<input type="text" name="email" id="mail" class="comment_input_bg" />
							<label for="mail">Mail*</label>',
			    'url'    => '<input type="text" name="website" id="website" class="comment_input_bg" />
							<label for="website">Website</label>'
	    	) 
	    ),
	  	'comment_field' => '<textarea name="comment" class="comment_textarea_bg" rows="20" cols="7" ></textarea>
							<div class="clearfix"></div>',
	  	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out?</a>','themestudio' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
	  	'cancel_reply_link' => __( 'Cancel' , 'themestudio' ),
	  	'comment_notes_before' => '',
	  	'label_submit' => __( 'Submit Comment' , 'themestudio' ),
	  	'comment_notes_after' => '<p class="comment_checkbox">
							<input type="checkbox" name="check" />
							Notify me of followup comments via e-mail</p><p></p>',
	  	'id_submit'         => 'comment_submit',
	  );
?>


<h4>
	<i>Comments</i>
</h4>
<div id="comments">
	<?php 
		if( have_comments() ){
		  echo '<ol id="singlecomments" class="commentlist">';
		  wp_list_comments('type=comment&callback=ts_comment');
		  echo '</ol>';
		}
		
		paginate_comments_links(); 
	?>
</div>

<div class="comment_form">
	
	<?php
		comment_form($custom_comment_form); 
	?>
</div>