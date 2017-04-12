<div class="search">
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e( 'Search for products', 'woocommerce' ); ?>"  type="text" class="text"/>
		<input type="hidden" name="post_type" value="product" />
	</form>
</div>