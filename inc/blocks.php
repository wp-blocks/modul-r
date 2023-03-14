<?php

/**
 * It adds a class to the image element of the media/text block
 *
 * @param array  $attributes The attributes of the block.
 * @param string $content The content of the block.
 *
 * @return string The content of the block.
 */
function render_custom_media_text_block( $attributes, $content ) {

	if (! empty( $attributes['additionalClassName'] )) {

		// a regex that search for the tag figure with the wp-block-media-text__media class.
		$regex = '/(.*<figure.*?class="wp-block-media-text__media".*?>)(.*?)(<\/figure>.*)/';

		// Get the content of the block.
		preg_match( $regex, $content, $figure, PREG_OFFSET_CAPTURE, 0);

		// Set the image class attribute.
		$repeated = esc_attr( $attributes['additionalClassName'] );
		$additional_image_class = "animate__animated animate__" . esc_attr( $attributes['additionalClassName'] ) . ($repeated ? " animate__repeat" : "");


		// Add the custom classes and return the content of the block.
		$image = str_replace( "class=\"", "class=\"" . $additional_image_class . " ", $figure[2][0] );
		$content = preg_replace($regex, "$1$image$3", $content);
	}

	return $content;
}

/**
 * We're cloning the core/media-text block, renaming it, and adding a new attribute that will hold the additional css classes
 *
 * @return void The block type object.
 */
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
	$cloned_block->render_callback = 'render_custom_media_text_block';

	// Adds the custom attributes.
	$cloned_block->attributes['additionalClassName'] = array(
		'type'    => 'string',
		'default' => '',
	);
	$cloned_block->attributes['repeatAnimation'] = array(
		'type'    => 'boolean',
		'default' => true,
	);
	$cloned_block->attributes['namespace'] = array(
		'type'    => 'string',
		'default' => $block_title,
	);

	// Register the new block type.
	register_block_type (
		$namespace.'/'.$block_title,
		$cloned_block
	);
}
add_action( 'init', 'register_custom_media_text_block' );

/**
 * It enqueues the JavaScript file that contains the custom block code
 */
function modul_r_enqueue_custom_media_text_scripts() {

	// Get the block dependencies and version.
	$asset = include MODULR_THEME_DIR . '/build/modulr-blocks-cmt.asset.php';

	// Register the new block type.
	wp_enqueue_script(
		'modulr-custom-media-text-script',
		MODULR_THEME_URL . '/build/modulr-blocks-cmt.js', $asset['dependencies'], $asset['version']
	);
}
add_action( 'enqueue_block_editor_assets', 'modul_r_enqueue_custom_media_text_scripts' );
