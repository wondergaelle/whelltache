<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <?php

        $form = false;
        if (!empty($_POST["nom"]) && !empty($_POST["age"]) && !empty($_POST["genre"])) {
            $form = true;
            $passHash = password_hash($_POST["password"], PASSWORD_BCRYPT);

            $sql = "INSERT INTO utilisateur(nom,age,password,civilite_id)
            values (:n, :a, :pwd, :civ)";

            $statement = $dbh->prepare($sql);
            $statement->bindParam(":n", $_POST["nom"]);
            $statement->bindParam(":a", $_POST["age"]);
            $statement->bindParam(":pwd", $passHash);
            $statement->bindParam(":civ", $_POST["genre"]);

            $resultat = $statement->execute();

        }

        ?>
        <div class="mx-auto col-md-12 col-lg-6">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">INSCRIVEZ VOUS !</h2>

            <?php
            if ($form && $resultat) echo "ok";
            if ($form && !$resultat) echo "nok";
            ?>

            <form action="index.php?page=inscription" method="post">
                <div class="">
                    <div class="">
                        <input name="nom" type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="">
                        <input name="age" type="number" class="form-control" placeholder="age">
                    </div>
                    <div>
                        Je suis
                        <?php
                        "select *from civilite";

                        $stmt->execute();

                        return $stmt->fetchAll();


                        foreach ($civilite as $civility) ?>

                        <label> <?php = $civilite["libelle"] ?></label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="genre" value="<?php $civility["id=1"] ?>"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">une fille</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="genre" value="<?php $civility["id=2"] */ ?>"
                                       class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">un garçon</label>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                </div>
                                <div class="">
                                    <input name="password" type="password" class="form-control" id="inputPassword3"
                                           placeholder="Password">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info">Envoyer</button>
                            </div>
                        </div>
                    </div>

            </form>


        </div>
    </div>
</section>