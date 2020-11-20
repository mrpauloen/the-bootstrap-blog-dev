<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'The_Bootstrap_Blog_Comments_Walker' ) ) :

/**
 * Main The Bootstrap Blog Comments Walker Class
 *
 * @since The Bootstrap Blog 1.0.0
 */

class The_Bootstrap_Blog_Comments_Walker extends Walker_Comment {

	/** CONSTRUCTOR
	 * You'll have to use this if you plan to get to the top of the comments list, as
	 * start_lvl() only goes as high as 1 deep nested comments */
	function __construct() {
		if ( have_comments() ):
	?>
	<div id="comments" class="comments-area"><ul id="comment-list" class="list-unstyled mt-3 py-1"><?php endif;
	}

	/** DESTRUCTOR
	 * I just using this since we needed to use the constructor to reach the top
	 * of the comments list, just seems to balance out :) */
	function __destruct() {
	 if ( have_comments() ):	?></ul></div><?php endif;
	}

	/**
	 * Outputs a pingback comment.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment The comment object.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function ping( $comment, $depth, $args ) {
		$tag = ( 'div' == $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo tag_escape( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( '', $comment ); ?>>
			<div class="comment-body">
				<?php esc_html_e( 'Pingback:', 'the-bootstrap-blog' ); ?> <?php comment_author_link( $comment ); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'the-bootstrap-blog' ) ); ?>
			</div>
		<?php
	}

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		$commenter          = wp_get_current_commenter();
		$show_pending_links = ! empty( $commenter['comment_author'] );

		if ( $commenter['comment_author_email'] ) {
			$moderation_note = __( 'Your comment is awaiting moderation.', 'the-bootstrap-blog' );
		} else {
			$moderation_note = __( ' Your comment is awaiting moderation and will be visible soon. Preview shown below.', 'the-bootstrap-blog' );
		}
		?>
		<<?php echo tag_escape( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent mt-3' : 'mt-3', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php
						$comment_author = get_comment_author_link( $comment ); ?>

						<?php
						if ( 0 != $args['avatar_size'] ) {
							echo get_avatar( $comment, $args['avatar_size'], '', '', $_args = array( 'class' => array(
		            'rounded-circle', 'img-thumbnail',  'float-right' ) ) );
						}

						if ( '0' == $comment->comment_approved && ! $show_pending_links ) {
							$comment_author = get_comment_author( $comment );
						}

						printf(
							wp_kses(
								/* translators: %s: Comment author link. */
								__( '%s <span class="screen-reader-text says">says:</span>', 'the-bootstrap-blog' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							'<b class="fn">' . $comment_author . '</b>'
						);
						?>
					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<small><a class="text-muted" href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
							<?php
								/* translators: 1: Comment date, 2: Comment time. */
								$comment_timestamp = sprintf( __( '%1$s at %2$s', 'the-bootstrap-blog' ), get_comment_date( '', $comment ), get_comment_time() );
							?>
							<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo $comment_timestamp; ?>">
								<?php echo esc_html( $comment_timestamp ); ?>
							</time>

						</a>
						<?php edit_comment_link( esc_html__( '(Edit)', 'the-bootstrap-blog') ); ?></small>
					</div><!-- .comment-metadata -->

				</footer><!-- .comment-meta -->

				<div class="comment-content">

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<em class="text-primary comment-awaiting-moderation">
							<?php the_bootstrap_blog__icon_svg( 'exclamation-triangle', '21' ); ?>
&nbsp;<?php echo esc_html( $moderation_note ); ?></em>

					<?php endif; ?>

					<?php comment_text(); ?>
				</div><!-- .comment-content -->

			</article><!-- .comment-body -->

			<?php
			if ( '1' == $comment->comment_approved || $show_pending_links ) {
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<p class="comment-reply">',
							'after'     => '</p>',
							'reply_text'  => sprintf (
								/* translators: %s: arrow-return-right svg icon */
								__( '%s Reply', 'the-bootstrap-blog' ), the_bootstrap_blog__get_icon_svg( 'arrow-return-right', '14') ),
							'login_text'    => esc_html__( 'Log in to Reply', 'the-bootstrap-blog'),
							/* translators: Comment reply text. %s: Comment author name. */
        			'reply_to_text' => esc_html__( 'You reply to: %s', "the-bootstrap-blog" )  . '&emsp;',
						)
					)
				);
			}
			?>

		<?php
	}
}

endif;
