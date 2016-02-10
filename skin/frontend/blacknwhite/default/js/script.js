/* Login ajax */
function ajaxLogin(ajaxUrl, clear){
	if(clear == true){
		clearHolder();
		jQuery(".ajax-box-overlay").removeClass('loaded');
	}
	jQuery("body").append("<div id='login-holder' />");
	if(!jQuery(".ajax-box-overlay").length){
		jQuery("#login-holder").after('<div class="ajax-box-overlay"><i class="load" /></div>');
		jQuery(".ajax-box-overlay").fadeIn('medium');
	}
	function overlayResizer(){
		jQuery(".ajax-box-overlay").css('height', jQuery(window).height());
	}
	overlayResizer();
	jQuery(window).resize(function(){overlayResizer()});
	
	jQuery.ajax({
		url: ajaxUrl,
		cache: false
	}).done(function(html){
		setTimeout(function(){
			jQuery("#login-holder").html(html).animate({
				opacity: 1,
				top: '100px'
			}, 500 );
			jQuery(".ajax-box-overlay").addClass('loaded');
			clearAll();
		}, 500);
	});
	
	var clearAll = function(){
		jQuery("#login-holder .close-button").on('click', function(){
			jQuery(".ajax-box-overlay").fadeOut('medium', function(){
				jQuery(this).remove();
			});
			clearHolder();
		});
	}
	function clearHolder(){
		jQuery("#login-holder").animate({
			opacity: 0,
			top: 0
		  }, 500, function() {
			jQuery(this).remove();
		});
	}
}

function loginLabel(){
	jQuery('#login-holder').each(function(){
		linkBox = jQuery(this).find('.link-box');
		if(!jQuery('body').hasClass('rtl')){
			linkBox.css({
				'top': linkBox.outerWidth()/2 - linkBox.outerHeight()/2 + 25,
				'right': -(linkBox.outerWidth()/2 + linkBox.outerHeight()/2)
			});
		}else{
			linkBox.css({
				'top': linkBox.outerWidth()/2 - linkBox.outerHeight()/2 + 25,
				'left': -(linkBox.outerWidth()/2 + linkBox.outerHeight()/2)
			});
		}
		// linkBoxa = jQuery(this).find('.link-box a');
		// hr = jQuery(this).find('.link-box hr');
		// hrwidth = (linkBox.outerWidth() - linkBoxa.outerWidth())/2 - 20;
		// linkBoxa.css({
		// 	'margin-left' : 20
		// });
		// hr.css({
		// 	'width': hrwidth
		// });
	});
}

/* isotop */
function isotopInit(){
	jQuery('.products-grid').each(function(){
		if(!jQuery(this).parents('#header').length){
			if(!jQuery('body').hasClass('rtl')){
				jQuery(this).isotope({
					itemSelector: '.item',
					resizable: true,
					layoutMode : 'fitRows'
				});
			}else{
				jQuery(this).isotope({
					itemSelector: '.item',
					resizable: true,
					layoutMode : 'fitRows',
					transformsEnabled: false
				});
			}
		}
	});
}
function isotopDestroy(){
	jQuery('.products-grid').each(function(){
		if(!jQuery(this).parents('#header').length){
			jQuery(this).isotope('destroy');
			if(jQuery('body').hasClass('rtl')){
				jQuery(this).find('li.item').attr('style', '');
			}
		}
	});
}
function isotopLoader(imgCount, callback){
	images = jQuery('.products-grid .product-image img');
	if(!imgCount){
		imgCount = images.size();
	}
	currentIndex = 0;
	images.load(function(){
		currentIndex++;
		if(currentIndex == imgCount){
			try{
				callback();
			}catch(err){}
			gridLabels();
			setTimeout(function(){
				isotopInit();
			}, 100);
		}
	});
}

/* Top Cart */
function topCartListener(e){
	var touch = e.touches[0];
	if(jQuery(touch.target).parents('#topCartContent').length == 0 && jQuery(touch.target).parents('.cart-button').length == 0 && !jQuery(touch.target).hasClass('cart-button')){
		jQuery('.top-cart .block-title').removeClass('active');
		jQuery('#topCartContent').slideUp(500).removeClass('active');
		document.removeEventListener('touchstart', topCartListener, false);
	}
}
function topCart(isOnHover){
	function standardMode(){
		jQuery('.top-cart .block-title').on('click', function(event){
			event.stopPropagation();
			jQuery(this).toggleClass('active');
			jQuery('#topCartContent').slideToggle(500).toggleClass('active');
			document.addEventListener('touchstart', topCartListener, false);
			
			jQuery(document).on('click.cartEvent', function(e) {
				if (jQuery(e.target).parents('#topCartContent').length == 0) {
					jQuery('.top-cart .block-title').removeClass('active');
					jQuery('#topCartContent').slideUp(500).removeClass('active');
					jQuery(document).off('click.cartEvent');
				}
			});
		});
	}
	
	if(isOnHover){
		if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))){
			standardMode();
		}else{
			jQuery('.top-cart').on('mouseenter mouseleave', function(event){
				event.stopPropagation();
				jQuery(this).find('.block-title').toggleClass('active');
				jQuery('#topCartContent').stop().slideToggle(500).toggleClass('active');
			});
		}
	}else{
		standardMode();
	}
}
/* Top Cart */

function simpleList(status){
	if(jQuery('header#header .quick-access.simple-list').length){
		button = jQuery('header#header .quick-access.simple-list .mobile-links');
		list = jQuery('header#header .quick-access.simple-list .links');
		
		if(status == 'set'){
			list.hide();
			button.off('click.simple').on('click.simple', function(){
				list.slideToggle();
			});
		}else{
			button.off('click.simple');
			list.css('display', 'inline-block');
		}
	}
}

/* Top Link Wishlist Quantity */
function getWishlistCount(){
	if(jQuery('body').hasClass('ajax-index-options')){
		toopLink = window.parent.document.getElementsByTagName('body')[0];
		toopLink = jQuery(toopLink).find('header#header .top-link-wishlist');
	}else{
		toopLink = jQuery('header#header .top-link-wishlist');
	}
	
	url = toopLink.attr('href').replace("wishlist/","meigeeactions/wishlist/count");
	jQuery.ajax({
		url : url,
		success : function(data) {
			toopLink.find('.wishlist-items').html(data);
		}
	});
}

/* Wishlist Block Slider */
function wishlist_slider(){
 if(!jQuery('body').hasClass('rtl')){
	next = '#wishlist-slider .next';
	prev = '#wishlist-slider .prev';
 }else{
	next = '#wishlist-slider .prev';
	prev = '#wishlist-slider .next';
 }
 jQuery('#wishlist-slider .es-carousel').iosSlider({
	responsiveSlideWidth: true,
	snapToChildren: true,
	desktopClickDrag: true,
	infiniteSlider: false,
	navNextSelector: next,
	navPrevSelector: prev
  });
}
 
