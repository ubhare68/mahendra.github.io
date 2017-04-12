/*-----------------------------------------------------------------------------------
/*
/* Custom JS
/*
-----------------------------------------------------------------------------------*/

/* Start Document */

(function($){
	$(document).ready(function(){

        $('body').removeClass('no-js').addClass('js');

        $("#navigation li").hover(
         function () {
            $(this).has('ul').addClass("hover");
            $(this).find('ul:first').css({
               visibility: "visible",
               display: "none"
           }).stop(true, true).slideDown("fast");
        },
        function () {
            $(this).removeClass("hover");
            $(this).find('ul:first').css({
               visibility: "visible",
               display: "block"
           }).stop(true, true).slideUp("fast");
        }
        );


        $("select.selectnav").change(function() {
         window.location = $(this).find("option:selected").val();
     });

        /*----------------------------------------------------*/
/*	Image Overlay
/*----------------------------------------------------*/

$('.picture a').hover(function () {
	$(this).find('.image-overlay-zoom, .image-overlay-link').stop().fadeTo('fast', 1);
},function () {
	$(this).find('.image-overlay-zoom, .image-overlay-link').stop().fadeTo('fast', 0);
});

/*----------------------------------------------------*/
/*	Back To Top Button
/*----------------------------------------------------*/

$('#scroll-top-top a').click(function(){
	$('html, body').animate({scrollTop:0}, 300);
	return false;
});

$('#search-in-menu .fa').click(function(){
				 $('li#search-in-menu input[type="text"]').focus();
			})


/*----------------------------------------------------*/
/*	Accordion
/*----------------------------------------------------*/

var $container = $('.acc-container'),
$trigger   = $('.acc-trigger');

$container.hide();
$trigger.first().addClass('active').next().show();

/*var fullWidth = $container.outerWidth(true);
$trigger.css('width', fullWidth);
$container.css('width', fullWidth);
*/
$trigger.on('click', function(e) {
	if( $(this).next().is(':hidden') ) {
		$trigger.removeClass('active').next().slideUp(300);
		$(this).toggleClass('active').next().slideDown(300);
	}
	e.preventDefault();
});

		// Resize
		$(window).on('resize', function() {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width() );
			$container.css('width', $container.parent().width() );
		});


        /*----------------------------------------------------*/
/*  Accordion
/*----------------------------------------------------*/

$(".toggle-container").hide();
$(".toggle-trigger").click(function(){
    $(this).toggleClass("active").next().slideToggle("normal");
        return false; //Prevent the browser jump to the link anchor
    });


/*----------------------------------------------------*/
/*	Tabs
/*----------------------------------------------------*/



var $tabsNav    = $('.tabs-nav'),
$tabsNavLis = $tabsNav.children('li'),
$tabContent = $('.tab-content');

$tabsNav.each(function() {
	var $this = $(this);

	$this.next().children('.tab-content').stop(true,true).hide()
	.first().show();

	$this.children('li').first().addClass('active').stop(true,true).show();
});

$tabsNavLis.on('click', function(e) {
	var $this = $(this);

	$this.siblings().removeClass('active').end()
	.addClass('active');

	$this.parent().next().children('.tab-content').stop(true,true).hide()
	.siblings( $this.find('a').attr('href') ).fadeIn();

	e.preventDefault();
});



$('.testimonials-carousel').carousel({
    namespace: "mr-rotato",
    slider : '.carousel',
    slide : '.testimonial'
})



/*----------------------------------------------------*/
/*	Isotope Portfolio Filter
/*----------------------------------------------------*/
$(window).load(function(){
	$('#portfolio-wrapper').isotope({
      itemSelector : '.portfolio-item',
      layoutMode : 'fitRows'
  });

	var $container = $('.full-width-class .products, .twelve.columns .products, .woocommerce.columns-2 .products,.woocommerce.columns-4 .products');
	$container.isotope({ itemSelector: 'div.product', layoutMode: 'fitRows' });
	

});
$('#filters a').click(function(e){
  e.preventDefault();

  var selector = $(this).attr('data-option-value');
  $('#portfolio-wrapper').isotope({ filter: selector });

  $(this).parents('ul').find('a').removeClass('selected');
  $(this).addClass('selected');
});



$('a.close').click(function(e){
	e.preventDefault();
	$(this).parent().fadeOut();

});

$('.tooltips').tooltip({
  selector: "a[rel=tooltip]"
})



$(".video-cont").fitVids();

$('.royalSlider').css('display', 'block');

$('#home-slider').royalSlider({
	autoScaleSlider: true,
	autoScaleSliderWidth: 1180,
	autoHeight: true,
	loop: centum.home_slider_loop,
	slidesSpacing: 0,
	imageScaleMode: centum.home_slider_scale_mode,
	imageAlignCenter:false,
	navigateByClick: false,
	numImagesToPreload : 10,
	autoPlay: {
		// autoplay options go gere
		enabled: centum.home_slider_autoplay,
		pauseOnHover: true,
		delay: centum.home_royal_delay
	},
	/* Arrow Navigation */
	arrowsNav:true,
	arrowsNavAutoHide: centum.home_slider_arrows_hide,
	arrowsNavHideOnTouch: true,
	keyboardNavEnabled: true,
	fadeinLoadedSlide: true,
});

$('#portfolio-slider').royalSlider({
	autoScaleSlider: true,
	autoScaleSliderWidth: 1180,
	autoHeight: true,
	loop: true,
	slidesSpacing: 0,
	imageScaleMode: 'fill',
	imageAlignCenter:true,
	navigateByClick: false,
	numImagesToPreload : 10,
	
	arrowsNav:true,
	arrowsNavAutoHide: false,
	arrowsNavHideOnTouch: true,
	keyboardNavEnabled: true,
	fadeinLoadedSlide: true,
});



 $("#product-slider").royalSlider({

        autoScaleSlider: true,
      autoScaleSliderWidth: 580,
      autoHeight: true,
      //autoScaleSliderHeight: 500,
      arrowsNavAutoHide: false,
      loop: false,
      slidesSpacing: 0,

      imageScaleMode: 'fill',
      imageAlignCenter:false,

      navigateByClick: false,
      numImagesToPreload:2,

      /* Thumbnail Navigation */
		controlNavigation: 'thumbnails',
		thumbs: {
			orientation: 'horizontal',
			firstMargin: false,
			appendSpan: true,
			autoCenter: false,
			spacing: 10,
			paddingTop: 10,
		}

    });


$('.basic-slider').royalSlider({

	autoScaleSlider: true,
	autoScaleSliderHeight: "auto",
	autoHeight: true,

	loop: false,
	slidesSpacing: 0,

	imageScaleMode: 'none',
	imageAlignCenter:false,

	navigateByClick: false,
	numImagesToPreload:10,

	/* Arrow Navigation */
	arrowsNav:true,
	arrowsNavAutoHide: false,
	arrowsNavHideOnTouch: true,
	keyboardNavEnabled: true,
	fadeinLoadedSlide: true,

});


$('[rel=image]').magnificPopup({ 
  	type: 'image',
	closeOnContentClick: true,
	mainClass: 'my-mfp-zoom-in',
	image: {
		 markup: '<div class="mfp-figure">'+
	        '<div class="mfp-close"></div>'+
	        '<div class="mfp-img"></div>'+
	        '<div class="mfp-bottom-bar">'+
	          '<div class="mfp-title"></div>'+
	          '<div class="mfp-counter"></div>'+
	        '</div>'+
	      '</div>',
		verticalFit: true,
		titleSrc: function(item) {
     		return item.el.attr('title');
  		}
	},
	// other options
});

$('[rel=image-gallery]').magnificPopup({
  type: 'image',
  mainClass: 'my-mfp-zoom-in',
  gallery:{
    enabled:true
  },

});

$('.wp-caption a').magnificPopup({
  type: 'image',
  mainClass: 'mfp-fade',
  closeOnContentClick: true,
  image: {
    verticalFit: true
  }
}); 

$('.page a.button.lightbox').magnificPopup({
  type: 'image',
  mainClass: 'mfp-fade',
  closeOnContentClick: true,
  image: {
    verticalFit: true
  }
});     

$('#product-slider-no-thumbs .rsSlide, #product-slider .rsSlide, .basic-slider .rsSlide, #portfolio-slider .rsSlide').magnificPopup({
  delegate: 'a',
  mainClass: 'my-mfp-zoom-in',
  type: 'image',
  closeOnContentClick: true,
  image: {
    verticalFit: true
  },
  	gallery: {
	  enabled: true
	},
});


$(window).load(function() {
    $('.flexslider').flexslider({ animation: "slide" , controlNav: false,smoothHeight: true, slideshowSpeed: 7000, animationSpeed: 600,start: function(slider) {
    	$('.flexslider').removeClass('loadingflex');
	}
	});
});

// Responsive Tables
//----------------------------------------//
$('.responsive-table').stacktable();


$('.stars a').on( "click", function() {
	$('.stars a').removeClass('prevactive');
 	$(this).prevAll().addClass('prevactive');
}).hover(
  function() {
  	$('.stars a').removeClass('prevactive');
	$(this).addClass('prevactive').prevAll().addClass('prevactive');
  }, function() {
  	$('.stars a').removeClass('prevactive');
  	$('.stars a.active').prevAll().addClass('prevactive');
  }
);


$(".small-only input.input-text.qty.text").on( "change", function() {
	var value = $(this).val();
	var name = $(this).attr('name');
	$(".large-only").find(".quantity.buttons_added .qty[name*='"+name+"']").val(value);
});



// Retina Images
//----------------------------------------//

var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;

$(window).on("load", function() {
	if (pixelRatio > 1) {
		if(centum.retinalogo) {
			$('#logo img').attr('src',centum.retinalogo);
		}
	}
});

/* End Document */

});

})(this.jQuery);



