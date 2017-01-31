<div id="subheader" class="show-for-large-up">
	<div class="row">
		<div class="small-12 medium-4 columns social-icons">
			<?php if (ot_get_option('fb_link')) { ?>
			<a href="<?php echo ot_get_option('fb_link'); ?>" class="facebook icon-1x"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if (ot_get_option('pinterest_link')) { ?>
			<a href="<?php echo ot_get_option('pinterest_link'); ?>" class="pinterest icon-1x"><i class="fa fa-pinterest"></i></a>
			<?php } ?>
			<?php if (ot_get_option('twitter_link')) { ?>
			<a href="<?php echo ot_get_option('twitter_link'); ?>" class="twitter icon-1x"><i class="fa fa-twitter"></i></a>
			<?php } ?>
			<?php if (ot_get_option('googleplus_link')) { ?>
			<a href="<?php echo ot_get_option('googleplus_link'); ?>" class="google-plus icon-1x"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			<?php if (ot_get_option('linkedin_link')) { ?>
			<a href="<?php echo ot_get_option('linkedin_link'); ?>" class="linkedin icon-1x"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			<?php if (ot_get_option('instragram_link')) { ?>
			<a href="<?php echo ot_get_option('instragram_link'); ?>" class="instagram icon-1x"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			<?php if (ot_get_option('xing_link')) { ?>
			<a href="<?php echo ot_get_option('xing_link'); ?>" class="xing icon-1x"><i class="fa fa-xing"></i></a>
			<?php } ?>
			<?php if (ot_get_option('tumblr_link')) { ?>
			<a href="<?php echo ot_get_option('tumblr_link'); ?>" class="tumblr icon-1x"><i class="fa fa-tumblr"></i></a>
			<?php } ?>
		</div>
		<div class="small-12 medium-8 columns style2">
			<nav id="subnav">
				<ul>
					<?php if (ot_get_option('header_cart') != 'off') { ?>
					<li>
						<a class="smallcartbtn" href="<?php if(class_exists( 'woocommerce' )) { echo WC()->cart->get_cart_url(); }?>" title="<?php _e('View your shopping cart','uberstore'); ?>">
							(<?php if(class_exists( 'woocommerce' )) { echo WC()->cart->cart_contents_count; } ?> )
						</a>
					</li>
					<?php } ?>
					<li>
						<a href="<?php if(class_exists( 'woocommerce' )) { echo WC()->cart->get_checkout_url(); }?>">
							<?php _e('Checkout', 'uberstore'); ?>
						</a>
					</li>
					<?php if(class_exists('YITH_WCWL')) { ?>
					<li>
						<a href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>" title="<?php _e('Wishlist', 'uberstore'); ?>"><i class="fa fa-heart-o"></i> <?php _e('Wishlist', 'uberstore'); ?></a>
					</li>
					<?php } ?>
					<li>
						<?php
							if ( is_user_logged_in() ) { ?> 
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
								<?php _e('My Account', 'uberstore'); ?>
							</a>
							<?php } else { ?>
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php _e('Login', 'uberstore'); ?></a>
						<?php } ?>
					</li>
					<li>
						<a href="#searchpopup" rel="inline" data-class="searchpopup">
							<?php _e('Search','uberstore'); ?>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
<header id="header" class="style2">
	<div class="row">
		<div class="small-12 large-4 columns logo">
			<div class="row" data-equal=">.columns">
				<div class="small-7 large-12 columns">
					<?php if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = THB_THEME_ROOT. '/assets/img/logo-dark.png'; } ?>
					
					<a href="<?php echo home_url(); ?>" class="logolink <?php if(ot_get_option('logo_mobile')) { ?>hide-logo<?php } ?>"><img src="<?php echo $logo; ?>" class="logoimg" alt="<?php bloginfo('name'); ?>"/></a>
					<?php if(ot_get_option('logo_mobile')) { ?>
						<a href="<?php echo home_url(); ?>" class="show-logo logolink"><img src="<?php echo ot_get_option('logo_mobile'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
					<?php } ?>
				</div>
				<div class="small-5 columns mobile-icons">
					<div>
						<?php if (ot_get_option('header_cart') != 'off') { ?>
						<a href="<?php if(class_exists( 'woocommerce' )) { echo WC()->cart->get_cart_url(); }?>" title="<?php _e('View your shopping cart','uberstore'); ?>" id="mobile-cart">
							<span><?php if(class_exists( 'woocommerce' )) { echo WC()->cart->cart_contents_count; } ?></span>
						</a>
						<?php } ?>
						<a href="#mobile-toggle" id="mobile-toggle">
							<i class="fa fa-bars"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="small-12 large-8 columns">
			<nav id="nav">
				<?php if(has_nav_menu('nav-menu')) { ?>
				  <?php wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'sf-menu', 'walker' => new thb_MegaMenu  ) ); ?>
				<?php } else if ( current_user_can( 'edit_theme_options' ) ) { ?>
				    <ul class="sf-menu">
				        <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Please assign a menu', 'uberstore' ); ?></a></li>
				    </ul>
				<?php } ?>
			</nav>
		</div>
	</div>
</header>