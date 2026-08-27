<?php
require "templates/header.php";
?>

<main>
    
    <h2><?= $titre ?></h2>

    <form action="" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= isset($voiture) ? htmlspecialchars($voiture->nom): "" ?>">

        <label for="puissance">puissance :</label>
        <input type="text" name="puissance" id="puissance" value="<?= isset($voiture) ? htmlspecialchars($voiture->puissance): "" ?>">

        <label for="prix">prix :</label>
        <input type="text" name="prix" id="prix" value="<?= isset($voiture) ? htmlspecialchars($voiture->prix): "" ?>">
          
        <select name="marque" id="marque">
         <?php foreach($marques as $marque): ?>
         <option value="<?= $marque->id ?>" <?= isset($voiture) && $marque->id === $voiture->marque_id ? "selected" : "" ?>><?= $marque->nom ?></option>
         <?php endforeach;?>
        </select>

        <button type="submit"><?= $button ?></button>
    </form>
</main>

<?php
require "templates/footer.php";
?>