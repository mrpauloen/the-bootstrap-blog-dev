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
  elseif ( is_search() ) {
    $site_title =  sprintf ( __( 'Search results for: <strong>%s</strong>', 'the-bootstrap-blog' ), get_search_query() );
  }
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

 	echo wp_kses( $site_title, 'strong' );
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

 ?><img width="32" height="32" class="float-right" src="<?php echo esc_url( $url ); ?>" alt="<?php esc_attr_e( 'Sticky', 'the-bootstrap-blog' );?>">
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

 /**
 * Adds `svg` image padlock to the 'Protected' post in post title
 *
 * @since The Bootstrap Blog 0.1
 */

function the_bootstrap_blog__padlock() {

  global $post;

  $height = ( is_archive() ) ? '16' : '24';
  $lock = '<svg width="' . esc_attr ( $height ) . '" height="' . esc_attr ( $height ) . '" viewBox="0 0 16 16" class="align-baseline mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/><path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/></svg>';
  $unlock = '<svg width="' . esc_attr ( $height ) . '" height="' . esc_attr ( $height ) . '" viewBox="0 0 16 16" class="align-baseline mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/><path fill-rule="evenodd" d="M8.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/></svg>';
  if ( post_password_required() ) {
    echo $lock;
  } elseif ( $post->post_password ) {
    echo $unlock;
  }
}
