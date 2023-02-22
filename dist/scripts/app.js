const regex = {
    email: /^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/,
    pass: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
}

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
let button = document.querySelector('.form-overlay button');
let inputs = document.querySelectorAll('.form-overlay input');

if (button) {
    button.addEventListener('click', e => {
        for (let input of inputs) {
                let errorContainer = input.nextElementSibling;
                let errors = errorContainer.querySelectorAll('p');
                for (const error of errors) {
                
                    if (input.value == '') {
                    if (error.classList.contains('error-no-input')) {
                        error.classList.add('display-error');
                    }
                    e.preventDefault();
                } else {
                    error.classList.remove('display-error');
                }
            }
    
            // checks format
            if (input.value) {
                validateEmail();
                validatePassword();
            }
        }
    });
}



// on keyup
for (const input of inputs) {
    input.addEventListener('keyup', () => {
        const errorCont = input.nextElementSibling;
        let errors = errorCont.querySelectorAll('p');

        for (const error of errors) {
            if (error.classList.contains('display-error')) {
                error.classList.remove('display-error');
            }

            if (error.classList.contains('error-invalid-creds')) {
                error.classList.add('d-none');
            }
        }
    });
}

// Email validation
function validateEmail() {
    let email = document.querySelector('#email');
    let errorContainer = email.nextElementSibling;
    let error = errorContainer.querySelector('.error-invalid-format');
    if (email.value) {
        if (regex.email.test(email.value)) {
            error.classList.remove('display-error');
        } else {
            error.classList.add('display-error');
            event.preventDefault();
        }
    }
}

// Password validation
function validatePassword() {
    let password = document.querySelector('#password');
    let errorContainer = password.nextElementSibling;
    let error = errorContainer.querySelector('.error-invalid-format');
    if (password.value) {
        if (regex.pass.test(password.value)) {
            error.classList.remove('display-error');
        } else {
            error.classList.add('display-error');
            event.preventDefault();
        }
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

searchForm.addEventListener('submit', e => {
    if (searchInput.value == '') {
        searchInput.classList.add('highlight-error');
        e.preventDefault();
    }
});

 // Auto adjust height depends on content

 let rows = document.querySelectorAll('table tr');
 let footer = document.querySelector('footer');

 if (rows.length <= 4 && rows.length >= 1) {
        footer.classList.add('custom-footer');
    }