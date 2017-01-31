<header id="header" class="style1">
	<div class="row">
		<div class="small-12 large-5 columns logo">
			<div class="row" data-equal=">.columns">
				<div class="small-7 large-12 columns">
					<?php if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = THB_THEME_ROOT. '/assets/img/logo-light.png'; } ?>
					
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
		<div class="small-12 large-7 columns show-for-large-up">
			<aside class="mainbox">
				<?php if( class_exists('woocommerce')  &&  (ot_get_option('header_cart') != 'off') ) { ?>
					<div id="quick_cart">
					</div>
				<?php } ?>
				<div class="navholder">
					<nav id="subnav">
						<ul>
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
						</ul>
					</nav>
					<div class="header_line"><?php echo ot_get_option('header_line', 'Please add text from Appearance -> Theme Options'); ?></div>
				</div>
			</aside>
		</div>
	</div>
</header>
<nav id="nav">
	<div class="row">
		<div class="small-12 medium-12 large-9 columns">
			<?php if(has_nav_menu('nav-menu')) { ?>
			  <?php wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'sf-menu', 'walker' => new thb_MegaMenu  ) ); ?>
			<?php } else if ( current_user_can( 'edit_theme_options' ) ) { ?>
			    <ul class="sf-menu">
			        <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Please assign a menu', 'uberstore' ); ?></a></li>
			    </ul>
			<?php } ?>
		</div>
		<div class="large-3 columns show-for-large-up">
			<?php if(class_exists( 'woocommerce' )) { get_product_search_form(); } else { get_search_form(); } ?>
		</div>
	</div>
</nav>