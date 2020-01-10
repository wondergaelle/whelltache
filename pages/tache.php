<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <?php
        $sql = "SELECT * FROM tache ";
        $statement = $dbh->prepare($sql);
        $resultat = $statement->execute();
        $taches = $statement->fetchAll();
        ?>

        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">LISTE DES TACHES</h2>
        <table class="table">
            <thead >
            <tr>
                <th>taches</th>
                <th>point</th>
            </tr>

            </thead>
            <?php foreach($taches as $tache) { ?>
            <tbody>

            <tr>
                <td><?php echo $tache['libelle']; ?></td>
                <td><?php echo $tache['points']; ?></td>
                <?php } ?>
            </tr>
            </tbody>

        </table>
    </div>

</section>
