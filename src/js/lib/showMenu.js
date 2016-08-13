var navbarMenu = document.getElementById('menu-header')
var btnMenu = document.getElementById('btnMenu')
var btnButton = document.getElementById('btnButton')

var showMenu = () => {
  const mql = window.matchMedia('screen and (max-width: 767px')
  if (mql.matches) {
    navbarMenu.classList.toggle('nav__menu--list--show')
    btnMenu.classList.toggle('inactive')
    btnButton.classList.toggle('fa-bars')
    btnButton.classList.toggle('fa-times')
    alert('Click en boton')
  }
}
module.exports = showMenu
