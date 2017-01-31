<?php

/* Ajax WOOCOMMERCE CART - Style 2*/
function thb_woocomerce_ajax_cart_updatesmall($fragments) {
	if(class_exists('woocommerce')) {
		ob_start();
		?>
			<a class="smallcartbtn" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart','uberstore'); ?>">
				(<?php echo WC()->cart->cart_contents_count; ?>)
			</a>
		<?php	
		$fragments['.smallcartbtn'] = ob_get_clean();
		return $fragments;
	}
}
add_filter('add_to_cart_fragments', 'thb_woocomerce_ajax_cart_updatesmall');

/* Ajax WOOCOMMERCE CART - Mobile */
function thb_woocomerce_ajax_cart_updatemobile($fragments) {
	if(class_exists('woocommerce')) {
		ob_start();
		?>
			<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart','uberstore'); ?>" id="mobile-cart">
				<span><?php echo WC()->cart->cart_contents_count; ?></span>
			</a>

		<?php	
		$fragments['#mobile-cart'] = ob_get_clean();
		return $fragments;
	}
}
add_filter('add_to_cart_fragments', 'thb_woocomerce_ajax_cart_updatemobile');

/* WOOCOMMERCE CART LINK */	
function thb_woocomerce_ajax_cart_update($fragments) {
	if(class_exists('woocommerce')) {
		ob_start();
		?>
			<div id="quick_cart">
				<a id="mycartbtn" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart','uberstore'); ?>"> <span class="float_count"><?php echo WC()->cart->cart_contents_count; ?></span></a>
					<div class="cart_holder">
					<ul class="cart_details">
						<?php if (sizeof(WC()->cart->cart_contents)>0) : foreach (WC()->cart->cart_contents as $cart_item_key => $cart_item) :
						    $_product = $cart_item['data'];                                            
						    if ($_product->exists() && $cart_item['quantity']>0) :?>
							<li>
								<figure>
									<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
										if ( ! $_product->is_visible() )
											echo $thumbnail;
										else
											printf( '<a class="cart_list_product_img" href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
									?>
								</figure>
								
								<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">×</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'uberstore') ), $cart_item_key ); ?>
								
								<div class="list_content">
									<?php 
									 $product_title = $_product->get_title();
								       echo '<h5><a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a></h5>';
								       echo '<span class="quantity">'.$cart_item['quantity'].'</span>';
								       echo '<div class="price">'.apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ).'</div>';
									?>
								</div>
							</li>
						<?php endif; endforeach; ?>
							<div class="subtotal">                                        
							    <?php _e('subtotal', 'uberstore'); ?><span><?php echo WC()->cart->get_cart_total(); ?></span>                                   
							</div>
							
							<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="btn large grey"><?php _e('View Shopping Bag', 'uberstore'); ?></a>   
							
							<a href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>" class="btn large"><?php _e('Checkout', 'uberstore'); ?></a>
							
						<?php else: echo '<p class="empty">'.__('You have no products in your shopping bag.','uberstore').'</p>'; endif; ?>
					</ul>
					</div>
			</div>
		<?php	
		$fragments['#quick_cart'] = ob_get_clean();
		return $fragments;
	}
}
add_filter('add_to_cart_fragments', 'thb_woocomerce_ajax_cart_update');


/* The Quickview Ajax Output */
function quickview() {
	global $post, $product;
	$id =  $_POST["id"];
	$post = get_post($id);
	$product = wc_get_product($id);

	ob_start();
	
	wc_get_template( 'content-single-product-lightbox.php');
	
	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
	die();
}
add_action('wp_ajax_quickview', 'quickview');
add_action('wp_ajax_nopriv_quickview', 'quickview');


/* Products per Page */
function thb_ppp_setup() {
	
	if( isset( $_GET['show_products']) ){ 
		$getproducts = $_GET['show_products'];
		if ($getproducts == "all") {
	    	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return -1;' ) );
	    } else {
	    	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$getproducts.';' ) );
	    }
	} else {
	    $products_per_page = ot_get_option('shop_product_count', 12);
	    add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $products_per_page . ';' ), 20 );
	}
}
add_action( 'after_setup_theme', 'thb_ppp_setup' );

/* Shop Page - Remove orderby & breadcrumb */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'thb_before_shop_loop_result_count', 'woocommerce_result_count', 20 );
add_action( 'thb_before_shop_loop_catalog_ordering', 'woocommerce_catalog_ordering', 30 );

/* Product Page - Move Tabs/Accordion next to image */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );

/* Product Page - Remove breadcrumbs */
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
/* Product Page - Remove Sale Flash */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' , 10);
/* Product Page - Remove Tabs */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' , 10);
/* Product Page - Move Sharing to top */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 35 );

/* Product Page - Remove Related Products */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20 );

/* Cart Page - Move Crosssells */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );

/* Custom Metabox for Category Pages */
if(function_exists('get_term_meta')){
	function thb_taxonomy_meta_field($term) {
	
		$t_id = $term->term_id;
		$term_meta = get_term_meta($t_id,'cat_meta');
		if(!$term_meta){$term_meta = add_term_meta($t_id, 'cat_meta', '');}
		 ?>
		<tr>
		<th scope="row" valign="top"><label for="term_meta[cat_header]"><?php _e( 'Category Header', 'uberstore' ); ?></label></th>
			<td>				
					<?php 
					$content = esc_attr( $term_meta[0]['cat_header'] ) ? esc_attr( $term_meta[0]['cat_header'] ) : '';
					
					wp_editor( 
					  $content, 
					  "term_meta[cat_header]", 
					  array(
					    'wpautop'       => true,
					    'media_buttons' => true,
					    'textarea_name' => "term_meta[cat_header]",
					    'textarea_rows' => "6",
					    'tinymce'       => true
					  ) 
					);
				  ?>
				<p class="description"><?php _e( 'This content will be displayed at the top of this category. You can use your shortcodes here. <small>You can create your content using visual composer and then copy its text here</small>','uberstore' ); ?></p>
			</td>
		</tr>
	<?php
	}
	add_action( 'product_cat_edit_form_fields', 'thb_taxonomy_meta_field', 10, 2 );
	
	/* Save Custom Meta Data */
	function thb_save_taxonomy_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_term_meta($t_id,'cat_meta');
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			update_term_meta($term_id, 'cat_meta', $term_meta);
	
		}
	}  
	add_action( 'edited_product_cat', 'thb_save_taxonomy_custom_meta', 10, 2 );
}

/* Redirect to Homepage when customer log out */
add_filter('logout_url', 'thb_new_logout_url', 10, 2);
function thb_new_logout_url($logouturl, $redir) {
	$redirect = get_option('siteurl');
	return $logouturl . '&amp;redirect_to=' . urlencode($redirect);
}