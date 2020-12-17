<?php

require_once "./functions/functions_principal.php";
require_once "./database/connect.php";

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
    include("functions/creation_csv_temp.php");
    include("functions/creation_csv_pouls.php");
    ?>

    <h1>Suivi médical</h1>

    <?php
    echo showAccount($_SESSION['id']);
    ?>

    <article>
        <h2 class="suggest">Résultats de ma dernière analyse</h2>
        <div>
            <?php
            $user=$_SESSION['id'];
            $req = ("SELECT * from tests WHERE num_securite_social LIKE $user ORDER BY date_test DESC LIMIT 1" );
            showResult($req);
            ?>
        </div>
    </article>

    <article>
        <h2 class="suggest">Liste de mes précédentes analyses</h2>
        <div>
            <form method="POST" action="#">
                <select name="select_box_tri" required>
                    <option value="trier_par">Trier par</option>
                    <option value="temperature_tri">Température</option>
                    <option value="pouls_tri">Pouls</option>
                    <option value="machine_tri">Machine utilisée</option>
                    <option value="date_tri">Date</option>
                </select>
                <button type="submit" name="bouton" value="1">Valider</button>
            </form>
        </div>
    </article>
    <?php
    /* Lorsqu'on appuie sur le bouton, on trie les patients en fonction du critère choisi.
    */
    if(isset($_POST['bouton'])){
        triResult();
    }else{
        $req = ("SELECT * from tests WHERE num_securite_social LIKE ".$_SESSION['id']);
        showResult($req);
    }
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