<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce; ?>

<div class="row">
	<div class="small-12 columns">
		<ul id="shippingsteps">
			<li class="first"><span>1</span><a href="#"><?php _e('Checkout Method', 'uberstore'); ?></a></li>
			<li><span>2</span><a href="#"><?php _e('Billing &amp; Shipping', 'uberstore'); ?></a></li>
			<li><span>3</span><a href="#"><?php _e('Your Order &amp; Payment', 'uberstore'); ?></a></li>
			<li class="active"><span>4</span><a href="#"><?php _e('Confirmation', 'uberstore'); ?></a></li>
	</div> 
</div>

<?php if ( $order ) : ?>
	<div class="row">
	<?php if ( $order->has_status( 'failed' ) ) : ?>
		<div class="small-12 medium-3 columns">
			<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'uberstore' ); ?></p>
	
			<p><?php
				if ( is_user_logged_in() )
					_e( 'Please attempt your purchase again or go to your account page.', 'uberstore' );
				else
					_e( 'Please attempt your purchase again.', 'uberstore' );
			?></p>
	
			<p>
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'uberstore' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'uberstore' ); ?></a>
				<?php endif; ?>
			</p>
		</div>
	<?php else : ?>
		<div class="small-12 medium-3 columns">
			<p><?php _e( 'Thank you. Your order has been received.', 'uberstore' ); ?></p>
	
			<ul class="order_details">
				<li class="order">
					<?php _e( 'Order:', 'uberstore' ); ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>
				<li class="date">
					<?php _e( 'Date:', 'uberstore' ); ?>
					<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
				</li>
				<li class="total">
					<?php _e( 'Total:', 'uberstore' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>
				<?php if ( $order->payment_method_title ) : ?>
				<li class="method">
					<?php _e( 'Payment method:', 'uberstore' ); ?>
					<strong><?php echo $order->payment_method_title; ?></strong>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	<?php endif; ?>

		<div class="small-12 medium-9 columns">
			<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
		
			<?php do_action( 'woocommerce_thankyou', $order->id ); ?>
	
		</div>
	</div>
<?php else : ?>

	<p><?php _e( 'Thank you. Your order has been received.', 'uberstore' ); ?></p>

<?php endif; ?>