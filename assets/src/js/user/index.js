
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
    }
  }



  if ($('.lightbox a')) {
    $('.lightbox a').fancybox({

      caption : function() {
        let caption = $(this).next('figcaption').text() !== '' ? $(this).next('figcaption').text() : $(this).children('img').attr('alt')  ;
        caption = ( caption.length ? caption : 'No caption' );

        return caption;
      }

    });
  }


  if ($('.lightbox-gallery')) {
    $('.blocks-gallery-item').click(function() {

      let galleryImages = $(this).parent().find('a');
      let gallery = [];

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


// WooCommerce category accordion
jQuery(document).ready(function($) {

  if ($('ul.product-categories').length > 0) {

    $('.product-categories li.cat-parent > a').prepend('<span class="toggle"><i class="material-icons">arrow_forward</i></span>');
    $('.product-categories .children').hide();
    $('.product-categories li.current-cat-parent > .children, .product-categories li.current-cat > .children').show();
    $('.product-categories li.current-cat, .product-categories li.current-cat-parent').addClass('active');

    $(function () {

      $('.product-categories').find('a').on('click', function (e) {

        const catItem = $(this).parent('.cat-item');

        if ( ! catItem.hasClass('active')) {

          catItem.addClass('active');

          if ( catItem.hasClass('cat-parent') || catItem.hasClass('current-cat')) {
            e.preventDefault();
          }

          $(this).parents('.product-categories > li').siblings().removeClass('active');

          $(this).siblings('.children').stop(true, true).slideToggle()
            .parents('.cat-item').siblings().children('.children').stop(true, true).slideUp();

        }

      });

    });

  }

});


