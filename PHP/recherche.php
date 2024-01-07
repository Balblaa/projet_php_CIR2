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
                    <select class="custom-select custom-select-sm" name="specialite">
                        <option value="allergologie">allergologie </option>
                        <option value="anesthésiologie">anesthésiologie</option>
                        <option value="andrologie">andrologie</option>
                        <option value="cardiologie">cardiologie</option>
                        <option value="chirurgie">chirurgie</option>
                        <option value="psychiatrie">psychiatrie</option>
                        <option value="radiologie">radiologie</option>
                        <option value="rhumatologie">rhumatologie</option>
                        <option value="neurologie">neurologie</option>
                        <option value="gynécologie">gynécologie</option>
                    </select>
                </div>

                <div class="container-fluid">
                    <label>Lieu du rendez vous :</label>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="lieu">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>

            </form>

            <br><br>
            <?php
                //php pour trouvé afficher les reservation disponible a partir des demande du client

                include "../DB/database.php";
                $conn = dbConnect();
                session_start();

                $requete = $conn->prepare('SELECT m.nom, m.prenom, m.specialite, rdv.date, rdv.heure, rdv.id_rendez_vous FROM medecin m JOIN rendez_vous rdv ON m.id_medecin = rdv.id_medecin WHERE m.specialite=:specialite AND m.localisation=:lieu AND rdv.disponible = \'1\'');
                $requete->bindParam(':specialite', $_POST['specialite']);
                $requete->bindParam(':lieu', $_POST['lieu']);
                $requete->execute();
                $info = $requete->fetchAll();
                echo "<div>";
                foreach ($info as $ligne) {
                  echo "<div class=\"card\" style=\"width: 18rem;\">";
                  echo "  <div class=\"card-body\">";
                  echo "    <h5 class=\"card-title\">Rendez vous avec Dr.".$ligne[0]."</h5>";
                  echo "    <p class=\"card-text\">Dr.".$ligne[0]." ".$ligne[1]."<br>Le ".$ligne[3]." à ".$ligne[4]."<br>specialiste en ".$ligne[2]."</p>";
                  echo "    <form method=\"post\"><input type=\"hidden\" value=".$ligne[5]." name=\"reservation\"><button class=\"btn btn-primary\" type=\"submit\">prendre ce rendez-vous</a></form>";
                  echo "  </div>";
                  echo "</div>";
                }
                echo "</div>";


                //php pour attribuer une réservation à un utilisateur

                $id = $_POST['reservation'];
                
                // le rendez_vous n'est plus disponible
                $requete = $conn->prepare('UPDATE rendez_vous SET disponible = \'0\' WHERE id_rendez_vous = :id');
                $requete->bindParam(':id', $id);
                $requete->execute();

                // on lie dans les reserves le rendez_vous et l'utilisateur
                $requete = $conn->prepare('INSERT INTO reserver (id_rendez_vous, adresse_email) VALUES (:id_rdv, :adresse');
                $requete = $conn->bindParam(':id', $id);
                $requete = $conn->bindParam(':adresse', )
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