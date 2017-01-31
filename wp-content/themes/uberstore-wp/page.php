<?php get_header(); ?>
<?php 
 		$id = $wp_query->get_queried_object_id();
 		$display_breadcrumbs = get_post_meta($id, 'display_breadcrumbs', true); 
 		$sidebar = get_post_meta($id, 'sidebar_set', true);
 		$sidebar_pos = get_post_meta($id, 'sidebar_position', true);
?>
<?php if($post->post_content != "") { ?>
<div class="<?php if($sidebar) { echo 'row'; } ?><?php if($sidebar && $display_breadcrumbs == 'off') { echo ' pagepadding';} ?>">
	<div class="<?php if($sidebar) { echo 'content-padding small-12 medium-9 columns'; } ?> <?php if ($sidebar && ($sidebar_pos == 'left'))  { echo 'medium-push-3'; } ?>">
	  <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		  <div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
		    <div class="post-content">
		    	<?php the_content('Read More'); ?>
		    </div>
		  </div>
	  <?php endwhile; else : endif; ?>
	</div>
	<?php if($sidebar) { get_sidebar('page'); } ?>
</div>
<?php } ?>
<?php get_footer(); ?>