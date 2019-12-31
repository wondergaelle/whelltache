<section class="page-section portfolio" id="portfolio">
    <div class="container ">
        <?php

        $form = false;
        if (!empty($_POST["nom"]) && !empty($_POST["age"]) && !empty($_POST["genre"])&& !empty($_POST["avatar"])) {
            $form = true;
            $passHash = password_hash($_POST["password"], PASSWORD_BCRYPT);

            $sql = "INSERT INTO utilisateur(nom,age,password,civilite_id,avatar_id)
            values (:n, :a, :pwd, :civ, :ava)";

            $statement = $dbh->prepare($sql);
            $statement->bindParam(":n", $_POST["nom"]);
            $statement->bindParam(":a", $_POST["age"]);
            $statement->bindParam(":pwd", $passHash);
            $statement->bindParam(":civ", $_POST["genre"]);
            $statement->bindParam(":ava", $_POST["avatar"]);

            $resultat = $statement->execute();
        }
        ?>
        <div class="mx-auto col-md-12 col-lg-6">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 ">INSCRIVEZ VOUS !</h2>
            <div>

                <?php
                if ($form && $resultat) echo "ok";
                if ($form && !$resultat) echo "nok";
                ?>

                <form action="index.php?page=inscription" method="post">
                    <div class="form-group">
                        <div class="form-group">
                            <input name="nom" type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="form-group">
                        <input name="age" type="number" class="form-control" placeholder="age">
                    </div>
                    <div>
                        <?php
                        $sql = "select *from civilite";

                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();

                        $civilites = $stmt->fetchAll();

                        foreach ($civilites as $civility) :?>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio<?= $civility["id"] ?>" name="genre"
                                       value="<?= $civility["id"] ?>"
                                       class="custom-control-input">
                                <label class="custom-control-label" for="customRadio<?= $civility["id"] ?>">
                                    <?= $civility['libelle'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="inputPassword3" class=" col-form-label"></label>
                        </div>
                        <div class="">
                            <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>

            </div>
            <div class="card-group align-space-between form-group ">
                <?php
                $sql = "select *from avatar";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $avatars = $stmt->fetchAll();
                foreach ($avatars as $avatar) :?>
                    <div class="card-deck" style="width: 12rem;">
                        <div class="card">
                            <input type="radio" name="avatar" id="radio-choice-1 "/>
                            <label for="radio-choice-1"><img class="card-img-top " src="img/avatars/<?php echo $avatar["img"]; ?>"</label>
                        </div>
                    </div>
                <?php endforeach; ?>
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