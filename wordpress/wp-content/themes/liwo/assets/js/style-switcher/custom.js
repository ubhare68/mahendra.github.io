jQuery(document).ready(function($) {
	
	$('.view_fullwidth').click(function(event) {
		$("#wrapper_boxed_id").removeClass("wrapper_boxed");
	});

	$('.view_boxed').click(function(event) {
		$("#wrapper_boxed_id").addClass("wrapper_boxed");
	});

	var sample;
	var sample_color;
	$('.pre-color-skin4').click(function() {
		$('.liwo.punch_text').css('background-color', '#19A3EB');
		$('.bg_callto_action').css('background-color', '#19A3EB');
		$('.ctr-button a').css('border-color', '#19A3EB');
		$('.ts_cta_button1').css('background-color', '#19A3EB');
		sample = '#19A3EB';
		sample_color = '#1889C1';
	});

	$('.pre-color-skin2').click(function() {
		$('.liwo.punch_text').css('background-color', '#7952AA');
		$('.bg_callto_action').css('background-color', '#7952AA');
		$('.ctr-button a').css('border-color', '#7952AA');
		$('.ts_cta_button1').css('background-color', '#7952AA');
		sample = '#7952AA';
		sample_color = '#4A2D6D';
	});

	$('.pre-color-skin3').click(function() {
		$('.liwo.punch_text').css('background-color', '#B3D222');
		$('.bg_callto_action').css('background-color', '#B3D222');
		$('.ctr-button a').css('border-color', '#B3D222');
		$('.ts_cta_button1').css('background-color', '#B3D222');
		sample = '#B3D222';
		sample_color = '#728711';
	});

	$('.pre-color-skin1').click(function() {
		$('.liwo.punch_text').css('background-color', '#ff6407');
		$('.bg_callto_action').css('background-color', '#ff6407');
		$('.ctr-button a').css('border-color', '#ff6407');
		$('.ts_cta_button1').css('background-color', '#ff6407');
		sample = '#ff6407';
		sample_color = '#bb4701';
	});

	$('.pre-color-skin5').click(function() {
		$('.liwo.punch_text').css('background-color', '#09a609');
		$('.bg_callto_action').css('background-color', '#09a609');
		$('.ctr-button a').css('border-color', '#09a609');
		$('.ts_cta_button1').css('background-color', '#09a609');
		sample = '#09a609';
		sample_color = '#057105';
	});

	$('.pre-color-skin6').click(function() {
		$('.liwo.punch_text').css('background-color', '#fc4a4a');
		$('.bg_callto_action').css('background-color', '#fc4a4a');
		$('.ctr-button a').css('border-color', '#fc4a4a');
		$('.ts_cta_button1').css('background-color', '#fc4a4a');
		sample = '#fc4a4a';
		sample_color = '#b32c2c';
	});

	$('.pre-color-skin7').click(function() {
		$('.liwo.punch_text').css('background-color', '#00bdbd');
		$('.bg_callto_action').css('background-color', '#00bdbd');
		$('.ctr-button a').css('border-color', '#00bdbd');
		$('.ts_cta_button1').css('background-color', '#00bdbd');
		sample = '#00bdbd';
		sample_color = '#007070';
	});

	$('.pre-color-skin8').click(function() {
		$('.liwo.punch_text').css('background-color', '#db5edb');
		$('.bg_callto_action').css('background-color', '#db5edb');
		$('.ctr-button a').css('border-color', '#db5edb');
		$('.ts_cta_button1').css('background-color', '#db5edb');
		sample = '#db5edb';
		sample_color = '#9a359a';
	});

	$('.pre-color-skin9').click(function() {
		$('.liwo.punch_text').css('background-color', '#ea009b');
		$('.bg_callto_action').css('background-color', '#ea009b');
		$('.ctr-button a').css('border-color', '#ea009b');
		$('.ts_cta_button1').css('background-color', '#ea009b');
		sample = '#ea009b';
		sample_color = '#8d005d';
	});

	$('.pre-color-skin10').click(function() {
		$('.liwo.punch_text').css('background-color', '#b4702d');
		$('.bg_callto_action').css('background-color', '#b4702d');
		$('.ctr-button a').css('border-color', '#b4702d');
		$('.ts_cta_button1').css('background-color', '#b4702d');
		sample = '#b4702d';
		sample_color = '#703e0c';
	});


	$('.liwo.punch_text a').hover(function() {
		$(this).css('background-color', sample_color);
	}, function() {
		$('.liwo.punch_text a').css('background-color', '#FFFFFF');
	});

	$('.ts_cta_button1').hover(function() {
		$(this).css('background-color', sample_color);
	}, function() {
		$('.ts_cta_button1').css('background-color', sample);
	});

	$('.bg-patterns1').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/bg.png)');
	});
	$('.bg-patterns2').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern19.png)');
	});
	$('.bg-patterns3').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern14.png)');
	});
	$('.bg-patterns4').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern2.png)');
	});
	$('.bg-patterns5').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern7.png)');
	});
	$('.bg-patterns6').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern11.png)');
	});
	$('.bg-patterns7').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern6.png)');
	});
	$('.bg-patterns8').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern20.png)');
	});
	$('.bg-patterns9').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern15.png)');
	});
	$('.bg-patterns10').click(function() {
		$('body').css('background-image','url(http://user2.themestudio.net/liwo/wp-content/themes/liwo/assets/images/elements/pattern16.png)');
	});

});