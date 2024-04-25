// Récupération des lieu et spécialité disponible
getSpeDoc();
getLieuDoc();

// AddEvent
let b = document.getElementById('bouton_recherche');
b.addEventListener('click', function(event){
    event.preventDefault();
    getRdv();
})

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
    console.log(reponse);
    if (reponse.length == 0){
        document.getElementById("carte").innerHTML = '';
    } else {
        let n = reponse.length;
        let poulpe; // Poulpe contient toute les informations du médecin
        let texte = '' ;

        let bobby = document.getElementById("carte"); // Bobby représent le conteneur html qui contient les différentes carte

        for ( let i = 0; i < n; i ++ ){

            poulpe = reponse[i];

            texte += "<div class=\"card\" style=\"width: 18rem;\">";
            texte += "  <div class=\"card-body\">";
            texte += "    <h5 class=\"card-title\">Rendez vous avec Dr." + poulpe["0"] + " " + poulpe["1"] + "</h5>";
            texte += "    <p class=\"card-text\">À " + poulpe["3"] + "<br>Le " + poulpe["4"] + " à " + poulpe["5"] + "<br>specialiste en " + poulpe["2"] + "</p>";
            texte += "    <form method=\"post\"><input type=\"hidden\" value=" + poulpe["5"] + " name=\"reservation\"><button class=\"btn btn-primary\" type=\"submit\">prendre ce rendez-vous</a></form>";
            texte += "  </div>";
            texte += "</div>";

            bobby.innerHTML = texte ;

        }

        let liste_rdv = document.getElementsByName('reservation');
        liste_rdv.forEach(element => {
            element.addEventListener('click', function(event){
                event.preventDefault();
                addRdv();
            })
        });
    }
}

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

function addRdv() {
    
}