/*global jQuery */
/*!
* FitVids 1.0
*
* Copyright 2011, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
* Date: Thu Sept 01 18:00:00 2011 -0500
*/


(function( $ ){

  "use strict";

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null
    };

    if(!document.getElementById('fit-vids-style')) {

      var div = document.createElement('div'),
          ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0],
          cssStyles = '&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>';

      div.className = 'fit-vids-style';
      div.id = 'fit-vids-style';
      div.style.display = 'none';
      div.innerHTML = cssStyles;

      ref.parentNode.insertBefore(div,ref);

    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        "iframe[src*='player.vimeo.com']",
        "iframe[src*='youtube.com']",
        "iframe[src*='youtube-nocookie.com']",
        "iframe[src*='kickstarter.com'][src*='video.html']",
        "object",
        "embed"
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not("object object"); // SwfObj conflict patch

      $allVideos.each(function(){
        var $this = $(this);
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );



jQuery( function( $ ) {

	// Quantity buttons

	$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
		$('.plus').val('\uf067');
		$('.minus').val('\uf068');
	$( document ).on( 'click', '.plus, .minus', function() {

		// Get values
		var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		// Change the value
		if ( $( this ).is( '.plus' ) ) {

			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}

		} else {

			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}

		}

		// Trigger change event
		$qty.trigger( 'change' );

	});

});