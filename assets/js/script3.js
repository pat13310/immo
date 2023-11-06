const form = document.getElementById('form');
const username = document.getElementById('name');
const firstname = document.getElementById('firstname');

form_add.addEventListener('submit', e => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    // trim to remove the whitespaces
    const usernameValue = username.value.trim();
    const firstnameValue = firstname.value.trim();

    if (usernameValue === '') {
        setErrorFor(username, 'Nom vide');
    } else {
        setSuccessFor(username);
    }

    if (firstnameValue === '') {
        setErrorFor(firstname, 'Prénom vide');
    } else {
        setSuccessFor(firstname);
    }


}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}


// // SOCIAL PANEL JS
// const floating_btn = document.querySelector('.floating-btn');
// const close_btn = document.querySelector('.close-btn');
// const social_panel_container = document.querySelector('.social-panel-container');
//
// floating_btn.addEventListener('click', () => {
//     social_panel_container.classList.toggle('visible')
// });
//
// close_btn.addEventListener('click', () => {
//     social_panel_container.classList.remove('visible')
// });