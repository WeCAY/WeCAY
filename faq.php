<?php

require_once "./functions/functions_faq.php";

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
    <?php
       // echo getNavigation();
    ?>
</head>

<body>
    <div id="bloc_page">
        <?php include("constant/header.php");
            //include("./database/connect.php"); 
        ?>


        <?php
            echo showFaq();
        ?>

        <?php include("constant/footer.php"); ?>
    </div>
</body>

</html>