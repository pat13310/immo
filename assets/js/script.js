const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('mail');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form_add.addEventListener('submit', e => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    // trim to remove the whitespaces
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    if (usernameValue === '') {
        setErrorFor(username, 'Nom de login vide');
    } else {
        setSuccessFor(username);
    }

    if (emailValue === '') {
        setErrorFor(email, 'Adresse mail vide');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Adresse mail invalide');
    } else {
        setSuccessFor(email);
    }

    if (passwordValue === '') {
        setErrorFor(password, 'Mot de passe vide');
    } else {
        setSuccessFor(password);
    }

    if (password2Value === '') {
        setErrorFor(password2, 'Mot de passe vide');
    } else if (passwordValue !== password2Value) {
        setErrorFor(password2, 'Les mots de passe ne sont pas identiques');
    } else {
        setSuccessFor(password2);
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