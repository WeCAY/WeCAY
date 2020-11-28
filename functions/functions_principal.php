<?php

	/*
	On se connecte à la base de données
	*/
	//require_once "./database/connect.php";

	
	/*
	Fonction qui gère le menu de navigation selon l'utilisateur
	*/
	function getNavigation(){

		$result = '<div>';
		if(isset($_SESSION['session']) && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<div><nav><a href="./database/deconnect.php">Déconnexion</a></nav></div>';
		}
		$result .= '<div>';	
		$result .= '<nav>';

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
		$result .= '</nav>';
		$result .= '</div>';
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
		
		echo "<h2 class=\"suggest\">Résultats des tests</h2>";
		echo "<h2 class=\"suggest\">Historique de tests</h2>";

	} 














?>