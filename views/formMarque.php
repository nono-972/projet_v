<?php
require "templates/header.php";
?>

<main>
    
    <h2><?= $titre ?></h2>

    <form action="" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= isset($marque) ? htmlspecialchars($marque->nom): "" ?>">
          
        <button type="submit"><?= $button ?></button>
    </form>
</main>

<?php
require "templates/footer.php";
?>
