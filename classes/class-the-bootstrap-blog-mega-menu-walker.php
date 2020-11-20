<?php

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


if ( ! class_exists( 'The_Bootstrap_Blog__Mega_Menu' ) ) :

/**
 * @since The Bootstrap Blog 0.1.4
 */

class The_Bootstrap_Blog__Mega_Menu extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu list-unstyled\">";
	}

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n</ul>";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= "\n";


		$class_names = '';

		$_classes = empty( $item->classes ) ? array() : (array) $item->classes;

		if( in_array( 'current-menu-item', $_classes ) ) $classes[] = 'font-weight-bold';
		if ( $depth === 0 ) $classes[] = 'text-warning text-uppercase font-weight-bold h6 d-block border-bottom border-secondary';
		$classes[] = 'text-info';

		$class_names = join( ' ',  $classes );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $output .= '<li><a' . $class_names . $attributes .'>' . $item->title . '</a>';

    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "</li>";
    }

}
endif;
