<!DOCTYPE html>
<html lang="fr">
    <head>
    	<meta charset="utf-8" />
    	<link rel="stylesheet" href="CSS/accueil.css" />
  	  	<title>Acceuil | WeCAY</title>
    </head>
    
    <body>
        <div id="bloc_page">
            <?php include("constant/header.php"); ?>

            <section>
   		         	<div id="container">
   		         		<div id="renseignement">
   		         			<h1>Connexion</h1>

        					<label><b>Nom d'utilisateur</b></label>
                			<input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                			<label><b>Mot de passe</b></label>
                			<input type="password" placeholder="Entrer le mot de passe" name="password" required>

                			<input type="checkbox" class="souvenir" name="souvenir">
                			<label for="souvenir" class="souvenir">Se souvenir de moi</label>

                			<input type="submit" id='submit' value='CONNEXION' >

   		         		</div>
   		         		<div id="droite">
   		         			<p><a href="inscription.html">Inscription</a></p><br>
   		         			<p><a href="mdp_oublie.html"> Mot de passe oublié</a></p>
   		         		</div>
   		         	</div>
            </section>

            <?php include("constant/footer.php"); ?>
        </div>
    </body>
</html>

