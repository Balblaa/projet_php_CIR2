<!DOCTYPE html>
<html>

    <head>
        <title>Projet PHP - CIR2 - Recherche</title>
        <meta charset = "utf-8">

        <link rel="stylesheet" href="../CSS/recherche.css">
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
                  <a class="nav-link" href="/PHP/accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/PHP/recherche.php">Recherche</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/PHP/rendez_vous.php">Rendez-Vous</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/PHP/inscription.php">Inscrire</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/PHP/authentification.php">Connexion</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>-->
            </ul>

        </header>

        <main>

            <form id="recherche" method="post">

                <div class="container-fluid">
                    <label>spécialitée :</label>
                    <select class="custom-select custom-select-sm">
                        <option value="1">allergologie </option>
                        <option value="2">anesthésiologie</option>
                        <option value="3">andrologie</option>
                        <option value="4">cardiologie</option>
                        <option value="5">chirurgie</option>
                        <option value="6">psychiatrie</option>
                        <option value="7">radiologie</option>
                        <option value="8">rhumatologie</option>
                        <option value="9">neurologie</option>
                        <option value="10">gynécologie</option>
                    </select>
                </div>

                <div class="container-fluid">
                    <label>Lieu du rendez vous :</label>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>

            </form>

            <br><br>
            <div>

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

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