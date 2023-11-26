<?php
/**
 * Modul-r Blocks Styles
 *
 * @package   ModulR
 * @author    Erik Golinelli <erik@codekraft.it>
 * @copyright 2023 Erik
 * @license   GPL 2.0+
 * @link      https://modul-r.codekraft.it/
 */

/* Registering a block pattern category. */
if ( function_exists( 'register_block_pattern_category' ) ) {

	/**
	 * Register Block Pattern Category.
	 */
	register_block_pattern_category(
		'modul-r',
		array( 'label' => __( 'Modul-R patterns', 'modul-r' ) )
	);

}

/* Registering block styles. */
if ( function_exists( 'register_block_style' ) ) {

	$wave = esc_url( apply_filters( 'modul_r_wave_shape_uri', get_template_directory_uri() . '/img/elements/wave.svg' ) );

	/**
	 * Text / TItles Styles
	 */
	register_block_style(
		'core/post-title',
		array(
			'name'  => 'gradient',
			'label' => __( 'with gradient', 'modul-r' ),
		)
	);
	register_block_style(
		'core/site-title',
		array(
			'name'  => 'outlined-text',
			'label' => __( 'Outline text', 'modul-r' ),
		)
	);
	register_block_style(
		'core/heading',
		array(
			'name'  => 'outlined-text',
			'label' => __( 'Outline text', 'modul-r' ),
		)
	);

	/**
	 * Layout Styles
	 */
	register_block_style(
		'core/media-text',
		array(
			'name'  => 'traversal-clip',
			'label' => __( 'cut the container crosswise', 'modul-r' ),
		)
	);

	register_block_style(
		'core/cover',
		array(
			'name'  => 'traversal-clip',
			'label' => __( 'cut the container crosswise', 'modul-r' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'traversal-clip',
			'label' => __( 'cut the container crosswise', 'modul-r' ),
		)
	);

	register_block_style(
		'core/cover',
		array(
			'name'         => 'wave-clip',
			'label'        => __( 'clip with wave shape', 'modul-r' ),
			'inline_style' => '.wp-block-cover.is-style-wave-clip { mask-image: url(' . $wave . ');-webkit-mask-image: url(' . $wave . '); }',
		)
	);

	register_block_style(
		'core/post-featured-image',
		array(
			'name'         => 'wave-clip',
			'label'        => __( 'clip with wave shape', 'modul-r' ),
			'inline_style' => '.wp-block-post-featured-image.is-style-wave-clip { mask-image: url(' . $wave . '); -webkit-mask-image: url(' . $wave . '); }',
		)
	);

	/**
	 * Covers
	 */
	register_block_style(
		'core/cover',
		array(
			'name'         => 'slate',
			'label'        => __( 'Slate', 'modul-r' )
		)
	);

	/**
	 * UI
	 */
	register_block_style(
		'core/group',
		array(
			'name'  => 'card',
			'label' => __( 'Card', 'modul-r' ),
		)
	);

	/**
	 * Modules
	 */
	register_block_style(
		'core/gallery',
		array(
			'name'  => 'masonry-gallery',
			'label' => __( 'Masonry layout', 'modul-r' ),
		)
	);
	register_block_style(
		'core/gallery',
		array(
			'name'  => 'slider-gallery',
			'label' => __( 'Slider', 'modul-r' ),
		)
	);

	register_block_style(
		'core/query',
		array(
			'name'  => 'slider',
			'label' => __( 'Slider', 'modul-r' ),
		)
	);

	register_block_style(
		'core/gallery',
		array(
			'name'  => 'lightbox-gallery',
			'label' => __( 'Lightbox', 'modul-r' ),
		)
	);

	register_block_style(
		'core/image',
		array(
			'name'  => 'lightbox-image',
			'label' => __( 'Lightbox', 'modul-r' ),
		)
	);

	register_block_style(
		'core/query',
		array(
			'name'  => 'masonry-layout',
			'label' => __( 'Masonry', 'modul-r' ),
		)
	);

	register_block_style(
		'core/template-part',
		array(
			'name'  => 'fixed',
			'label' => __( 'Fixed', 'modul-r' ),
		)
	);

	register_block_style(
		'core/template-part',
		array(
			'name'  => 'sticky',
			'label' => __( 'Sticky', 'modul-r' ),
		)
	);
}
