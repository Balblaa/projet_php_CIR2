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

            <div>

                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </nav>

                <select class="custom-select custom-select-sm">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <select class="custom-select custom-select-sm">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <select class="custom-select custom-select-sm">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

            </div>

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