<?php
    
    require_once "./database/connect.php";
    $dbconn=ConnectDb();
    $conn_req = $dbconn->query("SELECT pouls, date_test FROM tests WHERE num_securite_social like '".$_SESSION['id']."'");
    $data = [['date','value']];

    while ($row = $conn_req->fetch()) {
        $array = [$row['date_test'],$row['pouls']];
        array_push($data,$array);
    }
    if ($f = @fopen('data_pouls.csv', 'w')) {
        foreach ($data as $ligne) {
        fputcsv($f, $ligne);
        }
    fclose($f);
    }
    else {
        echo "Impossible d'acceder au fichier.";
    }
?>