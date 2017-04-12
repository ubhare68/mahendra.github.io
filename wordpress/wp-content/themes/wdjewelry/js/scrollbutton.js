jQuery(document).ready(function(){
	"use strict";
	if (jQuery('html').offset().top < 100) {

		jQuery('#to-top').hide();
	};

	jQuery(window).scroll(function(){

		if (jQuery(this).scrollTop() > 100 ) {

			jQuery('#to-top').fadeIn();
		}else{

			jQuery('#to-top').fadeOut();
		};
	});

	jQuery('.scroll-button').on("click",function(){

		jQuery('body,html').animate({

			scrollTop: '0px'
		},1000);

		return false;
	});
});
