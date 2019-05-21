
document.addEventListener("DOMContentLoaded", function(event) {

  // a slick slider
  if ($('.slider-single')) {
    $('.slider-single').slick({
      infinite: true,
      slidesToShow: 1,
      autoplay: true
    });
  }

  if ($('.slider-multi')) {
    $('.slider-multi').slick({
        lazyLoad: 'ondemand',
        dots: true,
        infinite: true,
        slidesToShow: 3,
        autoplay: true,
        centerMode: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false
            }
          }
      ]
    });
  }


  $('.lightbox a').fancybox({
    caption : function() {

      var caption = $(this).next('figcaption').text() !== '' ? $(this).next('figcaption').text() : $(this).children('img').attr('alt')  ;
      caption = ( caption.length ? caption : 'No caption' );

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
            caption: caption + '<br/><span class="fancybox-counter"><span data-fancybox-index></span> of <span data-fancybox-count></span></span>'
          }
        })
      });

      $.fancybox.open( gallery, { loop: false }, $(this).index() );

      return false;
    });
  }


});