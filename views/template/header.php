<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Constructeur automobile</title>
</head>
<body>

<header>
    <img src="images/Auto_technologie.png" alt="logo constructeur automobile" class="logo">
    <h1>Constructeur automobile</h1>

      <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php
                foreach ($marques as $marque) {
                ?>
                <li><a href="?marque=<?= $marque->id ?>"><?= $marque->nom ?></a></li>
                <?php } ?>
            </ul>
      </nav>

</header>