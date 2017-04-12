jQuery(document).ready(function(){
	"use strict";
	var ajaxurl = main.ajax_url;
	jQuery('body').on( 'added_to_cart', function(event) {
			jQuery.ajax({
				type : 'POST',
				 url: ajaxurl,
				data : {action : 'update_tini_cart'},
				success : function(respones){
						jQuery('.cart-mini-content').html(respones);
						
				}
			});			
		} );
});
	