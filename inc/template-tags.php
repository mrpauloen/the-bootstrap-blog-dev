<?php
/**
 * Custom template tags for this theme
 *
 * @since The Bootstrap Blog 0.1.4
 */


 /**
  * Custom Site Title
  *
  * This function changes the way you see (in header section)
  * your site tile (or blog name), depends on different pages
  * See line: 36 in header.php file
  *
  * @since The Bootstrap Blog
  */

 function the_bootstrap_blog__site_title(){

 	// if there is attachment page display: Attachment
 	if ( is_attachment() ) {

 		$site_title =  __( 'Attachment', 'the-bootstrap-blog');
 	}

 	elseif ( is_404() ) {
 		$site_title =  __( '404', 'the-bootstrap-blog');
 	}
 		// if there is author page display: Author + author name
 		elseif ( is_author()   ) {

 			$site_title =  __( 'Author', 'the-bootstrap-blog');
 		}
 			// if there is archive display: Archive
 			elseif ( is_archive()  ) {

 				$site_title =  __( 'Archive', 'the-bootstrap-blog');
 			}
 				// in other any cases display hyperlinked blog name
 					else {

 						$site_title =  get_bloginfo( 'name' );
 					}
 	echo esc_html( $site_title );
 }

 /**
  * Sticky Post handle
  *
  * Adds `svg` pin to the sticky post title
  *
  * @since The Bootstrap Blog 0.1
  */

 function the_bootstrap_blog__sticky_pin(){

 	if ( is_sticky() and ! is_paged()) :

 	$url =  get_template_directory_uri() . '/images/pin.svg';

 ?><img width="32" height="32" class="float-right mt-2" src="<?php echo esc_url( $url ); ?>" alt="<?php esc_attr_e( 'Sticky', 'the-bootstrap-blog' );?>">
 <?php endif;
 }

 /**
  * Author meta
  *
  * Display either author’s link or author’s name.
  * @link https://developer.wordpress.org/reference/functions/the_author_link/
  *
  * @since The Bootstrap Blog 0.1.3
  */
 function the_bootstrap_blog__author_meta(){

 	printf (
 		/* translators: %s: Either author’s link or author’s name. */
 		esc_html__('by %s', 'the-bootstrap-blog'), get_the_author_link() );
 }

 /**
  * Default footer text
  *
  */

 function the_bootstrap_blog__default_footer_text(){
 	$default_footer_text = sprintf(
 		/* translators: %1$s current year, %2$s: site title */
 		esc_html__( 'Copyright &copy; %1$s by %2$s', 'the-bootstrap-blog' ), date('Y'), get_bloginfo( 'name' ) );
 	return $default_footer_text;
 }

 /**
  * Cutom Footer Text
  *
  * @return void|string 		$custom_footer_text | defult footer text
  *
  * @since The Bootstrap Blog 0.1.4
  */

 function the_bootstrap_blog__custom_footer_text(){

 	if ( get_theme_mod( 'display_footer_text', 1 ) ) {
 		/* Some predefined tags */
 		$tags_search = array( '%sitetitle%', '%sitedescription%', '%year%' );
 		$tags_replace = array( get_bloginfo( 'name' ), get_bloginfo( 'description' ), date('Y') );

 		$custom_footer_text = get_theme_mod( 'custom_footer_text' );

 		if ( empty( $custom_footer_text ))
 		return the_bootstrap_blog__default_footer_text();

 		/* Replace tags */
 		return str_replace( $tags_search, $tags_replace, $custom_footer_text );
 	}
 }
