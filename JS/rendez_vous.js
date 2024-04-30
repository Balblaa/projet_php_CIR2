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
                texte += "<div class=\"card\" style=\"width: 18rem;\">";
                texte += "  <div class=\"card-body\">";
                texte += "    <h5 class=\"card-title\">Dr." + ligne[3] + ", " + ligne[4] + " à " + ligne[5] + "</h5>";
                texte += "    <p class=\"card-text\">Rendez vous le : " + ligne[1] + " à " + ligne[2] + "</p>";
                texte += "  </div>";
                texte += "</div>";
            });
            texte += "</div>";
            remplir.innerHTML = texte;
          } else {
            remplir.innerHTML = "<h2>Vous n'avez aucun rendez-vous</h2>"
          }
    }
}

function getMesRdv(){

    ajaxRequest("GET", "../PHP/request.php/mesRdv", displayMesRdv);

}