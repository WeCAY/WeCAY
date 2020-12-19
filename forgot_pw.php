<?php require_once "./database/connect.php";
require_once "functions/functions_forgotpw.php";?>

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
                        <form method="post">
                        <h1>Mot de passe oublié</h1>

                        <label>N° de sécurité sociale</label>
                        <input type="text" placeholder="Entrez votre numéro de sécurité sociale" name="secu_number" required>

                        <label>Adresse mail</label>
                        <input type="email" placeholder="Entrez votre adresse mail" name="mail" required>

                        <input type="submit" id='submit' value='Réinitialiser le mot de passe'>
                        <?php
                        if(isset($_POST['mail'],$_POST['secu_number']))
                        {
                            if(checkMail())
                            {
                                sendMail();
                            }
                        }?>
                        </form>
                    </div>
                </div>
            </section>

            <?php include("constant/footer.php"); ?>
        </div>
    </body>
</html>