function wishlist_set_height(){
	var wishlist_height = 0;
	jQuery('#wishlist-slider .es-carousel li').each(function(){
	 if(jQuery(this).height() > wishlist_height){
	  wishlist_height = jQuery(this).height();
	 }
	})
	jQuery('#wishlist-slider .es-carousel').css('min-height', wishlist_height+2);
}
if(jQuery('#wishlist-slider').length){
  whs_first_set = true;
  wishlist_slider();
}
/* Wishlist Block Slider */

 /* page title */
function titleDivider(){
	setTimeout(function(){
		jQuery('.widget-title, #footer .footer-block-title, .block-layered-nav .filter-label, .block-layered-nav dl#narrow-by-list2 dt, aside.sidebar .block-title, header.rating-title, .box-reviews .rating-subtitle, .block-related .block-title, .product-options-title, .cart-blocks-title, #login-holder .page-title, .opc-block-title, .quick-view-title').each(function(){
			title_container_width = jQuery(this).width();
			title_width = jQuery(this).find('h1, h2, h3, strong').innerWidth();
			divider_width = ((title_container_width - title_width-2)/2);
			full_divider_width = (title_container_width - title_width-2);
			if ((jQuery(this).hasClass('widget-title')) || (jQuery(this).hasClass('filter-label')) || (jQuery(this).parent().attr('id') == 'narrow-by-list2') || (jQuery(this).hasClass('block-title')) || (jQuery(this).hasClass('rating-title')) || (jQuery(this).hasClass('rating-subtitle')) || (jQuery(this).hasClass('cart-blocks-title')) || (jQuery(this).hasClass('page-title')) || (jQuery(this).hasClass('opc-block-title')) || (jQuery(this).hasClass('quick-view-title'))) {
				if (divider_width > 15) {
					if(!jQuery(this).find('.right-divider').length){
						jQuery(this).append('<div class="right-divider" />');
					}
					jQuery(this).find('.right-divider').css('width', divider_width);
				} else {
					jQuery(this).find('.right-divider').remove();
				}
				if (divider_width > 15) {
					if(!jQuery(this).find('.left-divider').length) {
						jQuery(this).prepend('<div class="left-divider" />');
					}
					jQuery(this).find('.left-divider').css('width', divider_width);
				} else {
					jQuery(this).find('.left-divider').remove();
				}
			} else {
				if(!jQuery(this).find('.right-divider').length) {
					jQuery(this).append('<div class="right-divider" />');
				}
				jQuery(this).find('.right-divider').css('width', full_divider_width);
			}
		});
	}, 250);
}

/* Labels height */
function gridLabels(){
	isTopmenuGrid = false;
	isEventStarted = false;
	if(jQuery('header#header .products-grid').length){
		isTopmenuGrid = true;
	}
	
	function init(){
		jQuery('.label-type-1 .label-new, .label-type-3 .label-new, .label-type-1 .label-sale, .label-type-3 .label-sale').each(function(){
			if(isTopmenuGrid == true && isEventStarted == false){
				if(jQuery(this).parents('header#header').length){
					starter();
				}
			}
			
			labelNewWidth = jQuery(this).outerWidth();
			if(jQuery(this).parents('.label-type-1').length){
				if(jQuery(this).hasClass('percentage')){
					lineHeight = labelNewWidth - labelNewWidth*0.2;
				}else{
					lineHeight = labelNewWidth;
				}
			}else if(jQuery(this).parents('.label-type-3').length){
				if(jQuery(this).hasClass('percentage')){
					lineHeight = labelNewWidth - labelNewWidth*0.2;
				}else{
					lineHeight = labelNewWidth - labelNewWidth*0.1;
				}
			}else{
				lineHeight = labelNewWidth;
			}
			jQuery(this).css({
				'height' : labelNewWidth,
				'line-height' : lineHeight + 'px'
			});
		});
	}
	init();
	
	function starter(){
		isEventStarted = true;
		jQuery('#nav-wide li.level0.parent').on('mouseenter', function(){
			setTimeout(function(){
				init();
			}, 100);
		});
	}
}
/***  ***/

/* Product Hover Images */
function productHoverImages() {
	if(jQuery('span.hover-image').length){
		jQuery('span.hover-image').parent().addClass('hover-exists');
	}
}

/* Wide Menu Top */
function WideMenuTop() {
	if (jQuery(document.body).width() > 767) {
		setTimeout(function(){
			jQuery('.nav-wide li .menu-wrapper').each(function() {
				WideMenuItemHeight = jQuery(this).parent().height();
				WideMenuItemPos = jQuery(this).parent().position().top;
				jQuery(this).css('top', (WideMenuItemHeight + WideMenuItemPos));
			});
		}, 100)
	} else {
		jQuery('.nav-wide li .menu-wrapper').css('top', 'auto');
	}
}

/* Product Fancy */
function productFancy(){
	jQuery(function(){
		jQuery('.more-views a.cloud-zoom-gallery').on('click.productFancy', function(){
			thisHref = jQuery(this).attr('href');
			jQuery('.product-view .product-img-box a.fancybox-product').removeClass('active').each(function(){
				if(jQuery(this).attr('href') == thisHref){
					jQuery(this).addClass('active');
				}
			});
		});
		jQuery('.fancybox-product').fancybox();
	});
}

/* sticky header object */
sticky = {
	show: function(headerHeight){
		if(!jQuery('#header').hasClass('floating')){
			jQuery('body').css('padding-top', headerHeight);
			jQuery('#header').addClass('floating');
			jQuery('#header').slideDown('fast');
			WideMenuTop();
		}
	},
	hide: function(){
		if(jQuery('#header').hasClass('floating')){
			jQuery('body').attr('style', '');
			jQuery('#header').removeClass('floating');
			jQuery('#header').attr('style', '');
			WideMenuTop();
		}
	}
}

/* Retina logo resizer */
function logoResize(){
	if (pixelRatio > 1) {
		jQuery('header#header h2.logo, header#header h2.small_logo, footer#footer .footer-logo').each(function(){
			var thisLogo = jQuery(this);
			setTimeout(function(){
				thisLogo.attr('style', '');
				thisLogo.find('img').attr('style', '');
				if(thisLogo.hasClass('logo')){
					thisLogo.css({
						'position': 'absolute',
						'opacity': '0'
					});
				}
				defaultStart = true;
				if(thisLogo.hasClass('footer-logo')){
					thisLogo.css('position', 'absolute');
					if(thisLogo.parent().width() < thisLogo.width()){
						thisLogo.find('img').css('width', thisLogo.parent().width() - (thisLogo.parent().width()*0.15));
						defaultStart = false;
					}
				}
				if(defaultStart){
					thisLogo.find('img').css('width', (thisLogo.find('img').width()/2));
				}
				if(!thisLogo.hasClass('small_logo')){
					thisLogo.css({
						'position': 'static',
						'opacity': '1'
					});
				}
			}, 100);
		});
	}
}

