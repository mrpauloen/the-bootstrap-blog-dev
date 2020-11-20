<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @subpackage The Bootstrap Blog
 * @since 0.1
 */

?><footer class="blog-footer">

	<div class="container mb-5">
	<div class="row">
	<?php

		/*
		 * Mega Menu Navigation
		 *
		 */

		$locations = array ( 'footer-menu-1', 'footer-menu-2', 'footer-menu-3', 'footer-menu-4', 'footer-menu-5', 'footer-menu-6' );

	foreach ( $locations as $location ){

		$args = array(
		'container'=> false,
		'menu_id' => '',
		'menu_class' => 'list-unstyled',
		'theme_location' => $location,
		'fallback_cb' => false,
		'walker' => new The_Bootstrap_Blog__Mega_Menu(),

		);
	?><div class="col-6 col-md-3 col-lg-2"><?php wp_nav_menu( $args ); ?></div><?php } ?>

	</div><!-- .row -->
</div>


	<p class="copyright"><?php echo the_bootstrap_blog__custom_footer_text(); ?></p>
	<p><a href="<?php echo esc_url( '#' );?>"><?php esc_html_e( '&uarr; Back to top', 'the-bootstrap-blog' );?></a></p>
    </footer>

<?php wp_footer(); ?>

  </body>
</html>
