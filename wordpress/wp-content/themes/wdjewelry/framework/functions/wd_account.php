<?php
	if(!function_exists('wdjewelry_woo_account')){
		function wdjewelry_woo_account(){
			$_active_plugins = apply_filters('active_plugins',get_option('active_plugins' ));
			if(!in_array('woocommerce/woocommerce.php', $_active_plugins)){
				return ;
			}

			global $woocommerce;
			$myaccount_page_id = get_option('woocommerce_myaccount_page_id' );
			if ( $myaccount_page_id ) {
		  		$myaccount_page_url = get_permalink( $myaccount_page_id );
			}else{
				return  ;
			}
			ob_start();
			?>
			<div class='wd-login'>
				<div class='title_login'>
					<?php if(!is_user_logged_in()): ?>
						<a href='javascript:void(0)' id='login_text'><?php echo esc_html__('Login','wdjewelry' ); ?></a>
					<?php else: ?>
						<span class="my_account_wrapper"><a href="<?php echo admin_url( 'profile.php', 'https' ); ?>" title="<?php esc_html_e('My Account','wdjewelry');?>"><?php esc_html_e('My Account','wdjewelry');?></a></span>
						<span class="logout_wrapper"><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php esc_html_e('Logout','wdjewelry');?>"><?php esc_html_e('Logout','wdjewelry');?></a></span>
					<?php endif; ?>
				</div>

			<?php if(!is_user_logged_in()): ?>
				<form method="post" class="login"> 
				<p class="form-row form-row-first">
					<input type="text" class="input-text" placeholder="<?php esc_attr_e('User Name','wdjewelry')?> " name="username" id="username" />
				</p>
				<p class="form-row form-row-last">
					<input class="input-text" type="password" placeholder="<?php esc_attr_e('Password','wdjewelry'); ?>" name="password" id="password" />
				</p>
				<div class="clear"></div>

				<p class="btn_login">
					<?php wp_nonce_field( 'woocommerce-login' ); ?>
					<input type="submit" class="button" name="login" value="<?php esc_attr_e( 'Login', 'wdjewelry' ); ?>" />
					<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
					
				</p>
				<p class="lost_password">
					<label for="rememberme" class="inline">
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'wdjewelry' ); ?>
					</label>
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'wdjewelry' ); ?></a>
				</p>

				<div class="clear"></div>

				</form>
			<?php endif; ?>
		</div>
			<?php

		$acount=ob_get_clean();
		return $acount;
			}
			
		}
if(!function_exists('wdjewelry_ajax_woo_account')){
	function wdjewelry_ajax_woo_account(){
		$info = array();
    	$info['remember'] = true;
		$user_signon = wp_signon( $info, false );
		die($woo_acount = wdjewelry_woo_account() );
	}
}

function wdjewelry_wd_login_fail( $username ) {
	if(isset( $_REQUEST['redirect_to']) && ($_REQUEST['redirect_to'] == admin_url())){
		return;
	}
	if(isset( $_REQUEST['redirect_to']) && strripos($_REQUEST['redirect_to'],'wp-admin') > 0 ){
		return;
	}
	$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
		return 'Woocommerce Plugin do not active';
	}
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	if ( $myaccount_page_id ) {
		$myaccount_page_url = get_permalink( $myaccount_page_id );
		wp_safe_redirect( $myaccount_page_url );
		exit;
	}		
}

add_action( 'wp_login_failed', 'wdjewelry_wd_login_fail' ); 
add_action('wp_ajax_woo_account','wdjewelry_ajax_woo_account' );
add_action('wp_ajax_nopriv_woo_account','wdjewelry_ajax_woo_account' );
	
function wdjewelry_link_login(){
	ob_start();
	if(wdjewelry_checkplugin_woocommerce()){
		$id_myaccount = (get_option('woocommerce_myaccount_page_id' ))?get_option('woocommerce_myaccount_page_id' ):'';
		if(!empty($id_myaccount)){
			echo "<a href='".get_the_permalink($id_myaccount)."'>".esc_html__('Login/sign up','wdjewelry' )."</a>";
		}else{
			echo "<span>plugin woocommerce have not active</span>";
		}
	}
	return ob_get_clean();
}
?>