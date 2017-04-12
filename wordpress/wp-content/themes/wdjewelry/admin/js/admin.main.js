jQuery(document).ready(function(){
	"use strict";
	layout_sidebar_select();
	footer_sidebar_select();

	jQuery('.page-hidden-product').hide();
    jQuery('.layout_sidebar_select').on('change',function(){
    	layout_sidebar_select();
    });
    jQuery('.wd-footer-style').on('change',function(){
    	footer_sidebar_select();
    });

});
function layout_sidebar_select(){
	var layout = jQuery('.layout_sidebar_select').val();
    	if(layout == 'full_width'){
    		jQuery('.sidebar-left-content').hide('slow');
    		jQuery('.sidebar-right-content').hide('slow');
    	}
    	if(layout == 'sidebar_left'){
    		jQuery('.sidebar-left-content').show('slow');
    		jQuery('.sidebar-right-content').hide('slow');
    	}
    	if(layout == 'sidebar_right'){
    		jQuery('.sidebar-left-content').hide('slow');
    		jQuery('.sidebar-right-content').show('slow');
    	}
    	if(layout == 'right_left'){
    		jQuery('.sidebar-left-content').show('slow');
    		jQuery('.sidebar-right-content').show('slow');
    	}
}

function footer_sidebar_select(){
	var layout = jQuery('.wd-footer-style').val();
    	if(layout == 'footer_hidden'){
    		jQuery('.footer-sidebar-content').hide('slow');
    	}else{
    		jQuery('.footer-sidebar-content').show('slow');
    	}
    	
}