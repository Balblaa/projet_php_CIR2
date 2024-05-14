function DisplayAccueil(){
    document.getElementById("main").innerHTML = `
        <div class="doctopus">
            <div class="card-body">
                <h1>BIENVENUE sur Doct’opus</h1>
            </div>
        </div>

        <nav class="recherche">
            <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="doctopus">
            <div class="card-body">
                This is some text within a card body.
            </div>
        </div>
    `;
}

function DisplayRecherche(){
    document.getElementById("main").innerHTML = `
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

        </div>
    `;
    getSpeDoc();
    getLieuDoc();
}

function DisplayRendezVous(){
    document.getElementById("main").innerHTML = '<div id="content"></div>';
    getMesRdv();
}