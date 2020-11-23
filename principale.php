<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/principale.css" />
    <title>Accueil | WeCAY</title>
</head>

<body>
    <div id="bloc_page">
        <?php include("constant/header.php");
        include("connect_to_db.php"); ?>
        <h1>Bienvenue dans votre espace personnel <?php echo $_SESSION['prenom'][0],' ',$_SESSION['nom'][0] ?> </h1>
        <a href="logout.php">Déconnexion</a>
        <?php include("constant/footer.php"); ?>
    </div>
</body>

</html>