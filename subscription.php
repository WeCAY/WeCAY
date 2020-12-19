<?php
require_once "./functions/functions_subscription.php";

if(isset($_POST['inscription'])){
    inscription();
}


/*
Cette page permet de s'inscrire sur le site via le formulaire.
A chaque information saisie, on stocke dans une variable cette info.
Si on appuie sur le boutton, la fonction inscription() est exécutée.
*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/subscription.css" />
    <script type="text/javascript" src="js/pw_security_lvl.js"></script>
    <title>Inscription | WeCAY</title>
</head>

<body>
<div id = "block_page">
    <a name = "haut"></a>
    <?php
    include("constant/header.php");
    ?>
    <section>
        <a href ="#haut"><img src="image/next.png" class="haut" alt="Remontez en haut de la page"></a>
        <div id="formulaire">
            <div id="renseignement">
                <form action="#" method="post"> <!--action="verification.php"-->
                    <h1>S'inscrire</h1>

                    <label>Nom</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="text" placeholder="Entrez votre nom" name="name" required>';
                    }
                    else{
                        $nom=$_POST['name'];
                        echo '<input type="text" placeholder="Entrez votre nom" name="name" required>';
                    }
                    ?>

                    <label>Prénom</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="text" placeholder="Entrez votre prénom" name="firstname" required>';
                    }
                    else{
                        $prenom=$_POST['firstname'];
                        echo '<input type="text" placeholder="Entrez votre prénom" name="firstname" required>';
                    }
                    ?>

                    <label>Adresse mail</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="email" placeholder="adresse.mail@wecay.com" name="mail" required>';
                    }
                    else{
                        $email=$_POST['mail'];
                        echo '<input type="email" placeholder="Désolé, cette adresse est déjà prise" name="mail" required>';
                    }
                    ?>

                    <label>Confirmez votre adresse mail</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="email" placeholder="adresse.mail@wecay.com" name="mail2" required>';
                    }
                    else{
                        echo '<input type="email" placeholder="Désolé, cette adresse est déjà prise" name="mail2" required>';
                    }
                    ?>

                    <label>Mot de passe</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="password" placeholder="Entrer le mot de passe" name="password" id="mdp" OnKeyDown="Check();" required>';
                    }
                    else{
                        $mot_de_passe=$_POST['firstname'];
                        echo '<input type="password" placeholder="Entrer le mot de passe" name="password" id="mdp" OnKeyDown="Check();" required>';
                    }
                    ?>

                    <label>Confirmer votre mot de passe</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="password" placeholder="Entrer le mot de passe" name="password2" required>';
                    }
                    else{
                        echo '<input type="password" placeholder="Entrer le mot de passe" name="password2" required>';
                    }
                    ?>

                    <label>Civilité</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo'<select name="select_box" required>',"\n";
                        echo '<option>M.</option>';
                        echo '<option>Mme.</option>';
                        echo '<option>Autre</option>';
                        echo '</select>';
                    }else{
                        $civilite=$_POST['select_box'];
                        echo'<select name="select_box" required>',"\n";
                        echo '<option>Monsieur</option>';
                        echo '<option>Madame</option>';
                        echo '<option>Autre</option>';
                        echo '</select>';
                    }
                    ?>

                    <label>Statut</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo'<select name="statut" required>',"\n";
                        echo '<option>Patient</option>';
                        echo '<option>Médecin</option>';
                        echo '<option>Administrateur</option>';
                        echo '</select>';
                    }
                    else{
                        $statut=$_POST['statut'];
                        echo'<select name="statut" required>',"\n";
                        echo '<option>Patient</option>';
                        echo '<option>Médecin</option>';
                        echo '<option>Administrateur</option>';
                        echo '</select>';
                    }
                    ?>

                    <label>Date de naissance</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="date" min="1900-01-01" placeholder="Date de naissance" name="date_birth" required>';
                    }
                    else{
                        $date_naissance=$_POST['date_birth'];
                        echo '<input type="date" placeholder="Date de naissance" name="date_birth" required>';
                    }
                    ?>

                    <label>Lieu de naissance</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="text" placeholder="Lieu de naissance" name="place_birth" required>';
                    }
                    else{
                        $lieu_naissance=$_POST['place_birth'];
                        echo '<input type="text" placeholder="Lieu de naissance" name="place_birth" required>';
                    }
                    ?>

                    <label>Numéro de Sécurité Sociale</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="text" placeholder="N° de Sécurité Sociale" name="secu_number" required>';
                    }
                    else{
                        $num_securite_social=$_POST['secu_number'];
                        echo '<input type="text" id="erreur" placeholder="N° de Sécurité Sociale" name="secu_number" minlength="15" maxlength="15" required>';
                    }
                    ?>

                    <label>Adresse</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="text" placeholder="Adresse postale" name="adress" required>';
                    }
                    else{
                        $adresse=$_POST['adress'];
                        echo '<input type="text" placeholder="Adresse postale" name="adress" required>';
                    }
                    ?>

                    <label>Code Postal</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="text" placeholder="Code postal" name="postal_code" required>';
                    }
                    else{
                        $code_postal=$_POST['postal_code'];
                        echo '<input type="text" placeholder="Code postal" name="postal_code" required>';
                    }
                    ?>

                    <label>Ville</label>
                    <?php
                    if(empty($_POST['inscripton']) || $_POST['erreur']!='erreurID'){
                        echo '<input type="text" placeholder="Ville" name="city" required>';
                    }
                    else{
                        $ville=$_POST['city'];
                        echo '<input type="text" placeholder="Ville" name="city" required>';
                    }
                    ?>
                    <input type="submit" id='submit' name="inscription" value='Inscription'>

                </form>
            </div>
        </div>
    </section>

    <?php include("constant/footer.php"); ?>
</div>
</body>
</html>

