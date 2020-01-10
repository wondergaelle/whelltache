<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <div>
            <?php
            //requete check tache en cours

            //si pas de tache en cours
            $sql = "SELECT * FROM tache ORDER BY rand() LIMIT 1 ";
            $statement = $dbh->prepare($sql);
            $statement->execute();
            $tasks = $statement->fetch();
            echo $tasks["libelle"];
            echo $tasks["id"];

            //update

            //si tache en cours


            //affiche

            ?>

        </div>
    </div>








