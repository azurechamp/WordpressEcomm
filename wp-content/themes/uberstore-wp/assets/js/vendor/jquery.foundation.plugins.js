var thb_easing = [0.75, 0, 0.175, 1];

// Accordion

;(function ($, window, undefined){
  'use strict';

  $.fn.foundationAccordion = function (options) {
  	
    $('.accordion', this).each(function() {
    	var that = $(this),
    			active = ( !(that.data('active-tab')) ? 1 : that.data('active-tab'));
    	
    	that.find('li').eq(active -1).addClass('active');
    	
    	that.find('li').on('click.fndtn', function () {
    		var p = $(this).parent(),
    				flyout = $(this).children('.content').first(),
    				active = p.data('active');
    	  $('.content', p).not(flyout).slideUp(400, $.bez(thb_easing), function() {
    	  	$(this).parent('li').removeClass('active'); //changed this
    	  });
    	  flyout.slideDown({ 
    	  	duration: '400',
    	  	easing: $.bez(thb_easing)
    	  }).parent('li').addClass('active');
    	});
    });

  };

})( jQuery, this );

// Alerts

;(function ($, window, undefined) {
  'use strict';
  
  $.fn.foundationAlerts = function (options) {
    var settings = $.extend({
      callback: $.noop
    }, options);
    
    $(document).on("click", ".notification-box a.close", function (e) {
      e.preventDefault();
      $(this).closest(".notification-box").fadeOut(function () {
        $(this).remove();
        // Do something else after the alert closes
        settings.callback();
      });
    });
    
  };

})(jQuery, this);

jQuery(document).ready(function($) {
	$.fn.foundationAccordion			? $(document).foundationAccordion() : null;
	$.fn.foundationAlerts					? $(document).foundationAlerts() : null;
});

/*
 * Viewport - jQuery selectors for finding elements in viewport
 *
 * Copyright (c) 2008-2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *  http://www.appelsiini.net/projects/viewport
 *
 */

(function($){$.belowthefold=function(element,settings){var fold=$(window).height()+$(window).scrollTop();return fold<=$(element).offset().top-settings.threshold;};$.abovethetop=function(element,settings){var top=$(window).scrollTop();return top>=$(element).offset().top+$(element).height()-settings.threshold;};$.rightofscreen=function(element,settings){var fold=$(window).width()+$(window).scrollLeft();return fold<=$(element).offset().left-settings.threshold;};$.leftofscreen=function(element,settings){var left=$(window).scrollLeft();return left>=$(element).offset().left+$(element).width()-settings.threshold;};$.inviewport=function(element,settings){return!$.rightofscreen(element,settings)&&!$.leftofscreen(element,settings)&&!$.belowthefold(element,settings)&&!$.abovethetop(element,settings);};$.extend($.expr[':'],{"below-the-fold":function(a,i,m){return $.belowthefold(a,{threshold:0});},"above-the-top":function(a,i,m){return $.abovethetop(a,{threshold:0});},"left-of-screen":function(a,i,m){return $.leftofscreen(a,{threshold:0});},"right-of-screen":function(a,i,m){return $.rightofscreen(a,{threshold:0});},"in-viewport":function(a,i,m){return $.inviewport(a,{threshold:0});}});})(jQuery);

// Images Loaded
(function(c,q){var m="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";c.fn.imagesLoaded=function(f){function n(){var b=c(j),a=c(h);d&&(h.length?d.reject(e,b,a):d.resolve(e));c.isFunction(f)&&f.call(g,e,b,a)}function p(b){k(b.target,"error"===b.type)}function k(b,a){b.src===m||-1!==c.inArray(b,l)||(l.push(b),a?h.push(b):j.push(b),c.data(b,"imagesLoaded",{isBroken:a,src:b.src}),r&&d.notifyWith(c(b),[a,e,c(j),c(h)]),e.length===l.length&&(setTimeout(n),e.unbind(".imagesLoaded",
p)))}var g=this,d=c.isFunction(c.Deferred)?c.Deferred():0,r=c.isFunction(d.notify),e=g.find("img").add(g.filter("img")),l=[],j=[],h=[];c.isPlainObject(f)&&c.each(f,function(b,a){if("callback"===b)f=a;else if(d)d[b](a)});e.length?e.bind("load.imagesLoaded error.imagesLoaded",p).each(function(b,a){var d=a.src,e=c.data(a,"imagesLoaded");if(e&&e.src===d)k(a,e.isBroken);else if(a.complete&&a.naturalWidth!==q)k(a,0===a.naturalWidth||0===a.naturalHeight);else if(a.readyState||a.complete)a.src=m,a.src=d}):
n();return d?d.promise(g):g}})(jQuery);

