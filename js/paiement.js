function paiement() {
    var prenom = document.getElementById("c_fname");
    var nom = document.getElementById("c_lname");
    var email = document.getElementById("c_email");
    var selected = document.getElementById('nul').value

    // si aucune(s) information(s) n'est saisies
    if (prenom.value == "" && nom.value == "" && email.value == "" && password1.value == "" && password2.value == "") {
        window.alert("Veuillez remplir les informations pour vous inscrire");
        return false;
    }

    // vérification de saisie pour le prénom
    if (prenom.value == "") {
        window.alert("Veuillez saisir un prénom valide");
        /* donne le focus à l'élément spécifié */
        prenom.focus();
        return false;
    }
    // verification de saisie pour le nom
    if (nom.value == "") {
        window.alert("Veuillez saisir un nom valide");
        nom.focus();
        return false;
    }
    // vérification de saisie pour l'email
    if (email.value == "") {
        window.alert("Veuillez saisir une adresse e-mail valide");
        email.focus();
        return false;
    }
    // vérification de saisie pour le pays
    if (selected == "0") {
        alert("Veuillez renseigner votre pays");
        return false;
    }
    // Recharge la page actuelle une fois le message envoyé
    document.location.reload(true);
}
