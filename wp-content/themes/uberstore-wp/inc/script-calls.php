<?php

// Main Styles
function main_styles() {	

		 // Register 
		 wp_register_style('thb-foundation', THB_THEME_ROOT . '/assets/css/foundation.css', null, null);
		 wp_register_style("thb-app", THB_THEME_ROOT .  "/assets/css/app.css", null, null);
		 wp_register_style("thb-fa", THB_THEME_ROOT . '/assets/css/font-awesome.min.css', null, null);
		 
		 // Enqueue
		 wp_enqueue_style('thb-foundation');
		 wp_enqueue_style('thb-fa');
		 wp_enqueue_style('thb-app');
		 wp_enqueue_style('style', get_stylesheet_uri(), null, null);	
		 wp_enqueue_style( 'thb-google-fonts', thb_google_webfont() );
		 wp_add_inline_style( 'thb-app', thb_selection() );
}

add_action('wp_enqueue_scripts', 'main_styles');

// Main Scripts
function thb_register_js() {
	
	if (!is_admin()) {
		$thb_api_key = ot_get_option('map_api_key');
		// Register 
		wp_register_script('gmapdep', 'https://maps.google.com/maps/api/js?key='.esc_attr($thb_api_key).'', false, null, false);
		wp_register_script('thb-vendor', THB_THEME_ROOT . '/assets/js/vendor.min.js', array('jquery'), null, TRUE);
		wp_register_script('thb-app', THB_THEME_ROOT . '/assets/js/app.min.js', array('jquery', 'thb-vendor'), null, TRUE);
		
		// Enqueue
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script('comment-reply');
		}
		if (is_page_template('template-contact.php')) {
			wp_enqueue_script('gmapdep');
		}
		// Enqueue
		wp_enqueue_script('thb-vendor');
		wp_enqueue_script('thb-app');
		wp_localize_script( 'thb-app', 'themeajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
		
	}
}
add_action('wp_enqueue_scripts', 'thb_register_js');

// Admin Scripts
function thb_admin_scripts() {
	wp_register_script('thb-admin-meta', THB_THEME_ROOT .'/assets/js/admin-meta.min.js', array('jquery'));
	wp_enqueue_script('thb-admin-meta');
	
	wp_register_style("thb-admin-css", THB_THEME_ROOT . "/assets/css/admin.css");
	wp_enqueue_style('thb-admin-css'); 
	if (class_exists('WPBakeryVisualComposerAbstract')) {
		wp_enqueue_style( 'vc_extra_css', THB_THEME_ROOT . '/assets/css/vc_extra.css' );
	}
}
add_action('admin_enqueue_scripts', 'thb_admin_scripts');

/* WooCommerce */
if(class_exists('woocommerce')) {
	function thb_woocommerce_scripts() {
		if (is_woocommerce() && is_product()) {
			wp_enqueue_script('easyzoom');
			wp_enqueue_script('sharrre');
		}
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
	}
	add_action('wp_enqueue_scripts', 'thb_woocommerce_scripts');
	
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );
}
/* De-register Contact Form 7 styles */
remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_styles' );