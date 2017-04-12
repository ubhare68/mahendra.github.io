<?php

if ( ! function_exists( 'wdjewelry_wd_tini_wishlist' ) ) {
	function wdjewelry_wd_tini_wishlist(){
		$_actived = apply_filters('active_plugins',get_option('active_plugins'));
		if(!in_array('woocommerce/woocommerce.php', $_actived)){
			return ;
		}
		
		if ( !defined('YITH_WCWL') ) {
			return '';
		}

		global $wpdb;
		$has_table = $wpdb->query("SHOW TABLES LIKE '".YITH_WCWL_TABLE."'" );
		if( !$has_table )
			return;
		
		ob_start();
		
		if( isset( $_GET['user_id'] ) && !empty( $_GET['user_id'] ) ) {
			$user_id = $_GET['user_id'];
		} elseif( is_user_logged_in() ) {
			$user_id = get_current_user_id();
		}
		$wishlist_page = esc_url( get_permalink( get_option( 'yith_wcwl_wishlist_page_id' ) ) );
		//$count = array();
		$temp=0;
		if( is_user_logged_in() || ( isset( $user_id ) && !empty( $user_id ) ) ) {
			$count = $wpdb->get_results( $wpdb->prepare( 'SELECT COUNT(*) as `cnt` FROM `' . YITH_WCWL_TABLE . '` WHERE `user_id` = %d', $user_id  ), ARRAY_A );
			$temp = $count[0]['cnt'];
		} elseif( yith_usecookies() ) {
			$temp = count( yith_getcookie( 'yith_wcwl_products' ) );
		} 
		else {
            if( isset( $_SESSION['yith_wcwl_products'] ) ) 
                { $temp = count( $_SESSION['yith_wcwl_products'] ); }
        }
		$count = $temp;
		
		?>
		<?php do_action( 'wd_before_tini_wishlist' ); ?>
		<a href="<?php echo esc_url($wishlist_page); ?>">
			<span><?php esc_html_e('Wishlist','wdjewelry'); echo '(<span class="wd_tini_wishlist_number">'.(((int)$count < 10 && (int)$count != 0)?'0'.(int)$count:(int)$count).'</span>)'; ?></span>
		</a>

		<?php do_action( 'wd_after_tini_wishlist' ); ?>
		<?php
		$tini_wishlist = ob_get_clean();
		return $tini_wishlist;
	}
}

if ( ! function_exists( 'wdjewelry_wd_update_tini_wishlist' ) ) {
	function wdjewelry_wd_update_tini_wishlist() {
		die($_tini_wishlist_html = wdjewelry_wd_tini_wishlist());
	}
}

add_action('wp_ajax_update_tini_wishlist', 'wdjewelry_wd_update_tini_wishlist');
add_action('wp_ajax_nopriv_update_tini_wishlist', 'wdjewelry_wd_update_tini_wishlist');