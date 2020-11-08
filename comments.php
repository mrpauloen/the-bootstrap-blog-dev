<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @subpackage The Bootstrap Blog
 * @since The Bootstrap Blog 0.1
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;

  $have_comments= have_comments();
  $comments_open = comments_open();

  $comments_number = get_comments_number();
	$commenter		= wp_get_current_commenter();
	$req			= get_option( 'require_name_email' );
	$aria_req		= ( $req ? ' aria-required="true"' : '' );
	$user			= wp_get_current_user();

  $collapse = ( isset( $_GET['replytocom'] ) ) ? '' : 'collapse';
	$fields =  array(

	'cookies' => '<div id="form-input"  class="' . esc_attr( $collapse ) . '">
  <div class="form-group">
    <div class="form-check pl-0">
      <label title="' . esc_attr( 'Your data will be stored in this browser and added automaticly so next time you don\'t need to put it again.', 'the-bootstrap-blog' ) . '" for="wp-comment-cookies-consent">
      <input class="" type="checkbox" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes">
<small>Remember me</small> ' . ( ( ! wp_is_mobile() ) ? '<svg width="0.8em" height="0.8em" viewBox="0 0 16 16" class="" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
  <circle cx="8" cy="4.5" r="1"/>
</svg>' : '***' ) . '
      </label>
    </div>
  </div>',

	'author' => '
<div class="form-row align-items-center">
<div class="col-sm-6 col-md-3">
<label class="control-label" for="author"><small>' . ( $req ? ' <span class="required badge badge-danger">*</span> ' : '' ) . esc_html__( 'Name:', 'the-bootstrap-blog') . '</small></label>
<input type="text" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" id="author" class="form-control mb-2 mb-sm-0 form-control-sm round" id="author" ' . $aria_req . ' '. ( $req ? 'required' : '' ) .'>
</div>',

	'email' => '
<div class="col-sm-6 col-md-3">
<label for="email" class="control-label"><small>' . ( $req ? '<span class="required badge badge-danger">*</span> ' : '' ) . esc_html__( '@ Email:', 'the-bootstrap-blog') .  '</small></label>
<input type="email" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="22" ' . $aria_req . ' class="form-control mb-2 mb-sm-0 form-control-sm round" '. ( $req ? 'required' : '' ) .'>
</div>',

	'url' => '
<div class="col-sm-6 col-md-3">
<label for="url" class="control-label"><small>' . esc_html__( 'Website:', 'the-bootstrap-blog' ) . '</small></label>
<input type="text" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="22" class="form-control mb-2 mb-sm-0 form-control-sm round">
</div>',
);
$comments_args = array(
'id_form'				=> 'commentform',
'class_form'			=> 'comment-form form-horizontal mt-2',
'title_reply'      		=> '',
	/* translators: %s: The translatable 'reply-to' button label. Default 'Leave a Reply to %s', where %s is the author of the comment being replied to. */
'title_reply_to'    	=> esc_html__( 'You reply to: %s', 'the-bootstrap-blog' )  . '&emsp;',
'title_reply_before'	=> '<h6 id="reply-title" class="comment-reply-title">',
'title_reply_after'		=> '</h6>',
'cancel_reply_before'	=> ' ',
'cancel_reply_after'	=> '',
'cancel_reply_link'		=> esc_html__( 'Cancel&nbsp;reply', 'the-bootstrap-blog' ),
'id_submit'				=> 'submit',
'class_submit'			=> 'form-control mb-2 mb-sm-0 form-control-sm round btn btn-outline-primary btn-sm',
'label_submit'			=> esc_html__( 'Add reply', 'the-bootstrap-blog' ),
'submit_button'			=> '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" >',
'submit_field'			=> ( $user->exists() ) ? '%1$s %2$s' : '<div class="col-sm-6 col-md-3">
<label class="control-label" for="submit"><small>&nbsp;</small></label>%1$s %2$s</div></div></div>',
'format'				=> 'xhtml',
'must_log_in'			=> '<p class="must-log-in">' .

	sprintf(
		/* translators: %s: wp_login_url */
		__( 'You must be <a href="%s">logged in</a> to post a comment.', 'the-bootstrap-blog' ),
		wp_login_url(
			apply_filters( 'the_permalink', get_permalink() )
		)
	) . '</p>',

'logged_in_as' 			=> '<p class="logged-in-as">' .
	sprintf(
	/* translators: %1$s: admin profile url; %2$s: @user_identity; %3$s: @wp_logout_url */
		__( 'You\'re logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'the-bootstrap-blog'),
			admin_url( 'profile.php' ), $user_identity, wp_logout_url(
				apply_filters( 'the_permalink', get_permalink( ) )
			)
	) . '</p>',

	'comment_notes_before' 	=> '',
	'comment_notes_after' 	=> '',
	'fields'				=> apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field'			=> '<div class="form-group">
<textarea id="commenttext" name="comment" rows="1" class="form-control rounded comment-textarea" ' . $aria_req . ' '. ( $req ? 'required' : '' ) .' placeholder="' . esc_attr__( '** Write a comment', 'the-boottrap-blog' ) . '"></textarea>
</div>',

); ?>

<?php   if ( $have_comments || $comments_open ){

?><h2 class="mt-5"><?php printf(
    /* translators: %s: Number of comments. `Comments` word stay always in plural eg: Comments |1|
    */
    esc_html__( 'Comments |%s|', 'the-bootstrap-blog' ),
     number_format_i18n( $comments_number ) );

?></h2><?php
    }

comment_form( $comments_args );

if ( $have_comments ) {

	wp_list_comments( array(
    'avatar_size' => get_theme_mod( 'avatar_size', 45 ),
    'type'  => 'all',
    'reply_text'  => __( '&rarr; Reply', 'the-bootstrap-blog' ),
    'walker' 		=> new The_Bootstrap_Blog_Comments_Walker(),
	) );

// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
?>
<nav class="navigation comment-navigation d-flex justify-content-between mb-4" role="navigation">
<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'the-bootstrap-blog' ) ); ?></div>
<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'the-bootstrap-blog' ) ); ?></div>
</nav><!-- .comment-navigation -->
	<?php } // Check for comment navigation
}
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( $have_comments && ! $comments_open ){
	?>
<p class="mt-4 p-3 bg-dark text-white" role="alert"><?php esc_html_e( 'This conversation is over.', 'the-bootstrap-blog' ); ?></p>

<?php } elseif ( ! $comments_open && ! is_page() ) { ?>

<div class="mt-4 p-3 bg-dark text-white" role="alert"><?php esc_html_e( 'Discussion disabled.', 'the-bootstrap-blog' ); ?></div>

<?php
}

	if ( $comments_open ){ ?>

<fieldset class="mt-2 p-2 border" >
<legend class="h6 px-2" style="width: fit-content;"><?php esc_html_e( 'Legend', 'the-bootstrap-blog' );?></legend>
<small><?php echo esc_html_x( '*) Required fields are marked', 'comments legend', 'the-bootstrap-blog' ); ?><br/>
<?php printf(
	/* translators: %s: Display all of the allowed tags in HTML format (within code tag) with attributes.*/
esc_html_x( '**) You may use these HTML tags and attributes: %s', 'comments legend', 'the-bootstrap-blog'), '<code>' . allowed_tags() . '</code>' );
?><br/>
<?php if ( wp_is_mobile() ) esc_html_e( '***) Your data will be stored in this browser and added automaticly so next time you don\'t need to put it again.', 'the-bootstrap-blog' ); ?>
</small>
</fieldset>

<?php } ?>
