<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bad_Movie_Night
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

<div id="comments" class="comments-area mt-5">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'badmovienight' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'badmovienight' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'badmovienight' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	comment_form([
        'title_reply' => __('Leave your comment'),
        'comment_notes_before' => '',
        'comment_field' => '<div class="form-group"><label for="comment" class="sr-only">'.__('Comment').'</label><textarea name="comment" id="comment" cols="40" rows="5" class="form-control" aria-invalid="false" placeholder="'.__('Your comment').'"></textarea></div>',
        'fields' => apply_filters('comment_form_default_fields', [
            'author' => '<div class="form-group"><label class="sr-only">'.__('Your name').'</label><br><input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="40" class="form-control" ' . $aria_req . ' placeholder="'.__('Your name').'"></span></div>',
            'email' => '<div class="form-group"><label class="sr-only">'.__('Your email').'</label><br><input type="email" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="40" class="form-control" ' . $aria_req . ' placeholder="'.__('Your email').'"></span></div>',
            'url' => '',
        ]),
        'class_submit' => 'btn btn-primary',
    ]);
	?>

</div><!-- #comments -->
