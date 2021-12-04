"use strict";

const parallaxDefaultSpeed = 0.3;
const shiftView = 200; // make the elements triggered before fully in the viewport

let vScrollTop = 0;
let lastScroll = 0;
const viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
let headerHeight = document.getElementById('masthead').clientHeight;
let scrollOffset = headerHeight; // the screen height where the header resize was triggered
const headerDistanceFromTop = document.getElementById("masthead").offsetTop;

function throttle(fn, wait) {
  let time = Date.now();
  return function() {
    if ((time + wait - Date.now()) < 0) {
      fn();
      time = Date.now();
    }
  }
}

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

    // this will add classes to the item to describe visibility
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

        if (entry.getElementsByTagName('img').length)
          entry.getElementsByTagName('img')[0].style.transform = "translateY(" + moveTopItem + "px)";

      }
    }
  });
}

function scrollCallback() {
  vScrollTop = window.pageYOffset;
  headerHeight = document.getElementById('masthead').clientHeight;

  // add/remove the ".top" class to masthead after scrolling down
  ( lastScroll > vScrollTop ) ? document.body.classList.remove('scrolled') :
    vScrollTop > scrollOffset ? document.body.classList.add('scrolled') :
      document.body.classList.remove('scrolled');

  // add/remove the ".top" class to masthead near the top of the page
  ( vScrollTop < 5 ) ? document.body.classList.add('top') : document.body.classList.remove('top');

  // check for items visibility
  VisibleItemsTrigger(vScrollTop);

  // store the vertical scroll value
  lastScroll = vScrollTop;
}

document.addEventListener("DOMContentLoaded", function(event) {

  scrollCallback();

  window.addEventListener('scroll', throttle(scrollCallback, 2), true); // 1 time every 5ms
  window.addEventListener('resize', scrollCallback, true);

});