/* ajax more views */
function ajaxMoreViews(){
	if((!!window.devicePixelRatio ? window.devicePixelRatio : 1) > 1){ //check is retina
		var isRetina = true;
	}else{
		var isRetina = false;
	}
	
	var ajaxProgress = false;
	
	jQuery('.ajax-media').off().on('click', function(event){ //add event handler to links
		event.preventDefault();
		target = jQuery(this);
		parentElement = target.parent().parent('.product-img-box');
		ajaxUrl = target.attr('href');
		if(window.location.protocol == "https:"){
			ajaxUrl = ajaxUrl.replace(/http:/ig, 'https:');
		}
		
		//ajax block
		if(!target.hasClass('ajax-active') && !target.hasClass('ajax-complete') && ajaxProgress == false){
			ajaxProgress = true;
			thisTarget = target;
			thisParentElement = parentElement;
			target.addClass('ajax-active');
			thisParentElement.addClass('loading');
			
			jQuery.ajax({
				url: ajaxUrl,
				cache: false
			}).done(function(html){
				thisParentElement.removeClass('loading').prepend(html);
				setTimeout(function(){
					thisParentElement.find('.ajax-media-holder .more-views').addClass('show');
				}, 100);
				thisTarget.removeClass('ajax-active').addClass('ajax-complete ajax-open');
				galleryChanger(thisParentElement);
				ajaxProgress = false;
			});
		}
		
		/* show or hide block */
		if(target.hasClass('ajax-open')){
			parentElement.find('.ajax-media-holder .more-views').removeClass('show').end().end().end().removeClass('ajax-open');
		}else if(target.hasClass('ajax-complete')){
			parentElement.find('.ajax-media-holder .more-views').addClass('show').end().end().end().addClass('ajax-open');
		}
		
		/* block gallery images changer */
		function galleryChanger(thisParentElement){
			thisParentElement.find('.ajax-media-holder .more-views a').on('click', function(){
				targetToChange = thisParentElement.find('.product-image > img');
				if(isRetina){
					sourceAttr = jQuery(this).attr('data-srcx2');
				}else{
					sourceAttr = jQuery(this).attr('data-src');
				}
				targetToChange.attr('src', sourceAttr);
				thisParentElement.addClass('hover-overlay');
				thisParentElement.off().on('mouseleave', function(){
					jQuery(this).removeClass('hover-overlay');
				});
			});
		}
		
	});
}

/* Header Customer Block */
function headerCustomer(reset){
	if(jQuery('.quick-access.simple-list').length){
		custName = jQuery('#header .customer-name');
		links = custName.parent().next('.links');
		links.hide();
		if(reset){
			custName.off('click.moblinks');
			links.css('display', 'inline-block');
		}else{
			custName.off('click.moblinks').on('click.moblinks', function(){
				links.slideToggle();
			});
		}
	}
}


