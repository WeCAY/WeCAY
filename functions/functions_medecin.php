<?php

	/*
	On se connecte à la base de données
	*/
	//require_once "./database/connect.php";

	
	/*
	Fonction qui gère le menu de navigation selon l'utilisateur. A intégrer une fois que toutes les fonctionnalités des utilisateurs seront ok.
	*/
	//function getNavigation(){

/*		$result = '<div>';
		if(isset($_SESSION['session']) && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<div><nav><a href="./database/deconnect.php">Deconnexion</a></nav></div>';
		}
		$result .= '<div>';	
		$result .= '<nav>';

		if(isset($_SESSION['session']) && $_SESSION['statut']=="Admin" && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<a href="./admin.php">Admin</a>';
			$result .= '<a href="./access.php">Gérer les droits utilisateurs</a>';
		}

		if(isset($_SESSION['session']) && $_SESSION['statut']=="Docteur" && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<a href="./search.php">Recherche</a>';
		}

		if(isset($_SESSION['session']) && $_SESSION['statut']=="Patient" && $_SESSION['session']==1){ //case when yo're connected
			$result .= '<a href="./principal.php">Accueil</a>';		}        
	
		$result .= '<a href="./parameters.php">Paramètres du Compte</a>';
	
		$result .= '</nav>';
		$result .= '</div>';
		$result .= '</div>';

		return $result;

	}
*/

	/*
	*Cette fonction affiche les informations personnelles d'un utilisateur dans un tableau.
	*/
 	function showAccount_medecin($id){
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
			echo "Nom : ".$result['nom']."  Prenom : ".$result['prenom'];
			echo "</td>";

			echo "<td>";
			echo "Adresse mail : ".$result['email']."  Civilité : ".$result['civilite'];
			echo "</td>";

			echo "<td>";
			echo "Statut : ".$result['statut']."  Date de naissance : ".$result['date_naissance'];
			echo "</td>";

			echo "<td>";
			echo "Lieu de naissance : ".$result['lieu_naissance']."  Numéro de sécurité sociale : ".$result['num_securite_social'];
			echo "</td>";

			echo "<td>";
			echo "Adresse : ".$result['adresse']."  Code postal : ".$result['code_postal'];
			echo "</td>";

			echo "<td>";
			echo "Ville : ".$result['ville'];
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
	function showPatient($req){

		$dbconn=ConnectDb();
		$sth=$dbconn->prepare($req);
		$sth->execute();

		echo "<table width='100%' border=1>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Nom</th>";
		echo "<th>Prénom</th>";
		echo "<th>Numéro de sécurité sociale</th>";
		echo "<th>Date du Test réalisé</th>";
		echo"</tr>";
		echo "</thead>";
		echo "<tbody>";

		$lign=0;
		while($result= $sth->fetch(PDO::FETCH_ASSOC)){
			echo"<tr>";			
			echo "<td>".$result['nom']."</td>";
			echo "<td>".$result['prenom']."</td>";
			echo "<td>".$result['num_securite_social']."</td>";
			echo "<td>".$result['date_test']."</td>";
			echo"</tr>";
		}
		echo "</tbody>";
		echo "</table>";	
	}



/*
	Fonction qui reçoit la valeur du formulaire de tri
	et trie en fonction du critère choisi
*/
	function triPatient(){
		$choix=$_POST['select_box_tri'];
		switch($choix){
			case 'nom_tri':
				$req = ("SELECT * from utilisateur INNER JOIN tests ON utilisateur.num_securite_social = tests.num_securite_social WHERE statut LIKE 'Patient' ORDER BY nom ASC");
				showPatient($req);
				break;

			case 'prenom_tri':
				$req = ("SELECT * from utilisateur INNER JOIN tests ON utilisateur.num_securite_social = tests.num_securite_social WHERE statut LIKE 'Patient' ORDER BY prenom ASC");
				showPatient($req);
				break;

			case 'date_tri':
				$req = ("SELECT * from utilisateur INNER JOIN tests ON utilisateur.num_securite_social = tests.num_securite_social WHERE statut LIKE 'Patient' ORDER BY date_test DESC");
				showPatient($req);
				break;

			case 'trier_par':
				$req = ("SELECT * from utilisateur INNER JOIN tests ON utilisateur.num_securite_social = tests.num_securite_social WHERE statut LIKE 'Patient'");
				showPatient($req);
				break;
		}
		
	}


					




	




?>