<?php require_once "./database/connect.php"; ?>
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


                        <label>Adresse mail</label>
                        <input type="email" placeholder="Entrez votre adresse mail" name="mail" required>

                        <input type="submit" id='submit' value='Réinitialiser le mot de passe'>
                        <?php
                        if(isset($_POST['mail']))
                        {
                            $token = uniqid();
                            $url = "http://wecay.alwaysdata.net/token?token=$token";

                            $message = "Cliquez sur le lien pour réinitialiser votre mot de passe : $url";
                            $headers = 'Content-Type: text/plain; charset="utf-8"'." ";

                            if(mail($_POST['mail'], 'Mot de passe oublié', $message, $headers))
                            {
                                $db = connectDb();
                                $sql = "UPDATE utilisateur SET token = ? WHERE email = ?";
                                $stmt = $db->prepare($sql);
                                $stmt->execute([$token, $_POST['mail']]);
                                echo 'Un mail a été envoyé à votre adresse '.$_POST['mail'].'. Suivez les instructions pour modifier votre mot de passe';
                            }else
                            {
                                echo 'Une erreur est survenue...';
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

