<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <div>

            <div class="tache_en_cours">

                <!-- recupération utilisateur en cours-->
                <?php if ($_SESSION["isConnected"]) {
                    echo '<p> Prénom : ' . $_SESSION["userConnected"]["nom"];
                    '</p> ';
                } ?>

            </div>
            <div class="tache_aleatoire">

                <br>
                <?php

                // recupération de la tâche dans la table tache executée
                if (isset($_GET["s"]) && isset($_GET["t"])) {
                    $envoiTache = "insert into taches_executees(tache_id, utilisateur_id, score) VALUES (:t, :u, :s)  ";
                    $statement = $dbh->prepare($envoiTache);
                    $statement->bindParam(":t", $_GET["t"]);
                    $statement->bindParam(":s", $_GET["s"]);
                    $statement->bindParam(":u", $_SESSION["userConnected"]["id"]);
                    $statement->execute();

                    // tache en cours d'affichage et utilisateur session en cours
                    $envoiTache = "update   utilisateur set tache_id = NULL where   id = :u ";
                    $statement = $dbh->prepare($envoiTache);
                    $statement->bindParam(":u", $_SESSION["userConnected"]["id"]);
                    $statement->execute();

                    echo "<p>félicitations tu dois maintenant : </p>";
                }

                //// ASSOCIER LA TACHE EN COURS A L'UTILISATEUR POUR ENVOI DANS LA REQUETE tache_executée //
                //requête et selection d'une tache en cours
                $tacheEnCours = "SELECT * FROM tache ORDER BY rand() LIMIT 1 ";
                $statement = $dbh->prepare($tacheEnCours);
                $statement->execute();
                $tasks = $statement->fetch();

                //association de la tache à l'utilisateur en cours pour permettre l'envoi dans la table taches executees
                $taskUser = "update utilisateur set tache_id = :tache_id where tache_id IS NULL And  id = :u ";
                $statement = $dbh->prepare($taskUser);
                $statement->bindParam(":tache_id", $tasks['id']);
                $statement->bindParam(":u", $_SESSION["userConnected"]["id"]);
                $statement->execute();

                //récupération de la tache dans la table utilisateur
                $tacheEnCours = "SELECT tache.id as tache_id, tache.libelle as libelle, tache.points as points FROM tache, utilisateur  WHERE utilisateur.id = '" . $_SESSION["userConnected"]["id"] . "' AND tache.id = utilisateur.tache_id ";
                $statement = $dbh->prepare($tacheEnCours);
                $statement->execute();
                $tasks = $statement->fetch();

                echo ' ' . '<p>' . $tasks["libelle"] . ' = ';
                echo ' ' . $tasks["points"] . ' bonus</p>';
                echo '<p> Bravo ! Si tu as réalisé ta tâche clique ici !!</p>';
                ?>

                <form action="index.php?page=affectation&t=<?php echo $tasks['tache_id']; ?>&s=<?php echo $tasks['points']; ?>"
                      method="post">
                    <button type="submit"> J'ai fait ma tâche !</button>
                </form>
                <?php

                // récuperation des taches en cours de tous les utilisateurs
                $tacheEnCoursUsers = "SELECT * FROM tache, utilisateur  WHERE  tache.id = utilisateur.tache_id ";
                $statement = $dbh->prepare($tacheEnCoursUsers);
                $statement->execute();
                $tecs = $statement->fetchAll();
                ?>
                <h2 class="page-section-heading text-center text-uppercase text-secondary p-4">TACHES EN COURS DES
                    UTILISATEURS</h2>
                <section class="P3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Tache en cours</th>
                            <th scope="col">Points à gagner</th>
                        </tr>
                        </thead>
                        <?php foreach ($tecs as $tec) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo $tec['nom'] ?></td>
                            <td><?php echo $tec["libelle"] ?></td>
                            <td><?php echo $tec["points"] ?></td>
                            <?php } ?>
                        </tr>
                        </tbody>
                    </table>
                </section>


        <!--        récuperation des taches en cours de tous les utilisateurs-->


            </div>
        </div>
    </div>








