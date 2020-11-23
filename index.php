<!DOCTYPE html>
<html lang="fr">
    <head>
    	<meta charset="utf-8" />
    	<link rel="stylesheet" href="CSS/index.css" />
  	  	<title>Accueil | WeCAY</title>
    </head>
    
    <body>
        <div id="bloc_page">
            <?php include("constant/header.php");
            include("connect_to_db.php"); ?>

            <section>
   		         	<div id="container">
   		         		<div id="renseignement">
                            <form action="verification.php" method="post"> <!--action="verification.php"-->
                                <h1>Se connecter</h1>

                                <label>Numéro de sécurité sociale</label>
                                <input type="text" placeholder="Entrez votre numéro de sécurité sociale" name="nss" required>
                                <br>
                                <br>
                                <label>Mot de passe</label>
                                <input type="password" placeholder="Entrez votre mot de passe" name="password" required>
                                <br>
                                <br>

                                <input type="checkbox" class="souvenir" name="souvenir">
                                <label for="souvenir" class="souvenir">Se souvenir de moi</label>
                                <br>
                                <br>
                                <input type="submit" id='submit' value='CONNEXION' name="login" >

                                <div id = "bottom">
                                    <p>Pas encore inscrit ? <a href="inscription.php">Créer un compte</a></p>
                                    <p><a href="mdp_oublie.php"> Mot de passe oublié</a></p>
                                </div>

                            </form>
                        </div>
   		         	</div>
            </section>

            <?php include("constant/footer.php"); ?>
        </div>
    </body>
</html>
