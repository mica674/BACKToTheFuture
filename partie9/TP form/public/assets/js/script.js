// Ciblage d'éléments
const inputsRadio = document.querySelectorAll('.formRadio');
const validateBtn = document.getElementById('registrerBtn');
const passwords = document.querySelectorAll('.inputPassword');
const password = passwords[0];
const confirmedPassword = passwords[1];

// Rendre cliquable le bouton s'inscrire dès qu'un choix est fait sur le groupe de input RADIO
inputsRadio.forEach(inputRadio => {
    inputRadio.addEventListener('click', () => {
        validateBtn.disabled = false;
    });
});

passwords.forEach(password => {
    // Ecouteur d'événements change sur les 2 inputs PASSWORD
    password.addEventListener('change', (e) => {
        if (!password.value == '' && !confirmedPassword == '') {
            passwords.forEach(password => {
                // Retrait des class background rouge et vert
                password.classList.remove('bgRed');
                password.classList.remove('bgGreen');
            });
            
            if ((password.value != '') && (password.value == confirmedPassword.value)) {
                passwords.forEach(password => {
                    // Retrait des class background rouge
                    password.classList.add('bgGreen');
                });
                
            } else {
                // Ajout d'une class background rouge si les 2 password sont différents
                passwords.forEach(password => {
                    // Retrait des class background rouge
                    password.classList.add('bgRed');
                });
            }
        }
        else{
            e.preventDefault();
        }
    })
});