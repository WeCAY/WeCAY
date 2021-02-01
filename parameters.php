<?php
    require_once "./functions/functions_parameters.php";
    
    //La session est ouverte.
    session_start();

    //Si le bouton a bien été saisie, on enregistre les modifications
    if (isset($_POST['valider']) && (!empty($_POST['valider']))){
		modification_account();		
    }	
     
/*Dans cette page, on saisie les modifications de nos données personnelles si besoin.
On remplie le formulaire. Soit on possède des données et l'info est déjà remplie.
Soit il nous manque une info (nom par exemple), auquel cas rien l'endroit concerné
n'est pas pré remplie.
*/

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/subscription.css" />
        <title>Modifier mes informations | WeCAY</title>
    </head>

    <body>
        <div id = "block_page">
            <?php 
                include("constant/header.php");
            ?>
            
            <section>
                    <div id="formulaire">
                        <div id="renseignement">
                        <form action="#" method="post"> <!--action="verification.php"-->
                            <h1>Modifiez vos informations</h1>

                            <label>Nom</label>
                            <?php
							    if(empty($_POST['valider'])){
								    $info=affichage_infos("SELECT nom FROM utilisateur WHERE num_securite_social=".$_SESSION['id'].";","nom");
                                    echo '<input type="text" placeholder="Entrez votre nom" name="name" value="'.$info.'"required>';
							    }
							    else{
                                    echo '<input type="text" placeholder="Entrez votre nom" name="name" required>';
							    }
						    ?>

                            <label>Prénom</label>
                            <?php
							    if(empty($_POST['valider'])){
								    $info=affichage_infos("SELECT prenom FROM utilisateur WHERE num_securite_social=".$_SESSION['id'].";","prenom");
                                    echo '<input type="text" placeholder="Entrez votre prénom" name="firstname" value="'.$info.'"required>';
							    }
							    else{
                                    echo '<input type="text" placeholder="Entrez votre prénom" name="firstname" required>';
							    }
                            ?>
                            
                            <label>Adresse mail</label>
                            <?php
							    if(empty($_POST['valider'])){
								    $info=affichage_infos("SELECT email FROM utilisateur WHERE num_securite_social=".$_SESSION['id'].";","email");
                                    echo '<input type="email" placeholder="adresse.mail@wecay.com" name="mail" value="'.$info.'"required>';
							    }
							    else{
                                    echo '<input type="email" placeholder="adresse.mail@wecay.com" name="mail" required>';
							    }
						    ?>

                            <label>Confirmez votre adresse mail</label>
                            <?php
							    if(empty($_POST['valider'])){
                                    echo '<input type="email" placeholder="adresse.mail@wecay.com" name="mail2" value="'.$info.'"required>';
							    }
							    else{
                                    echo '<input type="email" placeholder="adresse.mail@wecay.com" name="mail2" required>';
							    }
						    ?>

                            <label>Civilité</label>
                            <?php
							    if(empty($_POST['valider'])){
                                    $info=affichage_infos("SELECT civilite FROM utilisateur WHERE num_securite_social=".$_SESSION['id'].";","civilite");
                                    echo'<select name="select_box" required>',"\n";
                                    echo '<option selected value="'.$info.'">'.$info.'</option>';
                                    echo '<option value=""> ------------- </option>';
                                    echo '<option>M.</option>';
                                    echo '<option>Mme.</option>';
                                    echo '<option>Autre</option>';		
                                    echo '</select>';
                                }
                                else{
                                    echo'<select name="select_box" required>',"\n";
                                    echo '<option>M.</option>';
                                    echo '<option>Mme.</option>';
                                    echo '<option>Autre</option>';		
                                    echo '</select>';
                                }	
                            ?>

                            <label>Adresse</label>
                            <?php
							    if(empty($_POST['valider'])){
								    $info=affichage_infos("SELECT adresse FROM utilisateur WHERE num_securite_social=".$_SESSION['id'].";","adresse");
                                    echo '<input type="text" placeholder="Adresse postale" name="adress" value="'.$info.'"required>';
							    }
							    else{
                                    echo '<input type="text" placeholder="Adresse postale" name="adress" required>';
							    }
                            ?> 

                            <label>Code Postal</label>
                            <?php
							    if(empty($_POST['valider'])){
								    $info=affichage_infos("SELECT code_postal FROM utilisateur WHERE num_securite_social=".$_SESSION['id'].";","code_postal");
                                    echo '<input type="text" placeholder="Code postal" name="postal_code" value="'.$info.'"required>';
							    }
							    else{
                                    echo '<input type="text" placeholder="Code postal" name="postal_code" required>';
							    }
                            ?> 

                            <label>Ville</label>
                            <?php
							    if(empty($_POST['valider'])){
								    $info=affichage_infos("SELECT ville FROM utilisateur WHERE num_securite_social=".$_SESSION['id'].";","ville");
                                    echo '<input type="text" placeholder="Ville" name="city" value="'.$info.'"required>';
							    }
							    else{
                                    echo '<input type="text" placeholder="Ville" name="city" required>';
							    }
                            ?> 
                            <input type="submit" id="submit" name="valider" value='Valider'>

                        </form>
                        </div>
                    </div>
            </section>

            <?php include("constant/footer.php"); ?>
        </div>
    </body>
</html>

