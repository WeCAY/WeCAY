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
<script rel="script" type="text/javascript" src="./js/derouler.js"></script>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/principal.css" />
    <title>Accueil | WeCAY</title>
</head>

<body>

<div id="bloc_page">
    <?php include("constant/header.php");?>

    <?php include("functions/creation_csv_temp.php");
    include("functions/creation_csv_pouls.php");
    //echo getNavigation();
    ?>

    <div id="titre"><h1>Suivi médical</h1>
    <h2>Consultez l'évolution en temps réel de vos examens psychotechniques effectués en centre médical</h2>
    <hr>
    </div>
    <div class="profil">
        <article >
            <h1 onclick="description()">Mon profil <img src="./image/next-2.png" width="15px" class="fleche" ></h1>
            <hr>
            <div id="monprofil">
                <?php
                echo showAccount($_SESSION['id']);

                $user=$_SESSION['id'];

                $req2 = ("SELECT date_test from tests WHERE num_securite_social LIKE $user ORDER BY date_test DESC LIMIT 1");
                $dbconn=ConnectDb();
                $sth2=$dbconn->prepare($req2);
                $sth2->execute();
                while($date2 = $sth2->fetch()){
                    $date1 = date('Y-m-d');

                    $date1 = strtotime($date1);
                    $date2 = strtotime($date2[0]);

                    $nbJoursTimestamp = $date1 - $date2;

                    $nbJours = $nbJoursTimestamp/86400;

                    if ($nbJours>1){
                        $term = 's';
                    }
                    echo "<p>Mon dernier examen a été effectué il y a ".$nbJours." jour".$term."</p>";

                }

                ?>
            </div>

        </article>
    </div>


    <div id="menu">
        <nav>
            <ul>
                <li><a href="principal.php">Mon espace personnel</a></li>
                <li><a href="search_exam.php">Rechercher un examen</a></li>
                <li class="deroulant"><a href="contact.php">Contact &ensp;</a>
                    <ul class="sous">
                        <li><a href="contact.php">Contactez-nous</a></li>
                        <li><a href="#">Chatbot</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    </ul>
                </li>
                <li class="deroulant"><a href="#"><?php echo $_SESSION['prenom']." ".$_SESSION['nom']?> &ensp;</a>
                    <ul class="sous">
                        <li><a href="./parameters.php">Modifier mes informations</a></li>
                        <li><a href="#">Paramètres du compte</a></li>
                        <li><a href="./database/deconnect.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div id="box">
    <article>
        <h2 class="suggest">Résultats de ma dernière analyse</h2>

            <?php
            $user=$_SESSION['id'];
            $req = ("SELECT * from tests WHERE num_securite_social LIKE $user ORDER BY date_test DESC LIMIT 1" );
            showResult($req);
            ?>

    </article>
    </div>

    <div id="box">
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
    </div>
    <div id="graph1">
        <h3>Température vs date </h3>
        <div id="my_dataviz">
            <?php include("js/graph_temp.php")?>
        </div>
    </div>
    <div id="graph2">
        <h3>Pouls vs date </h3>
        <div id="my_dataviz2">
            <?php include("js/graph_pouls.php")?>
        </div>
    </div>









</div>
<?php include("constant/footer.php"); ?>
</body>

</html>