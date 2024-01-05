<!DOCTYPE html>
<html>

    <head>
        <title>Projet PHP - CIR2 - Inscription</title>
        <meta charset = "utf-8">

        <link rel="stylesheet" href="../CSS/inscription.css">
        <link rel="stylesheet" href="../CSS/header.css">
        <link rel="stylesheet" href="../CSS/footer.css">

        <!--Responsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="style.css">-->
        <!--<script src="pouple.js"</script>-->
    </head>

    <body>

        <header>

            <ul class="nav">
                <!--<li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>-->
                <li class="nav-item">
                  <a class="nav-link" href="accueil.html">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="recherche.html">Recherche</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="rendez_vous.html">Rendez-Vous</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="inscription.html">Inscrire</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="authentification.html">Connexion</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>-->
            </ul>

        </header>

        <main>

            <div id="form_insciption">

                <h1>Inscription</h1>

                <form>
                    <div class="ligne_form">
                        <label for="formGroupExampleInput">Nom</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nom">
                    </div>
                    <div class="ligne_form">
                        <label for="formGroupExampleInput2">Prenom</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Prénom">
                    </div>
                    <div class="ligne_form">
                        <label for="formGroupExampleInput">Telephone</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Téléphone">
                    </div>
                    <div class="ligne_form">
                        <label for="formGroupExampleInput2">Adresse Mail</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Adresse Mail">
                    </div>
                    <div class="ligne_form">
                        <label for="formGroupExampleInput">Adresse Mail</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Adresse Mail ( Vérification )">
                    </div>
                    <div class="ligne_form">
                        <label for="formGroupExampleInput2">Mot de Passe</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mot de Passe">
                    </div>
                    <div class="ligne_form">
                        <label for="formGroupExampleInput">Mot de Passe</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Mot de Passe ( Vérification )">
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>

                </form>

                <a href="authentification.html">J’ai déjà un compte !</a>
            
            </div>

        </main>

        <footer>

            <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="https://www.linkedin.com/in/valentin-dronne-4063ab261/" target="_blank">Valentin DRONNE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.linkedin.com/in/lisa-crusson-69158122b/" target="_blank">Lisa CRUSSON</a>
                </li>
            </ul>
  
        </footer>

    </body>

</html>