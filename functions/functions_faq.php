<?php

	/*
	On se connecte à la base de données
	*/
    require_once "./database/connect.php";

	/*
	*Cette fonction affiche les questions est leur réponses.
	*/
    function showFaq(){
		$req = ("SELECT * from faq");
		$dbconn=ConnectDb();
		$sth=$dbconn->prepare($req);
		$sth->execute();

		echo "<table>";
		echo "<tr>";
		echo "<th>Questions</th>";
		echo "</tr>";
		$lign=0;
		while($result= $sth->fetch(PDO::FETCH_ASSOC)){
			if($lign==0){
				echo"<tr>";
			}
			echo "<td>";
			echo "<div>Numéro : ".$result['id_question']."</div>";
			echo "<div>Intitulé : ".$result['intitule']."</div>";
			echo "<div>Réponse : ".$result['reponse']."</div>";
			echo "</td>";
			if($lign==2){
				echo "</tr>";$lign=0;
			}
			$lign++;
		}
		echo "</table>";	
	} 










?>