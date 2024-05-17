function ConnectionSucces(reponse){
    succes = reponse[0]["reussi"];  
    // reponse : 0 => échec de la connection
    // reponse : 1 => réussite de la connection

    if(succes){
        alert("vous êtes connecté.")
        DisplayRendezVous();
        buttonConnexion = document.getElementById("header_connection");
        buttonConnexion.innerHTML = `<button class="nav-link" type="button" onclick="Disconnect()">Déconnexion</button>`
    }
    else{
        alert("mauvais mot de passe ou identifiant");
    }

}

function displayButtonConnect(reponse){
    succes = reponse[0]["reussi"]; 
    if(succes){
        buttonConnexion = document.getElementById("header_connection");
        buttonConnexion.innerHTML = `<button class="nav-link" type="button" onclick="DisplayConnexion()">Connexion</button>`
        DisplayConnexion();
    }
}

function Disconnect(){
    ajaxRequest("POST", "../PHP/request.php/DisconnectUser", displayButtonConnect);
}

function connectUser(){

    $mail = document.getElementsByName("email")[0].value;
    $mdp = document.getElementsByName("password")[0].value;
    if($mdp != "" && $mail != ""){
        ajaxRequest("POST", "../PHP/request.php/ConnectUser", ConnectionSucces, 
            "mail="+$mail
            + "&mdp="+$mdp
        );
    }

}