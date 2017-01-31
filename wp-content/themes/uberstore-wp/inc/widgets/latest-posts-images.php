<?php
/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class thb_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title;
			
			echo '<ul>';
			while( $r->have_posts() ) : $r->the_post();
				?>
				<li>
					<figure>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(); ?>
						</a>
					</figure>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" class="postlink"><?php the_title(); ?></a>
				</li>
				<?php
			endwhile;
			echo '</ul>';
			echo $after_widget;
		
		wp_reset_postdata();
		
		endif;
	}
}
function thb_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('thb_Posts_Widget');
}
add_action('widgets_init', 'thb_widget_registration');