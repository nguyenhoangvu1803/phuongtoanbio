<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package zo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
        <div class="st-comments-wrap clearfix">
            <h4 class="comments-title">
                <span><?php comments_number(esc_html__('Comments','ori'),esc_html__('1 Comments','ori'),esc_html__('% Comments','ori')); ?></span>
            </h4>
            <ol class="comment-list">
				<?php wp_list_comments( 'type=comment&callback=zo_comment' ); ?>
			</ol>
			<?php
				$post_trackbacks = get_comments(array('type' => 'trackback','post_id' => $post->ID));
				$post_pingbacks = get_comments(array('type' => 'pingback','post_id' => $post->ID));
			?>
			<?php if($post_trackbacks || $post_pingbacks) : ?>
			<h4 class="comments-title"><?php _e('Pingbacks And Trackbacks', 'ori');?></h4>
			<ol>
			  <?php foreach ($comments as $comment) : ?>
			  <?php $comment_type = get_comment_type(); ?>
			  <?php if($comment_type != 'comment') { ?>
			  <li><?php comment_author_link() ?></li>
			  <?php } ?>
			  <?php endforeach; ?>
			</ol>
			<?php endif; ?>
			<?php zo_comment_nav(); ?>
        </div>
	<?php endif; // have_comments() ?>

	<?php
	$commenter = wp_get_current_commenter();
	$is_log_in = is_user_logged_in() ? 'logged_in' : 'not_logged_in';
	$allowed_html = array(
		"span" => array(),
	);
	$req = get_option( 'require_name__mail' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$args = array(
        'id_form'           => 'commentform',
		'class_form'		=> $is_log_in,
        'id_submit'         => 'submit',
        'title_reply'       => wp_kses(__( '<span>Ghi bình luận</span>','ori'), $allowed_html),
        'title_reply_to'    => esc_html__( 'Gởi Bình Luận %s','ori'),
        'cancel_reply_link' => esc_html__( 'Cancel','ori'),
        'label_submit'      => esc_html__( 'Bình luận','ori'),
        'class_submit'  => 'btn btn-primary',
        'comment_notes_before' => '',
        'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' =>
					'<div class="comment_default_fields">'.
                    '<p class="comment-form-author">'.
                    '<i class="fa fa-user"></i>'.
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . esc_attr($aria_req) . ' placeholder="'.esc_html__('Tên của bạn','ori').'"/></p>',

                'email' =>
                    '<p class="comment-form-email">'.
                    '<i class="fa fa-envelope"></i>'.
                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . esc_attr($aria_req) . ' placeholder="'.esc_html__('Email','ori').'"/></p>',

                'url' =>
                    '<p class="comment-form-url">'.
                    '<i class="fa fa-envelope"></i>' .
                    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" placeholder="'.esc_html__('URL','ori').'" size="30" /></p>'.
					'</div>',
            )
        ),
        'comment_field' =>  '<div class="comment-textarea-wrap"><p class="comment-form-comment"><i class="fa fa-comment"></i><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_html__('Bình Luận','ori').'" aria-required="true"></textarea></p></div>',
	);
	comment_form($args);
	?>

</div><!-- #comments -->
