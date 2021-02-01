<?php
require_once 'database/connect.php';
$db = connectDb();
// Récupération des variables nécessaires à l'activation
$login = $_GET['log'];
$cle = $_GET['cle'];

// Récupération de la clé correspondant au $login dans la base de données
$stmt = $db->prepare("SELECT cle,actif FROM utilisateur WHERE num_securite_social like :login ");

if($stmt->execute(array(':login' => $login)) && $row = $stmt->fetch())
{
    $clebdd = $row['cle'];    // Récupération de la clé
    $actif = $row['actif']; // $actif contiendra alors 0 ou 1
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/activation.css" />
    <title>Activation du compte | WeCAY</title>
</head>
<body>
<div id="bloc_page">
    <section>
<?php
include("constant/header.php");
?>

<?php
// On teste la valeur de la variable $actif récupérée dans la BDD
if($actif == '1') // Si le compte est déjà actif on prévient
{
    echo "<h1>Votre compte est déjà actif !</h1>";
}
else // Si ce n'est pas le cas on passe aux comparaisons
{

    if($cle == $clebdd) // On compare nos deux clés
    {
        // Si elles correspondent on active le compte !
        echo "<h1>Votre compte a bien été activé !</h1>";

        // La requête qui va passer notre champ actif de 0 à 1
        $stmt = $db->prepare("UPDATE utilisateur SET actif = 1 WHERE num_securite_social like :login ");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
    }
    else // Si les deux clés sont différentes on provoque une erreur...
    {
        echo "<h1 style='color: red;'>Erreur ! Votre compte ne peut être activé...</h1>";
    }
}
?>
        <a href="index.php">Connexion à mon compte</a>
    </section>
<?php
include("constant/footer.php");
?>


</div>
</body>
