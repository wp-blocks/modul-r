
jQuery(document).ready(function($){

  // a slick slider
  const sliders = document.getElementsByClassName("slider");

  if (sliders.length) {
    for (let i = 0; i < sliders.length; i++) {
      if (sliders[i].classList.contains('slider-single')) {
        $(sliders[i]).slick({
          infinite: true,
          slidesToShow: 1,
          autoplay: true
        });
      } else if (sliders[i].classList.contains('slider-multi')) {
        $(sliders[i]).slick({
          lazyLoad: 'ondemand',
          dots: true,
          infinite: true,
          slidesToShow: 3,
          autoplay: true,
          centerMode: true,
          responsive: [
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: false
              }
            },{
              breakpoint: 400,
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
    }
  }



  if ($('.lightbox')) {

    $('.lightbox a').fancybox({

      caption : function() {
        let altcaption = $(this).children('img').attr('alt').length ? $(this).children('img').attr('alt') : '';
        let figcaption = $(this).next('figcaption').length > 0 ? $(this).next('figcaption').text() : '';
        let imgcaption = (figcaption !== '' ? figcaption : (altcaption !== '' ? altcaption : '')) ;
        return imgcaption;
      }

    });
  }


  if ($('.lightbox-gallery')) {

    $('.lightbox-gallery a').click(function() {

      let galleryImages;

      if ($(this).closest('.wp-block-gallery').hasClass('slider')) {
        galleryImages = $(this).closest('.wp-block-gallery').find('.slick-slide:not(".slick-cloned") a');
      } else {
        galleryImages = $(this).closest('.wp-block-gallery').find('a');
      }

      let gallery = [];

      galleryImages.each(function( index, galleryItem ) {

        let altcaption = $(this).children('img').attr('alt').length ? $(this).children('img').attr('alt') : '';
        let figcaption = $(this).next('figcaption').length > 0 ? $(this).next('figcaption').text() : '';
        let imgcaption = (figcaption !== '' ? figcaption : (altcaption !== '' ? altcaption : '')) ;

        gallery.push({
          src : galleryItem.href,
          opts : {
            caption: imgcaption + '<br/><span class="fancybox-counter"><span data-fancybox-index></span> of <span data-fancybox-count></span></span>'
          }
        })
      });

      $.fancybox.open( gallery, { loop: false }, $(this).index() );
      return false;

    });
  }

});