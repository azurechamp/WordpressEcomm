<?php function thb_post( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_post', $atts );
  extract( $atts );
    
	$args = array(
		'showposts' => $item_count, 
		'nopaging' => 0, 
		'post_type'=>'post', 
		'post_status' => 'publish', 
		'ignore_sticky_posts' => 1,
		'no_found_rows' => true
	);
	if ($source == 'by-category') {
	 	if (!empty($cat)) {
	 		$cats = explode(',',$cat);
	 		$args = wp_parse_args( 
	 			array(
	 				'showposts' => $item_count,
	 				'category__in' => $cats
	 			)
	 		, $args );	
	 	}
	} else if ($source == 'by-id') {
		$post_id_array = explode(',', $post_ids);
		
		$args = wp_parse_args( 
			array(
				'post__in' => $post_id_array,
				'showposts' => 99
			)
		, $args );	
	} else if ($source == 'by-tag') {
		$post_tag_array = explode(',', $tag_slugs);
		
		$args = wp_parse_args( 
			array(
				'showposts' => $item_count,
				'tag_slug__in' => $post_tag_array
			)
		, $args );	
	} else if ($source == 'by-author') {
		$post_author_array = explode(',', $author_ids);
		
		$args = wp_parse_args( 
			array(
				'showposts' => $item_count,
				'author__in' => $post_author_array
			)
		, $args );	
	}
	$posts = new WP_Query( $args );
 	
 	ob_start();
 	
	if ( $posts->have_posts() ) { ?>
	  <?php switch($columns) {
	  	case 2:
	  		$col = 'medium-6';
	  		$w = '570';
	  		break;
	  	case 3:
	  		$col = 'medium-4';
	  		$w = '370';
	  		break;
	  	case 4:
	  		$col = 'medium-3';
	  		$w = '270';
	  		break;
	  } ?>
		<?php if ($carousel == "yes") { ?>
			
			<div class="carousel-container">
				<div class="carousel posts owl row" data-columns="<?php echo $columns; ?>" data-navigation="true">				
					
					<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
						<?php $image_id = get_post_thumbnail_id();
						$image_link = wp_get_attachment_image_src($image_id,'full');
						$image = aq_resize( $image_link[0], $w, 180, true, false);
						$image_title = esc_attr( get_the_title(get_the_ID()) ); ?>
						<article <?php post_class('post '.$col.' columns'); ?> id="post-<?php the_ID(); ?>">
							<figure class="post-gallery">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" title="<?php echo $image_title; ?>" /></a>
								<time><?php echo get_the_date('d'); ?><br><?php echo get_the_date('M'); ?></time>
							</figure>
							<div class="post-title">
								<aside class="post_categories">
									<?php the_category(', '); ?>
								</aside>
								<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="post-content">
								<?php echo thb_ShortenText(get_the_content(), 100); ?>
							</div>
						</article>
					<?php endwhile; // end of the loop. ?>	 
										
				</div>
			</div>
			
		<?php } else {  ?> 
		<div class="posts row" data-equal="article">
		
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php $image_id = get_post_thumbnail_id();
				$image_link = wp_get_attachment_image_src($image_id,'full');
				$image = aq_resize( $image_link[0], $w, 180, true, false);
				$image_title = esc_attr( get_the_title(get_the_ID()) ); ?>
				<article <?php post_class('post small-6 '.$col.' columns'); ?> id="post-<?php the_ID(); ?>">
					<figure class="post-gallery">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img  src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" title="<?php echo $image_title; ?>" /></a>
							<time><?php echo get_the_date('d'); ?><br><?php echo get_the_date('M'); ?></time>
						</figure>
						<div class="post-title">
							<aside class="post_categories">
								<?php the_category(', '); ?>
							</aside>
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="post-content">
							<?php echo thb_ShortenText(get_the_content(), 100); ?>
						</div>
					</article>
			<?php endwhile; // end of the loop. ?>
		 
		</div>
		
		<?php } ?>
	   
	<?php }

   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
   
   wp_reset_query();
   wp_reset_postdata();
     
  return $out;
}
add_shortcode('thb_post', 'thb_post');
