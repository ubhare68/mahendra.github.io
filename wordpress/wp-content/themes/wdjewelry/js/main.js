
function em_search_bar(){
	jQuery('.search_active_button').click(function(){
		if(jQuery(this).parent().children('#searchform').hasClass('active') == false){
			jQuery(this).parent().children('#searchform').slideDown('slow');
			jQuery(this).parent().children('#searchform').addClass('active');
		}
		else{
			jQuery(this).parent().children('#searchform').slideUp('slow');
			jQuery(this).parent().children('#searchform').removeClass('active');
		}
	});
	
	jQuery(".search-input").val('Search');
	searchinput = jQuery(".search-input"),
	searchvalue = searchinput.val();
	searchinput.on('click',function(){
		if (jQuery(this).val() === searchvalue) jQuery(this).val("");
	});
	searchinput.blur(function(){
		if (jQuery(this).val() === "") jQuery(this).val(searchvalue);
	});
}
// **********************************************************************// 
// ! Full width section
// **********************************************************************//
function em_sections(){ 
	jQuery('.em_section, .stripe-style-full').each(function(){
		
		if( !jQuery('body').hasClass('rtl') ){
			jQuery(this).css({'left': ''});
			jQuery(this).css({
				'width': jQuery('body').width(),
				'left': - (jQuery(this).offset().left),
				'visibility': 'visible',
				'position': 'relative'
			});
		}
		else{
			jQuery(this).css({'left': 'auto'});
			jQuery(this).css({'right': 'auto'});
			var rt = (jQuery(window).width() - (jQuery(this).offset().left + jQuery(this).outerWidth()));
			jQuery(this).css({
				'right': - (rt),
				'width': jQuery(window).width(),
				'visibility': 'visible',
				'position': 'relative'
			});
		}
		
		var videoTag = jQuery(this).find('.section-back-video video');
		videoTag.css({
			'width': jQuery(window).width()
		});
	});
}

function fix_gallery_item(object_selector,wrapper_width,min_width,item_width){
	jQuery( object_selector + " div.gallery_item" ).each(function() {
		var item_data_width = 	jQuery(this).attr('data-width');
		var item_width__ = Math.round(item_data_width / min_width) * item_width;
		//var item_width = Math.floor(wrapper_width * item_data_width / 100);
		jQuery( this).css({'width' : item_width__+'px'});
	});
}




if (typeof checkIfTouchDevice != 'function') { 
    function checkIfTouchDevice(){
        touchDevice = !!("ontouchstart" in window) ? 1 : 0; 
		if( jQuery.browser.wd_mobile ) {
			touchDevice = 1;
		}
		return touchDevice;      
    }
}

function get_layout_config( container_width, number_item){
	ret_value = new Array(283,'100%',number_item);
	if( container_width >= 960 ){
		var _num_show = Math.min(number_item,4);
		ret_value[1] = _num_show*25 + "%";
		ret_value[2] = _num_show;
		return ret_value;
	}
	if( container_width > 600 && container_width < 960 ){
		var _num_show = Math.min(number_item,3);
		ret_value[0] = 380;
		ret_value[1] = _num_show*33.3333333333 + "%";
		ret_value[2] = _num_show;
		return ret_value;
	}
	if( container_width <= 600 && container_width > 380 ){
		ret_value[0] = 380;
		var _num_show = Math.min(number_item,2);
		ret_value[1] = _num_show*50 + "%";
		ret_value[2] = _num_show;
		return ret_value;
	}
	if( container_width < 380 ){
		ret_value[2] = 1;
	}
	//ret_value[0] = 380;
	return ret_value;
}

function number_animate(val_){
	var	text	= jQuery(val_),endVal	= 0,currVal	= 0,obj	= {};
	var value = jQuery(val_).text();
	obj.getTextVal = function() {
		return parseInt(currVal, 10);
	};

	obj.setTextVal = function(val) {
		currVal = parseInt(val, 10);
		text.text(currVal);
	};

	obj.setTextVal(0);
	currVal = 0; // Reset this every time
	endVal = value;

	TweenLite.to(obj, 2, {setTextVal: endVal, ease: Power2.easeInOut});
}

