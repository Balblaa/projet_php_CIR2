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
            <a class="nav-link" href="/HTML/accueil.html">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/HTML/recherche.html">Recherche</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/HTML/rendez_vous.html">Rendez-Vous</a>
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

          <div id="form_insciption">

              <h1>Inscription</h1>

              <form action="inscription.html" method="post">
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

                  <button type="submit" class="btn btn-primary">Valider</button>
              
              </form>

              <a href="../PHP/authentification.php">J’ai déjà un compte !</a>
          
          </div>

          <?php
            include "../DB/database.php";
            $conn = dbConnect();

            if(!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['Telephone']) && !empty($_POST['Mail']) && !empty($_POST['Mdp'])){
              if($_POST['Mail'] == $_POST['Mail_verif'] && $_POST['Mdp'] == $_POST['Mdp_verif']){

                $verification = $conn->prepare('SELECT telephone FROM utilisateur WHERE adresse_email = :email');
                $verification->bindParam(':email', $_POST['Mail']);
                $verification->execute();
                $tel_email = $verification->fetchAll()[0][0]; 

                if ($tel_email != null){
                  // dire que l'adresse mail est déjà utiliser
                  echo '<script language="Javascript">
                  alert("Cet adresse mail est déjà utiliser par un autre compte")
                  </script>';
                } else {
                  // laisser le gens créer son compte
                  echo '<script language="Javascript">
                  alert("Vous êtes bien incris ! Bienvenue sur Doctopus ! :D")
                  </script>';
                  $request = $conn->prepare("INSERT INTO utilisateur (nom, prenom, telephone, adresse_email, mot_de_passe) VALUES (:nom, :prenom, :telephone, :adresse_email, :mot_de_passe)");
                  $request->bindParam(':nom', $_POST['Nom']);
                  $request->bindParam(':prenom', $_POST['Prenom']);
                  $request->bindParam(':telephone', $_POST['Telephone']);
                  $request->bindParam(':adresse_email', $_POST['Mail']);
                  $request->bindParam(':mot_de_passe', $_POST['Mdp']);
                  $request->execute();
                  $_POST['Nom'] = "";
                  $_POST['Prenom'] = "";
                  $_POST['Telephone'] = "";
                  $_POST['Mail'] = "";
                  $_POST['Mdp'] = "";
                }
              }
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

