<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/account.css" />
</head>
<body>
<?php
/*
On se connecte à la base de données
*/
require_once "./database/connect.php";

/*
Fonction qui permet de se connacter au site en insérant le num de secu et le mot de passe
vérifie si les données du formulaires sont présentes dans la base.
Renvoie vers la page principale si ok , erreur sinon.
*/
function connectAccount() {

    $identifiant=$_POST['secu_number'];
    $password=$_POST['password'];

    $conn_req= "SELECT mot_de_passe FROM utilisateur WHERE num_securite_social like '".$identifiant."'";
    if(checkAccount($conn_req,$password)){
        $_SESSION['session']=1;
        $_SESSION['id'] = $identifiant;
        $_SESSION['password'] = $password;
        echo '<div class = "loader"></div>';
        echo "<p> Vous êtes connecté ! </p>";

        $_SESSION['connecte']=1; // L'utilisateur est connecté

        echo '<p> Vous allez être redirigé vers la page principale. </p>';

        //Appel de la fonction de redirection selon le statut de l'utilisateur
        checkStatut($identifiant);

        Exit();
    }else {
        echo "<p> Erreur de connexion, retentez ou bien inscrivez-vous. </p>";
    }
}


/*
Cette fonction vérifie que le mot de passe corespond à l'identifiant
*/
function checkAccount($req,$mdp){
    $dbconn=connectDb();
    $sth=$dbconn->prepare($req);
    $sth->execute();
    $idmax=0;
    $result= $sth->fetchAll(PDO::FETCH_COLUMN,0);
    foreach ($result as $key) {
        if(password_verify($mdp,$key)){
            return true;
        }
    }
    return false;
}

/*
    Cette fonction permet une redirection vers une page selon le statut
    de l'utilisateur.
*/
function checkStatut($identifiant){

    $req = ("SELECT statut from utilisateur WHERE num_securite_social LIKE '".$identifiant."'");
    $dbconn=ConnectDb();
    $sth=$dbconn->prepare($req);
    $sth->execute();

    while($result= $sth->fetch(PDO::FETCH_ASSOC)){

        if ($result['statut']=="Médecin") {
            header('Refresh: 3;URL=medecin.php',true, 301);
        }elseif ($result['statut']=="Patient") {
            header('Refresh: 3;URL=principal.php',true, 301);
        }else{
            header('Refresh: 3;URL=administrateur.php',true, 301);
        }
    }
}




?>


</body>
</html>
