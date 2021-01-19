<script rel="script" type="text/javascript" src="./js/derouler.js"></script>
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
		$lien=0;
		echo "<table>";
		while($result= $sth->fetch(PDO::FETCH_ASSOC)){

			$lien++;
			echo "<tr>";
			echo "<td style='background-color:lightgrey;'>";
			echo "<p id='lien".$lien."' ><U class='intitule'>".$result['intitule']."<img src=\"./image/next.png\" width=\"20px\" style=\"float: right;\" style=\"transform: rotate(180deg);\"></U></p>";
			echo "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td style='background-color:white;'>";
			echo "<p>".$result['reponse']."</p>";
			echo "</td>";
			echo "</tr>";

		}
		echo "</table>";	
	}
	
	function show_nav_faq(){
		$req = ("SELECT * from faq");
		$dbconn=ConnectDb();
		$sth=$dbconn->prepare($req);
		$sth->execute();
		$lien=0;
		echo "<nav>";
		echo "<ul>";
		$lign=0;
		while($result= $sth->fetch(PDO::FETCH_ASSOC)){
			if($lign==0){
				echo"<li>";
			}
			$lien++;
			echo "<a href='#lien".$lien."'><U>".$result['intitule']."</U></a></li>";
			$lign++;
			if($lign==1){
				echo "</li>";$lign=0;
			}
		}
		echo "</ul>";	
		echo "</nav>";


	}










?>