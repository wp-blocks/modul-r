<?php
if ( function_exists( 'register_block_pattern_category' ) ) {

    function modul_r_register_pattern() {

        /**
         * Register Block Pattern Category.
         */
        register_block_pattern_category( 'modul-r',
            array( 'label' => __( 'Modul-r', 'modul-r' ) )
        );

        /**
         * Register Block Patterns.
         */
        register_block_pattern( 'modul-r/Cards-with-icons', array(
            'title'       => __( 'Cards with icons (overlap the element to the top)', 'modul-r' ),
            'categories'    => array( 'modul-r' ),
            'description' => _x( 'Useful for Homepage Cards with icons will overlap the element to the top (for example the hero)', 'Block pattern description', 'modul-r' ),
            'content'     => '<!-- wp:columns {"align":"wide","className":"block-overlap-top card-columns interactive animated"} --> <div class="wp-block-columns alignwide block-overlap-top card-columns interactive animated"><!-- wp:column --> <div class="wp-block-column"><!-- wp:image {"align":"center","id":1234,"width":85,"height":93,"sizeSlug":"full","linkDestination":"custom"} --> <div class="wp-block-image"><figure class="aligncenter size-full is-resized"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/wapuu-original.png" class="wp-image-1234" width="85" height="93"/></figure></div> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong>Title</strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:image {"align":"center","id":1234,"width":85,"height":93,"sizeSlug":"full","linkDestination":"custom"} --> <div class="wp-block-image"><figure class="aligncenter size-full is-resized"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/wapuu-original.png" class="wp-image-1234" width="85" height="93"/></figure></div> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong> <strong>Title</strong></strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:image {"align":"center","id":1234,"width":85,"height":93,"sizeSlug":"full","linkDestination":"custom"} --> <div class="wp-block-image"><figure class="aligncenter size-full is-resized"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/wapuu-original.png" class="wp-image-1234" width="85" height="93"/></figure></div> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong> <strong>Title</strong></strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --></div> <!-- /wp:columns -->'
        ) );

        register_block_pattern( 'modul-r/Cards-with-photo', array(
            'title'       => __( 'Cards with photos', 'modul-r' ),
            'categories'    => array( 'modul-r' ),
            'description' => _x( 'Three cards side by side with an image that fills the entire width', 'Block pattern description', 'modul-r' ),
            'content'     => '<!-- wp:columns {"align":"wide","className":"card-columns"} --> <div class="wp-block-columns alignwide card-columns"><!-- wp:column --> <div class="wp-block-column"><!-- wp:image {"align":"full","id":1234,"sizeSlug":"full","linkDestination":"custom"} --> <figure class="wp-block-image alignfull size-full"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></figure> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong>Title</strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:image {"align":"full","id":1234,"sizeSlug":"full","linkDestination":"custom"} --> <figure class="wp-block-image alignfull size-full"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></figure> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong> <strong>Title</strong></strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:image {"align":"full","id":1234,"sizeSlug":"full","linkDestination":"custom"} --> <figure class="wp-block-image alignfull size-full"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></figure> <!-- /wp:image --> <!-- wp:heading {"textAlign":"center","level":3,"textColor":"secondary"} --> <h3 class="has-text-align-center has-secondary-color has-text-color"><strong> <strong>Title</strong></strong></h3> <!-- /wp:heading --> <!-- wp:paragraph {"align":"center"} --> <p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <!-- /wp:paragraph --></div> <!-- /wp:column --></div> <!-- /wp:columns -->'
        ) );

        register_block_pattern( 'modul-r/Cards-with-cover', array(
            'title'       => __( 'Cards with Cover', 'modul-r' ),
            'categories'    => array( 'modul-r' ),
            'description' => _x( 'Three cards side by side with a cover image that fills the whole card', 'Block pattern description', 'modul-r' ),
            'content'     => '<!-- wp:columns {"align":"wide","className":"card-columns"} --> <div class="wp-block-columns alignwide card-columns"><!-- wp:column --> <div class="wp-block-column"><!-- wp:cover {"url":"'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg","id":1234,"align":"full","style":{"color":{}}} --> <div class="wp-block-cover alignfull has-background-dim"><img class="wp-block-cover__image-background wp-image-1234" src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} --> <p class="has-text-align-center has-large-font-size">Title</p> <!-- /wp:paragraph --></div></div> <!-- /wp:cover --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:cover {"url":"'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg","id":1234,"align":"full","style":{"color":{}}} --> <div class="wp-block-cover alignfull has-background-dim"><img class="wp-block-cover__image-background wp-image-1234" src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} --> <p class="has-text-align-center has-large-font-size">Title</p> <!-- /wp:paragraph --></div></div> <!-- /wp:cover --></div> <!-- /wp:column --> <!-- wp:column --> <div class="wp-block-column"><!-- wp:cover {"url":"'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg","id":1234,"align":"full","style":{"color":{}}} --> <div class="wp-block-cover alignfull has-background-dim"><img class="wp-block-cover__image-background wp-image-1234" src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} --> <p class="has-text-align-center has-large-font-size">Title</p> <!-- /wp:paragraph --></div></div> <!-- /wp:cover --></div> <!-- /wp:column --></div> <!-- /wp:columns -->'
        ) );

        register_block_pattern( 'Gallery/Carousel-single', array(
            'title'       => __( 'Modul-R Carousel (single image)', 'modul-r' ),
            'categories'    => array( 'gallery' ),
            'description' => _x( 'Three cards side by side with a cover image that fills the whole card', 'Block pattern description', 'modul-r' ),
            'content'     => '<!-- wp:gallery {"ids":[1234],"linkTo":"file","className":"slider slider-single lightbox"} --> <figure class="wp-block-gallery columns-3 is-cropped slider slider-single lightbox"><ul class="blocks-gallery-grid"><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li></ul></figure> <!-- /wp:gallery -->'
        ) );

        register_block_pattern( 'Gallery/Carousel-multiple', array(
            'title'       => __( 'Modul-R Carousel (show multiple images)', 'modul-r' ),
            'categories'    => array( 'gallery' ),
            'description' => _x( 'Three cards side by side with a cover image that fills the whole card', 'Block pattern description', 'modul-r' ),
            'content'     => '<!-- wp:gallery {"ids":[1234],"linkTo":"file","className":"slider slider-multi lightbox"} --> <figure class="wp-block-gallery columns-3 is-cropped slider slider-multi lightbox"><ul class="blocks-gallery-grid"><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li><li class="blocks-gallery-item"><figure><a href="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg"><img src="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" data-id="1234" data-full-url="'. esc_url(get_template_directory_uri()) . '/inc/images/WordPress-logotype-alt-background.jpg" class="wp-image-1234"/></a></figure></li></ul></figure> <!-- /wp:gallery -->'
        ) );
    }

    add_action( 'init', 'modul_r_register_pattern' );
}

