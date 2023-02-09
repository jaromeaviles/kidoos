
let navbar = document.querySelector('.navbar');

// navigation onload

if (window.innerWidth > 991) {

window.onload = () => {
    let position = window.scrollY;
    if (position > 100) {
        navbar.classList.add('on-scroll');
    } else {
        navbar.classList.remove('on-scroll');
    }

    // Checks if in login page

    let main = document.querySelector('main');

    if (main.classList.contains('signin')) {
        let nav = document.querySelector('.navbar');
        nav.style.visibility = 'hidden';
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

}