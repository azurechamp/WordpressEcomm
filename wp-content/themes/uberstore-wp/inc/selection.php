<?php 
	function thb_selection() {
		$id = get_queried_object_id();
		ob_start();
?>
/* Options set in the admin page */
body p,
.post .post-content p { 
	<?php thb_typeecho(ot_get_option('body_type')); ?>
	color: <?php echo ot_get_option('text_color'); ?>;
}
#header {
	<?php thb_bgecho(ot_get_option('header_bg')); ?>
}
#footer {
	<?php thb_bgecho(ot_get_option('footer_bg')); ?>
}
#subfooter {
	<?php thb_bgecho(ot_get_option('subfooter_bg')); ?>
}
<?php if(ot_get_option('title_type')) { ?>
h1,h2,h3,h4,h5,h6 {
	<?php thb_typeecho(ot_get_option('title_type')); ?>	
}
<?php } ?>
/* Accent Color */
<?php if (ot_get_option('accent_color')) { ?>
#nav .sf-menu > li > a:hover,
#nav .sf-menu > li.menu-item-has-children:hover > a, 
#nav .sf-menu > li.menu-item-has-children > a.active,
.style3 #nav .sf-menu > li > a:hover, 
.style3 #nav .sf-menu > li > a.active,
ul.accordion > li > div.title,
dl.tabs dd.active a,
dl.tabs li.active a,
ul.tabs dd.active a,
ul.tabs li.active a,
dl.tabs dd.active a:hover,
dl.tabs li.active a:hover,
ul.tabs dd.active a:hover,
ul.tabs li.active a:hover,
.toggle .title.toggled,
.iconbox.top.type2 span,
.iconbox.left.type3 span,
.iconbox.right.type3 span,
.counter span,
.testimonials small {
  color: <?php echo ot_get_option('accent_color'); ?>;
}
#nav .dropdown,
#my-account-nav li.active a, 
#my-account-nav li.current-menu-item a,
.widget ul.menu li.active a,
.widget ul.menu li.current-menu-item a,
.pull-nine .widget ul.menu li.current-menu-item a,
.wpb_tour dl.tabs dd.active,
.wpb_tour dl.tabs li.active, 
.wpb_tour ul.tabs dd.active,
.wpb_tour ul.tabs li.active,
.iconbox.top.type2 span,
#nav ul li .sub-menu {
  border-color: <?php echo ot_get_option('accent_color'); ?>;
}
#nav .dropdown:after {
  border-color: transparent transparent <?php echo ot_get_option('accent_color'); ?> transparent;
}
#quick_cart .float_count,
.filters li a.active,
.badge.onsale,
.price_slider .ui-slider-range,
.btn:hover,
.button:hover,
input[type=submit]:hover,
.comment-reply-link:hover,
.btn.black:hover,
.button.black:hover,
input[type=submit].black:hover,
.comment-reply-link.black:hover,
.iconbox span,
.progress_bar .bar span,
.dropcap.boxed {
	background: <?php echo ot_get_option('accent_color'); ?>;	
}
<?php } ?>
<?php if(ot_get_option('product_hover_reverse') == 'on') { ?>
.products .product figure > a .product-image + .product-image {
    left: 100%;
}
.products .product figure:hover .product-image + .product-image {
  left: 0;
}
.products .product figure.fade .product-image + .product-image {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
}
.products .product figure.fade:hover .product-image + .product-image {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
  opacity: 1;
}
<?php } ?>
/* Extra CSS */
<?php 
echo ot_get_option('extra_css');
?>
<?php 
	$out = ob_get_contents();
	if (ob_get_contents()) ob_end_clean();
	// Remove comments
	$out = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out);
	// Remove space after colons
	$out = str_replace(': ', ':', $out);
	// Remove whitespace
	$out = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $out);
	
	return $out;
}