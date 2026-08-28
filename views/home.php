
<?php require "templates/header.php" ?>

<main>
    <p><?= isset($message) ? $message : "" ?></p>
    <h2>La liste des voitures</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptate ipsum tempore nulla esse! Culpa blanditiis libero soluta alias voluptate?</p>
    <table>
        <tbody>
            <?php
            foreach ($voitures as $voiture) :
                ?>
                <tr>
                <td><?=$voiture->nom?></td>
                <td><?=$voiture->puissance?>ch</td>
                <td class="bold"><?= number_format( $voiture->prix, 0, ',', ' ') ?>€</td>
                <td><a href="index.php?deleteVoiture=<?= $voiture->id ?>">Effacer</a></td>
                <td><a href="index.php?action=voiture&id=<?= $voiture->id ?>">Editer</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php require "templates/footer.php" ?>
</body>
</html>