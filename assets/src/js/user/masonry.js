document.addEventListener("DOMContentLoaded", function(event) {

  let $ = jQuery;
  // Initiate Masonry
  let $container = $('#masonry-wrapper');

  $container.imagesLoaded(function () {
    $container.masonry({
      itemSelector: '.masonry-item',
      columnWidth: '.masonry-item',
      isAnimated: true,
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false
      }
    });
  });

  $container.infinitescroll({
      debug: false,
      navSelector: '.navigation', // selector for the paged navigation
      nextSelector: '.navigation a', // selector for the NEXT link (to page 2)
      itemSelector: '.masonry-item', // selector for all items you'll retrieve
      behavior: 'local',
      container: '#main',
      loading: {
        msgText: masonry_args.loading,
        finishedMsg: masonry_args.end,
        img: masonry_args.templateUrl + '/assets/dist/img/elements/loader.svg'
      }
    },

    // trigger Masonry as a callback
    function (newElements) {
      // hide new items while they are loading
      let $newElems = $(newElements).css({opacity: 0});
      // ensure that images load before adding to masonry layout
      $newElems.imagesLoaded(function () {
        // show elems now they're ready
        $newElems.animate({opacity: 1});
        $container.masonry('appended', $newElems, true);
      });
    }
  );
});