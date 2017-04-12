<?php 
if( class_exists('YITH_WCWL_UI') && class_exists('YITH_WCWL') ){
	add_action( 'woocommerce_after_shop_loop_item', 'wdjewelry_wd_add_wishlist_button_to_product_list_shortocode',12 );
	add_action( 'wd_woocommerce_shop_loop_buttons', 'wdjewelry_wd_add_wishlist_button_to_product_list_shortocode', 14 );
	add_action( 'woocommerce_after_add_to_cart_button', 'wdjewelry_wd_add_wishlist_button_to_product_list_shortocode', 15 );
	add_action( 'woocommerce_after_add_to_cart_button' , 'wdjewelry_wd_remove_yith_wishlist_button', 16 );
	add_action('woocommerce_single_product_summary','wdjewelry_wd_add_wishlist_button_to_product_list_shortocode',61 );
	function wdjewelry_wd_add_wishlist_button_to_product_list_shortocode(){ 
		echo str_replace('<div class="clear"></div>', '',do_shortcode('[yith_wcwl_add_to_wishlist]'));
	}
	function wdjewelry_wd_remove_yith_wishlist_button(){
		wp_enqueue_script('wd-remove-yith-wishlist');
	}
}
if(class_exists( 'YITH_Woocompare_Frontend' )){
	if(!function_exists('wdjewelry_wd_add_yith_compare_buttonshortocode')){
		function wdjewelry_wd_add_yith_compare_buttonshortocode(){ 
		echo do_shortcode('[yith_compare_button]');
		}
	}
	if ( get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ){
		add_action( 'woocommerce_after_shop_loop_item', 'wdjewelry_wd_add_yith_compare_buttonshortocode', 14 );
		add_action('woocommerce_single_product_summary','wdjewelry_wd_add_yith_compare_buttonshortocode',62);
	}
	
}


remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10 );
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5 );


/*******ADD UL FOR  PRODUCT *****************/

add_action("woocommerce_before_shop_loop_item",'wdjewelry_start_shop_item',5);
add_action("woocommerce_after_shop_loop_item",'wdjewelry_end_shop_item',100);

if(!function_exists('wdjewelry_start_shop_item')){
	function wdjewelry_start_shop_item(){
		echo "<ul class='row-container list-unstyled clearfix'>";
	}
}
if(!function_exists('wdjewelry_end_shop_item')){
	function wdjewelry_end_shop_item(){
		echo "</ul>";
	}
}

/*******************ADD LI FOR ROW LEFT ********************************/
add_action( 'woocommerce_before_shop_loop_item_title','wdjewelry_start_before_shop_title',5 );
add_action( 'woocommerce_before_shop_loop_item_title','wdjewelry_end_before_shop_title',100);

if(!function_exists('wdjewelry_start_before_shop_title')){
	function wdjewelry_start_before_shop_title(){
		echo "<li class='row-left'><a class='title_product_image' href='".get_the_permalink()."'>";
	}
}

if(!function_exists('wdjewelry_end_before_shop_title')){
	function wdjewelry_end_before_shop_title(){
		echo "</a></li>";
	}
}
/***********************ADD LI FOR ROW RIGHT*********************************************/

add_action( 'woocommerce_shop_loop_item_title','wdjewelry_start_row_right',5 );
add_action( 'woocommerce_after_shop_loop_item','wdjewelry_end_row_right',20);

if(!function_exists('wdjewelry_start_row_right')){
	function wdjewelry_start_row_right(){
		echo "<li class='row-right'>";
	}
}

if(!function_exists('wdjewelry_end_row_right')){
	function wdjewelry_end_row_right(){
		echo "</li>";
	}
}
/******************ADD DIV PRODUCT LEFT******************/
add_action( 'woocommerce_shop_loop_item_title','wdjewelry_start_product_left',7);
add_action( 'woocommerce_shop_loop_item_title','wdjewelry_end_produc_left',100);

if(!function_exists('wdjewelry_start_product_left')){
	function wdjewelry_start_product_left(){
		echo "<div class='product-content-left'>";
	}
}

if(!function_exists('wdjewelry_end_produc_left')){
	function wdjewelry_end_produc_left(){
		echo "</div>";
	}
}

/*************EDIT TITLE OF PRODUCT***********/
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10 );
add_action('woocommerce_shop_loop_item_title','wdjewelry_template_loop_product_title',10 );
if(!function_exists('wdjewelry_template_loop_product_title')){
	function wdjewelry_template_loop_product_title(){
		echo "<a class='title-product' href='".get_the_permalink()."'>".get_the_title( )."</a>";
	}
}
/************ADD DIV PRODUCT RIGHT****************/
add_action( 'woocommerce_after_shop_loop_item_title','wdjewelry_start_product_right',5);
add_action( 'woocommerce_after_shop_loop_item_title','wdjewelry_end_produc_right',15);

if(!function_exists('wdjewelry_start_product_right')){
	function wdjewelry_start_product_right(){
		echo "<div class='product-content-right'>";
	}
}

if(!function_exists('wdjewelry_end_produc_right')){
	function wdjewelry_end_produc_right(){
		echo "</div>";
	}
}

