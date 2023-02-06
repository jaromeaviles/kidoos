
let navbar = document.querySelector('.navbar');

// navigation onload

window.onload = () => {
    let position = window.scrollY;
    if (position > 100) {
        navbar.classList.add('on-scroll');
    } else {
        navbar.classList.remove('on-scroll');
    }
}

// Navigation Scrolling

window.onscroll = () => {
    let top = window.scrollY;
    if (top > 100) {
        navbar.classList.add('on-scroll');
    } else {
        navbar.classList.remove('on-scroll');
    }
}