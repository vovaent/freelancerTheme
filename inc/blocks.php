<?php
/**
 * freelancerTheme Register Blocks
 *
 * @see https://www.billerickson.net/building-gutenberg-block-acf/#register-block
 *
 * @package freelancerTheme
 */

function freelancerTheme_register_blocks() {
	add_filter( 'block_categories_all', 'freelancerTheme_block_categories_all_filter', 10, 2 );

	/**
	 * Function for `block_categories_all` filter-hook.
	 *
	 * @param array[]                 $block_categories     Array of categories for block types.
	 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
	 *
	 * @return array[]
	 */
	function freelancerTheme_block_categories_all_filter( $block_categories, $block_editor_context ) {
		$block_categories[] = array(
			'slug'  => 'front-page',
			'title' => 'Front Page',
			// 'icon'  => 'admin-users',
		);

		return $block_categories;
	}

	if ( ! function_exists( 'acf_register_block' ) ) {
		return;
	}

	acf_register_block(
		array(
			'name'            => 'masthead',
			'title'           => __( 'Masthead', 'freelancerTheme' ),
			'render_template' => 'template-parts/blocks/masthead/masthead.php',
			'enqueue_style'   => get_template_directory_uri() . '/template-parts/blocks/masthead/masthead.css',
			'category'        => 'front-page',
			'icon'            => 'admin-users',
			'mode'            => 'preview',
			'keywords'        => array( 'first screen', 'front page' ),
			'example'         => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'gutenberg_preview_image' => get_template_directory_uri() . '/template-parts/blocks/masthead/masthead.png',
					),
				),
			),
		)
	);

	acf_register_block(
		array(
			'name'            => 'portfolio',
			'title'           => __( 'Portfolio', 'freelancerTheme' ),
			'render_template' => 'template-parts/blocks/portfolio/portfolio.php',
			'enqueue_style'   => get_template_directory_uri() . '/template-parts/blocks/portfolio/portfolio.css',
			'category'        => 'front-page',
			'icon'            => 'admin-users',
			'mode'            => 'preview',
			'keywords'        => array( 'front page' ),
		)
	);

	acf_register_block(
		array(
			'name'            => 'about',
			'title'           => __( 'About', 'freelancerTheme' ),
			'render_template' => 'template-parts/blocks/about/about.php',
			'enqueue_style'   => get_template_directory_uri() . '/template-parts/blocks/about/about.css',
			'category'        => 'front-page',
			'icon'            => 'admin-users',
			'mode'            => 'preview',
			'keywords'        => array( 'front page' ),
		)
	);

	acf_register_block(
		array(
			'name'            => 'contact-me',
			'title'           => __( 'Contact me', 'freelancerTheme' ),
			'render_template' => 'template-parts/blocks/contact-me/contact-me.php',
			'enqueue_style'   => get_template_directory_uri() . '/template-parts/blocks/contact-me/contact-me.css',
			'category'        => 'front-page',
			'icon'            => 'admin-users',
			'mode'            => 'preview',
			'keywords'        => array( 'front page' ),
		)
	);
}
add_action( 'acf/init', 'freelancerTheme_register_blocks' );
