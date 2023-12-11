// Expression régulière pour un mot de passe fort
const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+]).{10,}$/;

const password = document.getElementById('password');
const errorPassword = document.getElementById('errorPassword');
const inscriptionForm = document.getElementById('inscriptionForm');
const confirmPassword = document.getElementById('confirmPassword')
const errorConfirmPassword = document.getElementById('errorConfirmPassword')

// Lors de la saisie vérifie les champs
password.addEventListener('input', (event) => {
    const passwordValue = event.target.value;

    // Test de la longueur minimale du mot de passe
    if (passwordValue.length < 10) {
        errorPassword.innerText = 'Le mot de passe doit contenir 10 caractères ou plus';
    } else {
        // Test de l'expression régulière pour la validation du mot de passe
        if (!passwordRegex.test(passwordValue)) {
            errorPassword.innerText = 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.';
        } else {
            errorPassword.innerText = '';
        }
    }
});

// Vérification de la correspondance entre le mot de passe et sa confirmation
confirmPassword.addEventListener('input', (event) => {
    const confirmPasswordValue = event.target.value;
    const passwordValue = password.value;

    if (confirmPasswordValue !== passwordValue) {
        errorConfirmPassword.innerText = 'Les mots de passe ne correspondent pas.';
    } else {
        errorConfirmPassword.innerText = '';
    }
});


// Expression régulière pour valider E-mail
const regexEmail = /^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$/

const email = document.getElementById('email')
const errorEmail = document.getElementById('errorEmail')
const confirmEmail = document.getElementById('confirmEmail')
const errorConfirmEmail = document.getElementById('errorConfirmEmail')


// Vérifie l'expression régulière de l'email
email.addEventListener('input', (event) => {
    if (!regexEmail.test(event.target.value)) {
        errorEmail.innerText = 'Le format de l\'E-mail est incorrect'
    } else {
        errorEmail.innerText = ''
    }
});


// Pour confirmation email
confirmEmail.addEventListener('input', (event) => {
    const confirmEmailValue = event.target.value;
    const emailValue = email.value;

     // Vérification de la correspondance entre l'E-mail et sa confirmation
     if (confirmEmailValue !== emailValue) {
        errorConfirmEmail.innerText = 'Les adresses E-mail ne correspondent pas.';
    } else {
        errorConfirmEmail.innerText = '';
    }
});


// Lors de l'inscription, vérifie si les champs sont respectés
inscriptionForm.addEventListener('submit', (event) => {
    const passwordValue = password.value;
    const confirmPasswordValue = confirmPassword.value;
    const emailValue = email.value;
    const confirmEmailValue = confirmEmail.value;

    // Empêcher la soumission du formulaire si le mot de passe, sa confirmation et l'E-mail ou sa confirmation ne respectent pas les critères
    if (!passwordRegex.test(passwordValue) || confirmPasswordValue !== passwordValue || !regexEmail.test(emailValue) || confirmEmailValue !== emailValue) {
        event.preventDefault();
        alert('Veuillez vérifier les champs du formulaire.');
    }
});


// Pour validation identifiant
const identifiant = document.getElementById('identifiant')
const errorIdentifiant = document.getElementById('errorIdentifiant')


function validIdentifiant(value) {
    if (value ==='') {
        return'l\'identifiant est obligatire'
    }
    return ''
};

identifiant.addEventListener('input', (event) => {
    const errorMessage = validIdentifiant(event.target.value);
    errorIdentifiant.innerText = errorMessage
});


