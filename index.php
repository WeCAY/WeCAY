<?php
require_once "./functions/functions_account.php";

//La session est ouverte.
session_start();

/*Cette page contient le formulaire de connexion et permet d'aller
sur la page connexion et de mot de passe oublié
*/

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/index.css" />
    <script type="text/javascript" src="js/show_pw.js"></script>
    <title>Accueil | WeCAY</title>
</head>

<body>
<div id="bloc_page">
    <?php
    include("constant/header.php");
    ?>

    <section>
        <div id="container">
            <div id="renseignement">
                <form action="#" method="post">
                    <h1>Se connecter</h1>
                    <label>Numéro de sécurité sociale</label>
                    <input type="text" placeholder="Entrez votre numéro de sécurité sociale" name="secu_number" required>
                    <br>
                    <br>
                    <label>Mot de passe</label>
                    <input type="password" placeholder="Entrez votre mot de passe" name="password" id="mdp" required>
                    <br>
                    <input type="checkbox" class="souvenir" id="montrer_mdp" onclick="show()">
                    <label for="montrer_mdp" class="souvenir">Montrer le mot de passe</label>
                    <br>
                    <br>
                    <input type="submit" id='submit' value='Connexion' name="login" >

                    <input type="checkbox" class="souvenir" name="souvenir" id="souvenir">
                    <label for="souvenir" class="souvenir">Se souvenir de moi</label>
                    <br>
                    <br>
                    <?php

                    if (isset($_POST['login']) && !empty($_POST['login'])) {
                        connectAccount();
                    }
                    echo '<div id = "bottom">';
                    echo '<p>Pas encore inscrit ? <a href="subscription.php">Créer un compte</a></p>';
                    echo '<p><a href="forgot_pw.php"> Mot de passe oublié</a></p>';
                    echo '</div>';

                    ?>

                </form>
            </div>
        </div>
    </section>

    <?php
    include("constant/footer.php");
    ?>
</div>
</body>
</html>
