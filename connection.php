<?php
    $host="127.0.0.1";
    $port = 3306;
    $user="root";
    $password="";
    $dbname="estoque";

    $con = mysqli_connect($host, $user, $password, $dbname, $port) or die(mysql_error());

    if(!$con){
        echo "Falha na conexão";
        $connected = 0;
    }else {
        $connected = 1;
    }
?>    