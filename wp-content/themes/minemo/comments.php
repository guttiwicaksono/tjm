<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Minemo
 * @since Minemo 1.0
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

	<?php if ( have_comments() ) : ?>
		
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				printf( esc_attr_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'minemo' ), get_the_title() );
			} else {
				printf(
					_nx(
						'%1$s %2$s',
						'%1$s %2$s',
						$comments_number,
						'comments title',
						'minemo'
					),
					number_format_i18n( $comments_number ),
					esc_attr__('Comments', 'minemo')
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 100,
					'callback'    => 'preyantechnosys_comment_row_template',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php minemo_comment_nav(); ?>

	<?php endif;  ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', 'minemo' ); ?></p>
	<?php endif; ?>
	
	<?php
	
	// To use the variables present in the above code in a custom callback function, you must first set these variables within your callback using:
	$commenter = wp_get_current_commenter();
	
	$req = get_option( 'require_name_email' );
	
	
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	if( !isset($required_text) ){ $required_text = ''; }
		
	// Comment form args
	$args = array();
	$args['fields'] = array(

	  'author' =>
		'<p class="comment-form-author"><label class="prt-hide" for="author">' . esc_attr__( 'Name', 'minemo' ) . '</label> ' .
		( $req ? '<span class="required prt-hide">*</span>' : '' ) .
		'<input id="author" placeholder="' . esc_attr__('Your Name*','minemo') . ( $req ? ' (required)' : '' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></p>',

	  'email' =>
		'<p class="comment-form-email"><label class="prt-hide" for="email">' . esc_attr__( 'Email', 'minemo' ) . '</label> ' .
		( $req ? '<span class="required prt-hide">*</span>' : '' ) .
		'<input id="email" placeholder="' . esc_attr__('Your Email*','minemo') . ( $req ? ' (required)' : '' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' /></p>',

	  
	);
	$args['comment_field'] = '<p class="comment-form-comment"><label class="prt-hide" for="comment">' . esc_attr_x( 'Comment', 'noun', 'minemo' ) .
    '</label><textarea id="comment" placeholder="' . esc_attr_x('Your Comment*', 'noun', 'minemo') . '" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>';
	
	$args['comment_notes_before'] = '<p class="comment-notes">' .
    esc_attr__( 'Your email address will not be published. Required fields are marked *' , 'minemo' ) . ' ' . ( $req ? $required_text : '' ) .
    '</p>';
	
	$args['comment_notes_after'] = '<p class="form-allowed-tags prt-hide">' .
    sprintf(
		esc_attr__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'minemo' ),
		' <code>' . allowed_tags() . '</code>'
    ) . '</p>';
	
	// Submit button class
	$args['class_submit'] = 'submit prt-vc_general prt-vc_btn3 prt-vc_btn3-size-md prt-vc_btn3-shape-square prt-vc_btn3-style-flat prt-vc_btn3-color-skincolor';
	
	
	
	
	comment_form($args); ?>

</div><!-- .comments-area -->
