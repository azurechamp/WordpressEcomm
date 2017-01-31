<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'uberstore' ) );
	return;
}
// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

<div class="row">
	<div class="small-12 columns">
		<ul id="shippingsteps">
			<li class="first <?php if (!is_user_logged_in()) { echo 'active'; } ?>"><span>1</span><a href="#" <?php if (!is_user_logged_in()) { echo 'data-target="checkout_login"'; } ?>><?php _e('Checkout Method', 'uberstore'); ?></a></li>
			<li <?php if (is_user_logged_in()) { echo 'class="active"'; } ?>><span>2</span><a href="#" data-target="billing_shipping"><?php _e('Billing &amp; Shipping', 'uberstore'); ?></a></li>
			<li><span>3</span><a href="#" data-target="order_review"><?php _e('Your Order &amp; Payment', 'uberstore'); ?></a></li>
			<li><span>4</span><a href="#"><?php _e('Confirmation', 'uberstore'); ?></a></li>
	</div> 
</div>
<div class="row">
  <div class="small-12 columns">
<?php 
	wc_print_notices(); 
	do_action( 'woocommerce_before_checkout_form', $checkout );
?>
	</div>
</div>
<?php if (!is_user_logged_in()) : ?>
	<section class="section" id="checkout_login">
		<div class="row">
	    <div class="small-12 medium-6 columns">
	    	<div class="title"><?php _e('Returning customers', 'uberstore'); ?></div>
	    	<p><?php _e('If you have shopped with us before, please enter your details in the boxes below.', 'uberstore'); ?></p>
	        <?php
					wc_get_template('checkout/form-login-checkout.php', array(
						'message' => __(' ', 'uberstore'),
						'redirect' => get_permalink(wc_get_page_id('checkout'))
					));
					?>
	    </div>
	    <div class="small-12 medium-6 columns newcustomers">
	    	<div class="title"><?php _e('New customers', 'uberstore'); ?></div>
	    		<?php if (get_option('woocommerce_enable_guest_checkout')=="yes") { ?>
	    		<p><?php _e('You can checkout without creating an account. You will have a chance to create an account later.', 'uberstore'); ?></p>
	        
	        <a href="#" class="btn small black" id="guestcheckout"><?php _e('Checkout as Guest', 'uberstore'); ?></a>
	        <?php } ?>
	        <?php if (get_option('woocommerce_enable_signup_and_login_from_checkout')=="yes") { ?>
	        <a href="#" class="btn small grey" id="createaccount"><?php _e('Create Account', 'uberstore'); ?></a>
	        
	        <div id="checkout_register">
		        <form method="post" class="register" target="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
		        	<?php do_action( 'woocommerce_register_form_start' ); ?>
		        	<div class="title"><?php _e('Create Account', 'uberstore'); ?></div>
		        	<div class="row">
		        		<div class="small-12 columns">
							<?php if ( get_option( 'woocommerce_registration_generate_username' ) === 'no' ) : ?>
							
								<p class="form-row form-row-wide">
									<label for="reg_username"><?php _e( 'Username', 'uberstore' ); ?> <span class="required">*</span></label>
									<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) esc_attr( $_POST['username'] ); ?>" />
								</p>
				
							<?php endif; ?>
				
							<p class="form-row form-row-wide">
								<label for="reg_email"><?php _e( 'Email address', 'uberstore' ); ?> <span class="required">*</span></label>
								<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) esc_attr( $_POST['email'] ); ?>" />
							</p>
				
							<p class="form-row form-row-wide">
								<label for="reg_password"><?php _e( 'Password', 'uberstore' ); ?> <span class="required">*</span></label>
								<input type="password" class="input-text" name="password" id="reg_password" value="<?php if ( ! empty( $_POST['password'] ) ) esc_attr( $_POST['password'] ); ?>" />
							</p>
	
			            <!-- Spam Trap -->
			            <div style="left:-999em; position:absolute;"><label for="trap"><?php _e( 'Anti-spam', 'uberstore' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
			            <?php wp_nonce_field( 'woocommerce-register' ); ?>
			            <input type="submit" class="button_create_account_continue button small" name="register" value="<?php _e('Continue &raquo;', 'uberstore'); ?>" />
			            <input type="hidden" name="redirect" value="<?php echo get_permalink( wc_get_page_id( 'checkout' ) ); ?>" />
			            <input type="hidden" name="_wp_http_referer" value="<?php echo get_permalink( wc_get_page_id( 'checkout' ) ); ?>" />
			            <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	            	</div>
	            </div>
	            <?php do_action( 'woocommerce_register_form_end' ); ?>
		        </form>
        	</div>
	        <?php } ?>
	    </div>
		</div>
	</section>
<?php endif; ?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
		<section class="section" id="billing_shipping" <?php if (is_user_logged_in()) { echo 'style="display:block;"'; } ?>>
			<?php do_action( 'woocommerce_checkout_before_customer_details'); ?>
			<div class="row">
	    	<div class="small-12 medium-6 columns billing">
					<?php do_action('woocommerce_checkout_billing'); ?>
				</div>
				<div class="small-12 medium-6 columns shipping">
					<?php do_action('woocommerce_checkout_shipping'); ?>
				</div>
			</div>
			<?php do_action( 'woocommerce_checkout_after_customer_details'); ?>
		</section>
	<?php endif; ?>
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
	<section class="section woocommerce-checkout-review-order" id="order_review">
		<?php do_action('woocommerce_checkout_order_review'); ?>
	</section>
	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>