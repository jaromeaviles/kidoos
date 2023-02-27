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

// Login Form


// check url if contains error

window.onload = () => {
    if (window.location.href.indexOf('login_error') > -1) {
        let loginError = document.querySelector('.login-error');
        loginError.classList.add('error-display');
    }
}

loginForm = document.querySelector('.form-overlay form');

if (loginForm) {

loginForm.addEventListener('submit', e => {
    let inputs = document.querySelectorAll('.form-overlay input');
    let email = document.querySelector('#email');

    for (let input of inputs) {
        if (input.value == '' || validateEmail(email) == false) {
            let loginError = document.querySelector('.login-error');
            loginError.classList.add('error-display');
            e.preventDefault();
        }
    }
});

    // Validate Email
    function validateEmail(inputText) {
        let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return regex.test(inputText.value);
    }
}


// remove collapse when menu clicked

let navItems = document.querySelectorAll('.navbar-nav .nav-item');

for (const nav of navItems) {
    nav.addEventListener('click', () => {
        let toggler = document.querySelector('.navbar-collapse');
        toggler.classList.remove('show');
    });
}

// Search Validation

let searchForm = document.querySelector('.searchForm');
let searchInput = document.querySelector('#searchInput');

if (searchForm) {
    searchForm.addEventListener('submit', e => {
        if (searchInput.value == '') {
            searchInput.classList.add('highlight-error');
            e.preventDefault();
        }
    });
}



 // Auto adjust height depends on content

 let rows = document.querySelectorAll('table tr');
 let footer = document.querySelector('footer');

 if (rows.length <= 4 && rows.length >= 1) {
        footer.classList.add('custom-footer');
    }

// remove pagination if there is no record found

let noRecord = document.querySelector('.no-record');
let pagination = document.querySelector('.student-record nav');

if (pagination) {
    if (noRecord) {
        pagination.style.display = 'none';
    } else {
        pagination.style.display = 'block';
    }
}

// disabled buttons 

disabledBtns = document.querySelectorAll('.disabled-button');

for(const btn of disabledBtns) {
    btn.addEventListener('click', e => {
        e.preventDefault();
    });
}