<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <div>

            <div class="tache_en_cours">

                <!-- recupération utilisateur en cours-->
                <?php if ($_SESSION["isConnected"]) {

                    echo '<p> Nom : ' . $_SESSION["userConnected"]["nom"];
                    '</p> ';

                } ?>

                <!-- requête check tache en cours-->
            </div>
            <div class="tache_aleatoire">

                <br>
                <?php

                if(isset($_GET["s"]) && isset($_GET["t"]))
                {
                    $xxx = "insert into taches_executees(tache_id, utilisateur_id, score) VALUES (:t, :u, :s)  ";
                    $statement = $dbh->prepare($xxx);
                    $statement->bindParam(":t", $_GET["t"]);
                    $statement->bindParam(":s", $_GET["s"]);
                    $statement->bindParam(":u",  $_SESSION["userConnected"]["id"]);
                    $statement->execute();

                    $xxx = "update   utilisateur set tache_id = NULL where   id = :u ";
                    $statement = $dbh->prepare($xxx);
                    $statement->bindParam(":u",  $_SESSION["userConnected"]["id"]);
                    $statement->execute();

                    echo"félicitations";

                }

                $tacheEnCours = "SELECT * FROM tache ORDER BY rand() LIMIT 1 ";
                $statement = $dbh->prepare($tacheEnCours);
                $statement->execute();
                $tasks = $statement->fetch();


                $xxx = "update utilisateur set tache_id = :tache_id where tache_id IS NULL And  id = :u ";
                $statement = $dbh->prepare($xxx);
                $statement->bindParam(":tache_id",  $tasks['id']);
                $statement->bindParam(":u",  $_SESSION["userConnected"]["id"]);
                $statement->execute();

                $tacheEnCours = "SELECT tache.id as tache_id, tache.libelle as libelle, tache.points as points FROM tache, utilisateur  WHERE utilisateur.id = '".$_SESSION["userConnected"]["id"]."' AND tache.id = utilisateur.tache_id ";
                $statement = $dbh->prepare($tacheEnCours);
                $statement->execute();
                $tasks = $statement->fetch();

                echo 'id ' . $tasks['tache_id'] . ' :';
                echo ' ' . $tasks["libelle"] . ' = ';
                echo ' ' . $tasks["points"] . 'points';



                $tacheEnCours = "SELECT * FROM tache, utilisateur  WHERE  tache.id = utilisateur.tache_id ";
                $statement = $dbh->prepare($tacheEnCours);
                $statement->execute();
                $taskssss = $statement->fetchAll();
                    foreach ($taskssss as $task) {
                        echo 'id ' . $task['nom'] . ' :';
                        echo ' ' . $task["libelle"] . ' = ';
                        echo ' ' . $task["points"] . 'points';
                    }
                ?>
                <form action="index.php?page=affectation&t=<?php echo $tasks['tache_id']; ?>&s=<?php echo $tasks['points']; ?>" method="post"><button type="submit" > Rafraichir</button></form>


                <!--  si pas de tache en cours-->


                <!--à mettre dans un formulaire : selectionner le joueur-->


                <!--update-->


                <!--si tache en cours*/-->


                <!--   affiche-->


            </div>
        </div>
    </div>








