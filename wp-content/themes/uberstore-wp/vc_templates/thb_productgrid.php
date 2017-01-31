<?php function thb_productgrid( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_productgrid', $atts );
	extract( $atts );
	
	global $woocommerce;
	
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
				'meta_query' => array(
					array(
						'key' => '_sale_price',
						'value' =>  0,
						'compare'   => '>',
						'type'      => 'NUMERIC'
					),
					array(
						'key' => '_visibility',
						'value' => array('catalog', 'visible'),
						'compare' => 'IN'
					),
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
				'orderby' 		=> 'meta_value'
			);	    
	}	    
	$products = new WP_Query( $args );
 	
 	ob_start();
 	$i = 1;

	if ( $products->have_posts() ) { ?>
	   
		<div class="products row packery">
		
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				<?php
				global $product, $post;
				$font;
				switch($i) {
					case 1:
					case 13:
						$imagesize=array("570","600");
						$font = 'large';
						$articlesize = 'small-12 medium-6';
						break;
					case 2:
					case 4:
					case 5:
					case 6:
					case 9:
					case 8:
					case 10:
					case 11:
					case 14:
					case 15:
						$imagesize=array("270","285");
						$font = 'small';
						$articlesize = 'small-12 medium-3';
						break;
					case 3:
					case 7:
					case 12:
						$imagesize=array("270","600");
						$articlesize = 'small-12 medium-3';
						$font = 'medium';
						break;
				} ?>
				<article itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class($articlesize . ' columns'); ?>>
					<?php if ( has_post_thumbnail() ) {
					
							$image_id = get_post_thumbnail_id();
							$image_link = wp_get_attachment_image_src($image_id,'full');
							$image = aq_resize( $image_link[0], $imagesize[0], $imagesize[1], true, false);
						
						}
					?>
					<figure>
						<img  src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
						<div class="overlay">
							<div class="post-title<?php if($font) { echo ' '.$font; } ?>">	
							<?php
								$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
								echo $product->get_categories( ', ', '<aside class="post_categories">' . _n( '', '', $size, 'uberstore' ) . ' ', '</aside>' );
							?>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							</div>
						</div>
					</figure>
				</article>
				
			<?php $i++; endwhile; // end of the loop. ?>
		 
		</div>
		
	   
	<?php }
	     
   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
   
   wp_reset_query();
   wp_reset_postdata();
	   
  return $out;
}
add_shortcode('thb_productgrid', 'thb_productgrid');
