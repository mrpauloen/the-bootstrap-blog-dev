<?php
/**
 * The template for displaying sidebars
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#displaying-sidebars-in-your-theme
 *
 * @subpackage The Bootstrap Blog
 * @since 0.1
 */
?><div class="col-sm-3 offset-sm-1 blog-sidebar mb-3">

<?php if ( is_active_sidebar('sidebar') ) : dynamic_sidebar('sidebar'); endif;?>

<?php
wp_nav_menu(
  array(
    'theme_location'  => 'social',
    'container'       => '',
    'container_class' => '',
    'items_wrap'      => '%3$s',
    'menu_id'         => '',
    'menu_class'      => '',
    'depth'           => 1,
    'link_before'     => '<span class="screen-reader-text">',
    'link_after'      => '</span>',
    'fallback_cb'     => '',
  )
);
?>

</div><!-- /.blog-sidebar -->