/**********ADD DIV TO CART*********/
add_action( 'woocommerce_after_shop_loop_item','wdjewelry_start_cart',5);
add_action( 'woocommerce_after_shop_loop_item','wdjewelry_end_cart',15);

if(!function_exists('wdjewelry_start_cart')){
	function wdjewelry_start_cart(){
		echo "<div class='product-content-cart'>";
	}
}

if(!function_exists('wdjewelry_end_cart')){
	function wdjewelry_end_cart(){
		echo "</div>";
	}
}

/**************ADD DESCRIPTION**************************/

add_action( 'wdjewelry_desciption_shop_loop_item','wdjewelry_start_description',5);
add_action( 'wdjewelry_desciption_shop_loop_item','wdjewelry_description_content',10);
add_action( 'wdjewelry_desciption_shop_loop_item','wdjewelry_end_description',15);

if(!function_exists('wdjewelry_start_description')){
	function wdjewelry_start_description(){
		echo "<div class='list-mode-description'>";
	}
}
if(!function_exists('wdjewelry_description_content')){
	function wdjewelry_description_content(){
		global $product ,$post;
		echo get_the_excerpt( );
	}
}
if(!function_exists('wdjewelry_end_description')){
	function wdjewelry_end_description(){
		echo "</div>";
	}
}
/*************ADD ITEM RATING TO PRODUCT LEFT*****************/

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_rating',15);

/*******************ADD CONTENT TO SINGLE PRODUCT **********************************/
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40 );
add_action('woocommerce_single_product_summary','woocommerce_template_single_meta',25 );

/***************ADD RATTING REVIEW *******************/
add_action('woocommerce_single_product_ratting_review','woocommerce_template_single_rating',5);
/*remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
add_action('woocommerce_single_product_review_price','woocommerce_template_single_price',5);*/

/**************ADD wishlist******************/
if(!function_exists('wdjewlry_open_tool')){
	function wdjewlry_open_tool(){
		echo "<div class='template-plugin'>";
	}
}

if(!function_exists('wdjewlry_close_tool')){
	function wdjewlry_close_tool(){
		echo "</div>";
	}
}
add_action('woocommerce_single_product_summary','wdjewlry_open_tool',60);
add_action('woocommerce_single_product_summary','wdjewlry_close_tool',70);

/**************ADD CUSTOMIZE PRODUCT SINGLE******************/
if(!function_exists('wdjewlry_open_product_customize')){
	function wdjewlry_open_product_customize(){
		echo "<div class='product_customize'>";
	}
}

if(!function_exists('wdjewlry_measurement')){
	function wdjewlry_measurement(){
		if(get_theme_mod('singe_product_check_measurement')){
			echo "<div class='content-measurements'>";
			echo "<h6><a href='javascript:void(0)'class='modal_toggle' data-class='.measurement'>".esc_html__('MEASUREMENTS & SPECS','wdjewelry')."</a></h6>";
			if(get_theme_mod('singe_product_measurement')){?>
				<div class='measurement'>
					<a href='javascrip:void(0)' class='hidden_toggle'><?php echo esc_html__("X",'wdjewelry'); ?></a>
				   <?php echo get_theme_mod('singe_product_measurement'); ?>
				</div>
				<?php
			}
			echo "</div>";
		}
	}
}

if(!function_exists('wdjewlry_shipping')){
	function wdjewlry_shipping(){
		if(get_theme_mod('singe_product_check_shipping')){
			echo "<div class='content-shipping'>";
			echo "<h6><a href='javascript:void(0)' class='modal_toggle' data-class='.shipping'>".esc_html__('Shipping & Return','wdjewelry')."</a></h6>";
			if(get_theme_mod('singe_product_shipping')){?>
				<div class='shipping'>
				<a href='javascrip:void(0)' class='hidden_toggle'><?php echo esc_html__("X",'wdjewelry'); ?></a>
				   <?php echo get_theme_mod('singe_product_shipping'); ?>
				</div>
			<?php
			}
			echo "</div>";

		}
	}
}
if(!function_exists('wdjewlry_size_chart')){
	function wdjewlry_size_chart(){
		if(get_theme_mod('singe_product_check_size_chart')){
			echo "<div class='content-size-chart'>";
			echo "<h6><a href='javascript:void(0)' class='modal_toggle' data-class='.size_chart'>".esc_html__('Size Chart','wdjewelry')."</a></h6>";
			if(get_theme_mod('singe_product_size_chart')){?>
				<div class="size_chart">
					<a href='javascrip:void(0)' class='hidden_toggle'><?php echo esc_html__("X",'wdjewelry'); ?></a>
				   <?php echo get_theme_mod('singe_product_size_chart'); ?>
				</div>
				<?php
			}
			echo "</div>";

		}
	}
}

if(!function_exists('wdjewlry_close_product_customize')){
	function wdjewlry_close_product_customize(){
		echo "</div>";
	}
}
add_action('woocommerce_single_product_summary','wdjewlry_open_product_customize',71);
add_action('woocommerce_single_product_summary','wdjewlry_measurement',72);
add_action('woocommerce_single_product_summary','wdjewlry_shipping',75);
add_action('woocommerce_single_product_summary','wdjewlry_size_chart',77);
add_action('woocommerce_single_product_summary','wdjewlry_close_product_customize',80);

?>