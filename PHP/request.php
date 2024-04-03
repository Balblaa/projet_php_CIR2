<?php
    require_once("../DB/database.php");
    require_once("recherche.php");

    $conn = dbConnect();
    $type_request = $_SERVER['REQUEST_METHOD'];

    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $requestRessource = array_shift($request);

    if($type_request == 'GET'and $requestRessource == "medecin"){
        $medecin = dbRequestMedic($conn, $_GET['specialite'], $_GET['lieu']);
        echo json_encode($medecin);
    }
    if($type_request == 'GET' and $requestRessource == "specialite"){
        $specialites = dbRequestspe($conn);
        echo json_encode($specialites);
    }
    if($type_request == 'GET' and $requestRessource == "")
?>