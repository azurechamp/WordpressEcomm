<?php 
	$id = $wp_query->get_queried_object_id();
	$display_breadcrumbs = get_post_meta($id, 'display_breadcrumbs', true); 
	$postspage_id = get_option('page_for_posts');
?>
<?php if(($display_breadcrumbs != 'off') && !is_404()) { ?>
<!-- Start Breadcrumbs -->
<div id="breadcrumbs">
<div class="row">
	<div class="small-12 columns">
		<div class="main-header">
			<div class="row">
				<div class="small-12 medium-6 columns">
					<h1>
						<?php 
							if(class_exists('woocommerce') && is_woocommerce()) {
								woocommerce_page_title(); 
							} else if (is_archive()|| is_search()){
								the_archive_title(); 
							} else if (is_home() || is_single()) {
								echo get_the_title($postspage_id); 
							} else {
								echo the_title(); 
							}
						?>
					
					</h1>
				</div>
				<div class="small-12 medium-6 columns hide-for-small">
						<?php 
							if(class_exists('woocommerce') && is_woocommerce()) {
								
								$args = apply_filters( 'woocommerce_breadcrumb_defaults', array(
									'delimiter'   => '<span>/</span>',
									'wrap_before' => '<aside class="breadcrumbs">',
									'wrap_after'  => '</aside>',
									'before'      => '',
									'after'       => '',
									'home'        => __( 'Home', 'uberstore' )
								) );
										
								woocommerce_breadcrumb( $args );
							} else {
								thb_breadcrumb_trail();
							}
						?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End Breadcrumbs -->
<?php } ?>