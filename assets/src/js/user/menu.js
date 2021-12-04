/* *
* Menu Scripts
* */
document.addEventListener("DOMContentLoaded", function(event) {

  const menu = document.getElementById("site-navigation"),
        menuItems = menu.querySelectorAll("nav li");

  const handleMenuOn = (event) => {
    const subMenu = event.currentTarget.querySelector(".sub-menu");
    if (subMenu) subMenu.classList.add('active');
  };

  const handleMenuOff = (event) => {
    const subMenu = event.currentTarget.querySelector(".sub-menu");
    if (subMenu) subMenu.classList.remove('active');
  };

  menuItems.forEach(item => {

    // Change 'click' || 'mouseover' if you want to
    // item.addEventListener('click', handleMenuClick );
    item.addEventListener('mouseover', handleMenuOn );
    item.addEventListener('mouseout', handleMenuOff );

  });
});