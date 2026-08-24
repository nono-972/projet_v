<?php

require_once "../config/database.php";
require_once "../autoload.php";

$voitureRepository=(new VoitureRepository($pdo));
$marqueRepository=(new MarqueRepository($pdo));

$controller = new VoitureController($voitureRepository, $marqueRepository);
$controller->home();