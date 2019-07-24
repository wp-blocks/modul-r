// Change 'hover' to 'click' if you want to
jQuery(document).ready(function($){
  $('nav li > .sub-menu').parent().hover(function () {

    var submenu = $(this).children('.sub-menu');

    if (!$(submenu).hasClass("active")) {
      $(submenu).addClass("active");
    } else {
      $(submenu).removeClass("active");
    }

  });
});