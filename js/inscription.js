function inscription() {
    var prenom = document.getElementById("c_fname");
    var nom = document.getElementById("c_lname");
    var email = document.getElementById("c_email");
    var password1 = document.getElementById("c_password");
    var password2 = document.getElementById("c_password2");

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

    // vérification de saisie pour le mot de passe
    if (password1.value == "") {
        window.alert("Veuillez saisir un mot de passe valide");
        email.focus();
        return false;
    }

    // vérification de saisie pour la confirmation du mot de passe
    if (password2.value == "") {
        window.alert("Veuillez confirmer votre mot de passe");
        email.focus();
        return false;
    }

    // Si les mots de passe ne correspondent pas, retourne false     
    if (password1.value != password2.value) {
        window.alert("Les mots de passe ne correspondent pas, veuillez réessayer...");
        return false;
    }
}