jQuery(window).load(function() {
	
	/* Fix for IE */
    	if(navigator.userAgent.indexOf('IE')!=-1 && jQuery.support.noCloneEvent){
			jQuery.support.noCloneEvent = true;
		}
	/* End fix for IE */

	/* More Views Slider */
	if(jQuery('#more-views-slider').length){
		
		if(!jQuery('body').hasClass('rtl')){
			next = '.more-views .next';
			prev = '.more-views .prev';
		}else{
			next = '.more-views .prev';
			prev = '.more-views .next';
		}
		
		jQuery('#more-views-slider').iosSlider({
		   responsiveSlideWidth: true,
		   snapToChildren: true,
		   desktopClickDrag: true,
		   infiniteSlider: false,
		   navSlideSelector: '.sliderNavi .naviItem',
		   navNextSelector: next,
		   navPrevSelector: prev
		 });
	}
	 function more_view_set_height(){
		if(jQuery('#more-views-slider').length){
			var more_view_height = 0;
			jQuery('#more-views-slider li a').each(function(){
			 if(jQuery(this).height() > more_view_height){
			  more_view_height = jQuery(this).height();
			 }
			})
			jQuery('#more-views-slider').css('min-height', more_view_height+2);
		}
	 }
	 /* More Views Slider */
	 
	 /* More Views Slider 2 */
	 if(jQuery('#more-views-slider-2').length){
		/* start height */
		slider = jQuery('#more-views-slider-2');
		slider.attr('style', '');
		
		/* run slider */
		if(!jQuery('body').hasClass('rtl')){
			next = '#more-views-slider-2 .next';
			prev = '#more-views-slider-2 .prev';
		 }else{
			next = '#more-views-slider-2 .prev';
			prev = '#more-views-slider-2 .next';
		 }
		
		slider.iosSlider({
		   responsiveSlideWidth: true,
		   snapToChildren: true,
		   desktopClickDrag: true,
		   infiniteSlider: false,
		   navNextSelector: next,
		   navPrevSelector: prev
		 });
	}
	function more_view2_set_height(){
		if(jQuery('#more-views-slider-2.slider-on').length){
			more_view_height2 = 0;
			jQuery('#more-views-slider-2 li a').each(function(){
				if(jQuery(this).height() > more_view_height2){
					more_view_height2 = jQuery(this).height();
				}
			})
			jQuery('#more-views-slider-2.slider-on').css('min-height', more_view_height2+2);
		}
	 }
	function indexManager(className){
		startIndex = className.indexOf('-')+1;
		index = className.slice(startIndex);
		index = parseFloat(index);
		jQuery('#more-views-slider-2').iosSlider('goToSlide', index);
	}
	if(jQuery('#more-views-slider-2.slider-on')){
		jQuery('.more-views-container ul li').each(function(index){
			jQuery(this).addClass('item-'+(index+1));
		});
		jQuery('.more-views-container ul li a').on('click', function(){
			indexManager(jQuery(this).parent().attr('class'));
		});
	}
	/* More Views Slider 2 */

	 /* Related Block Slider */
	  if(jQuery('#block-related-slider').length) {
		if(!jQuery('body').hasClass('rtl')){
			next = '.block-related .next';
			prev = '.block-related .prev';
		}else{
			next = '.block-related .prev';
			prev = '.block-related .next';
		}
		jQuery('#block-related-slider').iosSlider({
		   responsiveSlideWidth: true,
		   snapToChildren: true,
		   desktopClickDrag: true,
		   infiniteSlider: false,
		   navSlideSelector: '.sliderNavi .naviItem',
		   navNextSelector: next,
		   navPrevSelector: prev
		});
	 } 
	 
	 function related_set_height(){
		var related_height = 0;
		jQuery('#block-related-slider li.item').each(function(){
		 if(jQuery(this).height() > related_height){
		  related_height = jQuery(this).height();
		 }
		})
		jQuery('#block-related-slider').css('min-height', related_height+2);
	}
	 /* Related Block Slider */
	 
   /* Layered Navigation Accorion */
  if (jQuery('#layered_navigation_accordion').length) {
    jQuery('.filter-label').each(function(){
        jQuery(this).toggle(function(){
            jQuery(this).addClass('closed').next().slideToggle(200);
        },function(){
            jQuery(this).removeClass('closed').next().slideToggle(200);
        })
    });
  }
  /* Layered Navigation Accorion */


  /* Product Collateral Accordion */
  if (jQuery('#collateral-accordion').length) {
	  jQuery('#collateral-accordion > div.box-collateral').not(':first').hide();  
	  jQuery('#collateral-accordion > h2').click(function() {
		jQuery(this).parent().find('h2').removeClass('active');
		jQuery(this).addClass('active');
		
	    var nextDiv = jQuery(this).next();
	    var visibleSiblings = nextDiv.siblings('div:visible');
	 
	    if (visibleSiblings.length ) {
	      visibleSiblings.slideUp(300, function() {
	        nextDiv.slideToggle(500);
	      });
	    } else {
	       nextDiv.slideToggle(300, function(){
				if(!nextDiv.is(":visible")){
					jQuery(this).prev().removeClass('active');
				}
		   });
	    }
	  });
	  
	  //another accordion mode: content open by default
	  /* jQuery('#collateral-accordion > h2').addClass('active').click(function() {
		jQuery(this).toggleClass('active');
		var nextDiv = jQuery(this).next();
		nextDiv.slideToggle(500);
	  }); */
  }
  /* Product Collateral Accordion */

  /* My Cart Accordion */
  if (jQuery('#cart-accordion').length) {
	  jQuery('#cart-accordion > div.accordion-content').hide();	  
	  
	  jQuery('#cart-accordion > h3.accordion-title').wrapInner('<span/>').click(function(){
	  
		var accordion_title_check_flag = false;
		if(jQuery(this).hasClass('active')){accordion_title_check_flag = true;}
		jQuery('#cart-accordion > h3.accordion-title').removeClass('active');
		if(accordion_title_check_flag == false){
			jQuery(this).toggleClass('active');
	    }
		
		var nextDiv = jQuery(this).next();
	    var visibleSiblings = nextDiv.siblings('div:visible');
	 
	    if (visibleSiblings.length ) {
	      visibleSiblings.slideUp(300, function() {
	        nextDiv.slideToggle(500);
	      });
	    } else {
	       nextDiv.slideToggle(300);
	    }
		
	  });
	  
	  
  }
  /* My Cart Accordion */
  
  /* Coin Slider */

	/* Fancybox */
	if (jQuery.fn.fancybox) {
		jQuery('.fancybox').fancybox();
	}
	/* Fancybox */
	
	/* Zoom */
	if (jQuery('#zoom').length) {
		jQuery('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
  	}
	/* Zoom */

	/* Responsive */
	var responsiveflag = false;
	var topSelectFlag = false;
	var menu_type = jQuery('#nav').attr('class');
	
	function mobile_menu(mode){
		switch(mode)
		 {
		 case 'animate':
		   if(!jQuery('.nav-container').hasClass('mobile')){
				jQuery(".nav-container").addClass('mobile');
				jQuery('.nav-container > ul').slideUp('fast');
				jQuery('.menu-button').removeClass('active');
				jQuery('.menu-button').on('click', function(){
					jQuery(this).toggleClass('active');
					jQuery('.nav-container > ul').slideToggle('medium');
				});
			   jQuery('.nav-container > ul a').each(function(){
					if(jQuery(this).next('ul').length || jQuery(this).next('div.menu-wrapper').length){
						jQuery(this).before('<span class="menu-item-button"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>')
						jQuery(this).next('ul').slideUp('fast');
						jQuery(this).prev('.menu-item-button').on('click', function(){
							jQuery(this).toggleClass('active');
							jQuery(this).nextAll('ul, div.menu-wrapper').slideToggle('medium');
						});
					}
			   });
		   }
		   break;
		 default:
				jQuery(".nav-container").removeClass('mobile');
				jQuery('.menu-button').off();
				jQuery('.nav-container > ul').slideDown('fast');
				jQuery('.nav-container .menu-item-button').each(function(){
					jQuery(this).nextAll('ul').slideDown('fast');
					jQuery(this).remove();
				});
				jQuery('.nav-container .menu-wrapper').slideUp('fast');
		 }
	}
	
	if(jQuery('.parallax-page').length == 0){
		var WishlistLink = jQuery('.top-link-wishlist');
		jQuery('.top-cart').after(WishlistLink.clone());
		jQuery('.wishlist-items').appendTo('header#header .topline .top-link-wishlist');
	}
	
	/* Mobile Top Links */
	function mobileTopLinks() {
		var topLinks = jQuery('header#header .quick-access');
		if(jQuery(document.body).width() < 767) {
			jQuery('.top-cart').before(topLinks);
		} else {
			jQuery(topLinks).prependTo('.header-top-right');
		}
	}
	
	/* Mobile Cart Remove Link */
	function MCRemoveLink() {
		if(jQuery(document.body).width() < 767) {
			jQuery('.cart-table .product-name').each(function(){
				var titleHeight = jQuery(this).position().top;
				var removeLink = jQuery(this).parent().parent().parent().find('.remove .btn-remove2');
				jQuery(removeLink).css('top', titleHeight - 35);
			});
		}
	}
	
	function pageNotFound() {
		if(jQuery('.not-found-bg').data('bgimg')){
			var bgImg = jQuery('.not-found-bg').data('bgimg');
			jQuery('.not-found-bg').attr('style', bgImg);
		}
	}
	
	function toDo(){
		if (jQuery(document.body).width() < 767 && responsiveflag == false){
			/* Top Menu Select */
			if(topSelectFlag == false){
				jQuery('.nav-container .sbSelector').wrapInner('<span />').prepend('<span />');
				topSelectFlag = true;
			}
			jQuery('.nav-container .sbOptions li a').on('click', function(){
				if(!jQuery('.nav-container .sbSelector span').length){
					jQuery('.nav-container .sbSelector').wrapInner('<span />').prepend('<span />');
				}
			});
			/* //Top Menu Select */
			responsiveflag = true;
		}
		else if (jQuery(document.body).width() > 767){
			responsiveflag = false;
		}
	}
	
	/* Product tabs */
 	if(jQuery('.product-tabs-widget').length){
		function productTabs(){
			jQuery('ul.product-tabs').on('click', 'li:not(.current)', function() {
				jQuery(this).addClass('current').siblings().removeClass('current')
				.parents('div.product-tabs-wrapper').find('div.product-tabs-box').eq(jQuery(this).index()).fadeIn(300).addClass('visible').siblings('div.product-tabs-box').hide().removeClass('visible');
				gridLabels();
			});
		}
		function productTabsBg(){
			if(jQuery('.product-tabs-wrapper').length){
				setTimeout(function(){
					jQuery('.product-tabs-wrapper').each(function(){
						if(jQuery(this).find('.product-tabs-box').length){
								maxHeight = 0;
								jQuery(this).find('.product-tabs-box').each(function(){
									tabContent = jQuery(this).outerHeight(true);
									if(tabContent > maxHeight) {
										maxHeight = tabContent;
									}
								});
								blockIndents = parseFloat(jQuery(this).css('padding-top')) + parseFloat(jQuery(this).css('padding-bottom'));
								if(jQuery(this).find('.widget-title').length){
									listHeight = jQuery(this).find('.product-tabs').outerHeight(true) + jQuery(this).find('.widget-title').outerHeight(true);
								} else {
									listHeight = jQuery(this).find('.product-tabs').outerHeight(true);
								}
								blockHeight = maxHeight + listHeight + blockIndents;
								jQuery(this).children('.product-tabs-box:not(".visible")').css({
									'position' : 'static',
									'opacity' : 1,
									'display' : 'none'
								});
								if(jQuery('body').hasClass('boxed-layout')) {
									blockWidth = jQuery(this).parents('.container_12').outerWidth();
								} else {
									blockWidth = jQuery(this).width()+30;
								}
								siteWidth = jQuery(window).width();
								bg = jQuery(this).find('.product-tabs-bg');
								bg.attr('style', '');
								bgIndent = bg.offset().left;
								if(jQuery('body').hasClass('boxed-layout')){
									if(jQuery(document.body).width() < 479){
										bg.css({
											'left': '-'+25+'px',
											'width': siteWidth+'px',
											'height': blockHeight
										}).parent().css('height', blockHeight - blockIndents);
									} else if(jQuery(document.body).width() > 479 && jQuery(document.body).width() < 767){
										bg.css({
											'left': '-'+bgIndent+'px',
											'width': siteWidth+'px',
											'height': blockHeight
										}).parent().css('height', blockHeight - blockIndents);;
									} else if(jQuery(document.body).width() > 767 && jQuery(document.body).width() < 978){
										bg.css({
											'width': blockWidth - 20,
											'left': '-10px',
											'height': blockHeight
										}).parent().css('height', blockHeight - blockIndents);
									} else {
										bg.css({
											'width': blockWidth,
											'left': '-60px',
											'height': blockHeight
										}).parent().css('height', blockHeight - blockIndents);
									}
								}else{
									bg.css({
										'left': '-'+bgIndent+'px',
										'width': siteWidth+'px',
										'height': blockHeight
									}).parent().css('height', blockHeight - blockIndents);;
								}
								listHeight = jQuery(this).find('.product-tabs').outerHeight(true);
								if(jQuery(this).find('.top-buttons').length){
									if(jQuery(this).find('.widget-title').length){
										if(jQuery(document.body).width() < 767){
											titleHeight =  jQuery(this).find('.widget-title').innerHeight();
											blockTopIndent = parseFloat(jQuery(this).css('padding-top'));
											jQuery(this).find('.product-tabs').css('top', titleHeight + blockTopIndent + listHeight/2 + 5)
										} else {
											jQuery(this).find('.product-tabs').attr('style', '');
										}
									}
									jQuery(this).find('.product-tabs-widget').css('padding-top', listHeight);
								} else {
									jQuery(this).find('.product-tabs-widget').css('padding-bottom', listHeight);
								}
							
						}
					});
				}, 100);
			}
		}
		productTabs();
		productTabsBg();
		jQuery(window).resize(function(){productTabsBg()});
	}
	
	function backgroundWrapper(){
		if(jQuery('.background-wrapper').length){
			jQuery('.background-wrapper').each(function(){
				if(jQuery('body').hasClass('boxed-layout')) {
					blockWidth = jQuery(this).parents('.container_12').outerWidth();
				} else {
					blockWidth = jQuery(this).parent().width()+30;
				}
				siteWidth = jQuery(window).width();
				bg = jQuery(this);
				bg.parent().css('position', 'relative');
				bgIndent = jQuery(this).parent().offset().left;
				if(jQuery('body').hasClass('boxed-layout')){
					if(jQuery(document.body).width() < 767){
						bg.css({
							'left': '-'+bgIndent+'px',
							'width': siteWidth+'px'
						});
					} else if(jQuery(document.body).width() > 767 && jQuery(document.body).width() < 977){
						bg.css({
							'width': blockWidth - 20,
							'left': -10
						});
					} else {
						bg.css({
							'width': blockWidth,
							'left': -60
						});
					}
				}else{
					if(jQuery(document.body).width() > 767 && jQuery(document.body).width() < 977){
						bg.css({
							'width': blockWidth - 10,
							'left': '-'+bgIndent+'px'
						});
					} else {
						bg.css({
							'left': '-'+bgIndent+'px',
							'width': siteWidth+'px'
						});
					}
				}
				if(bg.children('.text-banner').length){
				 	if(bg.parent().hasClass('parallax-banners-wrapper')) {
						jQuery('.parallax-banners-wrapper').each(function(){
							var wrapper = jQuery(this);
							//setTimeout(function(){
								headerHeight = jQuery('header#header').outerHeight();
								jQuery('.parallax-content').css({
									'top' : -headerHeight,
									'margin-bottom' : -headerHeight
								});
						//	}, 600);
							block = jQuery(this).find('.text-banner');
							var fullHeight = 0;
							var imgCount = block.size();
							var currentIndex = 0;
							block.each(function(){
								if(jQuery(this).children('.banner-content').data('colors')){
									jQuery(this).children('.banner-content').addClass(jQuery(this).children('.banner-content').data('colors'));
								}
								imgUrl = jQuery(this).find('.background').css('background-image').replace(/url\(|\)|\"/ig, '');
								if(imgUrl.indexOf('none')==-1){
									img = new Image;
									img.src = imgUrl;
									img.setAttribute("name", jQuery(this).attr('id'));
									img.onload = function(){
										imgName = '#' + jQuery(this).attr('name');
										if(jQuery('.parallax-banners-wrapper').data('fullscreen')){
											windowHeight = document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientHeight:document.body.clientHeight;
											jQuery(imgName).find('.background').css({
												'height' : windowHeight+'px',
												'background-size' : '100% 100%'
											});
											jQuery(imgName).css('height', (windowHeight)+'px');
											fullHeight += windowHeight;
										} else {
											jQuery(imgName).find('.background').css('height', this.height+'px');
											jQuery(imgName).css('height', (this.height - 100)+'px');
											fullHeight += this.height - 100;
											if (pixelRatio > 1) {
												jQuery(imgName).find('.background').css('background-size', this.width+'px' + ' ' + this.height+'px');
											}
										}
										wrapper.css('height', fullHeight);
										currentIndex++;
										if(!jQuery('body').hasClass('mobile-device')){
											if(currentIndex == imgCount){
												if(jQuery(document.body).width() > 1278) {
													jQuery('#parallax-banner-1').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-1').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-2').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-3').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-4').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-5').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-6').parallax("60%", 0.4, false);
													jQuery('#parallax-banner-7').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-8').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-9').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-10').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-11').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-12').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-13').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-14').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-15').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-16').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-17').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-18').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-19').parallax("60%", 0.7, false);
													jQuery('#parallax-banner-20').parallax("60%", 0.7, false);
												} else if(jQuery(document.body).width() > 977) {
													jQuery('#parallax-banner-1').parallax("60%", 0.2, false);
													jQuery('#parallax-banner-2').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-3').parallax("60%", 0.9, false);
													jQuery('#parallax-banner-4').parallax("60%", 0.85, false);
													jQuery('#parallax-banner-5').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-6').parallax("60%", 0.4, false);
													jQuery('#parallax-banner-7').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-8').parallax("60%", 0.9, false);
													jQuery('#parallax-banner-9').parallax("60%", 0.85, false);
													jQuery('#parallax-banner-10').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-11').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-12').parallax("60%", 0.9, false);
													jQuery('#parallax-banner-13').parallax("60%", 0.85, false);
													jQuery('#parallax-banner-14').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-15').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-16').parallax("60%", 0.9, false);
													jQuery('#parallax-banner-17').parallax("60%", 0.85, false);
													jQuery('#parallax-banner-18').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-19').parallax("60%", 0.8, false);
													jQuery('#parallax-banner-20').parallax("60%", 0.9, false);
												} else if(jQuery(document.body).width() > 767) {
													jQuery('#parallax-banner-1').parallax("60%", 0.3, false);
													jQuery('#parallax-banner-2').parallax("60%", 0.3, false);
													jQuery('#parallax-banner-3').parallax("60%", 0.3, false);
													jQuery('#parallax-banner-4').parallax("60%", 0.3, false);
													jQuery('#parallax-banner-5').parallax("60%", 0.3, false);
													jQuery('#parallax-banner-6').parallax("60%", 0.3, false);
													jQuery('#parallax-banner-7').parallax("60%", 0.3, false);
													jQuery('#parallax-banner-8').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-9').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-10').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-11').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-12').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-13').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-14').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-15').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-16').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-17').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-18').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-19').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-20').parallax("60%", 0.1, false);
												} else {
													jQuery('#parallax-banner-1').parallax("30%", 0.5, true);
													jQuery('#parallax-banner-2').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-3').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-4').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-5').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-6').parallax("60%", 0.1, false); 
													jQuery('#parallax-banner-7').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-8').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-9').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-10').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-11').parallax("60%", 0.1, false); 
													jQuery('#parallax-banner-12').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-13').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-14').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-15').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-16').parallax("60%", 0.1, false); 
													jQuery('#parallax-banner-17').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-18').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-19').parallax("60%", 0.1, false);
													jQuery('#parallax-banner-20').parallax("60%", 0.1, false);
												}
											}
										}
									}
								}
								bannerText = jQuery(this).find('.banner-content');
								if(bannerText.data('top')){
									bannerText.css('top', bannerText.data('top'));
								}
								if(bannerText.data('left')){
									if(!bannerText.data('right')){
										bannerText.css({
											'left': bannerText.data('left'),
											'right' : 'auto'
										});
									} else {
										bannerText.css('left', bannerText.data('left'));
									}
								}
								if(bannerText.data('right')){
									if(!bannerText.data('left')){
										bannerText.css({
											'right': bannerText.data('right'),
											'left' : 'auto'
										});
									} else {
										bannerText.css('right', bannerText.data('right'));
									}
								}
							});
						});
						jQuery(window).scroll(function() {
							jQuery('.parallax-banners-wrapper').each(function(){
								block = jQuery(this).find('.text-banner');
								block.each(function(){
									var imagePos = jQuery(this).offset().top;
									var topOfWindow = jQuery(window).scrollTop();
									if (imagePos < topOfWindow+400) {
										jQuery(this).addClass("slideup");
									} else {
										jQuery(this).removeClass("slideup");
									}
								});
							});
						});
						setTimeout(function(){
							jQuery('.parallax-page #parallax-loading').fadeOut(200);
						}, 500);
					} else {
						blockHeight = bg.children('img').outerHeight();
						block.css('height', blockHeight);
						bg.css('height', blockHeight);
					}
				} else {
					blockHeight = bg.parent().outerHeight();
					if(bg.children('img').height() < blockHeight) {
						bg.children('img').css({
							'height' : blockHeight,
							'width' : '100%'
						});
					} else {
						bg.children('img').attr('style', '');
					}
				}				
			});
		}
	}
	
	function replacingClass () {
		if (jQuery(document.body).width() < 480) { //Mobile
			mobile_menu('animate');
			headerCustomer();
			simpleList('set');
		}
		if (jQuery(document.body).width() > 479 && jQuery(document.body).width() < 768) { //iPhone
			mobile_menu('animate');
			headerCustomer();
			simpleList('set');
		}  
		if (jQuery(document.body).width() > 767 && jQuery(document.body).width() < 1020){ //Tablet
			mobile_menu('animate');
			headerCustomer(true);
			simpleList('reset');
		}
		if (jQuery(document.body).width() > 1019 && jQuery(document.body).width() < 1375){ //Desktop
			mobile_menu('reset');
			headerCustomer(true);
			simpleList('reset');
		}
		if (jQuery(document.body).width() > 1374){ //Extra Large
			mobile_menu('reset');
			headerCustomer(true);
			simpleList('reset');
		}
	}
	replacingClass();
	toDo();
	more_view_set_height();
	more_view2_set_height();
	wishlist_set_height();
	related_set_height();
	titleDivider();
	WideMenuTop();
	mobileTopLinks();
	MCRemoveLink();
	pageNotFound();
	backgroundWrapper();
	jQuery(window).resize(function(){toDo(); replacingClass(); more_view_set_height(); more_view2_set_height(); wishlist_set_height(); related_set_height(); titleDivider(); WideMenuTop(); mobileTopLinks(); MCRemoveLink(); pageNotFound(); backgroundWrapper()});
	/* Responsive */
	
	/* Top Menu */
	function menuHeight2 () {
		var menu_min_height = 0;
		jQuery('#nav li.tech').css('height', 'auto');
		jQuery('#nav li.tech').each(function(){
			if(jQuery(this).height() > menu_min_height){
				menu_min_height = jQuery(this).height();
			}
		});		
		jQuery('#nav li.tech').each(function(){
			jQuery(this).css('height', menu_min_height + 'px');
		});
	}
	
	/* Top Selects */
	function option_class_add(items, is_selector){
		jQuery(items).each(function(){
			if(is_selector){
				jQuery(this).removeAttr('class'); 
				jQuery(this).addClass('sbSelector');
			}			
			stripped_string = jQuery(this).html().replace(/(<([^>]+)>)/ig,"");
			RegEx=/\s/g;
			stripped_string=stripped_string.replace(RegEx,"");
			jQuery(this).addClass(stripped_string.toLowerCase());
			if(is_selector){
				tags_add();
			}
		});
	}
	option_class_add('.sbOptions li a, .sbSelector', false);
	jQuery('.sbOptions li a, .sbSelector').on('click', function(){
		option_class_add('.sbSelector', true);
	});	
	function tags_add(){
		jQuery('.sbSelector').each(function(){
			if(!jQuery(this).find('span.text').length){
				jQuery(this).wrapInner('<span class="text" />').append('<span />').find('span:last').wrapInner('<span />');
			}
		});
	}
	tags_add();
	/* //Top Selects */
	
	
	/* Mobile Devices */
	if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i))){
		/* Mobile Devices Class */
		jQuery('body').addClass('mobile-device');
		
		/* Menu */
		jQuery(".nav-container:not('.mobile') #nav li").on({
			click: function (){
				if ( !jQuery(this).hasClass('touched') && jQuery(this).children('ul').length ){
					jQuery(this).addClass('touched');
					clearTouch(jQuery(this));
					return false;
				}
			}
		});
		
		/* Clear Touch Function */
		function clearTouch(handlerObject){
			jQuery('body').on('click', function(){
				handlerObject.removeClass('touched closed');
				catAccordion();
				jQuery('body').off();
			});
			handlerObject.click(function(event){
				event.stopPropagation();
			});
			handlerObject.parent().click(function(){
				handlerObject.removeClass('touched');
				catAccordion();
			});
			handlerObject.siblings().click(function(){
				handlerObject.removeClass('touched');
			});
			
			function catAccordion(){
				if(handlerObject.parent().attr('id') == 'categories-accordion'){
					jQuery('#categories-accordion li.parent').each(function(){
						if(!jQuery(this).hasClass('active')){
							jQuery(this).find('.btn-cat').removeClass('closed');
							jQuery(this).find('ul').slideUp(200);
						}
					});
				}
			}
		}
		
		var mobileDevice = true;
	}else{
		var mobileDevice = false;
	}

	if (jQuery('body').hasClass('retina-ready')) {
		//images with custom attributes
		if (pixelRatio > 1) {
			function brandsWidget(){
				brands = jQuery('ul.brands li a img');
				brands.each(function(){
					jQuery(this).css('width', jQuery(this).width()/2);
				});
			}
			if(jQuery('.about-us-wrapper img').length){
				aboutImg = jQuery('.about-us-wrapper img');
				aboutImg.css('width', aboutImg.width()/2);
			}
			logoResize();
			brandsWidget();
			jQuery(window).resize(function(){
				logoResize();
			});
			
			/* product brand banner */
			if(jQuery('.product-brand .brand-img img').length){
				imgUrl = jQuery('.product-brand .brand-img img').attr('src');
				img = new Image;
				img.src = imgUrl;
				img.onload = function(){
					jQuery('.product-brand .brand-img img').css('width', img.width/2);
				}
			}
			
			/* Top menu Bg */
			jQuery('#nav-wide.nav-wide .menu-wrapper').each(function(){
				stretchMode = false;
			
				if(jQuery(this).attr('style') != undefined && jQuery(this).attr('style').indexOf('background-size') !=-1){
					stretchMode = true;
				}
				
				jQuery(this).attr('style', jQuery(this).attr('dataX2'));
				if(stretchMode == false){
					imgUrl = jQuery(this).css('background-image').replace(/url\(|\)|\"/ig, '');
					if(imgUrl.indexOf('none')==-1){
						img = new Image;
						img.src = imgUrl;
						thisElement = jQuery(this);
						img.onload = function(){
							thisElement.css('background-size', img.width/2+'px');
						}
					}
				}
			});
		}
	}
	
	
	/* Categories Accorion */
	if (jQuery('#categories-accordion').length){
		jQuery('#categories-accordion li.parent ul').before('<div class="btn-cat"><i class="fa fa-plus-square-o"></i><i class="fa fa-minus-square-o"></i></div>');
		jQuery('#categories-accordion li.level-top:not(.parent) > a').before('<i class="fa fa-square-o"></i>');
		if(mobileDevice == true){
			jQuery('#categories-accordion li.parent:not(.active)').each(function(){
				jQuery(this).on({
					click: function (){
						if(!jQuery(this).hasClass('touched')){
							jQuery(this).addClass('touched closed').children('ul').slideDown(200);
							jQuery(this).children('.btn-cat').addClass('closed');
							clearTouch(jQuery(this));
							return false;
						}
					}
				});
			});
		}else{
			jQuery('#categories-accordion li.parent .btn-cat').each(function(){
				jQuery(this).toggle(function(){
					jQuery(this).addClass('closed').next().slideToggle(200);
					jQuery(this).prev().addClass('closed');
				},function(){
					jQuery(this).removeClass('closed').next().slideToggle(200);
					jQuery(this).prev().removeClass('closed');
				})
			});
		}
	}
	/* Categories Accorion */
	
	/* Menu Wide */
	if(jQuery('#nav-wide').length){
		jQuery('#nav-wide li.level-top').mouseenter(function(){
			jQuery(this).addClass('over');
		});
		jQuery('#nav-wide li.level-top').mouseleave(function(){
			jQuery(this).removeClass('over');
		});
		jQuery('.nav-wide#nav-wide .menu-wrapper').each(function(){
			jQuery(this).children('div.alpha.omega:first').addClass('first');
		});
		
		columnsWidth = function(columnsCount, currentGroupe){
			if(currentGroupe.size() > 1){
				currentGroupe.each(function(){
					jQuery(this).css('width', (100/currentGroupe.size())+'%');
				});
			}else{
				currentGroupe.css('width', (100/columnsCount)+'%');
			}
		}
		jQuery('.nav-wide#nav-wide .menu-wrapper').each(function(){
			columnsCount = jQuery(this).attr('columns');
			items = jQuery(this).find('ul.level0 > li');
			groupsCount = items.size()/columnsCount;
			ratio = 1;
			for(i=0; i<groupsCount; i++){
				currentGroupe = items.slice((i*columnsCount), (columnsCount*ratio));
				/* set columns width */
				columnsWidth(columnsCount, currentGroupe);
				/* ==== */
				ratio++;
			}
		});
		
		/* Default Sub Menu in Wide Mode */
		elements = jQuery('#nav-wide .menu-wrapper.default-menu ul.level0 li');
		if(elements.length){
			elements.on('mouseenter mouseleave', function(){
				if(!jQuery('.nav-container').hasClass('mobile')){
					jQuery(this).children('ul').toggle();
				}
			});
			jQuery(window).resize(function(){
				if(!jQuery('.nav-container').hasClass('mobile')){
					elements.find('ul').hide();
				}
			});
			elements.each(function(){
				if(jQuery(this).children('ul').length){
					jQuery(this).addClass('parent');
				}
			});
			
			
			/* Default dropdown menu */
			items = [];
			jQuery('#nav-wide li.level0').each(function(){
				if(jQuery(this).children('.default-menu').length){
					items.push(jQuery(this));
				}
			});
			jQuery(items).each(function(){
				jQuery(this).on('mouseenter mouseleave', function(){
					if(jQuery(this).hasClass('over')){
						if(!jQuery('body').hasClass('rtl')){
							jQuery(this).children('.default-menu').css({
								'top': jQuery(this).position().top + jQuery(this).height(),
								'left': jQuery(this).position().left
							});
						}else{
							jQuery(this).children('.default-menu').css({
								'top': jQuery(this).position().top + jQuery(this).height(),
								'left': jQuery(this).position().left - (jQuery(this).children('.default-menu').width() - jQuery(this).width())
							});
						}
					}else{
						jQuery(this).children('.default-menu').css('left', '-10000px');
					}
				});
			});
		}
	}
	
});
var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;
jQuery(document).ready(function(){
	/* More Views Slider 2 */
	if(jQuery('#more-views-slider-2').length){
		/* start height */
		slider = jQuery('#more-views-slider-2');
		sliderWidth = slider.width();
		if(slider.parents('.productpage_extralarge').length){
			sliderWidth = sliderWidth - (sliderWidth * 0.3);
		}
		slider.css({
			'height': sliderWidth,
			'overflow': 'hidden'
		});
	}
	
	
	var isApple = false;
	/* apple position fixed fix */
	if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))){
		isApple = true;
		
		function stickyPosition(clear){
			items = jQuery('header#header, .backstretch');
			if(clear == false){
				topIndent = jQuery(window).scrollTop();
				items.css({
					'position': 'absolute',
					'top': topIndent
				});
			}else{
				items.css({
					'position': 'fixed',
					'top': '0'
				});
			}
		}
		
		jQuery('.sticky-search header#header .form-search input').on('focusin focusout', function(){
			jQuery(this).toggleClass('focus');
			if(jQuery('header#header').hasClass('floating')){
				if(jQuery(this).hasClass('focus')){
					setTimeout(function(){
						stickyPosition(false);
					}, 500);
				}else{
					stickyPosition(true);
				}
			}
		});
	}
	
	if (jQuery('body').hasClass('retina-ready')) {
		if (pixelRatio > 1) {
			jQuery('img[data-srcX2]').each(function(){
				jQuery(this).attr('src',jQuery(this).attr('data-srcX2'));
			});
		}
	}
	
	/* Selects */
	jQuery(".form-currency select, .form-language select, .store-switcher select").selectbox();
	
	