function sticky_main_menu( on_touch ){
	var _topSpacing = 0;
	if( jQuery('body').hasClass('logged-in') && jQuery('body').hasClass('admin-bar') && jQuery('#wpadminbar').length > 0 ){
		_topSpacing = jQuery('#wpadminbar').height();
	}
	if( !on_touch && jQuery(window).width() > 1024 && !jQuery(".header-sticky").hasClass('sticky-done')){
		//jQuery(".header-sticky").sticky({topSpacing:_topSpacing}).addClass('sticky-done');
		
		if(jQuery('.header-top').hasClass('header-v6') ){
			jQuery(window).on('scroll', function(){
				if ( !(jQuery.browser.msie && jQuery.browser.version < 10) ) {
					var scrollTop = jQuery(this).scrollTop();
				}
			});
		}
	} else {
		//jQuery(".header-sticky").removeClass('sticky-done').unstick();
	}
	
}




function hexToRgb(hex) {
    // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
    var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
        return r + r + g + g + b + b;
    });

    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

function set_header_bottom(){
    var header_height = jQuery(window).innerHeight();
	var temp = 1;
    
	if(jQuery(".wd_fullwidth_slider_wrapper").length > 0 ){
		if(jQuery("div#wpadminbar").length > 0) {
			jQuery("div#template-wrapper").css("margin-top","-32px");
			//temp = temp + jQuery("div#wpadminbar").height();
		   
		}
		jQuery(".wd_fullwidth_slider_wrapper").height(header_height - temp +"px");
		
		/*
		if(jQuery("#left_content_fullwidth").length > 0){
			var social_height = jQuery(".left_content_social").outerHeight();
			var copyright_height = jQuery("#copy-right").outerHeight();
			jQuery("#left_content_fullwidth .wd_mega_menu_wrapper").css("marginBottom",social_height + copyright_height);
		}
		*/
	}
	//jQuery(".header-bottom").css("bottom","-"+header_bottom_height+"px");
    //jQuery(".main-slideshow").css("min-height",header_bottom_height + "px");
}

function set_cloud_zoom(){
	var clz_width = jQuery('#qs-zoom,.wd-qs-cloud-zoom,.cloud-zoom, .cloud-zoom-gallery').width();
	var clz_img_width = jQuery('#qs-zoom,.wd-qs-cloud-zoom,.cloud-zoom, .cloud-zoom-gallery').children('img').width();
	var cl_zoom = jQuery('#qs-zoom,.wd-qs-cloud-zoom,.cloud-zoom, .cloud-zoom-gallery').not('.on_pc');
	var temp = (clz_width-clz_img_width)/2;
	if(cl_zoom.length > 0 ){
		cl_zoom.data('zoom',null).siblings('.mousetrap').unbind().remove();
		cl_zoom.CloudZoom({ 
			adjustX:temp	
		});
	}
}
function onSizeChange(windowWidth){
	if( windowWidth >= 768 ) {
			jQuery('a.block-control').removeClass('active').hide();
			jQuery('a.block-control').parent().siblings().show();
	}
	if( windowWidth < 768 ) {
			jQuery('a.block-control').removeClass('active').show();
			jQuery('a.block-control').parent().siblings().hide();
	}		
}
function tab_slider(windowWidth){
	var on_touch = checkIfTouchDevice();
	var _bind = 'click';
	if(on_touch & windowWidth >= 768 && windowWidth <= 1024){  // event for ipad
		_bind = 'mouseenter';
	}
	/*mouseenter click.tab.data-api mousedown*/
	jQuery('.wpb_tabs > div > ul.wpb_tabs_nav > li > a').on(_bind,function(e){
		if(jQuery(this).parent('li').hasClass('active'))	
			return;
		var temp = jQuery(this).attr('href'); //tab select content
		if(jQuery(this).closest('.wpb_tabs').hasClass('has_slider')){
			var doc = jQuery(temp).find('.featured_product_slider_wrapper');
			if(doc.length > 0 ) {	
				var id_shortcode =  doc.attr('id');
				setTimeout(function(){
					jQuery('.wpb_tabs.has_slider #' + id_shortcode).find("div.products").trigger('destroy',true);
					//jQuery("#" + id_shortcode + " div.products").carouFredSel();
					jQuery('.wpb_tabs.has_slider').trigger('tabs_change',[id_shortcode]);
				},200);
			}	
		}
	});
}

