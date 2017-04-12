<?php 
if(!function_exists('wdjewelry_metabox')){
	function wdjewelry_metabox(){
		add_meta_box( 'config_post',__( 'Config Post', 'wdjewelry' ),'wdjewelry_metabox_callback', 'post','normal','high' );
	}
	add_action('add_meta_boxes','wdjewelry_metabox' );
}

if(!function_exists('wdjewelry_metabox_callback')){
	function wdjewelry_metabox_callback($post){

		$link_video = get_post_meta( $post->ID, '_link_video', true );
		$link_audio = get_post_meta( $post->ID,'_link_audio',true );
		$link_color = get_post_meta( $post->ID,'_link_color',true );
		wp_nonce_field( 'save_metabox','field_metabox_nonce');

		echo '<p><label for = "link_video">'.esc_html__('Link Video : ','wdjewelry').'</label>';
		echo '<input type="text" id="link_video" name="link_video" value="'.esc_attr($link_video).'" /></p>';

		echo '<p><label for = "link_audio">'.esc_html__('Link Audio','wdjewelry').'</label>';
		echo '<input type="text" id="link_audio" name="link_audio" value="'.esc_attr($link_audio).'" /></p>';
	echo '<p><label for = "link_color">'.esc_html__('Color','wdjewelry').'</label>';
		echo '<input type="text" id="link_color" name="link_color" value="'.esc_attr($link_color).'" /></p>';
	}
}

if(!function_exists('wdjewelry_metabox_save')){
	function wdjewelry_metabox_save($post_id){

		if(!isset($_POST['field_metabox_nonce'])){
			return;
		}
		if(!wp_verify_nonce($_POST['field_metabox_nonce'],'save_metabox' )){
			return ;
		}

		$link_audio = sanitize_text_field($_POST['link_audio'] );
		$link_video = sanitize_text_field($_POST['link_video'] );
		$link_color = sanitize_text_field($_POST['link_color'] );

		update_post_meta( $post_id,'_link_audio',$link_audio );
		update_post_meta( $post_id,'_link_video',$link_video );
		update_post_meta( $post_id,'_link_color',$link_color );

	}
	add_action('save_post','wdjewelry_metabox_save');
}
?>