$=jQuery;

$(document).ready(function() {initialize();});

function initialize() {
	
	console.log('slider-div');

	// Open and Close slider
  $('#slider .fa-times-circle').unbind().click(function (e) {

    if ($(window).width() === $('#slider').outerWidth()) {
      var percentage = '-100%';
      $('#slider a.button.checkout.wc-forward').fadeIn();
      $('.woocommerce-mini-cart__total').fadeIn();
      $('#slider #sexy-woo-cart').css({'width': '100%'});
    } else { // DESKTOP AND TABLET VIEW
      var percentage = '-40%';
    }

    $('#slider').animate({
      right: percentage
    }, 500, function () {
      $('#slider').fadeOut();
      $('#slider section').fadeOut();
    });

  });

	$('#buttons-2551-sub_row_1-0-0-0-2').unbind().click(function (e) {

		e.preventDefault();

		view_slider($(window).width(), 'About', $(this));

	});

	$('nav #menu-item-3101').unbind().click(function (e) {

		e.preventDefault();

		view_slider($(window).width(), 'Contact', $(this));

	});

	$('#buttons-3235-2-0-0').unbind().click(function (e) {

		e.preventDefault();

		view_slider($(window).width(), 'Gear', $(this));

	});

}


function view_slider(widthOfScreen, text, element) {

	console.log('view_slider', widthOfScreen, text, element);

	$('#slider section').hide();

	var doNothing = false;

	if (widthOfScreen < 768) {
		var percentage = '-100%';
		var widthOfSlider = '100%';
	} else { // DESKTOP AND TABLET VIEW
		var percentage = '-40%';
		var widthOfSlider = '40%';
	}


	if (text == 'About') {
		$('#slider #custom_html-2').show();
	} else if (text == 'Contact') {
		$('#slider .widget_ninja_forms_widget').show();
  } else if (text == 'Gear') {
    $('#slider #text-1013').show();
	} else if (text == 'cart') {
    $('#slider #sexy-woo-cart').show();
  } else if (text == 'Your Next Step'){
	  $('#slider #wpforms-widget-2').show();

    autosize($('.wpforms-field-medium'));
	} else if (text == 'checkout') {

		percentage = '-100%';
		widthOfSlider = '100%';

		$('#slider .woocommerce-mini-cart__total').fadeOut();
		$('#slider a.button.checkout.wc-forward').fadeOut();
		$('#slider #sexy-woo-cart').show();
		if (widthOfScreen < 768) {
			$('#slider #sexy-woo-cart').fadeOut();
		} else {
			$('#slider #sexy-woo-cart').css({'width': '40%', 'float': 'left'});
		}
		$('#slider #sexy-woo-checkout').fadeIn();

	}
	
	$('#slider').show();
	$('#slider section:first-of-type').fadeIn();
	
	
	$('#slider').animate({
		 right: '0%',
		 width: widthOfSlider
	}, 500, function () {
	});

	$("html, body, #slider").animate({ scrollTop: 0 }, "slow");


}