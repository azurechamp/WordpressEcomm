</div>
<?php $footer_style = isset($_GET['footer_style']) ? htmlspecialchars($_GET['footer_style']) : ot_get_option('footer_style'); ?>
<?php if( $footer_style == 'style2' ) {  ?>
<!-- Start Style2 Footer Container -->
<div id="footer_container">
<?php } ?>
	<?php if (ot_get_option('footer') != 'no') { ?>
	<!-- Start Footer -->
	<footer id="footer" class="<?php echo esc_attr($footer_style); ?>">
	  	<div class="row">
	  		<?php if (ot_get_option('footer_columns') == 'fourcolumns') { ?>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
			    <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
			    <?php dynamic_sidebar('footer4'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'threecolumns') { ?>
		    <div class="small-12 medium-4 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-4 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-4 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'twocolumns') { ?>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'doubleleft') { ?>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'doubleright') { ?>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-6 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'fivecolumns') { ?>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer4'); ?>
		    </div>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer5'); ?>
		    </div>
		    <?php }?>
	    </div>
	</footer>
	<!-- End Footer -->
	<?php } ?>
	<?php if (ot_get_option('subfooter') != 'no') { ?>
	<!-- Start Sub-Footer -->
	<div id="subfooter">
		<div class="row">
			<div class="small-12 medium-4 columns">
				<p><?php echo ot_get_option('copyright','COPYRIGHT 2014 FUEL THEMES. All RIGHTS RESERVED.'); ?> </p>
			</div>
			<div class="small-12 medium-8 columns paymenttypes-container">
				<?php if (ot_get_option('payment_visa') != 'off') { ?>
					<figure class="paymenttypes visa"></figure>
				<?php } ?>
				<?php if (ot_get_option('payment_mc') != 'off') { ?>
					<figure class="paymenttypes mc"></figure>
				<?php } ?>
				<?php if (ot_get_option('payment_pp') != 'off') { ?>
					<figure class="paymenttypes paypal"></figure>
				<?php } ?>
				<?php if (ot_get_option('payment_discover') != 'off') { ?>
					<figure class="paymenttypes discover"></figure>
				<?php } ?>
				<?php if (ot_get_option('payment_amazon') != 'off') { ?>
					<figure class="paymenttypes amazon"></figure>
				<?php } ?>
				<?php if (ot_get_option('payment_stripe') != 'off') { ?>
					<figure class="paymenttypes stripe"></figure>
				<?php } ?>
				<?php if (ot_get_option('payment_amex') != 'off') { ?>
					<figure class="paymenttypes amex"></figure>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- End Sub-Footer -->
	<?php } ?>
<?php if( $footer_style == 'style2' ) {  ?>
<!-- End #footer_container-->
</div>
<?php } ?>
</div> <!-- End #wrapper -->

<aside id="searchpopup" class="mfp-hide">
	<div class="row">
		<div class="small-12 columns">
			<?php if(class_exists( 'woocommerce' )) { get_product_search_form(); } else { get_search_form(); } ?>
		</div>
	</div>
</aside>
<?php echo ot_get_option('ga'); ?>
<?php 
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer(); 
?>
</body>
</html>