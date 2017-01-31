<?php 
 		$id = $wp_query->get_queried_object_id();
 		$sidebar_pos = get_post_meta($id, 'sidebar_position', true);
?>
<div class="row">
<section class="small-12 columns grid-style">
	<?php $i = 0; $counter = range(0, 200, 3); ?>
		
	   <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
	  
	  	<?php if ($i % 3 == 0) { echo '<div class="row" data-equal=">.post">'; } ?>
	  	
		  <article <?php post_class('small-12 medium-4 columns post'); ?> id="post-<?php the_ID(); ?>">
		    <?php get_template_part( 'inc/postformats/grid-style' ); ?>
		    <div class="post-title">
		    	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		    </div>
		    <div class="post-content">
		    	<p><?php echo thb_ShortenText(get_the_content(), 200); ?></p>
		    </div>
		  	<?php get_template_part( 'inc/postformats/post-meta' ); ?>
		  </article>
		  
		  <?php if (in_array($i + 1, $counter)){ echo '</div>'; }   ?>
		  
	  <?php $i++; endwhile; ?>
	  	<div class="small-12 columns">
	      <?php the_posts_pagination(array(
	      	'prev_text' 	=> '<span>'.__( "PREV", 'uberstore' ).'</span>',
	      	'next_text' 	=> '<span>'.__( "NEXT", 'uberstore' ).'</span>',
	      )); ?>
	    </div>
	  <?php else : ?>
	    <p><?php _e( 'Please add posts from your WordPress admin page.', 'uberstore' ); ?></p>
	  <?php endif; ?>
</section>
</div>