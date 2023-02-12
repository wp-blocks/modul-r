<?php
/**
 * Modul-r patterns
 *
 * @package   ModulR
 * @author    Erik Golinelli <erik@codekraft.it>
 * @copyright 2023 Erik
 * @license   GPL 2.0+
 * @link      https://modul-r.codekraft.it/
 */

namespace Modulr\Inc\Patterns;

/* Registering a block pattern category. */
if ( function_exists( 'register_block_pattern_category' ) ) {

	/**
	 * Register Block Pattern Category.
	 */
	register_block_pattern_category(
		'modul-r',
		array( 'label' => __( 'theme-patterns', 'modul-r' ) )
	);

}

/* Registering block styles. */
if ( function_exists( 'register_block_style' ) ) {

    $wave = apply_filters("modul_r_wave_shape_uri", get_template_directory_uri() . '/img/demo/wave.svg');

    register_block_style('core/cover', [
        'name' => 'full-height',
        'label' => __('Full screen height', 'modul-r'),
        'inline_style' => '.wp-block-cover.is-style-full-height { height: 100vh; }',
    ]);

    register_block_style('core/media-text', [
        'name' => 'centered-image',
        'label' => __('Large and centered image', 'modul-r'),
    ]);

    register_block_style('core/media-text', [
        'name' => 'small-image',
        'label' => __('Small image (half of the width)', 'modul-r')
    ]);

    register_block_style('core/media-text', [
        'name' => 'full-height',
        'label' => __('Full screen height', 'modul-r')
    ]);

    register_block_style('core/media-text', [
        'name' => 'traversal-clip',
        'label' => __('cut the container crosswise', 'modul-r')
    ]);

    register_block_style('core/cover', [
        'name' => 'traversal-clip',
        'label' => __('cut the container crosswise', 'modul-r')
    ]);

	register_block_style('core/columns', [
		'name' => 'columns-overlap',
		'label' => __('Shifts columns 100 px upwards in large monitors ', 'modul-r'),
		'inline_style' => '.wp-block-columns.is-style-columns-overlap {
			margin-top: -100px;
			margin-bottom: 30px;
		    z-index: 2;
		    position: relative;
		}'
	]);

    register_block_style('core/cover', [
        'name' => 'wave-clip',
        'label' => __('clip with wave shape', 'modul-r'),
        'inline_style' => '.wp-block-cover.is-style-wave-clip { mask-image: url('.$wave.');-webkit-mask-image: url('.$wave.'); }'
    ]);

    register_block_style('core/post-featured-image', [
        'name' => 'wave-clip',
        'label' => __('clip with wave shape', 'modul-r'),
        'inline_style' => '.wp-block-post-featured-image.is-style-wave-clip { mask-image: url('.$wave.'); -webkit-mask-image: url('.$wave.'); }'
    ]);

    register_block_style('core/gallery', [
        'name' => 'masonry-gallery',
        'label' => __('Masonry layout', 'modul-r')
    ]);
}
