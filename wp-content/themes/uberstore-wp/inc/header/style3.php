<header id="header" class="style3">
	<div class="row">
		<div class="small-12 large-4 columns logo">
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
		<div class="small-12 large-8 columns">
			<aside class="mainbox">
				<nav id="subnav">
					<ul>
						<li>
							<a href="#searchpopup" rel="inline" data-class="searchpopup">
								<?php _e('<i class="fa fa-search"></i>','uberstore'); ?>
							</a>
						</li>
						<li>
								<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
									<?php _e('<i class="fa fa-user"></i>', 'uberstore'); ?>
								</a>
						</li>
						<?php if(class_exists('YITH_WCWL')) { ?>
						<li>
							<a href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>" title="<?php _e('Wishlist', 'uberstore'); ?>"><i class="fa fa-heart-o"></i></a>
						</li>
						<?php } ?>
						<?php if (ot_get_option('header_cart') != 'off') { ?>
						<li>
							<?php if(class_exists('woocommerce')) { ?>
								<div id="quick_cart"></div>
							<?php } ?>
						</li>
						<?php } ?>
					</ul>
				</nav>
			</aside>
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