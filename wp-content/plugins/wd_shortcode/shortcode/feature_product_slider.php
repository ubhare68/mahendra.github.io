<?php
/**
 * @package WordPress
 * @since WD_GoMarket
 */

if(!function_exists('wd_featured_product_slider_function')){
	function wd_featured_product_slider_function($atts,$content){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return;
		}
		wp_reset_query(); 		
		extract(shortcode_atts(array(
			'columns' 				=> 4
			,'row' 					=> 1
			,'big_product'			=> ''
			,'cat_slug'				=> ''
			,'per_page' 			=> 8
			,'title' 				=> ''
			,'title_style' 			=> 'style1'
			,'box_style'			=> ''
			,'desc' 				=> ''
			,'show_type' 			=> 'grid'
			,'show_nav' 			=> 1
			,'show_nav_pos' 		=> 'top_right'
			,'show_icon_nav' 		=> 1
			,'show_image' 			=> 1
			,'show_title' 			=> 1
			,'show_sku' 			=> 1
			,'autoplay'				=> 0
			,'show_price' 			=> 1
			,'show_rating' 			=> 1
			,'show_except_limit' 	=> 15
			,'show_label' 			=> 1	
			,'show_categories'		=> 1
			,'show_prod_buttons'	=> 1
			,'show_short_content' 	=> 1
			,'slider_base_e'		=> 0
		),$atts));
		
		if($columns > 5){
			$columns = 5;
		}
		if($row > 4){
			$row = 4;
		}
		if($per_page < 1) { $per_page = 8; }
		if($columns < 1) { $columns = 2; }
		if($columns > 8) { $columns = 8; }
		if($row < 1) { $per_page = 2; }
		if($row > 8) { $row = 8; }
		
		global $woocommerce_loop,$post,$wd_data;
		
		$data = array('show_image' => $show_image,
						'show_title' => $show_title,
						'show_rating' => $show_rating,
						'show_price' => $show_price,
						'show_label' => $show_label,
						'show_add_to_cart' => $show_prod_buttons,
					);
		shop_loop_prod_remove_action( $data );
		
		//has sku
		if(strlen(trim($big_product)) > 0){
			//$_big_prod = wd_product_by_sku_function($big_product);
			$_big_prod = wd_product_by_id_function($big_product);
			if(isset($_big_prod) && $_big_prod->is_visible() ){
				$temp_add_to_cart_data = do_shortcode('[add_to_cart style="" show_price="false" id="'.$_big_prod->id.'"]');
			}
		}
		
		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => $per_page,
			'meta_query' => array(
				array(
					'key' => '_visibility',
					'value' => array('catalog', 'visible'),
					'compare' => 'IN'
				),
				array(
					'key' => '_featured',
					'value' => 'yes'
				)
			)
		);

		if(isset($_big_prod) && $_big_prod->is_visible() && strlen(trim($_big_prod->id)) > 0){
			$args['post__not_in'] = array($_big_prod->id);
		} 

		if(trim($cat_slug) != ''){
			$args['tax_query'] 			= array(
				array(
					'taxonomy' 		=> 'product_cat',
					'terms' 		=> array( esc_attr($cat_slug) ),
					'field' 		=> 'slug',
					'operator' 		=> 'IN'
				)
			);
		}
			
		wp_reset_query(); 
		wp_reset_postdata();	
		global $post;		
		
		ob_start();
		if(isset($wd_data['wd_prod_cat_column']) && absint($wd_data['wd_prod_cat_column']) > 0 ){
			$_old_wd_prod_cat_column = $wd_data['wd_prod_cat_column'];
			$wd_data['wd_prod_cat_column'] = $columns;
		} 
		
		$_old_woocommerce_loop_columns = $woocommerce_loop['columns'];
		$products = new WP_Query( $args );

		$woocommerce_loop['columns'] = $columns;
		
		$extra_class = $style_big_prod = '';
					
		if ( $products->have_posts() ) : ?>
			<?php $_random_id = 'featured_product_slider_wrapper_'.rand(); ?>
			<div class="feature-product-sc <?php echo esc_attr($box_style);?> wpdance-slider-sc" id="<?php echo $_random_id;?>">
				<div class="wd-slider-sc">
					<div class="row">
						<?php if(strlen(trim($title)) >0 || strlen(trim($desc)) >0) : ?>
							<div class="product-slider-head"> 
								<?php
									if(strlen(trim($title)) >0){
									if($title_style=="style1") { echo "<div class='heading-title slider-title style1'><h3><span>{$title}</span></h3></div>";}
										else echo "<div class='heading-title slider-title style2'><h3><span>{$title}</span></h3></div>";
										if(absint($show_nav) && trim($show_nav_pos) == 'top_right'): 
											$show_nav = 0; $show_icon_nav = 0; ?>
											<div class="owl-controls owl-heading-pos">
												<div class="owl-nav">
													<div class="owl-prev" id="<?php echo $_random_id;?>_prev">&lt;</div>
													<div class="owl-next" id="<?php echo $_random_id;?>_next">&gt;</div>
												</div>
											</div>
										<?php endif;
									} 
									if(strlen(trim($desc)) >0){
										$cl = ($box_style == 'style-boxed')? 'col-sm-24': '';
										echo "<p class='".$cl." slider-desc-wrapper'>{$desc}</p>";
									}
								?>
							</div>
						<?php endif;?>
						<div class="product-slider-body <?php if($box_style == 'style-boxed') echo "col-sm-24";?>">
							<?php 
								if(isset($_big_prod) && $_big_prod->is_visible()){
									$extra_class = " col-sm-12";
									$style_big_prod = 'style="width: 50%; float:left" ';
									$_product = get_product( $_big_prod->id );
									$post = $_product->post;
									
									$product = wc_setup_product_data( $post );
									
									$image_title 		= esc_attr( $_product->get_title() );
									$product_link 		= esc_url( $_product->get_permalink());
									$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ),array( 'alt' => $image_title, 'title' => $image_title ) );								
									
							?>
							<div class="wd-big-product product<?php echo $extra_class?>">
								<div class="wd_image product-thumbnail-wrapper">
									<?php echo $image;?>
								</div>
								<div class="product-meta-wrapper">
									<div class="product-meta-content">
										<h3 class="heading-title product-title"><a href="<?php echo esc_url($product_link);?>"><?php echo esc_html($image_title);?></a></h3>										
										<span class="price"><?php echo $_product->get_price_html();?></span>
									</div>
								</div>
								
								<div class="big-product-button-list">
									<?php wd_list_template_loop_add_to_cart();?>
									<?php 
										if( class_exists('YITH_WCWL_UI') && class_exists('YITH_WCWL') && function_exists('wd_add_wishlist_button_to_product_list_shortocode') ){
											wd_add_wishlist_button_to_product_list_shortocode();
										}
										if( class_exists( 'YITH_Woocompare_Frontend' ) && class_exists( 'YITH_Woocompare' ) && function_exists('wd_add_compare_link') ){
											wd_add_compare_link();
										}
										if( class_exists( 'WD_Quickshop' ) ){
											global $_wd_quickshop;
											$_wd_quickshop->add_quickshop_button();
										}
									?>
								</div>
								
							</div>
							<?php 
									wc_setup_product_data( $post );
								}
							?>
							<div class="product-slider-wrapper<?php echo $extra_class?>">	
								
								<div class="product-slider-inner <?php echo esc_attr($show_nav_pos);?> wd-loading">
									
									<?php $current_row = 0;?>
									
									<?php wd_woocommerce_product_loop_start($show_type); ?>
										
										
										<?php while ( $products->have_posts() ) : $products->the_post(); ?>
											
											<?php
												if($row > 1 && ($current_row % $row == 0)){
													echo '<div class="products_group">';
												}
											?>
											
											<?php 
											$content_type = strcmp(trim($show_type), 'widget') == 0 ? 'list-product' : 'product';
											wc_get_template('content-'.$content_type.'.php', array('shortc_limit' => $show_except_limit));
											?>
											
											<?php
												if($row > 1 && (($current_row % $row + 1== $row) || ($current_row + 1 == $products->post_count ) )){
													echo '</div>';
												}
												
												$current_row++;
											?>
											
										<?php endwhile; // end of the loop. ?>
									<?php woocommerce_product_loop_end(); ?>
									
								</div>
							</div>	
							<div class="clear"></div>
						</div>
					</div>
				</div>		
			</div>
			
			<script type='text/javascript'>
			//<![CDATA[
				jQuery(document).ready(function() {
					"use strict";
					var temp_visible = <?php echo $columns;?>;
					
					var row = <?php echo $row;?>;
					var item_width = 180;
					
					var show_nav = <?php if($show_nav): ?> true <?php else: ?> false <?php endif;?>;
					var prev,next,pagination;

					var show_icon_nav = <?php if($show_icon_nav): ?> true <?php else: ?> false <?php endif;?>;
					
					var object_selector = "#<?php echo $_random_id?> .products";

                    var autoplay = <?php if($autoplay): ?> true <?php else: ?> false <?php endif;?>;
					var slider_base_e = <?php if($slider_base_e): ?> true <?php else: ?> false <?php endif;?>;
					var res_val = [];
					res_val[0] = 1;
					res_val[1] = 3;
					res_val[2] = Math.round(temp_visible * 1160 /1200);
					res_val[4] = Math.round(temp_visible * 1160 /1200);
                    generate_horizontal_slide(temp_visible,row,item_width,show_nav,show_icon_nav,autoplay,object_selector,slider_base_e,res_val);
				});
			//]]>	
			</script>
			
		<?php endif;

		wp_reset_postdata();

		$woocommerce_loop['columns'] = $_old_woocommerce_loop_columns;
		if(isset($_old_wd_prod_cat_column) && absint($_old_wd_prod_cat_column > 0 )){
			$wd_data['wd_prod_cat_column'] = $_old_wd_prod_cat_column  ;
		}
				shop_loop_prod_add_action();
		return '<div class="woocommerce">' . ob_get_clean() . '</div>';		
		
	}
}		
add_shortcode('wd_featured_product_slider','wd_featured_product_slider_function');





