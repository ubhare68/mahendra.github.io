jQuery(document).ready(function($) {
    'use strict';

    
		// Portfolio settings
		function portfolio_setting(){
			var select_type = $('#liwo_portfolio_type option');

			select_type.each(function() {

			    if (($(this).attr('selected') == 'selected' ) && ($(this).attr('value') == 'video')){
            $('.cmb_id_liwo_portfolio_slider').hide();			       
            $('.cmb_id_liwo_portfolio_image').hide();			       
            $('.cmb_id_liwo_portfolio_video').fadeIn();
            $('.cmb_id_liwo_portfolio_soundcloud').hide();
			  	 }
			     else if (($(this).attr('selected') == 'selected' ) && ($(this).attr('value') == 'image'))
			     {
					  $('.cmb_id_liwo_portfolio_slider').hide();			       
            $('.cmb_id_liwo_portfolio_image').fadeIn();			       
            $('.cmb_id_liwo_portfolio_video').hide();
            $('.cmb_id_liwo_portfolio_soundcloud').hide();	
			     } 
			     else if (($(this).attr('selected') == 'selected' ) && ($(this).attr('value') == 'slider')){
					  $('.cmb_id_liwo_portfolio_slider').fadeIn();			       
            $('.cmb_id_liwo_portfolio_image').hide();			       
            $('.cmb_id_liwo_portfolio_video').hide();
            $('.cmb_id_liwo_portfolio_soundcloud').hide();			       
			     }
			     else if (($(this).attr('selected') == 'selected' ) && ($(this).attr('value') == 'soundcloud')){
					  $('.cmb_id_liwo_portfolio_slider').hide();			       
            $('.cmb_id_liwo_portfolio_image').hide();			       
            $('.cmb_id_liwo_portfolio_video').hide();
            $('.cmb_id_liwo_portfolio_soundcloud').fadeIn();			       
			     }
			});
		}
    portfolio_setting();

		var select_type = $('#liwo_portfolio_type');

		$(this).change(function(){
			portfolio_setting();				
		});


  //Post settings
    function post_format_setting() {

        if ($('#post-format-image').is(':checked')) {
            $('#liwo_post_metas').fadeIn();
            $('.cmb_id_liwo_image_gallery').hide();
            $('.cmb_id_liwo_post_image').fadeIn();
            $('.cmb_id_liwo_post_video_embed').hide();
            $('.cmb_id_liwo_post_audio_embed').hide();

        } else if ($('#post-format-gallery').is(':checked')) {
            $('#liwo_post_metas').fadeIn();
            $('.cmb_id_liwo_image_gallery').fadeIn();
            $('.cmb_id_liwo_post_image').hide();
            $('.cmb_id_liwo_post_video_embed').hide();
            $('.cmb_id_liwo_post_audio_embed').hide();

        } else if ($('#post-format-video').is(':checked')) {
            $('#liwo_post_metas').fadeIn();
            $('.cmb_id_liwo_image_gallery').hide();
            $('.cmb_id_liwo_post_image').hide();
            $('.cmb_id_liwo_post_video_embed').fadeIn();
            $('.cmb_id_liwo_post_audio_embed').hide();

        } else if ($('#post-format-audio').is(':checked')) {
            $('#liwo_post_metas').fadeIn();
            $('.cmb_id_liwo_image_gallery').hide();
            $('.cmb_id_liwo_post_image').hide();
            $('.cmb_id_liwo_post_video_embed').hide();
            $('.cmb_id_liwo_post_audio_embed').fadeIn();

        } else {
            $('#liwo_post_metas').hide();
        }
    }
    post_format_setting();

    var select_type = $('#post_formats_select input');

    $(this).change(function() {
        post_format_setting();
    });


    function services_format_setting () {
        var select_service = $('#liwo_service_select_icon option');

        select_service.each(function() {

            if ($(this).attr('selected') == 'selected' ){
                var select_service_val = $(this).val();
                $('.cmb_id_liwo_service_select_icon .cmb_metabox_description').html('<i class="fa '+select_service_val+' fa-4x"></i>');
            }
                 
        });
    }
    services_format_setting();

    var select_type = $('#liwo_service_select_icon');

    $(this).change(function() {
        services_format_setting();
    });

  
});