<?php $gallery = get_post_meta($post->ID, 'gallery-type', TRUE);
			$attachments = get_post_meta($post->ID, 'pp_gallery_slider', TRUE);
			$attachment_array = explode(',', $attachments);
			$rev_slider_alias = get_post_meta($post->ID, 'rev_slider_alias', TRUE);
			?>

<?php if($gallery == 'thumbnails') { ?>
<div class="post-gallery" rel="gallery">
	<div class="row">
		<?php foreach ($attachment_array as $attachment) : ?>
		    
		    <?php
		        $image_link = wp_get_attachment_image_src($attachment,'full');
		        $image = aq_resize( $image_link[0], 187, 187, true, false); 
		        $image_title = esc_attr( get_the_title($post->ID) );
		    ?>
		    
		    <div class="small-6 medium-3 columns">
		    		<div class="post-gallery fresco">
		        	<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" title="<?php echo $image_title; ?>" />
		        	<div class="overlay">
		        		<div class="buttons"><a href="<?php echo $image_link[0]; ?>" class="zoom" title="<?php echo $image_title; ?>"><?php _e( '+', 'uberstore' ); ?></a></div>
		        	</div>
		        </div>
		    </div>
		<?php endforeach; ?>
	</div>
</div>
<?php } else { ?>
	<?php if ($rev_slider_alias) {?>
		<div class="post-gallery">
			<?php putRevSlider($rev_slider_alias); ?>
		</div>
	<?php  } else { ?>
		<div class="post-gallery flex-start flexslider flex" data-bullets="false">
	<ul class="slides">
	<?php foreach ($attachment_array as $attachment) : ?>
	    <?php
	        $image_link = wp_get_attachment_image_src($attachment,'full');
	        $image_title = esc_attr( get_the_title($post->ID) );
	        
	    ?>
	    <?php
	        $image = aq_resize( $image_link[0], 755, 385, true, false);  // Blog
	    ?>
	    
	    <li>
	    		<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $image_title; ?>" />
	    </li>
	<?php endforeach; ?>
	</ul>
</div>
	<?php } ?>
<?php } ?>