if(!function_exists('wd_featured_products')){
	function wd_featured_products($atts,$content){
		$_actived = apply_filters( 'active_plugins', get_option( 'active_plugins' )  );
		if ( !in_array( "woocommerce/woocommerce.php", $_actived ) ) {
			return;
		}
		global $woocommerce_loop, $woocommerce,$wd_data;
		$atts['columns'] = absint($atts['columns']);
		$atts['per_page'] = absint($atts['per_page']);			
		extract(shortcode_atts(array(
			'title' 			=> '',
			'desc' 				=> '',
			'box_style'			=> '',
			'columns' 			=> 4,
			'per_page'			=> 12,
			'orderby'			=> 'date',
			'order'				=> 'desc',
			'style'				=> 'grid',
			'small_prod'		=> 0,
			'show_number' 		=> 0,
			'show_image' 		=> 1,
			'show_title' 		=> 1,
			'show_sku' 			=> 1,
			'show_price' 		=> 1,
			'show_except' 		=> 1,
			'show_rating' 		=> 1,
			'show_label' 		=> 1,
			'show_prod_buttons'	=> 1,
			'shortc_limit'		=> 15,
		),$atts));
		$shortc_limit = (isset($shortc_limit) && $shortc_limit !== '')? $shortc_limit: 15;
			
		$args = array(
			'post_type'				=> 'product',
			'post_status' 			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $per_page,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'meta_query'			=> array(
				array(
					'key' 		=> '_visibility',
					'value' 	=> array('catalog', 'visible'),
					'compare'	=> 'IN'
				),
				array(
					'key' 		=> '_featured',
					'value' 	=> 'yes'
				)
			)
		);
		
		$data = array('show_image' => $show_image,
						'show_title' => $show_title,
						'show_rating' => $show_rating,
						'show_price' => $show_price,
						'show_label' => $show_label,
						'show_add_to_cart' => $show_prod_buttons,
					);
		shop_loop_prod_remove_action($data);
		
		ob_start();

		$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
		
		$woocommerce_loop['columns'] = ($style == 'list' && absint($columns) > 2)? 2: $columns;
		
		$slide_inMobile = (wp_is_mobile() && $style !== 'widget')? true: false;
		
		$style = $slide_inMobile? 'grid':  $style;
		
		$slide_inMobile = false;
		
		if ( $products->have_posts() ) : ?>
			
			<?php if($slide_inMobile):
			$_random_id = 'feature_product_wrapper_'.rand();?>
			<div id="<?php echo esc_attr($_random_id);?>" class="row bottom_center wd-loading">
			<?php endif;?>
			
			<?php wd_woocommerce_product_loop_start($style); ?>
				
				<?php if($style == 'widget'):?>
				<div class="products_group">
				<?php endif;?>
				<?php 
				global $wd_count; $wd_count = 1;
				if(absint($show_number)) add_action('wd_product_loop_before', 'wd_add_number_product_list');?>
				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
					
					<?php $content_type = strcmp(trim($style), 'widget') == 0 ? 'list-product' : 'product';?>
					<?php if( absint($small_prod) == 1 ) $content_type = 'product-small';?>
					<?php wc_get_template( "content-{$content_type}.php", array( 'shortc_limit' => $shortc_limit )); ?>					
				<?php endwhile; // end of the loop. ?>
				<?php remove_action('wd_product_loop_before', 'wd_add_number_product_list');?>
				<?php if($style == 'widget'):?>
				</div>
				<?php endif;?>
				
			<?php woocommerce_product_loop_end(); ?>
			
			<?php if($slide_inMobile):?>
			</div>
			<script type='text/javascript'>
				//<![CDATA[
					jQuery(document).ready(function() {
						"use strict";
						var temp_visible = 4;
						
						var row = 1;

						var item_width = 180;
						
						var show_nav = false;

						var show_icon_nav = false;
						
						var object_selector = "#<?php echo $_random_id?> .products";

                       var autoplay = false;
                        generate_horizontal_slide(temp_visible,row,item_width,show_nav,show_icon_nav,autoplay,object_selector, true, [2,2,3,4,4]);
					});
				//]]>	
				</script>
			<?php endif;?>
			
		<?php endif;
		
		wp_reset_postdata();
		
		shop_loop_prod_add_action();
		
		return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
			
		}
	}		
	add_shortcode('wd_featured_products','wd_featured_products');
	
?>