<?php
/**
 * Wishlist pages template; load template parts basing on the url
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.0
 */
global $wpdb, $woocommerce;
// Start wishlist page printing
if( function_exists( 'wc_print_notices' ) ) {
    wc_print_notices();
}
else{
    $woocommerce->show_messages();
}
?>
<div class="woocommerce">
<div class="row">
<div class="small-12 medium-3 columns">

	<ul id="my-account-nav">
		<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
			<?php _e('Back to My Account', 'uberstore'); ?>
		</a></li>
	</ul>

</div>
<div class="small-12 medium-9 columns">
	<div class="tab-pane active">
		<?php yith_wcwl_get_template( 'wishlist-view.php', $atts ) ?>
	</div>
</div>
</div>