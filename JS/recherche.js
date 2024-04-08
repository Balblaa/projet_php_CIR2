//Pour lancer le tout
getSpeDoc();
getLieuDoc();

//Fonction pour ajouter les spécialités des docteurs
function displaySpeDoc(reponse){

    let n = reponse.length;
    let poulpe;
    let texte = '' ;

    let add = document.getElementsByName("specialite")[0];

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

    for ( let i = 0; i < n; i ++ ){

        poulpe = reponse[i];
        texte = texte + '<option value=' + poulpe["id_medecin"] + '>' + poulpe["localisation"] + '</option>\n';

    }

    add.innerHTML = texte ;

}

function displayRdv() {

}

function getSpeDoc() {

    ajaxRequest("GET", "../PHP/request.php/specialite", displaySpeDoc);

}

function getLieuDoc() {

    ajaxRequest("GET", "../PHP/request.php/lieu", displayLieuDoc);

}

function getRdv() {

    ajaxRequest("GET", "../PHP/request.php/rdv", displayRdv);

}