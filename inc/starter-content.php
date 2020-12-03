<?php
/**
 * The Bootstrap Blog Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `the_bootstrap_blog_starter_content` filter before returning.
 *
 * @return array A filtered array of args for the starter_content.
 *
 * @since The Bootstrap Blog 0.1.4
 */
function the_bootstrap_blog__get_starter_content() {

	$starter_content = array(
		'widgets' => array(
			'sidebar' => array(
				'search'             => array(
					'title' => _x( '', 'Theme starter content' ),
					),
				'text_about',
					'example_map' => array(
					'map',
				),
			),

		),

		'posts' => array(
			'home' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Home', 'Theme starter content' ),
				'post_content' => _x( 'Welcome to your site! This is your homepage, which is what most visitors will see when they come to your site for the first time.', 'Theme starter content' ),
			),
			'about' => array(
				'post_type' => 'page',
				'post_title' => _x( 'About', 'Theme starter content' ),
				'post_content' => _x( 'You might be an artist who would like to introduce yourself and your work here or maybe you&rsquo;re a business with a mission to describe.', 'Theme starter content' ),
			),
			'contact' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Contact', 'Theme starter content' ),
				'post_content' => _x( 'This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.', 'Theme starter content' ),
			),
			'blog' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Blog', 'Theme starter content' ),
				'post_content' => _x( 'This is an example of a homepage section. Homepage sections can be any page other than the homepage itself, including the page that shows your latest blog posts.', 'Theme starter content' ),
			),
			'news' => array(
				'post_type' => 'page',
				'post_title' => _x( 'News', 'Theme starter content' ),
			),
			'page1' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Support', 'Theme starter content' ),
				'post_content' => _x( 'Support content', 'Theme starter content' ),
			),
			'page2' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Developers', 'Theme starter content' ),
				'post_content' => _x( 'Developers content.', 'Theme starter content' ),
			),
			'page3' => array(
				'post_type' => 'page',
				'post_title' => _x( 'Templates', 'Theme starter content' ),
				'post_content' => _x( 'Templates content.', 'Theme starter content' ),
			),

			'homepage-section' => array(
				'post_type' => 'page',
				'post_title' => _x( 'A homepage section', 'Theme starter content' ),
				'post_content' => _x( 'This is an example of a homepage section. Homepage sections can be any page other than the homepage itself, including the page that shows your latest blog posts.', 'Theme starter content' ),
			),
		),

		'nav_menus' => array(
			'top' => array(
				'name' => __( 'Header Menu', 'ourtheme' ),
				'items' => array(
					'link_home',
					'page_about',
					'page_contact',
				),
			),
			'social-after-widgets' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
					'items' => array(
						'link_facebook',
						'link_twitter',
						'link_instagram',
						'link_github' => array(
							'url' => 'https://github.com',
							),
						'link_youtube' => array(
							'url' => 'https://youtube.com',
							),
						'link_other' => array(
							'title' => 'Other',
							'url' => '#',
							'description' => 'Short description',
							),
						),
					),
			'footer-menu-1' => array(
				'name' => __( 'Footer Mega Menu 1', 'the-bootstrap-blog' ),
				'items' => array(
					'page_about'	=> array(
						'title' => _x( 'About', 'Theme starter content', 'the-bootstrap-blog' ),
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{about}}',
									),
					'page_blog'	=> array(
						'title' => _x( 'Blog', 'Theme starter content', 'the-bootstrap-blog' ),
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{blog}}',
					),
				),
			),
			'footer-menu-2' => array(
				'name' => __( 'Footer Mega Menu 2', 'ourtheme' ),
				'items' => array(
					'page_news',
					'page_contact',
				),
			),
			'footer-menu-3' => array(
				'name' => __( 'Footer Mega Menu 3', 'ourtheme' ),
				'items' => array(
					'page_page1' => array(
						'title' => 'Support',
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{page1}}',
					),
					'page_page2' => array(
						'title' => 'Developers',
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{page2}}',
					),
				),
			),
			'footer-menu-4' => array(
				'name' => __( 'Footer Mega Menu 4', 'ourtheme' ),
				'items' => array(
					'link_page1' => array(
						'title' => 'Plugins',
						'url' => '#',
								),
					'link_page2' => array(
						'title' => 'Themes',
							'url' => '#',
					),
					'link_page3' => array(
						'title' => 'Templates',
							'url' => '#',
					),
				),
			),
			'footer-menu-5' => array(
				'name' => __( 'Footer Mega Menu 5', 'ourtheme' ),
				'items' => array(
					'link_page1' => array(
						'title' => 'BuddyPress',
						'url' => '#',
					),
					'link_page2' => array(
						'title' => 'bbPress',
						'url' => '#',
					),
				),
			),
			'footer-menu-6' => array(
				'name' => __( 'Footer Mega Menu 6', 'ourtheme' ),
				'items' => array(
					'link_twitter' => array(
						'title'=> '@WordPress',
					),
					'link_github' => array(
						'title'=> 'WordPress',
					),
				),
			),
		),
	);

	/**
	 * Filters The Bootstrap Blog array of starter content.
	 *
	 * @since The Bootstrap Blog 0.1.4
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'the_bootstrap_blog_starter_content', $starter_content );

}
