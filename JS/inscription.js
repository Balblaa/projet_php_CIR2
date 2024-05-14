function displaySucces_addUser(reponse){
    reponse = reponse[0]["reussi"];
    // reponse : 0 => échec de l'inscription
    // reponse : 1 => réussite de l'inscription

    if (reponse == 1){
        alert("Vous avez bien été inscri");
    } else{
        if (reponse == 0){
            alert("cette adresse email existe déjà");
        }
    }
}

function addUser(){

    $nom = document.getElementsByName("Nom")[0].value;
    $prenom = document.getElementsByName("Prenom")[0].value;
    $telephone = document.getElementsByName("Telephone")[0].value;
    $mail = document.getElementsByName("Mail")[0].value;
    $mail_verif = document.getElementsByName("Mail_verif")[0].value;
    $mdp = document.getElementsByName("Mdp")[0].value;
    $mdp_verif = document.getElementsByName("Mdp_verif")[0].value;
    if($nom != "" && $prenom != "" && $telephone != "" && $mail != "" && $mdp != ""){
        if($mail == $mail_verif && $mdp == $mdp_verif){
            ajaxRequest("POST", "../PHP/request.php/addUser", displaySucces_addUser, 
            "Nom="+$nom 
            + "&Prenom="+$prenom 
            + "&Telephone="+$telephone
            + "&Mail="+$mail 
            + "&MailVerif="+$mail_verif 
            + "&Mdp="+$mdp 
            + "&MdpVerif="+$mdp_verif);
        }
    }
}