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
        <img src="images/Auto_technologie.jpg" alt="logo constructeur automobile" class="logo">
        <h1>Constructeur automobile</h1>

        <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php?marques=1">voir marques</a></li>
                    <li><a href="index.php?action=marque">Ajouter une marque</a></li>
                    <li><a href="index.php?action=voiture">Ajouter une voiture</a></li>
                    <li><a href="index.php?action=voiture&id=">Mise à jour</a></li>
                    <li><a href="index.php?action=marque&id=">sauvegarde</a></li>
                    <?php
                    foreach ($marques as $headermarque) {
                    ?>
                    <li><a href="?marque=<?= $headermarque->id ?>"><?= $headermarque->nom ?></a></li>
                    <?php } ?>
                </ul>
        </nav>

    </header>