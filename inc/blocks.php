<?php

function render_custom_media_text_block( $attributes, $content ) {

	if (! empty( $attributes['additionalClassName'] )) {

		// a regex that search for the tag figure with the wp-block-media-text__media class.
		$regex = '/(<figure.*?class="wp-block-media-text__media".*?>)(.*?)(<\/figure>)/';

		// Get the content of the block.
		$figure = preg_match( $regex, $content );

		// Set the image class attribute.
		$additional_image_class =  esc_attr( $attributes['additionalClassName'] );

		// Add the image class to the image element.
		$figure = str_replace( '<img', '<img' . $additional_image_class, $figure );

		// replace the figure using $regex.
		$content = preg_replace( $regex, $figure, $content );
	}

	return $content;
}

function register_custom_media_text_block() {

	$namespace = 'modul-r';
	$block_title = 'custom-media-text';

	// Get the original block type.
	$original_block = WP_Block_Type_Registry::get_instance()->get_registered( 'core/media-text' );

	if ( ! $original_block ) {
		return;
	}

	// Clone the block type.
	$cloned_block = $original_block;

	// Set the new block type's name.
	$cloned_block->name = $namespace.'/'.$block_title;
	$cloned_block->title = __( 'Custom Media Text', 'modul-r' );

	// Adds the custom attributes.
	$cloned_block->attributes['additionalClassName'] = array(
		'type'    => 'string',
		'default' => '',
	);

	$cloned_block->attributes['namespace'] = array(
		'type'    => 'string',
		'default' => $block_title,
	);

	$cloned_block->render_callback = 'render_custom_media_text_block';

	// Register the new block type.
	register_block_type (
		$namespace.'/'.$block_title,
		$cloned_block
	);
}
add_action( 'init', 'register_custom_media_text_block' );

function modul_r_enqueue_custom_media_text_scripts() {
	$asset = include MODULR_THEME_DIR . '/build/modulr-blocks-cmt.asset.php';
	wp_enqueue_script(
		'modulr-custom-media-text-script',
		MODULR_THEME_URL . '/build/modulr-blocks-cmt.js', $asset['dependencies'], $asset['version']
	);
}

add_action( 'enqueue_block_editor_assets', 'modul_r_enqueue_custom_media_text_scripts' );
