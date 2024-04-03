<?php
  session_start();
  include "../DB/database.php";
  $conn = dbConnect();

  function displayRdv(){
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
  }
 

?>