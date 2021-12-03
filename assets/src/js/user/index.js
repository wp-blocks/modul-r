
jQuery(document).ready(function($) {

  // a slick slider
  const sliders = document.getElementsByClassName("slider");

  if (sliders.length) {
    for (let i = 0; i < sliders.length; i++) {
      if (sliders[i].classList.contains('slider-single')) {

        $(sliders[i]).children('ul').slick({
          infinite: true,
          slidesToShow: 1,
          autoplay: true
        });

      } else if (sliders[i].classList.contains('slider-multi')) {

        $( sliders[i]).children('ul').slick({
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
            }, {
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

      caption: function () {
        let altcaption = $(this).children('img').attr('alt').length ? $(this).children('img').attr('alt') : '';
        let figcaption = $(this).next('figcaption').length > 0 ? $(this).next('figcaption').text() : '';
        let imgcaption = (figcaption !== '' ? figcaption : (altcaption !== '' ? altcaption : ''));
        return imgcaption;
      }

    });
  }


  if ($('.lightbox-gallery')) {

    $('.lightbox-gallery a').click(function () {

      let galleryImages, index;

      if ($(this).closest('.wp-block-gallery').hasClass('slider')) {
        galleryImages = $(this).closest('.wp-block-gallery').find('.slick-slide:not(".slick-cloned") a');
        index = $(this).closest('.slick-slide').attr('data-slick-index');
      } else {
        galleryImages = $(this).closest('.wp-block-gallery').find('a');
        index = $(this).closest('li').index();
      }

      let gallery = [];

      galleryImages.each(function (index, galleryItem) {

        let altcaption = $(this).children('img').attr('alt').length ? $(this).children('img').attr('alt') : '';
        let figcaption = $(this).next('figcaption').length > 0 ? $(this).next('figcaption').text() : '';
        let imgcaption = (figcaption !== '' ? figcaption : (altcaption !== '' ? altcaption : ''));

        gallery.push({
          src: galleryItem.href,
          opts: {
            caption: imgcaption +
            '<br/><span class="fancybox-counter"><span data-fancybox-index></span> of <span data-fancybox-count></span></span>'
          }
        })
      });

      $.fancybox.open( gallery, { loop: false, index: index } );

      return false;

    });
  }

});