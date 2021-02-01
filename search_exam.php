<?php

require_once "./functions/functions_search_exam.php";
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
    <title>Rechercher un examenn | WeCAY</title>

</head>

<body>
    <div id="bloc_page">
        <?php 
            include("constant/header.php");
        ?>
        <h1>Recherche d'un examen</h1>

         <div>

        </div>
        <div id="menu">
            <nav>
                <ul>
                    <li><a href="principal.php">Mon espace personnel</a></li>
                    <li><a href="search_exam.php">Rechercher un examen</a></li>
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
                if(strlen($_GET['q'])==1){//Regarder par rapport a id du test OK
                    $req = ("SELECT * from tests WHERE num_securite_social LIKE'".$_SESSION['id']."' AND id_test=".$q);
                    showResult($req);
                    }elseif(strlen($_GET['q'])==8){//Regarder par rapport au numero machine (8 chiffres)
                        $req = ("SELECT * from tests WHERE num_securite_social LIKE'".$_SESSION['id']."' AND numero_serie LIKE '%".$q."%'");
                        showResult($req);
                        }else{//Regarder par rapport au reste (numero machine et date)
                            $req = ("SELECT * from tests WHERE num_securite_social LIKE'".$_SESSION['id']."' AND date_test LIKE '%".$q."%' OR date_test LIKE '".$q."%' OR date_test LIKE '%".$q."'");
                            showResult($req);
                        }
            }else{          // Si on ne rentre rien ok  
                $req = ("SELECT * from tests WHERE num_securite_social LIKE ".$_SESSION['id']);
                showResult($req);
            }
            
        ?>



    </div>
    <?php
    include("constant/footer.php");
    ?>
</body>

</html>