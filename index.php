<!DOCTYPE html>
<html lang="en">

<head>

<?php
//connect bdd

// lignes à retirer lors de la mise en production**************
ini_set("display_errors", 1);
error_reporting(E_ALL);
//******************************

session_start();

require "conf/bdd.php";

if(isset($_GET["dec"]))
{
    $_SESSION["isConnected"] = false;
}

if(!isset($_SESSION["isConnected"])) $_SESSION["isConnected"] = false;

require "class/bdd.php";
$db = new Db();

require "parts/header.php";

if(isset($_GET["page"])) {

    $page = "pages/".$_GET["page"].".php";

    if (file_exists($page)) {
        require $page;
    } else {
        require "pages/404.php";
    }

} else {
    require "pages/jeu.php";
}

/*var_dump($_GET);
var_dump($_POST);*/

require "parts/footer.php";




