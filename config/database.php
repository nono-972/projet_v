<?php

$host = "localhost";
$dbname = "voiture";
$user = "root";
$password = "Noham972";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "connexion réussie";
}catch (PDOException $e){
    echo "Erreur: ".$e->get_message();
}