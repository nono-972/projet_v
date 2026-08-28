<?php

require_once "../config/database.php";
require_once "../autoload.php";

$voitureRepository=(new VoitureRepository($pdo));
$marqueRepository=(new MarqueRepository($pdo));

$controller = new VoitureController($voitureRepository, $marqueRepository);

if(isset($_GET["action"])){
     if ($_GET["action"] == "marque" && isset($_GET["id"]) ){
         $controller->editmarque();

    }else if ($_GET["action"]=== "marque") {     
        $controller->createMarque();
        
    } else if ($_GET["action"] == "voiture" && isset($_GET["id"]) ){
        $controller->editvoiture();
       

    } else if($_GET["action"] ==="voiture"){
        $controller->createVoiture();
    } else{
        $controller->home();
    }
} else if (isset($_GET["marques"]) ){
    $controller->AllMarques();
} else if (isset($_GET["deleteVoiture"])) {    
    $id = $_GET["deleteVoiture"];

} else if (isset($_GET["deleteMarque"])) {    
    $id = $_GET["deleteMarque"];
    $controller->deleteMarque($id);
} else{
    $controller->home();
}
