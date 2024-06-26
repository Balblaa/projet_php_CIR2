<?php
  //php pour trouvé afficher les reservation disponible a partir des demande du client
function dbRequestMedic($conn, $spe, $lieu){
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

function dbRequestRdv($conn, $nom, $spe, $lieu, $genre){

  if($spe == 'tous'){
    $spe = '%'; 
  }
  if($lieu == 'tous'){
    $lieu = '%';
  }
  if($genre == 2){
    $requete = $conn->prepare('SELECT m.nom, m.prenom, m.specialite, m.localisation, r.date, r.heure, r.id_rendez_vous FROM genre g JOIN (medecin m JOIN rendez_vous r ON m.id_medecin = r.id_medecin) ON g.id_genre = m.id_genre 
    WHERE m.nom LIKE :nom AND m.specialite LIKE :specialite AND m.localisation LIKE :localisation AND r.disponible');
  } else {
    $requete = $conn->prepare('SELECT m.nom, m.prenom, m.specialite, m.localisation, r.date, r.heure, r.id_rendez_vous FROM genre g JOIN (medecin m JOIN rendez_vous r ON m.id_medecin = r.id_medecin) ON g.id_genre = m.id_genre 
    WHERE m.nom LIKE :nom AND m.specialite LIKE :specialite AND m.localisation LIKE :localisation AND g.id_genre = :genre AND r.disponible');
  }
  $nom = $nom . '%';
  $requete->bindParam(':nom', $nom);
  $requete->bindParam(':specialite', $spe);
  $requete->bindParam(':localisation', $lieu);
  
  if($genre != 2){
    $requete->bindParam(':genre', $genre);
  }

  $requete->execute();
  $info = $requete->fetchAll();
  return $info;
}

function dbRegisterRdv($conn, $idRdv){
  // pour attribuer une réservation à un utilisateur

  session_start();
  if($idRdv != "" && $_SESSION['mail'] != ""){
    // le rendez_vous n'est plus disponible
    $requete = $conn->prepare('UPDATE rendez_vous SET disponible = \'0\' WHERE id_rendez_vous = :id');
    $requete->bindParam(':id', $idRdv);
    $requete->execute();

    // on lie dans les reserves le rendez_vous et l'utilisateur
    $requete = $conn->prepare('INSERT INTO reserver (id_rendez_vous, adresse_email) VALUES (:id_rdv, :adresse)');
    $requete->bindParam(':id_rdv', $idRdv);
    $requete->bindParam(':adresse', $_SESSION['mail']);
    $requete->execute();

    return "[{\"reussi\" : 1, \"0\" : 1}]";
  } else {
    if ($idRdv != "" && $_SESSION['mail'] == ""){
      return "[{\"reussi\" : 0, \"0\" : 0}]";
    }
  }
}
?>