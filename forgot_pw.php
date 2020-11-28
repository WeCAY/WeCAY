<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/forgot_pw.css" />
    <title>Mot de passe oublié | WeCAY</title>
</head>

    <body>
        <div id="bloc_page">
            <?php include("constant/header.php"); ?>

            <section>
                <div id="container">
                    <div id="renseignement">
                        <h1>Mot de passe oublié</h1>

                        <label>Nom d'utilisateur</label>
                        <input type="text" placeholder="Entrez votre nom d'utilisateur" name="username" required>
                        <br>
                        <br>
                        <label>Adresse mail</label>
                        <input type="email" placeholder="Entrez votre adresse mail" name="mail" required>

                        <input type="submit" id='submit' value='Réinitialiser le mot de passe' >

                    </div>
                </div>
            </section>

            <?php include("constant/footer.php"); ?>
        </div>
    </body>
</html>

