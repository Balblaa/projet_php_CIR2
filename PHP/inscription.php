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
        //dire que l'adresse mail est déjà utiliser
        echo '<script language="Javascript">
        alert("Cet adresse mail est déjà utiliser par un autre compte")
        </script>';
      } else {
        //laisser le gens créer son compte
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