<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( ! comments_open() ) {
	return;
}
?>
<?php if ( comments_open() ) : ?><div id="reviews"><?php

	echo '<div id="comments">';
	
	$commenter = wp_get_current_commenter();
	
	
		echo '<aside id="add_review"><a class="close" href="#">'. __("close", 'uberstore' ) .'</a>';

	
		$comment_form = array(
			'title_reply' => false,
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => array(
				'author' => '<div class="row"><div class="small-12 medium-6 columns">' . '<label for="author">' . __( 'Name', 'uberstore' ) . ' <span class="required">*</span></label> ' .
				            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></div>',
				'email'  => '<div class="small-12 medium-6 columns"><label for="email">' . __( 'Email', 'uberstore' ) . ' <span class="required">*</span></label> ' .
				            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></div></div>',
			),
			'label_submit' => __( 'Submit Review', 'uberstore' ),
			'logged_in_as' => '',
			'comment_field' => ''
		);
	
		if ( get_option('woocommerce_enable_review_rating') == 'yes' ) {
	
			$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Rating', 'uberstore' ) .'</label><select name="rating" id="rating">
				<option value="">'.__( 'Rate&hellip;', 'uberstore' ).'</option>
				<option value="5">'.__( 'Perfect', 'uberstore' ).'</option>
				<option value="4">'.__( 'Good', 'uberstore' ).'</option>
				<option value="3">'.__( 'Average', 'uberstore' ).'</option>
				<option value="2">'.__( 'Not that bad', 'uberstore' ).'</option>
				<option value="1">'.__( 'Very Poor', 'uberstore' ).'</option>
			</select></p>';
	
		}
	
		$comment_form['comment_field'] .= '<div class="row"><div class="small-12 columns"><label for="comment">' . __( 'Your Review', 'uberstore' ) . '</label><textarea id="comment" name="comment" cols="45" rows="22" aria-required="true"></textarea></div></div>';
	
		
		comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
	
		echo '</aside>';

		echo '<a href="#" id="add_review_button" class="btn grey small">'.__( 'Add a Review', 'uberstore' ).'</a>';
	

	if ( have_comments() ) :

		echo '<ol class="commentlist">';

		wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) );

		echo '</ol>';

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Previous', 'uberstore' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'uberstore' ) ); ?></div>
			</div>
		<?php endif;

	endif;


?></div></div>
<?php endif; ?>