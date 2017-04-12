
jQuery(document).ready(function(){
	"use strict";
    /* ADD Memu Sticky*/
  
    jQuery(window).scroll(function(){
    dataAnimate();
    if (jQuery(this).scrollTop() > jQuery('header').height() ) {
      jQuery('header').addClass('menu-sticky');
    }else{
      jQuery('header').removeClass('menu-sticky');
    };

  });
  /*********************/
    dataAnimate();

    if(jQuery('html').offset().top < jQuery('header').height()){
      if(jQuery('header').hasClass('menu-sticky')){
        jQuery('header').removeClass('menu-sticky');
      }
    }
    jQuery('.modal_toggle').click(function(event) {
        var modal = jQuery(this).attr('data-class');
        jQuery(modal).slideToggle('slow');
    });
    jQuery('.hidden_toggle').click(function(event) {
      /* Act on the event */
      jQuery(this).parent().slideToggle('slow');
    });
    custom_mobile_menu();
    custom_widget_menu();
	jQuery("#list_comment").owlCarousel({
            items: 1,
            loop:false,
            singleItem: true,
  });
	jQuery("#wd_woo_related").owlCarousel({
		responsive		:{
			0:{
				items:2
			},
			480:{
				items:2
			},
			768:{
				items: 3
			},
			992:{
				items: 4
			},
			1200:{
				items: 4
			}
		}
	});
	jQuery('.show-login').on('click',function(){
		jQuery('.mobile-login').slideToggle('slow');
	});
	jQuery('#commentform').find('input').focus(function() {
						if(jQuery(this).val() == jQuery(this).attr('defaultvalue'))
							jQuery(this).val('');
					}).blur(function() {
						if(jQuery(this).val() == '')
							jQuery(this).val(jQuery(this).attr('defaultvalue'));
					});
					jQuery('#commentform').on('submit',function() {
						jQuery(this).find('input').each(function(input){
							if(jQuery(this).val() == jQuery(this).attr('defaultvalue'))
								jQuery(this).val('');
						});	
						return true;
					});
	jQuery('.social_icon .social_item').on('click',function(){
							var url = jQuery(this).attr('href');
							var title = jQuery(this).attr('title');
							window.open(url, title,"width=700, height=520");
							return false;
						});

    /**************************************/
	   var owldemo = jQuery("#owl-demo");
      owldemo.owlCarousel({

      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
       //autoplay:true,
      loop:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      });

      jQuery("#slider-gallery__content").owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
      loop:false,
      });

      jQuery(".slider-gallery-prev").click(function(){
        jQuery("#slider-gallery__content").trigger('owl.next');
      })
      jQuery(".slider-gallery-next").click(function(){
         jQuery("#slider-gallery__content").trigger('owl.prev');
      })
      if(jQuery('#slider-gallery__content .item').length <= 3){
        jQuery('.slider-gallery-customNavigation').hide();
      }else{
        jQuery('.slider-gallery-customNavigation').show();
      }
      /****************CHANGE IMAGE DETAIL PRODUCT************************/
      jQuery('#slider-gallery').on('click', 'img', function(event) {
        event.preventDefault();
        var small_src = jQuery(this).parent().html();
        var large_src = jQuery('.detail-large-image').html();
        // change src
        jQuery(this).parent().html(large_src);
        jQuery('.detail-large-image').html(small_src);
      });

      jQuery('.icon-mobile-menu').on('click',function(){
      	jQuery('.wd-mobile-menu').slideToggle('slow');
      });

      jQuery(window).on('resize',function(event) {
      		if(jQuery(this).outerWidth() > 768 ){
            var _height_left = jQuery('.home-3 .sidebar-left').outerHeight();
            var _height_content = jQuery('.home-3 .page-content').outerHeight();
      			if(_height_left < _height_content ){
      			 jQuery('.home-3 .sidebar-left').height(_height_content);
      			}
      		}else{
      		  jQuery('.home-3 .sidebar-left').height('auto');
      		}
      });

  /************ADD TOOPTLE*****************/
  jQuery('.yith-wcwl-wishlistexistsbrowse a').attr('title', 'Wishlist');
  jQuery('.compare-button .compare').attr('title', 'Compare');
  jQuery('.product-content-cart .add_to_cart_button ').attr('title', 'Add To Cart');
});

