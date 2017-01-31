<?php
/**
 * The template for displaying lookbook product style content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product;

$attachment_ids = $product->get_gallery_attachment_ids();
?>

<div <?php post_class('columns'); ?>>
	<figure>
		<?php if ( has_post_thumbnail() ) : 
			$image_id = get_post_thumbnail_id();
			$image_link = wp_get_attachment_image_src($image_id,'full');
			$image = aq_resize( $image_link[0], 370, 520, true, false);
		?>
			<img src="<?php echo esc_attr($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" />
		<?php endif; ?>
		<div class="overlay">
			<div class="post-title">
				<?php
					$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
					echo $product->get_categories( ', ', '<aside class="post_categories">' . _n( '', '', $size, 'uberstore' ) . ' ', '</aside>' );
				?>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<a href="<?php the_permalink(); ?>" class="btn white"><?php _e('Shop The Look', 'uberstore'); ?></a>
			</div>
		</div>
	</figure>
</div><!-- end product -->