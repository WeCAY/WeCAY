<?php

	/*
	On se connecte à la base de données
	*/
	require_once "./database/connect.php";
	
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
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['prenom'] = $result['prenom'];
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
	    ?>
        <link rel="stylesheet" href="CSS/graph.css" />
        <div class="graph">
        <?php
		$dbconn=ConnectDb();
		$sth=$dbconn->prepare($req);
		$sth->execute();
		echo "<table width='100%'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>Nom</th>";
		echo "<th>Prénom</th>";
		echo "<th>Numéro de sécurité sociale</th>";
		echo "<th>Date du Test réalisé</th>";
		echo "<th>Température</th>";
		echo "<th>Pouls</th>";
		echo "<th>Machine utilisée</th>";
		echo"</tr>";
		echo "</thead>";
		echo "<tbody>";

		$lign=0;
		while($result= $sth->fetch(PDO::FETCH_ASSOC)){
		    if ($lign==0){
		        echo"<tr>";
            }
			echo"<tr>";			
			echo "<td>".$result['nom']."</td>";
			echo "<td>".$result['prenom']."</td>";
			echo "<td>".$result['num_securite_social']."</td>";
			echo "<td>".$result['date_test']."</td>";
			echo "<td>".$result['temperature']."°C"."</td>";
			echo "<td>".$result['pouls']." bpm"."</td>";
			echo "<td>".$result['numero_serie']."</td>";
			if($lign == 2){
                echo"</tr>";
                $lign = 0;
            }
			$lign++;
		}
		echo "</tbody>";
		echo "</table>";
        ?></div><?php
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