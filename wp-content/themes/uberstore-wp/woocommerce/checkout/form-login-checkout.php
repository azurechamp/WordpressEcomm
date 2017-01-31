<?php

global $woocommerce;

if (is_user_logged_in()) return;
?>
<form method="post" class="row">
	<?php if ($message) echo wpautop(wptexturize($message)); ?>

	<div class="small-12 medium-8 columns">
		<label for="username"><?php _e('Username or email', 'uberstore'); ?></label>
		<input type="text" class="input-text" name="username" id="username" />
	</div>
	
  <div class="small-12 medium-8 columns">
    <label for="password"><?php _e('Password', 'uberstore'); ?></label>
		<input class="input-text" type="password" name="password" id="password" />
	</div>
	<div class="small-12 medium-8 columns">
		<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="custom_check" /> 
		<label for="rememberme" class="custom_label checkout_remember">
			<?php _e( 'Remember me', 'uberstore' ); ?>
		</label>
	</div>
	<div class="small-12 columns">
		<?php wp_nonce_field( 'woocommerce-login' ); ?>
		
		<input type="submit" class="button_checkout_login button small" name="login" value="<?php _e('Login', 'uberstore'); ?>" />
		<a class="lost_password" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e('Lost Password?', 'uberstore'); ?></a>
    <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
	</div>
</form>