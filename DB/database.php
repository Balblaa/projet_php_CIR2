<?php
const DB_USER = "postgres";
const DB_PASSWORD = "Isen44N";
const DB_NAME = "citations";
const DB_SERVER = "127.0.0.1";
const DB_PORT = "5432";

function dbConnect(){
    $dns = 'pgsql:dbname='.DB_NAME.';host='.DB_SERVER.';port='.DB_PORT;

    try {
        $conn = new PDO($dns, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

    return $conn;
};
?>