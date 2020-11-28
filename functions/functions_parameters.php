<?php

	/*
	On se connacte à la base de données
	*/
	require_once "./database/connect.php";



	/*
	Cette fonction modifie les infos du formulaire dans la base de données.
	*/
	function modification_account(){

        $nom=$_POST['name'];
		$prenom=$_POST['firstname'];
		$email=$_POST['mail'];
        $mot_de_passe=$_POST['password'];
        $statut=$_POST['statut'];
		$civilite=$_POST['select_box'];
		$date_naissance=$_POST['date_birth'];
        $lieu_naissance=$_POST['place_birth'];
		$adresse=$_POST['adress'];
		$code_postal=$_POST['postal_code'];
		$ville=$_POST['city'];
		

		$dbconn=ConnectDb();
		$num_securite_social=$_SESSION['id'];
		if($num_securite_social){
			$dbconn->exec("UPDATE utilisateur SET nom='$nom',prenom='$prenom',civilite='$civilite', 
            date_naissance='$date_naissance',adresse='$adresse',code_postal='$code_postal',ville='$ville',
            lieu_naissance='$lieu_naissance',statut='$statut',email='$email',mot_de_passe='$mot_de_passe'
             WHERE num_securite_social=$num_securite_social;");
			header('Location: index.php');
		}
	}


	/*
	Cette fonction vérifie que l'identifiant donné n'a pas été déjà utilisé.
	*/
	function identifiant_unique($req,$identifiant){
		$dbconn=connectDb();
		$sth=$dbconn->prepare($req);
		$sth->execute();
		$idmax=0;
		$result= $sth->fetchAll(PDO::FETCH_COLUMN,1);
		foreach ($result as $key) {			
				if($identifiant==$key){
					return false;
				}
		}
		return true;
	}



	/*
	Cette fonction permet d'afficher les infos directement dans le formulaire.
	Pour eviter de les retaper si aucune modification n'est à faire.
	*/
	function affichage_infos($req,$info){

		$dbconn=ConnectDb();
		$sth=$dbconn->prepare($req);
		$sth->execute();
		
		while($result= $sth->fetch(PDO::FETCH_ASSOC)){
			switch ($info) {
				case 'nom':
					$info=$result['nom'];
					break;
				case 'prenom':
					$info=$result['prenom'];
					break;
				case 'email':
					$info=$result['email'];
					break;
				case 'mot_de_passe':
					$info=$result['mot_de_passe'];
                    break;
                case 'civilite':
                    $info=$result['civilite'];
                    break;
                case 'date_naissance':
                    $info=$result['date_naissance'];
                    break;
                case 'lieu_naissance':
                    $info=$result['lieu_naissance'];
                    break;
                case 'num_securite_social':
                    $info=$result['num_securite_social'];
                    break;
                case 'statut':
                    $info=$result['statut'];
                    break;
                case 'adresse':
                    $info=$result['adresse'];
                    break;
                case 'code_postal':
                    $info=$result['code_postal'];
                    break;
                case 'ville':
                    $info=$result['ville'];
                    break;
				default: NULL;
					break;
			}
		}
		return $info;
	}

	


?>