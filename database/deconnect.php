<?php
	//Déconnexion de l'utilisateur
	session_start();
	$_SESSION['session']=0;
	header('Location: ../index.php')

?>