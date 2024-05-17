<?php
function dbAddUser($conn,  $nom, $prenom, $telephone, $mail, $mdp, $mailVerif, $mdpVerif){
  $verification = $conn->prepare('SELECT telephone FROM utilisateur WHERE adresse_email = :email');
  $verification->bindParam(':email', $mail);
  $verification->execute();
  $tel_email = $verification->fetch(); 

  if ($tel_email != null){
    // dire que l'adresse mail est déjà utiliser
    return "[{\"reussi\" : 0, \"0\" : 0}]";
  } else {
    // laisser le gens créer son compte
    $request = $conn->prepare("INSERT INTO utilisateur (nom, prenom, telephone, adresse_email, mot_de_passe) VALUES (:nom, :prenom, :telephone, :adresse_email, :mot_de_passe)");
    $request->bindParam(':nom', $nom);
    $request->bindParam(':prenom', $prenom);
    $request->bindParam(':telephone', $telephone);
    $request->bindParam(':adresse_email', $mail);
    $request->bindParam(':mot_de_passe', $mdp);
    $request->execute();
    return "[{\"reussi\" : 1, \"0\" : 1}]";
  }
}
?>