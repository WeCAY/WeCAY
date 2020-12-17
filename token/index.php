<?php
require_once "../database/connect.php";


if(isset($_GET['token']) && $_GET['token'] !='')
{
    $db=connectDb();
    $stmt = $db->prepare('SELECT email FROM utilisateur WHERE token = ?');
    $stmt->execute([$_GET['token']]);
    $email = $stmt->fetchColumn();

    if($email)
    {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="../CSS/index.css" />
            <title>Mot de passe oublié | WeCAY</title>
        </head>
        <body>
        <div id="bloc_page">
            <?php include("./constant/header.php"); ?>

            <section>
                <div id="container">
                    <div id="renseignement">
                        <form method="post">
                        <h1>Réinitialiser le mot de passe</h1>

                        <label for="newPassword">Nouveau mot de passe</label>
                        <input type="password" placeholder="Entrez votre nouveau mot de passe" name="newPassword" required>
                        <input type="submit" id='submit' value='Confirmer' >
                            <?php
                            if(isset($_POST['newPassword']))
                            {
                            $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                            $sql = "UPDATE utilisateur SET mot_de_passe = ?, token = NULL WHERE email = ?";
                            $db = connectDb();
                            $stmt = $db->prepare($sql);
                            $stmt->execute([$hashedPassword, $email]);
                            echo 'Votre mot de passe a été modifié avec succès !';
                            }?>
                        </form>
                    </div>
                </div>
            </section>

            <?php include("./constant/footer.php"); ?>
        </div>
        </body>
        </html>
        <?php
    }
}

