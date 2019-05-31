
jQuery(document).ready(function($){

  const $container = document.getElementById('masonry-wrapper');

  let msnry = new Masonry($container, {
    // Masonry options...
    itemSelector: '.grid__item', // select none at first
    columnWidth: '.grid__col-sizer',
    gutter: '.grid__gutter-sizer',
    percentPosition: true,
    transitionDuration: '0.8s',
  });

  // init Infinite Scroll
  let infScroll = new InfiniteScroll($container, {
    // Infinite Scroll options...
    path: '.navigation a', // selector for the NEXT link (to page 2)
    append: '.grid__item', // selector for all items you'll retrieve
    outlayer: msnry,
    history: false,
    status: '.page-load-status',
  });

  imagesLoaded( $container, function( instance ) {
    msnry.layout()
  });

});