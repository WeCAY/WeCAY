<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/mdp_oublie.css" />
    <title>Mot de passe oublié | WeCAY</title>
</head>

<body>
<div id="bloc_page">
    <?php include("constant/header.php"); ?>

    <section>
        <div id="container">
            <div id="renseignement">
                <h1>Mot de passe oublié</h1>

                <label><b>Adresse mail</b></label>
                <input type="text" placeholder="Entrez votre adresse mail" name="username" required>

                <input type="submit" id='submit' value='RÉINITIALISER LE MOT DE PASSE' >


            </div>

        </div>
    </section>

    <?php include("constant/footer.php"); ?>
</div>
</body>
</html>

