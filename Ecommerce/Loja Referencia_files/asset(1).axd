/*File:~/Custom/Content/Widgets/google.analytics/Scripts/wd.google.analytics.js*/
try{// https://developers.google.com/analytics/devguides/collection/analyticsjs/enhanced-ecommerce
(function(i, s, o, g, r, a, m) {
	if (s.getElementById('ez-ga') || window.ga) {
		return false;
	}
	i['GoogleAnalyticsObject'] = r;
	i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments);
		},
		i[r].l = 1 * new Date();
	a = s.createElement(o),
	m = s.getElementsByTagName(o)[0];
	a.async = 1;
	a.src = g;
	a.id = 'ez-ga';
	m.parentNode.insertBefore(a, m);
	i['GaAddedProductsImpression'] = [];
	i['GaTrackers'] = [];
	i['GaTrackerCount'] = 0;

	// debugger;
	a.onerror = function() {
		a.src = '';
		a.src = g;
		a.onerror = function() {};
	};

	i['GaTryInit'] = function() {};
	a.onload = function() {
		// debugger;
		i['EzGaCfg'] = i['EzGaCfg'] || {};
		i['EzGaCfg']['ready'] = true;

		GaTryInit((window.EzGaCfg) || false);
	};

})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ezga');

$(function() {
	var ezGaTracking = null;
	/* valida execução */
	if (window['EzGaReady'] && window['EzGaReady'] === true) {
		return false;
	}

	window['EzGaReady'] = true;

	var $body = $('body'),
		bodyClass = $body.attr('class'),
		EZ_UA_CODE = 'UA-2269208-2',
		retryInitCount = 0;

	/* hack old browsers */
	if (!Object.keys) {
		Object.keys = function(obj) {
			var keys = [],
				k;
			if (typeof obj === 'object') {
				for (k in obj) {
					if (Object.prototype.hasOwnProperty.call(obj, k)) {
						keys.push(k);
					}
				}
			}
			return keys;
		};
	}

	var tryInit = function(AnalyticsConfiguration) {
		if(/(googlebot|google\.com|google\-site\-verification|google\-xrawler|feedfetcher\-google|adsbot\-google|apis\-google|mediapartners\-google|yahoo|bingpreview|bingbot|msnbot|facebook|whatsapp|twitter|pinterest|altavista|alta\-vista|ezbot|nagios|pingdom|woobot|uptimerobot|pagarme|pagosonline|chaordic|intelipost|outlook|performa\.ai)/gi.test(navigator.userAgent)){
			return;
		}

		if (typeof AnalyticsConfiguration != 'object') {
			retryInitCount++;
			if (retryInitCount < 4) {
				setTimeout(tryInit, 600);
			} else {
				return false;
			}
		}

		//console.log('AnalyticsConfiguration', AnalyticsConfiguration);

		var GaCode = AnalyticsConfiguration.UAS || '';
		var GaType = AnalyticsConfiguration.IntegrationType || 1;
		var GaDebug = AnalyticsConfiguration.Debugging || !1;
		var GaEZCode = EZ_UA_CODE; // EZ Analytics

		if (GaCode == '') {
			GaCode = GaEZCode;
		} else {
			GaCode = GaCode + ',' + GaEZCode;
		}

		window['GaDebug'] = GaDebug;

		window.onpageready(function(){
			//GaJsTracker(GaCode);
			AnalyticsJsTracker(GaCode);
		});

	};

	if(browsingContext
		&& browsingContext.Common
		&& browsingContext.Common.ready
		&& browsingContext.Common.WebSite.Type === 'Mobile'
		&& browsingContext.Common.Config.General.Store.LoadAsyncAssets
		&& !window.EzGaCfg.ready)
	{
		// debugger;
		window.GaTryInit = tryInit;
		// mata a execução para garantir que ocorra apenas uma vez
		return;
	}

	tryInit((window.EzGaCfg) || false);

	function AnalyticsJsTracker(GaCodes) {

		var _GaCodes = GaCodes.replace(' ', '').split(',');
		var Codes = [];
		var registeredCodes = [];

		try {
			// debugger;
			if (window.ga && window.ga.getAll) {
				_.each(window.ga.getAll(), function(ua) {
					var _ua = ua.get('trackingId');
					if(_ua) {
						registeredCodes.push(_ua);
					}
				});
			}

			if (window.ezga && window.ezga.getAll) {
				_.each(window.ezga.getAll(), function(ua) {
					var _ua = ua.get('trackingId');
					if(_ua) {
						registeredCodes.push(_ua);
					}
				});
			}
		} catch(er) {
			// console.error(er);
		}

		for (var i = 0; i < _GaCodes.length; i++) {
			if ((_GaCodes[i] || '').substr(0, 2).toUpperCase() === 'UA'
				&& $.inArray(_GaCodes[i], Codes) === -1
				&& $.inArray(_GaCodes[i], registeredCodes) === -1
			) {
				Codes.push(_GaCodes[i]);
			}
		}

		if (!Codes.length) {
			tryInit(window.EzGaCfg);
			return false;
		}

		var isEzUA = function (trackerName) {
			if (!ezga.hasOwnProperty('getByName')) {
				return ezGaTracking === trackerName;
			}

			var tracker = ezga.getByName(trackerName.replace('.',''));
			if(tracker){
				return ( tracker.get('trackingId') == EZ_UA_CODE );
			}

			return false;
		};

		var bodyId = (document.body && document.body.id || '').replace('page-', '');
		//var referer				= ($('[name="http-referer"]').val() || '').replace(cfg.Url, '');
		var referer = '';
		var productsListPages = ['default', 'produtos-secoes', 'produtos-pesquisa', 'produtos', 'carrinho'];

		//console.log('antes dos trackers - Codes', Codes);

		for (var i = 0; i < Codes.length; i++) {
			Async(function(){

				window['GaTrackerCount'] = window['GaTrackerCount'] + 1;
				var trackerName = 'tracker' + window['GaTrackerCount'] + '.';
				var GaCode = Codes[i];

				//console.log('GaCode', GaCode);

				GaTrackers.push(trackerName);

				// cria rastreamento
				var objCreate = {
					'siteSpeedSampleRate':50,
					'allowLinker': true,
					'name': trackerName.substr(0, trackerName.length - 1)
				};
				//if(GaCode == EZ_UA_CODE){
				//	objCreate.sampleRate = 50;
				//}
				if (EzGaCfg.Shopper.IsAuthenticated) {
					// deve ser string conforme documentação : https://developers.google.com/analytics/devguides/collection/analyticsjs/field-reference#user
					objCreate.userId = browsingContext.Common.Customer.CustomerID + '';
				}

				ezga('create', GaCode, 'auto', objCreate);
				if (GaCode == EZ_UA_CODE) {
					ezGaTracking = trackerName;
					ezga(trackerName + 'set', 'allowAdFeatures', false);
					ezga(trackerName + 'set', 'dimension1', EzGaCfg.Config.Store.Name);
					ezga(trackerName + 'set', 'dimension2', browsingContext.Common.Basket.BasketID + "");
					ezga(trackerName + 'set', 'page', 		(location.host || location.hostname ).substring(location.hostname.indexOf('.')+1));
					ezga(trackerName + 'set', 'title', 		(findPageType() || location.pathname || '') );
				}
				EzLog('Tracker ' + (trackerName.length ? trackerName : 'default') + ' criado com código ' + GaCode, trackerName);

				// tracker multiples domains.
				ezga(trackerName + 'require', 'linker');
				//ezga(trackerName + 'linker:autoLink', [cfg.DomainName, 'ssl.'+cfg.DomainName, 'ezcommerce.com.br', 'ssl.ezcommerce.com.br'], false, true);

				// carrega ec.js
				ezga(trackerName + 'require', 'ec');

				// Recursos Gráficos
				ezga(trackerName + 'require', 'displayfeatures');

				// força SSL e envio por beacon
				ezga(trackerName + 'set', 'transport', 'beacon');
				ezga(trackerName + 'set', 'forceSSL', true);

				// define a moeda para BRL
				ezga(trackerName + 'set', '&cu', 'BRL');

				// envia pageview e evento para monitoramento realtime
				ezga(trackerName + 'send', 'pageview');
				EzLog('Pageview enviado!', trackerName);

				///////////////// DETALHE DO PRODUTO
				if (!!~bodyClass.indexOf('context-product') && EzGaCfg.hasOwnProperty('ProductDetail')) {

					if(!isEzUA(trackerName) && GaCode!=EZ_UA_CODE){ // nao trackear visualizacao de produtos para DCG

						var product = EzGaCfg.ProductDetail;

						var objProduct = {
							'id': product.id,
							'name': app.tools.htmlDecode(product.name),
							'category': app.tools.htmlDecode(product.category),
							'brand': app.tools.htmlDecode(product.brand),
							'price': parseFloat(product.price).toFixed(2),
							'list': 'Detalhe do produto ' + app.tools.htmlDecode(product.name)
						};

						ezga(trackerName + 'ec:addProduct', objProduct);
						ezga(trackerName + 'ec:setAction', 'detail');
						ezga(trackerName + 'send', 'event', 'Produto', 'Produto visualizado', 'Detalhes do produto visualizado');

						EzLog('Detalhes do produto ' + product.id + ' enviado.\n  ' + JSON.stringify(objProduct), trackerName);

					}
				}

				///////////////// CARRINHO
				if (!!~bodyClass.indexOf('BasketIndexRoute') && EzGaCfg.hasOwnProperty('Basket')) {
					window.GatrackCart = function(trackerName) {

						if (!$('.wd-checkout-basket').length) {
							return;
						}

						var basketItens = EzGaCfg.Basket;

						if (basketItens.length == 0) {
							setTimeout('window.GatrackCart("' + trackerName + '")', 100);
							return;
						}

						var i = 0,
							strProducts = '';

						for (var c in basketItens) {
							//var cartItem;
							//eval('cartItem = cart.itens.'+item);
							var item = basketItens[c];

							var id = item.id || '',
								name = item.name || '',
								price = item.price || '',
								category = item.category || '',
								brand = item.brand || '',
								quantity = item.quantity || 1;
							var objProduct = {
								'id': id,
								'name': app.tools.htmlDecode(name),
								'category': app.tools.htmlDecode(category),
								'brand': app.tools.htmlDecode(brand),
								'price': price,
								'quantity': quantity,
								'list': 'Carrinho de compras'
							};
							strProducts += JSON.stringify(objProduct) + '\n  ';
							ezga(trackerName + 'ec:addProduct', objProduct);
							i++;

						}

						if (i > 0) {

							EzLog('Carrinho enviado com ' + i + ' produtos.\n  ' + strProducts, trackerName);

							ezga(trackerName + 'ec:setAction', 'add');
							ezga(trackerName + 'send', 'event', 'Carrinho', 'Carrinho visualizado', 'Produtos adicionados e visualizados no carrinho');

						}

					};
					if(!isEzUA(trackerName) && GaCode!=EZ_UA_CODE) {
						window.GatrackCart(trackerName);
					}
				}

			})(); // auto execute async funcion

		} //// fim each Codes(UA's')

		////////////////// CORE CUSTOM

		var $productLine = $('.wd-product-line');
		if ($productLine.length) {
			//console.log('$productLine', $productLine);

			function runProcess() {
				$productLine = $('.wd-product-line');
				addProductsPageImpression();
			}

			if ($('.wd-browsing-grid-list.wd-live-scroll')) {
				$body.on('onLiveScrollComplete', function() {
					runProcess();
				});

			}
			$body.on('onBuildFacetingComplete', function() {
				runProcess();
			});

			var screen_bottom = $(window).scrollTop() + $(window).height() + 40;

			var addProductsPageImpression = function() {

				screen_bottom = $(window).scrollTop() + $(window).height() + 40;

				window.clearTimeout(window.gaImpressionProducts);
				window.gaImpressionProducts = window.setTimeout(function() {

					var addProductImpression = function(li, trackerName) {
						var id = li.data('product-id') || '',
							name = (li.data('name') || ''),
							category = (li.data('category') || ''),
							//brand		= (li.data('brand') || ''),
							position = ($productLine.index(li) + 1);

						var list = findPageType();
						if (id) {
							id = parseInt(id);
						}

						var objImpression = {
							'id': id,
							'name': app.tools.htmlDecode(name),
							'category': app.tools.htmlDecode(category),
							//'brand': app.tools.htmlDecode(brand),
							'list': app.tools.htmlDecode(list),
							'position': position
						};
						// se não tiver pelo menos o id ou name não envia
						if (id || name) {
							ezga(trackerName + 'ec:addImpression', objImpression);
							EzLog(trackerName + 'ec:addImpression', objImpression);
						}

					};

					for (var i = 0; i < GaTrackers.length; i++) {
						var trackerName = GaTrackers[i];

						if(isEzUA(trackerName)) { continue; } // não trackear visualizacao de produtos para UA da DCG

						var trackedProductsCount = 0;
						var className = 'ga-viewed-' + (i + 1);

						$productLine.not('.' + className).each(function() {
							var $el = $(this);

							if ( $el.offset().top < screen_bottom ) {
								// aqui o produto já apareceu
								//console.log(' na view port!', $el);
								$el.addClass(className);
								addProductImpression($el, trackerName);
								trackedProductsCount++;
							}
						});

						if (trackedProductsCount > 0) {
							EzLog('Lista de produtos', 'Produtos visualizados', trackedProductsCount + ' produtos foram visualizados');
							ezga(trackerName + 'send', 'event', 'Lista de produtos', 'Produtos visualizados', trackedProductsCount + ' produtos foram visualizados',{'nonInteraction':!0});
						}

					}

				}, 500);
			};

			$(window).bind('load resize scroll', addProductsPageImpression);

		};

		var $basket = $('.wd-checkout-basket');
		if ($basket.length && EzGaCfg.hasOwnProperty('Basket')) {
			function updateBasketGa() {

				var setProductGa = function(trackerName, product) {
						ezga(trackerName + 'ec:addProduct', {
							'id': product.id,
							'name': app.tools.htmlDecode(product.name),
							'category': app.tools.htmlDecode(product.category),
							'brand': app.tools.htmlDecode(product.brand),
							'price': parseFloat(product.price).toFixed(2),
							'quantity': product.quantity,
							'list': 'Carrinho de compras'
						});
					},
					updateItemQuantityGa = function($item, item) {
						var qty = $item.find('.quantity .js-qty').val();
						if (qty) {
							item.quantity = parseInt(qty);
							for (var i = 0; i < GaTrackers.length; i++) {
								var trackerName = GaTrackers[i];
								if(isEzUA(trackerName)) { continue; }

								setProductGa(trackerName, item);

								ezga(trackerName + 'ec:setAction', 'add');
								ezga(trackerName + 'send', 'event', 'Carrinho', 'Alteração de quantidade', 'Quantidade do produto alterada');

								EzLog('Quantidade do produto alterada', trackerName + 'send Alteração de quantidade');
							}
						}
					},
					removeItemGa = function(item) {
						for (var i = 0; i < GaTrackers.length; i++) {
							var trackerName = GaTrackers[i];
							if(isEzUA(trackerName)) { continue; }

							var index = _.indexOf(EzGaCfg.Basket, item);
							EzGaCfg.Basket[index] = undefined;

							setProductGa(trackerName, item);
							ezga(trackerName + 'ec:setAction', 'remove');
							ezga(trackerName + 'send', 'event', 'Carrinho', 'Exclusão de produtos', 'Produto removido do carrinho');

							EzLog('Produto removido do carrinho', trackerName + 'send Exclusão de produtos');
						}
					},
					clearProductsCart = function(e) {
						for (var i = 0; i < GaTrackers.length; i++) {
							var trackerName = GaTrackers[i];
							if(isEzUA(trackerName)) { continue; }

							_.each(EzGaCfg.Basket, function(item, propertyName) {
								if (item)
									setProductGa(trackerName, item);
							});
							ezga(trackerName + 'ec:setAction', 'remove');
							ezga(trackerName + 'send', 'event', 'Carrinho', 'Exclusão de produtos', 'Todos os produtos foram removidos do carrinho');

							EzLog('Todos os produtos foram removidos do carrinho', trackerName + 'send Exclusão de produtos');
						}
					};

				if (!$('tbody tr.item', $basket).length) {
					clearProductsCart();
					return;
				}
				_.each(EzGaCfg.Basket, function(item, idx) {
					if (item) {
						var $item = $('#basket-item-' + item.basketItemId, $basket);
						if ($item.length) {
							updateItemQuantityGa($item, item);
						} else {
							removeItemGa(item);
						}
					}
				});
			};
			EzGaCfg.Basket.Shipping = {
				locked: false,
				id: null
			};
			//setShippingOptionGa();
			$.subscribe(EzGaCfg.Urls.ParentBaseUrl + 'checkout/basket/changed', function() {
				//console.log('subscribe basket change!!!');
				$basket = $('.wd-checkout-basket');
				updateBasketGa();
				//setShippingOptionGa();
			});
		}

		var $checkout;
		if (EzGaCfg.hasOwnProperty('Checkout') || !!~bodyClass.indexOf('OnePageCheckoutStep') || !!~bodyClass.indexOf('EasyCheckoutStep')) {
			if (!EzGaCfg.hasOwnProperty('Checkout')) {
				EzGaCfg.Checkout = {
					Items: browsingContext.Common.Basket.Items,
					BasketID: browsingContext.Common.Basket.BasketID
				};
			};
			var checkoutHelper = {
				step: {
					set: function(val) {
						return $.cookie('GaCheckoutStep-' + EzGaCfg.Checkout.BasketID, val);
					},
					get: function() {
						return $.cookie('GaCheckoutStep-' + EzGaCfg.Checkout.BasketID);
					}
				},
				addProductsGa: function(trackerName, isEasy) {
					var x = 0;
					for (var i in EzGaCfg.Checkout.Items) {
						var item = EzGaCfg.Checkout.Items[i];
						ezga(trackerName + 'ec:addProduct', {
							'id': item.code,
							'name': app.tools.htmlDecode(item.name),
							'category': app.tools.htmlDecode(item.category),
							'brand': app.tools.htmlDecode(item.brand),
							'price': item.price,
							'quantity': item.quantity,
							'list': 'Checkout'
						});
						x++;
					}
					EzLog(x + ' produtos enviados.', trackerName);
				}
			};

			var easyGaProcess = function() {
				/*
					STEP
					----
					1 - Identificação
					2 - Seta meio de entrega
					3 - Seta meio de pagamento

				*/

				var step = 0,
					hash = handleHash(window.location.hash),
					basket = {
						DeliveryAmount: 0,
						Total: 0
					};
				EzGaCfg.Checkout.SelectedPaymentMethod = {
					ID: null,
					Name: null
				};

				var sendWaitingIdentification = function() {
					for (var i = 0; i < GaTrackers.length; i++) {
						var trackerName = GaTrackers[i];
						if(isEzUA(trackerName)) { continue; }
						ezga(trackerName + 'send', 'event', 'Checkout', '[easy] Aguardando identificação');
						EzLog('[easy] Aguardando identificação', trackerName);
					}
				};

				var sendLogin = function() {
					for (var i = 0; i < GaTrackers.length; i++) {
						var trackerName = GaTrackers[i];
						if(isEzUA(trackerName)) { continue; }
						ezga(trackerName + 'send', 'event', 'Checkout', '[easy] Login realizado');
						EzLog('[easy] Login realizado', trackerName);
					}
				};

				var sendRegister = function() {
					for (var i = 0; i < GaTrackers.length; i++) {
						var trackerName = GaTrackers[i];
						if(isEzUA(trackerName)) { continue; }
						ezga(trackerName + 'send', 'event', 'Checkout', '[easy] Cadastro realizado');
						EzLog('[easy] Cadastro realizado', trackerName);
					}
				};

				var sendShippingOptionGa = function(sendStep) {
					sendStep = sendStep || 2;
					var shippingOption = '';

					if (EzGaCfg.Checkout.SelectedDeliveryOption && EzGaCfg.Checkout.SelectedDeliveryOption.hasOwnProperty('Name')) {
						shippingOption = app.tools.htmlDecode(EzGaCfg.Checkout.SelectedDeliveryOption.Name);
						var SecondStepDetails = {
							'step': sendStep,
							'option': shippingOption
						};

						for (var i = 0; i < GaTrackers.length; i++) {
							var trackerName = GaTrackers[i];
							ezga(trackerName + 'ec:setAction', 'checkout_option', SecondStepDetails);
							ezga(trackerName + 'send', 'event', 'Checkout', '[easy] Frete', 'Frete selecionado');
							EzLog('Etapa ' + sendStep + ' do checkout atualizada. Frete selecionado \n' + JSON.stringify(SecondStepDetails), trackerName);
						}
					}
				};

				var sendPaymentOptionGa = function(sendStep) {
					sendStep = sendStep || 3;
					var paymentGroupSelected = '';

					if (EzGaCfg.Checkout.SelectedPaymentMethod.Name) {
						paymentGroupSelected = app.tools.htmlDecode(EzGaCfg.Checkout.SelectedPaymentMethod.Name);
						var details = {
							'step': sendStep,
							'option': paymentGroupSelected
						};

						for (var i = 0; i < GaTrackers.length; i++) {
							var trackerName = GaTrackers[i];
							ezga(trackerName + 'ec:setAction', 'checkout_option', details);
							ezga(trackerName + 'send', 'event', 'Checkout', '[easy] Pagamento', 'Pagamento selecionado');
							EzLog('Etapa ' + sendStep + ' do checkout atualizada. Pagamento selecionado \n' + JSON.stringify(details), trackerName);
						}
					}
				};

				var sendAction = function(sendStep) {
					sendStep = sendStep || step;
					for (var i = 0; i < GaTrackers.length; i++) {
						var trackerName = GaTrackers[i];

						checkoutHelper.addProductsGa(trackerName);

						ezga(trackerName + 'ec:setAction', 'checkout', {
							'step': sendStep
						});
						ezga(trackerName + 'send', 'event', 'Checkout', '[easy] Step '+sendStep+' definida' );
						EzLog('Etapa ' + sendStep + ' do checkout definida.', trackerName);
					}
				};

				function handleHash(hash) {
					if (hash)
						hash = hash.replace('#', '');
					return hash;
				};

				function checkPaymentStep() {
					if (hash === 'payment') {
						//garante o envio dos steps anteriores
						sendAction(1);
						sendAction(2);

						// seta step 3
						step = 3
						sendAction(step);
						sendPaymentOptionGa(step);
						return true;
					}
					return false;
				};

				function checkSelectedDeliveryOption(sendStep) {
					if (EzGaCfg.Checkout.SelectedDeliveryOption) {
						// seta opção de delivery selecionada
						sendShippingOptionGa(sendStep);
					}
				};


				function setUserID() {
					var userID = EasyCheckout.ModelData.Customer.CustomerID + '';
					ezga('set', 'userId', userID);
				};

				$(window).on('hashchange', function() {
					//console.log('hashchange');
					hash = handleHash(window.location.hash);
					checkPaymentStep();
					for(var i = 0; i < GaTrackers.length; i++){
						var trackerName = GaTrackers[i];
						ezga(trackerName + 'set', 'title', ('page-easycheckout-' + hash ) );
						ezga(trackerName + 'send', 'pageview', '/checkout/easy/'+hash);
					}
				});

				/////////////////////////////////////////  Ações iniciais
				if ( EzGaCfg.Shopper.IsAuthenticated ) {

					// garante o envio do step 1
					sendAction(1);

					// seta step 2 (entrega), pois já está identificado
					step = 2;
					sendAction(step);

					checkSelectedDeliveryOption(step);
					// verifica se pulou por ultimo passo
					checkPaymentStep();

				} else {

					sendWaitingIdentification();

					// nao esta autenticado, aguardando identificacao
					step = 1
					sendAction(step);

					ko.postbox.subscribe('checkout/IsAuthenticated', function() {
						//console.log('subscribe checkout/IsAuthenticated');
						EzGaCfg.Shopper.IsAuthenticated = true;

						// seta step 2, pois já identificou e esta na entrega
						step = 2;
						sendAction(step);
						//checkSelectedDeliveryOption(step);
						// verifica se pulou por ultimo passo
						checkPaymentStep();
						setUserID();
					});

					ko.postbox.subscribe('checkout/signin/done', function() {
						sendLogin();
						setUserID();
					});

					ko.postbox.subscribe('checkout/signup/done', function() {
						sendRegister();
						setUserID();
					});

				}
				/////////////////////////////////////// FIM Ações iniciais

				ko.postbox.subscribe('checkout/setDelivery', function(args) {
					//console.log('args',args);
					var deliveryOptionName = '';
					if (args && args.hasOwnProperty('deliveryOption')) {
						EzGaCfg.Checkout.SelectedDeliveryOption = EzGaCfg.Checkout.SelectedDeliveryOption || {};

						EzGaCfg.Checkout.SelectedDeliveryOption.Name = args.deliveryOption.Name;
						EzGaCfg.Checkout.SelectedDeliveryOption.DeliveryOptionID = args.deliveryOption.ID;
						// atualiza step 2 com o valor do delivery
						if (step > 1)
							checkSelectedDeliveryOption();
					}

				});

				ko.postbox.subscribe('checkout/payment/setType', function(args) {
					//console.log('subscribe checkout/payment/setType args',args);
					if (args && args.hasOwnProperty('paymentMethod')) {
						EzGaCfg.Checkout.SelectedPaymentMethod = {
							ID: args.paymentMethod.ID,
							Name: args.paymentMethod.Name
						};
						if (step == 3) {
							sendPaymentOptionGa();
						}
					}
				});

				ko.postbox.subscribe('checkout/data/update', function(data) {
					//console.log('subscribe checkout/data/update', data);
					if (data.hasOwnProperty('Basket')) {
						basket.DeliveryAmount = data.Basket.DeliveryAmount;
						basket.Total = data.Basket.Total;
					}
				});

				ko.postbox.subscribe('checkout/payment/submit', function(response) {
					//console.log('subscribe checkout/payment/submit response', response);
					if (response.hasOwnProperty('Response')) {
						var res = response;
						response = response.Response;
						if (response.IsValid) {
							var orderNumber = (response.Custom['PlaceOrder.OrderNumber'] !== undefined) ? response.Custom['PlaceOrder.OrderNumber'] : response.Custom['EmptyPlaceOrder.OrderNumber'];
							// monta objeto
							var order = {
								Total: (res.Order.Total || basket.Total || parseFloat(0)).toFixed(2),
								DeliveryAmount: (basket.DeliveryAmount || parseFloat(0)).toFixed(2),
								Items: EzGaCfg.Checkout.Items,
								OrderNumber: orderNumber,
								PaymentMethods: [{
									Title: EzGaCfg.Checkout.SelectedPaymentMethod.Name
								}]
							};
							sendPurchaseGa(order);
						}
					}
				});
			};

			var onepageGaProcess = function() {
				/*
					STEP
					----
					1 - Identificação
					2 - Seta meio de entrega
					3 - Seta meio de pagamento

				*/
				var currentStep = checkoutHelper.step.get();
				//console.log('currentStep',currentStep);

				var sendPrevSteps = function() {
					if (!currentStep)
						return false;
					var count = currentStep;
					//console.log('sendPrevs currentStep',currentStep);
					while (--count) {
						sendAction(count, true);
					};
				};

				var findCurrentStep = function() {
					var stepNumber = 1;
					$('.step', $checkout).each(function(i, $step) {

						if ($($step).hasClass('step-complete')) {
							stepNumber++;
						}
					});

					return stepNumber;
				};

				var subscribeEvents = function() {
					// Escuta evento de selecionar meio de entrega
					$.subscribe('/wd/checkout/deliveryservices/selected', function() {
						//console.log('escutou evento de selecionar deliveryservice!!! currentStep-',currentStep);
						sendShippingOptionGa(currentStep);
					});

					$body.on('change', '.wd-checkout-paymentgroup .payment-method-id', function() {
						//console.log('chenge no .payment-method-id - currentStep-',currentStep);
						sendPaymentOptionGa(currentStep);
					});
				};

				var sendShippingOptionGa = function(step) {
					step = step || 2;
					var shippingOption = '';
					var $deliveryService = $('.wd-checkout-deliveryservices', $checkout),
						$deliveryServiceSelected = $deliveryService.find('.js-delivery-choice input:checked');
					if ($deliveryServiceSelected.length) {
						shippingOption = $deliveryServiceSelected.closest('li').find('.item-name').text();
						EzGaCfg.Checkout.SelectedDeliveryOption = EzGaCfg.Checkout.SelectedDeliveryOption || {};
						EzGaCfg.Checkout.SelectedDeliveryOption.Name = shippingOption;
						var SecondStepDetails = {
							'step': step,
							'option': shippingOption
						};

						for (var i = 0; i < GaTrackers.length; i++) {
							var trackerName = GaTrackers[i];
							ezga(trackerName + 'ec:setAction', 'checkout_option', SecondStepDetails);
							ezga(trackerName + 'send', 'event', 'Checkout', 'Frete', 'Frete selecionado');
							EzLog('Etapa ' + step + ' do checkout atualizada. Frete selecionado \n' + JSON.stringify(SecondStepDetails), trackerName);
						}
					}
				};

				var sendPaymentOptionGa = function(step) {
					step = step || 3;
					var paymentGroupSelected = '';
					var $paymentGroup = $('.wd-checkout-paymentgroup', $checkout),
						$paymentGroupSelected = $paymentGroup.find('input.payment-method-id:checked');
					if ($paymentGroupSelected.length) {
						paymentGroupSelected = $paymentGroupSelected.closest('label').find('img').attr('alt');
						var details = {
							'step': step,
							'option': paymentGroupSelected
						};

						for (var i = 0; i < GaTrackers.length; i++) {
							var trackerName = GaTrackers[i];
							ezga(trackerName + 'ec:setAction', 'checkout_option', details);
							ezga(trackerName + 'send', 'event', 'Checkout', 'Pagamento', 'Pagamento selecionado');
							EzLog('Etapa ' + step + ' do checkout atualizada. Pagamento selecionado \n' + JSON.stringify(details), trackerName);
						}
					}
				};

				var sendAction = function(step, isPrevStep) {

					step = step || currentStep;
					for (var i = 0; i < GaTrackers.length; i++) {
						var trackerName = GaTrackers[i];

						checkoutHelper.addProductsGa(trackerName);

						ezga(trackerName + 'ec:setAction', 'checkout', {
							'step': step
						});
						ezga(trackerName + 'send', 'event', 'Checkout', 'Login', {
							useBeacon: true
						});
						EzLog('Etapa ' + step + ' do checkout definida.', trackerName);

					}

					if (EzGaCfg.Shopper.IsAuthenticated) {
						if (!EzGaCfg.Checkout.SelectedDeliveryOption)
							sendShippingOptionGa(step);

						sendPaymentOptionGa(step);
					}

				};

				var checkStepState = function() {
					if (currentStep < 3) {
						var $nextStep = $('.step.step-' + (currentStep + 1), $checkout);
						//console.log('$nextStep', $nextStep);
						if ($nextStep.length && !$nextStep.hasClass('step-disabled')) {
							//console.log('entrou increment checkStepState');
							currentStep++;
							// recursivo
							checkStepState();
						}

					}
				};

				if (currentStep) {
					var oldStep = currentStep = parseInt(currentStep);
					if (!EzGaCfg.Shopper.IsAuthenticated)
						currentStep = 1;
					// verifica se mudou a step ou o cliente somente atualizou a página
					checkStepState();
					//console.log('pós checkStepState oldStep=',oldStep,' currentStep=',currentStep, ' diferença=',(currentStep - oldStep));
					// se a diferença entre a entre a etapa atual e a etapa anterior for maior que 1, envia ações anteriores
					if ((currentStep - oldStep) > 1)
						sendPrevSteps();
				} else {
					// se currentStep for nulo

					// procura currentStep
					currentStep = findCurrentStep();
					// se currentStep for maior que 1
					if (currentStep > 1) {
						// envia ação de etapas anteriores não setadas
						sendPrevSteps();
					}
				}

				// se o elemento de classe 'step-'+currentStep +1 existir lança evento
				var $currentStep = $('.step.step-' + currentStep);
				if ($currentStep.length) {
					sendAction();
					if (currentStep <= 3) {
						//console.log('setou cookie currentStep!!!!!', currentStep);
						checkoutHelper.step.set(currentStep);
					}
				}

				// escuta eventos de setar frete e setar meio de pagamento
				subscribeEvents();
			};
			/*
			TIPOS DE CHECKOUT - WIDGETS
			-------------------------
			Checkout normal =
			Checkout One Page = wd-checkout-onepage
			EasyCheckout = wd-easy-checkout

			*/
			var retryCheckoutProcessCount = 0;
			var tryRunProcess = function() {
				var $onePage = $('.wd-checkout-onepage'),
					$easy = $('.wd-easy-checkout');
				if (!!~bodyClass.indexOf('OnePageCheckoutStep')) {
					$checkout = $('.wd-checkout-onepage');
					onepageGaProcess();
				} else if (!!~bodyClass.indexOf('EasyCheckoutStep')) {
					$checkout = $('.wd-easy-checkout');
					easyGaProcess();
				} else {
					retryCheckoutProcessCount++;
					if (retryCheckoutProcessCount < 6) {
						setTimeout(tryRunProcess, 550);
					}
				}
			};

			tryRunProcess();

		};

		var sendPurchaseGa = function(order, isEasy) {
			function addProductsGa(trackerName) {
				var x = 0;
				for (var i in order.Items) {
					var item = order.Items[i];
					ezga(trackerName + 'ec:addProduct', {
						'id': item.code,
						'name': app.tools.htmlDecode(item.name),
						'category': app.tools.htmlDecode(item.category),
						'brand': app.tools.htmlDecode(item.brand),
						'price': item.price,
						'quantity': item.quantity
					});
					x++;
				}
				EzLog(x + ' produtos enviados.', trackerName);
			}

			// envia a transação na finalização da compra
			var orderAffiliate = (EzGaCfg.Config.Store.Name || ''),
				orderTotal = (order.Total || parseFloat(0).toFixed(2)),
				shippingAmount = (order.DeliveryAmount || parseFloat(0).toFixed(2)),
				orderId = order.OrderNumber || '';

			var purchase = {
				affiliation: orderAffiliate,
				id: orderId,
				revenue: orderTotal,
				shipping: shippingAmount
			};

			if (order.PaymentMethods.length) {
				purchase.option = order.PaymentMethods[0].Title;
			}

			for (var i = 0; i < GaTrackers.length; i++) {
				var trackerName = GaTrackers[i];

				addProductsGa(trackerName);

				ezga(trackerName + 'ec:setAction', 'purchase', purchase);
				var easyPrefix = isEasy ? '[easy] ' : '';
				ezga(trackerName + 'send', 'event', 'Checkout', easyPrefix + 'Pedido', 'Pedido realizado com sucesso');

				//console.log('Order', order);
				EzLog('Dados do pedido ' + orderId + ' enviados.', trackerName);
			}

		};

		// confirmação de compra checkout onePage
		if (EzGaCfg.hasOwnProperty('Order') && (bodyClass.indexOf('EasyCheckoutReceiptStep') != -1 || bodyClass.indexOf('OneStepCheckoutReceiptStep') != -1 || bodyClass.indexOf('DefaultCheckoutReceiptStep ') != -1)) {
			if (EzGaCfg.Order.OrderNumber)
				sendPurchaseGa(EzGaCfg.Order);
		}

		window['ga'] = ezga;

		////////////////// FIM CORE CUSTOM

	};

	function findPageType() {
		var pageType = 'Outros';

		if (!!~bodyClass.indexOf('HomeRoute')) {
			pageType = "Home";
		}
		if (!!~bodyClass.indexOf('context-search')) {
			pageType = "Página de Pesquisa";
		}
		if (!!~bodyClass.indexOf('context-product')) {
			pageType = "Detalhe de produto";
		}
		if (!!~bodyClass.indexOf('BasketIndexRoute')) {
			pageType = "Carrinho de compras";
		}
		if (!!~bodyClass.indexOf('OneStepCheckoutReceiptStep')) {
			pageType = "Página de Confirmação de Compra";
		}
		return pageType;
	};

	function EzLog() { return;
		if (window['GaDebug'] && console) {
			console.log('\n%cEZ Commerce%c - %cG%co%co%cg%cl%ce%c Analytics %c[Debug]\n\n',
				'color:#060;font-weight:bold;font-size:13px', // EZ Commerce
				'color:#060;font-weight:bold;font-size:13px', // -
				'color:#0266C8;font-weight:bold;font-size:13px', // G
				'color:#F90101;font-weight:bold;font-size:13px', // o
				'color:#F2B50F;font-weight:bold;font-size:13px', // o
				'color:#0266C8;font-weight:bold;font-size:13px', // g
				'color:#00933B;font-weight:bold;font-size:13px', // l
				'color:#F90101;font-weight:bold;font-size:13px', // e
				'color:#000;font-weight:bold;font-size:13px', // Analytics
				'color:#AAA;font-weight:bold;font-size:13px', // [Debug]
				(arguments[0] || '') + '\n' +
				'  Tracker ' + (arguments[1] ? arguments[1] : 'default') + '\n\n'
			);
		}
	};

});

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/impulse.meta/Scripts/wd.impulse.meta.js*/
try{(function($, window, document, undefined) {
	var userSent = false;

	function chaordicSafeInitialize() {
		if (!window.chaordic || !window.chaordic.initialize) {
			return;
		}

		window.chaordic.initialize();
	}

	var metaBinder = {
		checkout: function() {
			if (!window.EasyCheckout) {
				return;
			}

			// envia customer
			if (!EasyCheckout.ModelData.Customer.IsAuthenticated) {
				ko.postbox.subscribe('checkout/data/update', function() {
					if (!EasyCheckout.ModelData.Customer.IsAuthenticated || userSent) {
						return;
					}

					var checkoutData = EasyCheckout.ModelData;

					var birthDate = '';

					if (checkoutData.CustomerData.BirthDateExtended) {
						birthDate = checkoutData.CustomerData.BirthDateExtended.split('-').reverse().join('-');
					}

					chaordic_meta.user = {
						id: checkoutData.Customer.CustomerID + '',
						name: checkoutData.Customer.Name + ' ' + checkoutData.Customer.SurName,
						email: checkoutData.Customer.Email,
						language: 'pt-BR',
						allow_mail_marketing: true,
						birthday: birthDate,
						gender: checkoutData.CustomerData.Gender,
						identifications: {
							cpf: checkoutData.CustomerData.Cpf
						}
					};

					if (checkoutData.Customer.CustomerType === 'Company') {
						chaordic_meta.user.identifications = {
							cnpj: checkoutData.CustomerData.Cnpj
						};
					}

					userSent = true;
					chaordicSafeInitialize();
				});
			}

			// envia pedido
			ko.postbox.subscribe('checkout/payment/submit', function(response) {
				if (response.hasOwnProperty('Response')) {
					response = response.Response;
					if (response.IsValid) {
						var orderNumber = getContextualProperty(response.Custom);

						if (!orderNumber) {
							return;
						}

						if(chaordic_meta) {
							chaordic_meta.id = orderNumber;
							chaordic_meta.page = 'transaction';
							chaordic_meta.items = _.map(EasyCheckout.ModelData.Basket.Items, mapBasketItems)
							chaordicSafeInitialize();
						}
					}
				}
			});
		},
		cart: function() {
			function updateBasket() {
				chaordic.push(['updateCart', {
					id: browsingContext.Common.Basket.BasketID + '',
					items: _.map(browsingContext.Common.Basket.Items, mapBasketItems)
				}]);
			}

			// checkout_basket
			$.subscribe('/wd/browsing/context/ready', updateBasket);
			// mobile e checkout_basket_v2
			$.subscribe('/wd/browsing/context/common/basket/updated', updateBasket);
		},
		product: function() {
			if (!browsingContext.Page.Product.ProductID) {
				console.warn('browsingContext ProductID não definido');
				return;
			}

			var pid = browsingContext.Page.Product.ProductID;

			function updateProductSku(sku) {
				if (!sku) {
					return;
				}

				if (chaordic_meta) {
					if (browsingContext.Common.Config.Platform.LinxImpulseByGroup.ProductIdentifier === 'SKU') {
						if (sku.sku) {
							chaordic_meta.sku = sku.sku;
						}
					} else {
						if (sku.productID) {
							chaordic_meta.sku = (sku.productID + '');
						}
					}
				}

				chaordicSafeInitialize();
			}

			$.subscribe('/wd/product/variation/changed/' + pid, function(e, args) {
				var $wdVariation = args.widget || {};
				var variationContent = args.variationContent || {};
				var sku = variationContent.sku;

				if (sku) {
					updateProductSku(sku);
					return;
				}

				var $firstSku = null;
				if ($wdVariation.$productVariations) {
					var hierarchy = variationContent.hierarchy;
					var $firstSku = $wdVariation.$productVariations.find('[id*="' + hierarchy + '"]');
				}

				if ($firstSku && window.variants && window.variants.length) {
					var sku = $firstSku.find('.sku').val();
					var skuObj = _(window.variants).find(function(v) {
						return v.sku === sku;
					});

					updateProductSku(skuObj ? skuObj : null);
				}
			});
		}
	};

	function mapBasketItems(i) {
		return {
			pid: getPID(i),
			sku: getSkuID(i),
			price: i.RetailPrice,
			quantity: i.Quantity
		}
	}

	function getPID(i) {
		if (browsingContext.Common.Config.Platform.LinxImpulseByGroup.ProductIdentifier === 'SKU') {
			return i.Product.SKU;
		}

		return i.ProductID + '';
	}

	function getSkuID(i) {
		if (browsingContext.Common.Config.Platform.LinxImpulseByGroup.ProductIdentifier === 'SKU') {
			return i.SKU;
		}

		return i.SkuID + '';
	}

	function getContextualProperty(obj, prop) {
		prop = prop || 'OrderNumber';
		return (obj['PlaceOrder.' + prop] ||
			obj['MultiplePlaceOrder.' + prop] ||
			obj['EmptyPlaceOrder.' + prop]
		);
	}

	function trySendUser() {
		var context = browsingContext;

		if (context && context.Common && context.Common.Shopper && context.Common.Shopper.IsAuthenticated) {
			var customer = context.Common.Customer || {};

			var birthDate = '';

			if (customer.BirthDate) {
				birthDate = customer.BirthDate.split('T')[0];
			}

			chaordic_meta.user = {
				id: customer.CustomerID + '',
				name: customer.Name + ' ' + customer.Surname,
				email: customer.Email,
				language: 'pt-BR',
				allow_mail_marketing: true,
				birthday: birthDate,
				gender: customer.Gender,
				identifications: {
					cpf: customer.Cpf
				}
			};

			if (customer.CustomerType === 'Company') {
				chaordic_meta.user.identifications = {
					cnpj: customer.Cnpj
				};
			}

			userSent = true;
			chaordicSafeInitialize();
		}
	}

	function subscribeToEvents() {
		var context = browsingContext;

		$.subscribe('basket/add', function(e, obj) {
			if (obj.params && obj.params && obj.params['Products[0].ProductID'] && obj.params['Products[0].SkuID']) {
				var productInfo = {
					id: '' + obj.params['Products[0].ProductID'],
					sku: '' + obj.params['Products[0].SkuID']
				};

				if (chaordic && chaordic.hasOwnProperty('sendProductInteractionEvent')) {
					chaordic.sendProductInteractionEvent(productInfo);
				}
			}
		});

		$.subscribe('wd/MarketingNewsletter/Submit/BeforeSend', function(e, args) {
			var form = args.form;

			if (!form) {
				return;
			}

			var formObj = {
				email: form.find('[name="Email"]').val()
			};

			var nameValue = form.find('[name="Name"]').val();

			if (nameValue) {
				formObj.name = nameValue;
			}

			chaordic.push(['updateUserEmail', formObj]);
		});

		$.subscribe('/wd/impulse/meta/update/search', function(e, args) {
			var searchId = args.searchId;
			if (!searchId) {
				return;
			}

			chaordic_meta.searchId = searchId;
			chaordic_meta.url = window.location.href.split('#')[0];
			chaordicSafeInitialize();
		});

		// atualiza user quando o carregamento dos assets é async(mobile)
		if (context && context.Common && context.Common.Config.General.Store.LoadAsyncAssets) {
			if (context.Common.ready) {
				trySendUser();
			} else {
				$(document).on('syncloader.phase.1', function() {
					trySendUser();
				});
			}
		}
	}

	function init() {
		if (!window.chaordic_meta ||
			browsingContext.Common.Config.Platform.LinxImpulseByGroup.MetaVersion !== 'Legacy'
		) {
			return;
		}

		if (chaordic_meta.page && metaBinder[chaordic_meta.page]) {
			metaBinder[chaordic_meta.page]();
		}

		subscribeToEvents();
	}

	$(document).ready(init);
}(jQuery, window, document));

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/browsing.categorymenu/Scripts/wd.browsing.categorymenu.js*/
try{
}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/profile.login/Scripts/wd.profile.login.js*/
try{(function($, window, document, undefined) {

	$.widget('wd.ProfileLogin', $.wd.widget, {

		_base: '',
		_create: function() {

			var widget = this,
				$w = this.getContext(),
				cb = function() {
					if (location.href.indexOf('recuperarsenha') != -1)
						location.href = '/';
					else
						location.reload();
				};

			widget.subscribe('/login/cb', function(e, fn) {
				if (fn) {
					cb = fn;
				}
			});

			widget.subscribe('/login/showlogin', function(e, args) {
				if (args.hasOwnProperty('cb')) {
					cb = args.cb;
				}
				widget._showModalLogin();
			});

			var validateRules = $.extend(widget._buildKeyRules('Login.'), {
				'Login.Password': {
					required: true
				}
			});

			widget.validate($w('form.js-login').first(), {
				errorPlacement: widget.options.validate.errorFlyout,
				rules: validateRules,
				messages: {
					'Login.Email': {
						email: 'Informe um e-mail válido.'
					}
				},
				submitHandler: function(form) {
					widget._submit(form, cb);
				}
			});

			$w('.js-login-recoverpassword').click(function(e) {
				e.preventDefault();
				widget.modal({
					element: $('.wd-profile-login-recover-password:first'),
					'class': 'wd-profile-login',
					className: 'wd-profile-login-modal',
					onComplete: function($modal) {
						var $form = $('form.recover-form:visible', $modal);
						$w('.js-result').empty();

						var rules = widget._buildKeyRules(null, true);
						widget.validate($form, {
							rules: rules,
							submitHandler: function(form) {
								widget._submit(form);
							}
						});
					}
				});

			});
			widget._base = $w('input[name="widget-base-url"]').val();
			//console.log(this);
			$w('.profile-login-modalText').bind('click', function() {
				widget._showModalLogin();
			});

		},
		_buildKeyRules: function(prefix, force) {
			prefix = prefix || '';
			var rules = {};

			if (browsingContext.Common.Config.Profile.Account.IsDocumentNumberLoginEnabled ||
				force) {
				rules[prefix + 'Key'] = {
					required: true,
				}
			} else {
				rules[prefix + 'Email'] = {
					required: true,
					email: true
				}
			}

			return rules;
		},
		_showModalLogin: function() {

			var widget = this,
				$w = this.getContext();
			if ($w('.profile-login-modal').length) {
				widget.modal({
					element: $w('.profile-login-modal'),
					'class': 'wd-profile-login',
					className: 'wd-profile-login-modal'
				});
			}
			widget.validate($('.profile-login-modal.modal form'), {
				errorPlacement: widget.options.validate.errorFlyout,
				rules: {
					'Login.Email': {
						required: true,
						email: true
					},
					'Login.Password': {
						required: true
					}
				},
				messages: {
					'Login.Email': {
						email: 'Informe um e-mail válido.'
					}
				}
			});
			$('.profile-login-modal.modal .js-login-recoverpassword').click(function(e) {
				e.preventDefault();
				widget.modal({
					element: '.wd-profile-login-recover-password',
					className: 'wd-profile-login-recover-password-modal',
					onComplete: function($modal) {
						var $form = $('form.recover-form:visible', $modal);
						$w('.js-result').empty();
						widget.validate($form, {
							rules: {
								Key: {
									required: true,
									email: true
								}
							},
							submitHandler: function(form) {
								widget._submit(form);
							}

						});
					}
				});

			});
			$('.profile-login-modal.modal form').bind('submit', function() {
				var $form = $(this);

				if ($form.data('locked') == true)
					return false;

				$form.data('locked', true);
				$('.login-loading', $form).addClass('show');
				$.ajax({
					url: widget._base + 'Login.json',
					type: 'post',
					data: $(':input', $form).serialize(),
					success: function(response) {
						if (response.Response.IsValid) {
							$.publish('/login/success', {});
							$.colorbox.close();
						} else {
							$.publish('/login/error', {});
							$('.login-error-placeholder', $form).text(response.Response.Errors[0].ErrorMessage);
						}
					},
					error: function() {},
					complete: function() {
						$('.login-loading', $form).removeClass('show');
						$form.data('locked', false);
					}
				});

				return false;
			});

		},
		_executeRecaptcha: function($form, _submit, mustRetry) {
			var widget = this;
			var isRecoverPassword = $form.attr('action').indexOf('Login/RecoverPassword') > 0;

			var dispatchError = function(errorMsg) {
				widget.publish('login/recaptcha/errors', {
					error: errorMsg
				});
			};

			var showRecaptchaErrors = function() {
				widget.alert('O teste de recaptcha falhou, por favor tente novamente.', 'error', {
					'class': 'wd-profile-login-recover-password-response',
					className: 'wd-profile-login-recover-password-response-modal'
				});
			}

			var setRecaptchaValue = function(key) {
				var inputName = 'ReCaptchaToken';
				if (!isRecoverPassword) {
					inputName = 'Login.' + inputName;
				}

				var $currentInput = $form.find('[name="' + inputName + '"]');

				if ($currentInput.length) {
					$currentInput.val(key);
					return;
				}

				var rctInput = document.createElement('input');
				rctInput.type = 'hidden';
				rctInput.value = key;
				rctInput.name = inputName;

				$form.append(rctInput);
			};

			if (app.recaptcha.isActive === false) {
				_submit();
				return false;
			}

			var recaptchaAction = (isRecoverPassword) ? 'password_recovery' : 'login';
			app.recaptcha.execute(recaptchaAction)
				.then(function(key) {
					if (!key) {
						if (mustRetry === true) {
							widget._executeRecaptcha($form, _submit, false);
						} else {
							showRecaptchaErrors();
							dispatchError('Chave do captcha vazia - key: ' + key);
						}

						return;
					}

					setRecaptchaValue(key);

					setTimeout(function() {
						_submit();
					}, 200);
				})
				.fail(function() {
					showRecaptchaErrors();
				});
		},
		_submit: function(form, cb) {
			var widget = this,
				$form = $(form),
				$button = $('button[type="submit"]', $form);
			$load = $form.find('.load');

			$load.css('display', 'inline-block');
			$button.attr('disabled', true);

			//cb = cb || function(){};
			//console.log($form.serialize());
			var ajaxSubmit = function() {
				widget.ajax({
					url: $form.attr('action'),
					type: $form.attr('method'),
					data: $form.serialize(),
					dataType: 'json',
					success: function(data) {
						var url; // = data.Model.Url;
						if (data.hasOwnProperty('Model') && data.Model.hasOwnProperty('Url')) {
							url = data.Model.Url
						}
						var redirectToUrl = $form.find('[name="redirectToUrl"]').val();
						$button.removeAttr('disabled');
						if (data.Response !== undefined)
							data = data.Response;
						if (data.IsValid) {
							function processSuccessResponse() {
								if (url && redirectToUrl == "true") {
									location.href = url;
									return true;
								}

								if (cb) {
									//widget.publish('/login/success', {});
									cb();
									$.colorbox.close();
								} else {
									widget._handleSuccess(data);
								}
							}

							var isPinModalOpened = $('.wd-profile-login-pin-content-modal').length > 0;
							if (isPinModalOpened) {
								widget._showPinValidationSuccess(processSuccessResponse);
							} else {
								processSuccessResponse();
							}
						} else {
							widget._handleError(data);
							$load.hide();
						}
					},
					error: function(e) {
						$button.removeAttr('disabled');
						$load.hide();
						widget.alert('Ocorreu um erro, contate o suporte', 'error', {
							'class': 'wd-profile-login-recover-password-response',
							className: 'wd-profile-login-recover-password-response-modal'
						});
					}
				});
			};

			// || !browsingContext.Common.Config.General.Application.UseReCaptchaInLoginPage
			if (!app.recaptcha || !app.recaptcha.isActive) {
				ajaxSubmit();
				return false;
			}

			widget._executeRecaptcha($form, ajaxSubmit, true);

			return false;
		},
		_handleSuccess: function(response) {
			var widget = this,
				$w = this.getContext();
			widget.alert(response.Success || 'O e-mail com as instruções para redefinir a senha foi enviado com sucesso!', 'success', {
				'class': 'wd-profile-login-recover-password-response',
				className: 'wd-profile-login-recover-password-response-modal'
			});
		},
		_handleError: function(response) {
			var inputErrors = response.InputErrors,
				widget = this,
				$w = this.getContext(),
				$err = $('<div class="alert alert-error"><div class="message"></div></div>'),
				isPinRequired = (response.Custom) && ("True" === response.Custom["MustInformPin"]);
			if (inputErrors) {
				for (var i = 0, len = inputErrors.length; i < len; i++) {

					var errors = inputErrors[i].Errors;

					for (var k = 0, errorsLen = errors.length; k < errorsLen; k++) {
						$err.append('<div class="input-wrapper"><span>' + errors[k] + '</span></div>');
					}
				}
			} else if (response.hasOwnProperty('Errors') && response.Errors.length > 0) {
				var errors = response.Errors;
				//console.log(errors);
				for (var i = 0, len = errors.length; i < len; i++) {
					$err.append('<div class="input-wrapper"><span>' + errors[i].ErrorMessage + '</span></div>');
				}
			}
			$.publish('/profile/login/failed', {
				errors: errors,
				inputErrors: inputErrors
			});
			$(document).trigger('wdProfileLogin_failed');

			if (isPinRequired) {
				widget._showPinModal(response);
			} else {
				app.modal({
					html: $err.html(),
					width: "300px",
					height: "130px",
					'class': 'wd-profile-login-recover-password-response',
					className: 'wd-profile-login-recover-password-response-modal'
				});
			}
		},
		_showPinModal: function(response) {
			var 
				widget = this,
				$w = widget.getContext(),
				isModalOpened = $('.wd-profile-login-pin-content-modal').length > 0;

			if (isModalOpened) {
				// Se a modal de PIN já está aberta, deve apenas adicionar os erros.
				var $currentModal = $('.wd-profile-login-pin-content-modal');
				$('.error-label', $currentModal)
					.html(response.Errors[0].ErrorMessage);
				$('.input-wrapper', $currentModal)
					.addClass('has-error');
				$('input,select,button', $currentModal)
					.removeAttr('readonly')
					.removeClass('readonly');
				$('button,a', $currentModal)
					.removeAttr('disabled');
				return true;
			}

			function renderPinModal(pinContent) {
				// Limpa o valor anterior.
				$w('input[name="Pin"],input[name="Login.Pin"]')
					.val('');

				app.modal({
					html: pinContent,
					width: "300px",
					height: "130px",
					'class': 'wd-profile-login-pin-content',
					className: 'wd-profile-login-pin-content-modal'
				});

				var 
					$pinContentModal = $('.wd-profile-login-pin-content-modal')
					$inputPin = $('input[name="Pin"]', $pinContentModal),
					$submitButton = $('button[name="submit-pin-btn"]', $pinContentModal),
					$requestNewPinLabel = $('.request-new-pin-label', $pinContentModal);

				$('input,select,button', $pinContentModal)
					.removeClass('readonly')
					.removeAttr('readonly');

				$submitButton.on('click', function(evt) {
					return widget._submitPin(widget, evt);
				});

				$inputPin.on('keypress paste', function() {
					// Tão-logo o usuário digita alguma coisa, deve ocultar o erro.
					$inputPin
						.closest('.input-wrapper')
						.removeClass('has-error');

					// Esconde também a mensagem de que um novo código foi enviado por e-mail.
					$requestNewPinLabel.hide();
				});

				$inputPin.on('keypress', function(e) {
					if (e.which == 13) { // enter
						e.preventDefault();
						$submitButton.focus();
						// Simula um submit.
						widget._submitPin(widget, e);
					}
				});

				$('#requestNewPinAction', $pinContentModal).on('click', function(evt) {
					widget._requestNewPin(evt);
					return false;
				});

				// Coloca o foco no input.
				$inputPin.focus();
				return true;
			}

			function createPinInputInLoginForm($w) {
				var 
					$formLogin = $w("form.js-login"),
					alreadyHasPinInput = $('input[name="Login.Pin"]', $formLogin).length > 0;

				if (!alreadyHasPinInput) {
					$formLogin
						.append('<input type="hidden" name="Login.Pin" value="" />');
				}

				return true;
			}
			
			return $.ajax({
				url: browsingContext.Common.Urls.BaseUrl + 'Widget/profile_login',
				type: 'GET',
				data: {
					WidgetTitle: 'Informe o código enviado para o seu e-mail',
					Template: 'wd.profile.login.pin.template',
					TextButtonSubmit: "Validar",
					WidgetBox: true
				}
			}).done(function(resp) {
				renderPinModal(resp);
				createPinInputInLoginForm($w);
			}).fail(function(err) {
				console.log(err);
			});
		},
		_submitPin: function(widget, evt) {
			var 
				$w = widget.getContext(),
				$form = $w('form.js-login').first(),
				$modal = $(evt.target).closest('.wd-profile-login-pin-content-modal'),
				$pinInput = $('input[name="Pin"]', $modal),
				pin = $pinInput.val(),
				$errorLabel = $('.error-label', $modal);

			if (!pin) {
				$errorLabel.html('Favor informar o código.');
				$pinInput
					.closest('.input-wrapper')
					.addClass('has-error');
				
				$pinInput.focus();
				return false;
			}

			$('input[name="Login.Pin"]', $form)
				.val(pin);

			$errorLabel.html('');
			$('.input-wrapper', $modal)
				.removeClass('has-error');

			$('input,select,button', $modal)
				.attr('readonly', true)
				.addClass('readonly');
			$('button,a', $modal)
				.attr('disabled', true);

			$form.trigger('submit');
			return true;
		},
		_showPinValidationSuccess: function(onCloseCallback) {
			var 
				$modal = $('.wd-profile-login-pin-content-modal'),
				$closeTrigger = $('.close', $modal);

			$('input,select,button', $modal)
				.removeAttr('readonly')
				.removeClass('readonly');
			$('button,a', $modal)
				.removeAttr('disabled');

			$('.submit-line,.login-pin-content', $modal).hide();
			$('.pin-success-content', $modal).show();

			if (onCloseCallback) {
				// Ao clicar no "x".
				$closeTrigger.on('click', onCloseCallback);

				// Ao clicar fora da modal.
				$('.themodal-overlay.wd-profile-login-pin-content-modal').on('click', onCloseCallback);
			}

			$('.close-modal-button').on('click', function() {
				$closeTrigger.trigger('click');
			});

			return true;
		},
		_requestNewPin: function(evt) {
			var $modal = $('.wd-profile-login-pin-content-modal'),
				$requestNewPinLabel = $('.request-new-pin-label', $modal),
				$trigger = $(evt.target),
				isTriggerDisabled = $trigger.hasClass('disabled'),
				$inputs = $('input,button,select', $modal);

			if (isTriggerDisabled) {
				return false;
			}

			$inputs
				.addClass('readonly')
				.attr('disabled', true)
				.attr('readonly', true);

			$trigger
				.attr('disabled', true)
				.attr('readonly', true)
				.addClass('disabled')
				.addClass('readonly')
				.blur(); // Tira o foco do link/botão.


			var defaultErrorMessage = 
				'Não foi possível solicitar um novo código de acesso. Por favor, tente novamente mais tarde.';

			return $.ajax({
				url: browsingContext.Common.Urls.BaseUrl + 'painel-do-cliente/codigo-acesso/novo',
				type: 'POST'
			}).done(function(resp) {
				if (!resp) {
					$requestNewPinLabel.html('').hide();

					// Mostra a mensagem como erro.
					$('.error-label', $modal).html(defaultErrorMessage);
					$('.input-wrapper', $modal).addClass('has-error');

					return false;
				}

				if (resp.IsValid) {
					// Mostra a mensagem como sucesso.
					$requestNewPinLabel
						.html(resp.Message)
						.show();
				} else {
					$requestNewPinLabel
						.html('')
						.hide();

					// Mostra a mensagem como erro.
					var errorMessage = (resp.Message) ? resp.Message : defaultErrorMessage;
					$('.error-label', $modal).html(errorMessage);
					$('.input-wrapper', $modal).addClass('has-error');

					if (resp.MustAuthenticateAgain) {
						$('button[name="submit-pin-btn"], .input-wrapper > .input-group', $modal)
							.hide();
					}
				}
			}).fail(function() {
				// Erro genérico: provavelmente rede ou instabilidade de servidor.
				$requestNewPinLabel.html(defaultErrorMessage);
			}).always(function(resp) {
				var mustAuthenticateAgain = (resp) && (resp.MustAuthenticateAgain);

				$inputs
					.removeClass('readonly')
					.removeAttr('disabled')
					.removeAttr('readonly');

				if (!mustAuthenticateAgain) {
					// Libera o botão para solicitar novo código em 5 segundos.
					window.setTimeout(function() {
						$trigger
							.removeAttr('disabled')
							.removeAttr('readonly')
							.removeClass('disabled')
							.removeClass('readonly');
					}, 5000);
				}
			});
		}
	});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/profile.login.oauth/Scripts/wd.profile.login.oauth.js*/
try{; (function($, window, document, undefined) {
	
	$.widget('wd.ProfileLoginOauth',  $.wd.widget, {
		
		// Create
	_create: function () {
			var $widget = this,
				$w = $widget.getContext(),
				$id = this.element,
				_window = {};
			
			$w('a.login-link').bind('click', function(e){ e.preventDefault(); });
			// Facebook
			$(document).on('click', '.loginFacebook', function (e) {
				_window = window.open( $w('input[name="widget-base-url"]').val() + 'Oauth/Facebook', 'Facebook_Login', 'width=950,height=550,scrollbars=yes,resizable=1');
			});
			// Twitter
			$(document).on('click', '.loginTwitter', function (e) {
				_window = window.open( $w('input[name="widget-base-url"]').val() + 'Oauth/Twitter', 'Twitter_Login', 'width=800,height=400,scrollbars=yes,resizable=1');
			});
			// Stelo
			$(document).on('click', '.loginStelo', function (e) {
				_window = window.open( $w('input[name="widget-base-url"]').val() + 'Oauth/Stelo', 'Stelo_Login', 'width=1024,height=640,scrollbars=yes,resizable=1');
			});
			
			$widget.subscribe('/OAuth/Provider/Success', function(e, result) {
				var obj = $.parseJSON(result);
				//var obj = JSON.parse(result);
				if(obj.IsUser)
				{
					_window.close();
					//var urlCallbackUser = $w('input[name="url-current"]').val();
					//window.location.href = urlCallbackUser;
					window.location.reload();
					return;
				}

				if(!obj.IsValid) {

					if ( obj.ModelName === "Facebook") {
						$("#iframe-login-facebook").remove();
						$("#iframe-facebook-content").html("<div style='float:left; margin:auto; color:red; font-size:12px; text-align:center; margin-top:40px;'>" + obj.Error);
					}
					else {
						//alert(obj.Error);
					}
					_window.close();
				}
				else {
					
					_window.close();
					var urlCallback = $w('input[name="url-callback"]').val();
					window.location.href = urlCallback + "?provider=" + obj.ModelName;
				}
			});
		}
	});

	//options defaults
	$.extend($.wd.ProfileLoginOauth.prototype.options, {
		
	});
})(jQuery, window, document);





		
	  
}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/profile.welcome.shopper/Scripts/wd.profile.welcome.shopper.js*/
try{(function($, window, document, undefined) {

	function KoModel() {
		var self = this;

		self.UI = {
			StatusWrapperClass: ''
		};

		self.UI.StatusWrapperClass = browsingContext.Common.Shopper.IsAuthenticated ? 'shopper-authenticated' : 'shopper-not-authenticated';
	}

	var wdMessages = {},
		wdContext = {};

	$.widget('wd.ProfileWelcomeShopper', $.wd.widget, {

		_create: function() {
			var widget = this,
				$w = widget.getContext(),
				//currentUrl = $w('[name="widget-current-url"]').val(),
				currentUrl = browsingContext.Common.Urls.CurrentUrl,
				href = $w('.sign-out').attr('href');

			//widget.messages = JSON.parse($w().attr('data-messages'));
			//widget.messages = $.parseJSON ($w().attr('data-messages'));
			widget.messages = wdMessages = $w().data('messages');
			widget.wdContext = wdContext = $w().data('js');

			// console.log("widget.wdContext welcomeshopper",widget.wdContext)

			widget.currentUrl = currentUrl;
			if (href) {
				$w('.sign-out').attr('href', href.replace('{CurrentUrl}', currentUrl));
				widget.randomNoCaheSignOut();
			}

			//cs = $w('input[name="widget-cache-strategy"]').val();
			var cs = copyObject(browsingContext.Common.CacheSettings.CacheStrategy);

			if ($w().hasClass('wd-ko')) {
				// Nova renderização usando KO
				if (cs != 'Disabled') {
					if (browsingContext.Common.ready) {
						widget.reload();
						//console.log('welcome shopper browsingContext.Common.ready', browsingContext.Common.ready);
					} else {
						browsingContext.queue.push({
							action: function() {
								widget.reload();
							}
						});
					}
					//widget.reload();
				} else {
					//ko.applyBindings(new widget.KoViewModel(), widget.element[0]);
					widget.KoApplyBindings();
				}

				$.subscribe('/login/success', function() {
					//console.log('pub login/success');
					widget.reload();
				});
			} else {
				// Modo antigo, legado
				if (cs != 'Disabled') {
					widget.reloadLegacy();
				}
				$.subscribe('/login/success', function() {
					//console.log('pub login/success');
					widget.reloadLegacy();
				});
			}

			var hoverTimer;

			$w().on({
				mouseenter: function(e) {
					// hack para previnir seleção de valor no hover da opção do autocomplete - chrome
					if (e.relatedTarget == null) return;

					clearTimeout(hoverTimer);
					if (!$(e.target).is('input') && !$w('.login-wrapper').hasClass('hover')) {
						hoverTimer = setTimeout(function() {
							$w('.login-wrapper').addClass('hover');
							$(".transparent-login-simple-top-click-to-leave").show();
						}, parseInt($w().attr('data-hovertimer')));
					}
				},
				mouseleave: function(e) {
					// hack para previnir seleção de valor no hover da opção do autocomplete - chrome
					if (e.relatedTarget == null) return;

					clearTimeout(hoverTimer);
					if ($w('.login-wrapper').hasClass('hover') && !$(e.target).is('input')) {
						hoverTimer = setTimeout(function() {
							$w('.login-wrapper').removeClass('hover');
						}, parseInt($w().attr('data-hovertimer')));
					}
				}
			}, '.login-wrapper');
		},
		randomNoCaheSignOut: function() {
			var widget = this,
				$w = widget.getContext(),
				href = $w('.sign-out').attr('href');
			if (href) {
				var concat = href.indexOf('?') != -1 ? '&' : '?';
				// foi trocado o parâmetro v por e , pois v conflitava com o split
				$w('.sign-out').attr('href', href + concat + 'e=' + Math.floor((Math.random() * 8999) + 1000)).addClass("put-pipe");
			}
		},
		KoViewModel: function() {
			var self = this;
			var balance = false;
			ko.utils.extend(self, new KoModel());

			self.messages = wdMessages;
			if (wdContext) {
				var nameTruncate = wdContext.NameTruncate || 30;
				nameTruncate = +nameTruncate;
			}
			var shortName = browsingContext.Common.Shopper.Name || "";
			if (nameTruncate !== 0 && shortName.length > nameTruncate - 3) {
				shortName = shortName.substring(0, nameTruncate) + "...";
			}
			// self.loggedText = self.messages.TextHello+" "+shortName;
			self.loggedText = ko.observable(self.messages.TextHello + " " + shortName);
			return self;
		},
		KoApplyBindings: function() {
			//console.log('rodou applyBindings', this, 'this.element', this.element, 'this.element[0]', this.element[0]);
			var widget = this;
			widget.element.removeClass('wd-hide');
			ko.applyBindings(new widget.KoViewModel(), widget.element[0]);
			widget.publish('/wd/profile/welcomeshopper/ready', {});
		},
		reload: function() {
			//console.log('welcomeShopper reload()');
			var widget = this,
				$w = this.getContext(),
				o = this.options,
				//b = $w('input[name="widget-base-url"]').val();
				b = browsingContext.Common.Urls.BaseUrl;

			if (b != undefined) {
				// console.log('widget.element', widget.element);
				widget.KoApplyBindings();
			};
		},
		reloadLegacy: function() {
			var widget = this,
				$w = this.getContext(),
				o = this.options,
				b = browsingContext.Common.Urls.BaseUrl;

			if (b != undefined) {
				widget.ajax({
					url: b + 'widget/browsing_welcome_shopper',
					type: 'get',
					data: $.extend({
						Template: o.Template
					}, widget.messages),
					dataType: 'html',
					cache: false,
					success: function(response) {
						$w('.widget-content').html(response);
						$w().removeClass('wd-hide');
						var href = $w('.sign-out').attr('href') || '';
						$w('.sign-out').attr('href', href.replace('{CurrentUrl}', widget.currentUrl));
						widget.randomNoCaheSignOut();
					}
				});
			};
		}

	});

	// Defaults
	$.extend($.wd.ProfileWelcomeShopper.prototype.options, {
		Template: 'welcome.shopper.data.template'
		/*,
				TextLoading: 'carregando...'*/
	});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/checkout.basket.summaryheader/Scripts/wd.checkout.basket.summaryheader.js*/
try{;
(function($, window, document, ko, undefined) {

	function model() {
		var self = this;
		self.CacheStrategy = ko.observable(jQuery.extend(true, {}, browsingContext.Common.CacheSettings.CacheStrategy));
		//self.CacheStrategy = browsingContext.Common.CacheSettings.CacheStrategy;

		var basket = browsingContext.Common.Basket;

		ko.mapping.fromJS(basket, {}, self);
		//self.Basket = ko.observable(browsingContext.Common.Basket);
	};

	//var subscribeCtrl = false;

	function viewModel(widget, $w) {
		var self = this;
		ko.utils.extend(self, new model());

		var mapContext = function() {
			var _shopper = browsingContext.Common.Shopper;
			self.Shopper = ko.observable({
				IsAuthenticated: _shopper.IsAuthenticated
			});
			self.HasCreditCompetence = ko.observable(browsingContext.Common.BusinessContract.HasCreditCompetence);
			if (!_shopper.IsAuthenticated)
				self.HasCreditCompetence(false);
			//self.creditCompetenceAvailableAmount = ko.observable(browsingContext.Common.Basket.CreditCompetence.AvailableAmount);
			self.creditCompetenceBasketDif = ko.computed(function() {
				return self.CreditCompetence.AvailableAmount() - self.Total();
			});

			self.hasCreditCompetence = ko.observable(browsingContext.Common.BusinessContract.HasCreditCompetence);
			self.creditCompetenceExceeded = ko.computed(function() {
				var bool = self.Shopper().IsAuthenticated && self.HasCreditCompetence();
				var creditCompetence = self.CreditCompetence;
				if (bool) {
					bool = (creditCompetence.AvailableAmount() - self.Total()) >= 0;
				}
				return !bool;
			});
			var cutOff = browsingContext.Common.BusinessContract.CreditCompetence != null ? browsingContext.Common.BusinessContract.CreditCompetence.CutOffPointReached : false;
			self.cutOffPointReached = ko.observable(cutOff);
		};

		mapContext();

		var _filterSize = parseInt($w('[name="widget-filter-size"]').length ? $w('[name="widget-filter-size"]').val() : 0);

		self._filterSize = ko.observable(!isNaN(_filterSize) ? _filterSize : 0);

		//if (!subscribeCtrl) {
		ko.postbox.subscribe("/wd/summaryheader/context/ready", function() {
			basket = browsingContext.Common.Basket;

			ko.mapping.fromJS(basket, {}, self);
			mapContext();

		}, self);

		$.subscribe('/wd/browsing/context/common/basket/updated', function(e, basketModel) {
			ko.mapping.fromJS(basketModel, {}, self);
			mapContext();
		});
		//}

		//subscribeCtrl = true;

		self.filteredItems = ko.pureComputed(function() {
			var filterSize = ko.unwrap(self._filterSize);
			var items = ko.unwrap(self.Items);

			if (filterSize && filterSize > 0) {
				items = items.slice(0, filterSize);
			}

			return items;
		}, self);

		self.basketSizeComputed = ko.pureComputed(function() {
			if (browsingContext.Common.BusinessContract.SalesUnitLimit > 0 || widget.options.SizeByItemQuantity) {
				var count = 0;
				$.each(self.Items(), function(i, e) {
					//app.log('each Quantity', e);
					e.Quantity = ko.unwrap(e.Quantity);
					count += e.Quantity;

				});
				return count;
			};
			return self.Items().length;
		}, self);

		self.truncate = function(text, length) {
			if (!text)
				return '';
			text = ko.unwrap(text);
			text = app.tools.htmlDecode(text);
			if (text.length > (length))
				return text.substring(0, length - 3) + '...';
			return text;
		};
		self.formatMoney = function(value) {
			value = ko.unwrap(value);
			return 'R$ ' + parseFloat(value).formatMoney();
		};

		self.itemTotalPrice = function(item){
			var it = ko.unwrap(item);
			var nested = ko.unwrap(it.Nested);
			var price = it.RetailPrice();

			//comentado este trecho pois gerava problema nos kits, talvez seja necessário avaliar no caso de compra com brindes
			// for (var i = 0; i < nested.length; i++) {
			// 	price += nested[i].RetailPrice();
			// }
			return price;
		};

		self.isFreeItem = function(discounts) {
			//console.log('discounts',discounts);
			discounts = ko.unwrap(discounts);
			var resp = _.where(discounts, {
				Type: "FreeItem"
			});
			//console.log('resp',resp);
			return !resp.length > 0;
		};

		self.contentPath = function(path) {
			if (!path)
				return;
			path = ko.unwrap(path);

			if (!widget.enableCdn)
				return path;
			path = path.replace(browsingContext.Common.ImagesPath.Product.Match, '');
			return browsingContext.Common.ImagesPath.Product.Cdn + path;
		};

		if (self.Items().length === 0) {
			$w(".summaryheader-content.wd-widget").parent().addClass("empty");
		} else {
			$w(".summaryheader-content.wd-widget").parent().removeClass("empty");
		}

	};

	$.widget('wd.CheckoutBasketSummaryHeader', $.wd.widget, {
		_create: function() {
			var widget = this,
				$w = this.getContext(),
				//cache = $w('input[name="widget-cache-strategy"]').val(),
				cache = 'Cached',
				initialized = false;

			if (browsingContext.Common.hasOwnProperty('CacheSettings')) {
				cache = copyObject(browsingContext.Common.CacheSettings.CacheStrategy);
			}

			if ($w().hasClass('size-by-item')) {
				widget.options.SizeByItemQuantity = true;
			}

			widget.enableCdn = false;
			if (browsingContext.Common.ImagesPath.Product.Cdn != browsingContext.Common.ImagesPath.Product.Match) {
				widget.enableCdn = true;
			}

			// $w('.go-to-basket, .go-to-checkout').on('click', function() {
			// 	location.href = $(this).attr('data-href');
			// });
			$('body').on('click', '.wd-checkout-basket-summaryheader [data-href]', function() {
				location.href = $(this).attr('data-href');
			});

			if ($w().hasClass('wd-ko')) {
				// Nova renderização usando KO
				if (browsingContext.Common.ready) {
					if (!initialized) {
						initialized = true;
						widget.reload(cache);
					} else {
						ko.postbox.publish("/wd/summaryheader/context/ready", "");
					}
				} else {
					$.unsubscribe('/wd/browsing/context/ready');
					$.subscribe('/wd/browsing/context/ready', function() {
						if (!initialized) {
							initialized = true;
							widget.reload(cache);
							//console.log('@Summaryheader -  rodou via subcribe Summaryheader');
						}
					});
				}

				$.subscribe('/wd/browsing/context/ready', function() {
					if (!initialized) {
						initialized = true;
						widget.reload(cache);
						//console.log('@Summaryheader -  rodou via subcribe Summaryheader');
					}
				});

			} else {
				// Modo antigo, legado
				var timer = $w('input[name="widget-reload-timer"]').val();

				if (cache != 'Disabled') {
					setTimeout(function() {
						widget.reloadAjax();
					}, 100); //primeira atualização/ pra limpar o cache
					setInterval(function() {
						widget.reloadAjax();
					}, timer || 20 * 60 * 1000); //caso expire a seção (20 minutos)
				} else {
					if ($w('input[name="basketSize"]').val() == 0)
						$w('.go-to-checkout').hide();
				}

				/* funciona apenas dentro do basket */
				var reloadAjax = function() {
					//widget.reload();
					widget.reloadAjax();
				};
				widget.unsubscribe('/checkout/basket/changed', reloadAjax);
				widget.subscribe('/checkout/basket/changed', reloadAjax);
				/* widget basket_v2 */
				$.unsubscribe('/wd/browsing/context/common/basket/updated', reloadAjax);
				$.subscribe('/wd/browsing/context/common/basket/updated', reloadAjax);
			}

			$.subscribe('/wd/browsing/context/ready', function() {
				ko.postbox.publish("/wd/summaryheader/context/ready", "");
			});

		},
		reload: function() {
			var widget = this,
				$w = this.getContext();

			if (browsingContext.Common.hasOwnProperty('Basket') || browsingContext.Page.hasOwnProperty('Basket')) {
				var koElement = widget.element[0];
				ko.cleanNode(koElement);
				ko.applyBindings(new viewModel(widget, $w), koElement);
			} else {
				if ($w('input[name="basketSize"]').val() == 0) {
					$w('.go-to-checkout').hide();
					$w(".summaryheader-content.wd-widget").parent().addClass("empty");
				} else {
					$w(".summaryheader-content.wd-widget").parent().removeClass("empty");
				}
			}

			return true;
		},

		// LEGACY
		reloadAjax: function() {
			var widget = this,
				$w = this.getContext(),
				o = this.options,
				b = browsingContext.Common.Urls.BaseUrl;
			//b = $w('input[name="widget-base-url"]').val() || '/';

			if (b != undefined) {
				$.ajax({
					url: b + 'widget/browsing_basket_summary',
					type: 'get',
					data: {
						nocache: Math.floor(Math.random() * 11000000000),
						Template: o.Template,
						TextLoading: o.TextLoading,
						// Todo pegar do contexto JS
						MinQuantityPurchasable: $w('input[name="widget-min-qty-purchasable"]').val()
					},
					dataType: 'html',
					cache: false,
					success: function(response) {
						$w('.basket-size').html($('.basket-size', response).html());
						$w('.subtotal .value').first().html($('.subtotal .value', response).first().html());
						$w('.wd-content').html($('.wd-content', response).html());
						$w('.basket-size-wrapper').show();

						if ($('input[name="basketSize"]', response).val() == 0)
							$w('.go-to-checkout').hide();

						if ($('.minimum-quantity-box', response).size() != 0) {
							if ($w('.minimum-quantity-box').size() != 0) {
								$w('.minimum-quantity-box').addClass('visible').html($('.minimum-quantity-box', response).html());
							} else {
								$w('a').first().after($('.minimum-quantity-box', response));
							}
						} else {
							$w('.minimum-quantity-box').remove();
						}
					}
				});
			}
		}

	});

	// Defaults
	$.extend($.wd.CheckoutBasketSummaryHeader.prototype.options, {
		SizeByItemQuantity: false,
		Template: 'wd.checkout.basket.summaryheader.template',
		TextLoading: 'carregando...'
	});

})(jQuery, window, document, ko);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.search/Scripts/wd.product.search.js*/
try{;
(function($, window, document, undefined) {
	// var toFixed = function(num, dec) {
	//     var $result = (Math.round(num * Math.pow(10, dec)) / Math.pow(10, dec)),
	//         $arr = ($result + []).split('.'),
	//         $int = $arr[0] + '.',
	//         $dec = $arr[1] || '0';
	//     return ($int + $dec + (Math.pow(10, (dec - $dec.length)) + []).substr(1));
	// };
	
	var cache = {
		suggestionPopular: null
	}

	$.widget('wd.ProductSearch', $.wd.widget, {
		_create: function() {
			var $widget = this,
				$w = $widget.getContext(),
				$this = $w(),
				$input = $w('.search-field'),
				$form = $input.closest('form'),
				$suggestions = {
					view: $w('.suggestion-box'),
					template: $w('.suggestion-template').text()
				},
				urlBase = browsingContext.Common.Urls.BaseUrl,
				$inputDataSource = $w('#wd-checkbox-search-data-source');

				var searchField = app.tools.getParameterByName('t');

				if (searchField){
					$inputDataSource.attr('checked', true);
				}
					
			// no ie pegar conteudo de ums script atraves do .text() da erro, temos que usar .html()
			//var $varjson =$.parseJSON( $w('script[type=jsoptions]').text());
			var $varjson = $.parseJSON($w('script[type=jsoptions]').html()) || {};
			//alert($varjson);

			$widget.options = $varjson;

			var suggestionFocus = false;
			$suggestions.view
				.mouseover(function() {
					suggestionFocus = true;
				})
				.mouseout(function() {
					suggestionFocus = false;
				});

			function closeMetadataSerach() {
				$w('.metadata-search-open-checkbox').prop('checked', false);
			}

			$this.on('change', '.metadata-search-open-checkbox', function() {
				$this.on('click', function() {
					closeMetadataSerach();
					$this.off('click', this);
				});
			});

			$w('.metadata-search')
				.on('change', '.dropdown-options input[type=radio]', function(e) {
					var $this = $(this);
					var text = $this.next('span').text();
					var $origin = $(e.delegateTarget);
					if ($this.val() !== '') {
						$('.selected', $origin).html(text);
					} else {
						$('.selected', $origin).html('');
					}
					closeMetadataSerach();
					$input.focus();
				});

			$input
				.focus(function() {
					$suggestions.view.removeClass('hide');
					closeMetadataSerach();
					$widget.doSuggestions({
						widget: $widget,
						delay: $widget.keystrokeDelay,
						e: null,
						key: null,
						text: $(this).val(),
						suggestions: $suggestions
					});
				})
				.blur(function() {
					if (!suggestionFocus) {
						$suggestions.view.addClass('hide');
					}
				})
				.keydown(function(e) {

					var $key = e.which,
						$arrowKeys = {
							38: 1, //up arrow
							40: 1 //down arrow
						};

					if ($arrowKeys[$key]) {
						e.preventDefault();
						$widget.navigateSuggestions({
							37: -1,
							38: -1,
							39: 1,
							40: 1
						}[$key]);
					}
					/*else if ($key === 13) {
						var $val = $(this).val(),
							$mask = /\(produto:\/url(-[a-zA-z0-9]+)+\)/,
							$pmask = /\/url(-[a-zA-z0-9]+)+/,
							$match = $val.match($mask);
						if ($match.length) {
							e.preventDefault();
							window.location.href = $match[0].match($pmask)[0];
						}
					}*/
				})
				.keyup(function(e) {
					var $key = e.which,
						$serviceKeys = {
							9: 1, //tab
							13: 1, //enter
							16: 1, //shift
							17: 1, //ctrl
							18: 1, //alt
							19: 1, //pause/break
							20: 1, //caps lock
							27: 1, //escape
							33: 1, //page up
							34: 1, //page down
							35: 1, //end
							36: 1, //home
							37: 1, //left arrow
							38: 1, //up arrow
							39: 1, //right arrow
							40: 1, //down arrow
							45: 1, //insert
							91: 1, //left window key
							92: 1, //right window key
							112: 1, //f1
							113: 1, //f2
							114: 1, //f3
							115: 1, //f4
							116: 1, //f5
							117: 1, //f6
							118: 1, //f7
							119: 1, //f8
							120: 1, //f9
							121: 1, //f10
							122: 1, //f11
							123: 1, //f12
							144: 1, //num lock
							145: 1 //scroll lock
						};

					if ($input.val()) $input.removeClass('search-field-empty');

					if (!$serviceKeys[$key]) {
						if ($form.attr('data-url-mapper') === 'true') {
							$widget.changeAction($form, $input, urlBase);
						}
					}

					var keysDontApply = [37, 38, 39, 40];

					if ($.inArray($key, keysDontApply) === -1) {
						$widget.doSuggestions({
							widget: $widget,
							delay: $widget.keystrokeDelay,
							e: e,
							key: $key,
							text: $(this).val(),
							suggestions: $suggestions
						});
					}
				});

			var linxImpulseByGroup = browsingContext.Common.Config.Platform.LinxImpulseByGroup;
			if (linxImpulseByGroup &&
				linxImpulseByGroup.IsEnabled &&
				window.location.search == '?t=' &&
				!$input.val()) {
				$input.addClass('search-field-empty');
				$input.focus();
			}

			//Enter no sugestion #CORE-8419
			$form.submit(function(e) {
				var linxImpulseByGroup = browsingContext.Common.Config.Platform.LinxImpulseByGroup;
				if (linxImpulseByGroup &&
					linxImpulseByGroup.IsEnabled &&
					!$input.val()) {
					$input.addClass('search-field-empty');
					$input.focus();
					return false;
				}

				if (!$form.hasClass('by-suggestion') && $widget.doMapperIsValid()) {
					$widget.changeAction($form, $input, urlBase);
				}
				   
				if ($inputDataSource.is(":checked")){
					e.preventDefault();
					window.location.href = window.location.pathname + '?t=' + $input.val();										
				}
				else{

					window.location.href = browsingContext.Common.Urls.BaseUrl + $form.attr('action').replace('/', '')
				}
			});
		},

		keystrokeDelay: 200,
		timer: null,
		ajaxHandler: {
			abort: function() {}
		},

		doMapperIsValid: function() {
			var $widget = this,
				$w = $widget.getContext(),
				$input = $w('.search-field'),
				$inputdataSource = $w('#wd-checkbox-search-data-source'),
				$form = $input.closest('form');

			if ($inputdataSource.is(":checked")){
				return false;
			}

			if ($form.data('url-mapper') && $input.val()) {
				return true;
			}
			return false;
		},

		changeAction: function(form, input, baseUrl) {
			if ($('.nav-indexable.nav-current', '.suggestion-box-wrapper').length) {
				form.attr('action', $('.nav-indexable.nav-current', '.suggestion-box-wrapper').data('url')).addClass('by-suggestion');
			} else {
				form.attr('action', baseUrl + encodeURIComponent(input.val()).replace(/%20/g, '-'));
			}
		},

		doSuggestions: function(options) {
			
			var $widget = options.widget,
				$suggestions = options.suggestions,
				$text = options.text,
				$delay = options.delay,
				$w = $widget.getContext(),
				$input = $w('.search-field'),
				$o = $widget.options.suggestions,
				b = browsingContext.Common.Urls.BaseUrl,
				$inputDataSource=$w("#wd-checkbox-search-data-source");

				var dataSource = '';	
				if ($inputDataSource.is(":checked")){
					dataSource = $inputDataSource.data('datasourcename');
				}

			// cdnUrl = $w('input[name="widget-cdn-url"]').val();

			//cancela o ultimo pedido
			clearTimeout($widget.timer);
			$widget.ajaxHandler.abort();

			//cria um pedido novo
			if ($text.length <= 1) {

				var linxImpulseByGroup = browsingContext.Common.Config.Platform.LinxImpulseByGroup;
				if (linxImpulseByGroup && linxImpulseByGroup.IsEnabled) {

					if (cache.suggestionPopular !== null) {
						$suggestions.view.html(cache.suggestionPopular);
						return;
					}

					$.ajax({
						url: browsingContext.Common.Urls.BaseUrl + 'Shopping/SearchSuggest/Popular',
						type: 'POST',
						success: function(response) {

							if (!response || !response.Terms || !response.Terms.length) {
								return;
							}

							var termsList = response.Terms;
							var templateListWrapper = $w('.template-suggestion-popular-list').html();
							var templateListItem = $w('.template-suggestion-popular-items').html();

							var html = '';
							var templateListItemCompiled = _.template(templateListItem);
							_(termsList).each(function(e, i) {
								html += templateListItemCompiled({
									term: e,
									ranking: i + 1
								});
							});
							html = _.template(templateListWrapper)({
								termsList: html
							});

							cache.suggestionPopular = html;

							// Verifica se ainda deve substituir o html do suggestions
							if ($w('.search-field').val().length <= 1) {
								$suggestions.view.html(html);
							}

						}
					});
				} else {
					$suggestions.view.html('');
				}

			} else {											

				$widget.timer = setTimeout(function() {

					$text = $widget._executeSuggestCustomHandler($text) || $text;

					$widget.ajaxHandler = $.ajax({
						url: b + 'sugestao.partial',
						//url: b+'sugestao.json',
						type: 'GET',
						data: {
							t: $text,
							showCorrections: $o.showCorrections,
							TextDidYouMean: $o.TextDidYouMean,
							showTerms: $o.showTerms,
							showProducts: $o.showProducts,
							termsLimit: $o.termsLimit,
							productsLimit: $o.productsLimit,
							bannerTopSrc: $o.bannerTopSrc,
							bannerTopTargetBlank: $o.bannerTopTargetBlank,
							bannerTopUrl: $o.bannerTopUrl,
							bannerBottomSrc: $o.bannerBottomSrc,
							bannerBottomTargetBlank: $o.bannerBottomTargetBlank,
							bannerBottomUrl: $o.bannerBottomUrl,
							dataSource: dataSource
						},
						success: function(response) {

							$suggestions.view.html(response);

							$('.suggestion-correction', $suggestions.view).click(function(e) {
								var $t = $(this).attr('data-val');
								$input.val($t);
								$widget.doSuggestions({
									widget: $widget,
									delay: 1,
									e: e,
									key: null,
									text: $t,
									suggestions: $suggestions
								});
							});
							$('.suggestion-item', $suggestions.view).click(function() {															
								if ($widget.doMapperIsValid()) {
									window.location.href = b + $(this).attr('data-term');
								} else {
									window.location.href = b + 'pesquisa?t=' + $(this).attr('data-term');
								}
								// window.location.href = b + 'pesquisa/' + $(this).attr('data-term');
							});
							$('.suggestion-product', $suggestions.view).click(function() {
								window.location.href = $(this).attr('data-url');
							});
							$('.target-blank', $suggestions.view).click(function() {
								window.open($(this).attr('href'));
							});
							$.publish('product/search/suggestions/result', $suggestions.view);
						}
					});

				}, $delay);
			}
		},
		nav: {
			index: -1
		},
		navigateSuggestions: function(key) {
			var $widget = this,
				$w = this.getContext(),
				$suggestions = $w('.suggestion-box'),
				$map = $('.nav-indexable', $suggestions),
				$input = $w('.search-field'),
				$form = $input.closest('form'),
				urlBase = browsingContext.Common.Urls.BaseUrl,
				$current = $map.filter('.nav-current');

			$widget.nav.index += key;

			if ($map.length === $widget.nav.index) {
				$widget.nav.index = 0;
			} else if ($widget.nav.index < 0) {
				$widget.nav.index = $map.length - 1;
			}
			//console.log('navigating', key, $next, $map.length, $current.index($map));
			$current.removeClass('nav-current');
			$current = $map.eq($widget.nav.index).addClass('nav-current');
			$input.val($current.attr('data-indexable'));
			if ($widget.doMapperIsValid()) {
				$widget.changeAction($form, $input, urlBase);
			}
		},
		registerSuggestSubmitHandler: function(handler) {
			var $widget = this;
			if (handler && typeof handler === 'function') {
				$widget.options.customSuggestSubmitHandle = handler;
			}
		},
		_executeSuggestCustomHandler: function(data) {
			var $widget = this;

			if ($widget.options.customSuggestSubmitHandle && typeof $widget.options.customSuggestSubmitHandle === 'function') {
				return $widget.options.customSuggestSubmitHandle(data);
			}

			return data;
		}
	});

	$.extend($.wd.ProductSearch.prototype.options, {

	});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/marketing.banner/Scripts/wd.marketing.banner.js*/
try{(function($, window, document, undefined) {
	(function($) {

		$.fn.shuffle = function() {

			var allElems = this.get(),
				getRandom = function(max) {
					return Math.floor(Math.random() * max);
				},
				shuffled = $.map(allElems, function() {
					var random = getRandom(allElems.length),
						randEl = $(allElems[random]).clone(true)[0];
					allElems.splice(random, 1);
					return randEl;
				});

			this.each(function(i) {
				$(this).replaceWith($(shuffled[i]));
			});

			return $(shuffled);

		};

	})(jQuery);

	$.widget('wd.MarketingBanner', $.wd.widget, {
		_create: function() {
			var widget = this,
				o = this.options,
				$w = this.getContext();

			if ($w(".js-positionID").length) {
				widget.reload();
			}

			if ($w().hasClass('slider') && ($w('.banner-wrapper').length > 1)) {
				//widget.bgPreLoader();
				Async(function(){widget.slider()})();
			} else {
				if ($w().hasClass('slider') && ($w('.banner-wrapper').length == 1)) {
					$w().removeClass('slider');
				}
			}

			// CORE-4685
			//widget.datasource(this.options.datasource);

		},
		// datasource: function(ds) {
		// 	var widget = this,
		// 		$w = this.getContext();
		// 	widget.options.datasource = ds;

		// 	$('.banner-swf', widget.element).each(function() {
		// 		var container = $(this);

		// 		var bID = container.attr('id').replace('banner-swf-', ''); //Remove prefixo
		// 		var b = $w('#banner-' + bID).data('banner');

		// 		var options = {
		// 			quality: 'high',
		// 			wmode: 'transparent',
		// 			scale: 'noscale',
		// 			allowDomain: '*',
		// 			allowScriptAccess: true,
		// 			allowFullScreen: true,
		// 			menu: false,
		// 			swf: b.BannerPath,
		// 			movie: b.BannerPath,
		// 			width: b.Width,
		// 			height: b.Height
		// 		};

		// 		if (b.BackgroundHexa !== null && b.BackgroundHexa !== '')
		// 			options.bgcolor = '#' + b.BackgroundHexa;

		// 		container.fadeOut('fast', 'swing', function() {
		// 			container.flash(options);
		// 			container.css('background', 'none').fadeIn('slow', 'swing');
		// 		});
		// 	});

		// },
		reload: function() {
			var widget = this,
				$w = this.getContext(),
				o = this.options,
				b = $w('input[name="widget-base-url"]').val();

			$.ajax({
				url: b + 'Widget/marketing_banner',
				type: 'get',
				data: {
					PositionId: $w(".js-positionID").val(),
					ContextId: $w(".js-contextID").val(),
					Context: $w(".js-context").val(),
					IsCacheable: 'True'
				},
				dataType: 'html',
				cache: false,
				success: function(response) {
					var x = response;

					if ('sliderTimer' in o)
						clearInterval(o.sliderTimer);
					// $w('.basket-size').html($('.basket-size',x).html());
					$w().html($(x).html());

					if ($w().hasClass('slider') && ($w('.banner-wrapper').length > 1))
						widget.slider();
					//$w('.basket-size-wrapper').show();
				}
			});
		},
		bgPreLoader: function() {
			var widget = this,
				o = this.options,
				$w = this.getContext();
			$w(".banner-wrapper").each(function(index) {
				var img = ($(this).css('background-image'));
				if (img != 'none') {
					var image = new Image();
					img = img.replace('url("', '').replace('")', '');
					image.src = img;
					//console.log('img',img);
					//console.log('image',image);
				}

			});

		},
		slider: function() {
			var widget = this,
				o = this.options,
				$w = this.getContext();

			Async(function() {
				// Random / Sort das imagens com mesmo peso(data-weight)
				var WeightCtrl = [];
				$w('div.banner-wrapper').each(function() {
					var $this = $(this),
						thisWeight = $this.attr('data-weight');
					if (WeightCtrl.indexOf(thisWeight) == -1) {
						WeightCtrl.push(thisWeight);
						var $elems = $w('div.banner-wrapper[data-weight="' + thisWeight + '"]');
						if ($elems.length > 1) {
							$elems.shuffle();
						}
					}
				});

			})();
			$w('div.banner-wrapper').first().addClass('banner-show');

			Async(function() {
				//atualiza as options

				// var $json = JSON.parse($w().attr('data-slider')) || {};
				var $json = $.parseJSON($w().attr('data-slider')) || {};
				if ($json.sliderDelay)
					o.sliderDelay = $json.sliderDelay;
				if ($json.sliderFadeDelay)
					o.sliderFadeDelay = $json.sliderFadeDelay;

			})();

			Async(function() { //ajusta heights e seta maior height como tamanho do slider
				var h = 0;
				$w('.banner-wrapper').each(function(i) {
					var $this = $(this);
					$this.show();
					if ($this.height() > h)
						h = $this.height();

					//CORE-4890 - antigo
					// var bg = $(this).css('background-color');
					// $(this).removeAttr('style');
					// $(this).css('background-color',bg);
					// if (i && $.browser.msie) $(this).hide(); //compensar o css:nth-child ausente nos IE
					// end antigo

					var bg = $this.css('background-image'),
						bg_color = $this.css('background-color');
					$(this).removeAttr('style');
					$(this).css('background-image', bg).css('background-color', bg_color);

				});
				$w().css({
					height: h,
					lineHeight: h + 'px'
				});
			})();

			Async(function() { //adiciona controle de slides
				var $html = '<ul class="slider-controller">';
				$w('.banner-wrapper').each(function(i) {
					$html += '<li>' + (i + 1) + '</li>';
				});
				$html += '</ul>';
				$w().append($html);
				$w('.slider-controller li').first().addClass('current');
				$w('.slider-controller li').click(function() {
					changeBanner($(this).index());
				});
			})();

			var changeBanner = function($toIndex) {
				var $cur = $w('.banner-wrapper:visible'),
					$to = (
						$toIndex !== undefined ?
						$w('.banner-wrapper').eq($toIndex) :
						($cur.next('.banner-wrapper').length ?
							$cur.next('.banner-wrapper') :
							$cur.siblings('.banner-wrapper').first()
						)
					);

				$cur.animate({
					opacity: 0
				}, o.sliderFadeDelay, function() {
					$(this).removeClass('banner-show');
					if ($w('.slider-controller').length) {
						$w('.slider-controller li').removeClass('current').eq($w('.banner-wrapper').index($to)).addClass('current');
					}
					$to.addClass('banner-show');
					$to.animate({
						opacity: 1
					}, o.sliderFadeDelay);
				});
			};
			var startTimer = function() {
				if (o.sliderTimer) {
					clearInterval(o.sliderTimer);
				}
				o.sliderTimer = setInterval(changeBanner, o.sliderDelay);
			};
			startTimer();

			//comportamento de parar o slider com o mouse em cima
			$w().on({
				mouseenter: function() {
					clearInterval(o.sliderTimer);
				},
				mouseleave: function() {
					startTimer();
				}
			});

		}

	});

	$.extend($.wd.MarketingBanner.prototype.options, {
		sliderDelay: 7000,
		sliderFadeDelay: 300
	});
})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.line.wishlist/Scripts/wd.product.line.wishlist.js*/
try{(function($, window, document, undefined) {

	var _memory = {
		request: null,
		addRequest: null,
		modelFetched: false
	};

	var _CLASS = {
		added: 'added'
	};

	var wishlistModel = null;

	function StorageFactory(namespace) {
		var self = this;

		self.get = function storageGet() {
			var val = app.tools.localStorage.get(namespace) || {};
			if (!val && val !== '') {
				return {};
			}

			return $.parseJSON(val) || {};
		};

		self.set = function storageSet(val) {
			if (_.isObject(val)) {
				val = JSON.stringify(val);
			}

			try {
				app.tools.localStorage.set(namespace, val);
				return true;
			} catch ($er) {
				console.log($er);
				return false;
			}
		};
	}

	function fetchDefaultWishlist() {
		if (_memory.request) {
			return _memory.request;
		}

		_memory.request = $.ajax({
				url: browsingContext.Common.Urls.BaseUrl + 'Profile/AccountWishlist/GetOrCreateDefault',
				type: 'POST'
			})
			.complete(function() {
				_memory.request = null;
			});

		return _memory.request;
	}

	function loadModel() {
		fetchDefaultWishlist()
			.success(function(r) {
				if (!r || !_.isObject(r)) {
					console.error(r);
					return;
				}

				_memory.modelFetched = true;
				wishlistModel.set(r);
				dispatchEvent(r);
			});
	}

	function dispatchEvent(model) {
		$.publish('/wd/product/line/wishlist/model', model);
	}

	function init() {
		// carrega model
		wishlistModel = new StorageFactory('wdProductLineWishlistProducts-' + browsingContext.Common.Shopper.CustomerID);

		if (!browsingContext.Common.Shopper.IsAuthenticated) {
			return false;
		}

		var model = wishlistModel.get();

		if (!!model && !$.isEmptyObject(model)) {
			dispatchEvent(model);
		}

		loadModel();
	}

	if (!browsingContext.Common.ready) {
		$.publish('/wd/browsing/context/ready', init);
	} else {
		init();
	}

	// Registra widget
	$.widget('wd.ProductLineWishlist', $.wd.widget, {

		_create: function() {
			var $widget = this;
			var $w = $widget.getContext();
			var options = $widget.options;
			var model = wishlistModel ? wishlistModel.get() : null;

			function bindDefault() {
				$w('.js-btn').click(function(e) {
					e.preventDefault();

					$widget.openLoginModal();
				});
			}

			function bindActions() {
				if (_memory.modelFetched) {
					$widget._resolveSelection(model);
				}

				$.subscribe('/wd/product/line/wishlist/model', function(e, m) {
					$widget._resolveSelection(m);
				});

				$w('.js-btn').click(function(e) {
					e.preventDefault();

					var $this = $(this);

					if ($this.hasClass(_CLASS.added)) {
						$widget.removeProduct();
						return;
					}

					$widget.addProduct();
					return;
				});
			}

			if (!browsingContext.Common.Shopper.IsAuthenticated) {
				bindDefault();
				return;
			}

			if (model && model.WishlistID > 0) {
				bindActions();
				return;
			}

			// esconde botões
			$w().hide();
			console.warn('É necessário definir uma WishlistDefinition como principal');
		},
		_resolveSelection: function(model) {
			if (!model || !model.Products) {
				return;
			}

			var $widget = this;
			var $w = $widget.getContext();
			var pid = $w().data('pid');
			var sku = $w().data('sku');
			var $btn = $w('.js-btn');
			// var sku = $widget.element.data('sku');

			var products = model.Products || [];
			var addedItem = _.find(products, function(p) {
				return p && p.ProductID == pid && p.SkuID == sku;
			});

			if (addedItem) {
				$btn.addClass(_CLASS.added);
				$w().data('wishlistProductID', addedItem.WishlistProductID);
				return;
			}

			$btn.removeClass(_CLASS.added);
		},
		openLoginModal: function() {
			var $widget = this;
			var options = $widget.options;

			$widget.success({
				message: options.loginModalMessage,
				containerCss: {
					height: 150 //'auto' não funciona
				},
				buttons: [{
					'class': 'no',
					label: options.loginModalCloseBtn,
					onclick: function(dialog) {
						app.closeModal();
					}
				}, {
					'class': 'yes',
					label: options.loginModalLoginBtn,
					onclick: function(dialog) {
						window.location.href = browsingContext.Common.Urls.BaseUrl + 'Login?url=' + window.location.href
					}
				}]
			});
		},
		addProduct: function() {
			var $widget = this;
			var $w = $widget.getContext();
			var pid = $w().data('pid');
			var sku = $w().data('sku');
			var $btn = $w('.js-btn');
			var model = wishlistModel.get();

			$btn.addClass(_CLASS.added);

			if (_memory.addRequest) {
				_memory.addRequest.abort();
			}

			_memory.addRequest = $.ajax({
					url: browsingContext.Common.Urls.BaseUrl + 'Profile/Wishlist/AddProductToWishlist',
					type: 'POST',
					data: {
						WishlistID: model.WishlistID,
						WebSiteID: browsingContext.Common.WebSite.WebSiteID,
						ProductID: pid,
						SkuID: sku,
						Quantity: 1
					}
				})
				.complete(function() {
					_memory.addRequest = null;
				})
				.success(function(r) {
					if (!r || !r.ServiceResponse || !r.ServiceResponse.Data || r.ServiceResponse.Data.Custom.WishlistProductID <= 0) {

						return;
					}

					$w().data('wishlistProductID', r.ServiceResponse.Data.Custom.WishlistProductID);
					$btn.addClass(_CLASS.added);
					loadModel();
				});

		},
		removeProduct: function() {
			var $widget = this;
			var $w = $widget.getContext();
			var pid = $w().data('pid');
			var $btn = $w('.js-btn');
			var model = wishlistModel.get();
			var wishlistProductID = $w().data('wishlistProductID');

			$btn.removeClass(_CLASS.added);

			if (_memory.addRequest) {
				_memory.addRequest.abort();
			}

			if (!wishlistProductID) {
				return;
			}

			_memory.addRequest = $.ajax({
					type: 'POST',
					url: browsingContext.Common.Urls.BaseUrl + 'painel-do-cliente/lista-de-desejo/remover-produto',
					data: {
						WishlistID: model.WishlistID,
						WebSiteID: browsingContext.Common.WebSite.WebSiteID,
						WishlistProductID: wishlistProductID
					}
				})
				.complete(function() {
					_memory.addRequest = null;
				})
				.success(function() {
					$btn.removeClass(_CLASS.added);
					$w().data('wishlistProductID', undefined);
					loadModel();
				});
		}
	});

	// Default options
	$.extend($.wd.ProductLineWishlist.prototype.options, {
		loginModalMessage: 'Você precisa estar autenticado para adicionar à lista.',
		loginModalCloseBtn: 'Fechar',
		loginModalLoginBtn: 'Fazer Login'
	});

}(jQuery, window, document));

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.line.medias/Scripts/wd.product.line.medias.js*/
try{;
(function($, window, document, undefined) {
	$.widget('wd.ProductLineMedias', $.wd.widget, {
		// Create
		_create: function() {
			var self = this,
				$widget = self,
				$e = $(self.element),
				$w = $widget.getContext(),
				pagination = $e.data('show-pagination') || false, // parametro da páginação
				truncate = $e.data('truncate'), // parametro da páginação
				imageOrder = $e.attr('data-order'),
				useHierarchy = $e.data('use-hierarchy'),
				items = $(".variation-item", self.element), // selecionando as variações
				pid = self.pid = $e.attr('data-pid');

			var productLine = $e.parents(".wd-product-line").first();

			var variation = $e.find(".variation"),
				a = $e.find(">a"),
				Options = JSON.parse($e.find("script[type='application/json'].json-data-options").text()),
				// Selection = $e.data("product-selection"),
				sizeType = $e.data('size-type'),
				PropertyPath = $e.data('property-path'),
				configSize = $e.data('config-size');
				variation.addClass(variation.find('img:first-child').data('erro') ? 'first-image-error' : '');

			var $currentImg = $e.find("img");	

			// Quando a imagem falha carrefa uma imagem padrão
			$currentImg.error(function() {
				$(this).attr('src', $e.data('no-image'));
				variation.addClass('first-image-error');
			});

			items.map(function() {
				$(this).text($(this).text().slice(0, (truncate > 0 ? truncate : 255)));
			});

			// PAGINAÇÃO: inicio
			if (pagination > 0) {
				var page = 0;
				$e.find('.still-working').removeClass('still-working');
				var btnsPage = $(".variation-paginator", self.element); // seletor dos botões
				if (items.length < pagination) { // PAGINAÇÃO: nao precisa
					items.removeClass('hidden');
					btnsPage.remove();
				} else {
					var maxPage = Math.ceil(items.length / pagination) - 1; // máximo de páginas
					var changePage = function(direciton) { // PAGINAÇÃO: muda página
						direciton = direciton || 0;
						page += direciton;
						page = page < 0 ? 0 : page > maxPage ? maxPage : page; // limitadores
						items.addClass('hidden');
						items.slice(pagination * page, pagination * page + pagination).removeClass('hidden');
					};
					changePage(); // PAGINAÇÃO: inicia
					btnsPage.eq(0).on('click', function() { // PAGINAÇÃO: volta
						changePage(-1);
					});
					btnsPage.eq(1).on('click', function() { // PAGINAÇÃO: avança
						changePage(1);
					});
				}
			} // PAGINAÇÃO: fim

			// LAZYLOAD: inicio
			if($currentImg.hasClass('loaded')){
				$e.addClass('loaded');
				// se a imagem principal já tiver sido carregada executa trigger
				productLine.trigger('lazyLoaded');
			}else{
				$currentImg.on('lazyLoaded', function(){
					$e.addClass('loaded');
					// dispara evento em toda product line
					//$(this).closest('.wd-product-line').trigger('lazyLoaded');
					productLine.trigger('lazyLoaded');
					$(this).off('lazyLoaded');
				});
			}
			// LAZYLOAD: fim 

			// SUBVARIAÇÕES: inicio
			productLine.on('media-subvariation', function(e, subvariation, medias, propertyPath, SKU) {				
				var href = a.attr('href');
				var self = $(this);
				if (propertyPath) {
					if (!/pp=\/\d+\.\d+\//g.test(href)) {
						prefix = /\?/g.test(href) ? '&' : '?';
						a.attr('href', href + prefix + 'pp=' + propertyPath);
					} else {
						a.attr('href', href.replace(/pp=\/\d+\.\d+\//g, 'pp=' + propertyPath));
					}
				}
				if (SKU) {
					a.attr('href', /\?/g.test(href) ? href.replace(/\?.+/g, '?v=' + SKU) : href + '?v=' + SKU);
				}
				$.map(subvariation, function(v) {
					$(self).find('.variation-item[data-variation-path="' + v.PropertyPath + '"]')
						.removeClass('out-of-stock')
						.addClass(v.IsPurchasable!=='true' ? 'out-of-stock' : '');
				});
				var classGroupSufix = "";
				if (medias === undefined || medias.length === 0) {
					firstItem = {
						VariationPath: '/'
					};
				} else {
					firstItem = medias[0];
				}
				classGroupSufix = firstItem.VariationPath.replace(/[\/\.]/g,"")||(useHierarchy=='False'?'false':'root');

				var classGroup = "variation-" + classGroupSufix;
				var active = $e.find('.' + classGroup);
				if (active.length === 0) {
					var group = $('<div>').addClass('variation ' + classGroup).hide()
						.data('json', medias)
						.appendTo($e.find('a.thumb'));
					
					var attrSrc = $widget.options.LazyLoad ? 'data-src' : 'src';
					var imgClass = 'current-img showing ';
					if ($widget.options.LazyLoad) {
						imgClass += 'lazyload '
					}
					firstImage = $('<img>')
						.attr(attrSrc, firstItem.MediaPath)
						.addClass(imgClass + $e.data('effect-class'))
						.appendTo(group)
						.load(function() {
							$e.find('.variation').hide();
							productLine.trigger('lazyLoaded');
							group.show();
						});
					$widget._lazyLoad(group);
				} else {					
					var variations = $e.find('.variation');
					variations.hide();
					active.show();
				}
			});
			// SUBVARIAÇÕES: fim

			// EFEITO DE TRANSIÇÃO: inicio
			if (!window.imgLineChanager) {
				window.imgLineChanager = true;
				var timer;
				//l($e.find("img"));
			
				var loadImg = function(scope, callback) {
					var dataImg = scope.dataImages[scope.pos];
					var nextImage = new Image();
					if(dataImg.MediaPath.indexOf("sem-foto") !== -1){
						nextImage.height = dataImg.Height;
						nextImage.width = dataImg.Width;
					}
					var imgClass = 'current-img hidding';
					if ($widget.options.LazyLoad) {
						imgClass += ' lazyload';
						nextImage.dataset.src = dataImg.MediaPath;
					} else {
						nextImage.src = dataImg.MediaPath;
					}
					
					$(nextImage).addClass(scope.animation).addClass(imgClass).load(function() {
						if (!scope.stopOnSwap)
							callback(scope);
						effectImg(scope);
					}).insertAfter(scope.imgs.last());

					if ($widget.options.LazyLoad) {
						$widget._lazyLoad($(nextImage));
					}
				};
				var effectImg = function(scope) {
					var currentClass = 'current-img hidding';
					var nextClass = 'nextImg showing';
					
					if ($widget.options.LazyLoad) {
						currentClass += ' lazyload';
						nextClass += ' lazyload';
					}			

					scope.imgs = scope.self.find('img');
					var imgToHide = scope.imgs;
					var imgToShow = scope.imgs.eq(scope.pos);
					// limpa as classes necessárias e adiciona novas
					imgToHide.removeClass(nextClass).addClass(currentClass).addClass(scope.animation);
					imgToShow.removeClass(currentClass).addClass(nextClass).addClass(scope.animation);

					if ($widget.options.LazyLoad) {
						$widget._lazyLoad($(scope.imgs.eq(scope.pos)));
					}
				};
				var swapImg = function(scope) {
					//console.log('scope',scope, scope.pos);
					// window.clearTimeout(timer);
					timer = window.setTimeout(function() {
						if (scope.pos >= 0) {
							var dataImg = scope.dataImages[scope.pos];
							scope.imgs = scope.self.find('img');
							if(scope.eventType == 'mouseleave'){
								scope.pos = 0;
							}else{
								scope.pos++;
								scope.pos = scope.pos >= scope.dataImages.length ? 0 : scope.pos;
							}
							
							if (!$(scope.imgs)[scope.pos]) {
								loadImg(scope, swapImg);
							} else {
								if (!scope.stopOnSwap)
									swapImg(scope);
								effectImg(scope);
							}
						}
						scope.self.data('position', scope.pos);
					}, scope.delay);
				};
				
				$('body').on('hover', ".wd-product-line-medias.change-image-hover .variation", function(e) {
					var self = $(this),
						scope = {};
					scope.self = self;
					scope.dataImages = self.data('json');
					if( imageOrder ){
						scope.dataImages = $.map( imageOrder.split('/') , function(n){
							if(typeof n === 'number'){
									n = n-1;
							}else if( n === 'last' ){
								n = scope.dataImages.length-1;
							}else{
								n = 0;
							}
							return  scope.dataImages[n];
						});
					}
					//console.log('e',e);
					//if ( scope.maxChange = $e.data('max-change') ) {
					scope.maxChange = $e.data('max-change') ;
						
					scope.dataImages = _.first(scope.dataImages, scope.maxChange + 1);
					
					scope.stopOnSwap = $e.data('stop-on-swap') || false;
					scope.max = scope.dataImages.length - 1;
					scope.delay = $e.data('delay');
					scope.animation = $e.data('effect-class');
					scope.pos = self.data('position') || 0;
					scope.eventType = e.type;

					//if(scope.stopOnSwap=="False" || scope.stopOnSwap=="false") scope.stopOnSwap=false;

					if (!self.find('img:first-child').data('erro') && scope.dataImages.length > 1) {
						if (e.type == "mouseenter") {
							swapImg(scope);
							//console.log("trocou");
						} else if (e.type == "mouseleave") {
							if (!!scope.stopOnSwap) {
								swapImg(scope);
							} else {
								/*Melhor solução para delay:
									transition: all 0s cubic-bezier(0.4, 0.2, 0, 1) 0.6s
									Deixar o Effect="fade-scale".
									Daí o primeiro zero alí( 0s ) faz com que não faça transição nenhuma
									No final alí, o 0.6s é o delay do efeito
								*/
								swapImg(scope);
								//window.clearTimeout(timer);
							}
						}
					}
				});
			}
			// EFEITO DE TRANSIÇÃO: fim
		},
		_lazyLoad: function($e) {
			var el = $e.find('img.lazyload').not('.loaded');
			if (el.length == 0 && $e.is('img')) {
				el = $e.not('.loaded');
			}

			el.each(function(){
				var $this = $(this);
				$this.attr('src',$this.data('src'));
				$this.addClass('loaded');
			});            
		},
	});

	//options defaults
	$.extend($.wd.ProductLineMedias.prototype.options, {

	});
})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.line.medias.variations/Scripts/wd.product.line.medias.variations.js*/
try{;
(function($, window, document, undefined) {
    $.widget('wd.ProductLineMediasVariations', $.wd.widget, {
        // Create
        _create: function() {
            var self = $widget = this,
                $w = $widget.getContext(),
                $e = $(self.element),
                propertyPath = $e.attr('data-property-path') || '', // quando produto configurado como SPLIT
                sku = $e.data('sku-selected'),
                changeOn = $e.data('change-on') || 'click', // parametro do evendo de disparo (click, mouseover, ...)
                pagination = $e.data('show-pagination') || false, // parametro da páginação
                items = $w(".variation-item", self.element), // selecionando as variações
                pid = self.pid = $e.data('pid'),
                productLine = $e.parents(".wd-product-line").first();

            // LAZYLOAD: inicio
            if($w('.has-swatch').length){
                // if(productLine.find('.wd-product-line-medias img').first().hasClass('loaded')){
                if(productLine.find('.wd-product-line-medias').hasClass('loaded')){
                    $widget._lazyLoad($e);
                }else{
                    productLine.on('lazyLoaded', function(){
                        $widget._lazyLoad($e);
                        $(this).off('lazyLoaded');
                    });
                }
                
            }
            // LAZYLOAD: fim 

            // PAGINAÇÃO: inicio
            if (pagination > 0 && items.length > 0) {
                var page = 0;
                $e.find('.still-working').removeClass('still-working');
                var btnsPage = $(".variation-paginator", self.element); // seletor dos botões
                if (items.length - 1 < pagination) { // PAGINAÇÃO: nao precisa
                    items.removeClass('hidden');
                    $e.find('.show-pagination').removeClass('show-pagination');
                    btnsPage.remove();
                } else {
                    var position = $e.find('.paginator-position');
                    var poniter = position.find('>div');
                    var renderPosition = function() {
                        var walk = (position.width() - poniter.width()) / maxPage;
                        poniter.css({
                            left: walk * page
                        });
                    };
                    $(window).resize(renderPosition);
                    var maxPage = Math.ceil(items.length / pagination) - 1; // máximo de páginas
                    var changePage = function(direciton) { // PAGINAÇÃO: muda página
                        direciton = direciton || 0;
                        page += direciton;
                        page = page < 0 ? 0 : page > maxPage ? maxPage : page; // limitadores
                        items.addClass('hidden');
                        items.slice(pagination * page, pagination * page + pagination).removeClass('hidden');
                        //renderPosition();
                    };
                    changePage(); // PAGINAÇÃO: inicia
                    btnsPage.eq(0).on('click', function() { // PAGINAÇÃO: volta
                        changePage(-1);
                    });
                    btnsPage.eq(1).on('click', function() { // PAGINAÇÃO: avança
                        changePage(1);
                    });
                }
            } // PAGINAÇÃO: fim
            
            items.each(function(index) {
                var item = $(this);
                //console.log('map second', item.data('second-variation'));

                //var second = item.data('second-variation').map(function(i) { window.console.log('i map',i); return { PropertyPath: i.pp, IsPurchasable: i.ip }; });
                //var medias = item.data('medias').map(function(i) { return { MediaPath: i.mp, VariationPath: i.vp, Height: i.h, Width: i.w }; });             

                var secondJSON = $.parseJSON(item.attr('data-second-variation')),
                    mediasJSON = $.parseJSON(item.attr('data-medias')),
                    second = $.map(secondJSON,function(i) { return { PropertyPath: i.pp, IsPurchasable: i.ip }; }),
                    medias = $.map(mediasJSON,function(i) { return { MediaPath: i.mp, VariationPath: i.vp, Height: i.h, Width: i.w }; });

                // var second = $.map(item.data('second-variation'),function(i) { return { PropertyPath: i.pp, IsPurchasable: i.ip }; });
                // var medias = $.map(item.data('medias'),function(i) { return { MediaPath: i.mp, VariationPath: i.vp, Height: i.h, Width: i.w }; });

                var firstPropertyPath = item.data('property-path');
                var thumb = item.find('.thumb');
                // var srcMedia = thumb.css('background-image');
                // if (srcMedia!=='none') {
                //     thumb.css({
                //         'background-color': 'transparent'
                //     });
                // }
                var changeOnFunciton = function(event) { // VARIAÇÃO: evento para mudar as midias em wd.product.line.medias
                    $e.find('.selected').removeClass('selected');
                    item.addClass('selected');
                    if (pagination) {
                        var page = Math.floor(items.index(item) / pagination);
                        if (page > 0) {
                            items.addClass('hidden');
                            var x = items.slice(pagination * page, pagination * page + pagination).removeClass('hidden');
                        }
                    }
                    productLine.trigger('media-subvariation', [second, medias, firstPropertyPath, sku !== pid ? sku : null]);
                };
                if ( propertyPath === '/' && index === 0 || propertyPath !== '/' && propertyPath.indexOf(firstPropertyPath) >= 0) {
                    changeOnFunciton();
                } // ativa a primeira variação como padrão

                item.on(changeOn, changeOnFunciton);
            });
            
        },
        _lazyLoad: function($e) {
            $e.find('.has-swatch').not('.loaded').each(function(){
                var $this = $(this);
                $this.attr('style',$this.data('style'))
                     .addClass('loaded');
            });   
        }
    });

    //options defaults
    $.extend($.wd.ProductLineMediasVariations.prototype.options, {

    });
})(jQuery, window, document);
}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.rating/Scripts/wd.product.rating.js*/
try{//
// Widget exibição de avaliações
// Esse widget tem responsabilidade de mostrar a média de avaliação do produto e link para novo review
//
// Publish:
//

;
$.widget('wd.ProductRating', $.wd.widget, {

	_create: function() {
		var widget = this;

		widget.element.find('.review-create').click(function(e) {
			e.preventDefault();

			var groupProductConfig = browsingContext.Common.Config.Platform.Product;
			if (groupProductConfig.EnableReviewOnlyForBuyers || groupProductConfig.EnableUniqueReview) {
				widget._checkReviewPermission();
				return;
			}

			widget.publish('/product/review/create', {
				widget: widget.element
			});

			return;
		});
	},
	_checkReviewPermission: function() {
		var widget = this;

		function evaluate(responseData) {
			if (!responseData || !responseData.IsValid) {
				var errorMessage = responseData.Errors && responseData.Errors.length ? responseData.Errors[0].ErrorMessage : 'Você precisa comprar este produto para comentar';

				widget.publish('/product/review/info', {
					widget: widget.element,
					message: errorMessage
				});

				return;
			}

			widget.publish('/product/review/create', {
				widget: widget.element
			});

			return;
		}

		if (!browsingContext.Common.Shopper.IsAuthenticated) {
			widget.publish('/product/review/info', {
				widget: widget.element,
				message: 'Você precisa fazer o login continuar.'
			});

			return;
		}

		if (browsingContext.Custom.wdReviews && browsingContext.Custom.wdReviews.ValidateCustomerReviewPermit) {
			evaluate(browsingContext.Custom.wdReviews.ValidateCustomerReviewPermit);
			return;
		}

		var productID = browsingContext.Page.Product.ProductID;
		var customerID = browsingContext.Common.Customer.CustomerID;
		var url = browsingContext.Common.Urls.BaseUrl + 'shopping/review/ValidateCustomerReviewPermit/' + productID;

		$.ajax({
			type: "POST",
			url: url,
			data: {
				customerID: customerID
			},
			success: function(data) {
				browsingContext.Custom.wdReviews = {
					ValidateCustomerReviewPermit: data
				};

				evaluate(browsingContext.Custom.wdReviews.ValidateCustomerReviewPermit);
			}
		});
	}
});

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.price/Scripts/wd.product.price.js*/
try{//
// Widget do preço
//
;
(function($, window, document, undefined) {
	var _requestCache = {};
	var _responseCache = {};

	$.widget('wd.ProductPrice', $.wd.widget, {

		// Create
		_create: function() {

			var $widget = this;
			var $element = $($widget.element);
			var pid = $element.attr('data-widget-pid');
			var ProductSelection = $element.data('product-selection');
			var PropertyPath = ProductSelection && /\/(\d+\.\d+\/)+/g.test(ProductSelection.PropertyPath) ? ProductSelection.PropertyPath : '';

			var skipCache = browsingContext.Common.Config.Product.SkipCache;

			var updateCachedPrice = function(skuID) {
				var message = {
					ID: pid,
					I: [{
						I: skuID
					}]
				};

				$widget._fetchCachedDescription($.param({
						R: [message]
					}))
					.done(function(response) {
						$widget._updateDescription(response.Prices[0].PriceDescription);
					});
			};

			// Força refresh somente no detalhe do produto
			if (!browsingContext.Page.Product) {
				skipCache = false;
			}

			// Força refresh inicial somente quando é o produto princial do detalhe e não possui variação
			if (skipCache &&
				browsingContext.Page.Product &&
				(browsingContext.Page.Product.ProductID + '') === (pid + '') &&
				browsingContext.Page.Product.SkuID > 0
			) {
				updateCachedPrice(browsingContext.Page.Product.SkuID);
			}

			$widget.subscribe('/wd/product/variation/changed/' + pid, function(e, args) {
				var variation = args.variationContent.sku;
				//				if(variation!=null && variation.isInventoryAvailable)
				if (variation !== null && !args.variationContent.noPriceChange) {
					var element, price;
					element = $widget.element.find('.priceContainer');
					var t = element.html(variation.priceDescription).text();
					element.html(t);

					if (skipCache) {
						updateCachedPrice(variation.productID);
					}
				}
			});

			$widget.subscribe('/wd/product/price/change/variationPath/' + pid + PropertyPath, function(e, variationPath) {
				$widget._fetchCachedDescription({
						R: [{
							ID: pid,
							V: variationPath
						}]
					})
					.done(function(response) {
						$widget._updateDescription(response.Prices[0].PriceDescription);
					});
			});

			$widget.subscribe('/wd/product/price/change/description/' + pid, function(e, data) {
				if (data) {
					$widget._fetchCachedDescription(data, 'POST')
						.done(function(response) {
							$widget._updateDescription(response.Prices[0].PriceDescription);
						});
				}
			});

			$widget.subscribe('/wd/product/variation/optionslist/init/' + pid, function() {
				$element.addClass('wd-hide');
			});
		},
		_fetchCachedDescription: function(data, method) {
			var $self = this;
			method = method ? method.toUpperCase() : 'GET';
			var cacheKey = method + '/' + JSON.stringify(data);

			if (_requestCache[cacheKey]) {
				return _requestCache[cacheKey];
			}

			if (_responseCache[cacheKey]) {
				var dfd = $.Deferred();
				dfd.resolve(_responseCache[cacheKey]);
				return dfd.promise();
			}

			_requestCache[cacheKey] = $self._fetchDescription(data, method);

			return _requestCache[cacheKey]
				.done(function(response) {
					_responseCache[cacheKey] = response;
				})
				.complete(function() {
					_requestCache[cacheKey] = null;
				});
		},
		_fetchDescription: function(data, method) {
			var url;

			if ($.isPlainObject(data)) {
				data = JSON.stringify(data);
			}

			if (!method || method === 'GET') {
				url = browsingContext.Common.Urls.BaseUrl + 'web-api/v1/Shopping/Price/Get';

				return $.ajax({
					url: url,
					type: 'GET',
					cache: true,
					data: data,
				});

			} else {
				url = browsingContext.Common.Urls.BaseUrl + 'web-api/v1/Shopping/Price/Post';

				return $.ajax({
					url: url,
					type: 'POST',
					//cache: true,
					data: data,
					headers: {
						'Content-Type': 'application/json'
					}
				});

			}
		},
		_updateDescription: function(content) {
			var $widget = this;

			$widget.element.find('.priceContainer').html(content);
		}

	});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.buybutton/Scripts/wd.product.buybutton.js*/
try{(function($, window, document, undefined) {

	var submitHandlerHelper = {};
	var _class = {};

	_class.btnBuy = 'btn-buy';
	_class.mustValidated = 'must-validated';
	_class.mustVerify = 'must-verify';
	_class.hasGift = 'has-gift';
	_class.isGiftCertificate = 'is-gift-certificate';
	_class.buying = 'buying';

	submitHandlerHelper.getProductData = function(data) {
		var productData = {};

		_.each(data, function(val, key) {
			if (!!~key.indexOf('Products[0]')) {
				productData[key] = val;
			}
		});

		return productData;
	};

	submitHandlerHelper.cloneProductData = function(productData, index) {
		var cloned = {};

		_.each(productData, function(val, key) {
			key = key.replace(/\[\d*\]/, '[' + index + ']');
			cloned[key] = val;
		});

		return cloned;
	};

	submitHandlerHelper.appendError = function(data, errorMessage) {
		data.errors = data.errors || [];

		data.errors.push(errorMessage);
	};

	submitHandlerHelper.cleanData = function(productData) {
		_.each(productData, function(val, key) {
			if (key !== 'error') {
				delete productData[key];
			}
		});
	};

	$.widget('wd.ProductBuyButton', $.wd.widget, {

		_create: function() {

			var $widget = this,
				$element = $widget.element,
				$form = $('form', $element).not('.js-login, .frm-oneclickbuy'),
				$btnBuy = $('.' + _class.btnBuy, $element),
				$id = this.options.productId,
				//$skuID = $('input[name="Products[0].SkuID"]', $element),
				$baseUrl = $('input[name="BaseUrl"]', $element).val(),
				$basketInModal = $btnBuy.data('basket-in-modal') || false,
				isMix = $form.data('ismix') || false,
				$callbackModalAjax = $btnBuy.data('callback-modal-ajax') || false,
				queryString = window.location.search.slice(1).replace(/\&amp;/g, '&');

			if (queryString) {
				queryString = app.tools.sanitizeString(queryString);
				$element.find('input[name="QueryString"]').val(queryString);
			}

			//var $hasVariation = $('input[name="Products[0].Variations"]', $element).val();
			$widget.isUponRequest = $('.wd-product-uponrequest').length > 0;

			if ($.wd.hasOwnProperty('ProductBuyGrid') || $.wd.hasOwnProperty('ProductBuyGridList') || $.wd.hasOwnProperty('ProductBuyGridComponent')) {
				$widget.options.mustCheckSkuSelected = false;
			}

			if (!$id) {
				console.warn('O widget ProductBuyButton está configurado incorretamente, é necessário definir um jsoptions contendo productId', $widget);
			}

			function buyingActions(start) {
				if (start) {
					$element.addClass(_class.buying);
					$btnBuy.hide();
					$('.loading-buy', $element).css('display', 'block');
				} else {
					$element.removeClass(_class.buying);
					$btnBuy.show();
					$('.loading-buy', $element).css('display', 'none');
				}
			}

			function buy(baseParams) {
				baseParams = baseParams || {};
				// var $serialized = {};
				var $serialized = $.extend({}, baseParams);

				if ($widget.options.hasBuyGrid) {
					$widget._removeEmptyInputs();
					// tem que rodar depois
					$widget._handleFreeItemsInputs();
				}

				$(':input', $form).each(function() {

					var $this = $(this);
					$serialized[$this.attr('name')] = $this.val();

				});

				$widget._executeCustomHandlers($serialized);

				if ($serialized.hasOwnProperty('errors') && $serialized.errors.length) {
					$widget._showErros($serialized);
					$widget.publish('basket/error', {
						errors: $serialized.errors
					});
					return;
				}

				if ($basketInModal) {

					$.extend($serialized, {
						basketInModal: true,
						baseUrl: $baseUrl
					});

				}

				if ($callbackModalAjax) {

					$.extend($serialized, {
						callbackModalAjax: true
					});

				}

				if (isMix) {

					$.extend($serialized, {
						isMix: true
					});

				}

				var paramsAddProduct = {
					params: $serialized,
					redirectTo: $baseUrl + 'carrinho',
					urlBasket: $('form', $element).attr('action')
				};

				if (window.self !== window.top && window.top.$) {
					top.$.publish('basket/add', paramsAddProduct);
				} else {
					$.publish('basket/add', paramsAddProduct);
				}

				if ($('.btn-buy').hasClass('loader')) {
					$form.find('.btn-buy').addClass('start');
				} else {
					// $element.addClass('buying');
					// $btnBuy.hide();
					// $('.loading-buy', $widget.element).css('display', 'block');

					buyingActions(true);
				}

			}

			$widget.buy = buy;

			var checker = {};
			/*
			se for necessário confirmar variações antes de colocar no carrinho.
			deverá retornar FALSE caso a validação não seja necessária, do contrário retorna TRUE
			*/
			checker.confirmVariation = function() {

				function buildMessage() {

					var variationTxt = '';
					// vaar = optsLenght = $widget.selectedSku.options.length;

					_.each($widget.selectedSku.options, function(o) {
						variationTxt += '<br><b>' + o.name + ': <span>' + o.title + '</span></b>';
					});
					var msg = $widget.options.confirmationText;
					//msg = msg.replace('{{variation}}','<b>'+variationTxt+'</b>');
					msg += '<br><span>' + variationTxt + '</span>';
					msg = '<div class="dialog-buybutton-verification">' + msg + '</div>';

					return msg;

				}

				function openModal(msg) {

					$widget.success({
						message: msg,
						'class': 'modal-dialog-buybutton-verification',
						className: 'modal-dialog-buybutton-verification',
						width: $widget.options.verificationModal.width,
						//height:'auto',
						height: $widget.options.verificationModal.height,
						containerCss: {
							//width:'380px',
							width: $widget.options.verificationModal.width,
							height: $widget.options.verificationModal.height //'auto' não funciona
						},
						buttons: [{
							'class': 'no',
							label: JSResource.No + ', alterar',
							onclick: function() {
								$.publish('browsingModal/closeModal/', {});
								$.colorbox.close();
								$.modal().close();
							}
						}, {
							'class': 'yes',
							label: JSResource.Yes + ', colocar no carrinho',
							onclick: function() {
								$.publish('browsingModal/closeModal/', {});
								buy();
								$.colorbox.close();
								$.modal().close();
							}
						}]
					});

				}

				if ($btnBuy.hasClass(_class.mustVerify)) {

					if ($widget.selectedSku) {

						if ($widget.selectedSku.options.length) {
							openModal(buildMessage());
						} else {
							buy();
						}

						return true;

					}

				}

				return false;

			};

			/*
			se for necessário validar a existência de um seller antes de adicionar ao carrinho
			deverá retornar FALSE caso a validação não seja necessária, do contrário retorna TRUE
			*/
			checker.seller = function() {

				var context = browsingContext.Common;

				function isRequired() {
					if (!$widget.options.mustCheckSellerSelected) {
						return false;
					}
					var validationMode = context.Config.Platform.Seller.SellerValidationMode;
					return !context.Config.Platform.MarketPlace.IsEnabled && context.Config.Platform.Seller.SellerSelectionMode === 'SelectedSeller' && (validationMode === 'Basket' || validationMode === 'BasketAndOrder');
				}

				if (isRequired()) {
					$widget.bindSellerModal();
					return true;
				}

				return false;

			};

			/*
			se for necessário validar a existência de um seller se o modulo marketplace estiver ativo
			deverá retornar FALSE caso a validação não seja necessária, do contrário retorna TRUE
			*/
			checker.sellerMarketplace = function() {

				var context = browsingContext.Common;

				if (!context.Config.Platform.MarketPlace.IsEnabled) {
					return false;
				}

				var sellerID = $form.find('[name="SellerID"]').val();

				if (!sellerID) {
					$widget.alert('Não é possível comprar este produto no momento');

					console.warn('Nenhuma oferta encontrada');

					return true;
				}

				return false;

			};

			/*
			se for um giftCertificate(vale-compra) deverá abrir uma modal com os metadados fixos.
			deverá retornar FALSE caso a validação não seja necessária, do contrário retorna TRUE
			*/
			checker.giftCertificate = function() {

				function isRequired() {
					return $btnBuy.hasClass(_class.isGiftCertificate);
				}

				// logic
				if (isRequired()) {
					$widget.bindGiftCertificateModal();
					return true;
				}

				return false;

			};

			/*
			verifica se deverá ser aberto a modal de seleção de variação, caso não, retorna FALSE e segue o fluxo
			*/
			checker.openSelectVariation = function() {

				if (!$widget.options.openSelectVariationModal) {
					return false;
				}

				var id = $id;
				// var skuID = parseInt($form.find('[name="Products[0].SkuID"]').val() || 0);
				var url = $form.find('[name="Products[0].Url"]').val();

				// se for mix ou bundle redireciona pro detalhe do produto
				// if (id == skuID) {
				// 	return false;
				// }

				var separator = '?';
				if (!!~url.indexOf('?')) {
					separator = '&';
				}

				url += separator + 'keepBuy=true';

				$widget.publish('product/selectvariation', {
					productID: id,
					url: url
				});

				return true;

			};

			/*
			verifica se o produto possui um skuID selecionado, caso não, abre a modal
			*/
			checker.skuSelected = function() {

				if (!$widget.options.mustCheckSkuSelected) {
					return false;
				}

				var skuID = $form.find('[name="Products[0].SkuID"]').val(),
					id = $id;

				if (!skuID) {

					var url = $form.find('[name="Products[0].Url"]').val();

					$widget.publish('product/selectvariation', {
						productID: id,
						url: url
					});

					return true;

				}

				return false;

			};

			/*
			verifica se o produto é um bundle, caso sim, abre modal de selectVariation
			*/
			checker.bundle = function() {

				var skuID = parseInt($form.find('[name="Products[0].SkuID"]').val() || 0);
				var id = parseInt($id) || null;
				var url = $form.find('[name="Products[0].Url"]').val();

				if (skuID === id && !$widget.options.bundleAllowed && url) {
					// abre select variations
					$widget.publish('product/selectvariation', {
						productID: $id,
						url: url
					});

					return true;
				}

				return false;

				// var catalogItemID = parseInt($form.data('catalogitemid'));
				// var isMix = $form.data('ismix');
				// var isBundle = catalogItemID === 7 && !isMix;

				// if (isBundle && !isMix) {

				// 	var url = $form.find('[name="Products[0].Url"]').val();

				// 	$widget.publish('product/selectvariation', {
				// 		productID: $id,
				// 		url: url
				// 	});

				// }
				// return isBundle;
			};

			checker.paymentTerm = function() {
				var $el = $('.wd-product-payment-term');
				if (!$el.length) {
					return false;
				}

				$.publish('product/payment/term/check', $form);

				if ($el.data('selected-payment-term-id') != 0 && !$el.data('selected-payment-term-id')) {
					return true;
				}

				return false;
			};

			/*
			se for necessário preencher um formulário de compra antes de adicionar ao carrinho
			deverá retornar FALSE, do contrário retorna TRUE
			*/
			checker.purchasingForm = function() {
				function isRequired() {
					return !!$('.wd-product-purchasing-form', $element).length;
				}

				if (isRequired()) {
					$widget.bindPurchasingFormModal();
					return true;
				}

				return false;
			};

			function onFormSubmit() {
				// TODO, chamar _removeEmptyInputs e reorder antes de validar o modelo
				if ($widget.isModelValid()) {

					// a ordem do IF impacta
					if (!checker.openSelectVariation() &&
						!checker.paymentTerm() &&
						!checker.bundle() &&
						!checker.skuSelected() &&
						!checker.giftCertificate() &&
						!checker.sellerMarketplace() &&
						!checker.seller() &&
						!checker.confirmVariation() &&
						!checker.purchasingForm()
					) {
						buy();
					}

				}

				return false;
			}

			$form.on('submit do-buy', onFormSubmit);

			if ($('.btn-oneclickbuy', $element).length) {
				$('.wd-product-oneclickbuy', $element).ProductOneclickbuy(this.options);
			}

			$.subscribe('basket/error', function() {
				buyingActions(false);
			});

			var $wdvariation = $('.wd-product-variations[pid="' + $id + '"]');
			if ($wdvariation.length) {
				var variationContent = $wdvariation.data('variationContent');
				if (variationContent) {
					$widget._onVariationChange(null, { variationContent: variationContent }, $widget);
				}
			}

		},

		selectedSku: null,

		_onVariationChange: function (e, args, widget) {
			var $widget = widget,
				$element = $($widget.element),
				$skuID = $('input[name="Products[0].SkuID"]', $element);
			var variation = args.variationContent.sku;
			if ($widget.isUponRequest) {
				return false;
			}

			var $btnBuy = $element.find('.' + _class.btnBuy);
			if (variation != null && args.variationContent.noPriceChange != true) {

				if (variation.isInventoryAvailable) {

					$widget.selectedSku = variation;
					$btnBuy.closest('.wd-widget-js').removeClass('notigymewhenavailable-visible');
					$btnBuy.removeAttr('style').removeClass(_class.mustValidated);

				} else {

					$btnBuy.closest('.wd-widget-js').addClass('notigymewhenavailable-visible');
					$btnBuy.hide().addClass(_class.mustValidated);

				}

				$skuID.val(variation.productID);

				if (variation.buyBox && variation.buyBox.SellerID) {
					$widget._setSellerID(variation.buyBox.SellerID);
				}

			} else {

				$widget.selectedSku = null;

				if (args.variationContent.noPriceChange != true) {
					$skuID.val('');
					$btnBuy.addClass(_class.mustValidated);
				}

				if (args.variationContent.hideBuyButton) {
					$element.hide();
				} else {
					$element.show();
				}

				//$widget.element.find('.'+_class.btnBuy).hide();

			}
		},

		_init: function() {

			var $widget = this,
				$element = $($widget.element),
				$id = this.options.productId,
				$skuID = $('input[name="Products[0].SkuID"]', $element);

			// eventos de variacao
			$widget.subscribe('/wd/product/variation/changed/' + $id, function (e, args) {
				$widget._onVariationChange(e, args, $widget);
			});

			$widget.subscribe('/wd/product/buygrid/isactive', function() {
				$widget.options.hasBuyGrid = true;
			});

			$widget.subscribe('/wd/buybutton/mustvalidated/' + $id, function(e, args) {

				var $btnBuy = $widget.element.find('.' + _class.btnBuy);

				if (args.mustValidated == false) {
					$btnBuy.removeAttr('style').removeClass(_class.mustValidated);
				} else {
					$btnBuy.addClass(_class.mustValidated);
				}

				if (args.hasOwnProperty('show') && !$widget.isUponRequest) {

					if (args.show) {
						$btnBuy.show();
					} else {
						$btnBuy.hide();
					}

				}

			});

			$widget.subscribe('/wd/buybutton/clearskuid/' + $id, function() {
				$skuID.val('');
			});

			$widget.subscribe('/wd/buybutton/setskuid/' + $id, function(e, skuid) {
				$skuID.val(skuid);
			});

			$widget.subscribe('/wd/buybutton/formdata/' + $id, function(e, postData) {
				// é necessário limpar os inputs atuais para add os novos
				$widget.element.find('input:hidden[name^="Products"]').remove();
				$.each(postData, function(name, value) {

					if (name == 'items') {
						name = 'Products[0].Variations';
						value = true;
					}

					$('<input/>').attr({
						'type': 'hidden',
						'name': name,
						'value': value
					}).appendTo($element.find('form'));

				});

			});

			$widget.subscribe('/wd/product/variation/optionslist/init/' + $id, function() {
				$element.addClass('wd-hide');
			});

			$widget.subscribe('/wd/buybutton/set/submithandler/' + $id, function(e, data) {
				if (typeof data !== 'object') {
					return;
				}

				$.extend($widget.options._customSubmitHandlers, data);
			});

			// ko.postbox.subscribe('/wd/product/sellers/offers/fetched', function(model) {
			// 	var sellerBuybox;

			// 	if (model.Offers && model.Offers.length) {
			// 		sellerBuybox = model.Offers[0];

			// 		$widget.element.find('[name="SellerID"]').val(sellerBuybox.SellerID);

			// 	}
			// });

		},

		// verifica se o modelo da página é valido
		isModelValid: function() {

			// vars
			var $widget = this,
				$element = $($widget.element),
				$skuID = $('input[name="Products[0].SkuID"]', $element),
				// hasVariationSelected = ($skuID.val() != ''),
				$button = $('.' + _class.btnBuy, $element),
				// htmlError = '',
				hasError = false,
				$variations = $('.wd-product-variations, .wd-product-variations-new'),
				$variationsWidgets = $('.wd-product-buy-grid, .wd-product-buy-grid-list'),
				constraints = {};

			// classes
			function ErrorFactory(cssClass, text) {

				return {
					cssClass: cssClass,
					text: text
				};

			}

			function ConstraintFactory(controlClass, error, registeredPublish, validateChecker) {

				controlClass = controlClass || ''; // classe css que será verificada a ocorrencia no btn-buy
				error = error || {}; // objeto de erro(ErrorFactory)
				error.cssClass = error.cssClass || ''; // classe css de identificação no html de erro
				error.text = error.text || ''; // texto que aparecerá na mensagem de erro
				registeredPublish = registeredPublish || ''; // evento que será publicado via pub/sub
				validateChecker = validateChecker || function() { // função que controla se o publish será executado
					return true;
				};

				function _buildError() {
					return '<span class="error ' + error.cssClass + '-error">' + $widget.options[error.text] + '</span>';
				}

				return {

					any: function() {
						return $button.hasClass(controlClass);
					},

					publish: function() {

						if (validateChecker()) {

							$widget.publish(registeredPublish + $widget.options.productId, {
								errors: [{
									msg: _buildError()
								}]
							});

						}

						return;

					},

					publishCallback: function() {
						// TODO
					}

				};

			}

			// methods
			/*var cleanErrors = function() {
				//$('.wd-product-variations .options .error, .wd-product-gift .error').remove();
				$widget.publish('/wd/buybutton/cleanerrors/' + $id, {});
			};*/

			// logic
			constraints.variation = new ConstraintFactory(_class.mustValidated, new ErrorFactory('variation', 'variationErrorText'), '/wd/product/variation/error/', function() {
				return $variations.length || $variationsWidgets.length;
			});

			constraints.variation.publishCallback = function() {

				// TODO - passar para cada widget o scroll
				if ($variations.length && $skuID.val() === '') {

					$('html, body').animate({
						scrollTop: $('.wd-product-variations, .wd-product-variations-new').offset().top
					}, 605);

				}

			};

			constraints.gift = new ConstraintFactory(_class.hasGift, new ErrorFactory('gift', 'giftVariationErrorText'), '/wd/product/gift/selection/error/', function() {
				return true;
			});

			constraints.gift.publishCallback = function() {

				$('html, body').animate({
					scrollTop: $('.wd-product-gift').offset().top - 150
				}, 605);

			};

			_.each(constraints, function(constraint) {

				if (constraint.any() && !hasError) {

					hasError = true;
					constraint.publish();
					constraint.publishCallback();

				}

			});

			return !hasError;

		},
		_setSellerID: function(sellerID) {
			var $widget = this;
			var $w = $widget.getContext();
			var $sellerID = $w('input[name="SellerID"]');

			if ($sellerID.length) {
				$sellerID.val(sellerID);
			}
		},
		bindSellerModal: function() {

			// vars
			var $widget = this,
				$w = $widget.getContext(),
				productID = $widget.options.productId;

			// classes
			function Seller(data) {

				// vars
				var self = this;
				self.Quantity = ko.observable('1');
				// validar seller para setar o corrente
				self.isCurrent = ko.observable(false);
				//ko.utils.extend(self, data);
				self.SellerID = ko.observable(data.SellerID);
				self.Name = ko.observable(data.SellerName);
				self.HasOfflineDeliveryMethod = ko.observable(data.HasOfflineDeliveryMethod);
				self.StockBalance = ko.observable(data.StockBalance);
				self.PointOfSale = data.PointOfSale;
				self.IsPurchasable = ko.observable(data.IsPurchasable);

				// methods
				self.Select = function() {
					self.isCurrent(true);
					var selected = ko.toJS(self);
					ko.postbox.publish('/wd/buybutton/sellermodal/selected/' + productID, selected);
					// if($widget.options.sellerModalMustBeRedirect)
					// 	$widget.buy();
				};

				// subscribers
				ko.postbox.subscribe('/wd/buybutton/sellermodal/selected/' + productID, function(args) {
					if (args.SellerID !== self.SellerID()) {
						self.isCurrent(false);
					}
				});

			}

			function ModalViewModel() {

				var self = this;

				// vars
				self.loadingText = ko.observable('Carregando...');
				self.isLoading = ko.observable(true);
				self.sellers = ko.observableArray([]);
				self.selectedSeller = ko.observable(null);
				self.title = ko.observable($widget.options.sellerModal.title);
				self.message = ko.observable($widget.options.sellerModal.msg);
				self.enableBuy = ko.computed(function() {
					return self.selectedSeller() && self.selectedSeller().SellerID > 0;
				});

				// methods
				self.loadData = function() {

					var data = $widget.options.sellerModalModel || $w('form').not('.js-login').first().serialize();

					$.ajax({
						//url: browsingContext.Common.Urls.BaseUrl + "web-api/v1/Shopping/Seller/GetAll",
						url: browsingContext.Common.Urls.BaseUrl + 'web-api/v1/Shopping/Seller/GetSellerPurchasing',
						data: data,
						type: 'GET',
						headers: {
							'Content-Type': 'application/json'
						}
					}).success(function(r) {
						if (r.ResponseCallback && r.ResponseCallback.hasOwnProperty('Code') && r.ResponseCallback.Code == 'SelectVariation') {
							document.location.href = $w('form').find('input[name="Products[0].Url"]').val();
						} else {
							//app.log('loaded data', r);
							if (r && r.hasOwnProperty('Result')) {
								_.map(r.Result, function(el) {
									self.sellers.push(new Seller(el));
								});
							}
							self.isLoading(false);
							$.publish('browsingModal/centerModal/');
						}
					});

				};

				self.buy = function() {

					$widget.publish('/wd/buybutton/sellermodal/buy/' + productID, {
						selectedSeller: self.selectedSeller()
					});

					self.loadingText('Redirecionando...');
					self.isLoading(true);

					var execute = $widget.options.sellerModalSubmitAction || $widget.buy;
					execute(self.selectedSeller().SellerID);
					// $widget.buy();

				};

				self.cancel = function() {
					$.colorbox.close();
					$.modal().close();
				};

				//subscribers
				ko.postbox.subscribe('/wd/buybutton/sellermodal/selected/' + productID, function(args) {

					if (args.Quantity > 1) {
						$w('[name="Products[0].Quantity"]').val(args.Quantity);
					}

					$w('[name="SellerID"]').val(args.SellerID);
					self.selectedSeller(args);

				});

			}

			// methods
			var getTemplate = function() {

				var tpl = $w().data('seller-template');

				if (!tpl) {
					tpl = $w('#sellerModalTemplate').html();
					$w().data('seller-template', tpl);
				}

				return tpl;

			};

			var openModal = function() {

				var onOpen = function($el) {

					var el = $el ? $el.find('.seller-modal')[0] : window;
					var modalViewModel = new ModalViewModel();
					ko.cleanNode(el);
					ko.applyBindings(modalViewModel, el);
					// Load initial data via Ajax
					modalViewModel.loadData();
					$widget.publish('/wd/buybutton/sellermodal/open/' + productID, {});

				};

				var customClass = 'wd-buybutton-seller-modal';

				$widget.modal({
					element: getTemplate(),
					onComplete: onOpen,
					'class': customClass,
					'customClass': customClass,
					width: $widget.options.sellerModal.width,
					height: $widget.options.sellerModal.height,
				});

				return;

			};

			openModal();
			return;

		},

		bindGiftCertificateModal: function() {

			// vars
			var $widget = this,
				$w = $widget.getContext(),
				productID = $widget.options.productId;

			// methods
			var getTemplate = function() {

				var tpl = $w().data('gift-certificate-template');

				if (!tpl) {
					tpl = $w('#giftCertificateModalTemplate').html();
					$w().data('gift-certificate-template', tpl);
				}

				return tpl;

			};

			var handleFields = function(form) {
				var $form = $(form);
				var $btnForm = $w('form[name="formBuyButton"]');

				$btnForm.find('.giftcertificate-prop-email').val($form.find('[name="giftcertificate-prop-email"]').val());
				$btnForm.find('.giftcertificate-prop-name').val($form.find('[name="giftcertificate-prop-name"]').val());
				$btnForm.find('.giftcertificate-prop-message').val($form.find('[name="giftcertificate-prop-message"]').val());
			};

			var bindModalElements = function(scope) {
				var $scope = $(scope);

				var oValidate = {
					rules: {
						'giftcertificate-prop-name': {
							required: true,
							maxlength: 100
						},
						'giftcertificate-prop-message': {
							required: true,
							maxlength: 500
						},
						'giftcertificate-prop-email': {
							required: true,
							email: true,
							maxlength: 80
						},

					},

					submitHandler: function(form) {

						handleFields(form);

						$.publish('browsingModal/closeModal/', {});
						$.colorbox.close();

						// evita problemas de modal de erro
						setTimeout($widget.buy, 100);
						// $widget.buy();

						return false;
					}
				};
				var $form = $scope.find('.gift-certificate-modal form');
				$form.unbind();
				$widget.validate($form, oValidate);
				$form.on('submit', function(e) {
					e.preventDefault();
				});
			};

			var openModal = function() {

				var onOpen = function($el) {

					var el = $el ? $el : $('.gift-certificate-modal');

					bindModalElements(el);
					$widget.publish('/wd/buybutton/giftcertifictemodal/open/' + productID, {});
				};

				var customClass = 'wd-buybutton-giftcertificate-modal';

				$widget.modal({
					element: getTemplate(),
					onComplete: onOpen,
					'class': customClass,
					'customClass': customClass,
					width: $widget.options.giftCertificateModal.width,
					height: $widget.options.giftCertificateModal.height,
				});

				return;

			};

			openModal();
			return;
		},

		bindPurchasingFormModal: function() {
			var $widget = this;
			var $w = $widget.getContext();
			var productID = $widget.options.productId;

			var $purchasingForm = $w('.wd-product-purchasing-form');

			if (!$purchasingForm.length) {
				return;
			}

			var renameProperty = function(propName) {
				var fromStr = 'ExtendedProperties';
				var toStr = 'Products[0].FormData'

				if (!propName || propName.indexOf(fromStr) === -1) {
					return propName;
				}

				return propName.replace(fromStr, toStr);
			};

			$purchasingForm.ProductPurchasingForm('openModal', function($form) {
				app.closeModal();

				if (!$form || !$form.length) {
					$widget.buy();
					return;
				}

				var formData = $form.serializeArray();

				if (!formData || !formData.length) {
					$widget.buy();
					return;
				}

				var $serializedData = {};

				_(formData).each(function(d) {
					$serializedData[renameProperty(d.name)] = d.value;
				});

				$widget.buy($serializedData);

				return false;
			});
		},

		_handleFreeItemsInputs: function() {
			var $widget = this,
				$element = $($widget.element);

			var handleIndex = function($el, index) {
				var name = $el.attr('name').replace(/\[\d*\]/, '[' + index + ']');
				$el.attr('name', name);
			};
			if ($widget.options.hasBuyGrid) {
				$element.find('input[name*="SelectedFreeItem"].input-cloned').remove();
				var itemsCount = $element.find('input[name*="Quantity"]').length;
				var $freeIteminputs = $element.find('input[name*="SelectedFreeItem"]');
				if (itemsCount > 1) {

					for (var i = 0; i >= (itemsCount - 1); i++) {
						$freeIteminputs.each(function() {
							var $imp = $(this);
							var $clone = $imp.clone();
							handleIndex($clone, i);
							$clone.addClass('input-cloned');
							$imp.closest('form').append($clone);
						});
					}
				}

			}
		},

		_removeEmptyInputs: function() {

			var $widget = this,
				$element = $($widget.element);

			$('input[name*="Quantity"][value="0"]', $element).not('input[name*="SelectedFreeItem"]').each(function() {
				var $this = $(this);
				var index = ($this.attr('name')).replace('Products[', '').replace('].Quantity', '');
				$('input[name*="Products[' + index + ']"]', $element).not('input[name*="SelectedFreeItem"]').remove();
			});
			$widget._reorderFormInputs();
		},

		_reorderFormInputs: function() {

			var $widget = this;
			var $element = $($widget.element);

			$('form', $element).not('.js-login').each(function() {

				var form = $(this);
				var products = form.find('input[type="hidden"][name^="Products["]').not('input[name*="SelectedFreeItem"]');

				if (products.length) {
					var first = products.first().attr('name').match(/\[\d*\]/)[0].replace(/\D/g, '');
					var recount = 0;

					products.map(function(i, product) {
						var name = $(product).attr('name'),
							index = name.match(/\[\d*\]/)[0].replace(/\D/g, '');

						if (index != first) {
							recount++;
							first = index;
						}

						$(product).attr('name', function(t, name) {
							var rename = name.replace(/\[\d*\]/, '[' + recount + ']');
							return rename;
						});
					});
				}
			});
		},

		_executeCustomHandlers: function($serialized) {
			var $widget = this;
			if (!$.isEmptyObject($widget.options._customSubmitHandlers)) {
				/*
					Ordena pelo nome do handler registrado ex: 21-HandlerName

					TESTE:

					var sr = {
						'1-teste': 1,
						'3-teste': 3,
						'11-teste': 11,
						'12-teste': 12,
						'1.1-teste': '1.1',
						'99-teste': 99,
						'21-teste': 21,
						'321-teste': 321,
						'4.32-teste': '4.32',
						'111-teste': 111,
						'1.11-teste': '1.11',
						'1.12-teste': '1.12',
						'2-ta': 2,
						'2.2-tata': '2.2'
					};

					_.sortBy(sr, function(num, key){ return key; });
					(12) [1, "1.1", "1.11", "1.12", 11, 111, 12, 21, 3, 321, "4.32", 99]

				 */
				var submitHandlers = _.sortBy($widget.options._customSubmitHandlers, function(num, key) {
					return key;
				});
				_.each(submitHandlers, function(handler) {
					if (handler && $.isFunction(handler)) {
						handler($serialized, submitHandlerHelper);
					}
				});
			}
		},
		_showErros: function($serialized) {
			var $widget = this;
			var errorModalClass = 'wd-product-buybutton-errors';
			var message = $serialized.errors.join('<br>');

			$widget.alert(message, null, {
				'class': errorModalClass,
				className: errorModalClass
			});
		}
	});

	// options defaults
	$.extend($.wd.ProductBuyButton.prototype.options, {
		bundleAllowed: false, // setado pelo widge de bundle;
		openSelectVariationModal: false,
		_customSubmitHandlers: {},
		verificationModal: {
			width: 380,
			height: 'auto'
		},
		sellerModal: {
			width: 680,
			height: 'auto',
			title: 'Selecione uma loja',
			msg: '',
			onSubmit: null
		},
		giftCertificateModal: {
			width: 680,
			height: 'auto',
			title: 'Vale-presente',
			msg: '',
			onSubmit: null
		},
		sellerModalSubmitAction: null,
		sellerModalModel: null,
		hasBuyGrid: false,
		mustCheckSkuSelected: true,
		mustCheckSellerSelected: true,
		//sellerModalMustBeRedirect: true,
		giftVariationErrorText: 'Escolha uma opção disponível',
		variationErrorText: 'Escolha uma opção disponível',
		confirmationText: 'As opções selecionadas para o produto estão corretas?'
	});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.buybutton/Scripts/wd.product.oneclickbuy.js*/
try{;
(function($, window, document, undefined) {
	$.widget('wd.ProductOneclickbuy', $.wd.ProductBuyButton, {

		config: {
			isLoaded: false,
			isAuthenticated: false,
			isOneClickBuyActive: false,
			hasEntireConfiguration: false,
			hasEntireConfigurationMessage: '',
			canPurchase: false,
			basketItemsCount: 0,
			address: {
				name: '',
				contactName: '',
				addressLine: '',
				city: '',
				neighbourhood: '',
				number: '',
				state: '',
				addressNotes: '',
				landmark: '',
				postalCode: ''
			}
		},
		// Create
		_create: function() {
			var widget = this,
				$w = widget.getContext(),
				$id = this.options.productId,
				$document = $(document);

			widget.isUponRequest = $('.wd-product-uponrequest').length > 0;

			window._lock = false;

			var queryString = window.location.search.slice(1).replace(/\&amp;/g, '&');
			$w('input[name="QueryString"]').val(queryString);

			$w('.url-read-more').bind('click', function(e) {
				widget.alert($w('.message-read-more').html(), 'info', {
					className: "wd-product-oneclickbuy-modal read-more"
				});
			});

			widget.subscribe('/wd/product/variation/changed/' + $id, function(e, args) {
				var variation = args.variationContent.sku;
				if (variation != null) {
					$w().data('skuID', variation.productID);
				} else {
					$w().data('skuID', undefined);
				}
			});

			$w().on('click', '.needed-authentication a:not(.url-read-more)', function(e) {
				e.preventDefault();
				var $thisBtn = $(this);

				if ($w().hasClass('login-in-modal')) {

					$document.bind('wdProfileLogin_failed', function(e, args) {
						$document.bind('cbox_closed', function() {
							$thisBtn.trigger('click');
							$document.unbind('cbox_closed');
							$document.unbind('wdProfileLogin_failed');
						});
					});
					//widget.unsubscribe('/profile/login/failed');

					// verificar skuid selecionado e monta url de callback
					var locationPath = location.pathname,
						queryStrings = widget.getQueryString(),
						queryStringSignal = '?';
					_.each(queryStrings, function(el, i) {
						if (el != "v" && el != "cb") {
							locationPath += queryStringSignal + el + '=' + queryStrings[el];
							queryStringSignal = '&';
						}
					});
					// var callBackUrl = browsingContext.Common.Urls.CurrentUrl;
					var callBackUrl = locationPath;
					callBackUrl = callBackUrl + queryStringSignal + 'cb=productOneclickbuy.doBuy';
					queryStringSignal = '&';
					if ($w().data('skuID')) {
						callBackUrl = callBackUrl + queryStringSignal + 'v=' + $w().data('skuID');
						//callBackUrl = callBackUrl+'&v='+$w().data('skuID');
					}

					widget.ajax({
						url: $(this).attr('href'),
						type: 'get',
						success: openModal
					});

					function openModal(r) {
						r = app.widgetStarter(r);
						var $content = $('<div class="wd-modal authentication-modal wd-product-oneclickbuy-login-modal"></div>').html(r);
						$content.find('.wd-profile-login form.js-login')
							.attr('action', browsingContext.Common.Urls.Profile.Login.Index)
							.append('<input type="hidden" name="url" value="' + callBackUrl + '" /><input type="hidden" name="redirectToUrl" value="true" />');
						//console.log('r',r,'content',content);
						widget.publish('/login/cb', function() {
							widget.doBuy();
						});
						app.modal({
							html: $content,
							width: "auto",
							height: "auto",
							className: "authentication-modal"
							// ,onComplete:function(){
							// 	$('.wd-modal .wd-profile-login form.js-login').attr('action', browsingContext.Common.Urls.Profile.Login.Index);
							// }
						});
					};
				} else {
					widget.alert('Você precisa estar logado para comprar com um clique. <div class="button-wrapper"><a class="btn" href="' + browsingContext.Common.Urls.FullBaseUrl + 'Login/?Url=' + window.location.href + '">Ir para a página de login</a></div>', undefined, {
						className: "wd-product-oneclickbuy-modal"
					});
				}

			});

			widget.loadEvents();
			widget.reload();

			// se tiver na querystring o parâmetro cb com o valor productOneclickbuy.doBuy abre modal como resultado do login
			function handleLoginModal() {
				if (app.tools.getParameterByName('cb') == "productOneclickbuy.doBuy") {
					if (app.browserSupport.hasPushstate) {
						var locationPath = location.pathname,
							queryStrings = widget.getQueryString(),
							queryStringSignal = '?';
						_.each(queryStrings, function(el, i) {
							if (el != "cb") {
								locationPath += queryStringSignal + el + '=' + queryStrings[el];
								queryStringSignal = '&';
							}
						});
						history.replaceState({}, $('title').text(), locationPath);
					}

					setTimeout((function() {
						widget.justClickBuy(widget);
					}), 700);
				}
			};
			// se o browsingContext estiver pronto executa a tarefa, se não aguarda o evento
			if (browsingContext.Common.ready) {
				handleLoginModal();
			} else {
				$.subscribe('/wd/browsing/context/ready', function() {
					handleLoginModal();
				});
			}
		},

		loadEvents: function() {
			var widget = this,
				$element = $(widget.element),
				$id = this.options.productId,
				$skuID = $('input[name="Products[0].SkuID"]', $element);

			// escuta os eventos das variações selecionadas
			widget.subscribe('/wd/product/variation/changed/' + $id, function(e, args) {
				var variation = args.variationContent.sku;

				if (widget.isUponRequest)
					return false;

				if (variation != null && variation.isInventoryAvailable && args.variationContent.noPriceChange != true) {
					$skuID.val(variation.productID);
					widget.element.find('.btn-oneclickbuy').removeAttr('style');
				} else {
					if (args.variationContent.noPriceChange != true) {
						$skuID.val('');
					}
					//$('.btn-oneclickbuy').hide();
				}

			});

			// escuta a validação do modelo que o será lançado
			// --> pelo widget do botão
			// --> widget do bundle
			widget.subscribe('/wd/product/oneclickbuy/changed/' + $id, function(e, args) {
				if (args.hasOwnProperty('state')) {
					if (args.state == 'validateFinished') {
						// se o modelo foi validado com sucesso
						if (args.isValid) {
							widget.doBuy(args.model);
						} else {
							var $button = $('.wrapper-button .btn-oneclickbuy', $element),
								$productVariationOptions = '',
								htmlError = '<span class="error">Escolha uma opção disponível</span>';
							$('.wd-product-variations .options .error, .wd-product-gift .error').remove();
							//verifica se ja temos label.selected se sim coloca erro no proximo option select combo
							if ($('.wd-product-variations label.selected').size() > 0) {
								$productVariationOptions = $('.wd-product-variations .subvariation-group .options:visible').filter(':last');
							} else {
								$productVariationOptions = $('.wd-product-variations .options:visible').filter(':last')
							}

							if ($button.hasClass('has-gift')) {
								$('#content-wrapper .wd-product-gift').append(htmlError);
							}

							$productVariationOptions.append(htmlError);
							$('html, body').animate({
								scrollTop: $('.wd-product-variations').offset().top
							}, 605);
						}
					}
				}
			});

			// escuta os eventos do one click buy
			widget.subscribe('/wd/product/oneclickbuy/changed/' + $id, function(e, args) {
				// verifica se há a propriedade state
				if (args.hasOwnProperty('state')) {
					// nesse estado o evento foi chamado para validar o modelo da página,
					// valida e lança um evento com a validação do modelo.
					// neste caso o widget de one click buy vai escutar a validação finalizada e tomar a determinada ação
					if (args.state == 'mustValidate') {
						// funcao de validação do modelo
						var validModel = widget.isModelValid();
						widget.publish('/wd/product/oneclickbuy/changed/' + $id, {
							widget: this,
							state: 'validateFinished',
							isValid: validModel // aqui determina se o modelo é valido
						});

					}
					// nesse estado o widget do one click buy lançou o evento e determina que o
					// serviço de compra com um click vai ser inicializado, esconde o botão de comprar portanto
					else if (args.state == 'initialized') {
						widget.element.find('.btn-buy').hide();
					}
					// finalizou o acesso ao serviço, libera o botão
					else if (args.state == 'finalized') {
						widget.element.find('.btn-buy').removeAttr('style');
					}
				}
			});
		},

		justClickBuy: function(widget) {
			var $w = widget.getContext(),
				$productID = $w('input[name="Products[0].ProductID"]').val(),
				$skuID = $w('input[name="Products[0].SkuID"]'),
				hasVariationSelected = ($skuID.val() != ''),
				b = browsingContext.Common.Urls.BaseUrl;
			widget.publish('/wd/product/oneclickbuy/changed/' + $productID, {
				widget: this,
				state: 'mustValidate'
			});
		},

		_lock: false,
		buying: function(not) {
			var widget = this,
				$w = widget.getContext();
			$w('.wrapper-button').removeClass('hidden');
			not ? $w().removeClass('buying') : $w().addClass('buying');
		},
		doBuy: function(model) {
			var widget = this,
				$w = widget.getContext(),
				$productID = $w('input[name="Products[0].ProductID"]').val(),
				$serialized = $w('.frm-oneclickbuy').serialize(),
				b = browsingContext.Common.Urls.FullBaseUrl;

			if (window._lock) {
				return false;
			}

			window._lock = true;

			// o model pode ter vindo do evento de validação de modelo
			// se caso vier vai executar o ajax com esses dados
			// senao busca os dados do form
			model = model || $serialized;
			//console.log('model ',model);
			widget.publish('/wd/product/oneclickbuy/changed/' + $productID, {
				widget: this,
				state: 'initialized'
			});
			widget.buying();
			//$w('.btn-oneclickbuy').hide();
			//$w('.loading-oneclickbuy').show();

			//do the ajax
			$.ajax({
				url: b + 'Payment/OneClickBuy/OneClickBuyProduct',
				type: 'post',
				dataType: 'json',
				cache: false,
				data: model,
				complete: function() {
					widget.publish('/wd/product/oneclickbuy/changed/' + $productID, {
						widget: this,
						state: 'finalized'
					});
					//					$w('.loading-oneclickbuy').hide();
					//					$w('.btn-oneclickbuy').show();
					window._lock = false;

				},
				success: function(response) {
					if (response && response.hasOwnProperty('IsValid')) {
						if (response.IsValid) {
							window.location.href = browsingContext.Common.Urls.Shopping.Checkout.Start;
						} else {
							widget.buying(true);
							// $w('.loading-oneclickbuy').hide();
							// $w('.btn-oneclickbuy').show();

							var errorMsg = "",
								mustLogin = false;

							for (var x = 0; x < response.Errors.length; x++) {
								// Keys
								// 		401 - Deve Logar
								//		301 - Deve redirecionar
								if (response.Errors[x].Key == "301") {

									window.location.href = b + response.Errors[x].ErrorMessage;
									break;
								} else if (response.Errors[x].Key == "401") {
									mustLogin = true;
									errorMsg = response.Errors[x].ErrorMessage;
									break;
								}

								if (x != 0)
									errorMsg += "<br />";

								errorMsg += response.Errors[x].ErrorMessage + '!';
							}

							if (jQuery.trim(errorMsg) != '') {
								errorMsg = '<div id="message-oneclickbuy"><span>' + errorMsg + '</span><br /></div>';
								errorMsg += 'Se você preferir, siga a compra clicando no botão abaixo:<br /><br />';
								errorMsg += '<button class="btn-buy-normal">Comprar este produto</button>';
								$('.btn-buy-normal').live('click', function() {
									$('.btn-buy').trigger('click');
								});
							}

							if (mustLogin) {
								widget.publish('/login/showlogin', {
									widget: this
									//cb: function(){widget.doBuy()}
									//cb: function(){$.publish('/login/success', {})}
									//cb: widget.doBuy;
								});

								widget.subscribe('/login/success', function() {
									widget.doBuy();
								});
							} else if (errorMsg != "")
								widget.alert(errorMsg, undefined, {
									className: "wd-product-oneclickbuy-modal"
								});
						}
					}
				},
				error: function() {
					widget.buying(true);
					// $w('.loading-oneclickbuy').hide();
					// $w('.btn-oneclickbuy').show();
				}
			});

		},

		reload: function() {
			var widget = this,
				$w = this.getContext(),
				b = browsingContext.Common.Urls.BaseUrl,
				provider = $w('input[name="Provider"]').val();

			widget.config.isLoaded = true;
			widget.config.isAuthenticated = browsingContext.Common.Shopper.IsAuthenticated;
			widget.config.isOneClickBuyActive = browsingContext.Common.Config.Payment.IsAnyOneClickBuyProviderActive;

			if (widget.config.isOneClickBuyActive) {
				// $w('.or-oneclickbuy').show();

				$w('.frm-oneclickbuy').bind('submit', function(e) {
					e.preventDefault();
					e.stopPropagation();
					return false;
				});

				if (widget.config.isAuthenticated) {
					$w('.wrapper-button').removeClass('hidden');

					$w('.btn-oneclickbuy').bind('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						widget.justClickBuy(widget);
					});
				} else {
					$w('.needed-authentication').show();

					//CORE-4850
					//$w('.wrapper-button').show();
					var $button = $w('.wrapper-button .btn-oneclickbuy'),
						$productVariationOptions = '',
						htmlError = '<span class="error">Escolha uma opção disponível</span>';

					$button.bind('click', function(e) {

						e.preventDefault();
						e.stopPropagation();

						if (!widget.config.isAuthenticated) {
							widget.alert('Você precisa estar logado para comprar com um clique. <div class="button-wrapper"><a class="btn" href="' + browsingContext.Common.Urls.FullBaseUrl + 'Login/?Url=' + window.location.href + '">Ir para a página de login</a></div>', undefined, {
								className: "wd-product-oneclickbuy-modal"
							});

							return;
						}

						if ($button.hasClass('must-validated')) {
							var $allButtons = $button.closest('.wd-buy-button').find('.btn-buy');
							$('.wd-product-variations .options .error, .wd-product-gift .error').remove();
							$allButtons.attr('disabled', true).addClass('disabled');

							//verifica se ja temos label.selected se sim coloca erro no proximo option select combo
							if ($('.wd-product-variations label.selected').size() > 0) {
								$productVariationOptions = $('.wd-product-variations .subvariation-group .options:visible').filter(':last');
							} else {
								$productVariationOptions = $('.wd-product-variations .options:visible').filter(':last')
							}

							if ($button.hasClass('has-gift')) {
								$('.wd-product-gift div.wd-content div').append(htmlError);
							}

							$productVariationOptions.append(htmlError);

							$('html, body').animate({
								scrollTop: $('.wd-product-variations, .wd-product-variations-new').offset().top
							}, 605);
							//$widget.alert('Escolha as opções disponíveis para o produto.');
							return false;
						} else {
							$productID = $w('input[name="Products[0].ProductID"]').val();
							widget.publish('/login/showlogin', {
								widget: widget,
								cb: function() {
									widget.publish('/wd/product/oneclickbuy/changed/' + $productID, {
										widget: this,
										state: 'validateFinished',
										isValid: true
									});
									//widget.justClickBuy(widget);
								}
							});
						}

					}).show();

				}
			}

			return;

		},
		getQueryString: function() {
			var vars = [],
				hash;
			if (window.location.href.indexOf('?') > -1) {
				var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).replace(/\&amp;/g, '&').split('&');
				for (var i = 0; i < hashes.length; i++) {
					hash = hashes[i].split('=');
					vars.push(hash[0]);
					vars[hash[0]] = hash[1];
				}
			}
			return vars;
		}

	});

	//options defaults
	$.extend($.wd.ProductOneclickbuy.prototype.options, {

	});
})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/product.list/Scripts/wd.product.list.js*/
try{; (function ($, window, document, undefined) {
	window.productListUniqueID = 0;

	var bindPager = function(widget, $w){
			$w('.product-list-pager a').click(function(){
				$.ajax({
					url:$(this).data('href'),
					type:'get',
					success: function(r){
						var responseContent = $(r).find('.wd-product-list .wd-content').html();
						widget.element.find('.wd-product-list .wd-content').html(responseContent);
						bindPager(widget, $w);
						offSetTop = widget.element.find(".wd-header").first().offset().top;
						$("html,body").animate({scrollTop:offSetTop});
						window.setTimeout(app.widgetStarter,400);
					},
					error:function(e){

					}
				});
			});
		},
		runTransition = false,
		bindLiveScroll = function(widget, $w){
			var $pager = $w('.product-list-pager').first(),
				liveScroll = {},
				uniqueID = $w().data('uniqueID');

			liveScroll = {
				element: '<div class="break"></div><div class="live-scroll" ><span class="icon"></span></div>',
				pagination: {
					"initial": 1,
					"current": 1,
					"difLimiter": 1,
					"object": $pager ,
					"last": parseInt($pager.data('pages-total'))
				}
			};

			$w('.wd-product-list ul.list').after(liveScroll.element);

			//console.debug('on', getNameT($w()), $w().data('uniqueID'), uniqueID);
			$(window).on("scroll.wd"+uniqueID, function() {
				//widget._doScroll(_pagination, location)
				onScroll();
			});

			var onScroll = function(){
				var $obj = $w('.live-scroll'),
					pageTop = $(window).scrollTop(),
					top = ($obj.offset().top) + ($obj.height() / 3);
				top = top - $(window).height();

			   // console.log('ID '+$w().data('uniqueID'),'pageTop-' + pageTop + ' top-' + top, 'obj top', $obj.offset().top);
			   // console.log('is visible', $w().data('uniqueID'), $w().is(':visible'));
				if ($w().is(':visible') && pageTop >= top) {
					nextPage($obj);
					//alert('pagina');
					// console.log('dentro _pagination',_pagination);
				};
			};

			var nextPage = function($obj) {
				var location = window.location;
				//console.debug('off', getNameT($w()), $w().data('uniqueID'));
				$(window).off('scroll.wd'+$w().data('uniqueID'));

				if ((liveScroll.pagination.current <= liveScroll.pagination.last) && runTransition == false) {
					//console.debug('==== run nextPage =====');
					runTransition = true;
					liveScroll.pagination.current++;
					liveScroll.pagination.difLimiter++;

					$obj.addClass('load');

					var urlAjax = $w('.product-list-pager a[title="'+liveScroll.pagination.current+'"]').data('href');
					//alert(url);
					$.ajax({
						//url: location.origin + location.pathname + '.partial?pg=' + _pagination.current + hash + sorter + search,
						url:urlAjax,
						//dataFilter: app.widgetStarter,
						success: function(data) {
							//var resp = $(data).find('.wd-browsing-grid-list ul').html();
							$obj.removeClass('load');

							var responseContent = $(data).find('.wd-product-list .wd-content ul.list').html();
						   // console.log('responseContent',responseContent);
							$w('.wd-product-list .wd-content ul.list').append(responseContent);

							runTransition = false;

							if (liveScroll.pagination.current == liveScroll.pagination.last) {
								$obj.addClass('finished');
								//console.log('ultima pagina');
							} else {
								window.setTimeout((function() {
									$(window).on("scroll.wd"+$w().data('uniqueID'), function() {
										//widget._doScroll(_pagination, location)
										onScroll();
									});
								}), 900)
							}
							window.setTimeout(app.widgetStarter, 400);
						}
					});
				};
			};
		};

	$.widget('wd.ProductList', $.wd.widget, {
		_create: function () {
			var widget = this,
				$w = widget.getContext();

			if($w('.product-list-pager').length){
				bindPager(widget, $w);
				if(widget.element.hasClass('HasLiveScroll')){
					$w().data('uniqueID', productListUniqueID);
					productListUniqueID++;
					bindLiveScroll(widget, $w);
				};
			};
		},

	});

	$.widget('wd.ProductListSet', $.wd.widget, {

		_create: function () {
			var widget = this,
				$w = widget.getContext();

			$('.wd-nav a', widget.element).click(function(e){
				e.preventDefault();
			});
			$('.wd-nav li', widget.element).click(function () {

				/* CLASSE SELECTED NO CLICADO */
				$('.wd-nav li', widget.element).removeClass('wd-selected');
				$(this).addClass('wd-selected');

				/* RECUPERA ID DA DESCRIÇÃO A SER EXIBIDA */
				var src = $('a', this).attr('rel');

				/* DISPLAY NA DESCRIÇÃO SELECIONADA */
				$('.wd-panel', widget.element).addClass('wd-hide');
				$('#' + src, widget.element).removeClass('wd-hide');
			});

			// if($w('.product-list-pager').length){
			//     alert('paginoou');
			// }

		}
	});
})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/browsing.product.carousel.v2/Scripts/wd.browsing.product.carousel.js*/
try{(function($, window, document, undefined) {

	$.widget('wd.BrowsingProductCarouselV2', $.wd.widget, {
		_create: function() {

			//var old_jcarousel = $.fn.jcarousel;
			//$.fn.jcarousel = {};

			/*! jCarousel - v0.3.0 - 2014-01-09
			 * http://sorgalla.com/jcarousel
			 * Copyright (c) 2014 Jan Sorgalla; Licensed MIT */
			(function(t) {
				"use strict";
				var i = t.jCarousel = {};
				i.version = "0.3.0";
				var s = /^([+\-]=)?(.+)$/;
				i.parseTarget = function(t) {
					var i = !1,
						e = "object" != typeof t ? s.exec(t) : null;
					return e ? (t = parseInt(e[2], 10) || 0, e[1] && (i = !0, "-=" === e[1] && (t *= -1))) : "object" != typeof t && (t = parseInt(t, 10) || 0), {
						target: t,
						relative: i
					}
				}, i.detectCarousel = function(t) {
					for (var i; t.length > 0;) {
						if (i = t.filter("[data-jcarousel]"), i.length > 0) return i;
						if (i = t.find("[data-jcarousel]"), i.length > 0) return i;
						t = t.parent()
					}
					return null
				}, i.base = function(s) {
					return {
						version: i.version,
						_options: {},
						_element: null,
						_carousel: null,
						_init: t.noop,
						_create: t.noop,
						_destroy: t.noop,
						_reload: t.noop,
						create: function() {
							return this._element.attr("data-" + s.toLowerCase(), !0).data(s, this), !1 === this._trigger("create") ? this : (this._create(), this._trigger("createend"), this)
						},
						destroy: function() {
							return !1 === this._trigger("destroy") ? this : (this._destroy(), this._trigger("destroyend"), this._element.removeData(s).removeAttr("data-" + s.toLowerCase()), this)
						},
						reload: function(t) {
							return !1 === this._trigger("reload") ? this : (t && this.options(t), this._reload(), this._trigger("reloadend"), this)
						},
						element: function() {
							return this._element
						},
						options: function(i, s) {
							if (0 === arguments.length) return t.extend({}, this._options);
							if ("string" == typeof i) {
								if (s === void 0) return this._options[i] === void 0 ? null : this._options[i];
								this._options[i] = s
							} else this._options = t.extend({}, this._options, i);
							return this
						},
						carousel: function() {
							return this._carousel || (this._carousel = i.detectCarousel(this.options("carousel") || this._element), this._carousel || t.error('Could not detect carousel for plugin "' + s + '"')), this._carousel
						},
						_trigger: function(i, e, r) {
							var n, o = !1;
							return r = [this].concat(r || []), (e || this._element).each(function() {
								n = t.Event((s + ":" + i).toLowerCase()), t(this).trigger(n, r), n.isDefaultPrevented() && (o = !0)
							}), !o
						}
					}
				}, i.plugin = function(s, e) {
					var r = t[s] = function(i, s) {
						this._element = t(i), this.options(s), this._init(), this.create()
					};
					return r.fn = r.prototype = t.extend({}, i.base(s), e), t.fn[s] = function(i) {
						var e = Array.prototype.slice.call(arguments, 1),
							n = this;
						return "string" == typeof i ? this.each(function() {
							var r = t(this).data(s);
							if (!r) return t.error("Cannot call methods on " + s + " prior to initialization; " + 'attempted to call method "' + i + '"');
							if (!t.isFunction(r[i]) || "_" === i.charAt(0)) return t.error('No such method "' + i + '" for ' + s + " instance");
							var o = r[i].apply(r, e);
							return o !== r && o !== void 0 ? (n = o, !1) : void 0
						}) : this.each(function() {
							var e = t(this).data(s);
							e instanceof r ? e.reload(i) : new r(this, i)
						}), n
					}, r
				}
			})(jQuery),
			function(t, i) {
				"use strict";
				var s = function(t) {
					return parseFloat(t) || 0
				};
				t.jCarousel.plugin("jcarousel", {
					animating: !1,
					tail: 0,
					inTail: !1,
					resizeTimer: null,
					lt: null,
					vertical: !1,
					rtl: !1,
					circular: !1,
					underflow: !1,
					relative: !1,
					_options: {
						list: function() {
							return this.element().children().eq(0)
						},
						items: function() {
							return this.list().children()
						},
						animation: 400,
						transitions: !1,
						wrap: null,
						vertical: null,
						rtl: null,
						center: !1
					},
					_list: null,
					_items: null,
					_target: null,
					_first: null,
					_last: null,
					_visible: null,
					_fullyvisible: null,
					_init: function() {
						var t = this;
						return this.onWindowResize = function() {
							t.resizeTimer && clearTimeout(t.resizeTimer), t.resizeTimer = setTimeout(function() {
								t.reload()
							}, 100)
						}, this
					},
					_create: function() {
						this._reload(), t(i).on("resize.jcarousel", this.onWindowResize)
					},
					_destroy: function() {
						t(i).off("resize.jcarousel", this.onWindowResize)
					},
					_reload: function() {
						this.vertical = this.options("vertical"), null == this.vertical && (this.vertical = this.list().height() > this.list().width()), this.rtl = this.options("rtl"), null == this.rtl && (this.rtl = function(i) {
							if ("rtl" === ("" + i.attr("dir")).toLowerCase()) return !0;
							var s = !1;
							return i.parents("[dir]").each(function() {
								return /rtl/i.test(t(this).attr("dir")) ? (s = !0, !1) : void 0
							}), s
						}(this._element)), this.lt = this.vertical ? "top" : "left", this.relative = "relative" === this.list().css("position"), this._list = null, this._items = null;
						var i = this._target && this.index(this._target) >= 0 ? this._target : this.closest();
						this.circular = "circular" === this.options("wrap"), this.underflow = !1;
						var s = {
							left: 0,
							top: 0
						};
						return i.length > 0 && (this._prepare(i), this.list().find("[data-jcarousel-clone]").remove(), this._items = null, this.underflow = this._fullyvisible.length >= this.items().length, this.circular = this.circular && !this.underflow, s[this.lt] = this._position(i) + "px"), this.move(s), this
					},
					list: function() {
						if (null === this._list) {
							var i = this.options("list");
							this._list = t.isFunction(i) ? i.call(this) : this._element.find(i)
						}
						return this._list
					},
					items: function() {
						if (null === this._items) {
							var i = this.options("items");
							this._items = (t.isFunction(i) ? i.call(this) : this.list().find(i)).not("[data-jcarousel-clone]")
						}
						return this._items
					},
					index: function(t) {
						return this.items().index(t)
					},
					closest: function() {
						var i, e = this,
							r = this.list().position()[this.lt],
							n = t(),
							o = !1,
							l = this.vertical ? "bottom" : this.rtl && !this.relative ? "left" : "right";
						return this.rtl && this.relative && !this.vertical && (r += this.list().width() - this.clipping()), this.items().each(function() {
							if (n = t(this), o) return !1;
							var a = e.dimension(n);
							if (r += a, r >= 0) {
								if (i = a - s(n.css("margin-" + l)), !(0 >= Math.abs(r) - a + i / 2)) return !1;
								o = !0
							}
						}), n
					},
					target: function() {
						return this._target
					},
					first: function() {
						return this._first
					},
					last: function() {
						return this._last
					},
					visible: function() {
						return this._visible
					},
					fullyvisible: function() {
						return this._fullyvisible
					},
					hasNext: function() {
						if (!1 === this._trigger("hasnext")) return !0;
						var t = this.options("wrap"),
							i = this.items().length - 1;
						return i >= 0 && !this.underflow && (t && "first" !== t || i > this.index(this._last) || this.tail && !this.inTail) ? !0 : !1
					},
					hasPrev: function() {
						if (!1 === this._trigger("hasprev")) return !0;
						var t = this.options("wrap");
						return this.items().length > 0 && !this.underflow && (t && "last" !== t || this.index(this._first) > 0 || this.tail && this.inTail) ? !0 : !1
					},
					clipping: function() {
						return this._element["inner" + (this.vertical ? "Height" : "Width")]()
					},
					dimension: function(t) {
						return t["outer" + (this.vertical ? "Height" : "Width")](!0)
					},
					scroll: function(i, s, e) {
						if (this.animating) return this;
						if (!1 === this._trigger("scroll", null, [i, s])) return this;
						t.isFunction(s) && (e = s, s = !0);
						var r = t.jCarousel.parseTarget(i);
						if (r.relative) {
							var n, o, l, a, h, u, c, f, d = this.items().length - 1,
								_ = Math.abs(r.target),
								p = this.options("wrap");
							if (r.target > 0) {
								var v = this.index(this._last);
								if (v >= d && this.tail) this.inTail ? "both" === p || "last" === p ? this._scroll(0, s, e) : t.isFunction(e) && e.call(this, !1) : this._scrollTail(s, e);
								else if (n = this.index(this._target), this.underflow && n === d && ("circular" === p || "both" === p || "last" === p) || !this.underflow && v === d && ("both" === p || "last" === p)) this._scroll(0, s, e);
								else if (l = n + _, this.circular && l > d) {
									for (f = d, h = this.items().get(-1); l > f++;) h = this.items().eq(0), u = this._visible.index(h) >= 0, u && h.after(h.clone(!0).attr("data-jcarousel-clone", !0)), this.list().append(h), u || (c = {}, c[this.lt] = this.dimension(h), this.moveBy(c)), this._items = null;
									this._scroll(h, s, e)
								} else this._scroll(Math.min(l, d), s, e)
							} else if (this.inTail) this._scroll(Math.max(this.index(this._first) - _ + 1, 0), s, e);
							else if (o = this.index(this._first), n = this.index(this._target), a = this.underflow ? n : o, l = a - _, 0 >= a && (this.underflow && "circular" === p || "both" === p || "first" === p)) this._scroll(d, s, e);
							else if (this.circular && 0 > l) {
								for (f = l, h = this.items().get(0); 0 > f++;) {
									h = this.items().eq(-1), u = this._visible.index(h) >= 0, u && h.after(h.clone(!0).attr("data-jcarousel-clone", !0)), this.list().prepend(h), this._items = null;
									var g = this.dimension(h);
									c = {}, c[this.lt] = -g, this.moveBy(c)
								}
								this._scroll(h, s, e)
							} else this._scroll(Math.max(l, 0), s, e)
						} else this._scroll(r.target, s, e);
						return this._trigger("scrollend"), this
					},
					moveBy: function(t, i) {
						var e = this.list().position(),
							r = 1,
							n = 0;
						return this.rtl && !this.vertical && (r = -1, this.relative && (n = this.list().width() - this.clipping())), t.left && (t.left = e.left + n + s(t.left) * r + "px"), t.top && (t.top = e.top + n + s(t.top) * r + "px"), this.move(t, i)
					},
					move: function(i, s) {
						s = s || {};
						var e = this.options("transitions"),
							r = !!e,
							n = !!e.transforms,
							o = !!e.transforms3d,
							l = s.duration || 0,
							a = this.list();
						if (!r && l > 0) return a.animate(i, s), void 0;
						var h = s.complete || t.noop,
							u = {};
						if (r) {
							var c = a.css(["transitionDuration", "transitionTimingFunction", "transitionProperty"]),
								f = h;
							h = function() {
								t(this).css(c), f.call(this)
							}, u = {
								transitionDuration: (l > 0 ? l / 1e3 : 0) + "s",
								transitionTimingFunction: e.easing || s.easing,
								transitionProperty: l > 0 ? function() {
									return n || o ? "all" : i.left ? "left" : "top"
								}() : "none",
								transform: "none"
							}
						}
						o ? u.transform = "translate3d(" + (i.left || 0) + "," + (i.top || 0) + ",0)" : n ? u.transform = "translate(" + (i.left || 0) + "," + (i.top || 0) + ")" : t.extend(u, i), r && l > 0 && a.one("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd", h), a.css(u), 0 >= l && a.each(function() {
							h.call(this)
						})
					},
					_scroll: function(i, s, e) {
						if (this.animating) return t.isFunction(e) && e.call(this, !1), this;
						if ("object" != typeof i ? i = this.items().eq(i) : i.jquery === void 0 && (i = t(i)), 0 === i.length) return t.isFunction(e) && e.call(this, !1), this;
						this.inTail = !1, this._prepare(i);
						var r = this._position(i),
							n = this.list().position()[this.lt];
						if (r === n) return t.isFunction(e) && e.call(this, !1), this;
						var o = {};
						return o[this.lt] = r + "px", this._animate(o, s, e), this
					},
					_scrollTail: function(i, s) {
						if (this.animating || !this.tail) return t.isFunction(s) && s.call(this, !1), this;
						var e = this.list().position()[this.lt];
						this.rtl && this.relative && !this.vertical && (e += this.list().width() - this.clipping()), this.rtl && !this.vertical ? e += this.tail : e -= this.tail, this.inTail = !0;
						var r = {};
						return r[this.lt] = e + "px", this._update({
							target: this._target.next(),
							fullyvisible: this._fullyvisible.slice(1).add(this._visible.last())
						}), this._animate(r, i, s), this
					},
					_animate: function(i, s, e) {
						if (e = e || t.noop, !1 === this._trigger("animate")) return e.call(this, !1), this;
						this.animating = !0;
						var r = this.options("animation"),
							n = t.proxy(function() {
								this.animating = !1;
								var t = this.list().find("[data-jcarousel-clone]");
								t.length > 0 && (t.remove(), this._reload()), this._trigger("animateend"), e.call(this, !0)
							}, this),
							o = "object" == typeof r ? t.extend({}, r) : {
								duration: r
							},
							l = o.complete || t.noop;
						return s === !1 ? o.duration = 0 : t.fx.speeds[o.duration] !== void 0 && (o.duration = t.fx.speeds[o.duration]), o.complete = function() {
							n(), l.call(this)
						}, this.move(i, o), this
					},
					_prepare: function(i) {
						var e, r, n, o, l = this.index(i),
							a = l,
							h = this.dimension(i),
							u = this.clipping(),
							c = this.vertical ? "bottom" : this.rtl ? "left" : "right",
							f = this.options("center"),
							d = {
								target: i,
								first: i,
								last: i,
								visible: i,
								fullyvisible: u >= h ? i : t()
							};
						if (f && (h /= 2, u /= 2), u > h)
							for (;;) {
								if (e = this.items().eq(++a), 0 === e.length) {
									if (!this.circular) break;
									if (e = this.items().eq(0), i.get(0) === e.get(0)) break;
									if (r = this._visible.index(e) >= 0, r && e.after(e.clone(!0).attr("data-jcarousel-clone", !0)), this.list().append(e), !r) {
										var _ = {};
										_[this.lt] = this.dimension(e), this.moveBy(_)
									}
									this._items = null
								}
								if (o = this.dimension(e), 0 === o) break;
								if (h += o, d.last = e, d.visible = d.visible.add(e), n = s(e.css("margin-" + c)), u >= h - n && (d.fullyvisible = d.fullyvisible.add(e)), h >= u) break
							}
						if (!this.circular && !f && u > h)
							for (a = l;;) {
								if (0 > --a) break;
								if (e = this.items().eq(a), 0 === e.length) break;
								if (o = this.dimension(e), 0 === o) break;
								if (h += o, d.first = e, d.visible = d.visible.add(e), n = s(e.css("margin-" + c)), u >= h - n && (d.fullyvisible = d.fullyvisible.add(e)), h >= u) break
							}
						return this._update(d), this.tail = 0, f || "circular" === this.options("wrap") || "custom" === this.options("wrap") || this.index(d.last) !== this.items().length - 1 || (h -= s(d.last.css("margin-" + c)), h > u && (this.tail = h - u)), this
					},
					_position: function(t) {
						var i = this._first,
							s = i.position()[this.lt],
							e = this.options("center"),
							r = e ? this.clipping() / 2 - this.dimension(i) / 2 : 0;
						return this.rtl && !this.vertical ? (s -= this.relative ? this.list().width() - this.dimension(i) : this.clipping() - this.dimension(i), s += r) : s -= r, !e && (this.index(t) > this.index(i) || this.inTail) && this.tail ? (s = this.rtl && !this.vertical ? s - this.tail : s + this.tail, this.inTail = !0) : this.inTail = !1, -s
					},
					_update: function(i) {
						var s, e = this,
							r = {
								target: this._target || t(),
								first: this._first || t(),
								last: this._last || t(),
								visible: this._visible || t(),
								fullyvisible: this._fullyvisible || t()
							},
							n = this.index(i.first || r.first) < this.index(r.first),
							o = function(s) {
								var o = [],
									l = [];
								i[s].each(function() {
									0 > r[s].index(this) && o.push(this)
								}), r[s].each(function() {
									0 > i[s].index(this) && l.push(this)
								}), n ? o = o.reverse() : l = l.reverse(), e._trigger(s + "in", t(o)), e._trigger(s + "out", t(l)), e["_" + s] = i[s]
							};
						for (s in i) o(s);
						return this
					}
				})
			}(jQuery, window),
			function(t) {
				"use strict";
				t.jcarousel.fn.scrollIntoView = function(i, s, e) {
					var r, n = t.jCarousel.parseTarget(i),
						o = this.index(this._fullyvisible.first()),
						l = this.index(this._fullyvisible.last());
					if (r = n.relative ? 0 > n.target ? Math.max(0, o + n.target) : l + n.target : "object" != typeof n.target ? n.target : this.index(n.target), o > r) return this.scroll(r, s, e);
					if (r >= o && l >= r) return t.isFunction(e) && e.call(this, !1), this;
					for (var a, h = this.items(), u = this.clipping(), c = this.vertical ? "bottom" : this.rtl ? "left" : "right", f = 0;;) {
						if (a = h.eq(r), 0 === a.length) break;
						if (f += this.dimension(a), f >= u) {
							var d = parseFloat(a.css("margin-" + c)) || 0;
							f - d !== u && r++;
							break
						}
						if (0 >= r) break;
						r--
					}
					return this.scroll(r, s, e)
				}
			}(jQuery),
			function(t) {
				"use strict";
				t.jCarousel.plugin("jcarouselControl", {
					_options: {
						target: "+=1",
						event: "click",
						method: "scroll"
					},
					_active: null,
					_init: function() {
						this.onDestroy = t.proxy(function() {
							this._destroy(), this.carousel().one("jcarousel:createend", t.proxy(this._create, this))
						}, this), this.onReload = t.proxy(this._reload, this), this.onEvent = t.proxy(function(i) {
							i.preventDefault();
							var s = this.options("method");
							t.isFunction(s) ? s.call(this) : this.carousel().jcarousel(this.options("method"), this.options("target"))
						}, this)
					},
					_create: function() {
						this.carousel().one("jcarousel:destroy", this.onDestroy).on("jcarousel:reloadend jcarousel:scrollend", this.onReload), this._element.on(this.options("event") + ".jcarouselcontrol", this.onEvent), this._reload()
					},
					_destroy: function() {
						this._element.off(".jcarouselcontrol", this.onEvent), this.carousel().off("jcarousel:destroy", this.onDestroy).off("jcarousel:reloadend jcarousel:scrollend", this.onReload)
					},
					_reload: function() {
						var i, s = t.jCarousel.parseTarget(this.options("target")),
							e = this.carousel();
						if (s.relative) i = e.jcarousel(s.target > 0 ? "hasNext" : "hasPrev");
						else {
							var r = "object" != typeof s.target ? e.jcarousel("items").eq(s.target) : s.target;
							i = e.jcarousel("target").index(r) >= 0
						}
						return this._active !== i && (this._trigger(i ? "active" : "inactive"), this._active = i), this
					}
				})
			}(jQuery),
			function(t) {
				"use strict";
				t.jCarousel.plugin("jcarouselPagination", {
					_options: {
						perPage: null,
						item: function(t) {
							return '<a href="#' + t + '">' + t + "</a>"
						},
						event: "click",
						method: "scroll"
					},
					_pages: {},
					_items: {},
					_currentPage: null,
					_init: function() {
						this.onDestroy = t.proxy(function() {
							this._destroy(), this.carousel().one("jcarousel:createend", t.proxy(this._create, this))
						}, this), this.onReload = t.proxy(this._reload, this), this.onScroll = t.proxy(this._update, this)
					},
					_create: function() {
						this.carousel().one("jcarousel:destroy", this.onDestroy).on("jcarousel:reloadend", this.onReload).on("jcarousel:scrollend", this.onScroll), this._reload()
					},
					_destroy: function() {
						this._clear(), this.carousel().off("jcarousel:destroy", this.onDestroy).off("jcarousel:reloadend", this.onReload).off("jcarousel:scrollend", this.onScroll)
					},
					_reload: function() {
						var i = this.options("perPage");
						if (this._pages = {}, this._items = {}, t.isFunction(i) && (i = i.call(this)), null == i) this._pages = this._calculatePages();
						else
							for (var s, e = parseInt(i, 10) || 0, r = this.carousel().jcarousel("items"), n = 1, o = 0;;) {
								if (s = r.eq(o++), 0 === s.length) break;
								this._pages[n] = this._pages[n] ? this._pages[n].add(s) : s, 0 === o % e && n++
							}
						this._clear();
						var l = this,
							a = this.carousel().data("jcarousel"),
							h = this._element,
							u = this.options("item");
						t.each(this._pages, function(i, s) {
							var e = l._items[i] = t(u.call(l, i, s));
							e.on(l.options("event") + ".jcarouselpagination", t.proxy(function() {
								var t = s.eq(0);
								if (a.circular) {
									var e = a.index(a.target()),
										r = a.index(t);
									parseFloat(i) > parseFloat(l._currentPage) ? e > r && (t = "+=" + (a.items().length - e + r)) : r > e && (t = "-=" + (e + (a.items().length - r)))
								}
								a[this.options("method")](t)
							}, l)), h.append(e)
						}), this._update()
					},
					_update: function() {
						var i, s = this.carousel().jcarousel("target");
						t.each(this._pages, function(t, e) {
							return e.each(function() {
								return s.is(this) ? (i = t, !1) : void 0
							}), i ? !1 : void 0
						}), this._currentPage !== i && (this._trigger("inactive", this._items[this._currentPage]), this._trigger("active", this._items[i])), this._currentPage = i
					},
					items: function() {
						return this._items
					},
					_clear: function() {
						this._element.empty(), this._currentPage = null
					},
					_calculatePages: function() {
						for (var t, i = this.carousel().data("jcarousel"), s = i.items(), e = i.clipping(), r = 0, n = 0, o = 1, l = {};;) {
							if (t = s.eq(n++), 0 === t.length) break;
							l[o] = l[o] ? l[o].add(t) : t, r += i.dimension(t), r >= e && (o++, r = 0)
						}
						return l
					}
				})
			}(jQuery),
			function(t) {
				"use strict";
				t.jCarousel.plugin("jcarouselAutoscroll", {
					_options: {
						target: "+=1",
						interval: 3e3,
						autostart: !0
					},
					_timer: null,
					_init: function() {
						this.onDestroy = t.proxy(function() {
							this._destroy(), this.carousel().one("jcarousel:createend", t.proxy(this._create, this))
						}, this), this.onAnimateEnd = t.proxy(this.start, this)
					},
					_create: function() {
						this.carousel().one("jcarousel:destroy", this.onDestroy), this.options("autostart") && this.start()
					},
					_destroy: function() {
						this.stop(), this.carousel().off("jcarousel:destroy", this.onDestroy)
					},
					start: function() {
						return this.stop(), this.carousel().one("jcarousel:animateend", this.onAnimateEnd), this._timer = setTimeout(t.proxy(function() {
							this.carousel().jcarousel("scroll", this.options("target"))
						}, this), this.options("interval")), this
					},
					stop: function() {
						return this._timer && (this._timer = clearTimeout(this._timer)), this.carousel().off("jcarousel:animateend", this.onAnimateEnd), this
					}
				})
			}(jQuery);
			// End jCarousel

			var widget = this;

			Async(function(){

				var $w = widget.getContext();
				var o = widget.options;

				var scrollQty = o.scroll || 1;

				$.each(o, function(k,v){ if (typeof v === 'string') o[k] = v.toLowerCase(); });

				var _$jcarousel = $w('.wd-product-list > .wd-product-list').jcarousel(o);
				//$('.wd-product-list > ul ', widget.element).jcarousel({ visible: 3, scroll: 1 });

				switch (widget.options.layout) {
					//case 'fixed': $('.jcarousel-container-horizontal', widget.element).addClass('jcarousel-container-fixed');break;
					case 'fixed':
					case 'fluid':
						$w('.jcarousel-container-horizontal').addClass('jcarousel-container-fluid');
						break;
				}

				// wtf??
				// switch (widget.options.vertical) {
				//     case true :
				//     var cls = 'jcarousel-vertical';
				//     widget.element.addClass(cls);
				//     $('.wd-product-list > .wd-product-list', widget.element).addClass(cls);
				//     break;
				// }

				if (o.vertical) {
					var cls = 'jcarousel-vertical';
					widget.element.addClass(cls);
					$w('.wd-product-list > .wd-product-list').addClass(cls);
				}

				$w('.jcarousel-control-prev')
					.on('jcarouselcontrol:active', function() {
						$(this).removeClass('inactive');
					})
					.on('jcarouselcontrol:inactive', function() {
						$(this).addClass('inactive');
					})
					.jcarouselControl({
						// Options go here
						target: '-=' + scrollQty
					});

				$w('.jcarousel-control-next')
					.on('jcarouselcontrol:active', function() {
						$(this).removeClass('inactive');
					})
					.on('jcarouselcontrol:inactive', function() {
						$(this).addClass('inactive');
					})
					.jcarouselControl({
						// Options go here
						target: '+=' + scrollQty
					});

				// se estiver com autoscroll habilitado
				if (o.auto && o.auto > 0) {
					_$jcarousel.jcarouselAutoscroll({
						interval: o.auto * 1000,
						target: '+=' + scrollQty,
						autostart: true
					})

					widget.element.mouseenter(function() {
						// carousel.stopAuto();
						_$jcarousel.jcarouselAutoscroll('stop');
					}).mouseleave(function() {
						//carousel.startAuto();
						_$jcarousel.jcarouselAutoscroll('start');
					});

				}

				//$.fn.jcarousel = old_jcarousel;

			})();

		}
	});

	// Defaults
	$.extend($.wd.BrowsingProductCarouselV2.prototype.options, {
		auto: 0,
		visible: 4,
		scroll: 1,
		wrap: 'last',
		layout: 'fixed',
		vertical: false
	});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/marketing.newsletter/Scripts/wd.marketing.newsletter.js*/
try{//
// Widget de newsletter
// Esse widget tem responsabilidade de mostrar a caixinha de newsletter e fazer o cadastro
//
// Publish:
//
;
(function($, window, document, undefined) {

	$.widget('wd.MarketingNewsletter', $.wd.widget, {

		_create: function() {
			var widget = this;
			var form = $(widget.element).find("form")[0];
			widget.validate(form, {
				submitHandler: function() {
					widget._submit(form);
					return false;
				},
				ignore: ":hidden"
			});
		},

		_publishSendEvent: function(form) {
			var formObj = {
				name: form.find('name="Name"'),
				email: form.find('name="Email"'),
			};

			this.publish()
		},

		_submit: function(form) {
			form = $(form);
			var widget = this,
				$w = widget.getContext(),
				btnName = "";

			widget.ajax({
				url: baseUrl + 'shopping/newsletter.json',
				type: 'post',
				data: form.serialize(),
				dataType: 'json',
				beforeSend: function() {
					$.publish('wd/MarketingNewsletter/Submit/BeforeSend', {
						form: form
					});
					btnName = form.find('button').attr('disabled', 'disabled').text();
					form
						.find('button').attr('disabled', 'disabled').text("Aguarde")
						.end().find('.loading').show();

				},
				success: function(data) {
					var response = data.Response;

					if (response && response.IsValid) {
						widget._handleSuccess(response);
					} else {
						widget._handleError(response);
					}
				},
				complete: function() {
					$.publish("wd/MarketingNewsletter/Submit/Complete", {});
					$w('.loading').hide();
					form.find('button').removeAttr('disabled').text(btnName);
					btnName = "";
				}
			});

			return false;
		},

		_handleSuccess: function(response) {
			var widget = this,
				$w = this.getContext();
			$w(':input').val('');
			$w('button').removeAttr('disabled');
			$w('.form-wrapper').hide();
			$w('form').append('<div class="message">' + widget.options.messages.subscribeSuccess + '</div>');
		},

		_handleError: function(response) {
			var widget = this,
				$w = this.getContext();
			$w('button').removeAttr('disabled');
			widget.alert(response.Errors[0].ErrorMessage, 'error', {
				className: "wd-marketing-newsletter-modal"
			});
		}

	});

	// Defaults
	$.extend($.wd.MarketingNewsletter.prototype.options, {
		messages: {
			subscribeSuccess: 'Parabéns! Seu cadastro na newsletter foi realizado com sucesso'
		}
	});

	// Validate

	$.extend($.wd.MarketingNewsletter.prototype.options.validate, {
		errorPlacement: $.wd.MarketingNewsletter.prototype.options.validate.errorFlyout,
		rules: {
			Name: {
				required: true
			},
			Email: {
				required: true,
				email: true
			}
		}
	});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/error.summary/Scripts/wd.error.summary.js*/
try{//
// Widget de criação de novo review
// Esse widget tem responsabilidade de mostrar o link para novo review e abrir a modal para o form
//
// Publish:
//

;
$.widget('wd.ErrorSummary', $.wd.widget, {

	_create: function() {

		var widget = this,
			$w = widget.getContext();

		// Se for popup, avisa a tela principal
		if (window && window.opener) {
			try {
				window.opener.$.publish('/Page/Error', $w);
			} catch (err) {}
		}
		// Se for a tela principal, recebe o evento
		if (window && window.opener == null) {
			widget.subscribe('/Page/Error', function(e, w) {
				widget.element.html(w.element.html());
			});

			widget.subscribe('/Page/Response', function(e, r) {
				if (r && !r.IsValid) {
					var htmlError = "";
					for (var i in r.Errors) {
						var err = r.Errors[i];
						if (!err.ErrorGroup || (err.ErrorGroup && err.ErrorGroup != null)) {
							htmlError = err.ErrorMessage || err.Message || "";
							break;
						}
					}
					if (htmlError != "") {
						widget.alert('<div class="erros" style="display:none;">Erro(s):</div><ul><li>' + htmlError + '</li></ul>', 'error', {
							className: "wd-error-summary-modal"
						});
					} else {
						var template = $("#ResponseErrorTmpl").html(),
							html = Mustache.render(template, r);
						widget.element.html(html);
						if ($w().attr('data-mode') === 'modal') {
							widget.alert(html, undefined, {
								className: "wd-error-summary-modal multi-error-modal"
							});
						} else {
							$('html, body').animate({
								scrollTop: 0
							}, 300);
						}
					}
				}
			});
		}

		if ($w().attr('data-mode') === 'modal') {
			setTimeout(function() {
				widget.publish('/Modal/Error', {
					error: $w('.error-summary-message').text()
				});
			}, 0);
			var errors = [];

			setTimeout(function() {
				$w('.error-summary-message').each(function() {
					errors.push($(this).html());
				});
				if (errors.length)
					widget.alert('<div class="erros" style="display:none;">Erro(s):</div><ul><li>' + errors.join('</li><li>') + '</li></ul>', 'error', {
						className: "wd-error-summary-modal"
					});
			}, 0);
		}
	}
});

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/system.login.impersonation/Scripts/wd.system.login.impersonation.js*/
try{; (function($, window, document, undefined) {
	$.widget('wd.SystemLoginImpersonation',  $.wd.widget, {
		// Create
		_create: function () {
			var $widget = this,
				$w = $widget.getContext();

			if(browsingContext.Common.CacheSettings.CacheStrategy == "Cached"){
				// cacheado
				if(browsingContext.Common.ready){
					var isAuthenticated = browsingContext.Common.Shopper.CustomerImpersonationUserName;
	            	if (isAuthenticated != undefined && isAuthenticated != '')
	                	$widget._build();
				}else{
					$.subscribe('/wd/browsing/context/ready', function() {
						var isAuthenticated = browsingContext.Common.Shopper.CustomerImpersonationUserName;
		            	if (isAuthenticated != undefined && isAuthenticated != '')
		                	$widget._build();
					});
				}
				
			}else{
				// não cacheado
				var isAuthenticated = browsingContext.Common.Shopper.CustomerImpersonationUserName;
            	if (isAuthenticated != undefined && isAuthenticated != '')
                	$widget._build();
			};
			
		},
		// reload -> _build
		_build: function() {
			var $widget = this,
				$w = $widget.getContext(),
				//name = $w('input[name="name"]').val(),
				name = browsingContext.Common.Shopper.CustomerImpersonationUserName,
				//singOut = $w('input[name="singOut"]').val(),
				signOut = browsingContext.Common.Urls.Profile.Login.SignOut,
				html = '<div style="padding:10px; letter-spacing: -.7px;"><strong>CORE</strong>COMMERCE</div><div style="position:absolute; right:0; top:0; padding:10px"><span style="color:yellow">Login realizado através do ADMIN - </span> <strong>usuário: ' + name + '</strong> | <a style="color:#FFF; text-decoration:underline;" href="'+signOut+'">SAIR</a></div>';
			
			$('<div/>',{
				html: html,
				'class': 'top-bar-admin',
				'style': 'position:fixed; width:100%; height:30px; background:#333; border-bottom:1px solid #000; color: #FFF; box-shadow: 0px 0px 36px -6px rgba(0,0,0,.4); top:0; left:0;z-index:1000'
			}).appendTo($('body'));
			$('body').css('margin-top', 31);

			$.publish('/wd/system/login/impersonation/built', {});
		}
	});


	//options defaults
	$.extend($.wd.SystemLoginImpersonation.prototype.options, {});
})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/browsing.modal/Scripts/wd.browsing.modal.js*/
try{;
(function($, window, document, undefined) {
	var noOp = $.noop;
	var _PlaceHolder = '<span class="the-modal-placeholder"></span>';
	$.widget('wd.BrowsingModal', $.wd.widget, {
		// Create
		_create: function() {
			var $widget = this,
				$w = $widget.getContext(),
				$primaryModal = $("#mainModal"),
				$auxiliaryModal = $("#auxiliaryModal");

			/* Caso o widget esteja na página, ele substiui o app.modal */
			app.tools.modal = function(options) {
				options = options || {};
				options.width = undefined;
				options.height = undefined;
				$.publish('browsingModal/openMain/', options);
			};
			/* Caso o widget esteja na página, ele substiui o app.modal */
			app.modal = app.tools.modal;
			app.closeModal = app.tools.closeModal = $.modal().close;

			/* Caso o widget esteja na página, ele substiui o app.modal */
			$.wd.widget.prototype.modal = app.tools.modal;
			/* Caso o widget esteja na página, ele substiui o widget.alert */
			$.wd.widget.prototype.alert = function(msg, type, options) {
				var $type = 'alert-' + (type === undefined ? 'warning' : type),
					$el = '<div class="alert ' + $type + '"><div class="message">' + msg + '</div></div>';
				if (window.browsingModal == "true" || window.browsingModal == true) {
					options.width = undefined;
					options.height = undefined;
					options.html = $el;
					$.publish('browsingModal/openMain/', options);
				} else {
					this.modal($.extend({
						element: $el
					}, options));
				}
			};
			$.wd.widget.prototype.error = function(options) {
				$.wd.widget.prototype._opendialog(options);
			};

			$.wd.widget.prototype.confirm = function(options) {
				$.wd.widget.prototype._opendialog(options);
			};

			$.wd.widget.prototype.success = function(options) {
				$.wd.widget.prototype._opendialog(options);
			};

			$.wd.widget.prototype.warn = function(options) {
				$.wd.widget.prototype._opendialog(options);
			};

			$.wd.widget.prototype.dialog = function(options) {
				$.wd.widget.prototype._opendialog(options);
			};

			/* Caso o widget esteja na página, ele substiui o widget._opendialog */
			$.wd.widget.prototype._opendialog = function(options) {
				//console.log('opendialog',this.options, options);
				var $html = $(this.options.dialog.html);
				$html.find('.message').html(options.message);
				$.each(options.buttons || this.options.dialog.buttons, function() {
					var handler = function() {};
					if (typeof this.onclick === "function")
						handler = this.onclick;
					var bt = $('<button class="' + this['class'] + '">' + this.label + '</button>').click(function() {
						handler($.modal);
					});
					$html.find('.button-wrapper').append(bt);
				});
				options.width = undefined;
				options.height = undefined;
				options.html = $html;
				$.publish('browsingModal/openMain/', options);
			};

			/* função para controlar a modal
			 * modal: tipo: Elemento jQuery - Se modal princial ou auxiliar, nunca é passado no publish
			 * html: tipo: Elemento jQUery - html do conteúdo para abrir na modal
			 * customClass: tipo: string - custom class para a modal
			 * onOpenFunction: tipo: function - função para rodar após carregar o html da modal
			 * onCloseFunction: tipo: function - função para rodar após fechar a modal
			 * width: tipo: string - largura da moda,l caso não setado por css
			 * height: tipo: string - altura da modal, caso não setado por css
			 */
			//modal, html, customClass, onOpenFunction, onCloseFunction, width, height, element
			function modalControl(options) {
				var onOpen = options.onOpenFunction || noOp,
					onComplete = options.onComplete || noOp,
					cClass = options.customClass || options.className || " ",
					Modal = options.modal || $primaryModal,
					closeModal = options.onCloseFunction || options.onClosed || noOp,
					//
					// width      = options.width || Math.max(200, $(options.element).width()),
					// height     = options.height || ( $(options.element).height() );
					width = options.width || "auto",
					height = options.height || "auto",

					href = options.href || undefined,
					onCleanup = options.onCleanup || noOp;
				// html       = options.element || options.html || undefined;
				//Abre a modal
				Modal.modal().open({
					//Abre a modal com o html passado
					onOpen: function(el, opt) {
						el.find(".the-modal .the-modal-container").empty();

						//el é o html da modal aberta
						//procura pelo wrapper ".the-modal" e passa o tamanho se for setado
						//caso contrário pega o tamanho default do css do elemento que foi copiado
						el.find(".the-modal").addClass("putted-sizes").css({
							"max-width": isNaN(width) ? width : width + "px",
							"max-height": isNaN(height) ? height : height + "px"
						});

						options.hrefAjax = options.hrefAjax || false;

						options.returnToOrigin = false;
						options.$origin = null;

						$('.the-modal').addClass('opened');

						//procura pelo wrapper "the-modal" e joga o conteúdo da modal lá dentro
						if (options.hrefAjax && options.href !== undefined) { //app.log("Ajax",options);
							$.ajax({
								url: options.href,
								type: 'get',
								success: function(html) {
									el.find(".the-modal .the-modal-container").append(html);
									$('.the-modal').addClass('populated');
									//roda uma função para o conteúdo passado, caso necessário.
									$.publish('browsingModal/centerModal/', {
										el: el
									});
								}
							});
						} else {
							if (typeof(options.href) == "string") { //app.log("iframe",options)
								el.find(".the-modal .the-modal-container").css({
									overflow: 'hidden'
								}).append('<iframe id="iframe-modal" src="' + options.href + '" />');
								$('.the-modal').addClass('populated with-iframe');
								if (height === null) {
									$.publish("browsingModal/resizeModal/Height", {
										height: $("#iframe-modal").contents().find("html").height()
									});
								}
							} else if (options.html !== undefined) { //app.log("html",options)
								el.find(".the-modal .the-modal-container").append(options.html);
								$('.the-modal').addClass('populated');
								//roda uma função para o conteúdo passado, caso necessário.
								$.publish('browsingModal/centerModal/', {
									el: el
								});
							} else if (options.element !== undefined) { //app.log("options.element",options)
								// os elementos da modal precisam ser mantidos para nao perder os eventos nem o scopo no knockout
								// selecionado todos os filhos do seletor
								//var origin = $(options.element);
								//el.find(".the-modal .the-modal-container").append( origin.find(">*") ).attr('data-origin',origin.selector);

								if (options.element.length && options.element[0].tagName == "SCRIPT") {
									el.find(".the-modal .the-modal-container").html(options.element[0].innerHTML);
								} else {
									options.returnToOrigin = true;
									// fix: correção para não perder os binds, legacy colorbox
									if (typeof(options.element) == 'object') {
										options.element.after(_PlaceHolder);
										options.$origin = options.element;
										el.find(".the-modal .the-modal-container").append(options.element);
									} else {
										//el.find(".the-modal .the-modal-container").html($(options.element)[0].outerHTML);
										var $element = $(options.element),
											$modalContainer = el.find(".the-modal .the-modal-container");
										options.$origin = $element;
										$element.after(_PlaceHolder);
										// el.find(".the-modal .the-modal-container").append($element);
										$modalContainer[0].appendChild($element[0]);
									}
								}
								$.publish('browsingModal/centerModal/', {
									el: el
								});
								$('.the-modal').addClass('populated');
								//roda uma função para o conteúdo passado, caso necessário.
							}
						}

						//publica um evento para quando a modal for aberta(Só por precausão mesmo)
						$.publish('browsingModal/opened', {
							el: el,
							opt: options
						});

						onOpen(el, opt);
						onComplete(el, opt);
					},
					onClose: function(el, opts, close) {

						if (options.hasOwnProperty('returnToOrigin') && options.returnToOrigin && options.hasOwnProperty('$origin') && options.$origin) {
							var $placeholder = $('.the-modal-placeholder');
							//console.log('el', el, 'options.$origin', options.$origin);

							//$('.pht')[0].appendChild(options.$origin[0]);
							//$placeholder.parent()[0].appendChild(options.$origin[0]);
							$placeholder.replaceWith(options.$origin);
						}

						// devolve o conteudo da modal para o seu local de origem
						//var container = el.find(".the-modal .the-modal-container");
						//$(container.attr('data-origin')).append(container.find(">*"));

						//console.log('onClose', el, options, opts, close);

						//roda uma função para depois de fechar a modal, caso necessário.
						closeModal(el, opts, close);
						onCleanup(el, opts, close);
						$('.the-modal').removeClass('opened populated with-iframe');

						//publica um evento para quando a modal for fechada(Só por preucausão mesmo)
						$.publish('browsingModal/closed', {
							el: el,
							options: opts,
							close: close
						});
					},
					//Classe do overlay da modal defaultClass + customClass
					overlayClass: 'themodal-overlay ' + cClass,
					//Classe do body da página defaultClass + customClass
					lockClass: 'themodal-lock ' + cClass,
					closeOnEsc: options.closeOnEsc,
					closeOnOverlayClick: options.closeOnOverlayClick
				});
			}

			//Bind de close da modal.
			$('.the-modal .close').on('click', function(e) {
				//e.preventDefault();
				//fecha modal;
				$.modal().close();
				return false;
			});

			$.subscribe('browsingModal/openDialog/', function(e, args) {
				$.wd.widget.prototype._opendialog(args);
			});

			//Subscribe para abrir a primeira modal
			$.subscribe('browsingModal/openMain/', function(e, args) {
				//função que controla a modal
				$.extend(args, {
					/*onOpenFunction: function() {
						$('.the-modal').addClass('opened');
					},
					onCloseFunction: function() {
						$('.the-modal').removeClass('opened');
					},*/
					modal: $primaryModal
				});
				modalControl(args);
				setTimeout(function() {
					$primaryModal.addClass('visible');
					$.publish('browsingModal/centerModal/');
				}, 50);
			});

			//Subscribe para abrir a primeira modal
			$.subscribe('browsingModal/updateMain/', function(e, args) {
				$('#mainModal').removeAttr('style').parent().addClass(args.customClass);
				$('#mainModal .the-modal-container').hide().html(args.html).fadeIn();
			});

			//Subscribe para abrir a modal auxiliar
			$.subscribe('browsingModal/openAux/', function(e, args) {
				$.modal().close();
				$.extend(args, {
					modal: $auxiliaryModal
				});
				//função que controla a modal
				modalControl(args);
			});

			$.subscribe('browsingModal/centerModal/', function(e, args) {
				var w = $(window),
					modal = $(".the-modal"),
					overlay = $('.themodal-overlay'),
					modContain = modal.find('.the-modal-container'),
					heightViewPort = w.height(),
					heightElement = modContain.outerHeight(),
					styles = {};
				overlay.removeClass('modal-oversized');
				if (heightViewPort > heightElement && modal.css('position') === 'absolute') { /// modal menor que a tela
					styles = {
						'margin-top': ((heightElement / 2)) * -1
					};
				} else {
					styles['margin-top'] = 0;
					styles.top = '';
					overlay.addClass('modal-oversized');
				}
				// var heightElement = args.el.find(".the-modal .the-modal-container").outerHeight();
				modal.css(styles);
			});

			//Subscribe para resize de height
			$.subscribe('browsingModal/resizeModal/Height', function(e, args) {
				var finalHeight = args.height || 0;
				$('.the-modal').css("max-height", finalHeight + "px");
				// $('.the-modal:visible').each(function(i,el){
				// 	if($(el).hasClass("with-iframe")){
				// 		finalHeight = args.height;
				// 	}else{
				// 		finalHeight = args.height;
				// 	}
				// 	$(el).css({
				// 		"max-height":finalHeight+"px"
				// 	});
				// });
			});

			//Subscribe para resize de width
			$.subscribe("browsingModal/resizeModal/resizeWidth", function(e, args) {
				var finalWidth = 0;
				$('.the-modal:visible').each(function(i, el) {
					if ($(el).hasClass("with-iframe"))
						finalWidth = args.width || $("#iframe-modal").contents().find("html").width();
					else
						finalWidth = args.width || "";
					$(el).css({
						"max-width": finalWidth + "px"
					});
				});
			});

			$.subscribe('browsingModal/updateModal/', function(e, args) {
				if (args !== undefined)
					$('.the-modal:visible').css(args);
			});

			$.subscribe('browsingModal/closeModal/', function(e, args) {
				//fecha modal;
				$.modal().close();
				return false;
			});

			/*
			 * Usage
			 *	$.publish('browsingModal/openMain/', {
			 *		html: widget.element.find('.modal')[0].outerHTML,
			 *		customClass: "wd-widget-name-modal-eg",
			 *		onOpenFunction:function(){console.log(opened);},
			 *		onCloseFunction:function(){} || false
			 *		width: "300px",
			 *		height: "auto"
			 *	});
			 */
		}
	});

	//options defaults
	$.extend($.wd.BrowsingModal.prototype.options, {

	});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/basket.sendemail/Scripts/wd.basket.sendemail.js*/
try{;
(function($, window, document, undefined) {
	$.widget('wd.BasketSendemail', $.wd.widget, {

		// Create
		_create: function() {
			var $widget = this,
				$w = $widget.getContext();

			$w().hide();

			$form = $w('.frm-send-basket');

			$w('select[name="TemplateID"]').width($w('[name="BasketUrl"]').outerWidth());

			$widget.validate($form, {
				submitHandler: function(form) {
					var data = $form.serialize(),
						fnOpenModal = function(message, type) {
							var messageHtml = '<div class="alert alert-' + type + '"><div class="message" style="text-align:center;">' + message + '</div></div>';
							app.modal({
								html: messageHtml,
								width: 430,
								height: 180,
								className: "modal-basket-send-email",
								onClosed: function() {

								},
								onComplete: function(err) {}
							});
						};

					$.ajax({
						url: browsingContext.Common.Urls.BaseUrl + 'Shopping/OrderCandidate/SendBasket',
						type: 'POST',
						dataType: 'json',
						cache: false,
						data: data,
						beforeSend: function () {
							$('button.btn-send', $form).html('aguarde...').attr('disabled', true);
						},
						success: function (response) {
							fnOpenModal('E-mail enviado com sucesso', 'success');
						},
						error: function (response) {
							fnOpenModal(response, 'error');
						},
						complete: function () {
							$('button.btn-send', $form).html('Enviar').removeAttr('disabled');
						}
					});
				},
				rules: {
					'Email': {
						required: true,
						email: true
					}
				}
			});

			$w('button.open-modal').click(function() {
				$widget.modal({
					element: $w('.modal-send-basket'),
					width: 500,
					className: 'modal-send-basket'
				});
			});

			// faz o append o botão na barra do impersonation
			if ($('.top-bar-admin').length) {
				$w('button.open-modal').clone(true).prependTo($('.top-bar-admin div:eq(1)'));
				$w('button.open-modal').remove();
			}

			if (browsingContext.Common.ready) {
				$('input[name="CustomerID"]', $form).val(browsingContext.Common.Shopper.CustomerID);

			} else {
				$.subscribe('/wd/browsing/context/ready', function() {
					$('input[name="CustomerID"]', $form).val(browsingContext.Common.Shopper.CustomerID);
				});
			}
		}
	});

	//options defaults
	$.extend($.wd.BasketSendemail.prototype.options, {});

})(jQuery, window, document);

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/metadata.knockout/Scripts/wd.metadata.knockout.js*/
try{ko.validation.init({
	registerExtenders: true,
	messagesOnModified: true,
	insertMessages: true,
	parseInputAttributes: true,
	allowHtmlMessages: true,
	messageTemplate: 'customMessageTemplate'
}, true);

ko.validation.makeBindingHandlerValidatable('textInput');
ko.validation.makeBindingHandlerValidatable("value");

ko.validation.rules.cep = {
	validator: function(val) {
		return /^[0-9]{5}-[0-9]{3}$/.test(val);
	},
	message: 'CEP inválido.'
};

// Menssagem padrão para validações de campos obrigatórios
var messageRequired = function(title) {
	return "Campo " + title + " é obrigatório.";
};

ko.validation.rules.cpf = {
	validator: function(cpf) {
		cpf = cpf.replace(/[^0-9]/gi, '');
		while (cpf.length < 11) cpf = '0' + cpf;
		var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
		var a = [];
		var b = 0;
		var c = 11;
		for (i = 0; i < 11; i++) {
			a[i] = cpf.charAt(i);
			if (i < 9) b += (a[i] * --c);
		}
		if ((x = b % 11) < 2) {
			a[9] = 0;
		} else {
			a[9] = 11 - x;
		}
		b = 0;
		c = 11;
		for (y = 0; y < 10; y++) b += (a[y] * c--);
		if ((x = b % 11) < 2) {
			a[10] = 0;
		} else {
			a[10] = 11 - x;
		}
		return ((cpf.charAt(9) == a[9]) && (cpf.charAt(10) == a[10]) && !cpf.match(expReg));
	},
	message: 'CPF inválido.'
};

ko.validation.rules.cnpj = {
	validator: function (cnpj) {
		var b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
		cnpj = cnpj.replace(/[^\d]/g, '');
		console.log('t1');
		var r = /^(0{14}|1{14}|2{14}|3{14}|4{14}|5{14}|6{14}|7{14}|8{14}|9{14})$/;
		if (!cnpj || cnpj.length !== 14 || r.test(cnpj)) {
			return false;
		}
		cnpj = cnpj.split('');

		for (var i = 0, n = 0; i < 12; i++) {
			n += cnpj[i] * b[i + 1];
		}
		n = 11 - n % 11;
		n = n >= 10 ? 0 : n;
		if (parseInt(cnpj[12]) !== n) {
			return false;
		}

		for (i = 0, n = 0; i <= 12; i++) {
			n += cnpj[i] * b[i];
		}
		n = 11 - n % 11;
		n = n >= 10 ? 0 : n;
		if (parseInt(cnpj[13]) !== n) {
			return false;
		}
		return true;
	},
	message: 'CNPJ inválido.'
};

ko.validation.rules['phone-complete'] = {
	validator: function(num, params) {
		var mask = params.field.mask.match(/\d/g);
		if (!num)
			return false;

		if (num.length === 0)
			params.field.disableSuccess(true);
		else
			params.field.disableSuccess(false);
		num = num.match(/\d/g);
		return num && mask && num.length === mask.length || !num;
	},
	message: 'Verifique se o número está completo.'
};

ko.validation.rules['phone-complete-2'] = {
	validator: function(num, params) {
		var mask = params.field.mask.match(/\d/g);
		if (num.length === 0) {
			params.field.disableSuccess(true);
			return true;
		}

		params.field.disableSuccess(false);
		num = num.match(/\d/g);
		return num && mask && num.length === mask.length || !num;

	},
	message: 'Verifique se o número está completo.'
};

ko.validation.registerExtenders();

/* ---- Begin integration of Underscore template engine with Knockout. Could go in a separate file of course. ---- */
ko.underscoreTemplateEngine = function() {};
ko.underscoreTemplateEngine.prototype = ko.utils.extend(new ko.templateEngine(), {
	renderTemplateSource: function(templateSource, bindingContext, options) {
		// Precompile and cache the templates for efficiency
		var precompiled = templateSource.data('precompiled');
		if (!precompiled) {
			precompiled = _.template("<% with($data) { %> " + templateSource.text() + " <% } %>");
			templateSource.data('precompiled', precompiled);
		}
		// Run the template and parse its output into an array of DOM elements
		var renderedMarkup = precompiled(bindingContext).replace(/\s+/g, " ");
		return ko.utils.parseHtmlFragment(renderedMarkup);
	},
	createJavaScriptEvaluatorBlock: function(script) {
		return "<%= " + script + " %>";
	}
});

ko.setTemplateEngine(new ko.underscoreTemplateEngine());
/* ---- End integration of Underscore template engine with Knockout ---- */

var MetadataKo = function() {
	var self = this;
	self.data = {};
	self.validations = [];
	self.prefix = ko.observable('');

	self.init = function(fields, data, prefix, rules, onlyif) {
		prefix = prefix || '';
		self.prefix = prefix;
		self.data = data;
		var i = 0;
		self.fieldsIndex = {};
		self.fields = _.chain(fields).map(function(metadata) {
			// if (!metadata.Name || data[metadata.Name] || !metadata.IsStoreVisible) {
			if (!metadata.Name || !metadata.IsStoreVisible) {
				return false;
			}
			var field = _({
				BindType: metadata.BindType,
				name: metadata.Name,
				alias: metadata.Name.toLowerCase().replace(/\W/gi, '-'),
				label: metadata.DisplayName || '',
				mask: metadata.InputMask || '',
				entity: false,
				maxLength: metadata.MaxLength || false,
				required: metadata.IsRequired || false,
				type: metadata.InputType || '',
				hint: metadata.TemplateHint || '',
				localized: false,
				attr: {},
				options: ko.toJS(metadata.Options) || [],
				disabled: false,
				templateName: 'template-field-' + metadata.InputType.toLowerCase()
			}).extend(rules ? rules(metadata) : {});

			field.css = function(css) {
				var lista = css.slice(0) || [];
				if (field.entity)
					lista.push(field.entity);
				if (field.alias)
					lista.push(field.alias);
				return lista.join(' ');
			};

			if (!ko.isObservable(data[metadata.Name])) {
				data[metadata.Name] = ko.observable('');
			} else {
				field.localized = true;
			}
			var observable = data[metadata.Name];
			field.value = observable;

			var validation = {
				validation: {
					validator: function(v) {
						return true;
					}
				}
			};

			if (metadata.IsRequired) {
				validation = {
					required: {
						onlyIf: onlyif && onlyif(metadata),
						message: messageRequired(metadata.DisplayName)
					}
				};
			} else {
				observable.disableSuccess = true;
			}

			if (metadata.InputType === 'Phone') {
				validation['phone-complete'] = {
					field: observable
				};
				observable.mask = '';
				observable.disableSuccess = ko.observable(false);
			}

			if (field.maxLength > 0 && field.type !== 'Number') {
				validation.maxLength = {
					params: field.maxLength,
					message: "Preencha este campo com no máximo {0} caracteres"
				};
			}
			if (field.type == "Email") {
				validation.email = {
					message: 'Email inválido.'
				};
			}

			if (self.validations && self.validations[metadata.Name]) {
				_(validation).extend(self.validations[metadata.Name]);
			}
			observable.extend(validation);

			if ($("script#" + field.templateName).length === 0) {
				field.templateName = 'template-field-text';
			}

			if (metadata.BindType === "System") {
				field.attr = {
					EntityMetadataID: false,
					Name: false,
					Value: {
						name: [prefix, metadata.Name].join(''),
						id: [prefix.replace(/\[.*\]|\W/gi, ''), metadata.Name].join('_'),
						value: metadata.Value,
						maxlength: field.maxLength,
						placeholder: field.hint
					}
				};
			} else if (metadata.BindType === "Extended") {
				field.attr = {
					EntityMetadataID: {
						name: [prefix, 'ExtendedProperties[].EntityMetadataID'].join(''),
						id: [prefix.replace(/\[.*\]|\W/gi, ''), "ExtendedProperties", "EntityMetadataID", metadata.Name].join('_'),
						value: metadata.EntityMetadataID
					},
					Name: {
						name: [prefix, 'ExtendedProperties[].Name'].join(''),
						id: [prefix.replace(/\[.*\]|\W/gi, ''), "ExtendedProperties", "Name", metadata.Name].join('_'),
						value: metadata.Name
					},
					Value: {
						name: [prefix, 'ExtendedProperties[].Value'].join(''),
						id: [prefix.replace(/\[.*\]|\W/gi, ''), "ExtendedProperties", "Value", metadata.Name].join('_'),
						value: metadata.Value,
						maxlength: field.maxLength
					}
				};
			}
			self.fieldsIndex[metadata.Name] = i;
			i++;
			return field;
		}).compact().value();
	};

};

MetadataKo.prototype.sortify = function(form, prefix) {
	var self = this;
	form = form || 'form';
	prefix = prefix || '';
	var fields = $(form).find(["input[name^='", prefix, "ExtendedProperties[]']"].join(''));
	var i = 0;
	_(fields).map(function(field) {
		field = $(field);
		var attrName = field.attr('name');
		attrName = attrName.replace(/\[\]/, '[' + i + ']');
		field.attr('name', attrName);
		if (/Value$/.test(attrName)) {
			i++;
		}
		return field;
	});
};

MetadataKo.prototype.getAttr = function(name, input) {
	var self = this;
	input = input || 'Value';
	if (self.fields[self.fieldsIndex[name]] && self.fields[self.fieldsIndex[name]].attr) {
		return self.fields[self.fieldsIndex[name]].attr[input];
	}
};
MetadataKo.prototype.getLabel = function(name) {
	var self = this;
	return (self.fields[self.fieldsIndex[name]] || {}).label;
};

MetadataKo.prototype.find = function(match) {
	var self = this;
	var regex = match instanceof RegExp ? match : RegExp(match);
	return _(self.fields).find(function(field, id) {
		return regex.test(ko.toJSON(field));
	});
};

MetadataKo.prototype.localizedFields = function(names) {
	var self = this;
	names = typeof names === 'object' ? names : [names];
	var fields = [];
	_(names).each(function(name) {
		var field = _(self.fields).find(function(f) {
			var regex = name instanceof RegExp ? name : false;
			var localized = regex ? regex.test(f.name + f.label) : f.name === name;
			f.localized = f.localized || localized;
			return localized;
		});
		if (field) {
			fields.push(field);
		}
		return field;
	});
	return fields;
};

MetadataKo.prototype.remainderFields = function() {
	return _(this.fields).where({
		localized: false
	});
};

ko.components.register('metadata_ko', {
	template: {
		element: 'metadata_ko'
	},
	viewModel: function(params) {
		var self = this;
		self.css = [];
		_(self).extend(params);
		_(self.css).union(self.css);
	},
	synchronous: true
});

$(document.body)
	.on('focus', '.validation.error input', function() {
		var self = $(this);
		var validation = self.parents('.validation');
		if (validation) {
			$('.validation').removeClass('showerror');
			validation.addClass('showerror onfocus');
		}
	}).on('blur', '.validation.error input', function() {
		var self = $(this);
		var validation = self.parents('.validation');
		if (validation)
			validation.removeClass('showerror onfocus');
	});

}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
