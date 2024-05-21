<?php
  function dbRequestMesRdv($conn){
    session_start();
    if ( $_SESSION['mail'] != ""){

      $requete = $conn->prepare('SELECT r.adresse_email, rv.date, rv.heure, m.nom, m.specialite, m.localisation FROM medecin m, reserver r, rendez_vous rv WHERE r.id_rendez_vous = rv.id_rendez_vous AND m.id_medecin = rv.id_medecin AND r.adresse_email = :email ORDER BY rv.date, rv.heure, m.nom ;');
      $requete->bindParam(':email', $_SESSION['mail']);
      $requete->execute();
      $rdv = $requete->fetchAll();

      return $rdv;
  
    } else {
      return "[{\"echec\" : 1, \"0\" : 1}]";
    }
  }
?>