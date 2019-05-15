"use strict";

var parallaxDefaultSpeed = 0.3;
var shiftView = 200; // make the elements triggered before fully in the viewport

var vScrollTop = 0;
var lastScroll = 0;
var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
var headerHeight = document.getElementById('masthead').clientHeight;
var scrollOffset = headerHeight; // the screen height where the header resize was triggered

var isInViewport = function (elem) {
  var rect = elem.getBoundingClientRect();
  return (!(rect.bottom < 0 || rect.top - viewHeight >= 0));
};

var isFullyVisible = function (elem) {
  var rect = elem.getBoundingClientRect();
  var rectBottom;
  (rect.bottom - rect.top > viewHeight ) ? rectBottom = rect.top + viewHeight : rectBottom = rect.bottom ;
  return (rect.top + shiftView >= 0) && (rectBottom - shiftView <= document.documentElement.clientHeight);
};


function VisibleItemsTrigger(top) {

  var animated = document.getElementsByClassName("interactive");
  var arr = [].slice.call(animated);

  arr.forEach(function(entry) {

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
        var firstTop = window.pageYOffset + entry.getBoundingClientRect().top;
        var moveTopItem = -(firstTop - top) * parallaxDefaultSpeed;
        entry.getElementsByTagName('img')[0].style.transform = "translateY(" + moveTopItem + "px)";
      }
    }
  });
}


function throttle(fn, wait) {
  var time = Date.now();
  return function() {
    if ((time + wait - Date.now()) < 0) {
      fn();
      time = Date.now();
    }
  }
}

function scrollCallback() {

  vScrollTop = window.pageYOffset;
  headerHeight = document.getElementById('masthead').clientHeight;

  if ( lastScroll > vScrollTop ) {
    document.body.classList.remove('scrolled');
  } else {
    vScrollTop > scrollOffset ? document.body.classList.add('scrolled') : document.body.classList.remove('scrolled');
  }

  VisibleItemsTrigger(vScrollTop);

  lastScroll = vScrollTop;
}

document.addEventListener("DOMContentLoaded", function(event) {

  vScrollTop = window.pageYOffset;

  scrollCallback();

  window.addEventListener('scroll', throttle(scrollCallback, 16), true); // 1 frame each 16ms is about 60fps
  window.addEventListener('resize', scrollCallback, true); // 1 frame each 16ms is about 60fps

  $('.main-slider').slick({
    infinite: true,
    slidesToShow: 1,
    autoplay: true
  });

});