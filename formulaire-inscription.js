// Pour la newsletter
const register = document.getElementById('register-form');
register.addEventListener('submit', (event) => {
    event.preventDefault();

   let civility = event.target.querySelector('input[name="civility"]:checked').value; // pas d'espace pour checked sinon sa ne fonctionne pas
   let name = event.target.querySelector('#name').value;
   let firstname = event.target.querySelector('#firstname').value;
   let newsletter = event.target.querySelector('#newsletter').checked;

   let displayedCivility = civility === 'female' ? 'Mme' : 'M.'; // Si female = Mme sinon M.
   let newsletterMessage;

    if (newsletter) {
        newsletterMessage = 'Merci de vous être abonné à notre newsletter'}
        else {
            newsletterMessage = 'N\'oubliez pas de vous inscrire à notre newsletter'
        }
        alert(`Bonjour ${displayedCivility} ${name} ${firstname} ${newsletterMessage}!`)
    });

// Le mot de passe doit contenir 8 caractères ou plus
let password = document.getElementById('password')
let errorPassword = document.getElementById('errorPassword')

password.addEventListener('input', (event) => {
    if (event.target.value.length < 8) {
        errorPassword.innerText = 'le mot de passe doit contenir 8 caractères ou plus'
    } else {
        errorPassword.innerText = ''
    }
});

 //Pour confirmation mot de passe
const confirmPassword = document.getElementById('confirmPassword')
const errorConfirmPassword = document.getElementById('errorConfirmPassword')

function validatePassword(inputpassword, inputConfirmPassword) {
    if (inputpassword.value !== inputConfirmPassword.value) {
        return 'Les mots de passe ne correspondent pas';
    }
    return ''
};


confirmPassword.addEventListener('input', () => {
    const errorMessage = validatePassword(password, confirmPassword);
    errorConfirmPassword.innerText = errorMessage
});


// Expression régulière pour valider E-mail
const regexEmail = /^([0-9a-zA-Z].*?@([0-9a-zA-Z].*\.\w{2,4}))$/

const email = document.getElementById('email')
const errorEmail = document.getElementById('errorEmail')

email.addEventListener('input', (event) => {
    if (!regexEmail.test(event.target.value)) {
        errorEmail.innerText = 'Le format de l\'E-mail est incorrect'
    } else {
        errorEmail.innerText = ''
    }
});

// Pour confirmation email
const confirmEmail = document.getElementById('confirmEmail')
const errorConfirmEmail = document.getElementById('errorConfirmEmail')

function validateEmail(inputEmail, inputConfirmEmail) {
    if (inputEmail.value !== inputConfirmEmail.value) {
        return 'Les adresses E-mail ne correspondent pas';
    }
    return ''
};

confirmEmail.addEventListener('input', () => {
    const errorMessage = validateEmail(email, confirmEmail);
    errorConfirmEmail.innerText = errorMessage
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


