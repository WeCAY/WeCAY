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
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/principal.css" />
    <title>Accueil | WeCAY</title>

</head>

<body>
<div id="bloc_page">
    <?php include("constant/header.php");
    include("./database/connect.php");

    echo getNavigation();

    ?>


    <?php
    echo showAccount($_SESSION['id']);
    ?>

    <?php include("constant/footer.php"); ?>
</div>
</body>

</html>