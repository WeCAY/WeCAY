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
		    if ($lign==0){
				echo"<tr>";
                $lign = 0;				
            }
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



/*
Cette fonction affiche les informations principales des patients et devra nous faire rediriger vers le suivi du patient qd les graphiques seront bons.
*/
function showResult($req){
    ?>
    <link rel="stylesheet" href="CSS/graph.css" />
    <div class="graph">
    <?php
    $dbconn=ConnectDb();
    $sth=$dbconn->prepare($req);
    $sth->execute();



    $nbr = $sth->rowCount();
    if ($nbr == 0) {
        echo "Vous n'avez passé aucun examen pour le moment, rendez-vous en centre médical pour tester WeCAY";
    } else {
        echo "<table width='100%'>";
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
            $date = $result['date_test'];
            list($annee, $mois, $jour) = explode('-', $date);

            echo"<tr>";
            echo "<td>".$result['id_test']."</td>";
            echo "<td>".$result['num_securite_social']."</td>";
            echo "<td>".$jour."/".$mois."/".$annee."</td>";
            echo "<td>".$result['temperature']."°C"."</td>";
            echo "<td>".$result['pouls']." bpm"."</td>";
            echo "<td>".$result['numero_serie']."</td>";
            echo"</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    ?></div><?php
}


					




	




?>