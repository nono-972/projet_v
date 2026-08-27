
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
                <td><?=$marque->nom?></td>
                <td class="bold"<?=$marque->id?>>voir</td>
                <td><a href="">Effacer</a></td>
                <td><a href="">Editer</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require "templates/footer.php" ?>
</body>
</html>