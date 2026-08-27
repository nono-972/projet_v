<?php

require_once "../config/database.php";
require_once "../autoload.php";

$voitureRepository=(new VoitureRepository($pdo));
$marqueRepository=(new MarqueRepository($pdo));

$controller = new VoitureController($voitureRepository, $marqueRepository);

if(isset($_GET["action"])){
    if ($_GET["action"]=== "marque") {     
        $controller->createMarque();
    }
    else if ($_GET["action"] == "voiture" && isset($_GET["id"]) ){
     $controller->editvoiture();
    }
    else if ($_GET["marques="] ){
     $controller->AllMarques();
    }
     else if($_GET["action"] ==="voiture"){
     $controller->createVoiture();
   }else{
    $controller->home();
   }
}

else if (isset($_GET["deleteVoiture"])) {

    $id = $_GET["deleteVoiture"];
    $controller->deleteVoiture($id);
}else{
    $controller->home();
}