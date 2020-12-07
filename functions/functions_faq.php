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
		$lign=0;
		while($result= $sth->fetch(PDO::FETCH_ASSOC)){
			if($lign==0){
				echo"<tr>";
			}
			echo "<td>";
			echo "<div><U>Intitulé :</U> ".$result['intitule']."</div>";
			echo "<div><U>Réponse :</U> ".$result['reponse']."</div>";
			echo "</td>";
			$lign++;
			if($lign==3){
				echo "</tr>";$lign=0;
			}
		}
		echo "</table>";	
	} 










?>