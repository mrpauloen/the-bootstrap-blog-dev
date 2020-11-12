<?php
/**
 * The Bootstrap Blog SVG Icon helper functions
 *
 * @since The Bootstrap Blog 0.1.4
 */


/**
 * Output and Get Theme SVG.
 * Output and get the SVG markup for an icon in the TheBootstrapBlog_SVG_Icons class.
 *
 * @param string $svg_name The name of the icon.
 * @param string $group The group the icon belongs to.
 * @param string $color Color code.
 */
function the_bootstrap_blog__the_theme_svg( $svg_name, $group = 'ui', $size = '' ) {
		echo the_bootstrap_blog__get_theme_svg( $svg_name, $group, $size ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in the_bootstrap_blog__get_theme_svg().
}


/**
 * Get information about the SVG icon.
 *
 * @param string $svg_name The name of the icon.
 * @param string $group The group the icon belongs to.
 * @param string $color Color code.
 */
function the_bootstrap_blog__get_theme_svg( $svg_name, $group = 'ui', $size = '24' ) {

		// Make sure that only our allowed tags and attributes are included.
		$svg = wp_kses(
			TheBootstrapBlog_SVG_Icons::get_svg( $svg_name, $group, $size ),
			array(
				'svg'     => array(
					'class'       => true,
					'xmlns'       => true,
					'width'       => true,
					'height'      => true,
					'viewbox'     => true,
					'aria-hidden' => true,
					'role'        => true,
					'focusable'   => true,
					'fill'       => true,
				),
				'path'    => array(
					'fill'      => true,
					'fill-rule' => true,
					'd'         => true,
					'transform' => true,
				),
				'polygon' => array(
					'fill'      => true,
					'fill-rule' => true,
					'points'    => true,
					'transform' => true,
					'focusable' => true,
				),
			)
		);

		if ( ! $svg ) {
			return false;
		}
		return $svg;
}
