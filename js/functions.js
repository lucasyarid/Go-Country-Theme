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
	if ($(window).width() > 770) {
		isMobile = false;
	} else {
		isMobile = true;
	}
}
detectWindowSize();

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

function fixDiv() {
	var $fixedDivs = $('.scrollFixed');
	if ($(window).scrollTop() > 400) {
		$fixedDivs.addClass('scrollFixedOn');
	}
	else {
		$fixedDivs.removeClass('scrollFixedOn');
	}
}

$(window).resize(function() {
	detectWindowSize();
});

$(window).scroll(function() {
	if (!isMobile) {
		//fixDiv();
	}
});