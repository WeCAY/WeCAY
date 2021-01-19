<?php

require_once "./functions/functions_faq.php";
require_once "./database/connect.php";

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
    <link rel="stylesheet" href="CSS/faq.css" />
    <script rel="script" type="text/javascript" src="./js/derouler.js"></script>
    <title>Accueil | WeCAY</title>

    <?php
       // echo getNavigation();
    ?>
</head>

<body>
    <div id="bloc_page">
        <?php include("constant/header.php");?>

        <h1>Foire aux questions</h1>
        <?php
            echo show_nav_faq();
            echo showFaq();
        ?>


    </div>
    <?php include("constant/footer.php"); ?>
</body>

</html>