/*!
 * Bez @VERSION
 * http://github.com/rdallasgray/bez
 * 
 * A plugin to convert CSS3 cubic-bezier co-ordinates to jQuery-compatible easing functions
 * 
 * With thanks to Nikolay Nemshilov for clarification on the cubic-bezier maths
 * See http://st-on-it.blogspot.com/2011/05/calculating-cubic-bezier-function.html
 * 
 * Copyright @YEAR Robert Dallas Gray. All rights reserved.
 * Provided under the FreeBSD license: https://github.com/rdallasgray/bez/blob/master/LICENSE.txt
*/
jQuery.extend({ bez: function(coOrdArray) {
	var encodedFuncName = "bez_" + jQuery.makeArray(arguments).join("_").replace(/\./g, "p");
	if (typeof jQuery.easing[encodedFuncName] !== "function") {
		var	polyBez = function(p1, p2) {
			var A = [null, null], B = [null, null], C = [null, null],
				bezCoOrd = function(t, ax) {
					C[ax] = 3 * p1[ax], B[ax] = 3 * (p2[ax] - p1[ax]) - C[ax], A[ax] = 1 - C[ax] - B[ax];
					return t * (C[ax] + t * (B[ax] + t * A[ax]));
				},
				xDeriv = function(t) {
					return C[0] + t * (2 * B[0] + 3 * A[0] * t);
				},
				xForT = function(t) {
					var x = t, i = 0, z;
					while (++i < 14) {
						z = bezCoOrd(x, 0) - t;
						if (Math.abs(z) < 1e-3) break;
						x -= z / xDeriv(x);
					}
					return x;
				};
				return function(t) {
					return bezCoOrd(xForT(t), 1);
				}
		};
		jQuery.easing[encodedFuncName] = function(x, t, b, c, d) {
			return c * polyBez([coOrdArray[0], coOrdArray[1]], [coOrdArray[2], coOrdArray[3]])(t/d) + b;
		}
	}
	return encodedFuncName;
}});

