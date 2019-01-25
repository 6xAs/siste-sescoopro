$(window).scroll(function() {
	var scrollPosition = $(window).scrollTop();
	if($('#single').height() < scrollPosition + 360){
		$('#midia').addClass('stop-scroll');
	}else{
		$('#midia').removeClass('stop-scroll');
	}
});

function searchView() {
	if ($('#search-button').closest('li').hasClass('open')) {
		$('#search').fadeOut('fast');
		$('#search-button').closest('li').removeClass('open');
	} else {
		$('#exCollapsingNavbar').fadeOut('fast');
		$('#search').fadeIn('fast');
		$('#search-button').closest('li').addClass('open');
		$('#field').focus();
	}
	return false;
}

function searchClose(){
	if ($('#search-button').hasClass('open')) {
		$('#search').fadeOut('fast');
		$('#search-button').removeClass('open');
	} else {
		$('#exCollapsingNavbar').fadeOut('fast');
		$('#search').fadeIn('fast');
		$('#search-button').addClass('open');
		$('#field').focus();
	}
	return false;
}
// When the DOM is ready
$(function() {
 	// Init ScrollMagic
	var controller = new ScrollMagic.Controller();

	// pin the intro
	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, duration: '100%'})
		.setPin('#pin-1', {pushFollowers: true})
		.addTo(controller);

	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, offset: -400, duration: '250' })
		.setTween("#pin-1 .numero span", {scale: 1, opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, offset: 50, duration: '100' })
		.setTween("#pin-1 .votos", {opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, offset: -300, duration: '250' })
		.setTween("#pin-1 .area-infografico", {top: '-60', opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, offset: 150, duration: '30' })
		.setTween("#pin-1 .mascara-voto.check-1", {opacity: '0', ease: Linear.easeNone})
		.addTo(controller);

	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, offset: 300, duration: '30' })
		.setTween("#pin-1 .mascara-voto.check-2", {opacity: '0', ease: Linear.easeNone})
		.addTo(controller);

	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, offset: 450, duration: '30' })
		.setTween("#pin-1 .mascara-voto.check-3", {opacity: '0', ease: Linear.easeNone})
		.addTo(controller);

	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, offset: 600, duration: '100' })
		.setTween("#pin-1 .periodicidade", {opacity: '1', ease: Linear.easeNone})
		.addTo(controller);
		
	var pin = new ScrollMagic.Scene({ triggerElement: '#pin-1', triggerHook: 0, offset: 700, duration: '100' })
		.setTween("#pin-1 .mascara-periodicidade", {opacity: '0', ease: Linear.easeNone})
		.addTo(controller);




	// pin again
	var pin2 = new ScrollMagic.Scene({ triggerElement: '#pin-2', triggerHook: 0, duration: '1000' })
		.setPin('#pin-2', {pushFollowers: true})
		.addTo(controller);

	var pin2 = new ScrollMagic.Scene({ triggerElement: '#pin-2', triggerHook: 0, offset: -200, duration: '250' })
		.setTween("#pin-2 .numero span", {scale: 1, opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin2 = new ScrollMagic.Scene({ triggerElement: '#pin-2', triggerHook: 0, offset: -100, duration: '250' })
		.setTween("#pin-2 .area-infografico", {top: '-60', opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin2 = new ScrollMagic.Scene({ triggerElement: '#pin-2', triggerHook: 0, offset: 200, duration: '100' })
		.setTween("#pin-2 .capacitacao", {opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin2 = new ScrollMagic.Scene({ triggerElement: '#pin-2', triggerHook: 0, offset: 300, duration: '350' })
		.setTween("#pin-2 .mascara-hierarquia", {width: '0', ease: Linear.easeNone})
		.addTo(controller);

	var pin2 = new ScrollMagic.Scene({ triggerElement: '#pin-2', triggerHook: 0, offset: 700, duration: '50' })
		.setTween("#pin-2 .hierarquia", {opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin2 = new ScrollMagic.Scene({ triggerElement: '#pin-2', triggerHook: 0, offset: -150, duration: '200' })
		.setTween("#pin-2 .mascara-capacitacao-livro", {scale: 0.3, opacity: '1', ease: Linear.easeNone})
		.addTo(controller);


	

	// pin again
	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, duration: '1000' })
		.setPin('#pin-3', {pushFollowers: true})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: -200, duration: '250' })
		.setTween("#pin-3 .numero span", {scale: 1, opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: -100, duration: '250' })
		.setTween("#pin-3 .area-infografico", {top: '-60', opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 200, duration: '100' })
		.setTween("#pin-3 .ficaadica", {opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 100, duration: '60' })
		.setTween("#pin-3 .line.line1", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 250, duration: '60' })
		.setTween("#pin-3 .line.line2", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 300, duration: '60' })
		.setTween("#pin-3 .line.line3", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 450, duration: '60' })
		.setTween("#pin-3 .line.line4", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);


	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 550, duration: '130' })
		.setTween("#pin-3 .line.line5", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 160, duration: '90' })
		.setTween("#pin-3 .line.line6", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);


	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 270, duration: '60' })
		.setTween("#pin-3 .line.line7", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 380, duration: '130' })
		.setTween("#pin-3 .line.line8", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);


	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 590, duration: '60' })
		.setTween("#pin-3 .line.line9", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);

	var pin3 = new ScrollMagic.Scene({ triggerElement: '#pin-3', triggerHook: 0, offset: 600, duration: '60' })
		.setTween("#pin-3 .line.line10", {width: 81, opacity: 1, ease: Linear.easeNone})
		.addTo(controller);



	// pin again
	var pin4 = new ScrollMagic.Scene({ triggerElement: '#pin-4', triggerHook: 0, duration: '1000' })
		.setPin('#pin-4', {pushFollowers: true})
		.addTo(controller);

	var pin4 = new ScrollMagic.Scene({ triggerElement: '#pin-4', triggerHook: 0, offset: -200, duration: '250' })
		.setTween("#pin-4 .numero span", {scale: 1, opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin4 = new ScrollMagic.Scene({ triggerElement: '#pin-4', triggerHook: 0, offset: -200, duration: '250' })
		.setTween("#pin-4 .area-infografico", {top: '0', opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin4 = new ScrollMagic.Scene({ triggerElement: '#pin-4', triggerHook: 0, offset: 400, duration: '50' })
		.setTween("#pin-4 .diretores", {opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	var pin4 = new ScrollMagic.Scene({ triggerElement: '#pin-4', triggerHook: 0, offset: 200, duration: '100' })
		.setTween("#pin-4 .executivo", {opacity: '1', ease: Linear.easeNone})
		.addTo(controller);

	searchView(); 
	searchClose();
});
