<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/inscription1.css" />
        <title>Inscription | WeCAY</title>
    </head>

    <body>
        <div id = "block_page">
            <?php include("constant/header.php"); ?>

            <section>
                    <div id="formulaire">
                        <div id="renseignement">
                            <h1>Inscription</h1>

                            <label>Nom</label>
                            <input type="text" placeholder="Entrez votre nom" name="name" required>

                            <label>Prénom</label>
                            <input type="text" placeholder="Entrez votre prénom" name="first_name" required>

                            <label>Adresse mail</label>
                            <input type="email" placeholder="adresse.mail@wecay.com" name="mail" required>

                            <label>Confirmez votre adresse mail</label>
                            <input type="email" placeholder="adresse.mail@wecay.com" name="mail2" required>

                            <label>Mot de passe</label>
                            <input type="password" placeholder="Entrer le mot de passe" name="password1" required>

                            <label>Confirmer votre mot de passe</label>
                            <input type="password" placeholder="Entrer le mot de passe" name="password2" required>

                            <label>Civilité</label>
                            <select name="select_box" required>
                                <option>M.</option>
                                <option>Mme.</option>
                                <option>Autre</option>
                            </select>

                            <label>Date de naissance</label>
                            <input type="date" placeholder="Date de naissance" name="date_birth" required>

                            <label>Lieu de naissance</label>
                            <input type="text" placeholder="Lieu de naissance" name="place_birth" required>

                            <label>Numéro de Sécurité Sociale</label>
                            <input type="text" placeholder="N° de Sécurité Sociale" name="secu_number" minlength="15" maxlength="15" required>

                            <label>Adresse</label>
                            <input type="text" placeholder="Adresse postale" name="adress" required>

                            <label>Code Postal</label>
                            <input type="text" placeholder="Code postal" name="postal_code" required>

                            <label>Ville</label>
                            <input type="text" placeholder="Ville" name="city" required>

                            <input type="submit" id='submit' value='INSCRIPTION' >
                        </div>
                    </div>
            </section>

            <?php include("constant/footer.php"); ?>
        </div>
    </body>
</html>

