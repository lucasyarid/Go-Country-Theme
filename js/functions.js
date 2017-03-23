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

$(window).resize(function() {
	detectWindowSize();
});

function fixDiv() {
	var $fixedDivs = $('.scrollFixed');
	if ($(window).scrollTop() > 400) {
		$fixedDivs.addClass('scrollFixedOn');
	}
	else {
		$fixedDivs.removeClass('scrollFixedOn');
	}
}

$(window).scroll(function() {
	if (!isMobile) {
		//fixDiv();
	}
});