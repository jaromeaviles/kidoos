let navbar = document.querySelector(".navbar");

// navigation onload

if (window.innerWidth > 991) {
  window.onload = () => {
    let position = window.scrollY;
    if (position > 100) {
      navbar.classList.add("on-scroll");
    } else {
      navbar.classList.remove("on-scroll");
    }
  };

  // Navigation Scrolling

  window.onscroll = () => {
    let top = window.scrollY;
    if (top > 100) {
      navbar.classList.add("on-scroll");
    } else {
      navbar.classList.remove("on-scroll");
    }
  };
}

// Login Form

// check url if contains error

window.onload = () => {
  if (window.location.href.indexOf("login_error") > -1) {
    let loginError = document.querySelector(".login-error");
    loginError.classList.add("error-display");
  }
};

loginForm = document.querySelector(".form-overlay #login");

if (loginForm) {
  loginForm.addEventListener("submit", (e) => {
    let inputs = document.querySelectorAll(".form-overlay input");
    let email = document.querySelector("#email");

    for (let input of inputs) {
      if (input.value == "" || validateEmail(email) == false) {
        let loginError = document.querySelector(".login-error");
        loginError.classList.add("error-show");
        e.preventDefault();
      }
    }
  });
}

// Email Validation
function validateEmail(inputText) {
  let regex = /.+@(gmail|yahoo)\.com$/;
  return regex.test(inputText.value);
}

// Add Form

addForm = document.querySelector("form#add");

if (addForm) {
  let hasError = false;

  addForm.addEventListener("submit", e => {
    let inputs = document.querySelectorAll("form#add input");
    let errorCont = document.querySelector("form#add .form-error");

    // Count number of errors
    let countError = 0;

    // checks input if it contains value
    let errorNull = document.querySelector("form#add .form-error .error-null");

    // checks inputs

    for (let input of inputs) {

        if (input.value == '') {
            countError++;
            errorNull.classList.add('show');

            if (input.value) {
                countError--;
            }
        }

        if (countError == 0) {
            errorNull.classList.remove('show');
        }
    }

    // Check email
    let email = document.querySelector("#email");
    let errorEmail = document.querySelector("form#add .form-error .error-email");

    if (validateEmail(email) == false && email.value) {
        hasError = true;
        errorEmail.classList.add("show");
        countError++;
    } else {
        if (countError == 0) {
            errorEmail.classList.remove("show");
        }
    }

    // check gender
    let gender = document.querySelector('#gender');

    if (gender.value == '-- Select --') {
        hasError = true;
        countError++;
        errorNull.classList.add('show');
    } else if (gender.value == "Male" || gender.value == "Female") {
        countError - 1;
    }

    if (countError == 0) {
        hasError = false;
    }

    // show Error Panel

    if (hasError) {
        errorCont.classList.add('show');
        e.preventDefault();
    } else {
        errorCont.classList.remove('show');
    }

  });
}

// remove collapse when menu clicked

let navItems = document.querySelectorAll(".navbar-nav .nav-item");

for (const nav of navItems) {
  nav.addEventListener("click", () => {
    let toggler = document.querySelector(".navbar-collapse");
    toggler.classList.remove("show");
  });
}

// Search Validation

let searchForm = document.querySelector(".searchForm");
let searchInput = document.querySelector("#searchInput");

if (searchForm) {
  searchForm.addEventListener("submit", (e) => {
    if (searchInput.value == "") {
      searchInput.classList.add("highlight-error");
      e.preventDefault();
    }
  });
}

// Auto adjust height depends on content

let rows = document.querySelectorAll("table tr");
let footer = document.querySelector("footer");

if (rows.length <= 4 && rows.length >= 1) {
  footer.classList.add("custom-footer");
}

// remove pagination if there is no record found

let noRecord = document.querySelector(".no-record");
let pagination = document.querySelector(".student-record nav");

if (pagination) {
  if (noRecord) {
    pagination.style.display = "none";
  } else {
    pagination.style.display = "block";
  }
}

// disabled buttons

disabledBtns = document.querySelectorAll(".disabled-button");

for (const btn of disabledBtns) {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
  });
}
