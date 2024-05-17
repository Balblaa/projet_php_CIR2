<?php
function dbConnectUser($conn, $mail, $mdp){
  session_start();

  $requete = $conn->prepare('SELECT mot_de_passe FROM utilisateur WHERE adresse_email = :email');
  $requete->bindParam(':email', $mail);
  $requete->execute();
  $mdp_email = $requete->fetchAll()[0][0];

  if ( $mdp_email == $mdp ){ //si bon mail et mdp alors connecté

    $_SESSION['mail'] = $mail ;

    return "[{\"reussi\" : 1, \"0\" : 1}]";
  }

  else { //n'est pas connecté car mauvais mdp ou mauvaise adresse mail
    $_SESSION['mail'] = "" ;

    return "[{\"reussi\" : 0, \"0\" : 0}]";
  }
}

function dbDisconnectUser(){
  session_start();
  $_SESSION['mail'] = '';
  return "[{\"reussi\" : 1, \"0\" : 1}]";
}
?>