function dataAnimate(){
  jQuery('[data-animate]').each(function(){
    
    var $toAnimateElement = jQuery(this);
    
    var toAnimateDelay = jQuery(this).attr('data-delay');
    
    var toAnimateDelayTime = 0;
    
    if( toAnimateDelay ) { toAnimateDelayTime = Number( toAnimateDelay ); } else { toAnimateDelayTime = 500; }

    var elementAnimation = $toAnimateElement.attr('data-animate');

    if(animate_scroll($toAnimateElement)){
      if( !$toAnimateElement.hasClass('animated') ) {
      
        $toAnimateElement.addClass('not-animated');
        setTimeout(function() {
          $toAnimateElement.removeClass('not-animated').addClass( elementAnimation + ' animated');
        }, toAnimateDelayTime);
      }

    }else{

      $toAnimateElement.addClass('not-animated');
    }
    
  });
}

function animate_scroll(element){
  var height_element = jQuery(element).offset().top; //+ jQuery(element).outerHeight();
  var height_window  = jQuery(window).height();
  var height_scroll  = jQuery(window).scrollTop();
  var height_top = height_window + height_scroll;
  if(height_element > height_top){
    return false;
  } else {
    return true ;
  }
}

function custom_mobile_menu(){
    var _li_have_sub_menu_mobile = jQuery(".mobile-menu .wd-mobile-menu ul.menu ul.sub-menu").parents("li");
    var _button_toggle_menu_html = '<i class="fa fa-angle-down menu-drop-icon-mobile" aria-hidden="true"></i>';

    jQuery(_button_toggle_menu_html).insertAfter(_li_have_sub_menu_mobile.find("a:first"));
    jQuery(".mobile-menu .wd-mobile-menu ul.menu ul.sub-menu").slideUp('slow');
    jQuery(".mobile-menu .wd-mobile-menu ul.menu li.current-menu-item").parents("ul.sub-menu").show();
    jQuery(".mobile-menu .wd-mobile-menu ul.menu li.current-menu-item").parents("ul.sub-menu").prev().addClass("active");
    jQuery(".mobile-menu .wd-mobile-menu ul.menu .menu-drop-icon-mobile").on("click",function(){
        if(!jQuery(this).hasClass("active")){
            jQuery(this).parents("li:first").find("ul.sub-menu:first").slideDown("slow");
            jQuery(this).addClass("active");
        }
        else{
            jQuery(this).parents("li:first").find("ul.sub-menu:first").slideUp("slow");
            jQuery(this).find("ul.sub-menu").hide();
            jQuery(this).removeClass("active");
        }
        
    });
}

function custom_widget_menu(){
    var _li_have_sub_menu_mobile = jQuery(".widget_nav_menu ul.menu ul.sub-menu").parents("li");
    var _button_toggle_menu_html = '<i class="fa fa-angle-down menu-drop-icon-mobile" aria-hidden="true"></i>';

    jQuery(_button_toggle_menu_html).insertAfter(_li_have_sub_menu_mobile.find("a:first"));
    jQuery(".widget_nav_menu ul.menu ul.sub-menu").slideUp('slow');
    jQuery(".widget_nav_menu ul.menu li.current-menu-item").parents("ul.sub-menu").show();
    jQuery(".widget_nav_menu ul.menu li.current-menu-item").parents("ul.sub-menu").prev().addClass("active");
    jQuery(".widget_nav_menu ul.menu .menu-drop-icon-mobile").on("click",function(){
        if(!jQuery(this).hasClass("active")){
            jQuery(this).parents("li:first").find("ul.sub-menu:first").slideDown("slow");
            jQuery(this).addClass("active");
        }
        else{
            jQuery(this).parents("li:first").find("ul.sub-menu:first").slideUp("slow");
            jQuery(this).find("ul.sub-menu").hide();
            jQuery(this).removeClass("active");
        }
        
    });
}
