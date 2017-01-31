<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); 

?>

<div class="row">

<?php
	/**
	 * woocommerce_before_main_content hook
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 */
	do_action('woocommerce_before_main_content');
?>


<?php if (isset($_GET['sidebar'])) { $sidebar_pos = htmlspecialchars($_GET['sidebar']); } else { $sidebar_pos = ot_get_option('shop_sidebar'); }  ?>
<?php if($sidebar_pos != 'no') { ?>
    <section class="small-12 medium-9 columns <?php if ($sidebar_pos == 'left')  { echo 'medium-push-3'; } ?>" id="shop-page">
<?php } else { ?>
		<section class="small-12 columns" id="shop-page">
<?php } ?>
		<div class="woocommerce-count-wrap">
			<div class="row">
			    <div class="small-12 medium-8 columns breadcrumbs">
			        <?php if ( have_posts() ) : ?>
			        		<?php do_action( 'thb_before_shop_loop_result_count' ); ?>
			         <?php endif; ?>
			    </div>
			    <div class="small-12 medium-4 columns ordering">
			        <?php if ( have_posts() ) : ?>
			            <?php do_action( 'thb_before_shop_loop_catalog_ordering' ); ?>
			        <?php endif; ?>
			    </div>
			</div>
		</div>
		<?php 
			if (is_shop()) {
				echo do_shortcode(ot_get_option('shop_header'));
			} else if (is_product_category()) {
				// GET CUSTOM HEADER CONTENT FOR CATEGORY
				if(function_exists('get_term_meta')){
					$queried_object = get_queried_object(); 
					
					if (isset($queried_object->term_id)){
				
						$term_id = $queried_object->term_id;  
						$content = get_term_meta($term_id, 'cat_meta');
				
						if(isset($content[0]['cat_header'])){
							echo do_shortcode($content[0]['cat_header']);
						}
					}
				}
			}
		?>
		<?php do_action( 'woocommerce_before_shop_loop' ); ?>
		

		<?php if ( have_posts() ) : ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>
					
				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>


                      
 </section>
 
<?php if($sidebar_pos != 'no') { ?>
    <?php get_sidebar('shop'); ?>
<?php } ?>

</div><!-- end row -->

<?php get_footer('shop'); ?>