
<?php require "templates/header.php" ?>

<main>
    <h2>La liste des voitures</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptate ipsum tempore nulla esse! Culpa blanditiis libero soluta alias voluptate?</p>
    <table>
        <tbody>
            <?php
            foreach ($marques as $marque) {
                ?>
                <tr>
                <td class="bold"><?=$marque->nom?></td>
                <td><a href="index.php?marque=<?= $marque->id ?>">voir</a></td>
                <td><a href="index.php?deleteMarque=<?= $marque->id ?>">Effacer</a></td>
                <td><a href="index.php?action=marque&id=<?= $marque->id ?>">Editer</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require "templates/footer.php" ?>
</body>
</html>