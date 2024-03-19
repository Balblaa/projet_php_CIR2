<?php
    require_once("../DB/database.php");

    $conn = dbConnect();
    $type_request = $_SERVER['REQUEST_METHOD'];

?>