/* Messages button */
	if(jQuery('ul.messages').length){
		jQuery('ul.messages > li').each(function(){
			switch (jQuery(this).attr('class')){
				case 'success-msg':
				messageIcon = '<i class="fa fa-check" />';
				break;
				case 'error-msg':
				messageIcon = '<i class="fa fa-times" />';
				break;
				case 'note-msg':
				messageIcon = '<i class="fa fa-exclamation" />';
				break;
				case 'notice-msg':
				messageIcon = '<i class="fa fa-exclamation" />';
				break;
				default:
				messageIcon = '';
			}
			jQuery(this).prepend('<div class="messages-close-btn" />', messageIcon);
			jQuery('ul.messages .messages-close-btn').on('click', function(){
				jQuery('ul.messages').remove();
			});
		});
	}
	if(jQuery('.content_bottom').length){
		jQuery('.content_bottom button#find-us').click(function() {
			jQuery('.content_bottom').toggleClass('active');
			if(jQuery('.content_bottom').hasClass('hide')){
				jQuery('.content_bottom').removeClass('hide');
			}else{
				setTimeout(function(){
					jQuery('.content_bottom').addClass('hide');
				}, 500);
			}
		});
	}
	
	jQuery('.home-search-form .search-name').addClass('active');
	jQuery('.home-search ul li:first-child').click(function() {
		jQuery('.home-search-form .container_12').removeClass('active');
		jQuery('.home-search ul li').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.home-search-form .search-name').addClass('active');
        
    });
	jQuery('.home-search ul li:nth-child(2)').click(function() {
		jQuery('.home-search-form .container_12').removeClass('active');
		jQuery('.home-search ul li').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.home-search-form .search-category').addClass('active');
        
    });
	jQuery('.home-search ul li:last-child').click(function() {
		jQuery('.home-search-form .container_12').removeClass('active');
		jQuery('.home-search ul li').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.home-search-form .search-brand').addClass('active');
        
    });
	/*jQuery('#product_home_search .product_search').hide();
	jQuery('#product_home_search .searchform').click(function() {
		jQuery(this).css('background','none');
		jQuery('#product_home_search .product_search').show();
		
	});*/
	
	
	
	/* sticky header */
	if(jQuery('body').hasClass('floating-header') && jQuery('.parallax-page').length == 0){
		var headerHeight = jQuery('#header').height();
		jQuery(window).on('scroll.sticky', function(){
			if(!isApple){
				heightParam = headerHeight;
			}else{
				heightParam = headerHeight*2;
			}
			if(jQuery(this).scrollTop() >= heightParam){
				if(!jQuery('#header').hasClass('floating')){
					if(!((!jQuery('body').hasClass('sticky-mobile') && jQuery(document.body).width() < 481) || (!jQuery('body').hasClass('sticky-tablet') && (jQuery(document.body).width() > 767 && jQuery(document.body).width() < 1279)))){
						sticky.show(headerHeight);
					}
					logoResize();
				}
			}
			if(jQuery(this).scrollTop() < headerHeight ){
				if(jQuery('#header').hasClass('floating')){
					sticky.hide();
					logoResize();
				}
			}
		});
	}
	
	productHoverImages();
	
	if(jQuery('header#header .form-language .sbHolder').length) {
		jQuery('header#header .form-language').addClass('select');
	}
	
	gridLabels();
	
	jQuery('.contacts-footer-content input, .contacts-footer-content textarea, #header .form-search input').each(function(){
		jQuery(this).focusin(function(){
			jQuery(this).parent().addClass('focus');
		});
	});
	jQuery('.contacts-footer-content input, .contacts-footer-content textarea, #header .form-search input').each(function(){
		jQuery(this).focusout(function(){
			jQuery(this).parent().removeClass('focus');
		});
	});
	
	/* Header Customer Block */
	if(jQuery('#header .customer-name').length && !jQuery('#header .quick-access.simple-list').length){
		var CustName = jQuery('#header .customer-name');
		CustName.next().hide();
		CustName.click(function(){
			CustName.next().slideToggle();
		});
	}
	
	if(jQuery('.toolbar-bottom .pager .pages').length == 0){
		jQuery('.toolbar-bottom').addClass('no-border');
	}
	
	if(jQuery('.parallax-page').length){
		getWishlistCount();
	}
});

