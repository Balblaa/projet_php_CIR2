// Récupération des lieu et spécialité disponible
getSpeDoc();
getLieuDoc();

//Fonction pour ajouter les spécialités des docteurs
function displaySpeDoc(reponse){

    let n = reponse.length;
    let poulpe;
    let texte = '' ;

    let add = document.getElementsByName("specialite")[0];

    texte = '<option value="tous">-----</option>\n';

    for ( let i = 0; i < n; i ++ ){

        poulpe = reponse[i];
        texte = texte + '<option value=' + poulpe["specialite"] + '>' + poulpe["specialite"] + '</option>\n';

    }

    add.innerHTML = texte ;

}

//Fonction pour ajouter les lieux des docteurs
function displayLieuDoc(reponse){

    let n = reponse.length;
    let poulpe;
    let texte = '' ;

    let add = document.getElementsByName("lieu")[0];

    texte = '<option value="tous">-----</option>\n';
    
    for ( let i = 0; i < n; i ++ ){

        poulpe = reponse[i];
        texte = texte + '<option value=' + poulpe["localisation"] + '>' + poulpe["localisation"] + '</option>\n';

    }

    add.innerHTML = texte ;

}

function displayRdv(reponse) {
    if (reponse.length == 0){
        document.getElementById("carte").innerHTML = '';
    } else {
        let n = reponse.length;
        let poulpe; // Poulpe contient toute les informations du médecin
        let texte = '' ;

        let bobby = document.getElementById("carte"); // Bobby représent le conteneur html qui contient les différentes carte

        for ( let i = 0; i < n; i ++ ){

            poulpe = reponse[i];

            texte += "<div class=\"card\" style=\"width: 18rem; margin-top: 10px; margin-bottom: 5px;\">";
            texte += "  <div class=\"card-body\">";
            texte += "    <h5 class=\"card-title\">Rendez vous avec Dr." + poulpe["0"] + " " + poulpe["1"] + "</h5>";
            texte += "    <p class=\"card-text\">À " + poulpe["3"] + "<br>Le " + poulpe["4"] + " à " + poulpe["5"] + "<br>specialiste " + poulpe["2"] + "</p>";
            texte += "    <form method=\"POST\"><button class=\"bobby\" value=" + poulpe["6"] + " name=\"reservation\" type=\"submit\">prendre ce rendez-vous</button></form>";
            texte += "  </div>";
            texte += "</div>";

            bobby.innerHTML = texte ;

        }
        
        let liste_rdv = document.getElementsByName('reservation');
        liste_rdv.forEach(element => {
            element.addEventListener('click', function(event){
                event.preventDefault();
                addRdv(element.value);
            })
        });
    }
}

function rdvReserver(reponse) {
    reponse = reponse[0]["reussi"];
    // reponse : 0 => échec de la reservation (utilisateur non connecter)
    // reponse : 1 => réussite de la réservation

    if (reponse == 1){
        alert("Votre rendez vous a été rajouter avec succès !");
    } else{
        if (reponse == 0){
            alert("Vous n'êtes pas connecté !!");
        }
    }

    getRdv();
}

// AjaxRequest

function getSpeDoc() {

    ajaxRequest("GET", "../PHP/request.php/specialite", displaySpeDoc);

}

function getLieuDoc() {

    ajaxRequest("GET", "../PHP/request.php/lieu", displayLieuDoc);

}

function getRdv() {

    // Récupérationes information recherché
    specialite = document.getElementsByName("specialite")[0];
    lieu = document.getElementsByName("lieu")[0];
    genre = document.getElementsByName("genre")[0];
    nom = document.getElementsByName("nom")[0];

    // Requête
    let requete = "?specialite=" + specialite.value + "&lieu=" + lieu.value + "&genre=" + genre.value + "&nom=" + nom.value;
    ajaxRequest("GET", "../PHP/request.php/rdv" + requete, displayRdv);

}

function addRdv(idRdv) {

    ajaxRequest("POST", "../PHP/request.php/prendreRdv", rdvReserver, "idRdv=" + idRdv);

}