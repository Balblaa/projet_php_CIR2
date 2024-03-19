//Pour lancer le tout
getSpeDoc();
getLieuDoc();
getGenreDoc();

//Fonction pour ajouter les spécialités des docteurs
function displaySpeDoc(reponse){

    let n = reponse.length;
    let poulpe ;
    let texte = '' ;

    let add = document.getElementsByName("specialite");

    for ( let i = 0; i < n; i ++ ){

        poulpe = reponse[i];
        console.log(poulpe["specialite"]);
        texte = texte + '<option value=' + poulpe["id_medecin"] + '>' + poulpe["specialite"] + '</option>\n';

    }

    console.log(texte);
    add.innerHTML = texte ;

}

//Fonction pour ajouter les lieux des docteurs
function displayLieuDoc(reponse){

    let n = reponse.length;
    let poulpe ;
    let texte = '' ;

    let add = document.getElementsByName("lieu");

    for ( let i = 0; i < n; i ++ ){

        poulpe = reponse[i];
        console.log(poulpe["lieu"]);
        texte = texte + '<option value=' + poulpe["id_medecin"] + '>' + poulpe["lieu"] + '</option>\n';

    }

    console.log(texte);
    add.innerHTML = texte ;

}

//Fonction pour ajouter le genre des docteurs
function displayGenreDoc(reponse){

    let n = reponse.length;
    let poulpe ;
    let texte = '' ;
    let txt = '' ;

    let add = document.getElementsByName("genre");

    for ( let i = 0; i < n; i ++ ){

        poulpe = reponse[i];
        console.log(poulpe["genre"]);

        if ( poulpe["genre"] == 0){
            txt = "Homme";
        }
        else {
            txt = "Femme";
        }

        texte = texte + '<option value=' + poulpe["id_medecin"] + '>' + txt + '</option>\n';

    }

    console.log(texte);
    add.innerHTML = texte ;

}

function getSpeDoc() {

    ajaxRequest("GET", "../PHP/request.php?request=specialite" , displaySpeDoc);

}

function getLieuDoc() {

    ajaxRequest("GET", "../PHP/request.php?request=lieu", displayLieuDoc);

}

function getGenreDoc() {

    ajaxRequest("GET", "../PHP/request.php?request=genre", displayGenreDoc);

}