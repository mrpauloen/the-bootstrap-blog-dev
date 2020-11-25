<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @since The Bootstrap Blog 0.1
 */

get_header(); ?>

<div class="container">

<div class="row">
<div class="col-sm-8 blog-main">
<ul class="list-unstyled">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li class="my-3">
<article>


<h5 class="mt-0 mb-1"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-link-45deg" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M4.715 6.542L3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.001 1.001 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
<path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 0 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 0 0-4.243-4.243L6.586 4.672z"/>
</svg><?php the_bootstrap_blog__padlock(); the_title(); ?></a></h5>

<?php
	wp_link_pages(

		$args = array(
		'before'		=> '<p class="pager">' . esc_html__( 'Pages:', 'the-bootstrap-blog' ),
		'after'			=> '</p>',
		'link_before'	=> '<span class="badge badge-danger">',
		'link_after'	=> '</span>',
		'separator'		=> '&nbsp;&nbsp;',
		'pagelink'		=> '%',

	));

?>

<!--

<?php trackback_rdf(); ?>

-->


</article>
</li>
<?php endwhile; else: ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'the-bootstrap-blog' ); ?></p>

<?php endif; ?>
</ul>

<nav class="blog-pagination">
<?php next_posts_link( esc_html__( 'Older', 'the-bootstrap-blog' ) );?>

<?php previous_posts_link( esc_html__( 'Newer', 'the-bootstrap-blog' ) ); ?>
</nav>

</div><!-- /.blog-main -->

<?php get_sidebar(); ?>

</div><!-- /.row -->

</div><!-- /.container -->

<?php get_footer();
