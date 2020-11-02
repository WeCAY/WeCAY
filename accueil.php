<!DOCTYPE html>
<html lang="fr">
    <head>
    	<meta charset="utf-8" />
    	<link rel="stylesheet" href="CSS/accueil.css" />
  	  	<title>Accueil | WeCAY</title>
    </head>
    
    <body>
        <div id="bloc_page">
            <?php include("constant/header.php"); ?>

            <section>
   		         	<div id="container">
   		         		<div id="renseignement">
   		         			<h1>Connexion</h1>

        					<label><b>Nom d'utilisateur</b></label>
                			<input type="text" placeholder="Entrez votre nom d'utilisateur" name="username" required>

                			<label><b>Mot de passe</b></label>
                			<input type="password" placeholder="Entrez votre mot de passe" name="password" required>

                			<input type="checkbox" class="souvenir" name="souvenir">
                			<label for="souvenir" class="souvenir">Se souvenir de moi</label>

                			<input type="submit" id='submit' value='CONNEXION' >

                            <div id = "bottom">
                                <p>Pas encore inscrit ? <a href="inscription.php">Créer un compte</a></p>
                                <p><a href="mdp_oublie.php"> Mot de passe oublié</a></p>
                            </div>

   		         		</div>
   		         		<div id="droite">

   		         		</div>
   		         	</div>
            </section>

            <?php include("constant/footer.php"); ?>
        </div>
    </body>
</html>

