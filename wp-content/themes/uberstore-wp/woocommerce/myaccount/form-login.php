<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices();  ?>

<?php do_action('woocommerce_before_customer_login_form'); ?>
<div class="row" id="customer_login">
<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes') : ?>
	<div class="small-12 medium-6 columns">
<?php else: ?>
	<div class="small-12 medium-centered medium-6 columns">
<?php endif; ?>

		
		<form method="post" class="login row">
			<?php do_action( 'woocommerce_login_form_start' ); ?>
			<div class="small-12<?php if (get_option('woocommerce_enable_myaccount_registration') !=='yes') { ?> medium-centered<?php } ?> medium-8 columns">
				<div class="title"><?php _e( 'Registered Customers', 'uberstore' ); ?></div>
				<label for="username"><?php _e( 'Username or email', 'uberstore' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				<label for="password"><?php _e( 'Password', 'uberstore' ); ?> <span class="required">*</span></label>
				<input class="input-text" type="password" name="password" id="password" />
				<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="custom_check"/> 
				<label for="rememberme" class="custom_label">
					<?php _e( 'Remember me', 'uberstore' ); ?>
				</label>
				<?php do_action( 'woocommerce_login_form' ); ?>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'uberstore' ); ?>" />
				<a class="lost_password" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost Password?', 'uberstore' ); ?></a>
			</div>
			<?php do_action( 'woocommerce_login_form_end' ); ?>
		</form>

<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes') : ?>

	</div>

	<div class="small-12 medium-6 columns">
		<form method="post" class="register row">
			<?php do_action( 'woocommerce_register_form_start' ); ?>
			<div class="small-12 medium-8 columns">
				<div class="title"><?php _e( 'Register', 'uberstore' ); ?></div>
			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
				<label for="reg_username"><?php _e( 'Username', 'uberstore' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
			<?php endif; ?>
				<label for="reg_email"><?php _e( 'Email', 'uberstore' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
				<label for="reg_password"><?php _e( 'Password', 'uberstore' ); ?> <span class="required">*</span></label>
				<input type="password" class="input-text" name="password" id="reg_password" value="<?php if (isset($_POST['password'])) echo esc_attr($_POST['password']); ?>" />
			<?php endif; ?>
				<!-- Spam Trap -->
				<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'uberstore' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
				
				<?php do_action( 'woocommerce_register_form' ); ?>
				<?php do_action( 'register_form' ); ?>
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="button" name="register" value="<?php _e( 'Register', 'uberstore' ); ?>" />
			</div>
			<?php do_action( 'woocommerce_register_form_end' ); ?>
		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>