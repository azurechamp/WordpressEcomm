<?php function thb_product( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_product', $atts );
  extract( $atts );
	
	global $woocommerce;
			
	$args = array();
	
	if ($product_sort == "latest-products") {
		$args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'ignore_sticky_posts'   => 1,
				'posts_per_page' => $item_count
			);	    
	} else if ($product_sort == "featured-products") {			
		$args = array(
			    'post_type' => 'product',
			    'post_status' => 'publish',
				'ignore_sticky_posts'   => 1,
			    'meta_key' => '_featured',
			    'meta_value' => 'yes',
			    'posts_per_page' => $item_count
			);
	} else if ($product_sort == "top-rated") {
		add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );
				
		$args = array(
		    'post_type' => 'product',
		    'post_status' => 'publish',
				'ignore_sticky_posts'   => 1,
		    'posts_per_page' => $item_count
		);
		$args['meta_query'] = $woocommerce->query->get_meta_query();
	
	} else if ($product_sort == "sale-products") {
		$args = array(
			    'post_type' => 'product',
				'post_status' => 'publish',
				'ignore_sticky_posts'   => 1,
				'posts_per_page' => $item_count,
				'meta_query'     => array(
	        'relation' => 'OR',
	        array( // Simple products type
	            'key'           => '_sale_price',
	            'value'         => 0,
	            'compare'       => '>',
	            'type'          => 'numeric'
	        ),
	        array( // Variable products type
	            'key'           => '_min_variation_sale_price',
	            'value'         => 0,
	            'compare'       => '>',
	            'type'          => 'numeric'
	        )
	    	)
			);
	} else if ($product_sort == "by-category"){
		$args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'ignore_sticky_posts'   => 1,
				'product_cat' => $cat,
				'posts_per_page' => $item_count
			);	    
	} else if ($product_sort == "by-id"){
		$product_id_array = explode(',', $product_ids);
		$args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'ignore_sticky_posts'   => 1,
				'post__in'		=> $product_id_array
			);	    
	} else {
		$args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'ignore_sticky_posts'   => 1,
				'posts_per_page' => $item_count,
				'meta_key' 		=> 'total_sales',
				'orderby' 		=> 'meta_value_num'
			);	    
	}
	$products = new WP_Query( $args );
 	
 	ob_start();
 	
	if ( $products->have_posts() ) { ?>
	   
		<?php if ($carousel == "yes") { ?>
			
			<div class="carousel-container">
				<div class="carousel products owl row" data-columns="<?php echo $columns; ?>" data-navigation="true">				
					
					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				
						<?php wc_get_template_part( 'content', 'product' ); ?>
				
					<?php endwhile; // end of the loop. ?>	 
										
				</div>
			</div>
			
		<?php } else {  ?> 
			<?php switch($columns) {
				case 2:
					$col = 'two';
					break;
				case 3:
					$col = 'three';
					break;
				case 4:
					$col = 'four';
					break;
			} ?>
		<div class="products row <?php echo $col;?>-columns" data-equal=">.product">
		
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
		
				<?php wc_get_template_part( 'content', 'product' ); ?>
		
			<?php endwhile; // end of the loop. ?>
		 
		</div>
		
		<?php } ?>
	   
	<?php }
	     
   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
   
   wp_reset_query();
   wp_reset_postdata();
   remove_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );
	   
  return $out;
}
add_shortcode('thb_product', 'thb_product');
