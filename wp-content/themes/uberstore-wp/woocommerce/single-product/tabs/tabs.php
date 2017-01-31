<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

<div class="woocommerce-tabs">
	<ul class="accordion">
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<li class="<?php echo esc_attr( $key ); ?>_tab">
				<div class="title"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ) ?></div>
				<div class="content"><?php call_user_func( $tab['callback'], $key, $tab ) ?></div>
			</li>

		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>