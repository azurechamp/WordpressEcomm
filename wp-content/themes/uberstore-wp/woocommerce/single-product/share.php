<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post;
?>
<aside id="product_share">
	<div class="row">
		<div class="small-3 columns hide-for-small">
			<?php _e( 'Share', 'uberstore' ); ?>
		</div>
		<div class="small-12 medium-9 columns small-only-text-center">
			<?php do_action('thb_social_product'); ?>
		</div>
	</div>
</aside>
<?php do_action('woocommerce_share'); // Sharing plugins can hook into here ?>