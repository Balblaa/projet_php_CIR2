<?php
    require_once("../DB/database.php");
    require_once("recherche.php");

    $conn = dbConnect();
    $type_request = $_SERVER['REQUEST_METHOD'];

    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $requestRessource = array_shift($request);

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

    /*if($type_request == 'POST' and $requestRessource == "prendre_rdv"){
        $reussite = ajoutrdv($conn, $_POST['id_rendez']);
        echo $reussite;
    }*/
?>