function home_parallax(){
	if(jQuery(".wd_animate").length > 0 ){
		jQuery(".wd_animate").appear();
	}
	
}



jQuery(document).ready(function($) {
		"use strict";
		var on_touch = checkIfTouchDevice();
		
		var feed_data = jQuery('input.subscribe_email').attr('data-original');	
		jQuery('input.subscribe_email').val(feed_data);
		jQuery('input.subscribe_email').focus(function(event){
			if( jQuery(this).val() == feed_data ){
				jQuery(this).val("");
			}
		});	
		jQuery('input.subscribe_email').blur(function(event){	
			if( jQuery(this).val() == "" ){
				jQuery(this).val(feed_data);
			}
		});
		
		
		
		if (jQuery.browser.msie && jQuery.browser.version <= 10) {
			jQuery("html").addClass('ie' + parseInt(jQuery.browser.version) + " ie");
		} else {
			if (jQuery("html").attr('id') == 'wd_ie' && jQuery.browser.version == 11) {
				jQuery("html").addClass("ie11 ie");
			}
		}

		/*************** Start Woo Add On *****************/
				
        
        //set min height main slider
        //var header_bottom_height = jQuery(".header-bottom").outerHeight();
		//jQuery(".main-slideshow").css("min-height",header_bottom_height + "px");
        
        
        //social
        jQuery("ul.social-share > li > a > span").css("position","relative").css('display', 'inline-block').css("left","500px").css("visibility","0");
		jQuery("ul.social-share > li > a > span").each(function(index,value){
			TweenMax.to( jQuery(value),0.0, { css:{left:"0px",opacity:1 },  ease:Power2.easeInOut ,delay:index*0.9});
		});
		      
        

		jQuery('li.product').each(function(index,value){
			jQuery(value).on('wd_added_to_cart', function() {
				var _loading_mark_up = jQuery(value).find('.loading-mark-up').remove();
				jQuery(value).removeClass('adding_to_cart').addClass('added_to_cart').append('<span class="loading-text"></span>');//Successfully added to your shopping cart
				var _load_text = jQuery(value).find('.loading-text').css({'width' : jQuery(value).width()+'px','height' : jQuery(value).height()+'px'}).delay(1500).fadeOut();
				setTimeout(function(){
					_load_text.hide().remove();
				},1500);
				//delete view cart		
				jQuery('.list_add_to_cart .added_to_cart').remove();
				
				var _current_currency = jQuery.cookie('woocommerce_current_currency');

				//switch_currency( _current_currency );
			});	
		});	
		
		
		setTimeout(function () {
			jQuery("div.shipping-calculator-form").show(400);
		}, 1500);
		
		
		
        
		
		jQuery('body').on('click', '.variations_form .wd-select-option', function(e){
			var val = jQuery(this).attr('data-value');
			var _this = jQuery(this);
			
			var color_select = jQuery(this).parents('.value').find('select');
			color_select.trigger('focusin');
			if(color_select.find('option[value='+val+']').length !== 0) {
				color_select.val( val ).change();
				_this.parent('.wd_color_image_swap').find('.wd-select-option').removeClass('selected');
				_this.addClass('selected');
			}			
		});
		
		
		jQuery('.variations_form').on('click', '.reset_variations', function(e){
		
			jQuery(this).parents('.variations').find('.wd_color_image_swap .wd-select-option.selected').removeClass('selected');
		});
						
		jQuery('body').on('change', '.variations_form .variations select', function(e){
			jQuery('.variations_form .variations .wd_color_image_swap').parents('.value').find('select').trigger('focusin');
				jQuery('.variations_form .variations .wd_color_image_swap .wd-select-option').each(function(i,e){
					var val = jQuery(this).attr('data-value');
					var _this = jQuery(this);
					var op_elemend = jQuery(this).parents('.value').find('select option[value='+val+']');
					if(op_elemend.length == 0) {
						_this.hide();
					} else {
						_this.show();
					}
					
				});
				
		});
		
		jQuery('body').on('show_variation', '.variations_form .variations .single_variation_wrap', function(e){
			jQuery('.variations_form ').find( '.single_variation' ).parent().parent('.single_variation_wrap').removeClass('no-price');
			if(jQuery('.variations_form ').find( '.single_variation' ).html() == ''){
				jQuery('.variations_form ').find( '.single_variation' ).parent().parent('.single_variation_wrap').addClass('no-price');
			}
		});
		
		
        /***** W3 Total Cache & Wp Super Cache Fix *****/
       // jQuery('body').trigger('added_to_cart');
        /***** End Fix *****/
        
		/***** Start Re-init Cloudzoom on Variation Product  *****/
		//jQuery('form.variations_form').live('found_variation',function( event, variation ){
		//	jQuery('#qs-zoom,.wd-qs-cloud-zoom,.cloud-zoom, .cloud-zoom-gallery').CloudZoom({}); 
		//}).live('reset_image',function(){
		//	jQuery('#qs-zoom,.wd-qs-cloud-zoom,.cloud-zoom, .cloud-zoom-gallery').CloudZoom({}); 
		//});
		/***** End Re-init Cloudzoom on Variation Product  *****/        
        
        /*************** End Woo Add On *****************/
        
        /*************** Disable QS in Main Menu *****************/
        jQuery('ul.menu').find('ul.products').addClass('no_quickshop');
        /*************** Disable QS in Main Menu *****************/
		
		
		if (jQuery.browser.msie && ( parseInt( jQuery.browser.version, 10 ) == 7 )){
			alert("Your browser is too old to view this interactive experience. You should take the next 30 seconds or so and upgrade your browser! We promise you'll thank us after doing so in having a much better and safer web browsing experience! ");
		}

		
		em_sections();
		em_search_bar();
		var windowWidth = jQuery(window).width();
		
		setTimeout(function () {
			  onSizeChange(windowWidth);
		}, 1000);	
		
        jQuery('a.block-control').on('click',function(){
            jQuery(this).parent().siblings().slideToggle(300);
            jQuery(this).toggleClass('active');
            return false;
        });
		
		
	
		if(jQuery('.related-slider').length > 0){
			jQuery('.related-slider').flexslider({
				animation: "slide"
			});
		}
		
		jQuery('li.shortcode').on('hover',function(){
			jQuery(this).addClass('shortcode_hover')},function(){jQuery(this).removeClass('shortcode_hover');});
		

		//call review form
		jQuery('.wd-review-link').on('click',function(){
			if(jQuery('.woocommerce-tabs').length > 0){
				jQuery('.woocommerce-tabs li.reviews_tab').children('a').trigger('click');
			}
		}).trigger('click');
		
		////////// Generate Tab System /////////
		if(jQuery('.tabs-style').length > 0){
			jQuery('.tabs-style').each(function(){
				var ul = jQuery('<ul></ul>');
				var divPanel = jQuery('<div></div>');
				var liChildren = jQuery(this).find('li.tab-item');
				var length = liChildren.length;
				divPanel.addClass('panel');
				jQuery(this).find('li.tab-item').each(function(index){
					jQuery(this).children('div').appendTo(divPanel);
					if(index == 0)
						jQuery(this).addClass('first');
					if(index == length - 1)
						jQuery(this).addClass('last');
					jQuery(this).appendTo(ul);
					
				});
				jQuery(this).append(ul);
				jQuery(this).append(divPanel);
				
					jQuery( this ).tabs({ fx: { opacity: 'toggle', duration:'slow'} }).addClass( 'ui-tabs-vertical ui-helper-clearfix' );
				
			});		
		}
		

		
		// Toggle effect for ew_toggle shortcode
		jQuery( '.toggle_container a.toggle_control' ).on('click',function(){
			if(jQuery(this).parent().parent().parent().hasClass('show')){
				jQuery(this).parent().parent().parent().removeClass('show');
				jQuery(this).parent().parent().parent().addClass('hide');
				jQuery(this).parent().parent().children('.toggle_content ').hide('slow');
			}
			else{
				jQuery(this).parent().parent().parent().addClass('show');
				jQuery(this).parent().parent().parent().removeClass('hide');
				jQuery(this).parent().parent().children('.toggle_content ').show('slow');
			}
				
		});
		
        
        // **********************************************************************// 
		// ! Parallax
		// **********************************************************************// 
		
		if(on_touch == 0){
			$('.stripe-parallax-bg, .fancy-parallax-bg').each(function(){
				var $_this = $(this),
					fixed_prl = $_this.data("prlx-fixed"),
					speed_prl = $_this.data("prlx-speed");
					$_this.css('background-attachment', 'fixed');
					$(this).parallax("50%", 0.3);
					$('.stripe-parallax-bg').addClass("parallax-bg-done");
			});
		};
		
        //fancy box
        /*var fancy_wd = jQuery("a.fancybox").fancybox({
			// 'openEffect'	: 'elastic'
			// ,'closeEffect'	: 'elastic'
			// ,'openEasing'   : 'easeOutBack'
			// ,'closeEasing'  : 'easeOutBack'
			// ,'nextEasing'   : 'easeOutBack'
			// ,'prevEasing'	: 'easeOutBack'		
			// 'openSpeed'    : 500
			// ,'openSpeed'	: 500
					tmp_href = this.href;
					if( this.href.indexOf('youtube.com') >= 0 || this.href.indexOf('youtu.be') >= 0 ){
			// ,'nextSpeed'	: 1000
			// ,'prevSpeed'    : 1000
			'scrolling'	: 'no'
			,'mouseWheel'	: false

			,beforeLoad  : function(){
						this.type = 'iframe';
						this.scrolling = 'no';
						//&html5=1&wmode=opaque
						this.href = this.href.replace(new RegExp("watch\\?v=", "i"), 'embed/') + '?autoplay=1';
					}
					else if( this.href.indexOf('vimeo.com') >= 0 ){
						this.type = 'iframe';
						this.scrolling = 'no';					
						//this.href = this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1') + '&autoplay=1';
						var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
						var match = this.href.match(regExp);
						this.href = 'http://player.vimeo.com/video/' + match[2] + '?portrait=0&color=ffffff';
					}
					else{
						//this.type = null;
					}
					
					
			}
			,afterClose : function(){
					this.href = tmp_href;
			}		
			,afterShow  : function(){
				jQuery('.fancybox-wrap').wipetouch({
					tapToClick: true, // if user taps the screen, triggers a click event
					wipeLeft: function(result) { 
						jQuery.fancybox.next();
					},
					wipeRight: function(result) {
						jQuery.fancybox.prev();
					}
				});					
				if( jQuery('.fancybox-prev-clone').length <= 0 )
					jQuery('.fancybox-prev').clone().removeClass('fancybox-nav fancybox-prev').addClass('fancybox-prev-clone').appendTo(".fancybox-overlay");
				
				if( jQuery('.fancybox-next-clone').length <= 0 )
					jQuery('.fancybox-next').clone().removeClass('fancybox-nav fancybox-next').addClass('fancybox-next-clone').appendTo(".fancybox-overlay");
				
				if( jQuery('.fancybox-close-clone').length <= 0 )
					jQuery('.fancybox-close').clone().removeClass('fancybox-item fancybox-close').addClass('fancybox-close-clone').appendTo(".fancybox-overlay");
			
				if( jQuery('.fancybox-title-clone').length <= 0 )
					jQuery('.fancybox-title').clone().addClass('fancybox-title-clone').appendTo(".fancybox-overlay");
				else{
					jQuery('.fancybox-title-clone').html( jQuery('.fancybox-wrap').find('.fancybox-title').html() );
				}	
				jQuery('.fancybox-wrap').find('.fancybox-title').hide();				
				
				jQuery('.fancybox-wrap').find('.fancybox-prev').hide();
				jQuery('.fancybox-wrap').find('.fancybox-next').hide();
				jQuery('.fancybox-wrap').find('.fancybox-close').hide();
				
			}			
			
		}); */
        
        jQuery('.fancybox-prev-clone').live('click',function(){
			jQuery('.fancybox-wrap').find('.fancybox-prev').trigger('click');
		});
		jQuery('.fancybox-next-clone').live('click',function(){
			jQuery('.fancybox-wrap').find('.fancybox-next').trigger('click');
		});
		jQuery('.fancybox-close-clone').live('click',function(){
			jQuery('.fancybox-wrap').find('.fancybox-close').trigger('click');
		});
        
        

		jQuery('p:empty').remove();
		
		// button state demo
		jQuery('.btn-loading')
		  .click(function () {
			var btn = jQuery(this)
			btn.button('loading')
			setTimeout(function () {
			  btn.button('reset')
			}, 3000)
		  });
		
		// tooltip 
		jQuery('body').tooltip({
		  selector: "a[rel=tooltip]"
		});
	 
		jQuery('.view_full a').on('click',function(event){	
			event.preventDefault();
			jQuery('meta[name="viewport"]').remove();
		});
		
		if( jQuery('html').offset().top < 100 ){
			jQuery("#to-top").hide();
		}
		jQuery(window).scroll(function () {
			
			if (jQuery(this).scrollTop() > 100) {
				jQuery("#to-top").fadeIn();
			} else {
				jQuery("#to-top").fadeOut();
			}
		});
		jQuery('.scroll-button').on('click',function(){
			jQuery('body,html').animate({
			scrollTop: '0px'
			}, 1000);
			return false;
		});			

		
		jQuery('#myTab a').on('click',function (e) {
			e.preventDefault();
			jQuery(this).tab('show');
		});
	
		
		//sticker block
		if(jQuery('.wd_sticker').length){		
			jQuery('.wd_sticker').csTicker({
				tickerTitle: 'Hot News',
				tickerMode:'mini',
				speed: 600,
				autoAnimate: true
			});	
		}	

		
		var touch = false;
		  /* DETECT PLATFORM */
		  jQuery.support.touch = 'ontouchend' in document;
		  
		  if (jQuery.support.touch) {
			touch = true;
			jQuery('body').addClass('touch');
		  }
		  else{
			jQuery('body').addClass('notouch');
		  }
		  
		  if(touch == false){
			dataAnimate();
		  }	
		
		
		jQuery('.carousel').each(function(index,value){
			jQuery(value).wipetouch({
				tapToClick: false, // if user taps the screen, triggers a click event
				wipeLeft: function(result) { 
					jQuery(value).find('a.carousel-control.right').trigger('click');
					//jQuery(value).carousel('next');
				},
				wipeRight: function(result) {
					jQuery(value).find('a.carousel-control.left').trigger('click');
					//jQuery(value).carousel('prev');
				}
			});	
		});
		
		
		// jQuery("ul.social-share > li > a > span").css("position","relative").css("right","500px").css("opacity","0");
		// jQuery("ul.social-share > li > a > span").each(function(index,value){
			// TweenMax.to( jQuery(value), 0.9, { css:{ right:"0px",opacity:1 },  ease:Power2.easeInOut ,delay:index*0.9});
		// });
		
        set_cloud_zoom();
		set_header_bottom();
		// Set menu on top
		if(typeof(_enable_sticky_menu) != "undefined"){
			if(_enable_sticky_menu==1)
				sticky_main_menu( on_touch );
		}
		else{
			sticky_main_menu( on_touch );
		}
		if( on_touch == 0 ){
			
		}else{
			jQuery(window).on('orientationchange',function(event) {	
					onSizeChange( jQuery(window).width() );
					set_header_bottom();
					em_sections();
					set_cloud_zoom();
					
					tab_slider(jQuery(window).width());		
					if(_enable_sticky_menu==1){
						sticky_main_menu( on_touch );
					}						
			});
		}

		
        
		jQuery(".right-sidebar-content > ul > li:first").addClass('first');
		jQuery(".right-sidebar-content > ul > li:last").addClass('last');
		
		
		jQuery(".product_upsells > ul").each(function( index,value ){
			jQuery(value).children("li:last").addClass('last');
		});
		

		jQuery("ul.product_list_widget").each(function(index,value){
			jQuery(value).children("li:first").addClass('first');
			jQuery(value).children("li:last").addClass('last');
		});
		jQuery(".related.products > ul > li:last").addClass('last');
		
		home_parallax();
		jQuery(document).on('click','div.wd_cart_buttons a.wd_update_button_visible',function(event){
			event.preventDefault();
			//alert(jQuery('.woocommerce form.wd_form_cart .wd_update_button_invisible').val());
			jQuery('.woocommerce form.wd_form_cart .wd_update_button_invisible').trigger('click');	
		});
		jQuery(document).on('click','.cart_totals_wrapper .checkout-button-visible',function(event){
			event.preventDefault();
			jQuery('.checkout-button').trigger('click');	
		});
		//jQuery(".circle_small_holder").each(function(index,value){
			//jQuery(value).addClass('wd_animate');
			//TweenMax.to( jQuery(value),0.0, { css:{opacity:1},  ease:Power2.easeInOut ,delay:index*0.9});
		//});

		/*jQuery("a.wd-prettyPhoto").prettyPhoto({
			social_tools: false,
			theme: 'pp_default wd_feedback',
			horizontal_padding: 30,
			opacity: 0.9,
			deeplinking: false
		});*/
			
		
		//search v2
		jQuery('.search_active_button').on('click',function(){
			if(jQuery(this).parent().children('.searchform').hasClass('active') == false){
				jQuery(this).parent().children('.searchform').slideDown('slow');
				jQuery(this).parent().children('.searchform').addClass('active');
			}
			else{
				jQuery(this).parent().children('.searchform').slideUp('slow');
				jQuery(this).parent().children('.searchform').removeClass('active');
			}
		});
	
	
		jQuery('.menu-extra-content').on({
			mouseover: function(){
				jQuery(this).children('.more-content').stop().slideDown(300);
				//jQuery(this).children('.more-content').addClass('active');
			},
			mouseleave: function(){
				jQuery(this).children('.more-content').slideUp(300);
				//jQuery(this).children('.more-content').removeClass('active');
			}
		});	
		
		
		
});

