<?php
    require_once "./database/connect.php";

    function checkMail(){

        $mail = $_POST['mail'];
        $identifiant = $_POST['secu_number'];


        $req= "SELECT email FROM utilisateur WHERE num_securite_social like '".$identifiant."'";

        $dbconn=connectDb();
        $sth = $dbconn->prepare($req);
        $sth->execute();

        $result= $sth->fetchAll(PDO::FETCH_COLUMN,0);

        foreach ($result as $key) {
            if($mail == $key){
                return true;
            }
        }
        echo "Le n° de sécurité sociale et l'adresse mail ne correspondent pas, veuillez réessayer";
        return false;
    }


    function sendMail(){

        $token = uniqid();
        $url = "http://wecay.alwaysdata.net/token?token=$token";
        $sujet = "Mot de passe oublié - WeCAY";
        $message = "Réinitialisation de votre mot de passe - WeCAY
        Cliquez sur le lien pour réinitialiser votre mot de passe : $url
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.";

        $headers = "From: noreply@wecay.com";

        if(mail($_POST['mail'], $sujet, $message, $headers))
        {
            $db = connectDb();
            $sql = "UPDATE utilisateur SET token = ? WHERE email = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$token, $_POST['mail']]);
            echo 'Un mail a été envoyé à votre adresse '.$_POST['mail'].'. Suivez les instructions pour modifier votre mot de passe';
        }else
        {
            echo 'Une erreur est survenue...';
        }
    }

