<!DOCTYPE html>
<html>

    <head>
        <title>Projet PHP - CIR2 - Authentification</title>
        <meta charset = "utf-8">

        <link rel="stylesheet" href="../CSS/authentification.css">
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

            <div id="form_connexion">

                <h1>Authentification</h1>

                <form action="authentification.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <a href="inscription.html">Pas de compte, inscrivez-vous !</a>

            </div>

        </main>

        <?php
        
        $mail = $_POST['email'];
        $mdp = $_POST['password'];

        $requete = $conn->prepare("SELECT Prenom FROM Utilisateur WHERE Adresse_Email = :email AND mot_de_passe = :motdp;");
        $requete->bindParam(':email', $mail);
        $requete->bindParam(':motdp', $mdp);
        $requete->execute();

        echo "Bonjour : ".$requete ;

        ?>

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