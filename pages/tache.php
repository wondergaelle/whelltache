<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <?php
        $sql = "SELECT * FROM tache ";
        $statement = $dbh->prepare($sql);
        $resultat = $statement->execute();
        $taches = $statement->fetchAll();
        ?>

        <table class="table">
            <thead >
            <tr>
                <th>taches</th>
                <th>point</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($taches as $tache) { ?>
            <tr>
                <td><?php echo $tache['libelle']; ?></td>
                <td><?php echo $tache['points']; ?></td>
                <?php } ?>
            </tr>
            </tbody>
    </div>




</section>
