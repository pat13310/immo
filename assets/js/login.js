const form = document.getElementById('form_login');
const email = document.getElementById('mail');


form.addEventListener('submit', e => {
    e.preventDefault();
    checkInputs();
});


function checkInputs() {
    const emailValue = email.value.trim();

    if (emailValue === '') {
        setErrorFor(email, 'Adresse mail vide');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Adresse mail invalide');
    } else {
        setSuccessFor(email);
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


