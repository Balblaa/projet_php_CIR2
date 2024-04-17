// Récupération des lieu et spécialité disponible
getSpeDoc();
getLieuDoc();

// AddEvent
let b = document.getElementById('bouton_recherche');
b.addEventListener('click', getRdv())

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

function displayRdv(reponse) {

    console.log("Prout");

    let n = reponse.length;
    let poulpe;
    let texte = '' ;

    let add = document.getElementById("carte")[0];

    for ( let i = 0; i < n; i ++ ){

        let bobby = add.appendChild();

        poulpe = reponse[i];
        texte = texte + '<div id="card_prendre_rdv"\n';
        texte = texte + '    <p>' + poulpe["0"] + poulpe["1"] + '<br><br>' + poulpe["2"] + '<br>' + poulpe["3"] + '<br><br>' + poulpe["4"] + '<br>' + poulpe["5"] + '</p>';
        texte = texte + '    <button type="button" id="boutbouton">Prendre rendez-vous</button>';
        texte = texte + '</div>';

        bobby.innerHTML = texte ;

    }

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