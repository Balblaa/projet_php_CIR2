<?php
    require_once("../DB/database.php");
    require_once("recherche.php");
    require_once("rendez_vous.php");
    require_once("inscription.php");
    require_once("authentification.php");

    $conn = dbConnect();
    $type_request = $_SERVER['REQUEST_METHOD'];

    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $requestRessource = array_shift($request);

    // GET Recherche
    if($type_request == 'GET' and $requestRessource == "specialite"){
        $specialites = dbRequestspe($conn);
        echo json_encode($specialites);
    }
    if($type_request == 'GET' and $requestRessource == "lieu"){
        $lieu = dbRequestLieu($conn);
        echo json_encode($lieu);
    }
    if($type_request == 'GET' and $requestRessource == "rdv"){
        $rendezvous = dbRequestRdv($conn, $_GET['nom'], $_GET['specialite'], $_GET['lieu'], $_GET['genre']);
        echo json_encode($rendezvous);
    }
    // GET Rendez-vous
    if($type_request == 'GET' and $requestRessource == "mesRdv"){
        $mesRdv = dbRequestMesRdv($conn);
        echo json_encode($mesRdv);
    }
    if($type_request == 'GET' and $requestRessource == "reprendreRdv"){
        $reponse = dbRequestRdv($conn, $_GET['nom'], "tous", "tous", 2);
        echo json_encode($reponse);
    }

    // PUT recherche
    if($type_request == 'POST' and $requestRessource == "prendreRdv"){
        if (isset($_POST['idRdv'])){
            $reussite = dbRegisterRdv($conn, $_POST['idRdv']);
            echo $reussite;
        }
    }
    // POST inscription
    if($type_request == 'POST' and $requestRessource == "addUser"){
        $reussite = dbAddUser($conn,  $_POST["Nom"], 
        $_POST["Prenom"], 
        $_POST["Telephone"],
        $_POST["Mail"], 
        $_POST["Mdp"], 
        $_POST["MailVerif"], 
        $_POST["MdpVerif"]);
        echo $reussite;
    }
    // POST Connection
    if($type_request == 'POST' and $requestRessource == "ConnectUser"){
        $reussite = dbConnectUser($conn, $_POST["mail"], $_POST["mdp"]);
        echo $reussite;
    }
    if($type_request == "POST" and $requestRessource == "DisconnectUser"){
        $succes = dbDisconnectUser();
        echo $succes;
    }
?>