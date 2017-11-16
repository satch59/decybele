<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number()) : ?>
	<div class="qodef-comment-holder clearfix" id="comments">
		<div class="qodef-comment-number">
			<div class="qodef-comment-number-inner">
				<h3><?php comments_number( esc_html__('No Comments','mixtapewp'), esc_html__(' Comment: ','mixtapewp') . '1', esc_html__(' Comments: ','mixtapewp') . '% '); ?></h3>
			</div>
		</div>
		<div class="qodef-comments">
			<?php if ( have_comments() ) : ?>
				<ul class="qodef-comment-list">
					<?php wp_list_comments(array( 'callback' => 'mixtape_qodef_comment')); ?>
				</ul>
			<?php endif; ?>
			<?php if( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' )) : ?>
				<p class="qodef-comment-form-closed-message"><?php esc_html_e('Sorry, the comment form is closed at this time.', 'mixtapewp'); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<?php
		$mixtape_qodef_commenter = wp_get_current_commenter();
		$mixtape_qodef_req = get_option( 'require_name_email' );
		$mixtape_qodef_aria_req = ( $mixtape_qodef_req ? " aria-required='true'" : '' );

		$mixtape_qodef_args = array(
			'id_form' => 'commentform',
			'id_submit' => 'submit_comment',
			'title_reply'=> esc_html__( 'Leave a Reply','mixtapewp' ),
			'title_reply_to' => esc_html__( 'Post a Reply to %s','mixtapewp' ),
			'cancel_reply_link' => esc_html__( 'Cancel Reply','mixtapewp' ),
			'label_submit' => esc_html__( 'Submit','mixtapewp' ),
			'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Comment','mixtapewp' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="qodef-three-columns clearfix"><div class="qodef-three-columns-inner clearfix"><div class="qodef-column"><div class="qodef-column-inner"><input id="author" name="author" placeholder="'. esc_html__( 'Your name','mixtapewp' ) .'" type="text" value="' . esc_attr( $mixtape_qodef_commenter['comment_author'] ) . '"' . $mixtape_qodef_aria_req . ' /></div></div>',
				'url' => '<div class="qodef-column"><div class="qodef-column-inner"><input id="email" name="email" placeholder="'. esc_html__( 'E-mail','mixtapewp' ) .'" type="text" value="' . esc_attr(  $mixtape_qodef_commenter['comment_author_email'] ) . '"' . $mixtape_qodef_aria_req . ' /></div></div>',
				'email' => '<div class="qodef-column"><div class="qodef-column-inner"><input id="url" name="url" type="text" placeholder="'. esc_html__( 'Website','mixtapewp' ) .'" value="' . esc_attr( $mixtape_qodef_commenter['comment_author_url'] ) . '" /></div></div></div></div>'
				 ) ) );

			if(is_user_logged_in()){
				$mixtape_qodef_args['class_form'] = 'qodef-comment-registered-user';
				$mixtape_qodef_args['title_reply_before'] = '<h4 id="reply-title" class="comment-reply-title qodef-comment-reply-title-registered">';
			}
	 ?>
	<?php if(get_comment_pages_count() > 1){ ?>
		<div class="qodef-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
		<?php } ?>
	 <div class="qodef-comment-form">
		<?php comment_form($mixtape_qodef_args); ?>
	</div>
<?php endif; ?>
							


