<?php 
if(!function_exists('wdjewelry_metabox_page')){
	function wdjewelry_metabox_page(){
		add_meta_box( 'config_Page',__( 'Config Page', 'wdjewelry' ),'wdjewelry_metabox_callback_page', 'page','normal','high' );
	}
	add_action('add_meta_boxes','wdjewelry_metabox_page' );
}

if(!function_exists('wdjewelry_metabox_callback_page')){

	function wdjewelry_metabox_callback_page($post){
		global $wdjewelry_default_sidebar;

		$header = get_post_meta( $post->ID,'_header',true );
		$bread = get_post_meta( $post->ID,'_breadcrumbs',true );
		$footer = get_post_meta( $post->ID,'_footer',true );
		wp_nonce_field( 'save_metabox','field_metabox_nonce');
	?>
	<div class="wd_meta_box_page">
		<div class="wd_config_field">
			<label><?php echo esc_html__('Style Header : ','wdjewelry'); ?></label>
			<select name='style_header' class="wd_sidebar" id='header_style'>
				<option value="header_default" <?php if ($header==='header_default') echo esc_attr("selected='selected'");?>>
					<?php echo esc_html__( 'Default','wdjewelry'); ?>
				</option>
				<option value="header_1" <?php if ($header==='header_1') echo esc_attr("selected='selected'");?>>
					<?php echo esc_html__( 'Header 1','wdjewelry'); ?>
				</option>
				<option value="header_hidden" <?php if ($header==='header_hidden') echo esc_attr("selected='selected'");?>>
					<?php echo esc_html__( 'Hidden','wdjewelry'); ?>
				</option>
			</select>
		</div>


		<div class="wd_config_field">
			<label><?php echo esc_html__('Footer : ','wdjewelry' ); ?></label>
			<select name='style_footer' class="wd-footer-style" >
				<option value="footer_default" <?php if ($footer ==='footer_default') echo esc_attr("selected='selected'");?>>
					<?php echo esc_html__( 'Default','wdjewelry'); ?>
				</option>
				<option value="footer_hidden" <?php if ($footer === 'footer_hidden') echo esc_attr("selected='selected'");?>>
					<?php echo esc_html__( 'Hidden','wdjewelry'); ?>
				</option>
			</select>
		</div>
		<div class="wd_config_field">
			<label><?php echo esc_html__('Breadcrumbs: ','wdjewelry' ); ?></label>
			<select name='breadcrumbs' class="wd_sidebar" id='wd-breadcrumbs'>
				<option value="show" <?php if ($bread == 'show') echo esc_attr("selected='selected'");?>>
					<?php echo esc_html__( 'Show ','wdjewelry'); ?>
				</option>
				<option value="hidden" <?php if ($bread == 'hidden') echo esc_attr("selected='selected'");?>>
					<?php echo esc_html__( 'Hidden','wdjewelry'); ?>
				</option>
			</select>
		</div>
	</div>
	<?php
	}
}

if(!function_exists('wdjewelry_metabox_save_page')){
	function wdjewelry_metabox_save_page($post_id){

		if(!isset($_POST['field_metabox_nonce'])){
			return;
		}
		if(!wp_verify_nonce($_POST['field_metabox_nonce'],'save_metabox' )){
			return ;
		}

		$header = sanitize_text_field($_POST['style_header'] );
		$breadcrumbs = sanitize_text_field($_POST['breadcrumbs'] );
		$footer = sanitize_text_field($_POST['style_footer'] );
		
		update_post_meta( $post_id,'_footer',$footer );
		update_post_meta( $post_id,'_header',$header );
		update_post_meta( $post_id,'_breadcrumbs',$breadcrumbs);

	}
	add_action('save_post','wdjewelry_metabox_save_page');
}
?>