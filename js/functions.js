// Display/hide fixed button on mobile
if($('#btnGoToPedido').length){
	$(window).scroll(function(){

		var btnGoToPedido = $('#btnGoToPedido');
		var currentPosition = $(window).scrollTop();
		var sectionPedido = $('#pedido #form');
		var sectionPedidoPosition = sectionPedido.offset().top - sectionPedido.height();

	});
}

var isMobile;
function detectWindowSize() {
	if ($(window).width() > 960) {
		isMobile = false;
	} else {
		isMobile = true;
	}
}
detectWindowSize();

function openMenu() {
	$('#menu-icon').click(function() {
		$('.menu-primary-container').slideToggle();
	});
}
openMenu();

function searchModal() {
	$('#openSearch').click(function() {
		$('#search-modal').fadeIn('200');
		$('.search-modal-input input').focus();
	});
	$('#search-modal, #search-modal-close').click(function() {
		$('#search-modal').fadeOut('200');
	}).children().on('click', function (event) {
    	event.stopPropagation();
	});
}
searchModal();

function scrollStop() {

	var stopPoint = $('#passeios-turisticos-gallery').offset().top -154;
	var scrollPosition = $(document).scrollTop();
	var inverseScroll = stopPoint - scrollPosition + 92;

	if ($(window).scrollTop() > stopPoint) {
		$('#scrollStop').css({'position':'absolute', 'top':inverseScroll});
	}
	else {
		$('#scrollStop').css({'position':'initial'});
	}
}

function fixDiv() {
	var fixedDivs = $('.scrollFixed');
	if ($(window).scrollTop() > 400) {
		fixedDivs.addClass('scrollFixedOn');
		$('.passeios-turisticos-content').addClass('fixFixed');
	}
	else {
		fixedDivs.removeClass('scrollFixedOn');
		$('.passeios-turisticos-content').removeClass('fixFixed');
	}
	scrollStop();
}

$("#scroll-bottom").click(function() {
    $('html, body').animate({
        scrollTop: $("#afterScroll").offset().top-20
    }, 1200);
});

$(window).resize(function() {
	detectWindowSize();
});

$(window).scroll(function() {
	if (!isMobile) {
		fixDiv();
	}
});