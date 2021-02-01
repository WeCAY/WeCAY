<?php

require_once "./functions/functions_medecin.php";
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
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/principal.css" />
    <title>Accueil | WeCAY</title>
    <?php
        //echo getNavigation();
    ?>
</head>

<body>
    <div id="bloc_page">
        <?php 
            include("constant/header.php");
            //echo getNavigation();
        ?>
        <h1>Espace médecin</h1>

        <div class="profil">
            <article >
                <h1 onclick="description()">Mon profil <img src="./image/next-2.png" width="15px" class="fleche" ></h1>
                <hr>
                <div id="monprofil">
                    <?php
                    echo showAccount($_SESSION['id']);
                    ?>
                </div>

            </article>
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
    <h2>Patients</h2>
       <article>
            <h3 class="suggest">Recherche d'un patient</h3>
            <div>
                <form>
                    <fieldset>
                        <input type="search" id="maRecherche" name="q" placeholder="Rechercher sur le site…" size="50">
                        <button>Rechercher</button>
                    </fieldset>
                </form>
            </div>
        </article>

        <article>
            <h3 class="suggest">Liste des derniers test effectués</h3>
            <div>
                <form method="POST" action="#">
                    <select name="select_box_tri" required>
                        <option value="trier_par">Trier par</option>
                        <option value="nom_tri">Nom</option>
                        <option value="prenom_tri">Prénom</option>
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
                triPatient();   
            }else{
                $req = ("SELECT * from utilisateur INNER JOIN tests ON utilisateur.num_securite_social = tests.num_securite_social WHERE statut LIKE 'Patient'");
                showPatient($req);
            }
        ?>
        

        
    </div>
    <?php
    include("constant/footer.php");
    ?>
</body>

</html>