<?php
/*
Page: connexion.php
*/

include ("connect_to_db.php");

session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
if(isset($_POST['login'])) { // si le bouton "Connexion" est appuyé
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['nss'])) {
        echo "Le champ Pseudo est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['password'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
            $num_securite_sociale = htmlentities($_POST['nss'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $mot_de_passe = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
            //on se connecte à la base de données:

            //on vérifie que la connexion s'effectue correctement:
            if(!$db){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $nRows = $db->query("SELECT COUNT(*) from utilisateur WHERE num_securite_social = '".$num_securite_sociale."' AND mot_de_passe = '".$mot_de_passe."'")->fetchColumn();
                //si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                if(($nRows) == 0) {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    // on ouvre la session avec $_SESSION:
                    $_SESSION['nss'] = $num_securite_sociale;// la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                    $prenom = $db->query("SELECT prenom FROM utilisateur WHERE num_securite_social = '".$num_securite_sociale."'")->fetch();
                    $nom = $db->query("SELECT nom FROM utilisateur WHERE num_securite_social = '".$num_securite_sociale."'")->fetch();
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['nom'] = $nom;
                    echo "Vous êtes à présent connecté !";
                    header('Location:principale.php');
                }
            }
        }
    }
}
?>