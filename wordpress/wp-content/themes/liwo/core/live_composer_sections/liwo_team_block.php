<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Liwo_Team_Block" );')
);

class Liwo_Team_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Liwo_Team_Block';
    var $module_title = 'Team Member';
    var $module_icon = 'user';
    var $module_category = 'Liwo - Block';
 
 	// Module Options
    function options() { 
        $team = array();
        $team[] = array(
            'label' => '--Select Team--',
            'value' => '',
        );
        
        $myposts = get_posts( 'post_type=dslc_staff&posts_per_page=50' );
        foreach ( $myposts as $post ) {
            $team[] = array(
                'label' => $post->post_title,
                'value' => $post->ID
            );
        }
        wp_reset_postdata();

    	// The options array
    	$dslc_options = array(
    		
    		array(
    			'label' => 'Team Post',
    			'id' => 'team_id',
    			'std' => '',
    			'type' => 'select',
    			'choices' => $team,
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

		$this->module_start( $options );
		
        if ($options['team_id']) {
            $team_post = get_post($options['team_id']);
        
    	
			/**
			 * Get blog posts by blog layout.
			 */
			// get_template_part('loop/content', 'team_section');
            $large_image_url    = wp_get_attachment_image_src( get_post_thumbnail_id($team_post->ID), 'large');
            $position           = get_post_meta( $team_post->ID, 'dslc_staff_position', true );
            $social_twitter     = get_post_meta( $team_post->ID, 'dslc_staff_social_twitter', true );
            $social_facebook    = get_post_meta( $team_post->ID, 'dslc_staff_social_facebook', true );
            $social_googleplus  = get_post_meta( $team_post->ID, 'dslc_staff_social_googleplus', true );
            $social_linkedin    = get_post_meta( $team_post->ID, 'dslc_staff_social_linkedin', true );
            $social_pinterest   = get_post_meta( $team_post->ID, 'dslc_staff_social_pinterest', true );
        ?>

            <div class="our_team_box_big">
                <div class="cont-area">
                    <img src="<?php echo $large_image_url[0]; ?>" alt="" class="teammempic" />
                    <ul>
                        <li><strong><?php echo $team_post->post_title; ?><i> - <?php echo $position; ?></i></strong></li>
                        <li><a href="<?php echo $social_facebook; ?>"><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li><a href="<?php echo $social_twitter; ?>"><i class="fa fa-twitter fa-lg"></i></a></li>
                        <li><a href="<?php echo $social_googleplus; ?>"><i class="fa fa-google-plus fa-lg"></i></a></li>
                        <li><a href="<?php echo $social_linkedin; ?>"><i class="fa fa-linkedin fa-lg"></i></a></li>
                        <li><a href="<?php echo $social_pinterest ?>"><i class="fa fa-pinterest fa-lg"></i></a></li>
                    </ul>
                </div>
                <?php echo $team_post->post_excerpt; ?>
    	    </div>
            <?php wp_reset_postdata(); ?>
        <?php } else { ?>
            <div class="dslc-notification dslc-red"><?php echo __( 'No data has been set yet, edit the module to set one.', 'themestudio' ); ?></div>
        <?php } ?>
        <div class="clearfix"></div>
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}