/**
* jquery.matchHeight-min.js master
* http://brm.io/jquery-match-height/
* License: MIT
*/
(function(c){var n=-1,f=-1,g=function(a){return parseFloat(a)||0},r=function(a){var b=null,d=[];c(a).each(function(){var a=c(this),k=a.offset().top-g(a.css("margin-top")),l=0<d.length?d[d.length-1]:null;null===l?d.push(a):1>=Math.floor(Math.abs(b-k))?d[d.length-1]=l.add(a):d.push(a);b=k});return d},p=function(a){var b={byRow:!0,property:"height",target:null,remove:!1};if("object"===typeof a)return c.extend(b,a);"boolean"===typeof a?b.byRow=a:"remove"===a&&(b.remove=!0);return b},b=c.fn.matchHeight=
function(a){a=p(a);if(a.remove){var e=this;this.css(a.property,"");c.each(b._groups,function(a,b){b.elements=b.elements.not(e)});return this}if(1>=this.length&&!a.target)return this;b._groups.push({elements:this,options:a});b._apply(this,a);return this};b._groups=[];b._throttle=80;b._maintainScroll=!1;b._beforeUpdate=null;b._afterUpdate=null;b._apply=function(a,e){var d=p(e),h=c(a),k=[h],l=c(window).scrollTop(),f=c("html").outerHeight(!0),m=h.parents().filter(":hidden");m.each(function(){var a=c(this);
a.data("style-cache",a.attr("style"))});m.css("display","block");d.byRow&&!d.target&&(h.each(function(){var a=c(this),b=a.css("display");"inline-block"!==b&&"inline-flex"!==b&&(b="block");a.data("style-cache",a.attr("style"));a.css({display:b,"padding-top":"0","padding-bottom":"0","margin-top":"0","margin-bottom":"0","border-top-width":"0","border-bottom-width":"0",height:"100px"})}),k=r(h),h.each(function(){var a=c(this);a.attr("style",a.data("style-cache")||"")}));c.each(k,function(a,b){var e=c(b),
f=0;if(d.target)f=d.target.outerHeight(!1);else{if(d.byRow&&1>=e.length){e.css(d.property,"");return}e.each(function(){var a=c(this),b=a.css("display");"inline-block"!==b&&"inline-flex"!==b&&(b="block");b={display:b};b[d.property]="";a.css(b);a.outerHeight(!1)>f&&(f=a.outerHeight(!1));a.css("display","")})}e.each(function(){var a=c(this),b=0;d.target&&a.is(d.target)||("border-box"!==a.css("box-sizing")&&(b+=g(a.css("border-top-width"))+g(a.css("border-bottom-width")),b+=g(a.css("padding-top"))+g(a.css("padding-bottom"))),
a.css(d.property,f-b+"px"))})});m.each(function(){var a=c(this);a.attr("style",a.data("style-cache")||null)});b._maintainScroll&&c(window).scrollTop(l/f*c("html").outerHeight(!0));return this};b._applyDataApi=function(){var a={};c("[data-match-height], [data-mh]").each(function(){var b=c(this),d=b.attr("data-mh")||b.attr("data-match-height");a[d]=d in a?a[d].add(b):b});c.each(a,function(){this.matchHeight(!0)})};var q=function(a){b._beforeUpdate&&b._beforeUpdate(a,b._groups);c.each(b._groups,function(){b._apply(this.elements,
this.options)});b._afterUpdate&&b._afterUpdate(a,b._groups)};b._update=function(a,e){if(e&&"resize"===e.type){var d=c(window).width();if(d===n)return;n=d}a?-1===f&&(f=setTimeout(function(){q(e);f=-1},b._throttle)):q(e)};c(b._applyDataApi);c(window).bind("load",function(a){b._update(!1,a)});c(window).bind("resize orientationchange",function(a){b._update(!0,a)})})(jQuery);

 
 /*! perfect-scrollbar - v0.4.8
 * http://noraesae.github.com/perfect-scrollbar/
 * Copyright (c) 2014 Hyeonje Jun; Licensed MIT */
 "use strict";(function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)})(function(e){var n={wheelSpeed:10,wheelPropagation:!1,minScrollbarLength:null,useBothWheelAxes:!1,useKeyboard:!0,suppressScrollX:!1,suppressScrollY:!1,scrollXMarginOffset:0,scrollYMarginOffset:0},t=function(){var e=0;return function(){var n=e;return e+=1,".perfect-scrollbar-"+n}}();e.fn.perfectScrollbar=function(o,r){return this.each(function(){var l=e.extend(!0,{},n),s=e(this);if("object"==typeof o?e.extend(!0,l,o):r=o,"update"===r)return s.data("perfect-scrollbar-update")&&s.data("perfect-scrollbar-update")(),s;if("destroy"===r)return s.data("perfect-scrollbar-destroy")&&s.data("perfect-scrollbar-destroy")(),s;if(s.data("perfect-scrollbar"))return s.data("perfect-scrollbar");s.addClass("ps-container");var a,i,c,u,p,d,f,h,v,b,g=e("<div class='ps-scrollbar-x-rail'></div>").appendTo(s),m=e("<div class='ps-scrollbar-y-rail'></div>").appendTo(s),w=e("<div class='ps-scrollbar-x'></div>").appendTo(g),T=e("<div class='ps-scrollbar-y'></div>").appendTo(m),L=parseInt(g.css("bottom"),10),y=parseInt(m.css("right"),10),S=t(),I=function(e,n){var t=e+n,o=u-v;b=0>t?0:t>o?o:t;var r=parseInt(b*(d-u)/(u-v),10);s.scrollTop(r),g.css({bottom:L-r})},D=function(e,n){var t=e+n,o=c-f;h=0>t?0:t>o?o:t;var r=parseInt(h*(p-c)/(c-f),10);s.scrollLeft(r),m.css({right:y-r})},x=function(e){return l.minScrollbarLength&&(e=Math.max(e,l.minScrollbarLength)),e},k=function(){g.css({left:s.scrollLeft(),bottom:L-s.scrollTop(),width:c,display:a?"inherit":"none"}),m.css({top:s.scrollTop(),right:y-s.scrollLeft(),height:u,display:i?"inherit":"none"}),w.css({left:h,width:f}),T.css({top:b,height:v})},X=function(){c=s.width(),u=s.height(),p=s.prop("scrollWidth"),d=s.prop("scrollHeight"),!l.suppressScrollX&&p>c+l.scrollXMarginOffset?(a=!0,f=x(parseInt(c*c/p,10)),h=parseInt(s.scrollLeft()*(c-f)/(p-c),10)):(a=!1,f=0,h=0,s.scrollLeft(0)),!l.suppressScrollY&&d>u+l.scrollYMarginOffset?(i=!0,v=x(parseInt(u*u/d,10)),b=parseInt(s.scrollTop()*(u-v)/(d-u),10)):(i=!1,v=0,b=0,s.scrollTop(0)),b>=u-v&&(b=u-v),h>=c-f&&(h=c-f),k()},C=function(){var n,t;w.bind("mousedown"+S,function(e){t=e.pageX,n=w.position().left,g.addClass("in-scrolling"),e.stopPropagation(),e.preventDefault()}),e(document).bind("mousemove"+S,function(e){g.hasClass("in-scrolling")&&(D(n,e.pageX-t),e.stopPropagation(),e.preventDefault())}),e(document).bind("mouseup"+S,function(){g.hasClass("in-scrolling")&&g.removeClass("in-scrolling")}),n=t=null},Y=function(){var n,t;T.bind("mousedown"+S,function(e){t=e.pageY,n=T.position().top,m.addClass("in-scrolling"),e.stopPropagation(),e.preventDefault()}),e(document).bind("mousemove"+S,function(e){m.hasClass("in-scrolling")&&(I(n,e.pageY-t),e.stopPropagation(),e.preventDefault())}),e(document).bind("mouseup"+S,function(){m.hasClass("in-scrolling")&&m.removeClass("in-scrolling")}),n=t=null},P=function(e,n){var t=s.scrollTop();if(0===e){if(!i)return!1;if(0===t&&n>0||t>=d-u&&0>n)return!l.wheelPropagation}var o=s.scrollLeft();if(0===n){if(!a)return!1;if(0===o&&0>e||o>=p-c&&e>0)return!l.wheelPropagation}return!0},M=function(){var e=!1;s.bind("mousewheel"+S,function(n,t,o,r){l.useBothWheelAxes?i&&!a?r?s.scrollTop(s.scrollTop()-r*l.wheelSpeed):s.scrollTop(s.scrollTop()+o*l.wheelSpeed):a&&!i&&(o?s.scrollLeft(s.scrollLeft()+o*l.wheelSpeed):s.scrollLeft(s.scrollLeft()-r*l.wheelSpeed)):(s.scrollTop(s.scrollTop()-r*l.wheelSpeed),s.scrollLeft(s.scrollLeft()+o*l.wheelSpeed)),X(),e=P(o,r),e&&n.preventDefault()}),s.bind("MozMousePixelScroll"+S,function(n){e&&n.preventDefault()})},O=function(){var n=!1;s.bind("mouseenter"+S,function(){n=!0}),s.bind("mouseleave"+S,function(){n=!1});var t=!1;e(document).bind("keydown"+S,function(e){if(n){var o=0,r=0;switch(e.which){case 37:o=-3;break;case 38:r=3;break;case 39:o=3;break;case 40:r=-3;break;case 33:r=9;break;case 32:case 34:r=-9;break;case 35:r=-u;break;case 36:r=u;break;default:return}s.scrollTop(s.scrollTop()-r*l.wheelSpeed),s.scrollLeft(s.scrollLeft()+o*l.wheelSpeed),t=P(o,r),t&&e.preventDefault()}})},E=function(){var e=function(e){e.stopPropagation()};T.bind("click"+S,e),m.bind("click"+S,function(e){var n=parseInt(v/2,10),t=e.pageY-m.offset().top-n,o=u-v,r=t/o;0>r?r=0:r>1&&(r=1),s.scrollTop((d-u)*r)}),w.bind("click"+S,e),g.bind("click"+S,function(e){var n=parseInt(f/2,10),t=e.pageX-g.offset().left-n,o=c-f,r=t/o;0>r?r=0:r>1&&(r=1),s.scrollLeft((p-c)*r)})},A=function(){var n=function(e,n){s.scrollTop(s.scrollTop()-n),s.scrollLeft(s.scrollLeft()-e),X()},t={},o=0,r={},l=null,a=!1;e(window).bind("touchstart"+S,function(){a=!0}),e(window).bind("touchend"+S,function(){a=!1}),s.bind("touchstart"+S,function(e){var n=e.originalEvent.targetTouches[0];t.pageX=n.pageX,t.pageY=n.pageY,o=(new Date).getTime(),null!==l&&clearInterval(l),e.stopPropagation()}),s.bind("touchmove"+S,function(e){if(!a&&1===e.originalEvent.targetTouches.length){var l=e.originalEvent.targetTouches[0],s={};s.pageX=l.pageX,s.pageY=l.pageY;var i=s.pageX-t.pageX,c=s.pageY-t.pageY;n(i,c),t=s;var u=(new Date).getTime();r.x=i/(u-o),r.y=c/(u-o),o=u,e.preventDefault()}}),s.bind("touchend"+S,function(){clearInterval(l),l=setInterval(function(){return.01>Math.abs(r.x)&&.01>Math.abs(r.y)?(clearInterval(l),void 0):(n(30*r.x,30*r.y),r.x*=.8,r.y*=.8,void 0)},10)})},j=function(){s.bind("scroll"+S,function(){X()})},W=function(){s.unbind(S),e(window).unbind(S),e(document).unbind(S),s.data("perfect-scrollbar",null),s.data("perfect-scrollbar-update",null),s.data("perfect-scrollbar-destroy",null),w.remove(),T.remove(),g.remove(),m.remove(),w=T=c=u=p=d=f=h=L=v=b=y=null},H=function(n){s.addClass("ie").addClass("ie"+n);var t=function(){var n=function(){e(this).addClass("hover")},t=function(){e(this).removeClass("hover")};s.bind("mouseenter"+S,n).bind("mouseleave"+S,t),g.bind("mouseenter"+S,n).bind("mouseleave"+S,t),m.bind("mouseenter"+S,n).bind("mouseleave"+S,t),w.bind("mouseenter"+S,n).bind("mouseleave"+S,t),T.bind("mouseenter"+S,n).bind("mouseleave"+S,t)},o=function(){k=function(){w.css({left:h+s.scrollLeft(),bottom:L,width:f}),T.css({top:b+s.scrollTop(),right:y,height:v}),w.hide().show(),T.hide().show()}};6===n&&(t(),o())},B="ontouchstart"in window||window.DocumentTouch&&document instanceof window.DocumentTouch,K=function(){var e=navigator.userAgent.toLowerCase().match(/(msie) ([\w.]+)/);e&&"msie"===e[1]&&H(parseInt(e[2],10)),X(),j(),C(),Y(),E(),B&&A(),s.mousewheel&&M(),l.useKeyboard&&O(),s.data("perfect-scrollbar",s),s.data("perfect-scrollbar-update",X),s.data("perfect-scrollbar-destroy",W)};return K(),s})}}),function(e){function n(n){var t=n||window.event,o=[].slice.call(arguments,1),r=0,l=0,s=0;return n=e.event.fix(t),n.type="mousewheel",t.wheelDelta&&(r=t.wheelDelta/120),t.detail&&(r=-t.detail/3),s=r,void 0!==t.axis&&t.axis===t.HORIZONTAL_AXIS&&(s=0,l=-1*r),void 0!==t.wheelDeltaY&&(s=t.wheelDeltaY/120),void 0!==t.wheelDeltaX&&(l=-1*t.wheelDeltaX/120),o.unshift(n,r,l,s),(e.event.dispatch||e.event.handle).apply(this,o)}var t=["DOMMouseScroll","mousewheel"];if(e.event.fixHooks)for(var o=t.length;o;)e.event.fixHooks[t[--o]]=e.event.mouseHooks;e.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var e=t.length;e;)this.addEventListener(t[--e],n,!1);else this.onmousewheel=n},teardown:function(){if(this.removeEventListener)for(var e=t.length;e;)this.removeEventListener(t[--e],n,!1);else this.onmousewheel=null}},e.fn.extend({mousewheel:function(e){return e?this.bind("mousewheel",e):this.trigger("mousewheel")},unmousewheel:function(e){return this.unbind("mousewheel",e)}})}(jQuery);
 
 /*! Sidr - v1.2.1 - 2013-11-06
  * https://github.com/artberri/sidr
  * Copyright (c) 2013 Alberto Varela; Licensed MIT */
 (function(e){var t=!1,i=!1,n={isUrl:function(e){var t=RegExp("^(https?:\\/\\/)?((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$","i");return t.test(e)?!0:!1},loadContent:function(e,t){e.html(t)},addPrefix:function(e){var t=e.attr("id"),i=e.attr("class");"string"==typeof t&&""!==t&&e.attr("id",t.replace(/([A-Za-z0-9_.\-]+)/g,"sidr-id-$1")),"string"==typeof i&&""!==i&&"sidr-inner"!==i&&e.attr("class",i.replace(/([A-Za-z0-9_.\-]+)/g,"sidr-class-$1")),e.removeAttr("style")},execute:function(n,s,a){"function"==typeof s?(a=s,s="sidr"):s||(s="sidr");var r,d,l,c=e("#"+s),u=e(c.data("body")),f=e("html"),p=c.outerWidth(!0),g=c.data("speed"),h=c.data("side"),m=c.data("displace"),v=c.data("onOpen"),y=c.data("onClose"),x="sidr"===s?"sidr-open":"sidr-open "+s+"-open";if("open"===n||"toggle"===n&&!c.is(":visible")){if(c.is(":visible")||t)return;if(i!==!1)return o.close(i,function(){o.open(s)}),void 0;t=!0,"left"===h?(r={left:p+"px"},d={left:"0px"}):(r={right:p+"px"},d={right:"0px"}),u.is("body")&&(l=f.scrollTop(),f.css("overflow-x","hidden").scrollTop(l)),m?u.addClass("sidr-animating").css({width:u.width(),position:"absolute"}).animate(r,g,function(){e(this).addClass(x)}):setTimeout(function(){e(this).addClass(x)},g),c.css("display","block").animate(d,g,function(){t=!1,i=s,"function"==typeof a&&a(s),u.removeClass("sidr-animating")}),v()}else{if(!c.is(":visible")||t)return;t=!0,"left"===h?(r={left:0},d={left:"-"+p+"px"}):(r={right:0},d={right:"-"+p+"px"}),u.is("body")&&(l=f.scrollTop(),f.removeAttr("style").scrollTop(l)),u.addClass("sidr-animating").animate(r,g).removeClass(x),c.animate(d,g,function(){c.removeAttr("style").hide(),u.removeAttr("style"),e("html").removeAttr("style"),t=!1,i=!1,"function"==typeof a&&a(s),u.removeClass("sidr-animating")}),y()}}},o={open:function(e,t){n.execute("open",e,t)},close:function(e,t){n.execute("close",e,t)},toggle:function(e,t){n.execute("toggle",e,t)},toogle:function(e,t){n.execute("toggle",e,t)}};e.sidr=function(t){return o[t]?o[t].apply(this,Array.prototype.slice.call(arguments,1)):"function"!=typeof t&&"string"!=typeof t&&t?(e.error("Method "+t+" does not exist on jQuery.sidr"),void 0):o.toggle.apply(this,arguments)},e.fn.sidr=function(t){var i=e.extend({name:"sidr",speed:200,side:"left",source:null,renaming:!0,body:"body",displace:!0,onOpen:function(){},onClose:function(){}},t),s=i.name,a=e("#"+s);if(0===a.length&&(a=e("<div />").attr("id",s).appendTo(e("body"))),a.addClass("sidr").addClass(i.side).data({speed:i.speed,side:i.side,body:i.body,displace:i.displace,onOpen:i.onOpen,onClose:i.onClose}),"function"==typeof i.source){var r=i.source(s);n.loadContent(a,r)}else if("string"==typeof i.source&&n.isUrl(i.source))e.get(i.source,function(e){n.loadContent(a,e)});else if("string"==typeof i.source){var d="",l=i.source.split(",");if(e.each(l,function(t,i){d+='<div class="sidr-inner">'+e(i).html()+"</div>"}),i.renaming){var c=e("<div />").html(d);c.find("*").each(function(t,i){var o=e(i);n.addPrefix(o)}),d=c.html()}n.loadContent(a,d)}else null!==i.source&&e.error("Invalid Sidr Source");return this.each(function(){var t=e(this),i=t.data("sidr");i||(t.data("sidr",s),"ontouchstart"in document.documentElement?(t.bind("touchstart",function(e){e.originalEvent.touches[0],this.touched=e.timeStamp}),t.bind("touchend",function(e){var t=Math.abs(e.timeStamp-this.touched);200>t&&(e.preventDefault(),o.toggle(s))})):t.click(function(e){e.preventDefault(),o.toggle(s)}))})}})(jQuery);
 
 /*! waitForImages jQuery Plugin 2014-10-27 */
 !function(a){var b="waitForImages";a.waitForImages={hasImageProperties:["backgroundImage","listStyleImage","borderImage","borderCornerImage","cursor"]},a.expr[":"].uncached=function(b){if(!a(b).is('img[src][src!=""]'))return!1;var c=new Image;return c.src=b.src,!c.complete},a.fn.waitForImages=function(c,d,e){var f=0,g=0;if(a.isPlainObject(arguments[0])&&(e=arguments[0].waitForAll,d=arguments[0].each,c=arguments[0].finished),c=c||a.noop,d=d||a.noop,e=!!e,!a.isFunction(c)||!a.isFunction(d))throw new TypeError("An invalid callback was supplied.");return this.each(function(){var h=a(this),i=[],j=a.waitForImages.hasImageProperties||[],k=/url\(\s*(['"]?)(.*?)\1\s*\)/g;e?h.find("*").addBack().each(function(){var b=a(this);b.is("img:uncached")&&i.push({src:b.attr("src"),element:b[0]}),a.each(j,function(a,c){var d,e=b.css(c);if(!e)return!0;for(;d=k.exec(e);)i.push({src:d[2],element:b[0]})})}):h.find("img:uncached").each(function(){i.push({src:this.src,element:this})}),f=i.length,g=0,0===f&&c.call(h[0]),a.each(i,function(e,i){var j=new Image,k="load."+b+" error."+b;a(j).on(k,function l(b){return g++,d.call(i.element,g,f,"load"==b.type),a(this).off(k,l),g==f?(c.call(h[0]),!1):void 0}),j.src=i.src})})}}(jQuery);

 
/*!
 * hoverIntent v1.8.1 // 2014.08.11 // jQuery v1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license. Basically that
 * means you are free to use hoverIntent as long as this header is left intact.
 * Copyright 2007, 2014 Brian Cherne
 */

!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):jQuery&&!jQuery.fn.hoverIntent&&e(jQuery)}(function(e){"use strict";var t,n,o={interval:100,sensitivity:6,timeout:0},i=0,r=function(e){t=e.pageX,n=e.pageY},u=function(e,o,i,v){return Math.sqrt((i.pX-t)*(i.pX-t)+(i.pY-n)*(i.pY-n))<v.sensitivity?(o.off("mousemove.hoverIntent"+i.namespace,r),delete i.timeoutId,i.isActive=!0,delete i.pX,delete i.pY,v.over.apply(o[0],[e])):(i.pX=t,i.pY=n,i.timeoutId=setTimeout(function(){u(e,o,i,v)},v.interval),void 0)},v=function(e,t,n,o){return delete t.data("hoverIntent")[n.id],o.apply(t[0],[e])};e.fn.hoverIntent=function(t,n,s){var a=i++,d=e.extend({},o);d=e.isPlainObject(t)?e.extend(d,t):e.isFunction(n)?e.extend(d,{over:t,out:n,selector:s}):e.extend(d,{over:t,out:t,selector:n});var m=function(t){var n=e.extend({},t),o=e(this),i=o.data("hoverIntent");i||o.data("hoverIntent",i={});var s=i[a];s||(i[a]=s={id:a}),s.timeoutId&&(s.timeoutId=clearTimeout(s.timeoutId));var m=s.namespace=".hoverIntent"+a;if("mouseenter"===t.type){if(s.isActive)return;s.pX=n.pageX,s.pY=n.pageY,o.on("mousemove.hoverIntent"+m,r),s.timeoutId=setTimeout(function(){u(n,o,s,d)},d.interval)}else{if(!s.isActive)return;o.off("mousemove.hoverIntent"+m,r),s.timeoutId=setTimeout(function(){v(n,o,s,d.out)},d.timeout)}};return this.on({"mouseenter.hoverIntent":m,"mouseleave.hoverIntent":m},d.selector)}});