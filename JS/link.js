DisplayAccueil()

function DisplayAccueil(){
    document.getElementById("main").innerHTML = `
        <div class="doctopus">
            <div class="card-body">
                <h1>BIENVENUE sur Doct’Opus</h1>
            </div>
        </div>

        <nav class="recherche">
            <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button id="prout" type="submit" onclick="DisplayRecherche()">Search</button>
                </form>
            </div>
        </nav>

        <div class="doctopus">
            <div class="card-body">
                <p>Doct'Opus vous permet de trouver et de réserver facilement un rendez-vous avec un professionnel de santé près de chez vous.
                <br>Découvrez les services, les engagements et l'application de Doct'Opus pour gérer votre santé et celle de vos proches.</p>
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
                <label>Lieu : </label>
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
                <button type="button" id="bouton_recherche" onclick="getRdv()">Search</button>
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

function DisplayInscription(){
    document.getElementById("main").innerHTML = `
    <div id="form_insciption">

        <h1>Inscription</h1>

        <div class="ligne_form">
            <label for="formGroupExampleInput">Nom</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nom" name="Nom" >
        </div>
        <div class="ligne_form">
            <label for="formGroupExampleInput2">Prenom</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Prénom" name="Prenom" >
        </div>
        <div class="ligne_form">
            <label for="formGroupExampleInput">Telephone</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Téléphone" name="Telephone" >
        </div>
        <div class="ligne_form">
            <label for="formGroupExampleInput2">Adresse Mail</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Adresse Mail" name="Mail" >
        </div>
        <div class="ligne_form">
            <label for="formGroupExampleInput">Adresse Mail</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Adresse Mail ( Vérification )" name="Mail_verif">
        </div>
        <div class="ligne_form">
            <label for="formGroupExampleInput2">Mot de Passe</label>
            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Mot de Passe" name="Mdp">
        </div>
        <div class="ligne_form">
            <label for="formGroupExampleInput">Mot de Passe</label>
            <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Mot de Passe ( Vérification )" name="Mdp_verif">
        </div>

        <button type="button" class="btn btn-primary" onclick="addUser()">Valider</button>
        

        <button class="bobby" type="button" onclick="DisplayConnexion()">J’ai déjà un compte !</button>
    
    </div>
    `;
}

function DisplayConnexion(){
    document.getElementById("main").innerHTML = `
    <div id="form_connexion">

        <h1>Authentification</h1>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" >
            <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <!--<div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>-->
        <button type="button" id="boumit", onclick=connectUser()>Submit</button> <!--boumit le bouton qui submit-->

        <button class="bobby" type="button" onclick="DisplayInscription()">Pas de compte, inscrivez-vous !</button>
        
    </div>
    `;
}