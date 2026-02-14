<?php
$host ="localhost";
$port = "5432";
$dbname = "teste1";
$user = "postgres";
$password = "admin";

 $conecta = pg_connect("host=$host port=$port  dbname=$dbname user=$user password=$password");
 if ($conecta) {
    echo "Conectou";
 }
    else{
        echo 'não conectou';
    }


?>