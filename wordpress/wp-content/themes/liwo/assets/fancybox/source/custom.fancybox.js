jQuery(document).ready(function($) {
	$('.fancybox').fancybox();

	/*
	 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
	*/
	$('.fancybox-media')
		.attr('rel', 'media-gallery')
		.fancybox({
			openEffect : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',

			arrows : false,
			helpers : {
				media : {},
				buttons : {}
			}
		});
});