jQuery(document).ready(function(){
	"use strict";
	var subscribe_input = jQuery(".subscribe_widget input.subscribe_email");
	var value_default = subscribe_input.attr('data-default');
	subscribe_input.val(value_default);
	subscribe_input.click(function(){
		if( jQuery(this).val() === value_default ) jQuery(this).val("");
	});
	subscribe_input.blur(function(){
		if( jQuery(this).val() === "" ) jQuery(this).val(value_default);
	});
	jQuery('.toggle-review').click(function(event) {
		jQuery('#review_form_wrapper').slideToggle('1000');
	});
	jQuery('.quantity .btn-number').click(function(event) {
		/* Act on the event */
		var currVal = parseInt(jQuery('.quantity .quant').val());
		var type = jQuery(this).attr('data-type');
		var min = jQuery('.quantity .quant').attr('min');
		var max = jQuery('.quantity .quant').attr('max');
		if(!isNaN(currVal)){
			if(type == 'minus'){
				if(!isNaN(min)){
					if(currVal > min){
						jQuery('.quantity .quant').val(currVal-1).change();	
					}else{
						jQuery(this).attr('Disable', 'true');
					}
				}else{
					jQuery('.quantity .quant').val(currVal-1).change();
				}
			}else if(type == 'plus'){
				if(!isNaN(max)&& max != ''){
					alert(max);
					if(currVal < max){
						jQuery('.quantity .quant').val(currVal+1).change();	
					}else{
						jQuery(this).attr('Disable', 'true');
					}
				}else{
					jQuery('.quantity .quant').val(currVal+1).change();
				}
			}
		} else {
			jQuery('.quantity .quant').val(0);
		}

	});
	
});

