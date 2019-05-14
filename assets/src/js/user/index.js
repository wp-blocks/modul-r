
document.addEventListener("DOMContentLoaded", function(event) {

  // a slick slider
  $('slider').slick({
    infinite: true,
    slidesToShow: 1,
    autoplay: true
  });


  $('.lightbox a').fancybox({
    caption : function( instance, item ) {
      var caption = $(this).data('caption') || '';
      caption = ( caption.length ? caption : '<?php  ?>caption' );
      return caption;
    }
  });



  if ($('.lightbox-gallery')) {

    $('.blocks-gallery-item').click(function() {

      var galleryImages = $(this).parent().find('a');
      var gallery = [];

      galleryImages.each(function( index, galleryItem ) {

        var caption = $(this).parent().find('figcaption') ?  $(this).find('img').attr('alt') : $(this).parent().find('figcaption')  ;

        gallery.push({
          src : galleryItem.href,
          opts : {
            caption: caption
          }
        })
      });

      $.fancybox.open( gallery, { loop: false }, $(this).index() );

      return false;
    });
  }


});