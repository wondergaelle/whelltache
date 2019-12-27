<section class="page-section portfolio" id="portfolio">
    <div class="container">

        <?php
        $form = false;
        ?>

        <div class="col-md-12 col-lg-4">
            <?php
            if ($form && $resultat) echo "ok";
            if ($form && !$resultat) echo "nok";

            ?>

            <form action="form/connexion.php" method="post">


                <input name="nom" type="text" class="form-control" placeholder="First name">

                <div class="form-group">
                    <div>
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    </div>

                    <div    >
                        <input name="password" type="password" class="form-control" id="inputPassword3"
                               placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info">Envoyer</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</section>