require('../scss/style.scss');
require('./bulma-burger.js');


// custom mega menu size and position
const menuResize = () => {
let menuWidth = document.getElementById('menu-items').offsetWidth
let menuLeft = document.getElementById('menu-items').offsetLeft
let windowWidth = window.innerWidth
let elements = document.getElementsByClassName('mega-dropdown')

if (windowWidth >= 1024) {
    for (let index = 0; index < elements.length; index++) {
        let el = elements[index];
        el.style.top = (document.getElementById('menu-items').offsetTop + document.getElementById('menu-items').offsetHeight) + 'px'
        el.style.minWidth = 'unset'
        el.style.width = menuWidth + 'px'
        el.style.left = menuLeft + 'px'
    }
}else{
    for (let index = 0; index < elements.length; index++) {
        let el = elements[index];
        el.style.top = ''
        el.style.minWidth = '100%'
        el.style.width = ''
        el.style.left = ''
    }
}
} 

window.addEventListener('resize', menuResize)

window.addEventListener('load', menuResize)
