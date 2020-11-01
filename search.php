<?php get_header(); ?>

<div class="container bg-white pt-1 pb-5"><!-- container -->

<div class="row">
       <div class="col-sm-8 blog-main pt-0">
	<p class="lead mt-2 mb-0"><?php printf ( __( 'Search results for: <strong>%s</strong>', 'czystespalanie' ), get_search_query() ); ?></p>
	<hr class="m-0"/>
	<p class="mb-3 text-secondary"><small><?php printf( _n( '%s result found', '%s results found', $wp_query->found_posts, 'czystespalanie' ), $wp_query->found_posts ); ?></small></p>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="blog-post">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h4 class="text-primary mb-0"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>

	<p><small class="text-success"><?php the_permalink();?></small><br />
	<small><?php


	$excerpt = get_the_excerpt();

	$excerpt = str_ireplace( get_search_query(), '<strong>' . get_search_query() . '</strong>', $excerpt );

	echo $excerpt; ?></small></p>

	<!--

	<?php trackback_rdf(); ?>

	-->
	</article>
  </div><!-- /.blog-post -->


<?php endwhile; else: ?>
<h3><?php _e( 'Sorry, no posts matched your criteria.', 'czystespalanie' ); ?></h3>

<p>Poszukaj jeszcze raz:</p>

<?php get_search_form(); ?>

<?php endif; ?>
<nav class="blog-pagination">
<?php next_posts_link( esc_html__( 'Older', 'the-bootstrap-blog' ) );?>

<?php if ( get_previous_posts_link() ) {
 previous_posts_link( esc_html__( 'Newer', 'the-bootstrap-blog' ));
 } elseif ( get_next_posts_link() ) { ?>
<a class="btn btn-outline-secondary disabled" href="#"><?php esc_html_e( 'Newer', 'the-bootstrap-blog' ); ?></a>
 <?php } ?>
</nav>
        </div><!-- /.blog-main -->

 </div><!-- /.row -->
</div>
<!-- container -->

<?php get_footer(); ?>
