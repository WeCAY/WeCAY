<?php

require_once "./functions/functions_search_patient.php";
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
    <link rel="stylesheet" href="CSS/search_patient.css" />
    <title>Accueil | WeCAY</title>

</head>

<body>
    <div id="bloc_page">
        <?php 
            include("constant/header.php");
        ?>
        <h1>Recherche d'un patient</h1>

         <div>

        </div>
        <div id="menu">
            <nav>
                <ul>
                    <li><a href="medecin.php">Mon espace personnel</a></li>
                    <li><a href="search_patient.php">Rechercher un patient</a></li>
                    <li class="deroulant"><a href="#">Contact &ensp;</a>
                        <ul class="sous">
                            <li><a href="#">Contactez-nous</a></li>
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
        

    <h2>Rechercher un patient</h2>
       <article>
            <div>
                <form method="GET" action=#>
                        <input type="search" id="maRecherche" name="q" placeholder="Rechercher un patient …" size="50" />
                        <input type="submit" value="Rechercher"/>
                </form>
            </div>
        </article>

        <?php
            if(isset($_GET['q']) && !empty($_GET['q'])){
                $q=htmlspecialchars($_GET['q']);
                $req = ("SELECT nom,prenom,num_securite_social from utilisateur WHERE statut = 'Patient' AND nom LIKE '%".$q."%' OR prenom LIKE '%".$q."%' OR num_securite_social LIKE '%".$q."%'");
                showPatient($req);
            }else{            
                $req = ("SELECT nom,prenom,num_securite_social from utilisateur WHERE statut = 'Patient'");
                showPatient($req);    
            }
        ?>



    </div>
    <?php
    include("constant/footer.php");
    ?>
</body>

</html>