if ( function_exists( 'register_block_style' ) ) {

    $wave = apply_filters("modul_r_header_wave_shape", get_template_directory_uri() . '/inc/images/wave.svg');

    register_block_style('core/cover', [
        'name' => 'full-height',
        'label' => __('The cover fills the whole height of the screen ', 'modul-r'),
        'inline_style' => '.wp-block-cover.is-style-full-height { height: 100vh; }',
    ]);

    register_block_style('core/media-text', [
        'name' => 'centered-image',
        'label' => __('Image large and centered ', 'modul-r'),
    ]);

    register_block_style('core/media-text', [
        'name' => 'small-image',
        'label' => __('Small image (always the half of the width)', 'modul-r')
    ]);

    register_block_style('core/media-text', [
        'name' => 'full-height',
        'label' => __('Full screen height media and text', 'modul-r')
    ]);

    register_block_style('core/media-text', [
        'name' => 'traversal-clip',
        'label' => __('cut the container crosswise', 'modul-r')
    ]);

    register_block_style('core/cover', [
        'name' => 'traversal-clip',
        'label' => __('cut the container crosswise', 'modul-r')
    ]);

    register_block_style('core/cover', [
        'name' => 'wave-clip',
        'label' => __('clip with wave shape', 'modul-r'),
        'inline_style' => '.wp-block-cover.is-style-wave-clip { mask: url('.$wave.') no-repeat 50% 50%;-webkit-mask: url('.$wave.') no-repeat 50% 50%; }'
    ]);

    register_block_style('core/post-featured-image', [
        'name' => 'wave-clip',
        'label' => __('clip with wave shape', 'modul-r'),
        'inline_style' => '.wp-block-post-featured-image.is-style-wave-clip { mask: url('.$wave.') no-repeat 50% 50%;-webkit-mask: url('.$wave.') no-repeat 50% 50%; }'
    ]);
}