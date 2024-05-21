getMesRdv();

function displayMesRdv(reponse){
    remplir = document.getElementById('content');
    if(reponse[0]['echec']){
        remplir.innerHTML = "<h2>Vous n'êtes pas connecté</h2>"
    }else{
        if(reponse[0] != null){
            texte = ""
            texte += "<div>";
            reponse.forEach(ligne => {
                texte += "<div class=\"card\" style=\"width: 18rem; margin-top: 10px; margin-bottom: 5px;\">";
                texte += "  <div class=\"card-body\">";
                texte += "    <h5 class=\"card-title\">Dr." + ligne[3] + ", " + ligne[4] + " à " + ligne[5] + "</h5>";
                texte += "    <p class=\"card-text\">Rendez vous le : " + ligne[1] + " à " + ligne[2] + "</p>";
                texte += "    <form method=\"GET\"><button class=\"bobby\" value=" + ligne[3] + " name=\"reserver\" type=\"submit\">reprendre un rendez-vous ?</button></form>"
                texte += "  </div>";
                texte += "</div>";
            });
            texte += "</div>";
            remplir.innerHTML = texte;

            let liste_rdv = document.getElementsByName('reserver');
            liste_rdv.forEach(element => {
            element.addEventListener('click', function(event){
                event.preventDefault();
                getToRdvMedecin(element.value);
                })
            });
          } else {
            remplir.innerHTML = "<h2>Vous n'avez aucun rendez-vous</h2>"
          }
    }
}

function displayRdvMed(reponse){

    document.getElementById('main').innerHTML = `
    <form id="recherche" method="get">

    <div class="container-fluid">
        <label>spécialitée :</label>
        <select class="custom-select custom-select-sm" name="specialite">
        </select>
    </div>
    <div class="container-fluid">
      <label>Lieu :</label>
      <select class="custom-select custom-select-sm" name="lieu">

      </select>
  </div>

  <div class="container-fluid">
    <label>Genre :</label>
    <select class="custom-select custom-select-sm" name="genre">
      <option value="2">-----</option>
      <option value="0">Femme</option>
      <option value="1">Homme</option>
    </select>
    </div>

    <div class="container-fluid">
        <label>Nom du médecin</label>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nom">
        <button class="btn btn-outline-success" type="button" id="bouton_recherche" onclick="getRdv()">Search</button>
    </div>

    </form>

    <br><br><br>

    <div id="carte">

    </div>`;
    getSpeDoc();
    getLieuDoc();

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
            texte += "    <p class=\"card-text\">À " + poulpe["3"] + "<br>Le " + poulpe["4"] + " à " + poulpe["5"] + "<br>specialiste " + poulpe["2"] + "</p>";
            texte += "    <form method=\"POST\"><button class=\"btn btn-primary\" value=" + poulpe["6"] + " name=\"reservation\" type=\"submit\">prendre ce rendez-vous</a></form>";
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

function getMesRdv(){

    ajaxRequest("GET", "../PHP/request.php/mesRdv", displayMesRdv);

}

function getToRdvMedecin(nom){

    ajaxRequest("GET", "../PHP/request.php/reprendreRdv", displayRdvMed, "nom=" + nom);

}