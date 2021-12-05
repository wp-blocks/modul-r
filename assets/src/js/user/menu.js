/* *
* Menu Scripts
* */
document.addEventListener("DOMContentLoaded", function(event) {

  const menuItems = document.getElementById("site-navigation") ?
    document.getElementById("site-navigation").querySelectorAll("nav li") : false;

  const handleMenuOn = (event) => {
    const subMenu = event.currentTarget.querySelector(".sub-menu");
    if (subMenu) subMenu.classList.add('active');
  };

  const handleMenuOff = (event) => {
    const subMenu = event.currentTarget.querySelector(".sub-menu");
    if (subMenu) subMenu.classList.remove('active');
  };

  if (menuItems) {
    menuItems.forEach(item => {
      // Change 'click' || 'mouseover' if you want to
      // item.addEventListener('click', handleMenuOn );
      item.addEventListener('mouseover', handleMenuOn);
      item.addEventListener('mouseout', handleMenuOff);
    });
  }
});