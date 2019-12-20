<?php

session_start();

require "../conf/bdd.php";

if (!empty($_POST["nom"])) {
    $form = true;
    $sql = "SELECT * FROM utilisateur WHERE nom =:n";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(":n", $_POST["nom"]);

    $resultat = $statement->execute();

    if ($resultat) {
        $data = $statement->fetch();
    } else {
        echo "erreur de serveur";
    }

    if ($data !== false) {
        if (password_verify($_POST["password"], $data["password"])) {
            $_SESSION["userConnected"] = $data;
            $_SESSION["isConnected"] = true;

            header("Location: ../index.php?form=ok");

        } else {
            echo "erreur de mots de passe";
        }

    } else {
        echo "aucun utilisateur qui correspond";
    }
} else {
}




