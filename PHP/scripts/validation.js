/**
 * Validation des données de la page deux (commentaires)
 * @returns {boolean}
 */
function validateForm(){

    // 1. email
    // https://www.w3resource.com/javascript/form/email-validation.php
    var email = document.forms["form_comAjouter"]["email"].value;
    if ( !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) )
    {
        alert("Vous avez entré une adresse email invalide!");
        return false;
    }


    // 2. commentaire
    var commentaire = document.forms["form_comAjouter"]["commentaire"].value;
    if ( commentaire.length < 5 )
    {
        alert("Il faut écrire un commentaire.");
        return false;
    }


    // 3. note
    // https://www.w3schools.com/js/tryit.asp?filename=tryjs_validation_number
    var note = document.forms["form_comAjouter"]["note"].value;
    if ( isNaN(note) || note < 1 || note > 10) {
        alert("Il faut entre une note entre 1 et 10");
        return false;
    }

    return true;
}