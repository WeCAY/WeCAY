<?php

function Connect()
{
    try { 
        $db = new PDO('mysql:host=mysql-wecay.alwaysdata.net;dbname=wecay_isep;charset=utf8', 'wecay', 'Isepwecay');
        return $db;

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }
}

$db=connect();