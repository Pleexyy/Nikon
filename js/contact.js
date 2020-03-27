function validation() {
    var email = document.getElementById("c_email");
    var sujet = document.getElementById("c_subject");
    var message = document.getElementById("c_message");

    // si aucune(s) information(s) n'est saisies
    if (email.value == "" && sujet.value == "" && message.value == "") {
        window.alert("Veuillez remplir le formulaire");
        return false;
    }
    // vérification de saisie pour l'email
    if (email.value == "") {
        window.alert("Veuillez saisir une adresse e-mail valide");
        email.focus();
        return false;
    }
    // vérification de saisie pour le sujet
    if (sujet.value == "") {
        window.alert("Veuillez indiquer un sujet valide");
        sujet.focus();
        return false;
    }
    // vérification de saisie pour le message
    if (message.value == "") {
        window.alert("Veuillez indiquer un message valide");
        message.focus();
        return false;
    }
}
