"use strict";

const parallaxDefaultSpeed = 0.3;
const shiftView = 200; // make the elements triggered before fully in the viewport

let vScrollTop = 0;
let lastScroll = 0;
const viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
let headerHeight = document.getElementById('masthead').clientHeight;
let scrollOffset = headerHeight; // the screen height where the header resize was triggered
const headerDistanceFromTop = document.getElementById("masthead").offsetTop;

let isInViewport = function (elem) {
  let rect = elem.getBoundingClientRect();
  return (!(rect.bottom < 0 || rect.top - viewHeight >= 0));
};

let isFullyVisible = function (elem) {
  let rect = elem.getBoundingClientRect();
  let rectBottom;
  (rect.bottom - rect.top > viewHeight ) ? rectBottom = rect.top + viewHeight : rectBottom = rect.bottom ;
  return (rect.top + shiftView >= 0) && (rectBottom - shiftView <= document.documentElement.clientHeight);
};


function VisibleItemsTrigger(top) {

  let animated = document.getElementsByClassName("interactive");
  let arr = [].slice.call(animated);

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
        let firstTop = window.pageYOffset + entry.getBoundingClientRect().top - headerDistanceFromTop;
        let moveTopItem = -(firstTop - top) * parallaxDefaultSpeed;
        entry.getElementsByTagName('img')[0].style.transform = "translateY(" + moveTopItem + "px)";
      }
    }
  });
}


function throttle(fn, wait) {
  let time = Date.now();
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

  if (vScrollTop < 5) {
    document.body.classList.add('top');
  } else {
    document.body.classList.remove('top');
  }

  VisibleItemsTrigger(vScrollTop);

  lastScroll = vScrollTop;
}

document.addEventListener("DOMContentLoaded", function(event) {

  scrollCallback();

  window.addEventListener('scroll', throttle(scrollCallback, 5), true); // 1 time every 5ms
  window.addEventListener('resize', scrollCallback, true);

});