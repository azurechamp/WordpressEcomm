<?php
/*-----------------------------------------------------------------------------------*/
/*  Begin processing our comments
/*-----------------------------------------------------------------------------------*/
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php if ( have_comments() ) : ?>
      <div class="largetitle"><?php comments_number(__('Comments (0)', 'uberstore'), __('Comments (1)', 'uberstore'), __('Comments (%)', 'uberstore') ); ?></div>
			<ol class="commentlist">
				<?php wp_list_comments(
					array(
						'type'		  => 'comment',
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 60
					)
				); ?>
			</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<div class="navigation">
					<div class="nav-previous"><?php previous_comments_link(); ?></div>
					<div class="nav-next"><?php next_comments_link(); ?></div>
				</div><!-- .navigation -->
	<?php endif; ?>
<?php else : 
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e("Comments are closed", 'uberstore'); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>


<?php
	// Comment Form
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? ' aria-required="true" data-required="true"' : '' );
	
	$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
	
		'author' => '<div class="row"><div class="small-12 medium-6 columns"><label>' . __( 'Name <span>*</span>', 'uberstore' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		
		'email'  => '<div class="small-12 medium-6 columns"><label>' . __( 'Email <span>*</span>', 'uberstore' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		
		'url'    => '<div class="small-12 columns"><label>' . __( 'Website', 'uberstore' ) . '</label><input name="url" size="30" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" type="text" /></div></div>' ) ),
		
		'comment_field' => '<div class="row"><div class="small-12 columns"><label>' . __( 'Your Comment', 'uberstore' ) . '</label><textarea name="comment" id="comment"' . $aria_req . ' rows="10" cols="58"></textarea></div></div>',
		
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'uberstore' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'uberstore' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published. Required fields are marked *' ) . '</p>',
		'comment_notes_after' => '',
		'id_form' => 'form-comment',
		'id_submit' => 'submit',
		'title_reply' => __( 'Leave a Reply', 'uberstore' ),
		'title_reply_to' => __( 'Leave a Reply to %s', 'uberstore' ),
		'cancel_reply_link' => __( 'Cancel reply', 'uberstore' ),
		'label_submit' => __( 'Submit Comment', 'uberstore' ),
	); 
comment_form($defaults); 

?>