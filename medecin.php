<?php

require_once "./functions/functions_medecin.php";
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
    <link rel="stylesheet" href="CSS/principale.css" />
    <title>Accueil | WeCAY</title>
    <?php
        //echo getNavigation();
    ?>
</head>

<body>
    <div id="bloc_page">
        <?php 
            include("constant/header.php");
        ?>
        <h1>Page médecin</h1>

         <div>
        <?php
        //A voir si utile de mettre sur la page du médecin. Pas toutes ses infos mais qques unes.
            //echo showAccount_medecin($_SESSION['id']);
        ?>
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
            <h3 class="suggest">Liste des patients</h3>
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
                $req = ("SELECT * from utilisateur INNER JOIN tests ON num_securite_social = num_securite_social WHERE statut LIKE 'Patient' ASC");
                showPatient($req);
            }
        ?>
        
        <?php 
            include("constant/footer.php"); 
        ?>
        
    </div>
</body>

</html>