<?php


function Connect()
{
    try {   //$db=mysqli_connect("127.0.0.1", "root", "", "tpje");
        $db = new PDO('mysql:host=localhost:8889;dbname=wecay;charset=utf8', 'root', 'root');
        return $db;

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }
}

$db=connect();