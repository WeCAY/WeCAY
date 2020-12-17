<?php

require_once "./functions/functions_principal.php";

session_start();

/* 	if(!isset($_SESSION['session']) || !$_SESSION['session']==1){ //case when yo're connected
		header('Location: ./pages/connection.php');
		exit;
	} */

?>


<!DOCTYPE html>
<html lang="fr">
<script src="https://d3js.org/d3.v4.js"></script>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/principal.css" />
    <title>Accueil | WeCAY</title>

</head>

<body>
<div id="bloc_page">
    <?php include("constant/header.php");
    include("./database/connect.php");
    include("functions/creation_csv_temp.php");
    include("functions/creation_csv_pouls.php");

    echo getNavigation();

    ?>
    <?php
    echo showAccount($_SESSION['id']);
    ?>
    <h3>Température vs date </h3>
    <div id="my_dataviz">
        <?php include("js/graph_temp.php")?>
    </div>
    <h3>Pouls vs date </h3>
    <div id="my_dataviz2">
        <?php include("js/graph_pouls.php")?>
    </div>

    <?php include("constant/footer.php"); ?>
</div>
</body>

</html>