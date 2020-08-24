/*File:~/custom/content/themes/Base/JS/scripts.js*/
try{$(document).ready(function(){
	//possibilida ctrl+v no input do cep
	$("#PostalCode, #DeliveryPostalCode").on("click", function () {
		$(this).select();
	});
	
	//adiciona classe hover categoria
	$(".category-bar .all-category").on('mouseenter', function(){
		$("body").addClass("category-opened");
	});
	$(".category-bar .all-category").on('mouseleave', function(){
		$("body").removeClass("category-opened");
	});
	
	// abre/fecha o menu hamburguer - MOBILE
	$('header .hamburguer > .icon,.category-menu-small .has-children h3,.cms-page-menu h2').on('click', function(){
		$(this).parent().toggleClass('active');
	});
	// abre/fecha as facetas - MOBILE
	$('#showFacets').on('click', function(){
		$(this).toggleClass('active');
		$('#left').toggleClass('active');
		$("body").toggleClass('facets-on');
		if($('body').hasClass('facets-on') == true){
			$("html").css("overflow-y", "hidden");
		}
		else {
			$("html").css("overflow-y", "scroll");
		}
		// manipula overlay
		$('#overlay').toggleClass('hide');
	});
	// manipula overlay
	$('.all-category')
	.on('mouseover', function(){
		$('#overlay').removeClass('hide');
	})
	.on('mouseout', function(){
		$('#overlay').addClass('hide');
	});
	$('header .hamburguer > .icon').on('click', function() {
		$('#overlay').toggleClass('hide');
	});
	
	
	// atualiza o hamburguer quando cliente se loga
	if(browsingContext.Common.ready){
		if (browsingContext.Common.Shopper.IsAuthenticated) {
			$('.hamburguer .autenticated').removeClass('hide');
			$('.hamburguer .unautenticated').addClass('hide');
		} 
	}
	
	// trigger para abrir menu e detalhe do produto flutuantes
	$(window).trigger("scroll").scroll(function () {
		var $windows = $(this),
			$body = $("body");
		if($windows.scrollTop() >= 200){
			$('body:not(.area-profile,.BasketIndexRoute) #header').addClass('flutuante');
		}else{
			$('body:not(.area-profile,.BasketIndexRoute) #header').removeClass('flutuante');
		}
		if($windows.scrollTop() >= 1000) {
			$('.produto-flutuante').removeClass('hide');
		}
		else {
			$('.produto-flutuante').addClass('hide');
		}
	});
	
	$('header .hamburguer>.icon').on('click', function(){
		$('body').toggleClass('menu-opened');
		$(".hamburguer").removeClass('fechado');
	});
	
	$(".close-icon .close-hamburguer").on("click", function(){
		$("body").removeClass("menu-opened");
		$(".hamburguer").removeClass("active");
		$(".hamburguer").addClass('fechado');
	});
	
	$(".wd-profile-login input.email").attr("placeholder", "E-mail");
	$(".wd-profile-login input.password").attr("placeholder", "Senha");
});
}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/custom/content/themes/Base/JS/painel.js*/
try{$(function() {
	$('.wd-profile-panelmenu .col-menu a').on('click', function() {
		var parent = $(this).closest('.wd-profile-panelmenu');
		$(parent).toggleClass('opened');
	});
	
	if((window.location.href).match('cadastro')){
	
		var nome = app.tools.getParameterByName('AddOrSetCustomer.Nome'),
			sobrenome = app.tools.getParameterByName('AddOrSetCustomer.Sobrenome'),
			email = app.tools.getParameterByName('PreRegister.PreEmail');
		
		$('#AddOrSetCustomer-Name').val(nome);
		$('#AddOrSetCustomer-Surname').val(sobrenome);
		$('#AddOrSetCustomer-Email').val(email);
		
	}
});
$(document).ready(function () {
	$("#alterar-senha .account-data-titulo").on("click", function () {
		$("#alterar-senha .conteudo").toggleClass("hide");
	});
});
}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/custom/content/themes/Base/JS/home.js*/
try{
}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
