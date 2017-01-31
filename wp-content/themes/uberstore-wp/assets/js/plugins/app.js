(function ($, window, _) {
	'use strict';
   
	var $doc = $(document),
		win = $(window),
		thb_easing = [0.75, 0, 0.175, 1];

	var SITE = SITE || {};

	SITE = {
		init: function() {
			var self = this,
					obj;

			for (obj in self) {
				if ( self.hasOwnProperty(obj)) {
					var _method =  self[obj];
					if ( _method.selector !== undefined && _method.init !== undefined ) {
						if ( $(_method.selector).length > 0 ) {
							_method.init();
						}
					}
				}
			}
		},
		responsiveNav: {
			selector: '#mobile-toggle',
			target: '#sidr-main',
			init: function() {
				var base = this,
				container = $(base.selector),
				target = $(base.target);

				container.on('click', function() {
					return false;
				});
				container.sidr({
					name: 'sidr-main',
					source: base.target,
					displace:false,
					renaming: false
				});

				target.find('ul li').each(function(){
					if($(this).find('> ul').length > 0) {
						$(this).find('> a').append('<span class="toggle"><i class="fa fa-plus"></i></span>');
						$(this).find('li a').not(":has(i)").prepend('<span><i class="fa fa-angle-right"></i></span>');
					}
				});

				target.find('ul li:has(">ul") > a').click(function(){
					$(this).toggleClass('active');
					$(this).find('i').toggleClass('fa fa-plus').toggleClass('fa fa-minus');
					$(this).parent().find('> ul').stop(true,true).slideToggle();
					return false;
				});
				$('#sidr-close').click(function() {
					$.sidr('close', 'sidr-main');
					return false;
				});
			},
			toggle: function() {
				if( win.width() > 767 ){
					$.sidr('close', 'sidr-main');
				}
			}
		},
		navDropdown: {
			selector: '.sf-menu',
			init: function() {
				var base = this,
						container = $(base.selector),
						item = container.find('li.menu-item-has-children:not(.menu-item-mega-child)');
						
					item.each(function() {
						var that = $(this),
								offset = that.offset(),
								dropdown = that.find('>.sub-menu'),
								children = that.find('li.menu-item-has-children');

						that.hoverIntent(
							function () {
								var window_width = parseInt(win.outerWidth(), 10),
										dropdown_width = parseInt(dropdown.outerWidth(), 10),
										dropdown_offset_left = parseInt(that.offset().left, 10),
										dropdown_move = window_width - dropdown_width - dropdown_offset_left;
								
								that.addClass('sfHover');
								
								if (dropdown_move < 0) {
									dropdown.css("left", dropdown_move-30 + "px");
								}
								dropdown.fadeIn();
								$(this).find('>a').addClass('active');
								
							},
							function () {
								that.removeClass('sfHover');
								dropdown.hide();
								$(this).find('>a').removeClass('active');
							}
						);
						
					});
					
			}
		},
		footerStyle: {
			selector: '#footer_container',
			init: function() {
				var base = this,
						container = $(base.selector);

				base.run(container);

				$(window).resize(function() {
					base.run(container);
				});
			},
			run: function(container) {
				var h;
				container.imagesLoaded(function() {
					h = container.outerHeight();
					$('div[role="main"]').css('margin-bottom', h);
				});
			}
		},
		updateCart: {
			selector: '#quick_cart',
			init: function() {
				var base = this,
						container = $(base.selector);
				container.live({
					mouseenter: function() {
						$(this).find('.cart_holder').slideDown({
							duration: '200',
							easing: $.bez(thb_easing)
						});
					},
					mouseleave: function() {
						$(this).find('.cart_holder').hide();
					}
				});
				$('body').bind('added_to_cart', SITE.updateCart.update_cart_dropdown);
			},
			update_cart_dropdown: function(event) {

				if(typeof event !== 'undefined'){
					var flashInterval = setInterval(function() {
						$(SITE.updateCart.selector).toggleClass('active');
					}, 500);

					setTimeout(function(){ clearInterval(flashInterval); }, 2500);
				}
			}
		},
		flex: {
			selector: '.flex',
			init: function() {
				var base = this,
						container = $(base.selector);
				container.each(function() {
					var that = $(this),
							controls = (that.data('controls') === false ? false : true),
							bullets = (that.data('bullets') === false ? false : true);
					that.imagesLoaded(function() {
						that
						.removeClass('flex-start')
						.flexslider({
							animation: "slide",
							directionNav: controls,
							controlNav: bullets,
							useCSS: false,
							slideshow: false,
							prevText: '<i class="fa fa-angle-left"></i>',
							nextText: '<i class="fa fa-angle-right"></i>'
						});
					});
				});
			}
		},
		productSlider: {
			selector: '#product-nav',
			init: function () {
				var base = this,
						container = $(base.selector),
						images = $('#product-images'),
						zoom = images.data('zoom');

				container.flexslider({
					animation: "slide",
					controlNav: false,
					directionNav: false,
					animationLoop: false,
					slideshow: false,
					itemWidth: 106,
					itemMargin: 10,
					asNavFor: '#product-images'
				});

				images.flexslider({
					animation: "slide",
					controlNav: false,
					directionNav: true,
					animationLoop: false,
					slideshow: false,
					prevText: '<i class="fa fa-angle-left"></i>',
					nextText: '<i class="fa fa-angle-right"></i>',
					sync: "#product-nav",
					start: function(slider) {
						if (zoom) {
							$(slider.slides[0]).easyZoom({
								preventClicks: false
							});
						}
					},
					before: function(slider) {
						if (zoom) {
							$(slider.slides[slider.animatingTo]).easyZoom({
								preventClicks: false
							});
						}
					}
				});
			}
		},
		shareArticleDetail: {
			selector: '.social',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.on('click', function() {
					var left = (screen.width/2)-(640/2),
							top = (screen.height/2)-(440/2)-100;
					window.open($(this).attr('href'), 'mywin', 'left='+left+',top='+top+',width=640,height=440,toolbar=0');
					return false;
				});
			}
		},
		variations: {
			selector: '.variations_form input[name=variation_id]',
			init: function() {
				var base = this,
					container = $(base.selector),
					org = $('.single-price.single_variation').html();
					
					
				container.on('change', function(){ 
					
						var that = $(this),
								val = that.val(),
								phtml,
								images = $('#product-images');
						
						setTimeout(function(){
							if (val) {
								phtml = that.parents('.variations_form').find('.single_variation span.price').html();
							} else {
								phtml = org;	
							}
							$('.price.single_variation').html(phtml);
						}, 100);
					
					
						if ($('.variations_form').length) {
							var variations = [],
									values;
							$('.variations_form').find('select').each(function(){
								variations.push(this.value);
							});
							values = variations.join(",");
							var v = ($('.variations_form select option:selected').val()),
								i = images.find('li[data-variation="'+values+'"]').index(),
								flex = images.data('flexslider');
								
							if (v && flex && (i > -1) ) {
								flex.flexslider(i);
							}
						}
					
					
				});
			}
		},
		carousel: {
			selector: '.owl',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var that = $(this),
							columns = that.data('columns'),
							navigation = (that.data('navigation') === true ? true : false),
							autoplay = (that.data('autoplay') === false ? false : true),
							pagination = (that.data('pagination') === true ? true : false);

					that.owlCarousel({
            //Basic Speeds
            slideSpeed : 1200,

            //Autoplay
            autoPlay : autoplay,
            goToFirst : true,
            stopOnHover: true,

            // Navigation
            navigation : navigation,
            navigationText : ['',''],
            pagination : pagination,

            // Responsive
            responsive: true,
            items : columns,
            itemsDesktop: false,
            itemsDesktopSmall : [980,(columns < 3 ? columns : 3)],
            itemsTablet: [768,(columns < 2 ? columns : 2)],
            itemsMobile : [479,1]
					});

					if (that.hasClass('products')) {
						SITE.shop.init();
					}
				});
			}
		},
		lookbook: {
			selector: '.lookbook',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var that = $(this),
							thumbnails = that.parents('.carousel-container').next('.carousel-container').find('.lookbook-thumbnails');

					function center(number){
						var sync2visible = thumbnails.data("owlCarousel").owl.visibleItems;
						var num = number;
						var found = false;
						for(var i in sync2visible){
							if(num === sync2visible[i]){
								found = true;
							}
						}

						if(found===false) {
							if(num>sync2visible[sync2visible.length-1]) {
								thumbnails.trigger("owl.goTo", num - sync2visible.length+2);
							} else {
							if(num - 1 === -1){
								num = 0;
							}
								thumbnails.trigger("owl.goTo", num);
							}
						} else if(num === sync2visible[sync2visible.length-1]) {
							thumbnails.trigger("owl.goTo", sync2visible[1]);
						} else if(num === sync2visible[0]) {
							thumbnails.trigger("owl.goTo", num-1);
						}

					}
					
					that.owlCarousel({
						//Basic Speeds
						slideSpeed : 1200,

						//Autoplay
						autoPlay : false,
						goToFirst : true,
						stopOnHover: true,

						// Navigation
						navigation : false,
						pagination : false,
						responsiveRefreshRate : 200,

						// Responsive
						responsive: true,
						items : 3,
						itemsDesktop: false,
						itemsDesktopSmall : [980,3],
						itemsTablet: [768,2],
						itemsMobile : [479,1],

						addClassActive: true,
						afterAction : function() {
							var current = this.currentItem;
							thumbnails
							.find(".owl-item")
							.removeClass("synced")
							.eq(current)
							.addClass("synced");

							if (that.hasClass('shortcode')) {
								thumbnails.find(".owl-item").find('img').tooltip({trigger: 'manual', container: 'body'}).tooltip('hide');

								thumbnails.find(".owl-item").eq(current).find('img').tooltip('show');
							}
							if(thumbnails.data("owlCarousel") !== undefined){
								center(current);
							}
						},
					});

					thumbnails.owlCarousel({
						items : 10,
						itemsDesktop      : [1199,10],
						itemsDesktopSmall     : [979,10],
						itemsTablet       : [768,8],
						itemsMobile       : [479,4],
						pagination: false,
						responsiveRefreshRate : 100,
						afterInit : function(el){
							el.find(".owl-item").eq(0).addClass("synced");
						}
					});

					thumbnails.on("click", ".owl-item", function(e){
						e.preventDefault();
						var number = $(this).data("owlItem");
						that.trigger("owl.goTo",number);
					});
				});

			}
		},
		packery: {
			selector: '.packery',
			init: function() {
				var base = this,
				container = $(base.selector);

				container.packery({
					itemSelector: '.product',
					gutter: 0
				}).imagesLoaded(function() {
					container.packery();
				});
			}
		},
		toggle: {
			selector: '.toggle .title',
			init: function() {
				var base = this,
				container = $(base.selector);
				container.each(function() {
					var that = $(this);
					that.on('click', function() {

						if (that.hasClass('toggled')) {
							that.removeClass("toggled").closest('.toggle').find('.inner').slideUp({
								duration: 400,
								easing: $.bez(thb_easing)
							});
						} else {
							that.addClass("toggled").closest('.toggle').find('.inner').slideDown({
								duration: 400,
								easing: $.bez(thb_easing)
							});
						}

					});
				});
			}
		},
		jplayer: {
			selector: '[id^=jplayer_]',
			init: function() {
				var base = this,
				container = $(base.selector);

				container.each(function() {
					var that = $(this),
							iface = that.data('interface'),
							mp3file = that.data('mp3'),
							swffile = that.data('swf');

					that.jPlayer({
						ready: function () {
							$(this).jPlayer("setMedia", {
								mp3: mp3file
							});
						},
						swfPath: swffile,
						cssSelectorAncestor: iface,
						supplied: "mp3"
					});
				});
			}
		},
		blank: {
			selector: '.thb-blank #wrapper',
			init: function() {
				var base = this,
						container = $(base.selector);

				base.resize(container);

				$(window).resize(function() {
					base.resize(container);
				});
				$(window).scroll(function(){
					base.resize(container);
				});
			},
			resize: function(container) {
				var h = container.outerHeight();

				container.css('margin-top', h / -2);
			}
		},
		parallax_bg: {
			selector: 'div[role="main"]',
			init: function() {
				var base = this,
					container = $(base.selector);

					$.stellar({
						horizontalScrolling: false,
						verticalOffset: 40
					});

			}
		},
		animation: {
			selector: '.animation:not(.timertitle)',
			init: function() {
				var base = this,
						container = $(base.selector);

				base.control(container);

				$(window).scroll(function(){
					base.control(container);
				});
			},
			control: function(element) {
				var t = -1;
				element.filter(':not(.animate):in-viewport').each(function () {
					var that = $(this);
							t++;

					setTimeout(function () {
						that.addClass("animate");

						if (that.hasClass('counter')) {
							var f = that.find('.timer'),
									c = (f.data('countto') ? parseInt(f.data('countto'),10) : 100),
									s = (f.data('speed') ? parseInt(f.data('speed'),10) : 1500),
									title = that.find('.timertitle');
							f.countTo({
								from: 0,
								to: c,
								speed: s,
								refreshInterval: 50,
								onComplete: function() {
									title.addClass('animate');
								}
							});
						}
					}, 200 * t);

				});
			}
		},
		bargraph: {
			selector: '.progress_bar',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.filter(':not(.appeared):in-viewport').each(function () {
					var that = $(this),
							i = that.find('>span'),
							c = i.clone(),
							p = i.data('value');

					c.appendTo(i).animate({
							width: p+"%"
					}, 1000, $.bez(thb_easing));

					that.addClass('appeared');
				});
			}
		},
		counter: {
			selector: '.counter',
			init: function() {
				var base = this,
						container = $(base.selector);


				$(window).scroll(function(){
					SITE.animation.control(container);
				});
			}
		},
		customScroll: {
			selector: '.widget_layered_nav ul',
			init: function() {
				var base = this,
						container = $(base.selector);


				container.perfectScrollbar();
			}
		},
		shop: {
			selector: '.products .product',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var that = $(this);

					that
					.find('.add_to_cart_button').on('click', function() {
						if ($(this).data('added-text') !== '') {
							$(this).text($(this).data('added-text'));
						}
					});

				}); // each

			}
		},
		reviews: {
			selector: '#add_review_button',
			init: function() {
				var base = this,
						container = $(base.selector),
						content = $('#add_review');

				container.on('click', function() {
					$(this).slideToggle(400,function() {
						content.stop().slideToggle(400);
					});


					return false;
				});
				content.find('.close').on('click', function() {
					content.stop().slideToggle(400, function() {
						container.slideToggle(400);
					});
					return false;
				});
				$('body').on( 'click', '#respond p.stars a', function(){
					var that = $(this);

					setTimeout(function(){ that.prevAll().addClass('active'); }, 10);
				});
			}
		},
		quantity: {
			selector: '.quantity',
			init: function(el) {
				var base = this,
						container = $(base.selector);
				
				// Quantity buttons
				if (el) {
					el.find( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
				} else {
					$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
				}
				$doc.on( 'click', '.plus, .minus', function() {
			
					// Get values
					var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
						currentVal	= parseFloat( $qty.val() ),
						max			= parseFloat( $qty.attr( 'max' ) ),
						min			= parseFloat( $qty.attr( 'min' ) ),
						step		= $qty.attr( 'step' );
			
					// Format values
					if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) { currentVal = 0; }
					if ( max === '' || max === 'NaN' ) { max = ''; }
					if ( min === '' || min === 'NaN' ) { min = 0; }
					if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) { step = 1; }
			
					// Change the value
					if ( $( this ).is( '.plus' ) ) {
			
						if ( max && ( max === currentVal || currentVal > max ) ) {
							$qty.val( max );
						} else {
							$qty.val( currentVal + parseFloat( step ) );
						}
			
					} else {
			
						if ( min && ( min === currentVal || currentVal < min ) ) {
							$qty.val( min );
						} else if ( currentVal > 0 ) {
							$qty.val( currentVal - parseFloat( step ) );
						}
			
					}
			
					// Trigger change event
					$qty.trigger( 'change' );
			
				});
			}	
		},
		checkout: {
			selector: '.woocommerce-checkout',
			init: function() {

				$('#shippingsteps a').on('click', function() {
					var that = $(this),
						target = (that.data('target') ? $('#'+that.data('target')) : false);

					if (target) {
						$('#shippingsteps li').removeClass('active');
						that.parents('li').addClass('active');
						$('.section').hide();
						target.show();

					}
					$('body').trigger( 'country_to_state_changed');
					return false;
				});

				$('#createaccount', '#checkout_login').on('click', function() {
					$('#checkout_register', '#checkout_login').slideToggle();
					return false;
				});
				$('#guestcheckout', '#checkout_login').on('click', function() {
					$('#shippingsteps a').eq(1).trigger('click');
					return false;
				});
				$('[name=button_address_continue]').on('click', function() {
					$('form.checkout .billing').find('.input-text, select').trigger('change');
					if ($('form.checkout .shipping_address').is(':visible')) { $('form.checkout .shipping_address').find('.input-text, select').trigger('change'); }
					if ($('form.checkout .billing').find('.woocommerce-invalid-required-field:visible').length === 0) {
						$('#shippingsteps a').eq(2).trigger('click');
					}
					return false;
				});
				$('#ship-to-different-address-checkbox').on('change', function() {
					$('.shipping_address').slideToggle('slow', function() {
						if($('.shipping_address').is(':hidden')) {
							$('form.checkout .shipping_address').find('p.form-row').removeClass('woocommerce-invalid-required-field');
						}
					});
					$('body').trigger( 'country_to_state_changed');
					return false;
				});
			}
		},
		myaccount: {
			selector: '.woocommerce-account',
			init: function() {
				$('#my-account-nav a').on('click', function() {
					var that = $(this),
							tabs = $('.tab-pane'),
							target = $(that.attr('href'));

					$('#my-account-nav li').removeClass('active');
					that.parents('li').addClass('active');
					tabs.hide();
					target.fadeIn();

					return false;
				});
				$('#changepassword_btn').on('click', function() {
					$('#changeit').trigger('click');

					return false;
				});
			}
		},
		magnificImage: {
			selector: '[rel="magnific"], .wp-caption a, [rel*="attachment"]',
			init: function() {
				var base = this,
						container = $(base.selector),
						stype;

				container.each(function() {
					if ($(this).hasClass('video')) {
						stype = 'iframe';
					} else {
						stype = 'image';
					}
					$(this).magnificPopup({
						type: stype,
						closeOnContentClick: true,
						fixedContentPos: true,
						mainClass: 'mfp-move-horizontal',
						removalDelay: 500,
						image: {
							verticalFit: true
						}
					});
				});

			}
		},
		magnificInline: {
			selector: '[rel="inline"]',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					var eclass = ($(this).data('class') ? $(this).data('class') : '');

					$(this).magnificPopup({
						type:'inline',
						midClick: true,
						mainClass: 'mfp-move-horizontal ' + eclass,
						removalDelay: 500
					});
				});

			}
		},
		magnificGallery: {
			selector: '[rel="gallery"], .gallery',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.each(function() {
					$(this).magnificPopup({
						delegate: 'a',
						type: 'image',
						closeOnContentClick: true,
						fixedContentPos: true,
						mainClass: 'mfp-move-horizontal',
						removalDelay: 500,
						closeMarkup: '<button title="%title%" class="mfp-close"></button>',
						gallery: {
							enabled: true,
							navigateByImgClick: true,
							preload: [0,1] // Will preload 0 - before current, and 1 after the current image
						},
						image: {
							verticalFit: true,
							titleSrc: function(item) {
								return item.el.attr('title');
							}
						}
					});
				});

			}
		},
		fullHeightContent: {
			selector: '.full-height-content',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				base.control(container);
				
				win.resize(_.debounce(function(){
					base.control(container);
				}, 50));
				
			},
			control: function(container) {
				var a = $('#wpadminbar'),
						ah = (a ? a.outerHeight() : 0);
				
				container.each(function() {
					var _this = $(this),
						height = win.height() - ah;
						
					_this.css('min-height',height);
					
				});
			}
		},
		contact: {
			selector: '#contact-map',
			init: function() {
				var base = this,
						container = $(base.selector),
						mapzoom = container.data('map-zoom'),
						maplat = container.data('map-center-lat'),
						maplong = container.data('map-center-long'),
						mapinfo = container.data('pin-info'),
						pinimage = container.data('pin-image');

				var styles = [{
					stylers: [{
						hue: "#2DB5E2"
					}, {
						saturation: -20
					}]
					}, {
					featureType: "road",
					elementType: "geometry",
					stylers: [{
						lightness: 100
					}, {
						visibility: "simplified"
					}]
					}, {
					featureType: "road",
					elementType: "labels",
					stylers: [{
						visibility: "off"
					}]
				}];

				var latLng = new google.maps.LatLng(maplat,maplong);

				var mapOptions = {
						center: latLng,
						styles: styles,
						zoom: mapzoom,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						scrollwheel: false,
						panControl: true,
						zoomControl: 1,
						mapTypeControl: false,
						scaleControl: false,
						streetViewControl: false
					};

				var map = new google.maps.Map(document.getElementById("contact-map"), mapOptions);

				google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
						var venuemarker = new google.maps.Marker({
								position: latLng,
								map: map,
								icon: pinimage,
								animation: google.maps.Animation.DROP
						});
						map.setCenter(latLng);

					if (mapinfo) {
						var infowindow = new google.maps.InfoWindow({
								content: '<div id="content"><div id="bodyContent"><p>'+mapinfo+'</p></div></div>'
						});

						infowindow.open(map,venuemarker);

						map.setCenter(latLng);

					}
				});

			}
		},
		equalHeights: {
			selector: '[data-equal]',
			init: function() {
				var base = this,
						container = $(base.selector);
				container.each(function(){
					var that = $(this),
							children = that.data("equal"),
							row = that.data('row-detection') ? that.data('row-detection') : false;
					
					that.find(children).matchHeight({
						byRow: row,
						property: 'min-height'
					});	
					that.waitForImages(function() {
						that.find(children).matchHeight({
							byRow: row,
							property: 'min-height'
						});
					});
					 
				});
			}
		},
		styleSwitcher: {
			selector: '#style-switcher',
			init: function() {
				var base = this,
				container = $(base.selector),
				toggle = container.find('.style-toggle'),
				onoffswitch = container.find('.switch');

				toggle.on('click', function() {
					container.add($(this)).toggleClass('active');
					return false;
				});

				onoffswitch.each(function() {
					var that = $(this);
					$(this).find('a').on('click', function() {
						that.find('a').removeClass('active');
						$(this).addClass('active');

						if ($(this).parents('ul').data('name') === 'header') {
							$(document.body).removeClass('notfixed');
							$(document.body).addClass($(this).data('class'));

							$('#header, #header .logo a, #header .desktop-menu ul, #header .desktop-menu .searchlink, .headersearch').attr( "style", "" );
							$('#header').removeClass('fixed').removeClass('small');
							$('#header').addClass($(this).data('class2'));
						}
						return false;
					});
				});

				var style = $('<style type="text/css" id="theme_color" />').appendTo('head');
				container.find('.first').minicolors({
					defaultValue: $('.first').data('default'),
					change: function(hex) {
						style.html('.sf-menu li.current-menu-item, .sf-menu li ul li:hover, .owl-buttons>div:hover, .jp-interface, .filters li a.active, .filters li a:hover, .iconbox.left > span, .iconbox.right > span, ul.accordion > li.active div.title, .toggle .title.toggled, .btn, input[type=submit], .comment-reply-link, .label.red, .dropcap.boxed, .bargraph > span span, .pagenavi ul li.disabled a, .mobile-menu ul li a.active, .taglink:hover, .widget.widget_tag_cloud li > a:hover { background:'+hex+'; } #breadcrumb .name > div { border-color: '+hex+'; } a:hover, .iconbox.top > span { color: '+hex+'; } ::-webkit-selection{ background-color: '+hex+'; } ::-moz-selection{ background-color: '+hex+'; } ::selection{ background-color: '+hex+'; } ');
					}
				});
				container.find('.second').minicolors({
					defaultValue: $('.second').data('default'),
					change: function(hex) {
						style.html('.flex .bulletrow .flex-control-nav.flex-control-paging a.flex-active, .pricing .item.featured .header, .flex .bulletrow .flex-control-nav.flex-control-paging a:hover, .btn.red, input[type=submit].red, .comment-reply-link.red { background:'+hex+'; } blockquote.styled, .post .post-gallery.quote, .widget.widget_calendar table caption { border-color: '+hex+'; } .iconbox.top:hover > span, .testimonials.flex blockquote p cite, .widget.widget_calendar table caption, .fresco .overlay .details, .fresco .overlay .zoom, .fresco .overlay .static { color: '+hex+'; }');
					}
				});
			}
		}
	};

	// on Resize & Scroll
	$(window).resize(function() {
		SITE.responsiveNav.toggle();
		SITE.navDropdown.init();
	});
	$(window).scroll(function(){
		SITE.bargraph.init();
	});

	$doc.ready(function() {

		SITE.init();
	});

})(jQuery, this, _);
