<?php

	/*
	On se connecte à la base de données
	*/
	require_once "./database/connect.php";



	/*
	Cette fonction affiche les informations principales des patients et devra nous faire rediriger vers le suivi du patient qd les graphiques seront bons.
	*/
	function showPatient($req){

		$dbconn=ConnectDb();
		$sth=$dbconn->prepare($req);
		$sth->execute();

		if($sth -> rowCount()>0){
			echo "<table width='100%' border=1>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Nom</th>";
			echo "<th>Prénom</th>";
			echo "<th>Numéro de sécurité sociale</th>";
			echo"</tr>";
			echo "</thead>";
			echo "<tbody>";
		}else{
			echo "Aucun résultat pour votre recherche";
		}


		$lign=0;
		while($result= $sth->fetch(PDO::FETCH_ASSOC)){

			echo"<tr>";			
			echo "<td>".$result['nom']."</td>";
			echo "<td>".$result['prenom']."</td>";
			echo "<td>".$result['num_securite_social']."</td>";
			$lign++;
		}
		echo"</tr>";
		echo "</tbody>";
		echo "</table>";	
	}






					




	




?>