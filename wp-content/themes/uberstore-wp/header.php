<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_site_icon(); ?>
	<?php 
		$header_style = isset($_GET['header_style']) ? htmlspecialchars($_GET['header_style']) : ot_get_option('header_style', 'style1');
	?>
	<?php 
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head(); 
	?>
</head>
<body <?php body_class(); ?> data-url="<?php echo esc_url(home_url()); ?>">
<!-- Start Mobile Menu -->
<div id="sidr-main">
	<a href="#" id="sidr-close"></a>
	<?php if(class_exists( 'woocommerce' )) { get_product_search_form(); } else { get_search_form(); } ?>
	<?php if(has_nav_menu('nav-menu')) { ?>
	  <?php wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'mobile-menu' ) ); ?>
	<?php } else if ( current_user_can( 'edit_theme_options' ) ) { ?>
	    <ul class="sf-menu">
	        <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Please assign a menu', 'uberstore' ); ?></a></li>
	    </ul>
	<?php } ?>
</div>
<!-- End Mobile Menu -->

<div id="wrapper">

<!-- Start Header -->
<?php get_template_part( 'inc/header/'.$header_style ); ?>
<!-- End Header -->
<?php if (is_page()) {
		$rev_slider_alias = get_post_meta($post->ID, 'rev_slider_alias', true);
		if ($rev_slider_alias) {?>
<div id="home-slider">
	<?php if (function_exists('putRevSlider')) { putRevSlider($rev_slider_alias); } ?>
</div>
<?php  }
	}
?>
<?php get_template_part('template-breadcrumbs'); ?>
<div role="main">