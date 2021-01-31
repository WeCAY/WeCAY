<?php


session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="CSS/contact.css"/>
</head>
<body>
<?php
include "constant/header.php";
?>
<section>
    <div id="formulaire">
        <h1>Contactez-nous</h1>
        <form id="contact" method="post" action="functions/traitement_contact.php">
                <p><label for="prenom">Prénom :</label><input type="text" name="prenom" placeholder="Prénom" value="<?php echo $_SESSION['prenom'];?>" /></p>
                <p><label for="nom">Nom :</label><input type="text" name="nom" placeholder="Nom" value="<?php echo $_SESSION['nom'];?>" /></p>
                <p><label for="email">Email :</label><input type="text" name="email" placeholder="Adresse mail" value="<?php echo $_SESSION['mail'];?>" /></p>

                <p><label for="objet">Objet :</label><input type="text" name="objet" placeholder="C'est une bonne situation ça scribe ?"/></p>
                <p><label for="message">Message :</label><textarea id="message" name="message" cols="50" rows="8" maxlength="650" placeholder="Vous savez, moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd’hui avec vous, je dirais que c’est d’abord des rencontres. Des gens qui m’ont tendu la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi. Et c’est assez curieux de se dire que les hasards, les rencontres forgent une destinée…Parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l’interlocuteur en face je dirais, le miroir qui vous aide à avancer. Alors ça n’est pas mon cas, comme je disais là, puisque moi au contraire, j’ai pu : et je dis merci à la vie, je lui dis merci, je chante la vie, je danse la vie… je ne suis qu’amour !"></textarea></p>

            <div style="text-align:center;">
                <input type="submit" name="envoi" value="Envoyer le formulaire !" />
            </div>
        </form>
    </div>
</section>

<?php include "constant/footer.php";?>
</body>
</html>