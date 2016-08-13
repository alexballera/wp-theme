import modernizr from './vendors/modernizr.js'
import selectivizr from './vendors/selectivizr.js'
import retinajs from './vendors/retina.js'
import prism from './vendors/prism.js'
import showMenu from './lib/showMenu'
import doTransparentBar from './lib/doTransparentBar'
import cookieConsent from './lib/cookieConsent'
import loadJS from './lib/loadJS'

(() => {
  'use strict'

  document.addEventListener('DOMContentLoaded', onDOMLoad)

  function onDOMLoad () {
    modernizr()
    selectivizr()
    retinajs()
    prism()
    doTransparentBar()
// Variables Globales
    var btnMenu = document.getElementById('btnMenu')
    var btnButton = document.getElementById('btnButton')
    var navBar = document.getElementById('navBar')
    var navbarMenu = document.getElementById('menu-header')

// Menú
    btnMenu.addEventListener('click', showMenu)
    navbarMenu.addEventListener('click', showMenu)

// Cookies
    cookieConsent()

  // Load JS
    var urlJs = [
      '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56da634ec645fbfa',
      '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js'
    ]
    loadJS(urlJs)
  }
})()
