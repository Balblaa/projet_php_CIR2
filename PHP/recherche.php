<?php
  //php pour trouvé afficher les reservation disponible a partir des demande du client
function dbRequestMedic($conn, $spe, $lieu){
  session_start();
  $requete = $conn->prepare('SELECT m.nom, m.prenom, m.specialite, rdv.date, rdv.heure, rdv.id_rendez_vous FROM medecin m JOIN rendez_vous rdv ON m.id_medecin = rdv.id_medecin WHERE m.specialite=:specialite AND m.localisation=:lieu AND rdv.disponible = \'1\'');
  $requete->bindParam(':specialite', $spe);
  $requete->bindParam(':lieu', $lieu);
  $requete->execute();
  $info = $requete->fetchAll();
  return $info;
}

function dbRequestspe($conn){
  $requete = $conn->prepare('SELECT DISTINCT specialite FROM medecin ORDER BY specialite ASC');
  $requete->execute();
  $info = $requete->fetchAll();
  return $info;
}

function dbRequestLieu($conn){
  $requete = $conn->prepare('SELECT DISTINCT localisation FROM medecin ORDER BY localisation ASC');
  $requete->execute();
  $info = $requete->fetchAll();
  return $info;
}
/*
  foreach ($info as $ligne) {
    echo "<div class=\"card\" style=\"width: 18rem;\">";
    echo "  <div class=\"card-body\">";
    echo "    <h5 class=\"card-title\">Rendez vous avec Dr.".$ligne[0]."</h5>";
    echo "    <p class=\"card-text\">Dr.".$ligne[0]." ".$ligne[1]."<br>Le ".$ligne[3]." à ".$ligne[4]."<br>specialiste en ".$ligne[2]."</p>";
    echo "    <form method=\"post\"><input type=\"hidden\" value=".$ligne[5]." name=\"reservation\"><button class=\"btn btn-primary\" type=\"submit\">prendre ce rendez-vous</a></form>";
    echo "  </div>";
    echo "</div>";
  }

  //php pour attribuer une réservation à un utilisateur

  $id = $_POST['reservation'];
  if($id != "" && $_SESSION['mail'] != ""){
    // le rendez_vous n'est plus disponible
    $requete = $conn->prepare('UPDATE rendez_vous SET disponible = \'0\' WHERE id_rendez_vous = :id');
    $requete->bindParam(':id', $id);
    $requete->execute();

    // on lie dans les reserves le rendez_vous et l'utilisateur
    $requete = $conn->prepare('INSERT INTO reserver (id_rendez_vous, adresse_email) VALUES (:id_rdv, :adresse)');
    $requete->bindParam(':id_rdv', $id);
    $requete->bindParam(':adresse', $_SESSION['mail']);
    $requete->execute();

    echo '<script language="Javascript">
    alert("Vous avez réserver un rendez_vous")
    </script>';

  } else {
    if ($id != "" && $_SESSION['mail'] == ""){
      echo '<script language="Javascript">
      alert("Connecter vous avant de réserver")
      </script>'; 
    }
  }*/
?>