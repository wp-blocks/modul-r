// Change 'hover' to 'click' if you want to
document.addEventListener("DOMContentLoaded", function(event) {
  $('nav li > .sub-menu').parent().hover(function () {

    var submenu = $(this).children('.sub-menu');
    if (!$(submenu).hasClass("active")) {
      $(submenu).addClass("active");
    } else {
      $(submenu).removeClass("active");
    }

  });
});