<?php

	require_once "./database/connect.php";
	
	/*
	*Cette fonction permet de créer un compte dans la base de donnéé
	*/
	function inscription(){

		$nom=$_POST['name'];
		$prenom=$_POST['firstname'];
		$email=$_POST['mail'];
        $mot_de_passe=password_hash($_POST['password'],PASSWORD_DEFAULT);
        $statut=$_POST['statut'];
		$civilite=$_POST['select_box'];
		$date_naissance=$_POST['date_birth'];
        $lieu_naissance=$_POST['place_birth'];
		$num_securite_social=$_POST['secu_number'];
		$adresse=$_POST['adress'];
		$code_postal=$_POST['postal_code'];
		$ville=$_POST['city'];
				

		$dbconn=connectDb();
		//$id=prochain_id("SELECT * from utilisateur");
		$identifiant_unique=identifiant_unique("SELECT * from utilisateur",$num_securite_social);
		if($identifiant_unique){
			$dbconn->exec("INSERT INTO utilisateur(num_securite_social,nom,prenom,civilite,date_naissance,adresse,
            code_postal,ville,lieu_naissance,statut,email,mot_de_passe) VALUES ('$num_securite_social',
            '$nom','$prenom','$civilite','$date_naissance','$adresse','$code_postal','$ville','$lieu_naissance','$statut',
            '$email','$mot_de_passe');");
            confirmation($email, $num_securite_social);
			header('Location: index.php');
		}
		else{
			$_POST["erreur"]='erreurID';
		}
				
    }
    

	/*
	*Cette fonction parcours une table de la bdd pour trouver le prochaine id.
	A VOIR SI UTILE PLUS TARD
	*/
	/* 	function prochain_id($req){
		$dbconn=connectDb();
		$sth=$dbconn->prepare($req);
		$sth->execute();
		$idmax=0;
		$result= $sth->fetchAll(PDO::FETCH_COLUMN,0);
		foreach ($result as $key) {
			
				if($idmax<=$key){
					$idmax=$key;
				}
			
		}
		return $idmax+1;

    } */
    

	/*
	*Cette fonction vérifie que l'identifiant donné n'a pas été déjà utilisé.
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

	function confirmation($email,$num_securite_social){
        $db = connectDb();
// Génération aléatoire d'une clé
        $cle = md5(microtime(TRUE)*100000);


// Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
        $stmt = $db->prepare("UPDATE utilisateur SET cle= '$cle' WHERE num_securite_social like '$num_securite_social'");
        $stmt->execute();


// Préparation du mail contenant le lien d'activation
        $destinataire = $email;
        $sujet = "Activer votre compte" ;
        $entete = "From: noreply@wecay.com" ;

// Le lien d'activation est composé du login(log) et de la clé(cle)
        $message = 'Bienvenue sur WeCAY,
 
Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
ou copier/coller dans votre navigateur Internet.
 
http://wecay.alwaysdata.net/activation.php?log='.urlencode($num_securite_social).'&cle='.urlencode($cle).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';


        mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
    }

?>
