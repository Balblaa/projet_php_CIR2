<!DOCTYPE html>
<html>

    <head>
        <title>Projet PHP - CIR2 - Rendez-vous</title>
        <meta charset = "utf-8">

        <link rel="stylesheet" href="../CSS/rendez_vous.css">
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

            <?php
              session_start();
              include "../DB/database.php";
              $conn = dbConnect();

              if ( $_SESSION['mail'] != ""){

                $requete = $conn->prepare('SELECT r.adresse_email, rv.date, rv.heure, m.nom, m.specialite, m.localisation FROM medecin m, reserver r, rendez_vous rv WHERE r.id_rendez_vous = rv.id_rendez_vous AND m.id_medecin = rv.id_medecin AND r.adresse_email = :email ORDER BY rv.date, rv.heure, m.nom ;');
                $requete->bindParam(':email', $_SESSION['mail']);
                $requete->execute();
                $rdv_tous = $requete->fetchAll();

                if($rdv_tous[0] != null){
                  echo "<div>";
                  foreach ($rdv_tous as $ligne) {
                    echo "<div class=\"card\" style=\"width: 18rem;\">";
                    echo "  <div class=\"card-body\">";
                    echo "    <h5 class=\"card-title\">Dr.".$ligne[3].", ".$ligne[4]." à ".$ligne[5]."</h5>";
                    echo "    <p class=\"card-text\">Rendez vous le : ".$ligne[1]." à ".$ligne[2]."</p>";
                    echo "  </div>";
                    echo "</div>";
                  }
                  echo "</div>";
                } else {
                  echo "<h2> Vous n'avez aucun rendez-vous</h2>";
                }

              } else {
                echo "<h2> Vous n'êtes pas connecté</h2>";
              }

            ?>

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