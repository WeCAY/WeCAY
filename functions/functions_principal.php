<?php

/*
On se connecte à la base de données
*/
require_once "./database/connect.php";


/*
Fonction qui gère le menu de navigation selon l'utilisateur
*/
	function getNavigation(){

		$result = '<div>';
		if(isset($_SESSION['session']) && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<div><nav><a href="./database/deconnect.php">Déconnexion</a></nav></div>';
            $result .= '<div><nav><a href="./parameters.php">Modifier mes informations</a></nav></div>';
		}
		$result .= '<div>';
//		$result .= '<nav>';

/*		if(isset($_SESSION['session']) && $_SESSION['statut']=="Admin" && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<a href="./admin.php">Admin</a>';
			$result .= '<a href="./access.php">Gérer les droits utilisateurs</a>';
		}

		if(isset($_SESSION['session']) && $_SESSION['statut']=="Docteur" && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<a href="./search.php">Recherche</a>';
		}

		if(isset($_SESSION['session']) && $_SESSION['statut']=="Patient" && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<a href="./principal.php">Accueil</a>';		}

		$result .= '<a href="./parameters.php">Paramètres du Compte</a>';
*/
//		$result .= '</nav>';
//		$result .= '</div>';
//		$result .= '</div>';

		return $result;

}


/*
*Cette fonction affiche les informations personnelles d'un utilisateur dans un tableau.
*/
function showAccount($id){
    $req = ("SELECT * from utilisateur WHERE num_securite_social LIKE '".$id."'");
    $dbconn=ConnectDb();
    $sth=$dbconn->prepare($req);
    $sth->execute();

    echo "<table>";
    echo "<tr>";
    echo "<th>Compte</th>";
    echo "</tr>";
    $lign=0;
    while($result= $sth->fetch(PDO::FETCH_ASSOC)){
        if($lign==0){
            echo"<tr>";
        }
        echo "<td>";
        echo "<div>Nom : ".$result['nom']."  Prenom : ".$result['prenom']."</div>";
        echo "<div>Adresse mail : ".$result['email']."  Civilité : ".$result['civilite']."</div>";
        echo "<div>Statut : ".$result['statut']."  Date de naissance : ".$result['date_naissance']."</div>";
        echo "<div>Lieu de naissance : ".$result['lieu_naissance']."  Numéro de sécurité sociale : ".$result['num_securite_social']."</div>";
        echo "<div>Adresse : ".$result['adresse']."  Code postal : ".$result['code_postal']."</div>";
        echo "<div>Ville : ".$result['ville']."</div>";
        echo "</td>";
        if($lign==2){
            echo "</tr>";$lign=0;
        }
        $lign++;
    }
    echo "</table>";


}






/*
Cette fonction affiche les informations principales des patients et devra nous faire rediriger vers le suivi du patient qd les graphiques seront bons.
*/
function showResult($req){

    $dbconn=ConnectDb();
    $sth=$dbconn->prepare($req);
    $sth->execute();

    echo "<table width='100%' border=1>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Numéro</th>";
    echo "<th>Numéro de sécurité sociale</th>";
    echo "<th>Date du Test réalisé</th>";
    echo "<th>Température</th>";
    echo "<th>Pouls</th>";
    echo "<th>Machine utilisée</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    $lign=0;
    while($result= $sth->fetch(PDO::FETCH_ASSOC)){
        echo"<tr>";
        echo "<td>".$result['id_test']."</td>";
        echo "<td>".$result['num_securite_social']."</td>";
        echo "<td>".$result['date_test']."</td>";
        echo "<td>".$result['temperature']."</td>";
        echo "<td>".$result['pouls']."</td>";
        echo "<td>".$result['numero_serie']."</td>";
        echo"</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}


/*
	Fonction qui reçoit la valeur du formulaire de tri
	et trie en fonction du critère choisi
*/
function triResult(){
    $choix=$_POST['select_box_tri'];
    $user=$_SESSION['id'];
    switch($choix){
        case 'temperature_tri':
            $req = ("SELECT * from tests WHERE num_securite_social LIKE $user ORDER BY temperature");
            showResult($req);
            break;

        case 'pouls_tri':
            $req = ("SELECT * from tests WHERE num_securite_social LIKE $user ORDER BY pouls");
            showResult($req);
            break;

        case 'date_tri':
            $req = ("SELECT * from tests WHERE num_securite_social LIKE $user ORDER BY date_test DESC");
            showResult($req);
            break;

        case 'machine_par':
            $req = ("SELECT * from tests WHERE num_securite_social LIKE $user ORDER BY machine");
            showResult($req);
            break;

        case 'trier_par':
            $req = ("SELECT * from tests WHERE num_securite_social LIKE $user");
            showResult($req);
            break;

    }

}












?>