"use strict";

jQuery(document).ready(function ($) {
  // a slick slider
  var sliders = document.getElementsByClassName("slider");

  if (sliders.length) {
    for (var i = 0; i < sliders.length; i++) {
      if (sliders[i].classList.contains('slider-single')) {
        $(sliders[i]).children('ul').slick({
          infinite: true,
          slidesToShow: 1,
          autoplay: true
        });
      } else if (sliders[i].classList.contains('slider-multi')) {
        $(sliders[i]).children('ul').slick({
          lazyLoad: 'ondemand',
          dots: true,
          infinite: true,
          slidesToShow: 3,
          autoplay: true,
          centerMode: true,
          responsive: [{
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
          }]
        });
      }
    }
  }

  if ($('.lightbox')) {
    $('.lightbox a').fancybox({
      caption: function caption() {
        var altcaption = $(this).children('img').attr('alt').length ? $(this).children('img').attr('alt') : '';
        var figcaption = $(this).next('figcaption').length > 0 ? $(this).next('figcaption').text() : '';
        var imgcaption = figcaption !== '' ? figcaption : altcaption !== '' ? altcaption : '';
        return imgcaption;
      }
    });
  }

  if ($('.lightbox-gallery')) {
    $('.lightbox-gallery a').click(function () {
      var galleryImages, index;

      if ($(this).closest('.wp-block-gallery').hasClass('slider')) {
        galleryImages = $(this).closest('.wp-block-gallery').find('.slick-slide:not(".slick-cloned") a');
        index = $(this).closest('.slick-slide').attr('data-slick-index');
      } else {
        galleryImages = $(this).closest('.wp-block-gallery').find('a');
        index = $(this).closest('li').index();
      }

      var gallery = [];
      galleryImages.each(function (index, galleryItem) {
        var altcaption = $(this).children('img').attr('alt').length ? $(this).children('img').attr('alt') : '';
        var figcaption = $(this).next('figcaption').length > 0 ? $(this).next('figcaption').text() : '';
        var imgcaption = figcaption !== '' ? figcaption : altcaption !== '' ? altcaption : '';
        gallery.push({
          src: galleryItem.href,
          opts: {
            caption: imgcaption + '<br/><span class="fancybox-counter"><span data-fancybox-index></span> of <span data-fancybox-count></span></span>'
          }
        });
      });
      $.fancybox.open(gallery, {
        loop: false,
        index: index
      });
      return false;
    });
  }
});
"use strict";

jQuery(document).ready(function ($) {
  var $container = document.getElementById('masonry-wrapper');

  if ($container) {
    var msnry = new Masonry($container, {
      // Masonry options...
      itemSelector: '.grid__item',
      // select none at first
      columnWidth: '.grid__col-sizer',
      gutter: '.grid__gutter-sizer',
      transitionDuration: '0.8s'
    }); // init Infinite Scroll

    var infScroll = new InfiniteScroll($container, {
      // Infinite Scroll options...
      path: '.navigation a',
      // selector for the NEXT link (to page 2)
      append: '.grid__item',
      // selector for all items you'll retrieve
      outlayer: msnry,
      history: false,
      status: '.page-load-status'
    });
    imagesLoaded($container, function (instance) {
      msnry.layout();
    });
  }
});
"use strict";

// Change 'hover' to 'click' if you want to
jQuery(document).ready(function ($) {
  $('nav li > .sub-menu').parent().hover(function () {
    var submenu = $(this).children('.sub-menu');

    if (!$(submenu).hasClass("active")) {
      $(submenu).addClass("active");
    } else {
      $(submenu).removeClass("active");
    }
  });
});
"use strict";

var parallaxDefaultSpeed = 0.3;
var shiftView = 200; // make the elements triggered before fully in the viewport

var vScrollTop = 0;
var lastScroll = 0;
var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
var headerHeight = document.getElementById('masthead').clientHeight;
var scrollOffset = headerHeight; // the screen height where the header resize was triggered

var headerDistanceFromTop = document.getElementById("masthead").offsetTop;

var isInViewport = function isInViewport(elem) {
  var rect = elem.getBoundingClientRect();
  return !(rect.bottom < 0 || rect.top - viewHeight >= 0);
};

var isFullyVisible = function isFullyVisible(elem) {
  var rect = elem.getBoundingClientRect();
  var rectBottom;
  rect.bottom - rect.top > viewHeight ? rectBottom = rect.top + viewHeight : rectBottom = rect.bottom;
  return rect.top + shiftView >= 0 && rectBottom - shiftView <= document.documentElement.clientHeight;
};

function VisibleItemsTrigger(top) {
  var animated = document.getElementsByClassName("interactive");
  var arr = [].slice.call(animated);
  arr.forEach(function (entry) {
    if (isFullyVisible(entry)) {
      entry.classList.add('visible');
      entry.classList.add('already-see');
    } else {
      entry.classList.remove('visible');
    }

    if (isInViewport(entry)) {
      // Parallax images
      // check if interactive box have a img child and get the distance from top
      if (entry.classList.contains('parallax')) {
        var firstTop = window.pageYOffset + entry.getBoundingClientRect().top - headerDistanceFromTop;
        var moveTopItem = -(firstTop - top) * parallaxDefaultSpeed;
        entry.getElementsByTagName('img')[0].style.transform = "translateY(" + moveTopItem + "px)";
      }
    }
  });
}

function throttle(fn, wait) {
  var time = Date.now();
  return function () {
    if (time + wait - Date.now() < 0) {
      fn();
      time = Date.now();
    }
  };
}

function scrollCallback() {
  vScrollTop = window.pageYOffset;
  headerHeight = document.getElementById('masthead').clientHeight;

  if (lastScroll > vScrollTop) {
    document.body.classList.remove('scrolled');
  } else {
    vScrollTop > scrollOffset ? document.body.classList.add('scrolled') : document.body.classList.remove('scrolled');
  }

  if (vScrollTop < 5) {
    document.body.classList.add('top');
  } else {
    document.body.classList.remove('top');
  }

  VisibleItemsTrigger(vScrollTop);
  lastScroll = vScrollTop;
}

document.addEventListener("DOMContentLoaded", function (event) {
  scrollCallback();
  window.addEventListener('scroll', throttle(scrollCallback, 5), true); // 1 time every 5ms

  window.addEventListener('resize', scrollCallback, true);
});
"use strict";

// WooCommerce category accordion
jQuery(document).ready(function ($) {
  if ($('.sidebar ul.product-categories').length > 0) {
    $('.sidebar .product-categories li.cat-parent > a').prepend('<span class="toggle"><i class="material-icons has-primary-color">arrow_forward</i></span>');
    $('.sidebar .product-categories .children').hide();
    $('.sidebar .product-categories li.current-cat-parent > .children, .product-categories li.current-cat > .children').show();
    $('.sidebar .product-categories li.current-cat, .product-categories li.current-cat-parent').addClass('active');
    $(function () {
      $('.sidebar .product-categories').find('a').on('click', function (e) {
        var catItem = $(this).parent('.cat-item');

        if (!catItem.hasClass('active')) {
          catItem.addClass('active');

          if (catItem.hasClass('cat-parent') || catItem.hasClass('current-cat')) {
            e.preventDefault();
          }

          $(this).parents('li.cat-parent').siblings().removeClass('active');
          $(this).siblings('.children').stop(true, true).slideToggle().parents('.cat-item').siblings().children('.children').stop(true, true).slideUp();
        }
      });
    });
  }
});
//# sourceMappingURL=scripts.js.map
