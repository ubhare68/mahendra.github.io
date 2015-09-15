<?php

function woocs_subcats_from_parentcat(){
	if(is_product_category()){
		global $wp_query;
		$woocs_cat = $wp_query->get_queried_object();
		$args = array(
			//'posts_per_page' => -1,
			'hierarchical' => 1,
			'show_option_none' => '',
			'hide_empty' => 0,
			'parent' => $woocs_cat->term_id,
			'taxonomy' => 'product_cat'
		);
		$woocs_subcats = get_categories($args);
	}
	return $woocs_subcats;
}


function woocs_product( $ID, $attr, $currency = true ){
	if(class_exists('WC_Product')){
		$product = new WC_Product($ID);  
		if( $attr == 'price_tax_inc' ){
			$p = round($product->get_price_including_tax(),2);
		}
		elseif( $attr == 'get_price_excluding_tax' ){
			$p = round($product->get_price_excluding_tax(),2);
		}
		elseif( $attr == 'get_price' ){
			$p = round($product->get_price(),2);
		}
		elseif( $attr == 'get_sale_price' ){
			$p = round($product->get_sale_price(),2);
		}
		elseif( $attr == 'get_regular_price' ){
			$p = round($product->get_regular_price(),2);
		}
		elseif( $attr == 'get_price_html' ){
			$p = strip_tags($product->get_price_html());
		}
		elseif( $attr == 'is_in_stock' ){
			$p = $product->is_in_stock();
		}
		
	}
	return $p;
}

function woocs_get_thumbnail_by_id($id, $size = 'large'){
	$woocs_thumbnail_id = get_woocommerce_term_meta($id, 'thumbnail_id', true);
	$woocs_image = wp_get_attachment_image_src($woocs_thumbnail_id, $size, false);
	return $woocs_image[0];
}

function woocs_get_products_by_category($name){
	
	$args = array('post_type' => 'product', 'product_cat' => $name, 'posts_per_page' => -1);
	$woocs_cat_products = new WP_Query($args);
	while ($woocs_cat_products->have_posts()) : $woocs_cat_products->the_post();
		global $product;
		if($product->product_type == 'grouped'){
			$args2 = array('post_type' => 'product', 'post_parent' => $product->ID);
			$woocs_children = new WP_Query($args2);
			while ($woocs_children->have_posts()) : $woocs_children->the_post();
			global $product;
			$woocs_child_price = $product->get_price();
			if(!empty($woocs_child_price)){
				$woocs_prices[] = round($woocs_child_price,1);
			}
			endwhile;
		}
		else{
			$woocs_price = $product->get_price();
			if(!empty($woocs_price)){
				$woocs_prices[] = round($woocs_price,1);
			}
		}
	endwhile;
	
	return $woocs_prices;
}

function woocs_text($input, $length, $ellipses = true, $strip_html = true) {
    if ($strip_html) { $input = strip_tags($input); }
    if(function_exists('mb_substr')){
		if (mb_strlen($input) <= $length) { return $input; }
		$last_space = mb_strrpos(mb_substr($input, 0, $length), ' ');
		$trimmed_text = mb_substr($input, 0, $last_space);
  	}
	else{
		if (strlen($input) <= $length) { return $input; }
		$last_space = strrpos(substr($input, 0, $length), ' ');
		$trimmed_text = substr($input, 0, $last_space);
	}
	if ($ellipses) { $trimmed_text .= ' ...'; }
    return $trimmed_text;
}


function woocs_taxonomy_add_new_meta_field() {
    // this will add the custom meta field to the add new term page
    ?>
    <div class="form-field">
        <label for="term_meta[custom_term_meta]"><?php _e( 'Slider layout for this category', 'default' ); ?></label>
        <select name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" <!--value="<?php echo esc_attr( $term_meta['custom_term_meta'] ) ? esc_attr( $term_meta['custom_term_meta'] ) : ''; ?>"-->>
            <option value="9999">Default</option>
			<option value="0">Layout 1</option>
			<option value="1">Layout 2</option>
            <option value="-1">Disable</option>
		</select>
        <!--<p class="description"><?php _e( 'Enter a value for this field','default' ); ?></p>-->
    </div>
<?php
}
add_action( 'product_cat_add_form_fields', 'woocs_taxonomy_add_new_meta_field', 10, 2 );

function woocs_taxonomy_edit_meta_field($term) {
 
    // put the term ID into a variable
    $t_id = $term->term_id;
 
    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option( "taxonomy_$t_id" );
	$cterm = intval($term_meta['custom_term_meta']);
	//var_dump($term_meta);
	 ?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e( 'Slider layout for this category', 'default' ); ?></label></th>
        <td>
            <select name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" <!--value="<?php echo esc_attr( $term_meta['custom_term_meta'] ) ? esc_attr( $term_meta['custom_term_meta'] ) : ''; ?>"-->>
				<option value="9999">Default</option>
				<option value="0" <?php if($term_meta !== false && $cterm === 0){echo "selected";} ?>>Layout 1</option>
				<option value="1" <?php if($term_meta !== false && $cterm === 1){echo "selected";} ?>>Layout 2</option>
                <option value="-1" <?php if($term_meta !== false && $cterm === -1){echo "selected";} ?>>Disable</option>
			</select>
            <!--<p class="description"><?php _e( 'Enter a value for this field','default' ); ?></p>-->
        </td>
    </tr>
<?php
}
add_action( 'product_cat_edit_form_fields', 'woocs_taxonomy_edit_meta_field', 10, 2 );

function woocs_save_taxonomy_custom_meta( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_$t_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option( "taxonomy_$t_id", $term_meta );
    }
}  
add_action( 'edited_product_cat', 'woocs_save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_product_cat', 'woocs_save_taxonomy_custom_meta', 10, 2 );





