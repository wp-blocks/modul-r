/**
 * Cookie Policy
 */

document.addEventListener("DOMContentLoaded", function(event) {

  if (document.cookie.indexOf('cookiepolicy=') < 0) {
    document.cookie = "cookiepolicy=showmessage; expires=Mon, 28 Dec 2020 12:00:00 UTC; path=/";
    document.getElementById('cookielaw').style.bottom = "0px";
  } else {

    function getCookie(name) {
      var value = "; " + document.cookie;
      var parts = value.split("; " + name + "=");
      if (parts.length == 2) return parts.pop().split(";").shift();
    }

    var cookiepol = getCookie('cookiepolicy');

    if (cookiepol == 'showmessage') {
      document.getElementById('cookielaw').style.bottom = "0";
    }

  }

});

window.setInterval(function () {
  var cookieflag = false;
  if (cookieflag == false) {
    if (this.pageYOffset >= 200) {
      okCookie();
      cookieflag = true;
    }
  }
}, 1000);

function okCookie() {
  document.cookie = "cookiepolicy=nomessage; expires=Mon, 28 Dec 2020 12:00:00 UTC; path=/";
  if ($(window).width() < 960) {
    document.getElementById('cookielaw').style.bottom = "-240px";
  }
  else {
    document.getElementById('cookielaw').style.bottom = "-150px";
  }
}