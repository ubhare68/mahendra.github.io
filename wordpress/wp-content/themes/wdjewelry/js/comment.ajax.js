jQuery(document).ready(function(){
	"use strict";
	jQuery('#load_comment img').hide();
	var paged = 2;
	var per_page =parseInt(ajax_comment.per_page);
	var post_id = parseInt(ajax_comment.post_id);
	var maxpages = parseInt(ajax_comment.pages);
	var ajaxurl = ajax_comment.comment_ajax_url;
	if(paged>maxpages){
		jQuery('#load_comment').hide();
	}
	jQuery('#load_comment').on('click', function(event) {
		event.preventDefault();
			jQuery('#load_comment img').show();
			jQuery.ajax({
				type : 'POST',
				 url: ajaxurl,
				data : {action : 'show_comment',paged:paged,per_page:per_page,post_id:post_id},
				success : function(respones){
						jQuery('#load_comment img').hide();
						jQuery('.commentlist').append(respones);
						paged++;
					if( paged > maxpages){
						jQuery('#load_comment').hide();
					}
				}
			});			
		} );
});