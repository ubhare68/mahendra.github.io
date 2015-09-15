jQuery(document).ready(function($){
	
	var bx1 = $('.woocs1');
	var bx2 = $('.woocs2');
	var bx3 = $('.woocs3');
	var bx4 = $('.woocs4');
	var bx5 = $('.woocs5');
	
	if(parseInt(bx1.attr('count')) > 3){
	bx1.bxSlider({
		minSlides: 4,
		maxSlides: 6,
		slideWidth: 360,
		slideMargin: 3,
		preloadImages: 'all',
		adapriveHeight: true,
		auto: parseInt(bx1.attr('autoslide')),
		speed: bx1.attr('speed'),
		pager: parseInt(bx1.attr('pager'))
	});
	}

	if(parseInt(bx2.attr('count')) > 3){
	var cc = $(".woocs2 li").first().find('.woocs_container').length * 180;
	
	bx2.bxSlider({
		//mode: 'vertical',
		minSlides: 4,
		maxSlides: 6,
		slideWidth: 360,
		slideMargin: 3,
		preloadImages: 'all',
		adapriveHeight: true,
		auto: parseInt(bx2.attr('autoslide')),
		speed: bx2.attr('speed'),
		pager: parseInt(bx2.attr('pager'))
	});
	$(".wcs-viewport").attr('style', 'width: 100%; overflow: hidden; position: relative; height: ' + cc + 'px!important' );
	}

	bx3.bxSlider({
		maxSlides: 1,
		auto: parseInt(bx3.attr('autoslide')),
		speed: bx3.attr('speed'),
		pager: parseInt(bx3.attr('pager'))
	});


	bx4.bxSlider({
		maxSlides: 1,
		auto: parseInt(bx4.attr('autoslide')),
		speed: bx4.attr('speed'),
		pager: parseInt(bx4.attr('pager'))
	});
	
	bx5.bxSlider({
		maxSlides: 1,
		auto: parseInt(bx5.attr('autoslide')),
		speed: bx5.attr('speed'),
		pager: parseInt(bx5.attr('pager'))
	});

});